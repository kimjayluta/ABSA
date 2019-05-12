<?php

if (isset($_GET["logout"])) {
	unset($_COOKIE['usn']);
	setcookie('usn', null, -1, '/');
	header('location: ../index.php');
}

?>