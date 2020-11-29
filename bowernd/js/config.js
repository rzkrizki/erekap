/**
* Create AmMaps
*/
var ammap;
var base_url = window.location.origin;
var provUrl = base_url + "/home/getprovince/0";
var kabUrl = base_url + "/home/getprovince/";
var modalProvUrl = base_url + "/dashboard/load_modal_profile/";
var modalKabUrl = base_url + "/dashboard/load_modal_profile/";

var provUrl					= provUrl;
var kabUrl					= kabUrl;
var modalProvUrl			= modalProvUrl;
var modalKabUrl				= modalKabUrl;

// Variable for amMap
var provinsiMap				= 'provinsimap';
var kabupatenMap			= 'kabupatenmap';

// Data Provinsi ID di Ammaps
var provIdAmmap = {};
provIdAmmap["ID-AC"]	= 11;
provIdAmmap["ID-BA"]	= 51;
provIdAmmap["ID-BB"]	= 19;
provIdAmmap["ID-BE"]	= 17;
provIdAmmap["ID-BT"]	= 36;
provIdAmmap["ID-GO"]	= 75;
provIdAmmap["ID-JA"]	= 15;
provIdAmmap["ID-JB"]	= 32;
provIdAmmap["ID-JI"]	= 35;
provIdAmmap["ID-JK"]	= 31;
provIdAmmap["ID-JT"]	= 33;
provIdAmmap["ID-KB"]	= 61;
provIdAmmap["ID-KI"]	= 64;
provIdAmmap["ID-KR"]	= 21;
provIdAmmap["ID-KS"]	= 63;
provIdAmmap["ID-KT"]	= 62;
provIdAmmap["ID-KU"]	= 65;
provIdAmmap["ID-LA"]	= 18;
provIdAmmap["ID-MA"]	= 81;
provIdAmmap["ID-MU"]	= 82;
provIdAmmap["ID-NB"]	= 52;
provIdAmmap["ID-NT"]	= 53;
provIdAmmap["ID-PA"]	= 94;
provIdAmmap["ID-PB"]	= 91;
provIdAmmap["ID-RI"]	= 14;
provIdAmmap["ID-SA"]	= 71;
provIdAmmap["ID-SB"]	= 13;
provIdAmmap["ID-SG"]	= 74;
provIdAmmap["ID-SN"]	= 73;
provIdAmmap["ID-SR"]	= 76;
provIdAmmap["ID-SS"]	= 16;
provIdAmmap["ID-ST"]	= 72;
provIdAmmap["ID-SU"]	= 12;
provIdAmmap["ID-YO"]	= 34;

AmCharts.theme = AmCharts.themes.light;

AmCharts.loadJSON = function(url) {
  // create the request
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari
    var request = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    var request = new ActiveXObject('Microsoft.XMLHTTP');
  }

  // load it
  // the last "false" parameter ensures that our code will wait before the
  // data is loaded
  request.open('GET', url, false);
  request.send();

  // parse and return the output
  return eval(request.responseText);
};

// Warna Peta
var warnaPeta 				= "#fed800";
var warnaSolid				= "#ffffff";
var warnaTerpilih			= "#fed800";
var rollOverColor 			= "#ffff00";
var rollOverOutlineColor	= "#ffffff";
var warnaJalur				= "#ffffff";

// Konfigurasi
var autoZoom				= true; // true for enable, false to disable
var zoomControll			= true; // true for enable, false to disable
var tombolHome				= true; // true for enable, false to disable
var navigasiArah			= true; // true for enable, false to disable

// Break Level to Change Map
/* var provBreakLevel 			= 2;
var provBreakLevelReturn	= 32;
var kabBreakLevel			= 8; */
var amZoomLevel				= 0.9;

/**
* Pie Chart Size
*/
var pieHeight			= 25;
var pieWidht			= 25;
var pieAnimation		= 500;

/**
 * Break Zoom Ammaps to change Prov to Kab Map
 */
/* AmCharts.provBreakLevel			= provBreakLevel;
AmCharts.provBreakLevelReturn	= provBreakLevelReturn; // used to return from GMap
AmCharts.kabBreakLevel			= kabBreakLevel; */

var areasSettingsProv = {								// Settings the area
	"autoZoom": false,
	"selectable": true,
	"balloonText": "<strong>[[title]]</strong>",
	"color": warnaPeta,
	"colorSolid": warnaSolid,
	"selectedColor": warnaTerpilih,
	"outlineColor": warnaJalur,
	"rollOverColor": rollOverColor,
	"rollOverOutlineColor": rollOverOutlineColor,
	"unlistedAreasAlpha": 0
};

var areasSettingsKab = {								// Settings the area
	"autoZoom": autoZoom,
	"balloonText": "<strong>[[title]]</strong>",
	"color": warnaPeta,
	"colorSolid": warnaSolid,
	"selectedColor": warnaTerpilih,
	"outlineColor": warnaJalur,
	"rollOverColor": rollOverColor,
	"rollOverOutlineColor": rollOverOutlineColor,
	//"unlistedAreasAlpha": 0
};

var balloon = {
	"horizontalPadding": 15,
	"borderAlpha": 0,
	"borderThickness": 1,
	"verticalPadding": 15
}

var zoomControl = {
	"zoomControlEnabled": zoomControll,
	"homeButtonEnabled": tombolHome,
	"panControlEnabled": navigasiArah,
	"right": 10,
	"bottom": 10,
	"minZoomLevel": 0.25,
	"gridHeight": 100,
	"gridAlpha": 0.1,
	"gridBackgroundAlpha": 0.2,
	"gridColor": "#FFFFFF",
	"draggerAlpha": 1,
	"buttonCornerRadius": 2
};
