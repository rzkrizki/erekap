
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
        <link href="<?=base_url()?>css/main.css?version=4.2.0" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/dafters.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?=base_url()?>bower_components/fancytree/skin-win8/ui.fancytree.min.css">
		  <style>
			#preferensi_jml {
			  width: 100%;
			  height: 350px;
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
                                <div class="col-sm-3">
                                    <div class="element-wrapper" style="padding-bottom: 0px;">
                                        <h6 class="element-header">Navigasi Wilayah</h6>
                                        <div class="element-box" style="padding-left: 2px;padding-right:2px;overflow: auto;height: 580px;">
                                            <div id="tree2">
                                                <ul id="treeData" style="display: none;">
                                                    <li  data-tipe='provinsi' data-nama="" data-id="0">NASIONAL</li>
                                                    <?php foreach ($provinsi as $key => $value) { ?>
                                                    <li class="lazy" data-tipe='provinsi' data-nama="<?php echo $value->name?>" data-id="<?php echo $value->id?>"><?php echo $value->name?>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">
                                          Informasi
                                        </h6>
                                        <div class="element-boxx">
                                          <div class="os-tabs-w">
                                            <div class="os-tabs-controls">
                                              <ul class="nav nav-tabs upper">
                                                <li class="nav-item">
                                                  <a class="nav-link active" data-toggle="tab" href="#tab_maps">Maps</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#tab_paslon">Paslon</a>
                                                </li>
												<li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#tab_simulasi">Simulasi</a>
                                                </li>
												<li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#tab_dpt">DPT</a>
                                                </li>
												<li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#tab_influencer">Influencer</a>
                                                </li>
												<li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#tab_survey">Survey</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#tab_profile">Profile</a>
                                                </li>
                                                </li>
                                              </ul>
                                            </div>
                                            <div class="tab-content">
                                              <div class="tab-pane active" id="tab_maps">
												<div class="row">
													<div class="col-sm-6">
                                                        <div  class="element-box">
                                                        <label id="label_map">Judul</label>
														<iframe id="frame" height="300" frameborder="0" style="border:0; width: 100%"
															src="https://www.google.com/maps/embed/v1/place?key=AIzaSyARSxVnQPIC6yvDqFNwpy0Ym5sMpRk-dSs&q=INDONESIA" allowfullscreen>
														</iframe>
													</div>
													</div>
													<div class="col-sm-6 bukan-nasional">
                                                        <div  class="element-box">
                                                        <label>Pasangan Calon</label>
														<div  style="padding-top: 0px;" id="table_paslon_depan"></div>
                                                        </div>
													</div>
                                                    <div class="col-sm-6 nasional">
                                                        <label>Hasil Survey Pilpres 2014</label>
                                                        <div class="element-box" style="padding-top: 0px;" >
                                                             <div id="nasional_2014" style="width: 100%;height: 300px;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 nasional">
                                                        <label>Hasil Survey Pilpres 2019 (10 Besar)</label>
                                                        <div class="element-box" style="padding-top: 0px;">
                                                            <div id="nasional_2019_a" style="width: 100%;height: 300px;"></div>
                                                        </div>
                                                    </div>
												</div>
												<div class="row">  
														<div class="col-sm-6">
                                                            <div class="element-box">
                                                                <label>Persoalan Yang Paling Pokok</label>
                                                                <div id="s_p1_map" style="width: 100%;height: 300px;"></div> 
                                                            </div>
															
															<br>

                                                       </div>
														<div class="col-sm-6">
                                                            <div class="element-box bukan-nasional">
                                                                <label>Survey Kandidat</label>
                                                                <div id="s_p2_map" style="width: 100%;height: 300px;"></div>         
                                                            </div>
														
															<br>
                                                       </div>
												</div>
												
												<div class="row">  
                                                    <div class='col-md-12'>
                                                        <div class="element-box">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label id="labelketokohan">Ketokohan</label>
                                                                    <div id="influence_by_province" style="width: 100%;height: 500px;"></div> 
                                                                    <br>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label id="labelketokohan2">Ketokohan2</label>
                                                                    <div id="chartdiv_pemilih" style="width: 80%;height: 300px; font-size:11px;"></div>
                                                                     <div id="chartdiv" style="width: 100%;height: 300px;"></div>
                                                                </div>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
														
															<!-- <div class="col-sm-8">
																
															</div> -->
												</div>

                                              </div>
                                              <div class="tab-pane" id="tab_paslon">
                                                
                                                <div class="element-box" style="padding-top: 0px;" id="table_paslon">
                                                    <label>Paslon</label>
                                                </div>
                                              </div>
											  <div class="tab-pane" id="tab_simulasi">
                                                <div class="element-box" style="padding-top: 0px;">
                                                     <label>Simulasi</label>
													<div class="table-responsive">
                                                            <table class="table table-striped table-bordered" id="table_simulasi">
                                                            </table>
                                                        </div>
                                                </div>
                                              </div>
                                              <div class="tab-pane" id="tab_profile">
                                                    <div class="col-lg-5 col-xxl-6">
                                                        <!--START - MESSAGE ALERT-->
                                                        <div class="alert alert-warning borderless">
                                                        <div class="users-list-w">
                                                            <div class="user-w">
                                                                <div class="user-avatar-w">
                                                                    <div class="user-avatar"><img alt="" src="../img/logo_provinsi/jawa_barat.png"></div>
                                                                </div>
                                                                <div class="user-name">
                                                                    <h6 class="user-title">Jawa Barat</h6>
                                                                    <div class="user-role"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <!--END - MESSAGE ALERT-->
                                                    </div>
                                                    <div class="element-content">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <a class="element-box el-tablo" href="#">
                                                                    <div class="label">Products Sold</div>
                                                                    <div class="value">57</div>
                                                                    <div class="trending trending-up-basic"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <a class="element-box el-tablo" href="#">
                                                                    <div class="label">Gross Profit</div>
                                                                    <div class="value">$457</div>
                                                                    <div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-down"></i></div>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <a class="element-box el-tablo" href="#">
                                                                    <div class="label">New Customers</div>
                                                                    <div class="value">125</div>
                                                                    <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <a class="element-box el-tablo" href="#">
                                                                    <div class="label">New Customers</div>
                                                                    <div class="value">125</div>
                                                                    <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="element-box">
                                                                <label id="label_map">Wilayah : Nasional</label>
                                                                <iframe id="frame" height="300" frameborder="0" style="border:0; width: 100%" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyARSxVnQPIC6yvDqFNwpy0Ym5sMpRk-dSs&amp;q=INDONESIA" allowfullscreen="">
                                                                </iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="user-profile compact">
                                                            <div class="up-head-w" style="background-image:url(img/profile_bg1.jpg)">
                                                                <div class="up-social"><a href="#"><i class="os-icon os-icon-twitter"></i></a><a href="#"><i class="os-icon os-icon-facebook"></i></a></div>
                                                                <div class="up-main-info">
                                                                    <h2 class="up-header">John Mayers</h2>
                                                                    <h6 class="up-sub-header">Product Designer at Facebook</h6></div>
                                                                <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                    <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                                                                        <path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="up-controls">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="value-pair">
                                                                            <div class="label">Status:</div>
                                                                            <div class="value badge badge-pill badge-success">Online</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 text-right"><a class="btn btn-primary btn-sm" href=""><i class="os-icon os-icon-link-3"></i><span>Add to Friends</span></a></div>
                                                                </div>
                                                            </div>
                                                            <div class="up-contents">
                                                                <div class="m-b">
                                                                    <div class="row m-b">
                                                                        <div class="col-sm-6 b-r b-b">
                                                                            <div class="el-tablo centered padded-v">
                                                                                <div class="value">25</div>
                                                                                <div class="label">Products Sold</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 b-b">
                                                                            <div class="el-tablo centered padded-v">
                                                                                <div class="value">315</div>
                                                                                <div class="label">Friends</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="padded">
                                                                        <div class="os-progress-bar primary">
                                                                            <div class="bar-labels">
                                                                                <div class="bar-label-left"><span>Profile Completion</span><span class="positive">+10</span></div>
                                                                                <div class="bar-label-right"><span class="info">72/100</span></div>
                                                                            </div>
                                                                            <div class="bar-level-1" style="width: 100%">
                                                                                <div class="bar-level-2" style="width: 80%">
                                                                                    <div class="bar-level-3" style="width: 30%"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="os-progress-bar primary">
                                                                            <div class="bar-labels">
                                                                                <div class="bar-label-left"><span>Status Unlocked</span><span class="positive">+5</span></div>
                                                                                <div class="bar-label-right"><span class="info">45/100</span></div>
                                                                            </div>
                                                                            <div class="bar-level-1" style="width: 100%">
                                                                                <div class="bar-level-2" style="width: 30%">
                                                                                    <div class="bar-level-3" style="width: 10%"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="os-progress-bar primary">
                                                                            <div class="bar-labels">
                                                                                <div class="bar-label-left"><span>Followers</span><span class="negative">-12</span></div>
                                                                                <div class="bar-label-right"><span class="info">74/100</span></div>
                                                                            </div>
                                                                            <div class="bar-level-1" style="width: 100%">
                                                                                <div class="bar-level-2" style="width: 80%">
                                                                                    <div class="bar-level-3" style="width: 60%"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="element-wrapper">
                                                            <div class="element-box">
                                                                <h6 class="element-header">User Activity</h6>
                                                                <div class="timed-activities compact">
                                                                    <div class="timed-activity">
                                                                        <div class="ta-date"><span>21st Jan, 2017</span></div>
                                                                        <div class="ta-record-w">
                                                                            <div class="ta-record">
                                                                                <div class="ta-timestamp"><strong>11:55</strong> am</div>
                                                                                <div class="ta-activity">Created a post called <a href="#">Register new symbol</a> in Rogue</div>
                                                                            </div>
                                                                            <div class="ta-record">
                                                                                <div class="ta-timestamp"><strong>2:34</strong> pm</div>
                                                                                <div class="ta-activity">Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category</div>
                                                                            </div>
                                                                            <div class="ta-record">
                                                                                <div class="ta-timestamp"><strong>7:12</strong> pm</div>
                                                                                <div class="ta-activity">Added <a href="#">John Silver</a> as a friend</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="timed-activity">
                                                                        <div class="ta-date"><span>3rd Feb, 2017</span></div>
                                                                        <div class="ta-record-w">
                                                                            <div class="ta-record">
                                                                                <div class="ta-timestamp"><strong>9:32</strong> pm</div>
                                                                                <div class="ta-activity">Added <a href="#">John Silver</a> as a friend</div>
                                                                            </div>
                                                                            <div class="ta-record">
                                                                                <div class="ta-timestamp"><strong>5:14</strong> pm</div>
                                                                                <div class="ta-activity">Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                              </div>
											   <div class="tab-pane" id="tab_dpt">
                                                 <div class="row">
                                                    <div class="col-sm-6">
                                                        <div id="pie_jenis_kelamin" style="width: 90%;height: 200px;"></div> 
                                                    </div>
													<div class="col-sm-6">
                                                        <div id="pie_usia" style="width: 100%;height: 200px;"></div> 
                                                    </div> 
                                                    <div class="col-sm-6">
                                                        <div id="data_penduduk" style="width: 100%;height: 200px;"></div> 
                                                    </div> 
												</div>
                                              </div>
											  <div class="tab-pane" id="tab_influencer">
                                                 <div class="row">
                                                    <div class="col-sm-6">
                                                        <div id="pie_influencer" style="width: 100%;height: 300px;"></div> 
                                                       </div>
												
                                                    <div class="col-sm-6">
                                                        <label>Kecondongan</label>
                                                        <div id="graph_kecondongan_umum" style="width: 100%;height: 300px;"></div> 
                                                    </div>
												
                                                    <div class="col-sm-12">
                                                        <label>Afiliasi Politik</label>
                                                        <div id="kecondongan_1" style="width: 100%;height: 300px;"></div> 
                                                    </div>
												</div>
                                              </div>
											  <div class="tab-pane" id="tab_survey">
													<!--div class="row">
														<div class="col-sm-6">
                                                            <label>Persentase Pemilihan Partai Per Periode</label>
    														<div class="table-responsive">
                                                                <table id="table_1" class="table table-striped table-bordered datatable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Partai</th>
                                                                            <th>Pilihan 2014</th>
                                                                            <th>Pilihan 2019</th>
    																	 </tr>
                                                                    </thead>
                                                                    <tbody  id="preferensi">
                                                                       
                                                                    </tbody>
    																<br>
                                                                </table>
                                                            </div>
                                                        </div>
														<div class="col-sm-6">
                                                            <label>Preferensi Jumlah</label>
															<div>
                                                                <div id="preferensi_jml"></div>
															</div>
														</div>
                                                        <div class="col-md-12 spacetop"></div>
                                                        <div class="col-sm-12" style="display: none">
                                                            Konsistensi Pemilih Partai
                                                            <div class="table-responsive">
                                                                <table id="table_2" class="table table-striped table-bordered datatable">
                                                                    <thead>
                                                                        <tr id="konsisten_head">
                                                                         </tr>
                                                                    </thead>
                                                                    <tbody id="konsisten_body">
                                                                       <tr>
                                                                           <td>1</td>
                                                                           <td>2</td>
                                                                           <td>3</td>
                                                                       </tr>
                                                                      
                                                                    </tbody>
                                                                    <br>
                                                                </table>
                                                            </div>
                                                        </div>
													</div-->
                                                    <div class="spacetop"></div>
                                                    <!--h5>10184</h5-->
                                                    <div align="right">
                                                        <label id="nilai-n">N: 10184</label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 nasional">
                                                            <label>Hasil Survey Pilpres 2014</label>
                                                            <div class="element-box" style="padding-top: 0px;" >
                                                                 <div id="nasional_2014_a" style="width: 100%;height: 300px;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 bukan-nasional">
                                                          <div class="element-box">
                                                            <label>Survey Kandidat</label>
                                                                <div id="s_p2_map2" style="width: 100%;height: 300px;"></div>  
                                                          </div>    
                                                           
                                                       </div>
                                                       <div class="col-sm-6 bukan-nasional">
                                                        <div class="element-box">
                                                          <label>Survey Kandidat (Lain- lain)</label>
                                                            <div id="pie_p7_p8" style="width: 100%;height: 300px;"></div>
                                                        </div>
                                                         
                                                       </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 nasional">
                                                            <label>Hasil Survey Pilpres 2019 (10 Besar)</label>
                                                            <div class="element-box" style="padding-top: 0px;">
                                                                <div id="nasional_2019" style="width: 100%;height: 300px;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="row">
														<div class="col-sm-6">
														  <div class="element-box">
                                                            <label>Partai Yang Akan Dipilih 2014</label>
                                                            <div id="pie_2014" style="width: 100%;height: 300px;"></div>    
                                                          </div>    
                                                           
                                                       </div>
													   <div class="col-sm-6">
                                                        <div class="element-box">
														  <label>Partai yang dicoblos pada pemilu 2014 (Lain- lain)</label>
                                                            <div id="pie_2014_" style="width: 100%;height: 300px;"></div>
                                                        </div>
                                                         
                                                       </div>
													</div>
													<div class="row">
														<div class="col-sm-6">
                                                            <div class="element-box">
                                                                <label>Partai Yang Akan Dipilih 2019</label>
                                                                <div id="pie_2019" style="width: 100%;height: 300px;"></div>
                                                            </div> 
                                                       </div>
													   <div class="col-sm-6">
                                                            <div class="element-box">
                                                                <label>Partai yang dicoblos pada pemilu 2019 (Lain- lain)</label>
                                                                <div id="pie_2019_" style="width: 100%;height: 300px;"></div>        
                                                            </div>
                                                       </div>
													</div>
													<div class="row">  
														<div class="col-sm-6">
                                                            <div class="element-box">
                                                            <label>Persoalan Yang Paling Pokok</label>
                                                            <div id="s_p1" style="width: 100%;height: 300px;"></div>                                                                 
                                                            </div>

															<br>
                                                       </div>
														<div class="col-sm-6">
                                                            <div class="element-box">
                                                                <label>Yang Perlu Mendapatkan Penanganan Dari Pemerintah Secepatnya</label>
                                                                <div id="s_p2" style="width: 100%;height: 300px;"></div>         
                                                            </div>
														
															<br>
                                                       </div>
													</div>
                                                    
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
								<!--
								<div class="col-sm-4">
                                    <div class="element-wrapper" style="padding-bottom: 0px;">
                                        <h6 class="element-header">Statik	</h6>
                                        <div class="element-box" style="padding-left: 15px;overflow: auto;height: 580px;">
                                            <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-lightborder">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Logo</th>
                                                                        <th>Partai</th>
																			<th>
																			<img src="http://36.67.51.253/teknopol_dashboard_dev/img/paslon/3.jpg" height="42" width="42">
																			<img src="http://36.67.51.253/teknopol_dashboard_dev/img/paslon/4.jpg" height="42" width="42">
																			</th>
																			<th><img src="http://36.67.51.253/teknopol_dashboard_dev/img/paslon/1.jpg" height="42" width="42"><img src="http://36.67.51.253/teknopol_dashboard_dev/img/paslon/2.jpg" height="42" width="42"></th>
																			<th><img src="http://36.67.51.253/teknopol_dashboard_dev/img/paslon/5.jpg" height="42" width="42"><img src="http://36.67.51.253/teknopol_dashboard_dev/img/paslon/6.jpg" height="42" width="42"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><img src="<?=base_url()?>/img/logo_parpol/pdi-p.png"  height="42" width="42"> </td>
                                                                        <td>PDI</td>
                                                                        <td>4</td>
                                                                        <td>16</td>
                                                                        <td>20</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><img src="<?=base_url()?>/img/logo_parpol/demokrat.png"  height="42" width="42"> </td>
                                                                        <td>Demokrat</td>
                                                                        <td>4</td>
                                                                        <td>16</td>
                                                                        <td>20</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><img src="<?=base_url()?>/img/logo_parpol/Golkar.png"  height="42" width="42"> </td>
                                                                        <td>Golkar</td>
                                                                        <td>4</td>
                                                                        <td>16</td>
                                                                        <td>20</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><img src="<?=base_url()?>/img/logo_parpol/gerindra.png"  height="42" width="42"> </td>
                                                                        <td>Gerindra</td>
                                                                        <td>4</td>
                                                                        <td>16</td>
                                                                        <td>20</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><img src="<?=base_url()?>/img/logo_parpol/pks.png"  height="42" width="42"> </td>
                                                                        <td>PKS</td>
                                                                        <td>4</td>
                                                                        <td>16</td>
                                                                        <td>20</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><img src="<?=base_url()?>/img/logo_parpol/nasdem.png"  height="42" width="42"> </td>
                                                                        <td>Nasdem</td>
                                                                        <td>4</td>
                                                                        <td>16</td>
                                                                        <td>20</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </div>
											<div class="row">
                                                    <div class="col-sm-12">
                                                        <div id="pie_jenis_kelamin" style="width: 90%;height: 200px;"></div> 
                                                    </div>
                                            </div>
											<div class="row">
                                                    <div class="col-sm-12">
                                                        <div id="pie_usia" style="width: 100%;height: 200px;"></div> 
                                                    </div> 
                                            </div>
											<div class="row">
                                                    <div class="col-sm-12">
                                                        <div id="kecondongan_1" style="width: 100%;height: 200px;"></div> 
                                                    </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
								-->
								
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
        <script src="<?=base_url()?>js/dataTables.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>js/main.js?version=4.2.0"></script>
        <script src="<?=base_url()?>bower_components/amcharts/amcharts.js"></script>
        <script src="<?=base_url()?>bower_components/amcharts/serial.js"></script>
        <script src="<?=base_url()?>bower_components/amcharts/pie.js"></script>
        <script src="<?=base_url()?>bower_components/amcharts/themes/light.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript" src="<?=base_url()?>bower_components/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>bower_components/fancytree/jquery.fancytree-all.min.js"></script>
		
		<!-- <script src="https://www.amcharts.com/lib/3/amcharts.js"></script> -->
		<!-- <script src="https://www.amcharts.com/lib/3/serial.js"></script> -->
		<!-- <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script> -->
		<!-- <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" /> -->
		<!-- <script src="https://www.amcharts.com/lib/3/themes/light.js"></script> -->
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
        <script type="application/javascript">
            var FT = $.ui.fancytree;
            var vtipe = 'all';
            var vidarea = 'all';
            $("#tree2").fancytree({
                selectMode: 1,
                activate: function(event, data){
                    var tipe = data.node.data.tipe;
                    var id = data.node.data.id;
                    var nama = data.node.data.nama;
                    load_informasi(id,tipe,nama);
                },
                lazyLoad: function(event, data){
                    var tipe = data.node.data.tipe;
                    var id = data.node.data.id;
                    if(tipe == 'provinsi'){
                        data.result = {url: "<?=site_url('maps/get_tree_kabupaten/')?>"+id};
                    }else if(tipe == 'kabupaten'){
                        data.result = {url: "<?=site_url('maps/get_tree_kecamatan/')?>"+id};
                    }else if(tipe == 'kecamatan'){
                        data.result = {url: "<?=site_url('maps/get_tree_kelurahan/')?>"+id};
                    }
                    
                }
            });
            function load_informasi(id,tipe,nama){
                Pace.track(function(){
					
					var vid = id;
                    $.ajax({
                        url: "<?= site_url('maps/get_information_/') ?>"+id+'/'+tipe,
                        cache: false,
                        type:"POST",
                        success: function(respond){

                            obj = JSON.parse(respond);
                            $("#table_paslon").html(obj.paslon);
                            $("#table_paslon_depan").html(obj.paslon);
                            link = "https://www.google.com/maps/embed/v1/place?key=AIzaSyARSxVnQPIC6yvDqFNwpy0Ym5sMpRk-dSs&q="+obj.link;
                            $("#frame").attr("src", link);
							vtipe = tipe;
                            vidarea = id; 
							get_data('provinsi',vid,nama);
                        }
                    })
                })
                
            }
            $("#provinsi").change(function() {
				
				var vid = $(this).val();
                $.ajax({
                    url: "<?= site_url('maps/get_kabupaten/') ?>"+$(this).val(),
                    cache: false,
                    type:"POST",
                    success: function(respond){
                        $("#kabupaten").html(respond);
						
						get_data('kabupaten',vid,nama);
                    }
                })
            });

            $("#kabupaten").change(function() {
				var vid = $(this).val();
                $.ajax({
                    url: "<?= site_url('maps/get_kecamatan/') ?>"+$(this).val(),
                    cache: false,
                    type:"POST",
                    success: function(respond){
                        $("#kecamatan").html(respond);
						get_data('kecamatan',vid,nama);
						
                    }
                })
            });
			
			
			google.charts.load('visualization',"1", {'packages':['corechart']});
			//google.charts.setOnLoadCallback(jenis_kelamin);
			google.charts.setOnLoadCallback(function() { get_data('All','0'); });
			//google.charts.setOnLoadCallback(usia);
			
			function get_data(wil,vid,nama){
				
				 $.ajax({
                    url: "<?= site_url('maps/get_data') ?>",
                    cache: false,
                    type:"POST",
					async: false,
					dataType: "json",
					data: {wil:wil,id:vid,nama:nama},
                    success: function(respond){
                        click = 0;
                        $("#nilai-n").text('N : '+respond.totall)
                        if(respond.fauzan == 0){
                            $(".bukan-nasional").hide();
                            $(".nasional").show();
                            $("#label_map").text('Wilayah : Nasional');
                        }else{
                            $(".bukan-nasional").show();
                            $(".nasional").hide();
                            $("#label_map").text('Wilayah : '+respond.fauzan2);
                        }
                        $("#table_simulasi").html(respond.simulasi);
                       jenis_kelamin(respond.jum_jeniskelamin);
					   usia(respond.jum_usia);
					   kecondongan(respond.new_graph);
					   influencer(respond);
					   kecondongan_umum(respond);
					   generate_chart_3(respond.chart);
                       generate_chart_4(respond.chart2);
					   generate_chart_5(respond.chart3);
                       generate_chart_5_1(respond.chart3);
                       generate_chart_5_2(respond.chart3_);
					   generate_chart_2014(respond.chart2014);
					   generate_chart_2014_(respond.chart2014_);
					   generate_chart_2019(respond.chart2019);
					   generate_chart_2019_(respond.chart2019_);
                       preferensi(respond.preferensi);
					   konsisten(respond.konsisten);
                       generate_datatable();
					   drawChart(respond.preferensi_jml);
					   ketokohan(respond.chart_ketokohan);
                       $("#labelketokohan").text('Ketokohan N : '+respond.ketokohan_total);
                       generate_chart__('all',vid,wil);
                       $("#labelketokohan2").text('N : '+respond.ketokohan_total);
                       area = vid;
                       tipe = wil;
                       
                        // console.log(respond.simulasi);
					}
                })
				
			}
			
			function jenis_kelamin(vdata) {
			
				var data = google.visualization.arrayToDataTable([
				  ['Kategori', 'Jumlah'],
				  ['Laki-Laki', Number(vdata.laki)],
				  ['Perempuan', Number(vdata.wanita)]
				]);
				
				var options = {
				  title: 'Jenis Kelamin',
				  legend: {position: 'bottom'},
				  is3D: true,
				};
				var chart = new google.visualization.PieChart(document.getElementById('pie_jenis_kelamin'));
				chart.draw(data, options);
          }
		  function usia(vdata) {

            var data = google.visualization.arrayToDataTable([
              ['Kategori', 'Jumlah'],
              ['17-25 (Milenial)', Number(vdata.jml_1)],
              ['26-35', Number(vdata.jml_2)],
              ['36-45', Number(vdata.jml_3)],
              ['46-55', Number(vdata.jml_4)],
              ['>56', Number(vdata.jml_5)],
            ]);
            var options = {
              title: 'Usia',
              is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_usia'));

            chart.draw(data, options);
          }
		  
		  function influencer(vdata) {
			
            var data = google.visualization.arrayToDataTable([
              ['Kategori', 'Jumlah'],
              ['Tangible', Number(vdata.jum_tangible)],
              ['Intangible', Number(vdata.jum_intangible)]
            ]);
            var options = {
              title: 'Tangible & Intangible',
              legend: {position: 'bottom'},
              is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_influencer'));

            chart.draw(data, options);
          }
		 
			function kecondongan_umum(vdata){
				
				 var chart4 = AmCharts.makeChart("graph_kecondongan_umum", {
                            "theme": "light",
                            "type": "serial",
                            "dataProvider": [
                            {
                                "name": "Netral",
                                "points": Number(vdata.jum_netral),
                                "color" : "#ffcc29",
                            },
                            {
                                "name": "Memilih",
                                "points": Number(vdata.jum_pilih),
                                "color" : "#4ecc48",
                            },
                            ],
                            "graphs": [{
                                "balloonText": "[[category]]:[[value]] %",
                                "fillAlphas": 1,
                                "lineAlpha": 0.2,
                                "labelText": "[[value]]%",
                                "title": "Tangible",
                                "type": "column",
                                "colorField": "color",
                                "valueField": "points"
                            }],
                            // "depth3D": 20,
                            "angle": 30,
                            "rotate": true,
                            "categoryField": "name",
                            "categoryAxis": {
                                "gridPosition": "start",
                                "axisAlpha": 0,
                                "gridAlpha": 0,
                                "fillAlpha": 0,
                                "position": "left"
                            },
                            "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0,
                                "dashLength": 0
                            } ],
                        });
				
			}
		
		  function kecondongan(vdata){
			  
			 
			  
			var chart = AmCharts.makeChart("kecondongan_1",{
				"type": "serial",
				  "theme": "light",
				  //"marginRight": 30,
				  "dataProvider": vdata,
                  "listeners": [{
                                "event": "clickGraphItem",
                                "method": function(event) {
                                    Pace.track(function(){
                                        var table = $('#table_detail').DataTable();
                                        table.ajax.url("<?= site_url('maps/detail_influencer2/')?>"+event.item.category+'/'+area+'/'+tipe).load();
                                        $("#modal_detail").modal('show');
                                    })
                                }
                            }],
				  "valueAxes": [{
					"axisAlpha": 0,
					"position": "center",
					"title": ""
				  }],
				  "startDuration": 1,
				  "graphs": [{
					"balloonText": "<b>[[category]]: [[value]]</b>",
					"fillColorsField": "color",
					"fillAlphas": 0.9,
					"lineAlpha": 0.2,
					"type": "column",
					"valueField": "poin"
				  }],
				  "chartCursor": {
					"categoryBalloonEnabled": false,
					"cursorAlpha": 0,
					"zoomable": false
				  },
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
				  "export": {
					"enabled": true
				  }
			});
		  }
		  
		  function generate_chart_3(vdata){
                var chart = AmCharts.makeChart("s_p1", {
                  "type": "serial",
				  "theme": "light",
				  "marginRight": 70,
				  "dataProvider": vdata,
				  "startDuration": 1,
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
				
				var chart = AmCharts.makeChart("s_p1_map", {
                  "type": "serial",
				  "theme": "light",
				  "marginRight": 70,
				  "dataProvider": vdata,
				  "startDuration": 1,
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
			
			function generate_chart_4(vdata){
                var chart = AmCharts.makeChart("s_p2", {
                  "type": "serial",
				  "theme": "light",
				  "marginRight": 70,
				  "dataProvider": vdata,
				  "startDuration": 1,
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
			
            function generate_chart_5(vdata){
                var chart = AmCharts.makeChart("s_p2_map", {
                  "type": "serial",
                  "theme": "light",
                  "marginRight": 70,
                  "dataProvider": vdata,
                  "startDuration": 1,
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

            function generate_chart_5_1(vdata){
                var chart = AmCharts.makeChart("s_p2_map2", {
                  "type": "serial",
                  "theme": "light",
                  "marginRight": 70,
                  "dataProvider": vdata,
                  "startDuration": 1,
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

            function generate_chart_5_2(vdata){
                var chart = AmCharts.makeChart("pie_p7_p8", {
                  "type": "serial",
                  "theme": "light",
                  "marginRight": 70,
                  "dataProvider": vdata,
                  "startDuration": 1,
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

			function generate_chart_2014(vdata){
                var chart = AmCharts.makeChart("pie_2014", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": vdata,
                          "startDuration": 1,
                          "graphs": [{
                            "balloonText": "<b>[[category]]: [[value]] %</b>",
                            "colorField":"color",
                            "fillColorsField": "color",
                            "labelText": "[[value]]%",
                            "fillAlphas": 0.9,
                            "lineAlpha": 0.2,
                            "type": "column",
                            "valueField": "points",
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
			
			function generate_chart_2014_(vdata){
                var chart = AmCharts.makeChart("pie_2014_", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": vdata,
                          "startDuration": 1,
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
			
			
			function generate_chart_2019(vdata){
                var chart = AmCharts.makeChart("pie_2019", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": vdata,
                          "startDuration": 1,
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
			
			function generate_chart_2019_(vdata){
                var chart = AmCharts.makeChart("pie_2019_", {
                          "type": "serial",
                          "theme": "light",
                          "marginRight": 70,
                          "dataProvider": vdata,
                          "startDuration": 1,
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
			
			var hancur = 0;
			function preferensi(vdata){
				$("#preferensi").empty();
				var tab ='';
				$.each(vdata, function(propName, propVal) {
					
				  tab=tab+'<tr><td>'+propVal.partai+'</td>\
						<td>'+propVal.a14+' %</td>\
						<td>'+propVal.a19+' %</td></tr>';
					
				});
                $("#preferensi").html(tab);
				
			}

            function konsisten(konsisten){
               
			   $("#konsisten_head").empty();
                $("#konsisten_body").empty();
                var tab ='<th>Paslon-Parpol</th>';
                var tab2 ='';

							
                i=0;
                var keys = Object.keys(konsisten[0]);
				
				
                $.each(keys, function(propName, propVal) {
					str = keys[i];
                    str = str.replace("_", " ");
                    str = str.replace("14", "2014");
                    final = str.replace("19", "2019");
                  if(i>0){
                    tab=tab+'<th>'+final+'</th>';  
                  }
					tab2=tab2+'<tr>';
					$.each(konsisten[i], function(name, val) {
						tab2=tab2+'<td>'+val+'</td>';
					})
                    tab2=tab2+'</tr>';
                  i++;
                });
				 $("#konsisten_head").html(tab);
				 $("#konsisten_body").html(tab2);
			}
            var hancur = 0;
            function generate_datatable(){
                if(hancur == 1){
                    var table1 = $('#table_1').DataTable();
                    var table2 = $('#table_2').DataTable();
                    table1.destroy();
                    table2.destroy();
                }else{

                }

                $('#table_1').DataTable({
                    "pageLength": 5,
                    "lengthChange" : false,
                    "filter" : false,
                    "responsive": true,
                    "order": [[ 1, "desc" ]]
                });
                $('#table_2').DataTable({
                    "pageLength": 5,
                    "lengthChange" : false,
                    "filter" : false,
                    "responsive": true,
                    "scrollY":        "300px",
                    "scrollX":        true,
                    "scrollCollapse": true,
                });
                hancur = 1;
            }
		  
		 
		  function drawChart(vdata) { 
			
				var chart = AmCharts.makeChart("preferensi_jml", {
				"type": "serial",
				 "theme": "light",
				"categoryField": "partai",
				"rotate": false,
				"startDuration": 1,
				start: 'desc',
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
				"trendLines": [],
				"graphs": [
					{
						"balloonText": "2014:[[value]]",
						"fillAlphas": 0.8,
						"id": "AmGraph-1",
						"lineAlpha": 0.2,
						"title": "2014",
						"type": "column",
						"valueField": "a14"
					},
					{
						"balloonText": "2019:[[value]]",
						"fillAlphas": 0.8,
						"id": "AmGraph-2",
						"lineAlpha": 0.2,
						"title": "2019",
						"type": "column",
						"valueField": "a19"
					}
				],
				"guides": [],
				"allLabels": [],
				"balloon": {},
				"titles": [],
				"dataProvider": vdata,
				"export": {
					"enabled": true
				 }

			});

		  }
		  
		  
		  function ketokohan(vdata){
			  console.log(vdata);
			 var chart = AmCharts.makeChart("influence_by_province", {
				  "type": "serial",
				  "theme": "light",
				  "marginRight": 70,
				  "dataProvider": vdata,
                  "listeners": [{
                                "event": "clickGraphItem",
                                "method": function(event) {
                                    Pace.track(function(){
                                        generate_chart__(event.item.category,vidarea,vtipe);
                                    })
                                }
                            }],
				  "startDuration": 1,
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
		  
		  
		  // get_top_4('ALL',1);
		  function get_top_4(id,type){
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
                            "startDuration": 1,
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

                         var chart = AmCharts.makeChart("chartdiv",
                        {
                            "type": "serial",
                            "theme": "light",
                            "dataProvider": [
                            {
                                "name": "Netral",
                                "points": data.jum_netral,
                                "color" : "#bdb9b9",
                                "bullet" : "<?php echo site_url('img/logo_parpol/netral.png')?>" 
                            },
                            {
                                "name": "Memilih",
                                "points": data.jum_pilih,
                                "color" : "#873444",
                                "bullet" : "<?php echo site_url('img/logo_parpol/votepng.png')?>"
                            },
                            ],
                            "startDuration": 1,
                            "graphs": [{
                                "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]] %</b></span>",
                                "labelText": "[[value]]%",
                                "bulletOffset": 10,
                                "bulletSize": 52,
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
                                "fillAlpha": 0.00,
                                "axisAlpha": 0,
                                "position": "left",
                                // "labelRotation": 90
                            },
                            "valueAxes": [ {
                            	"axisAlpha": 0,
                            	"labelsEnabled" : false,
							    "gridColor": "#FFFFFF",
							    "gridAlpha": 0,
							    "dashLength": 0
							} ],
                        }); 
						
						
						
						
                    }
                })
            }
            var area; 
            var tipe; 
            var click = 0;
            function generate_chart__(id,area,tipe){
                id = encodeURI(id);
                
                $.ajax({
                    url: "<?php echo site_url('maps/get_top_4/')?>"+id+'/'+area+'/'+tipe,
                    cache: false,
                    type:"GET",
                    success: function(respond){
                        data = JSON.parse(respond);
                        if(click == 1){
                            $("#labelketokohan2").text('N : '+data.ketokohan_total2);
                        }
                        click =1;
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
                                        table.ajax.url("<?= site_url('maps/detail_influencer/')?>"+event.item.category+'/'+id+'/'+area+'/'+tipe).load();
                                        $("#modal_detail").modal('show');
                                    })
                                }
                            }],
                            "startDuration": 1,
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

                       /*  var chart = AmCharts.makeChart("chartdiv2",
                        {
                            "type": "serial",
                            "theme": "light",
                            "dataProvider": [
                            {
                                "name": "Netral",
                                "points": data.jum_netral,
                                "color" : "#bdb9b9",
                                "bullet" : "<?php echo site_url('img/logo_parpol/netral.png')?>" 
                            },
                            {
                                "name": "Memilih",
                                "points": data.jum_pilih,
                                "color" : "#873444",
                                "bullet" : "<?php echo site_url('img/logo_parpol/votepng.png')?>"
                            },
                            ],
                            "startDuration": 1,
                            "graphs": [{
                                "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]] %</b></span>",
                                "labelText": "[[value]]%",
                                "bulletOffset": 10,
                                "bulletSize": 52,
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
                                "fillAlpha": 0.00,
                                "axisAlpha": 0,
                                "position": "left",
                                // "labelRotation": 90
                            },
                            "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0,
                                "dashLength": 0
                            } ],
                        }); */
						
						var chartData = [ {  
						  "category": "Wine left in the barrel",
						  "value1": data.jum_netral,
						  "value2": data.jum_pilih,
						} ];
                        var chart = AmCharts.makeChart("chartdiv_pemilih", {
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

						// var chart = AmCharts.makeChart( "chartdiv_pemilih", {
						//   "theme": "light",
						//   "type": "serial",
						//   "depth3D": 100,
						//   "angle": 30,
						//   "autoMargins": false,
						//   "marginBottom": 50,
						//   "marginLeft": 50,
						//   "marginRight": 20,
						//   "dataProvider": chartData,
						//   "valueAxes": [ {
						// 	"stackType": "100%",
						// 	"gridAlpha": 0
						//   } ],
						//   "graphs": [ {
						// 	"balloonText": "<span style='font-size:13px;'>Punya Afiliasi Politik: <b>[[value]] %</b></span>",
						// 	"labelText": "[[value]]%",
						// 	"type": "column",
						// 	"topRadius": 1,
						// 	"columnWidth": 1,
						// 	"showOnAxis": true,
						// 	"lineThickness": 2,
						// 	"lineAlpha": 0.5,
						// 	"lineColor": "#FFFFFF",
						// 	"fillColors": "#8d003b",
						// 	"fillAlphas": 0.8,
						// 	"valueField": "value1"
							
						//   }, {
						// 	"balloonText": "<span style='font-size:13px;'>Jumlah Netral: <b>[[value]] %</b></span>",
						// 	"labelText": "[[value]]%",
						// 	"type": "column",
						// 	"topRadius": 1,
						// 	"columnWidth": 1,
						// 	"showOnAxis": true,
						// 	"lineThickness": 2,
						// 	"lineAlpha": 0.5,
						// 	"lineColor": "#cdcdcd",
						// 	"fillColors": "#cdcdcd",
						// 	"fillAlphas": 0.5,
						// 	"valueField": "value2"
						//   } ],

						//   "categoryField": "category",
						//   "categoryAxis": {
						// 	"axisAlpha": 0,
						// 	"labelOffset": 40,
						// 	"gridAlpha": 0
						//   },
						//   "export": {
						// 	"enabled": true
						//   }
						// } );
						
						
                    }
                })
            }
		  
        </script>
        <script type="text/javascript">
            var chart = AmCharts.makeChart( "data_penduduk", {
              "type": "serial",
              "titles": [
                    {
                        "text": "Top 5 Penduduk Terbesar",
                        "size": 15
                    }
                ],
              "theme": "light",
              "dataProvider": [ {
                "country": "Jawa Barat",
                "visits": 47379400
              }, {
                "country": "Jawa Timur",
                "visits": 39075300
              }, {
                "country": "Jawa Tengah",
                "visits": 34019100
              }, {
                "country": "Sumatera Utara",
                "visits": 14102900
              }, {
                "country": "Banten",
                "visits": 12203100
              }],
              "valueAxes": [ {
                "axisAlpha": 0,
                "labelsEnabled" : false,
                "gridColor": "#FFFFFF",
                "gridAlpha": 0,
                "dashLength": 0
              } ],
              "gridAboveGraphs": true,
              "startDuration": 1,
              "graphs": [ {
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "visits"
              } ],
              "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
              },
              "categoryField": "country",
              "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "axisAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20
              }

            } );
        </script>
        <script type="text/javascript">
            var chart = AmCharts.makeChart("nasional_2014",{
                "type": "serial",
                  "theme": "light",
                  //"marginRight": 30,
                  "dataProvider": [ 
                  <?php foreach ($nasional_2014 as $key => $value) { ?>
                        <?php 
                            if($value->nama == 'JOKOWI'){
                                $color = '#da251c';
                            }else{
                                $color = '##f8f2f2';      
                            } 
                        ?>
                      {
                        "name": "<?= $value->nama ?>",
                        "poin": <?= $value->jumlah ?>,
                        "color" : "<?= $color ?>"
                      },
                  <?php } ?>
                  ],
                  "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "center",
                    "title": ""
                  }],
                  "startDuration": 1,
                  "graphs": [{
                    "balloonText": "<b>[[category]]: [[value]] %</b>",
                    "labelText": "[[value]]%",
                    "fillColorsField": "color",
                    "fillAlphas": 0.9,
                    "lineAlpha": 0.2,
                    "type": "column",
                    "valueField": "poin"
                  }],
                  "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                  },
                  "categoryField": "name",
                  "categoryAxis": {
                                "gridColor": "#FFFFFF",
                                "gridPosition": "start",
                                "axisAlpha": 0,
                                "fillAlpha": 0.00,
                                "position": "left",
                            },
                            "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0,
                                "dashLength": 0
                            } ],
                  "export": {
                    "enabled": true
                  }
            });
        </script>

        <script type="text/javascript">
            var chart = AmCharts.makeChart("nasional_2014_a",{
                "type": "serial",
                  "theme": "light",
                  //"marginRight": 30,
                  "dataProvider": [ 
                  <?php foreach ($nasional_2014_a as $key => $value) { ?>
                        <?php 
                            if($value->nama == 'JOKOWI'){
                                $color = '#da251c';
                            }else{
                                $color = '##f8f2f2';      
                            } 
                        ?>
                      {
                        "name": "<?= $value->nama ?>",
                        "poin": <?= $value->jumlah ?>,
                        "color" : "<?=$color ?>"
                      },
                  <?php } ?>
                  ],
                  "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "center",
                    "title": ""
                  }],
                  "startDuration": 1,
                  "graphs": [{
                    "balloonText": "<b>[[category]]: [[value]] %</b>",
                    "labelText": "[[value]]%",
                    "fillColorsField": "color",
                    "fillAlphas": 0.9,
                    "lineAlpha": 0.2,
                    "type": "column",
                    "valueField": "poin"
                  }],
                  "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                  },
                  "categoryField": "name",
                  "categoryAxis": {
                                "gridColor": "#FFFFFF",
                                "gridPosition": "start",
                                "axisAlpha": 0,
                                "fillAlpha": 0.00,
                                "position": "left",
                            },
                            "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0,
                                "dashLength": 0
                            } ],
                  "export": {
                    "enabled": true
                  }
            });
        </script>
        <script type="text/javascript">
            var chart = AmCharts.makeChart("nasional_2019",{
                "type": "serial",
                  "theme": "light",
                  //"marginRight": 30,
                  "dataProvider": [ 
                  <?php foreach ($nasional_2019 as $key => $value) { ?>
                      {
                        <?php 
                            if($value->nama == 'JOKOWI'){
                                $color = '#da251c';
                            }else{
                                $color = '##f8f2f2';      
                            } 
                        ?>
                        "name": "<?= $value->nama ?>",
                        "poin": <?= $value->jumlah ?>,
                        "color": "<?=$color ?>"
                      },
                  <?php } ?>
                  ],
                  "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "center",
                    "title": ""
                  }],
                  "startDuration": 1,
                  "graphs": [{
                    "balloonText": "<b>[[category]]: [[value]] %</b>",
                    "labelText": "[[value]]%",
                    "fillColorsField": "color",
                    "fillAlphas": 0.9,
                    "lineAlpha": 0.2,
                    "type": "column",
                    "valueField": "poin"
                  }],
                  "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                  },
                  "categoryField": "name",
                  "categoryAxis": {
                                "gridColor": "#FFFFFF",
                                "gridPosition": "start",
                                "axisAlpha": 0,
                                "fillAlpha": 0.00,
                                "position": "left",
                            },
                            "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0,
                                "dashLength": 0
                            } ],
                  "export": {
                    "enabled": true
                  }
            });
        </script>
        <script type="text/javascript">
            var chart = AmCharts.makeChart("nasional_2019_a",{
                "type": "serial",
                  "theme": "light",
                  //"marginRight": 30,
                  "dataProvider": [ 
                  <?php foreach ($nasional_2019 as $key => $value) { ?>
                      <?php 
                            if($value->nama == 'JOKOWI'){
                                $color = '#da251c';
                            }else{
                                $color = '##f8f2f2';      
                            } 
                        ?>
                      {
                        "name": "<?= $value->nama ?>",
                        "poin": <?= $value->jumlah ?>,
                        "color" : "<?=$color ?>"
                      },
                  <?php } ?>
                  ],
                  "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "center",
                    "title": ""
                  }],
                  "startDuration": 1,
                  "graphs": [{
                    "balloonText": "<b>[[category]]: [[value]] %</b>",
                    "labelText": "[[value]]%",
                    "fillColorsField": "color",
                    "fillAlphas": 0.9,
                    "lineAlpha": 0.2,
                    "type": "column",
                    "valueField": "poin"
                  }],
                  "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                  },
                  "categoryField": "name",
                  "categoryAxis": {
                                "gridColor": "#FFFFFF",
                                "gridPosition": "start",
                                "axisAlpha": 0,
                                "fillAlpha": 0.00,
                                "position": "left",
                            },
                            "valueAxes": [ {
                                "axisAlpha": 0,
                                "labelsEnabled" : false,
                                "gridColor": "#FFFFFF",
                                "gridAlpha": 0,
                                "dashLength": 0
                            } ],
                  "export": {
                    "enabled": true
                  }
            });
        </script>
    </body>
</html>
