<!DOCTYPE html>
<html>

<head>
    <title><?=CNF_SITE_NAME?></title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="<?=CNF_SITE_NAME?>" name="author">
    <meta content="<?=CNF_SITE_NAME?>" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="shortcut icon" href="<?=base_url(DEF_THEMES.'/'.ASSETS_THEMES.'/favicon.ico');?>">
    <link rel="apple-touch-icon" href="<?=base_url(DEF_THEMES.'/'.ASSETS_THEMES.'apple-icon.png');?>">

    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/css/main4a76.css?5version=4.3.0');?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/jquery-ui/jquery-ui.css');?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/select2/dist/css/select2.min.css');?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/bootstrap-daterangepicker/daterangepicker.css');?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/dropzone/dist/dropzone.css');?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/fullcalendar/dist/fullcalendar.min.css');?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/perfect-scrollbar/css/perfect-scrollbar.min.css');?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/slick-carousel/slick/slick.css');?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/css/dafters.css?3');?>">

    <!-- AMCHARTS -->
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/ammap/ammap.css');?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/amcharts/plugins/export/export.css');?>"/>
    
    <!-- SWEET ALERT -->
	<!-- <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/sweetalert2/dist/sweetalert2.min.css');?>"/> -->
    
    <!-- BOOTSTRAP MATERIAL DATETIMEPICKER -->
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css');?>">
    <link rel="stylesheet" type="text/css" media="all" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/fancytree/skin-win8/ui.fancytree.min.css');?>">
    <!-- <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/pace/pace.css');?>"> -->
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/switchery/switchery.min.css');?>">

    <!-- CSS Loader -->
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/css_loader/css-loader.css');?>">
    <script type="text/javascript">
        var spinner = '<?=base_url(DEF_THEMES.'/'.CNF_LOADING_SITE);?>';
    </script>

    <!-- Animated Modal -->
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/animatedModal/css/animate.min.css');?>">

    <!-- Data Table Bootstrap 4 -->
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" media="all" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

    <!-- PDF Viewer -->
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/pdf_viewer/css/ipages.min.css');?>">

    <!-- LightGallery -->
    <link rel="stylesheet" type="text/css" media="all" href="<?=base_url(DEF_THEMES.'/lightgallery/dist/css/lightgallery.min.css');?>">

    <!-- THEMES SETUP -->
    <style type="text/css"><?php $this->load->view('template/themes'); ?></style>
    <script type="text/javascript" src="<?=base_url(DEF_THEMES.'/jquery/dist/jquery.min.js')?>"></script>
</head>

<body class="menu-position-side menu-side-left full-screen with-content-panel">

<div class="menu-w selected-menu-color-light menu-activated-on-hover menu-has-selected-link sub-menu-color-bright menu-position-top menu-layout-compact sub-menu-style-over" style="background-color: #1b1a28;">
    <div class="logo-w">
        <a class="logo" href="#">
       <!-- <div class="logo-element"></div>
            <div class="logo-label">Clean Admin</div> -->
            <a href="<?= base_url('main') ?>">
            <img  style="<?=CNF_LOGO_LEFT_SIZE?>" src="<?=base_url(DEF_THEMES.'/css/img/'.CNF_LOGO_LEFT);?>">
            </a>
        </a>
    </div>
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="avatar-w">
                
                <!-- <img alt="" src="<?=base_url();?>img/<?=$profile_pic?>"> -->
                <img alt="" src="<?=base_url(DEF_THEMES.'/css/img/'.CNF_LOGO);?>">
                
            </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name" style="color: #fff"><?=$username?></div>
                <div class="logged-user-role" style="color: #fff"><?=$userlevel?></div>
            </div>
            <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
            </div>
            <div class="logged-user-menu" style="background: #1b1a28 !important">
                <div class="logged-user-avatar-info">
                    <div class="avatar-w">
                        
                            <!-- <img alt="" src="<?=base_url(DEF_THEMES.'/img/'.$profile_pic);?>"> -->
                            <img alt="" src="<?=base_url(DEF_THEMES.'/css/img/'.CNF_LOGO);?>">
                        
                    </div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name" style="color: #fff"><?=$username?></div>
                        <div class="logged-user-role" style="color: #fff"><?=$userlevel?></div>
                    </div>
                </div>
                <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                <ul>
                    <li><a href="<?=base_url('auth/logout');?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>




