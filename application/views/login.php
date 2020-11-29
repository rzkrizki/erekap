
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

			#loginTitle{
				font-size: 30px;
			}

			
			#titleWelcome{
				font-size: 50px;
			}

			#logoDigipol{
				width: 30%;
			}
		}

		@media screen and (max-width: 768px) {

			#welcomeToRow {
				margin-right: 25px;
				margin-left: 31px;
			}

			#titleWelcome{
				font-size: 50px;
			}

			#logoRow{
				margin-right: -10px;
    			margin-bottom: 40px;
			}

			#loginTitle{
				font-size: 34px;
				margin-left: 35px;
			}

			#logoDigipol{
				width: 39%;
			}

			#input_login{
				margin-left: 39px;
			}
		}
	</style>

</head>
<body class="hold-transition login-page" style="background-image:url('<?= base_url() ?>assets/images/png/bg-login.png'); background-repeat: no-repeat;background-size: 100% 100%;">
<div class="row">
	<div class="col-md-8">
		<div class="row" style="margin-top: -88px" id="welcomeToRow">
			<b style="color: #fff;" class="mx-auto" id="titleWelcome">Welcome To</b>
		</div>
		<div class="row" id="logoRow">
			<img class="mx-auto" src="<?= base_url() ?>assets/images/png/digipol-font-solid.png" alt="" style="" id="logoDigipol">
		</div>
	</div>
	<div class="col-md-4">
		<div class="login-box" style="margin-top: -20px;">
			<div class="login-logo">
				<a href="<?= base_url() ?>assets/templateindex2.html"><b style="color: #fff;"/ id="loginTitle">Login</b></a>
			</div>
			<!-- /.login-logo -->
			<div class="card" style="box-shadow: none; border: none">
				<div class="card-body" style="background-color: #1b1a28;">
				<form id="input_login" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Username" id="username" name="username" style="border: 2px solid #00dddd; background-color: #192b39; color: #fff">
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" id="password" name="password" style="border: 2px solid #00dddd; background-color: #192b39; color: #fff">
					</div>
				
					<div class="social-auth-links text-center mb-3">
						<button type="submit" class="btn btn-primary" style="background-color: #00dddd; color: #000; border: 2px solid #00dddd;">
							Login
						</button>
					</div>
				</form>
				<!-- /.social-auth-links -->
				</div>
				<!-- /.login-card-body -->
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
<!-- Swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">


	$('#input_login').submit(function(event){
        event.preventDefault();
		$.ajax({
            type: 'POST',
            url: '<?= base_url('login/send_data'); ?>',
            data: {
				'username': $('#username').val(),
				'password': $('#password').val(),
			},
   			dataType: 'json',
            success: function(data) {
              if(data.status == 'error'){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: data.message,
				})
			  }else{
				window.location.href = '<?= base_url('main') ?>'
			  }
			console.log(data.status);
            }
        });
	})

</script>

</body>
</html>

