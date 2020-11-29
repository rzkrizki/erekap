/**
 * Create a map
 */

var base_url = window.location.origin;
// alert(base_url);

var pilihan = "modal_simulasi";
var vtipe = "provinsi";
function get_pilihan(val) {
  pilihan = val;
  console.log(pilihan);
}

AmCharts.theme = AmCharts.themes.light;

AmCharts.loadJSON = function(url) {
  // create the request
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari
    var request = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    var request = new ActiveXObject("Microsoft.XMLHTTP");
  }

  // load it
  // the last "false" parameter ensures that our code will wait before the
  // data is loaded
  request.open("GET", url, false);
  request.send();

  // parse and return the output
  return eval(request.responseText);
};

// load the Maps data
var mapData = AmCharts.loadJSON(
  base_url + "/teknopol_dashboard_new/home/getprovince/0"
);
var map = AmCharts.makeChart("chartdiv", {
  //id of Ammaps Chart Target
  type: "map",
  theme: "light", // Theme Style -> JS
  "map.colorSteps": 10,

  dataProvider: {
    map: "indonesiaLow", // Maps Data Location -> JS
    getAreasFromMap: true, // Automatic get Data from Maps Data Location
    zoomLevel: 0.9,
    images: generateChart(mapData) // Generating Chart in AmMaps
  },
  areasSettings: {
    // Settings the area
    autoZoom: autoZoom,
    balloonText: "<strong>[[title]]</strong>",
    color: warnaPeta,
    colorSolid: warnaSolid,
    selectedColor: warnaTerpilih,
    outlineColor: warnaJalurProv,
    rollOverColor: rollOverColor,
    rollOverOutlineColor: rollOverOutlineColor
  },
  mouseWheelZoomEnabled: true, // Scroll to Zoom in or out
  balloon: {
    horizontalPadding: 15,
    borderAlpha: 0,
    borderThickness: 1,
    verticalPadding: 15
  },

  /**
   * Add event to execute when the map is zoomed/moved
   * It also is executed when the map first loads
   */
  listeners: [
    {
      event: "positionChanged",
      method: updateCustomMarkers
    }
  ],
  zoomControl: {
    zoomControlEnabled: zoomControll,
    homeButtonEnabled: tombolHome,
    panControlEnabled: navigasiArah,
    right: 38,
    bottom: 30,
    minZoomLevel: 0.25,
    gridHeight: 100,
    gridAlpha: 0.1,
    gridBackgroundAlpha: 0.2,
    gridColor: "#FFFFFF",
    draggerAlpha: 1,
    buttonCornerRadius: 2
  }
});

function generateChart(mapData) {
  var images = [];
  for (var i = 0; i < mapData.length; i++) {
    images.push({
      id: /*"provinsi_id_"+*/ mapData[i].id,
      title: mapData[i].name,
      latitude: mapData[i].latitude,
      longitude: mapData[i].longitude,
      width: 25,
      height: 25,
      minRadius: 120,
      /* generatePie(pieData), */
      pie: {
        type: "pie",
        balloonText: "",
        percentPrecision: 0,
        dataProvider: [
          {
            category: "Category #1",
            value: 1200
          },
          {
            category: "Category #2",
            value: 500
          },
          {
            category: "Category #3",
            value: 765
          },
          {
            category: "Category #4",
            value: 260
          }
        ],
        labelText: "",
        valueField: "value",
        titleField: "category"
      }
    });
  }
  return images;
}

/* var pieData = AmCharts.loadJSON(pieJSON);
function generatePie(pieData){
	var pie = [];
	for (var i = 0; i < pieData.lenght; i++){
		pie.push({
			"type": "pie",
			"balloonText": "",
			"percentPrecision": 0,
			"dataProvider": [{
			  "category": pieData[i].category,
			  "value": pieData[i].value,
			}],
			"labelText": "",
			"valueField": "value",
			"titleField": "category"
		});
	}
	return pie;
} */

function updateHeatmap(event) {
  var map = event.chart;
  if (map.dataGenerated) return;
  if (map.dataProvider.areas.length === 0) {
    setTimeout(updateHeatmap, 100);
    return;
  }
  for (var i = 0; i < map.dataProvider.areas.length; i++) {
    map.dataProvider.areas[i].value = Math.round(Math.random() * 10000);
  }
  map.dataGenerated = true;
  map.validateNow();
}

/**
 * Creates and positions custom markers (pie charts)
 */
function updateCustomMarkers(event) {
  // get map object
  var map = event.chart;

  console.log(event.zoomLevel);

  if (event.zoomLevel > 0.9) {
    vtipe = "kabupaten";
  } else {
    vtipe = "provinsi";
  }

  console.log(vtipe);

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
      image.id = "chart_id_" + x;
    }
    // Add theme
    if ("undefined" == typeof image.pie.theme) {
      image.pie.theme = map.theme;
    }

    // check if it has corresponding HTML element
    if ("undefined" == typeof image.externalElement) {
      image.externalElement = createCustomMarker(image);
    }

    // reposition the element accoridng to coordinates
    var xy = map.coordinatesToStageXY(image.longitude, image.latitude);
    image.externalElement.style.top = xy.y + "px";
    image.externalElement.style.left = xy.x + "px";
    image.externalElement.style.marginTop =
      Math.round(image.height / -2) + "px";
    image.externalElement.style.marginLeft =
      Math.round(image.width / -2) + "px";
  }
}

/**
 * Creates a custom map marker - a div for container and a
 * pie chart in it
 */
function createCustomMarker(image) {
  // Create chart container
  var holder = document.createElement("div");
  holder.id = image.id;
  holder.title = image.title;
  holder.style.position = "absolute";
  holder.style.width = image.width + "px";
  holder.style.height = image.height + "px";

  // Append the chart container to the map container
  image.chart.chartDiv.appendChild(holder);

  // Create a pie chart
  var chart = AmCharts.makeChart(image.id, image.pie);

  // Handle Click on Chart
  chart.addListener("clickSlice", handleClick);
  function handleClick(event) {
    console.log(event);
    $(document).on("click", "#" + image.id, function() {
      //$('#myModal').modal('show');
      //load_modal_profile('modal_ketokohan','Data Influencer','provinsi',image.id,image.title);
      load_modal_profile(
        "modal_simulasi",
        "Data Survei",
        image.id,
        image.title
      );
      //var data = '';
      /* $.ajax({
				type: "GET", 
				url: base_url+'/teknopol_dashboard_new/home/getprovince/'+image.id,
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

function load_modal_profile(modal, judul, vid, vnama) {
  $("#modal_profile").modal("show");
  console.log("pilihan= ", pilihan);
  $("#modal_profile_body").empty();
  $.ajax({
    type: "POST",
    url: base_url + "/teknopol_dashboard_new/dashboard/load_modal_profile/",
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
