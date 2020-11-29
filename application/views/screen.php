
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

            #welcomeToRow{
                margin-top: 88px
            }
		}

		@media screen and (max-width: 768px) {

			#welcomeToRow{
                margin-top: 266px;
            }
		}
	</style>

</head>
<body class="hold-transition login-page" style="background-image:url('<?= base_url() ?>assets/images/png/bg-login.png'); background-repeat: no-repeat;background-size: 100% 100%;">
<div class="row">
	<div class="col-md-8">
		<div class="row" style="" id="welcomeToRow">
			<b style="color: #fff; font-size: 30px" class="mx-auto">Welcome To</b>
		</div>
		<div class="row" id="logoRow">
			<img class="mx-auto" src="<?= base_url() ?>assets/images/png/digipol-font-solid.png" alt="" style="width: 30%;">
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
