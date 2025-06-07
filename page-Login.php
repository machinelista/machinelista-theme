<?php
	/*
		Template name: Dealer Login
	*/
?>
<?php get_header(); ?>

<body <?php body_class(); ?>>

	<!-- // Page specific CSS -->
	<style>
		body {
			min-height: 100vh;
		}
		.memberLogin {
			display: grid;
			grid-template-columns: 1fr 1fr;
			height: 100vh
		}
		.memberLogin .left {
			display: flex;
			justify-content: center;
			align-items: center;
			/*background-color: rgba( 32, 82, 103, 0.66);*/
			/*border-right: 1px solid var(--siteBlue);*/
		}
		.memberLogin .left .text {
			text-align: center;
			margin-top: -90px;
		}
		.memberLogin .left h1 {
			color: #8DA6B1;
			text-transform: uppercase;
			line-height: 0.9em;
		}
		.memberLogin .left h1.member {
			font-size: 97px;
		}
		.memberLogin .left h1.login {
			font-size: 140px;
		}
		/*---------------------*/
		.memberLogin .right {
			display: grid;
			grid-template-rows: 1fr 2fr 1fr;
		}
		.memberLogin .right .loginPageLogo {
			text-align: center;
			padding: 40px 0 0;
		}
		.memberLogin .right .loginPageLogo img {
			width: 165px;
			margin-top: 32px;
		}
		.memberLogin .right .memberLoginForm {
			width: 70%;
			margin: 0 auto;
			display: grid;
			align-items: center;
		}
		.memberLogin form p {
			margin-bottom: 30px;
		}
		.memberLogin form p.login-password {
			margin-bottom: 10px;
		}
		.memberLogin form p label,
		.memberLogin form p input:not(.memberLogin form p input[type='checkbox'],.memberLogin form p input[type='submit']) {
			display: block;
			color: #82A2B3;
			width: 100%;
		}
		.memberLogin form p input:not(.memberLogin form p input[type='checkbox'],.memberLogin form p input[type='submit']) {
			margin-top: 10px;
		    border: none;
		    border-bottom: 1px solid rgba( 32, 82, 103, 0.14 );
		    padding: 0 0 3px;
		    font-size: 15px;
		    font-weight: bold;
		}
		.memberLogin form p input {
			outline: none;
		}
		.memberLogin form p input:autofill {
			background: #fff;
		}
		.memberLogin form p.login-remember label {
			cursor: pointer;
		}
		.memberLogin form p input[type=checkbox] {
			margin-right: 5px;
			cursor: pointer;
		}
		.memberLogin form p.login-submit {
			text-align: left;
			position: relative;
			bottom: -40px;
		}
		.memberLogin form p input[type=submit] {
			background-color: var(--siteOrange);
			color: #fff;
			border: none;
			padding: 13px 40px;
			font-size: 16px;
			border-radius: 25px;
			font-weight: bold;
			width: 184px;
			cursor: pointer;
		}
		/*---------------------*/
		.memberLogin .formError {
			width: 70%;
			margin: 0 auto;
			display: grid;
			align-items: center;
			height: 66px;
		}
		.memberLogin .formError span {
			color: #82A2B3;
		}
		/*----------------*/
		p.login-remember .showPassWrapper {
			display: inline-block !important;
		}
		p.login-remember .showPassWrapper label {
			padding-left: 25px;
			position: relative;
			left: -22px;
		}
		p.login-remember label {
			display: inline-block !important;
			width: auto !important;
			margin-right: 20px;
		}
		p.login-remember {
			margin-top: 25px !important;
		}
	</style>

	<!-- // Dealer Login -->
	<div class="fullWidth_wrapper">
		<div class="memberLogin">
			<div class="left">
				<div class="text">
					<h1 class="member">member</h1>
					<h1 class="login">login</h1>
				</div>
			</div>

			<div class="right">
				<div class="loginPageLogo">
					<!-- <a href="<?php bloginfo('home'); ?>"><img src="<?php rooturi(); ?>/img/login-page-logo.png" alt=""></a> -->
				</div>

				<div class="memberLoginForm">
					<?php
						$args = array(
							'redirect' => '/member-dashboard',
							'id_username'    => 'user_loginn',
							'id_password'    => 'user_passs',
							'label_username' => 'Username or Email',
						);
						wp_login_form( $args );
					?>
				</div>

				<div class="formError">
					<span>
						<?php
							$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;

							if ( $login === "failed" ) {
							  echo '<strong>ERROR:</strong> Invalid username or password.';
							} /*elseif ( $login === "empty" ) {
							  echo '<strong>ERROR:</strong> Username or Password is empty.';
							}*/ elseif ( $login === "false" ) {
							  echo 'You are logged out.';
							}
						?>
					</span>
				</div>
			</div>
		</div>
	</div>

	<!-- //  -->
	<!-- <div class="fullWidth_wrapper">
		<div class="site_container">
			
		</div>
	</div> -->

	<script>
		jQuery(document).ready(function($) {
			$("#loginform .login-remember").append('<div class="showPassWrapper"><input type="checkbox" id="showPass"><label for="showPass"> Show Password</label></div>');

			function showPass() {
				var x = document.getElementById("user_passs");

				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}

			$("label[for=showPass]").click(function(event) {
				$(this).children('input').click();
				showPass();
			});
		});
	</script>

	<?php wp_footer(); ?>
</body>
</html>