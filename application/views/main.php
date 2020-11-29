
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Digipol</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?=base_url(DEF_THEMES.'/'.ASSETS_THEMES.'/favicon.ico');?>">

	<style>
		@media screen and (min-width: 768px) {

            #logoRow{
                margin-top: 88px
            }

            #imageLogo,
            #imageLapor,
            #imageRekap{
                width: 20%;
            }

            #titleRekap{
                margin-right: 60px;
                font-size: 30px;
            }

            #titleLapor{
                margin-left: 75px;
                font-size: 30px;
            }
		}

		@media screen and (max-width: 768px) {

			#logoRow{
                margin-top: 200px;
            }
        
            #imageLogo{
                width: 80%;
            }

            #imageLapor,
            #imageRekap{
                width: 50%;
            }

            #titleRekap{
                margin-right: 47px;
                font-size: 25px;
            }

            #titleLapor{
                margin-left: 51px;
                font-size: 25px;
            }
		}
	</style>

</head>
<body class="hold-transition login-page" style="background-image:url('<?= base_url() ?>assets/images/png/bg-after-login.png'); background-repeat: no-repeat;background-size: 100% 100%;">
<div class="row">
	<div class="col-md-12">
		<div class="row" id="logoRow">
			<img class="mx-auto" src="<?= base_url() ?>assets/images/png/digipol-font-solid.png" alt="" id="imageLogo">
        </div>
        <div class="mt-3">
            <div class="row">
                <div class="col-6">
                    <a href="<?= base_url('report') ?>">
                        <div class="">
                            <img class="float-right mr-5" src="<?= base_url() ?>assets/images/png/icon-lapor.png" alt="" id="imageLapor">
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('rekap') ?>">
                        <div>
                            <img class="ml-5" src="<?= base_url() ?>assets/images/png/icon-rekap.png" alt="" id="imageRekap">
                        </div>
                    </a>
                </div>
                <div class="col-6 mt-4">
                    <a href="<?= base_url('report') ?>">
                        <div class="">
                            <b style="color: #fff;" class="float-right" id="titleRekap">E-Lapor</b>
                        </div>
                    </a>
                </div>
                <div class="col-6 mt-4">
                    <a href="<?= base_url('rekap') ?>">
                        <div>
                            <b style="color: #fff; " id="titleLapor">E-Rekap</b>
                        </div>
                    </a>
                </div>
            </div>
        </div>
	</div>
<!-- /.login-box -->
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/template/dist/js/adminlte.min.js"></script>

</body>
</html>
