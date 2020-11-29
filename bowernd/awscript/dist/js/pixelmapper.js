(function() {
    "use strict";
    var AmCharts = window.AmCharts;
    var pixelMapper = {
        tool: "select",
        group: true,
        countries: {}
    };
    window.pixelMapper = pixelMapper;
    pixelMapper.changeMap = function(mapFile) {
        pixelMapper.createMap(mapFile);
    };
    pixelMapper.saveZoom = function() {
        pixelMapper.map.dataProvider.zoomLevel = pixelMapper.map.zoomLevel();
        pixelMapper.map.dataProvider.zoomLatitude = pixelMapper.map.zoomLatitude();
        pixelMapper.map.dataProvider.zoomLongitude = pixelMapper.map.zoomLongitude();
    };
    pixelMapper.build = function() {
        pixelMapper.buffer = {
            images: pixelMapper.map.dataProvider.images,
            lines: pixelMapper.map.dataProvider.lines
        };
        pixelMapper.saveZoom();
        pixelMapper.map.dataProvider.images = [];
        pixelMapper.map.dataProvider.lines = [];
        pixelMapper.map.validateNow();
        pixelMapper.hideObjectProperties();
        setTimeout(pixelMapper.generatePixels, 10);
    };
    pixelMapper.toggleGrouping = function(group) {
        pixelMapper.group = group;
        var images = pixelMapper.map.dataProvider.images;
        for (var i = 0; i < images.length; i++) {
            var image = images[i];
            if (group) {
                image.groupId = image.countryId;
            } else {
                image.groupId = undefined;
            }
        }
    };
    pixelMapper.generatePixels = function() {
        var dist = AWScript.defaults.distance;
        var size = AWScript.defaults.size;
        var type = AWScript.defaults.types.pixel;
        pixelMapper.snapDistance = dist + size;
        pixelMapper.images = [];
        if (type == "hexagon") {
            size -= 1;
        }
        var stepX = size + dist;
        var stepY = size + dist;
        if (type == "hexagon") {
            stepY = stepY - stepY / 2 / Math.sqrt(3) / 2;
        }
        if (type == "diamond") {
            stepY = stepY / 2;
        }
        var first = true;
        var rowCount = 0;
        pixelMapper.rowCounter = 0;
        pixelMapper.totalRows = Math.floor(pixelMapper.map.divRealHeight / stepY);
        for (var y1 = 0; y1 < pixelMapper.map.divRealHeight; y1 += stepY) {
            if (first) {
                first = false;
            } else {
                first = true;
            }
            pixelMapper.doSetTimeout(rowCount, y1, first, stepX, stepY);
            rowCount++;
        }
        pixelMapper.rowCount = rowCount;
        pixelMapper.pixelMode = true;
    };
    pixelMapper.doSetTimeout = function(count, y1, first, stepX, stepY) {
        setTimeout(function() {
            pixelMapper.addRow(y1, first, stepX, stepY, count);
        }, 100 * count);
    };
    pixelMapper.addRow = function(y1, first, stepX, stepY, count) {
        pixelMapper.map.balloon.hide(0);
        for (var x1 = 0; x1 < pixelMapper.map.divRealWidth; x1 += stepX) {
            pixelMapper.addImage(x1, y1, first, stepX, stepY);
        }
        var progress = count / pixelMapper.totalRows;
        AWScript.cover({
            end: progress * 100
        });
    };
    pixelMapper.addImage = function(x1, y1, first, stepX, stepY) {
        pixelMapper.counter++;
        var cx = x1;
        var cy = y1;
        var type = AWScript.defaults.types.pixel;
        var zoomLevel = pixelMapper.map.zoomLevel();
        var size = AWScript.defaults.size;
        var mapX = pixelMapper.map.mapContainer.x;
        var mapY = pixelMapper.map.mapContainer.y;
        if (type == "hexagon") {
            if (first) {
                cx -= stepX / 2;
            }
        }
        if (type == "diamond") {
            if (first) {
                cx -= stepY;
            }
        }
        var a = document.elementFromPoint(cx, cy);
        if (a && a.tagName == "path") {
            var countryId = a.getAttribute("countryId");
            if (countryId) {
                var countryData = pixelMapper.countries[countryId];
                var image = new AmCharts.MapImage();
                image.prevType = type;
                image.type = type;
                image.width = size / zoomLevel;
                image.height = size / zoomLevel;
                if (type == "diamond") {
                    image.type = "rectangle";
                    image.rotation = 45;
                    image.width /= Math.sqrt(2);
                    image.height /= Math.sqrt(2);
                }
                if (pixelMapper.group) {
                    image.groupId = countryId;
                }
                var latlng = pixelMapper.map.stageXYToCoordinates(cx, cy);
                image.countryId = countryId;
                image.title = countryData.title;
                image.latitude = latlng.latitude;
                image.longitude = latlng.longitude;
                image.fixedSize = false;
                if (countryData.color !== undefined) {
                    image.color = countryData.color;
                } else {
                    image.color = pixelMapper.handleColor(AWScript.defaults.landColor);
                }
                image.selectable = true;
                image.pixelMapperPixel = true;
                image.locked = true;
                image.pixelMapperModified = countryData.modified;
                pixelMapper.images.push(image);
            }
        }
        if (x1 >= pixelMapper.map.divRealWidth - stepX && y1 >= pixelMapper.map.divRealHeight - stepY) {
            pixelMapper.finishGenerating();
        }
    };
    pixelMapper.finishGenerating = function() {
        pixelMapper.map.dataProvider.images = pixelMapper.images;
        var type = AWScript.defaults.types.pixel;
        for (type in pixelMapper.buffer) {
            var items = pixelMapper.buffer[type];
            for (var i1 = 0; i1 < items.length; i1++) {
                var item = items[i1];
                if (item.pixelMapperLogo || item.pixelMapperImage || item.pixelMapperLine || item.pixelMapperText) {
                    pixelMapper.map.dataProvider[type].push(item);
                }
            }
        }
        pixelMapper.saveZoom();
        pixelMapper.map.areasSettings.alpha = 0;
        pixelMapper.map.validateData();
        pixelMapper.map.mapSet.hide();
    };
    pixelMapper.createMap = function(mapFile) {
        var landColor = pixelMapper.handleColor(AWScript.defaults.landColor);
        var waterColor = pixelMapper.handleColor(AWScript.defaults.waterColor);
        pixelMapper.countries = {};
        pixelMapper.map = AmCharts.makeChart("map", {
            type: "map",
            tapToActivate: false,
            addClassNames: true,
            fontSize: 15,
            projection: AWScript.defaults.projection,
            dataProvider: {
                map: mapFile,
                getAreasFromMap: true
            },
            balloon: {
                horizontalPadding: 15,
                borderAlpha: 0,
                borderThickness: 1,
                verticalPadding: 15
            },
            areasSettings: {
                autoZoom: true,
                color: landColor,
                outlineColor: waterColor,
                rollOverOutlineColor: undefined,
                rollOverBrightness: 20,
                selectedBrightness: 20,
                selectedOutlineColor: undefined,
                selectedOutlineAlpha: 0,
                selectable: true,
                balloonText: "<strong>[[title]]</strong>"
            },
            imagesSettings: {
                alpha: 1,
                color: landColor,
                outlineAlpha: 0,
                rollOverOutlineAlpha: undefined,
                outlineColor: undefined,
                selectedOutlineColor: undefined,
                rollOverBrightness: 20,
                selectedBrightness: 20,
                selectedOutlineAlpha: 0,
                selectable: true
            },
            linesSettings: {
                color: landColor,
                selectable: true,
                rollOverBrightness: 20,
                selectedBrightness: 20
            },
            mouseWheelScrollEnabled: true,
            zoomOnDoubleClick: false,
            zoomControl: {
                zoomControlEnabled: true,
                homeButtonEnabled: true,
                panControlEnabled: false,
                left: 20,
                bottom: 20,
                minZoomLevel: 0.25,
                gridHeight: 100,
                gridAlpha: 0.1,
                gridBackgroundAlpha: 0,
                gridColor: "#FFFFFF",
                draggerAlpha: 1,
                buttonCornerRadius: 2
            }
        }, 0);
        pixelMapper.map.addListener("rendered", pixelMapper.addCountryTitles);
        pixelMapper.map.addListener("mouseDownMapObject", pixelMapper.handleDownMapObject);
        pixelMapper.map.addListener("click", pixelMapper.handleMapClick);
        if(mapFile!='indonesia'){
            pixelMapper.map.addListener("clickMapObject", pixelMapper.handleClickMapObject);
            pixelMapper.map.addListener("init", pixelMapper.setAreaTitle);
        }
        setInterval(pixelMapper.update, 40);
        return pixelMapper.map;
    };
    pixelMapper.setAreaTitle = function(){
        pixelMapper.map.dataProvider.images = [];
        for (var x in pixelMapper.map.dataProvider.areas) {
            var area = pixelMapper.map.dataProvider.areas[x];
            var image = new AmCharts.MapImage();
            var imagesSettings = pixelMapper.map.imagesSettings;
            image.latitude = pixelMapper.map.getAreaCenterLatitude(area);
            image.longitude = pixelMapper.map.getAreaCenterLongitude(area);
            image.label = area.title.toUpperCase();
            image.linkToObject = area;

            imagesSettings.labelColor = "rgba(42,42,42,1)";
            imagesSettings.labelPosition = "middle";
            imagesSettings.labelFontSize = "20";
            imagesSettings.labelRollOverColor = "#fff";
            imagesSettings.adjustAnimationSpeed = true;
            pixelMapper.map.dataProvider.images.push(image);
        }
        pixelMapper.map.validateData();
    }
    pixelMapper.handleColor = function(color) {
        var c = tinycolor(color);
        var rgba = [c._r, c._g, c._b, c._a].join(",");
        color = "rgba(" + rgba + ")";
        return color;
    };
    pixelMapper.handleDownMapObject = function(event) {
        if (event.mapObject.objectType == "MapImage") {
            pixelMapper.movingObject = event.mapObject;
            pixelMapper.startDragX = pixelMapper.map.mouseX;
            pixelMapper.startDragY = pixelMapper.map.mouseY;
            pixelMapper.map.dragMap = false;
        }
    };
    pixelMapper.handleClickMapObject = function(event) {
        var clickedObject = event.mapObject;
        pixelMapper.movingObject = undefined;
        pixelMapper.map.dragMap = true;
        pixelMapper.selectedObject = clickedObject;
        pixelMapper.getObjectClick(pixelMapper.selectedObject);
    };
    pixelMapper.getObjectClick = function(object){
        console.log(object);
        var value = object.title.replace(' ', '_');
        AWScript.defaults.map = 'dp_'+value.toLowerCase()+'_ri';
        AWScript.initialize();
        jQuery('.maps').find('input').val(value.toUpperCase());
    }
    pixelMapper.deleteObject = function() {
        if (pixelMapper.selectedObject) {
            if (pixelMapper.selectedObject.objectType == "MapArea") {
                return;
            }
            pixelMapper.selectedObject.deleteObject();
        }
        if (pixelMapper.group) {
            if (pixelMapper.selectedObject.groupId) {
                var groupArray = pixelMapper.map.getGroupById(pixelMapper.selectedObject.groupId);
                var i;
                var groupedItem;
                for (i = 0; i < groupArray.length; i++) {
                    groupedItem = groupArray[i];
                    groupedItem.deleteObject();
                }
            }
        }
        pixelMapper.selectedObject = null;
        pixelMapper.hideObjectProperties();
    };
    pixelMapper.updateObject = function() {
        var ref = AWScript.user.selectedObject;
        var color = pixelMapper.handleColor(ref.color);
        var rollOverColor = AmCharts.adjustLuminosity(color, 0.15);
        var selectedColor = AmCharts.adjustLuminosity(color, 0.30);
        var bbox = {};
        var zoomLevel;
        var process;
        ref.color = color;
        ref.colorReal = color;
        ref.rollOverColor = rollOverColor;
        ref.rollOverColorReal = rollOverColor;
        ref.selectedColor = selectedColor;
        ref.selectedColorReal = selectedColor;
        ref.pixelMapperModified = true;
        if (pixelMapper.selectedObject) {
            if (pixelMapper.selectedObject.pixelMapperPixel) {
                bbox = pixelMapper.selectedObject.image.node.getBoundingClientRect();
                ref.type = ref.pixel;
                process = ref.type != pixelMapper.selectedObject.type;
                var processObject = function(object, settings) {
                    AmCharts.extend(object, settings);
                    object.rotation = 0;
                    if (settings.type == "diamond") {
                        object.type = "rectangle";
                        object.rotation = 45;
                        object.width /= Math.sqrt(2);
                        object.height /= Math.sqrt(2);
                    }
                    if (object.prevType == "diamond") {
                        object.width *= Math.sqrt(2);
                        object.height *= Math.sqrt(2);
                    }
                    if (object.prevType != settings.type) {
                        object.validate();
                    }
                    object.prevType = settings.type;
                };
                if (pixelMapper.group) {
                    if (pixelMapper.selectedObject.groupId) {
                        var i, groupedItem;
                        var groupArray = pixelMapper.map.getGroupById(pixelMapper.selectedObject.groupId);
                        for (i = 0; i < groupArray.length; i++) {
                            groupedItem = groupArray[i];
                            processObject(groupedItem, ref);
                            groupedItem.image.translate(groupedItem.image.x, groupedItem.image.y, ref.scale, true);
                            groupedItem.image.setAttr("fill", color);
                        }
                    }
                } else {
                    processObject(pixelMapper.selectedObject, ref);
                    pixelMapper.selectedObject.image.translate(pixelMapper.selectedObject.image.x, pixelMapper.selectedObject.image.y, ref.scale, true);
                    pixelMapper.selectedObject.image.setAttr("fill", color);
                }
            } else {
                ref.arrowSize = ref.thickness * 6;
                ref.labelColor = color;
                ref.labelRollOverColor = rollOverColor;
                ref.selectedLabelColor = selectedColor;
                ref.selectedColor = color;
                AmCharts.extend(pixelMapper.selectedObject, ref);
                if (pixelMapper.selectedObject.objectType != "MapArea") {
                    if (ref.locked) {
                        pixelMapper.selectedObject.fixToMap();
                    } else {
                        pixelMapper.selectedObject.fixToStage();
                    }
                } else {
                    pixelMapper.selectedObject.validate();
                }
                return;
            }
        }
        if (process) {
            pixelMapper.map.processObjects();
        }
        AmCharts.extend(pixelMapper.selectedObject, ref);
    };
    pixelMapper.hideObjectProperties = function() {
        pixelMapper.selectedObject = null;
        if (pixelMapper.tempLine) {
            pixelMapper.drawingLine = false;
            pixelMapper.tempLine.remove();
        }
    };
    pixelMapper.addCountryTitles = function() {
        var areas = pixelMapper.map.dataProvider.areas;
        var color = pixelMapper.handleColor(AWScript.defaults.landColor);
        for (var i = 0; i < areas.length; i++) {
            var area = areas[i];
            area.pixelMapperArea = true;
            pixelMapper.countries[area.id] = {
                modified: area.pixelMapperModified,
                title: area.title,
                color: area.color,
                area: area
            };
            area.displayObject.node.setAttribute("countryId", area.id);
        }
    };
    pixelMapper.selectTool = function(tool, group) {
        pixelMapper.tool = tool;
        pixelMapper.group = group;
        pixelMapper.toggleGrouping(group);
        pixelMapper.removeTempLine();
    };
    pixelMapper.removeTempLine = function() {
        if (pixelMapper.tempLine) {
            pixelMapper.drawingLine = false;
            pixelMapper.tempLine.remove();
        }
    };
    pixelMapper.update = function() {
        if (pixelMapper.drawingLine) {
            var zoomLevel = pixelMapper.map.zoomLevel();
            if (pixelMapper.tempLine) {
                pixelMapper.tempLine.remove();
            }
            pixelMapper.lineX2 = pixelMapper.map.mouseX;
            pixelMapper.lineY2 = pixelMapper.map.mouseY;
            pixelMapper.tempLine = AmCharts.line(pixelMapper.map.container, [(pixelMapper.lineX1 - pixelMapper.map.mapContainer.x) / zoomLevel, (pixelMapper.lineX2 - pixelMapper.map.mapContainer.x) / zoomLevel], [(pixelMapper.lineY1 - pixelMapper.map.mapContainer.y) / zoomLevel, (pixelMapper.lineY2 - pixelMapper.map.mapContainer.y) / zoomLevel], pixelMapper.lineColor, 1, 1 / pixelMapper.map.zoomLevel());
            pixelMapper.map.mapContainer.push(pixelMapper.tempLine);
        }
        if (pixelMapper.movingObject) {
            if (Math.abs(pixelMapper.map.mouseY - pixelMapper.startDragY) > 5 || Math.abs(pixelMapper.map.mouseX - pixelMapper.startDragX) > 5) {
                if (pixelMapper.movingObject.locked) {
                    var latlng = pixelMapper.map.stageXYToCoordinates(pixelMapper.map.mouseX, pixelMapper.map.mouseY);
                    pixelMapper.movingObject.latitude = latlng.latitude;
                    pixelMapper.movingObject.longitude = latlng.longitude;
                } else {
                    pixelMapper.movingObject.left = pixelMapper.map.mouseX;
                    pixelMapper.movingObject.top = pixelMapper.map.mouseY;
                }
                pixelMapper.movingObject.updatePosition();
            }
        }
    };
    pixelMapper.handleMapClick = function() {
        pixelMapper.lineColor = pixelMapper.handleColor(AWScript.defaults.color);
        pixelMapper.movingObject = undefined;
        pixelMapper.map.dragMap = true;
        var zoomLevel = pixelMapper.map.zoomLevel();
        if (pixelMapper.tool == "line") {
            if (!pixelMapper.drawingLine) {
                pixelMapper.lineX1 = pixelMapper.map.mouseX;
                pixelMapper.lineY1 = pixelMapper.map.mouseY;
                pixelMapper.drawingLine = true;
            } else {
                pixelMapper.drawingLine = false;
                var mapLine = new AmCharts.MapLine();
                mapLine.chart = pixelMapper.map;
                var latlng1 = pixelMapper.map.stageXYToCoordinates(pixelMapper.lineX1, pixelMapper.lineY1);
                var latlng2 = pixelMapper.map.stageXYToCoordinates(pixelMapper.lineX2, pixelMapper.lineY2);
                mapLine.longitudes = [latlng1.longitude, latlng2.longitude];
                mapLine.latitudes = [latlng1.latitude, latlng2.latitude];
                mapLine.color = pixelMapper.lineColor;
                mapLine.selectedColor = pixelMapper.lineColor;
                mapLine.pixelMapperLine = true;
                pixelMapper.map.dataProvider.lines.push(mapLine);
                mapLine.validate();
                pixelMapper.map.selectObject(mapLine);
                pixelMapper.selectedObject = mapLine;
                AWScript.createPopup(mapLine);
                pixelMapper.removeTempLine();
            }
        }
    };
})();