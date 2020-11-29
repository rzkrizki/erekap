
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>M1 Affiliate</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url() ?>assets/favicon_m1.png" width="32">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Ionicons -->
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/dist/css/adminlte.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/sweetalert-master/dist/sweetalert.css">
</head>
<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
    background-color: #ae0001 !important;
    }

    .nav-pills .nav-link:not(.active):hover {
        color:  #fff !important;
    }

    @media screen and (min-width: 768px) {
        #rowCopy{
        display: none;
        }
    }
    
    tr:nth-child(even) {
        background-color: rgb(222, 226, 230);
        /* background-color: #D3D3D3; */
    }

    #wait{
		position: fixed;
		background-color: #ded9d978;
		top:0;
		left: 0;
		width: 100%;
		height: 100%;
		padding-top: 45vh;
		text-align: center;
		z-index: 1031;
	}

    @media (min-width: 992px){
        .sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused, .sidebar-mini.sidebar-collapse .main-sidebar:hover
        {
            width: 5.6rem !important;
            margin-left: 0;
            overflow-y: hidden;
            overflow-x: hidden;
            text-align: center;
        }

        .sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused, .sidebar-mini.sidebar-collapse .main-sidebar:hover #nav-link-p{
            display: none !important;
        }

        .sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused, .sidebar-mini.sidebar-collapse .main-sidebar:hover #nav-link-x{
            display: none !important;
        }

        .sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused, .sidebar-mini.sidebar-collapse .main-sidebar:hover #brand-link #brand-text #nav-link-x{
            display: none !important;
        }

        .sidebar-mini.sidebar-collapse .main-sidebar, .sidebar-mini.sidebar-collapse .main-sidebar::before {
            margin-left: 0;
            width: 5.6rem !important;
            text-align: center;
        }
        
    }

    @media (min-width: 768px){
        #pushMenuMobile{
            display: none;
        }

        #pushMenuRight{
             margin-right: 165px;
        }

        .dropshipSidebar{
            font-size: 16px;
        }

        #infoDropship{
            margin-top: 8px;
        }

    }

    @media (max-width: 768px){

        #pushMenuRight{
            display: none;
        }

        .dropshipSidebar{
            font-size: 15px;
        }

        #infoDropship{
            margin-top: 4px;
        }
    }
    
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="wait" style="display: none;">
		<img src="<?= base_url('assets/img/preloader/loading.gif')?>" width="50px"> <span style="color:#fff;font-weight: 400;font-size:20px">Loading...</span>
	</div>
<div class="wrapper">
