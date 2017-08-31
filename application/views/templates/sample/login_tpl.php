<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="copyright" content="Purbadian Solution" />
	<meta name="author" content="Yenda Purbadian" />
	
	<title>Login System</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/style_login.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/style_form.css'); ?>" />

	<!-- google login -->
	<meta name="google-signin-client_id" content="360506096285-dv51jmbpsc7p17oi28dv7r10tqd00673.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<!-- google login end -->

	<script type="text/javascript" src="<?php echo base_url('/assets/plugins/jQuery_v1.11.2/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
</head>
<body>
	<div class="row layout-center">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div id="wrapper">
				<?php if ($this->session->flashdata('status') == 'failed'): ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
						<span>Username atau password salah!!</span>
					</div>
				<?php endif; ?>
				<div id="wrappertop"></div>
				<div id="wrappermiddle"><!-- id wrappermiddle -->
					<span><h2>Login System</h2></span>
					
					<!-- google login -->
					<div class="g-signin2" data-onsuccess="onSignIn"></div>
					<!-- google login end -->

					<form class="form-signin" action="<?php echo base_url('index.php/site/login'); ?>" method="post">
						<div id="username_input">
							<input name="username" type="text" class="form-control animate0 bounceIn" id="url" placeholder="Username" required autofocus />
						</div>
						<div id="password_input">
							<input name="password" type="password" class="form-control animate1 bounceIn" id="url" placeholder="Password" required />
						</div>
						<div id="submit">
							<button class="btn btn-primary button_blue animate2 bounceIn" id="url_btn" type="submit">Log In</button>
						</div>
					</form>
				</div><!-- end id wrappermiddle -->
				<div id="wrapperbottom"></div>
            </div>
        </div>
    </div>
</body>
</html>