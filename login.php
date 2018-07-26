<!DOCTYPE html>
<html>
<head>

	<title>Search App Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="lib/css/v4/w3.css">
	<link rel="stylesheet" href="lib/css/font-awesome-4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="lib/js/jquery-2.1.3.js"></script>

</head>
<body>
	<div class="w3-row">	
		<br>	
		<br>	
		<br>
	</div>
		
	<div class="w3-container">


		<div class="w3-row">
			<div class="w3-col l4">&nbsp	</div>
			<div class="w3-col l4 w3-border w3-card">

				<div class='w3-container	'>
					<div class="w3-center w3-container	"><br>
					<img src="images/img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
					</div>

					<br>
					<div class="w3-row w3-border-top">
						<form class="" action="login-verify.php" method="POST">
							<div class="w3-section">
								<label><b>Username</b></label>
								<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
								<label><b>Password</b></label>
								<input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
								<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
							</div>
						</form>
					</div>
				</div>



			</div>
			<div class="w3-col l4">&nbsp	</div>
		</div>
	</div>

</body>
</html>