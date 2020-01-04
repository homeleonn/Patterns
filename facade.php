<?php

use Pattern\Facade;

spl_autoload_register(function($className){
	static $load = [
		'Car' => Example\Facade\Car::class,
		'Airplane' => Example\Facade\Airplane::class,
		'Mixer' => Example\Facade\Mixer::class,
	];
	if (isset($load[$className])) {
		$filename = str_replace('\\', '/', __DIR__ . '/' . $load[$className]) . '.php';
		
		if (file_exists($filename)) {
			require $filename;
			class_alias($load[$className], $className);
		}
	}
});


d(Car::run());
d(Mixer::run());
d(Airplane::run());