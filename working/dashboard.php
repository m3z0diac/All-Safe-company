<?php

if (isset($_COOKIE['employe'])) {
	if ($_COOKIE['employe']==md5("True")) {
		http_response_code(200);
	}
	else {
		http_response_code(403);
	}
}

else {
  
  http_response_code(403);
  die("<center><h1 style='body{background-color: black};color:red';padding-top:25%;> Forbidden 403<br>you are not allowd to see this page<br>:(</h1></center>");
  exit;
}

if (isset($_POST['takenote']) && isset($_POST['note']) && isset($_POST['title'])) {
	$filename = $_POST['title'];
	$name = explode(".", $filename);
	if ($name[1]=="txt") {
		file_put_contents($filename, $_POST['note']);
		$msg = "<h3>note added <span style='color:green;'>seccessfuly</h3>";
	}
	else {
		$msg = "<h3>Can not accept <span style='color:red;'>".$name[1]."</span> file extension must be  <span style='color:green;'>txt</h3>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>AllSafe Company - Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<section>
		<div class="menu">
			<ul>
				<li><a href="../index.php" style="text-decoration-line: underline;">AllSafe</li></a></li>
				<li><a href="../empl.php">Employes</li></a></li>
				<li><a href="../evilc.php">EvilCorp</li></a></li>
				<li id="contact"><a href="logout.php">Logout</li></a></li>
			</ul>
		</div>
	</section>
	<section>
		<div class="AllSafe">
			<form method="post">
				<h2>take work notes</h2>
				<?php
					if (isset($msg)) {
						echo $msg;
					}
				?>
				<input type="text" name="title" placeholder="note title EX: note.txt"><br><br><!--this note will be added in this dir!-->
				<textarea name="note" id="n"></textarea><br><br>
				<input type="submit" name="takenote" value="takenote">
			</form>
			<div style="float: left;">
				<h2>my notes</h2>
				<?php
					$files = scandir(".");
					foreach ($files as $f => $file) {
						if ($file == "." || $file == ".." || $file == "dashboard.php" || $file == "logs.txt") {
							md5("null");
						}
						else {
							echo "<h4>[+] " . $file . "</h4>";
						}
					}
				?>
			</div>
			<div style="float: right; text-align: left; padding-right: 100px;">
				<h2>logs status</h2>
				<a href="logs.txt" style="color:purple;">server logs</a>
			</div>
		</div>
	</section>
</body>
</html>