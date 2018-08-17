<!DOCTYPE html>
<html>
<head>

	<title>Search App Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="lib/css/v4/w3.css">
	<link rel="stylesheet" href="lib/css/v4/w3-theme-blue-grey.css">
	<link rel="stylesheet" href="lib/css/font-awesome-4.7.0/css/font-awesome.min.css">
	<script type="text/javascript"  src="lib/js/jquery-3.3.1.slim.min.js" ></script>
	<link rel="icon" type="image/png" href="images/sapp.ico">
	<style>
	.footer {
	   position: fixed;
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   background-color: red;
	   color: white;
	}
	</style>
</head>
<body>
	<!-- Navbar (sit on top) -->
<div class="w3-top w3-theme-light" >
	<div class="w3-row w3-padding">
		<div class="w3-col l6 w3-wide w3-padding"><strong>UCT SVR</strong></div>
		<div class="w3-col l6 ">
			<div class='w3-row'>	
				<form action="login-verify.php" method="POST">
				<div class="w3-row-padding w3-right">
					<div class="w3-third"><input class="w3-input w3-theme-l2 w3-round-xlarge" type="text" placeholder="Enter Username" name="username" required>
					
					<?php 
						if(isset($_GET["error"])){
							echo "<label class='w3-text-red w3-small'>Invalid username or password</label>";
						}
						else{
							echo "<label class='w3-text-red'>&nbsp</label>";
						}
					?>
					</div>
					<div class="w3-third w3-rightbar w3-border-theme">
						<input class="w3-input  w3-theme-l2 w3-round-xlarge" type="password" placeholder="Enter Password" name="password" required>
					</div>
					<div class="w3-third">
						<button class="w3-button w3-theme-action" type="submit"><strong>Login</strong></button>
					</div>
				</div>
				<div class="w3-row">
				
				</div>
				</form>
			</div>
		</div>
		
	</div>
	
</div>
<br>
<br>
<br>
<br>
<div class="footer w3-theme-dark w3-text-black w3-container">
	<div class="w3-row">
		<span class="w3-left">DSWD</span>
		<span class="w3-right">© NHTO 2018</span>
	</div>	
</div>

</body>
</html>