//var pilihan = "modal_simulasi";
//var vtipe = "kabupaten";

// load the Maps data
var kabData;
var getarea = [];
var listeners = [{
	"event": "positionChanged",
	"method": kabMethod
}];

ammapprov.addListener("clickMapObject", function(event) {
	
	var getId = event.mapObject.id;
	getarea.push(getId);
	
	kabData = AmCharts.loadJSON(kabUrl+provIdAmmap[getarea.toString()]);
	console.log(kabData);
	
	loadNewMap(AmCharts.maps.indonesiaLow, "indonesiaLow");
	ammap.write(kabupatenMap);
	vtipe = "kabupaten";
	hideProv();
	$('#'+provinsiMap).css('visibility', 'hidden');
	$('#'+kabupatenMap).css('visibility', 'visible');
	$('#opsi').css('visibility', 'visible');
});

var kabDataProvider = {
	map: "indonesiaLow",				// Maps Location -> JS
	areas: [{
		id: getarea.toString()
	}]
	
}
AmCharts.ready(function() {
	ammap = new AmCharts.AmMap();
	ammap.dataProvider = kabDataProvider;	
	ammap.write(kabupatenMap);
});

function loadNewMap (url, mapName) {
  if (AmCharts.maps[mapName] != undefined) {
    // the map was already loaded
    setNewMap(mapName);
	console.log('ada = ',mapName);
  }
  else {
    // let's load the map
    jQuery.getScript(url, function () {
      setNewMap(mapName);
	  console.log('gak ada = ',mapName);
    });
  }
}

function setNewMap (mapName) {
	console.log('kabData= ',kabData);
	
	var dataProvider = {
		mapVar: AmCharts.maps[mapName],		// Maps Data Location -> JS
		images: generateChart(kabData),		// Generating Chart in AmMaps
		linkToObject: getarea.toString(),
		areas: [{
			id: getarea.toString()
		}]
	};
	
	console.log('dataProvider= ',dataProvider);
	
	ammap.dataProvider = dataProvider;
	ammap.mouseWheelZoomEnabled = true;
	ammap.colorSteps = 10;
	ammap.theme = "light";
	ammap.areasSettings = areasSettingsKab;
	ammap.balloon = balloon;
	ammap.listeners = listeners;
	ammap.zoomControl = {
		zoomControlEnabled: false,
		homeButtonEnabled: false,
		panControlEnabled: false,
	}
	ammap.validateData();
}

function generateChart(kabData) {
  var images = [];
  for (var i = 0; i < kabData.length; i++) {
    images.push({
	  "id": kabData[i].id,
	  "title": kabData[i].name,
      "latitude": kabData[i].latitude,
      "longitude": kabData[i].longitude,
      "width": 25,
      "height": pieHeight,
	  "minRadius": pieWidht,
      "pie":
	  /**
		Data Informasi Paslon atau Lainnya yang mempengaruhi informasi Chart atau Bentuk Chart
	  */
	  {
        "type": "pie",
		"balloonText": "",
		"percentPrecision": 0,
        "dataProvider": [{
          "category": "Category #1",
          "value": 1200
        }, {
          "category": "Category #2",
          "value": 500
        }, {
          "category": "Category #3",
          "value": 765
        }, {
          "category": "Category #4",
          "value": 260
        }],
        "labelText": "",
        "valueField": "value",
        "titleField": "category"
      }
	});
  }
  
  console.log('images= ',images);
  
  return images;
}


function kabMethod(event) {
	// get map object
	var map = event.chart;
	
	console.log('kab method = ', map.dataProvider.images);

	// go through all of the images
	for (var x = 0; x < map.dataProvider.images.length; x++) {

		// get MapImage object
		var image = map.dataProvider.images[x];

		// Is it a Pie?
		if (image.pie === undefined) {
			continue;
		}

		// create id
		if (image.id === undefined) {
			image.id = x;
		}
		// Add theme
		if ("undefined" == typeof image.pie.theme) {
			image.pie.theme = map.theme;
		}

		// check if it has corresponding HTML element
		if ("undefined" == typeof image.externalElement) {
			image.externalElement = createCustomKabMarker(image);
		}

		// reposition the element accoridng to coordinates
		var xy = map.coordinatesToStageXY(image.longitude, image.latitude);
		image.externalElement.style.top = xy.y + "px";
		image.externalElement.style.left = xy.x + "px";
		image.externalElement.style.marginTop = Math.round(image.height / -2) + "px";
		image.externalElement.style.marginLeft = Math.round(image.width / -2) + "px";
	}
  
}

