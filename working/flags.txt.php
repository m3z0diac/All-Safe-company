<?php

if (isset($_COOKIE['employe'])) {
	if ($_COOKIE['employe']==md5("True")) {
		http_response_code(200);
	}
	else {
		http_response_code(301);
	}
}

else {
  
  http_response_code(403);
  die("<center><h1 style='body{background-color: black};color:red';padding-top:25%;> Forbidden 403<br>you are not allowd to see this page<br>:(</h1></center>");
  exit;
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>flags</title>
</head>
<body>
	<p>user: flag{gr34t_y0u_h4v3_1n1t14l_4css3s!}</p>
	<p>root: <?php //flag{gr34t_y0u_4r3_th3_0wner!} ; ?> <!-you can readme only from the dark!-> </p>
</body>
</html>