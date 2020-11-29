AmCharts.makeChart( "chart_hasil", {
	"type": "pie",
	"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
	"baseColor": "",
	"titleField": "category",
	"valueField": "column-1",
	"allLabels": [],
	"balloon": {},
	"legend": {
		"enabled": true,
		"align": "center",
		"markerType": "circle"
	},
	"titles": [],
	"dataProvider": [
		{
			"category": "category 1",
			"column-1": 8
		},
		{
			"category": "category 2",
			"column-1": 6
		},
		{
			"category": "category 3",
			"column-1": 2
		}
	]
});