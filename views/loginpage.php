<!DOCTYPE html>
<html lang="en">
<head>
	<title>Testprep Login</title>
	<meta charset="UTF-8">
</head>
<body>
	

<div class="login" style="text-align:center">
	<div class="login-pic">
		<img src="images/poilogo.jpeg"  style="width:128px;height: 128px;" alt="Performance Opportunity">
	</div>

	<form class="login-form" action="index.php" method="post">
		<span class="login-form-title"  style="font-size: large; font-style:bold;">
			Performance Opportunity
		</span>
		<br>
		<?php echo $error_message ?>
		<br>
			

		<div class="wrap-input validate-input" style="margin-top:20px; margin-bottom: 20px" data-validate = "Valid login is required.">
			<input class="input" type="text" name="login" placeholder="Login">
			<span class="focus-input"></span>
		</div>

		<div class="wrap-input validate-input"  style="margin-top:20px; margin-bottom: 20px" data-validate = "Password is required">
			<input class="input" type="password" name="password" placeholder="Password">
			<span class="focus-input"></span>

			<span class="symbol-input">
		</div>
		
		<div class="container-login-form-btn" style="margin-top:20px; margin-bottom: 20px">
			<button class="login-form-btn">
				Login
			</button>
		</div>

		<div class="text-center p-t-12">
			<span class="txt1">
				Forgot
			</span>
			<a class="txt2" href="#">
				Username / Password?
			</a>
		</div>

		<div class="text-center p-t-136">
			<a class="txt2" href="#">
				Create an Account
			</a>
		</div>
	</form>
</div>
		
	
	
	

</body>
</html>