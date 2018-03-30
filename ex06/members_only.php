<?php

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
	header('WWW-Authenticate: Basic realm="Member area"');
	header('HTTP/1.0 401 Unauthorized');
	exit;
}
else {
	if ($_SERVER['PHP_AUTH_USER'] === "zaz" && $_SERVER['PHP_AUTH_PW'] === "jaimelespetitsponeys") {
		if (!($content = @file_get_contents("../img/42.png")))
			exit("Can't read image\n");
		if (!($image = base64_encode($content)))
			exit("Can't encode image\n");
		echo "<html><body>\nHello Zaz<br />\n<img src='data:image;base64," . $image . "'>\n</body></html>\n";
	}
	else {
		header('WWW-Authenticate: Basic realm="Member area"');
		header('HTTP/1.0 401 Unauthorized');
		echo "<html><body>That area is accessible for members only</body></html>\n";
	}
}

?>