<?php

if (!isset($_GET["action"]))
	exit();
if ($_GET["action"] === "set" && isset($_GET["name"]) && isset($_GET["value"])) {
	setcookie($_GET["name"], $_GET["value"], time()+60*60*24);
}
else if ($_GET["action"] === "get")
{
	if (isset($_GET["name"]) && isset($_COOKIE[$_GET["name"]]))
		echo $_COOKIE[$_GET["name"]] . "\n";
}
else if ($_GET["action"] === "del" && isset($_GET["name"])) {
	unset($_COOKIE[$_GET['name']]);
	setcookie($_GET["name"], $_GET["value"], time()-3600);
}
?>