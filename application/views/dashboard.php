
<!DOCTYPE html>
<html>
    <head>
        <title>SIPP Dashboard</title>
        <meta charset="utf-8">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <meta content="template language" name="keywords">
        <meta content="Tamerlan Soziev" name="author">
        <meta content="Admin dashboard html template" name="description">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="favicon.png" rel="shortcut icon">
        <link href="apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
        <link href="<?=base_url()?>bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="<?=base_url()?>bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
        <link href="<?=base_url()?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?=base_url()?>bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="<?=base_url()?>bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
        <link href="<?=base_url()?>bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
        <link href="<?=base_url()?>bower_components/pace/pace.css" rel="stylesheet">
        <link href="<?=base_url()?>bower_components/switchery/switchery.min.css" rel="stylesheet">
        <link href="<?=base_url()?>css/main.css?version=4.2.0" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/dafters.css" rel="stylesheet">
        
        <style type="text/css">
            .middle{
                margin: auto;
            }
        </style>
    </head>
    <body>
        <div class="all-wrapper menu-top">
            <?php include 'template/menu.php' ?>
            <div class="layout-w">
                <?php include 'template/mobile.php' ?>
                <div class="content-w">
                    <div class="content-i">
                        <div class="content-box" style="padding-top: 10px;padding-left: 10px;padding-right: 10px;padding-bottom: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper" style="padding-bottom: 0px;">
                                        <h6 class="element-header">Dashboard</h6>

                                        <div class="element-content">
                                                <div class="row">
                                                        <div class="col-sm-3">
                                                            <a class="element-box el-tablo" href="#">
                                                                <div class="label">DATA PEMILIH TETAP</div>
                                                                <div class="value">0</div>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <a class="element-box el-tablo" href="#">
                                                                <div class="label">DATA INFLUENCER</div>
                                                                <div class="value"><?php echo number_format($jum_influencer) ?></div>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <a class="element-box el-tablo" href="#">
                                                                <div class="label">DATA SURVEY</div>
                                                                <div class="value">0</div>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <a class="element-box el-tablo" href="#">
                                                                <div class="label">DATA POTENSI DESA</div>
                                                                <div class="value">0</div>
                                                            </a>
                                                        </div>
                                                    </div>
                                            </div>

                                        <div class="element-box">
                                            

                                          <div class="os-tabs-w">
                                            <div class="os-tabs-controls">
                                              <ul class="nav nav-tabs smaller">
                                                <li class="nav-item">
                                                  <a class="nav-link active" data-toggle="tab" href="#tab_maps">Influencer</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#tab_paslon">Survey</a>
                                                </li>
                                              </ul>
                                            </div>
                                            <div class="tab-content">
                                              <div class="tab-pane active" id="tab_maps">
                                                <div class="el-tablo bigger">
                                                </div>
                                                <div class="element-content">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="element-box">
                                                                <div id="pie" style="width: 100%;height: 405px;"></div>        
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="element-box">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="middle">
                                                                            <label for="switch-0-1">Intangible</label>
                                                                            <input id="check" type="checkbox" class="js-switch" checked />
                                                                            <label for="switch-0-1">Tangible</label>
                                                                        </div>
                                                                        <br>
                                                                        <select id="ketokohan" class="form-control form-control-sm rounded"></select>
                                                                        <br>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div id="chartdiv2" style="width: 100%;height: 300px;"></div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div id="chartdiv" style="width: 100%;height: 300px;"></div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="element-box">
                                                                <div class="row">
                                                                    <div class="col-sm-2">
                                                                    <select id="wilayah" class="form-control form-control-sm rounded">
                                                                        <option value="ALL">ALL</option>
                                                                        <?php foreach ($provinsi as $key => $value): ?>
                                                                            <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label id="label_graph_bawah"></label>
                                                                </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div id="influence_by_province" style="width: 100%;height: 700px;"></div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="tab-pane" id="tab_paslon">
                                                    <div class="element-content">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="element-box">
                                                                    <h5><center>Partai yang dicoblos pada pemilu 2014</center></h5>
                                                                    <div id="pie_1" style="width: 100%;height: 405px;"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="element-box">
                                                                    <h5><center>Partai yang dicoblos pada pemilu 2014 (Lain- lain)</center></h5>
                                                                    <div id="pie_2" style="width: 100%;height: 405px;"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="element-box">
                                                                    <h5><center>Partai yang akan dicoblos pada pemilu 2019</center></h5>
                                                                    <div id="pie_3" style="width: 100%;height: 405px;"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="element-box">
                                                                    <h5><center>Partai yang akan dicoblos pada pemilu 2019 (Lain- lain)</center></h5>
                                                                    <div id="pie_4" style="width: 100%;height: 405px;"></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="element-box">
                                                                    <h5><center>Persoalan yang paling pokok</center></h5>
                                                                    <div class="col-sm-2">
                                                                        <select id="wilayah_1" class="form-control form-control-sm rounded">
                                                                            <option value="ALL">ALL</option>
                                                                            <?php foreach ($provinsi as $key => $value): ?>
                                                                                <option value="<?= $value->name ?>"><?= $value->name ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div id="s_p1" style="width: 100%;height: 700px;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="element-box">
                                                                    <h5><center>Yang perlu mendapat penanganan dari Pemerintah secepatnya</center></h5>
                                                                    <div class="col-sm-2">
                                                                        <select id="wilayah_2" class="form-control form-control-sm rounded">
                                                                            <option value="ALL">ALL</option>
                                                                            <?php foreach ($provinsi as $key => $value): ?>
                                                                                <option value="<?= $value->name ?>"><?= $value->name ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div id="s_p2" style="width: 100%;height: 700px;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="display-type"></div>
            <div aria-hidden="true" aria-labelledby="myLargeModalLabel" id="modal_detail" class="modal fade bd-example-modal-lg" role="dialog" tabindex="-1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Detail
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                    <table id="table_detail" width="100%" class="table table-striped table-lightfont"></table>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button><button class="btn btn-primary" type="button"> Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            <div aria-hidden="true" aria-labelledby="myLargeModalLabel" id="modal_partai" class="modal fade bd-example-modal-lg" role="dialog" tabindex="-1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Ketokohan : 
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                          <thead>
                            <tr>
                              <th>Partai</th>
                              <th>Persentase</th>
                            </tr>
                          </thead>
                          <tbody id="body_tabel">
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button><button class="btn btn-primary" type="button"> Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" id="base" value="<?=base_url()?>">
            <input type="hidden" id="type_form" value="<?=base_url()?>">
            <input type="hidden" id="ketokohan_form" value="<?=base_url()?>">
        </div>
        <script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?=base_url()?>bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?=base_url()?>bower_components/moment/moment.js"></script>
        <script src="<?=base_url()?>bower_components/chart.js/dist/Chart.min.js"></script>
        <script src="<?=base_url()?>bower_components/select2/dist/js/select2.full.min.js"></script>
        <script src="<?=base_url()?>bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
        <script src="<?=base_url()?>bower_components/ckeditor/ckeditor.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap-validator/dist/validator.min.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?=base_url()?>bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
        <script src="<?=base_url()?>bower_components/dropzone/dist/dropzone.js"></script>
        <script src="<?=base_url()?>bower_components/editable-table/mindmup-editabletable.js"></script>
        <script src="<?=base_url()?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="<?=base_url()?>bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="<?=base_url()?>bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="<?=base_url()?>bower_components/tether/dist/js/tether.min.js"></script>
        <script src="<?=base_url()?>bower_components/slick-carousel/slick/slick.min.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap/js/dist/util.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap/js/dist/alert.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap/js/dist/button.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap/js/dist/carousel.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap/js/dist/collapse.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap/js/dist/dropdown.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap/js/dist/modal.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap/js/dist/tab.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap/js/dist/tooltip.js"></script>
        <script src="<?=base_url()?>bower_components/bootstrap/js/dist/popover.js"></script>
        <script src="<?=base_url()?>bower_components/pace/pace.min.js"></script>
        <script src="<?=base_url()?>bower_components/switchery/switchery.min.js"></script>
        <script src="<?=base_url()?>js/dataTables.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>js/main.js?version=4.2.0"></script>
        <script src="<?=base_url()?>bower_components/amcharts/amcharts.js"></script>
        <script src="<?=base_url()?>bower_components/amcharts/serial.js"></script>
        <script src="<?=base_url()?>bower_components/amcharts/pie.js"></script>
        <script src="<?=base_url()?>bower_components/amcharts/themes/light.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var elem = document.querySelector('.js-switch');
                var init = new Switchery(elem, { color: '#fffff', secondaryColor: '#fffff', jackColor: '#c72a00', jackSecondaryColor: '#c72a00' });
                $("#ketokohan_form").val('ALL');
                load_pertokohan();
                generate_chart($("#ketokohan_form").val(),$("#type_form").val());
                generate_chart_2('ALL');
                generate_chart_3('ALL');
                generate_chart_4('ALL');
                generate_chart_5('ALL');
                generate_chart_6('ALL');
                generate_chart_7('ALL');
                generate_chart_8('ALL');
            });
            
            $("#check").change(function() {
                $("#ketokohan_form").val('ALL');
                load_pertokohan();
                generate_chart($("#ketokohan_form").val(),$("#type_form").val());
            })
            function load_pertokohan(){
                if( $("#check").is(':checked') ){
                    $("#type_form").val('1');
                }else{
                    $("#type_form").val('0');
                }

                $.ajax({
                    url: "<?php echo site_url('dashboard/get_pertokohan/')?>"+$("#type_form").val(),
                    cache: false,
                    type:"GET",
                    success: function(respond){
                        $("#ketokohan").html(respond);
                    }
                })
            }
            $("#ketokohan").change(function() {
                id = $(this).val();
                $("#ketokohan_form").val(id);
                generate_chart($("#ketokohan_form").val(),$("#type_form").val());
                
            });

            $("#wilayah").change(function() {
                id = $(this).val();
                generate_chart_2(id);
                
            });

            $("#wilayah_1").change(function() {
                id = $(this).val();
                generate_chart_3(id);
                
            });

            $("#wilayah_2").change(function() {
                id = $(this).val();
                generate_chart_4(id);
                
            });

            function generate_chart(id,type){
                $.ajax({
                    url: "<?php echo site_url('dashboard/get_top_4/')?>"+id+'/'+type,
                    cache: false,
                    type:"GET",
                    success: function(respond){
                        data = JSON.parse(respond);
                        var chart = AmCharts.makeChart("chartdiv",
                        {
                            "type": "serial",
                            "theme": "light",
                            "dataProvider": data.chart,
                            "listeners": [{
                                "event": "clickGraphItem",
                                "method": function(event) {
                                    Pace.track(function(){
                                        var table = $('#table_detail').DataTable();
                                        table.ajax.url("<?= site_url('dashboard/detail_influencer/')?>"+event.item.category+'/'+$("#ketokohan_form").val()+'/'+$("#type_form").val()).load();
                                        $("#modal_detail").modal('show');
                                    })
                                }
                            }],
                            "startDuration": 2,
                            "graphs": [{
                                "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]] %</b></span>",
                                "bulletOffset": 10,
                                "labelText": "[[value]]%",
                                "bulletSize": 42,
                                "colorField": "color",
                                "cornerRadiusTop": 8,
                                // "customBulletField": "bullet",
                                "fillAlphas": 0.8,
                                "lineAlpha": 0,
                                "type": "column",
                                "valueField": "points"
                            }],
                            "marginTop": 0,
                            "marginRight": 0,
                            "marginLeft": 0,
                            "marginBottom": 0,
                            // "autoMargins": false,
                            "categoryField": "name",
                            "categoryAxis": {
                                "gridColor": "#FFFFFF",
                                "gridPosition": "start",
                                "axisAlpha": 0,
                                "fillAlpha": 0.00,
                                "position": "left",
                                "labelRotation": 90
                            },
                            "valueAxes": [ {
                            	"axisAlpha": 0,
                            	"labelsEnabled" : false,
							    "gridColor": "#FFFFFF",
							    "gridAlpha": 0,
							    "dashLength": 0
							} ],
                        });
                        var chart = AmCharts.makeChart("chartdiv2", {
                          "type": "pie",
                          "theme": "light",
                          "labelRadius": -35,
                          "labelText": "[[percents]]%",
                          "legend":{
                                "position":"bottom",
                                "valueWidth" : 0,
                              },
                          "dataProvider": [ {
                            "country": "Netral",
                            "litres": data.jum_netral
                          }, {
                            "country": "Punya Afiliasi Politik",
                            "litres": data.jum_pilih
                          }],
                          "valueField": "litres",
                          "titleField": "country"
                        });
       //                  var chart = AmCharts.makeChart( "chartdiv2", {
       //                    "type": "pie",
       //                    "theme": "light",
       //                    "dataProvider": [ {
       //                      "country": "Netral",
       //                      "litres": data.jum_netral
       //                    }, {
       //                      "country": "Memilih",
       //                      "litres": data.jum_pilih
       //                    }],
       //                    "valueField": "litres",
       //                    "titleField": "country",
       //                     "balloon":{
       //                     "fixedPosition":true
       //                    },
       //                    "export": {
       //                      "enabled": true
       //                    }
       //                  } );
       //                  var chart = AmCharts.makeChart("chartdiv2",
       //                  {
       //                      "type": "serial",
       //                      "theme": "light",
       //                      "dataProvider": [
       //                      {
       //                          "name": "Netral",
       //                          "points": data.jum_netral,
       //                          "color" : "#bdb9b9",
       //                          "bullet" : "<?php echo site_url('img/logo_parpol/netral.png')?>" 
       //                      },
       //                      {
       //                          "name": "Memilih",
       //                          "points": data.jum_pilih,
       //                          "color" : "#873444",
       //                          "bullet" : "<?php echo site_url('img/logo_parpol/votepng.png')?>"
       //                      },
       //                      ],
       //                      "startDuration": 2,
       //                      "graphs": [{
       //                          "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]] %</b></span>",
       //                          "labelText": "[[value]]%",
       //                          "bulletOffset": 10,
       //                          "bulletSize": 52,
       //                          "colorField": "color",
       //                          "cornerRadiusTop": 8,
       //                          // "customBulletField": "bullet",
       //                          "fillAlphas": 0.8,
       //                          "lineAlpha": 0,
       //                          "type": "column",
       //                          "valueField": "points"
       //                      }],
       //                      "marginTop": 0,
       //                      "marginRight": 0,
       //                      "marginLeft": 0,
       //                      "marginBottom": 0,
       //                      // "autoMargins": false,
       //                      "categoryField": "name",
       //                      "categoryAxis": {
       //                          "gridColor": "#FFFFFF",
       //                          "gridPosition": "start",
       //                          "fillAlpha": 0.00,
       //                          "axisAlpha": 0,
       //                          "position": "left",
       //                          // "labelRotation": 90
       //                      },
       //                      "valueAxes": [ {
       //                      	"axisAlpha": 0,
       //                      	"labelsEnabled" : false,
							//     "gridColor": "#FFFFFF",
							//     "gridAlpha": 0,
							//     "dashLength": 0
							// } ],
       //                  });
                    }
                })
            }

            function generate_chart_2(id){
                $.ajax({
                    url: "<?php echo site_url('dashboard/get_graph_bawah/')?>"+id,
                    cache: false,
                    type:"GET",
                    success: function(respond){
                        data = JSON.parse(respond);
                        $("#label_graph_bawah").text('N : '+data.total);
                        console.log(data);
                        var chart = AmCharts.makeChart("influence_by_province", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": data.chart,
                          "listeners": [{
                                "event": "clickGraphItem",
                                "method": function(event) {
                                    Pace.track(function(){
                                        area = $("#wilayah").val();
                                        category = event.item.category;
                                        // category = encodeURI(category);
                                        $.get( "<?=base_url()?>dashboard/table_kecondongan", { area: area, category:category } )
                                          .done(function( data ) {
                                            obj = JSON.parse(data)
                                            $("#body_tabel").html(obj);
                                            $("#modal_partai").modal('show');
                                          });
                                        // $.get( "<?=base_url()?>dashboard/table_kecondongan"+, function( data ) {
                                        //   alert( "Data Loaded: " + data );
                                        // });
                                        // $("#modal_partai").modal('show');
                                    })
                                }
                            }],
                          "startDuration": 2,
                          "graphs": [{
                            "balloonText": "<b>[[category]]: [[value]] %</b>",
                            "fillColorsField": "color",
                            "labelText": "[[value]]%",
                            "fillAlphas": 0.9,
                            "lineAlpha": 0.2,
                            "type": "column",
                            "valueField": "points"
                          }],
                          "chartCursor": {
                            "categoryBalloonEnabled": false,
                            "cursorAlpha": 0,
                            "zoomable": false
                          },
                          "rotate": true,
                          "categoryField": "name",
                          "categoryAxis": {
                                "axisAlpha": 0,
                                "gridAlpha": 0,
                                // "inside": true,
                                "tickLength": 0
                            },
                          "valueAxes": [ {
                          		"axisAlpha": 0,
                          		"labelsEnabled" : false,
							    "gridColor": "#FFFFFF",
							    "gridAlpha": 0.2,
							    "dashLength": 0
							} ],

                        });
                    }
                })
            }

            function generate_chart_3(id){
                $.ajax({
                    url: "<?php echo site_url('dashboard/get_survey_p1/')?>"+id,
                    cache: false,
                    type:"GET",
                    success: function(respond){
                        data = JSON.parse(respond);

                        var chart = AmCharts.makeChart("s_p1", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": data.chart,
                          "startDuration": 2,
                          "graphs": [{
                            "balloonText": "<b>[[category]]: [[value]] %</b>",
                            "fillColorsField": "color",
                            "labelText": "[[value]]%",
                            "fillAlphas": 0.9,
                            "lineAlpha": 0.2,
                            "type": "column",
                            "valueField": "points"
                          }],
                          "chartCursor": {
                            "categoryBalloonEnabled": false,
                            "cursorAlpha": 0,
                            "zoomable": false
                          },
                          "rotate": true,
                          "categoryField": "name",
                          "categoryAxis": {
                                "axisAlpha": 0,
                                "gridAlpha": 0,
                                // "inside": true,
                                "tickLength": 0
                            },
                          "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0.2,
                                "dashLength": 0
                            } ],

                        });
                    }
                })
            }

            function generate_chart_4(id){
                $.ajax({
                    url: "<?php echo site_url('dashboard/get_survey_p2/')?>"+id,
                    cache: false,
                    type:"GET",
                    success: function(respond){
                        data = JSON.parse(respond);
                        console.log(data);
                        var chart = AmCharts.makeChart("s_p2", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": data.chart,
                          "startDuration": 2,
                          "graphs": [{
                            "balloonText": "<b>[[category]]: [[value]] %</b>",
                            "fillColorsField": "color",
                            "labelText": "[[value]]%",
                            "fillAlphas": 0.9,
                            "lineAlpha": 0.2,
                            "type": "column",
                            "valueField": "points"
                          }],
                          "chartCursor": {
                            "categoryBalloonEnabled": false,
                            "cursorAlpha": 0,
                            "zoomable": false
                          },
                          "rotate": true,
                          "categoryField": "name",
                          "categoryAxis": {
                                "axisAlpha": 0,
                                "gridAlpha": 0,
                                // "inside": true,
                                "tickLength": 0
                            },
                          "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0.2,
                                "dashLength": 0
                            } ],

                        });
                    }
                })
            }

            function generate_chart_5(id){
                $.ajax({
                   url: "<?php echo site_url('dashboard/get_survey_p3/')?>"+id,
                    cache: false,
                    type:"GET",
                    success: function(respond){
                        data = JSON.parse(respond);
                        var chart = AmCharts.makeChart("pie_1", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": data.chart,
                          "startDuration": 2,
                          "graphs": [{
                            "balloonText": "<b>[[category]]: [[value]] %</b>",
                            "fillColorsField": "color",
                            "labelText": "[[value]]%",
                            "fillAlphas": 0.9,
                            "lineAlpha": 0.2,
                            "type": "column",
                            "valueField": "points"
                          }],
                          "chartCursor": {
                            "categoryBalloonEnabled": false,
                            "cursorAlpha": 0,
                            "zoomable": false
                          },
                          "rotate": true,
                          "categoryField": "nama",
                          "categoryAxis": {
                                "axisAlpha": 0,
                                "gridAlpha": 0,
                                // "inside": true,
                                "tickLength": 0
                            },
                          "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0.2,
                                "dashLength": 0
                            } ],

                        });
                    }
                })
            }

            function generate_chart_6(id){
                $.ajax({
                   url: "<?php echo site_url('dashboard/get_survey_p3_2/')?>"+id,
                    cache: false,
                    type:"GET",
                    success: function(respond){
                        data = JSON.parse(respond);
                        console.log(data);
                        var chart = AmCharts.makeChart("pie_2", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": data.chart,
                          "startDuration": 2,
                          "graphs": [{
                            "balloonText": "<b>[[category]]: [[value]] %</b>",
                            "fillColorsField": "color",
                            "labelText": "[[value]]%",
                            "fillAlphas": 0.9,
                            "lineAlpha": 0.2,
                            "type": "column",
                            "valueField": "points"
                          }],
                          "chartCursor": {
                            "categoryBalloonEnabled": false,
                            "cursorAlpha": 0,
                            "zoomable": false
                          },
                          "rotate": true,
                          "categoryField": "nama",
                          "categoryAxis": {
                                "axisAlpha": 0,
                                "gridAlpha": 0,
                                // "inside": true,
                                "tickLength": 0
                            },
                          "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0.2,
                                "dashLength": 0
                            } ],

                        });
                    }
                })
            }

            function generate_chart_7(id){
                $.ajax({
                   url: "<?php echo site_url('dashboard/get_survey_p4/')?>"+id,
                    cache: false,
                    type:"GET",
                    success: function(respond){
                        data = JSON.parse(respond);
                        console.log(data);
                        var chart = AmCharts.makeChart("pie_3", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": data.chart,
                          "startDuration": 2,
                          "graphs": [{
                            "balloonText": "<b>[[category]]: [[value]] %</b>",
                            "fillColorsField": "color",
                            "labelText": "[[value]]%",
                            "fillAlphas": 0.9,
                            "lineAlpha": 0.2,
                            "type": "column",
                            "valueField": "points"
                          }],
                          "chartCursor": {
                            "categoryBalloonEnabled": false,
                            "cursorAlpha": 0,
                            "zoomable": false
                          },
                          "rotate": true,
                          "categoryField": "nama",
                          "categoryAxis": {
                                "axisAlpha": 0,
                                "gridAlpha": 0,
                                // "inside": true,
                                "tickLength": 0
                            },
                          "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0.2,
                                "dashLength": 0
                            } ],
                        });
                    }
                })
            }

            function generate_chart_8(id){
                $.ajax({
                   url: "<?php echo site_url('dashboard/get_survey_p4_2/')?>"+id,
                    cache: false,
                    type:"GET",
                    success: function(respond){
                        data = JSON.parse(respond);
                        console.log(data);
                        var chart = AmCharts.makeChart("pie_4", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": data.chart,
                          "startDuration": 2,
                          "graphs": [{
                            "balloonText": "<b>[[category]]: [[value]] %</b>",
                            "fillColorsField": "color",
                            "labelText": "[[value]]%",
                            "fillAlphas": 0.9,
                            "lineAlpha": 0.2,
                            "type": "column",
                            "valueField": "points"
                          }],
                          "chartCursor": {
                            "categoryBalloonEnabled": false,
                            "cursorAlpha": 0,
                            "zoomable": false
                          },
                          "rotate": true,
                          "categoryField": "nama",
                          "categoryAxis": {
                                "axisAlpha": 0,
                                "gridAlpha": 0,
                                // "inside": true,
                                "tickLength": 0
                            },
                          "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0.2,
                                "dashLength": 0
                            } ],

                        });
                    }
                })
            }
        </script>

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Kategori', 'Jumlah'],
              ['Tangible', <?php echo $jum_tangible ?>],
              ['Intangible', <?php echo $jum_intangible ?>]
            ]);
            var options = {
              title: 'Tangible & Intangible',
              legend: {position: 'bottom'}
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie'));

            chart.draw(data, options);
          }
        </script>

    <!-- TABLE DETAIL -->
    <script type="text/javascript">
        $('#table_detail').DataTable({
            columns: [
                        { data: 'name', title: "Nama"},
                        { data: 'phone', title: "Telephone"},
                        { data: 'pertokohan', title: "Pertokohan" },
                        { data: 'prov', title: "Provinsi" },
                        { data: 'kab', title: "Kab"},
                        { data: 'kec', title: "Kec" },
                        { data: 'kel', title: "Kel" },
                        { data: 'informasi_tambahan', title: "Informasi Tambahan" },
                    ],
            "autoWidth": false,
        });
    </script>
    <script type="text/javascript">
        function generate_chart2(id_provinsi){
            $.ajax({
                url: "<?php echo site_url('dashboard/get_chart_by_provinsi/')?>"+id_provinsi,
                cache: false,
                type:"GET",
                success: function(respond){
                    console.log(respond);
                    data = JSON.parse(respond);
                }
            })
        }
    </script>

    </body>
</html>
