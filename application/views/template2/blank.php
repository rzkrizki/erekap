<!DOCTYPE html>
<html>

<head>
    <title>SIPP</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="<?=base_url(ASSETS_THEMES);?>/favicon.png" rel="shortcut icon">
    <link href="<?=base_url(ASSETS_THEMES);?>/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="<?=base_url(ASSETS_THEMES);?>/../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url(ASSETS_THEMES);?>/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?=base_url(ASSETS_THEMES);?>/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="<?=base_url(ASSETS_THEMES);?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url(ASSETS_THEMES);?>/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?=base_url(ASSETS_THEMES);?>/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="<?=base_url(ASSETS_THEMES);?>/bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="<?=base_url(ASSETS_THEMES);?>/css/main4a76.css?version=4.3.0" rel="stylesheet">
    <link href="<?=base_url(ASSETS_THEMES);?>/css/dafters.css" rel="stylesheet">
</head>

<body class="menu-position-side menu-side-left full-screen with-content-panel">

<div class="menu-w selected-menu-color-light menu-activated-on-hover menu-has-selected-link color-scheme-dark color-style-bright sub-menu-color-bright menu-position-top menu-layout-compact sub-menu-style-over">
    <div class="logo-w">
        <a class="logo" href="#">
       <!--      <div class="logo-element"></div>
            <div class="logo-label">Clean Admin</div> -->

<img  style="width: 100px; margin-top: -30px; margin-bottom: -20px;" src="<?=base_url()?>img/logo-teknopol-w.png">

        </a>
    </div>
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="avatar-w"><img alt="" src="<?=base_url();?>img/avatar1.jpg"></div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">Maria Gomez</div>
                <div class="logged-user-role">Administrator</div>
            </div>
            <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
            </div>
            <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                    <div class="avatar-w"><img alt="" src="<?=base_url();?>img/avatar1.jpg"></div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">Maria Gomez</div>
                        <div class="logged-user-role">Administrator</div>
                    </div>
                </div>
                <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                <ul>
                    <li><a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <ul class="main-menu">
        <li class="sub-header"><span>Layouts</span></li>
   
        <li class="has-sub-menu">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-grid-squares-22"></div>
                </div>
                <span>Home</span>
            </a>
        </li>
        <li class="has-sub-menu">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-bar-chart-stats-up"></div>
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="has-sub-menu">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-user-male-circle"></div>
                </div>
                <span>Tentang PDI - P</span>
            </a>
        </li>
    </ul>
</div>




<div class="content-w">

<!--     <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="index.html">Products</a></li>
        <li class="breadcrumb-item"><span>Laptop with retina screen</span></li>
    </ul>
 -->
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-9">
                     <div class="os-tabs-w mx-4">
                            <div class="os-tabs-controls">
                                <ul class="nav nav-tabs upper">
                                    <li class="nav-item"><a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_overview"> Active</a></li>
                                    <li class="nav-item"><a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_sales"> Overview</a></li>
                                    <li class="nav-item"><a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_sales"> Closed</a></li>
                                    <li class="nav-item"><a aria-expanded="true" class="nav-link active show" data-toggle="tab" href="#tab_sales"> Required</a></li>
                                </ul>
                                <ul class="nav nav-pills smaller d-none d-lg-flex">
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#"> Today</a></li>
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#"> 7 Days</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#"> 14 Days</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#"> Last Month</a></li>
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                     
                    </div>
                </div>
            </div>
        
        
 
        </div>
    </div>
</div>



 
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/moment/moment.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/ckeditor/ckeditor.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/dropzone/dist/dropzone.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/editable-table/mindmup-editabletable.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/slick-carousel/slick/slick.min.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap/js/dist/util.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap/js/dist/alert.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap/js/dist/button.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap/js/dist/carousel.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap/js/dist/collapse.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap/js/dist/dropdown.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap/js/dist/modal.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap/js/dist/tab.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap/js/dist/tooltip.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/bower_components/bootstrap/js/dist/popover.js"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/js/demo_customizer4a76.js?version=4.3.0"></script>
    <script src="<?=base_url(ASSETS_THEMES);?>/js/main4a76.js?version=4.3.0"></script>

</body>

</html>