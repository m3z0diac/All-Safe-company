<?php

if (isset($_COOKIE['employe'])) {
	if ($_COOKIE['employe']==md5("True")) {
		header("Location: working/dashboard.php");
	}
	elseif ($_COOKIE['employe']==md5("False")) {
		header("Location: empl.php");
	}
}


if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username=="elliot" && $password=="qwerty") {
		setcookie("employe", md5("True"), time()+3600);
		header("Location: working/dashboard.php");
	}
	elseif ($username=="darlin" && $password=="hackurlife") {
		setcookie("employe", md5("True"), time()+3600);
		header("Location: working/dashboard.php");
	}
	else {
		setcookie("employe", md5("False"), time()+3600);
		$msg = "Incorect !";
	}	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>AllSafe Employes</title>
	<link rel="stylesheet" type="text/css" href="css/bo.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section>
		<div class="menu">
			<ul>
				<li><a href="index.php">AllSafe</li></a></li>
				<li><a href="empl.php" style="text-decoration-line: underline;">Employes</li></a></li>
				<li><a href="evilc.php">EvilCorp</li></a></li>
				<li id="contact"><a href="contact.php">Contact</li></a></li>
			</ul>
		</div>
	</section>
	<section>
		<div class="AllSafe">
			<h1 style="text-align:center;">AllSafe Employes Corner</h1>
			<form method="post">
				<input type="text" name="username" placeholder="username or email" required><br><br>
				<input type="password" name="password" placeholder="password" required><br><br>
				<input type="submit" name="login"><br>
				<?php
					if (isset($msg)) {
						echo "<h3 style='color:red;font-size:20;'>" . $msg . "</h3>";
					}
				?>
			</form>
		</div>
	</section>
</body>
</html>