function createCustomKabMarker(kab) {

  // Create chart container
  var holder = document.createElement("div");
  holder.id = kab.id;
  holder.title = kab.title;
  holder.style.position = "absolute";
  holder.style.width = kab.width + "px";
  holder.style.height = kab.height + "px";

  // Append the chart container to the map container
  kab.chart.chartDiv.appendChild(holder);

  // Create a pie chart
  var chart = AmCharts.makeChart(kab.id, kab.pie);
  
  // Handle Click on Chart
  chart.addListener("clickSlice", handleClick)
	function handleClick(event){
		var kabId = kab.id;
		var kabName = kab.title;
		//console.log(provId);
		console.log(kab.id);
		$(document).on("click", "#"+kab.id, function () {
			load_modal_profile_kab(
				"modal_simulasi",
				"Data Survei",
				kabId,
				kabName
			  );
			/* $('#myModal').modal('show');
			$.ajax({
				type: "GET", 
				url: modalKabUrl + provId.replace(/\D+/g, ''),
				dataType: "json",               
				success: function(data){
					console.log(data);
					$("tbody").empty();
					var trHTML = '';
					trHTML += '<tbody><tr><td>' + data[0].id + '</td><td>' + data[0].name + '</td><td>' + data[0].prov_name + '</td><td>' + data[0].latitude + '</td><td>' + data[0].longitude + '</td></tr></tbody>';
					$("#content_data").append(trHTML);
				},
				error: function (msg) {
					alert(msg.responseText);
				}
			}); */
		});
		//return;
    }

	return holder;
}

for (var x = 0; x < ammapprov.dataProvider.images.length; x++) {
	var image = ammapprov.dataProvider.images[x];
}

function cleanImage(id) {
	var data = ammap.getObjectById(id);
	var imageDiv;
	if (data) {
		data.deleteObject(); //delete the ammap image object
		imageDiv = document.getElementById(id); //get the custom marker div
		imageDiv.parentNode.removeChild(imageDiv); //remove it from the DOM
	}
}

function reload_home(){
	location.reload();
	
}


function load_modal_profile_kab(modal, judul, vid, vnama) {
  $("#modal_profile").modal("show");
  console.log("pilihan= ", pilihan);
  $("#modal_profile_body").empty();
  $.ajax({
    type: "POST",
    url: modalProvUrl,
    //data: "modal_name="+modal,
    data: { modal_name: pilihan, id: vid, nama: vnama, tipe: vtipe, logo: "" },
    success: function(msg) {
      //console.log(msg);
      $("#modal_profile_body").html(msg);

      var header = "";
      if (pilihan == "modal_simulasi") {
        header =
          "PILIHAN POLITIK TOKOH BERPENGARUH TERHADAPAT CALON GUBERNUR 2018";
      } else if (pilihan == "modal_parpol") {
        header = "PILIHAN PARTAI POLITIK TOKOH BERPENGARUH PADA PEMILU 2019";
      } else if (pilihan == "modal_ketokohan") {
        header = "AFILIASI POLITIK TOKOH BERPENGARUH";
      }

      $("#modal_profile_title").html(
        header + " <br> " + vtipe.toUpperCase() + ": " + vnama
      );
    },
    error: function(result) {
      $("#modal_profile_body").html("Error");
    },
    fail: function(status) {
      $("#modal_profile_body").html("Fail");
    },
    beforeSend: function(d) {
      //$("#modal_profile_body").html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url();?>img/ajax-loader.gif' /></strong></center>");
      $("#modal_profile_body").html(
        "<center><span ><img class='daft-spinner' src='" +
          base_url +
          "/teknopol_dashboard_new/assets2/spinner.png'></span></center>"
      );
    }
  });
}
