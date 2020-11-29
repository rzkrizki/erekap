/*
 * Copyright 2018. Aji Wahyu Somplak
 * ajiwahyusomplak@gmail.com
 */

'use strict';

var c, currentScrollTop = 0,
navbar = $('nav'),
AWYoutube_thumb = (function () {
    'use strict';

    var video, results;

    var getThumb = function (url, size) {
        if (url === null) {
            return '';
        }
        size    = (size === null) ? 'big' : size;
        results = url.match('[\\?&]v=([^&#]*)');
        video   = (results === null) ? url : results[1];

        if (size === 'small') {
            return 'http://img.youtube.com/vi/' + video + '/2.jpg';
        }
        return 'http://img.youtube.com/vi/' + video + '/0.jpg';
    };

    return {
        thumb: getThumb
    };
}());

(function($) {
    $.widget("app.autocomplete", $.ui.autocomplete, {
        _renderItem: function(ul, item) {
            var data = jQuery(item.option).data();
            var result = this._super(ul, item);
            if (data.icon) {
                result.addClass("ui-menu-item-icon icon-" + data.icon)
            }
            return result;
        }
    });
})(jQuery);
$(function(){
    jQuery('img.svg').each(function(){
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');
    
        jQuery.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');
    
            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }
    
            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');
            
            // Check if the viewport is set, else we gonna set it if we can.
            if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }
    
            // Replace image with new SVG
            $img.replaceWith($svg);
    
        }, 'xml');
    });
});
(function() {
    "use strict";

    function AWScript() {
        this.user = {
            buffer: {},
            selectedObject: {},
            leftClick: false,
            pixelized: false,
            lockListener: false,
            lockDragging: false
        };
        this.transition = 400;
        this.defaults = {
            map: "indonesia",
            pixel: "circle",
            color: "#FFFFFF",
            landColor: "#EACD1C",
            waterColor: "#4D4C52",
            randColor: false,
            custLandWaterColor: {},
            size: 16,
            rollOverSize: 16,
            distance: 1,
            dashLength: 0,
            arrow: "end",
            projection: "mercator",
            selectedMap: map
        };
        this.maps = [];
        this.tool = "pointer";
        this.initialize();
    }
    AWScript.prototype.initialize = function() {
        var _this = this;
        _this.observeWindow();
        _this.observeWidget(".app-controls", _this.defaults, function(ref) {
            if(_this.defaults.custLandWaterColor.length>0){
                jQuery(".app").css({
                    backgroundColor: pixelMapper.handleColor(ref.ref.custLandWaterColor[1])
                });
            }
        });
        _this.loadMap(_this.defaults.map+".js");
        jQuery(".btn").each(function() {
            if (jQuery(this).hasClass("btn-sidemenu")) {
                jQuery(this).on("click", function(e) {
                    e.preventDefault();
                    jQuery(".app").toggleClass("open");
                });
            } else if (jQuery(this).hasClass("btn-toggle")) {
                jQuery(this).on("click", function(e) {
                    e.preventDefault();
                    jQuery(".app-controls").css({
                        overflow: "hidden"
                    }).toggleClass("open");
                    setTimeout(function() {
                        jQuery(".app-controls").css({
                            overflow: "visible"
                        });
                    }, _this.transition);
                    if (jQuery(".app-controls").hasClass("open")) {
                        jQuery(this).find(".ui-label").text("Hide options");
                    } else {
                        jQuery(this).find(".ui-label").text("Show options");
                    }
                });
            } else {
                jQuery(this).on("click", function(e) {
                    e.preventDefault();
                });
            }
        });
        jQuery(".app-controls").draggable({
            handle: ".grip",
            containment: "parent",
            nawrBottomRightInstead: true,
            start: function() {
                jQuery(".app-controls").removeClass("fx");
                jQuery(".app").data({
                    prevClass: jQuery(".app").attr("class")
                }).addClass("dragging");
            },
            using: function(e, ui) {
                var viewport = {
                    width: jQuery(window).width(),
                    height: jQuery(window).height()
                }
                var element = {
                    width: jQuery(".app-controls").width(),
                    height: jQuery(".app-controls").height()
                }
                jQuery(".app-controls").css({
                    bottom: viewport.height - (ui.position.top + element.height),
                    right: viewport.width - (ui.position.left + element.width)
                });
            },
            stop: function(e, ui) {
                var data = jQuery(".app").data();
                jQuery(".app-controls").addClass("fx");
                jQuery(".app-controls").css({
                    width: "",
                    height: ""
                });
                jQuery(".app").attr("class", data.prevClass);
            }
        });
        AmCharts.ready(function() {
            if (AmCharts.isIE && AmCharts.IEversion < 11) {
                jQuery(".app").addClass("lovely-ie");
            }
        });
        jQuery(window).trigger("resize");
    };
    AWScript.prototype.observeWidget = function(target, ref, cb) {
        var _this = this;
        jQuery(target).find("*").on("mouseover", function() {
            jQuery(".app").addClass("disable-cursor");
        }).on("mouseleave", function() {
            jQuery(".app").removeClass("disable-cursor");
        });
        jQuery(target).on("mouseover", function() {
            jQuery(target).addClass("active-menu");
        }).on("mouseleave", function() {
            jQuery(target).removeClass("active-menu");
        }).find("li").on("mouseover", function() {
            if (!jQuery(this).parents("li").hasClass("open")) {
                jQuery(target).find("li").removeClass("open");
            }
            if (!jQuery(this).hasClass("expandable")) {
                return false;
            }
            if (!_this.user.pixelized && (jQuery(this).hasClass("menu-pointer"))) {
                return false;
            }
            jQuery(this).addClass("open");
            if (jQuery(target).hasClass("app-controls")) {
                jQuery(this).find("> ul").position({
                    of: this,
                    my: "left top",
                    at: "left bottom"
                });
            } else {
                jQuery(this).find("> ul").position({
                    of: this,
                    my: "left top",
                    at: "right+3 top",
                    within: ".app-map"
                });
            }
        }).on("mouseleave", function() {
            var item = this;
            if (!jQuery(item).hasClass("lock")) {
                jQuery(item).removeClass("open");
            }
        });
        /*if (jQuery(target).hasClass("draggable")) {
            jQuery(target).draggable({
                handle: ".grip",
                containment: "parent",
                start: function() {
                    jQuery(target).removeClass("fx");
                    jQuery(".app").data({
                        prevClass: jQuery(".app").attr("class")
                    }).addClass("dragging");
                    if (jQuery(target).hasClass("map-popup")) {
                        jQuery(target).addClass("dragged");
                    }
                },
                stop: function(e, ui) {
                    var data = jQuery(".app").data();
                    jQuery(".app").attr("class", data.prevClass);
                    jQuery(target).addClass("fx");
                }
            });
            jQuery(target).resizable();
        }*/
        jQuery(target).find(".map-popup-title").each(function() {
            var data = jQuery(this).data();
            jQuery(this).on("keyup", function() {
                ref[data.type] = this.value;
                if (cb) {
                    cb.apply(_this, [{
                        type: "text",
                        ref: ref
                    }]);
                }
            }).on("focus", function() {
                _this.user.lockListener = true;
            }).on("blur", function() {
                _this.user.lockListener = false;
            }).val(ref[data.type]);
            if (pixelMapper.selectedObject.pixelMapperText) {
                this.focus();
                jQuery(this).select();
            }
        });

        // DropDown Tingkat
        /*jQuery(target).find(".control-dropdown.dapil select").val("1").combobox({
            placeholder: "Name..."
        });*/

        jQuery("#tingkat_dapil").unbind().val("1").select2({
            placeholder: "Pilih Tingkat Dapil",
            width: '100%'
        });

        // DropDown Maps
        /*jQuery(target).find(".control-dropdown.maps select").val("indonesia.js").combobox({
            placeholder: "Name...",
            select: function(event, data) {
                console.log(data.item.value);
                _this.loadMap(data.item.value);
            }
        });*/

        jQuery("#area_provinsi").unbind().select2({
            placeholder: "Pilih Provinsi",
            width: '100%'
        }).change(function(e) {
            var options = jQuery(this);
            load_dapil('#area_dapil', jQuery('#area_provinsi :selected').text());
            _this.defaults.map = options.val().replace('.js', '');
            _this.loadMap(options.val());
        });

        // Dropdown Dapil
        jQuery("#area_dapil").unbind().on('select2:opening', function(){
            var parent  = jQuery('#area_provinsi :selected');
            if(parent.text()=='NASIONAL'){
                Swal({title:'Oops..', text:'Pilih provinsi terlebih dahulu!', type:'error', confirmButtonColor:'#fdd400'});
            }
        });

        // DropDown Projection
        jQuery(".control-dropdown.projection").find('select').val("mercator").combobox({
            placeholder: "Name...",
            select: function(event, data) {
                // console.log(data);
                _this.loadProjection(data.item.value);
                jQuery(".menu-projection").attr("class", "menu-projection icon-" + data.item.value);
            }
        });

        // Map Projection Icon Click
        jQuery(target).find(".menu-projection").on("click", function() {
            jQuery(target).find(".control-dropdown.projection input").trigger("focus");
        });

        if (cb) {
            cb.apply(_this, [{ref: ref}]);
        }
        
        _this.user.selectedObject = ref;
    };

    AWScript.prototype.removePopups = function() {
        var _this = this;
        var popups = jQuery(".app-map .map-popup");
        popups.each(function() {
            var position = jQuery(this).position();
            jQuery(this).css({
                top: position.top + 50,
                opacity: 0
            });
        });
        setTimeout(function() {
            popups.remove();
        }, _this.transition);
    };

    AWScript.prototype.autoCompleteViewport = function() {
        jQuery(".ui-autocomplete").css({
            maxHeight: jQuery(".app").height() / 2
        });
    };

    AWScript.prototype.observeWindow = function() {
        var _this = this;
        jQuery(window).on("resize", _this.autoCompleteViewport);
        jQuery(window).on("resize", function(e) {
            var viewport = {
                width: jQuery(window).width(),
                height: jQuery(window).height()
            }
            /*if (viewport.width < 1240) {
                jQuery(".app-controls").addClass("portrait");
            } else {
                jQuery(".app-controls").removeClass("portrait");
            }*/
            jQuery(".app-controls").position({
                of: ".app-map",
                my: "right bottom",
                at: "right bottom",
                within: ".app-map",
                using: function(pos, cfg) {
                    var viewport = {
                        width: jQuery(window).width(),
                        height: jQuery(window).height()
                    }
                    jQuery(cfg.element.element).css({
                        top: viewport.height - (pos.top + cfg.element.height) + 20 + jQuery(".menu-w").height(),
                        // right: viewport.width - (pos.left + cfg.element.width) + 20
                        // right: '50%',
                        left: (jQuery('.app-map').width() - jQuery(this).width())/2
                        // marginLeft: -jQuery('.app-controls').width()/2
                    }).addClass("fx");
                }
            });
        });
    };

    AWScript.prototype.isPressed = function(event) {
        var _this = this;
        if (event.type == "mousemove" && event.which === 1) {} else if (event.type == "touchmove" || event.buttons === 1 || event.button === 1 || event.which === 1) {
            _this.user.leftClick = true;
        } else {
            _this.user.leftClick = false;
        }
        return _this.user.leftClick;
    };

    AWScript.prototype.cover = function(cfg) {
        var _this = this;
        var ring = jQuery(".app-cover-ring");
        var data = ring.data();
        var totalLength = 500;
        var startLength = totalLength * (cfg.start || 0) / 100;
        var endLength = totalLength * (cfg.end || 100) / 100;
        var duration = cfg.duration || _this.transition;
        if (cfg.start === undefined) {
            startLength = data.progress || 0;
        } else if (cfg.start === 0) {
            jQuery(".app").addClass("cover");
            if (cfg.duration === undefined) {
                duration = 2000;
            }
        }
        jQuery(ring).stop();
        if (cfg.text) {
            jQuery(".app-cover-text").text(cfg.text);
        }
        jQuery(ring).prop("number", startLength).animateNumber({
            number: endLength,
            easing: 'easeInQuad',
            numberStep: function(now, tween) {
                jQuery(ring).data({
                    progress: now
                }).attr('stroke-dashoffset', 500 - now);
                if (now == totalLength) {
                    jQuery(".app").removeClass("cover");
                }
            }
        }, duration, cfg.complete);
    }

    AWScript.prototype.loadProjection = function(projection) {
        var _this = this;
        _this.defaults.projection = projection;
        _this.map.setProjection(projection);
    }

    AWScript.prototype.loadMap = function(fileName, recall) {
        var _this = this;
        var mapName = fileName.replace(".js", "");
        _this.user.loadMap = mapName;
        jQuery(".app").addClass("loading");
        if (_this.maps.indexOf(fileName) == -1) {
            _this.maps.push(fileName);
            var node = document.createElement("script");
            node.setAttribute("type", "text/javascript");
            node.setAttribute("src", "bowernd/awscript/dist/maps/" + fileName);
            node.addEventListener("load", function() {
                _this.loadMap(fileName, true);
            });
            document.head.appendChild(node);
            _this.cover({
                text: "Loading...",
                start: 0,
                end: 90
            });
            return;
        } else if (!recall) {
            _this.cover({
                text: "Loading...",
                start: 0,
                end: 90
            });
        }
        setTimeout(function() {
            if (_this.map) {
                _this.map.destroy();
            }
            _this.map = pixelMapper.createMap(mapName);
            _this.map.addListener("init", function() {
                _this.cover({
                    end: 100,
                    complete: function() {
                        jQuery(".app").removeClass("loading init");
                    }
                });
            });
            _this.map.addListener("drawn", function(e) {
                clearTimeout(e.chart.pixelMapperTimeout);
                e.chart.pixelMapperTimeout = setTimeout(function() {
                    _this.cover({
                        end: 100,
                        complete: function() {
                            jQuery(".app").removeClass("loading init generating");
                        }
                    });
                }, _this.transition);
            });
        }, 500);
    };
    
    jQuery(document).ready(function() {
        window.AWScript = new AWScript();
    });
})();
(function($) {
    "use strict";
    function AWGeneral(){}

    AWGeneral.prototype.GeneralStyle = function(target, do_something, attr, value, tofind){
        if(tofind != null || tofind!=='undefined'){
            if(value != null || value!=='undefined'){
                jQuery(target).find(tofind)[do_something](attr, value);
            } else {
                jQuery(target).find(tofind)[do_something](attr);
            }
        } else if(attr != null) {
            if(value != null || value!=='undefined'){
                jQuery(target)[do_something](attr, value);
            } else {
                jQuery(target)[do_something](attr);
            }
        } else {
            jQuery(target)[do_something];
        }
    };

    jQuery(document).ready(function() {
        window.AWGeneral = new AWGeneral();
    });
})();