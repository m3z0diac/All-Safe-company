<?php


if (isset($_COOKIE['employe'])) {
	if ($_COOKIE['employe']==md5("True")) {
		setcookie("employe", md5("False"), time() - 3600);
		unset($_COOKIE['employe']);
		header("Location: ../index.php");
	}
}



?>