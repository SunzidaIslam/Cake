<?php
include '../classes/Adminlogin.php';
?>
<?php
	$al = new Adminlogin();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$adminEmail = $_POST['adminEmail'];
		$adminPass = $_POST['adminPass'];

		$loginChk = $al->adminLogin($adminEmail,$adminPass);
	}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span style="color:red;font-size: 18px">
				<?php
				if (isset($loginChk)) {
					echo $loginChk;
				}
				?>
			</span>
			<div>
				<input type="text" placeholder="User" name="adminEmail"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#"></a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>