<?php
require 'functions.php';
$start = microtime(true);
ob_start();
// require 'facade.php';
// require 'factoryMethod.php';
// require 'abstractFactory.php';
// require 'composite.php';
// require 'decorator.php';
 require 'strategy.php';
//require 'prototype.php';
$output = ob_get_clean();
if (isset($data)) extract($data);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?='PHP ' . ($title??'') . ' pattern'?></title>
</head>
<body>
	<?=$output . "\n"?>
</body>
</html>