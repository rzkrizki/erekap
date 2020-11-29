var pilihan = "modal_simulasi";
var vtipe = "provinsi";
function get_pilihan(val) {
  pilihan = val;
  console.log(pilihan);
}

// load the Maps data
var provData = AmCharts.loadJSON(provUrl);

var ammapprov = AmCharts.makeChart(provinsiMap, {
	"type": "map",
	"theme": "light",									// Theme Style -> JS
	"map.colorSteps": 10,
	"dataProvider": {
		"map": "indonesiaLow",							// Maps Data Location -> JS
		//"getAreasFromMap": true,						// Automatic get Data from Maps Data Location
		"zoomLevel": 0.9,
		"images": generateChart(provData),				// Generating Chart in AmMaps
		"areas"	:[
		{id:"ID-AC"},{id:"ID-BA"},{id:"ID-BB"},{id:"ID-BE"},{id:"ID-BT"},{id:"ID-GO"},{id:"ID-JA"},{id:"ID-JB"},{id:"ID-JI"},{id:"ID-JK"},{id:"ID-JT"},{id:"ID-KB"},{id:"ID-KI"},{id:"ID-KR"},{id:"ID-KS"},{id:"ID-KT"},{id:"ID-KU"},{id:"ID-LA"},{id:"ID-MA"},{id:"ID-MU"},{id:"ID-NB"},{id:"ID-NT"},{id:"ID-PA"},{id:"ID-PB"},{id:"ID-RI"},{id:"ID-SA"},{id:"ID-SB"},{id:"ID-SG"},{id:"ID-SN"},{id:"ID-SR"},{id:"ID-SS"},{id:"ID-ST"},{id:"ID-SU"},{id:"ID-YO"}]
	},
	"areasSettings": areasSettingsProv,
	"mouseWheelZoomEnabled": true,						// Scroll to Zoom in or out
	"balloon": balloon,
	"listeners": [{
		"event": "positionChanged",
		"method": provMethod
	}],
	"zoomControl": zoomControl
});

function generateChart(provData) {
  var images = [];
  for (var i = 0; i < provData.length; i++) {
    images.push({
	  "id": provData[i].id,
	  "title": provData[i].name,
      "latitude": provData[i].latitude,
      "longitude": provData[i].longitude,
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
  return images;
}


function provMethod(event) {
	// get map object
	var map = event.chart;

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
			image.externalElement = createCustomProvMarker(image);
		}

		// reposition the element accoridng to coordinates
		var xy = map.coordinatesToStageXY(image.longitude, image.latitude);
		image.externalElement.style.top = xy.y + "px";
		image.externalElement.style.left = xy.x + "px";
		image.externalElement.style.marginTop = Math.round(image.height / -2) + "px";
		image.externalElement.style.marginLeft = Math.round(image.width / -2) + "px";
	}
}

function createCustomProvMarker(prov) {

  console.log(prov);
  // Create chart container
  var holder = document.createElement("div");
  holder.id = prov.id;
  holder.title = prov.title;
  holder.style.position = "absolute";
  holder.style.width = prov.width + "px";
  holder.style.height = prov.height + "px";

  // Append the chart container to the map container
  prov.chart.chartDiv.appendChild(holder);

  // Create a pie chart
  var chart = AmCharts.makeChart(prov.id, prov.pie);
  
  // Handle Click on Chart
  chart.addListener("clickSlice", handleClick)
	function handleClick(event){
		var provId = prov.id;
		var provName = prov.title;
		 $(document).on("click", "#"+prov.id, function () {
			load_modal_profile(
				"modal_simulasi",
				"Data Survei",
				provId,
				provName
			  );
			/* $.ajax({
				type: "GET", 
				url: modalProvUrl + provId.replace(/\D+/g, ''),
				dataType: "json",               
				success: function(data){
					console.log(data);
					$("tbody").empty();
					var trHTML = '';
					trHTML += '<tbody><tr><td>' + data[0].id + '</td><td>' + data[0].name + '</td><td>' + data[0].alias + '</td><td>' + data[0].latitude + '</td><td>' + data[0].longitude + '</td></tr></tbody>';
					$("#content_data").append(trHTML);
				},
				error: function (msg) {
					alert(msg.responseText);
				}
			}); */
		});
		return;
    }

	return holder;
}

for (var x = 0; x < ammapprov.dataProvider.images.length; x++) {
	var image = ammapprov.dataProvider.images[x];
}

function showProv(){
	// go through all of the images
	for(var p=0; p <= image.id.replace(/\D+/g, ''); p++ ){
		var getPilGubChartId = $("#"+p);
		//getPilGubChartId.css('display', '');
		getPilGubChartId.show(pieAnimation);
	}
}
function hideProv(){
	// go through all of the images
	for(var p=0; p <= image.id.replace(/\D+/g, ''); p++ ){
		var getPilGubChartId = $("#"+p);
		//getPilGubChartId.css('display', 'none');
		getPilGubChartId.hide(pieAnimation);
	}
}


function load_modal_profile(modal, judul, vid, vnama) {
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