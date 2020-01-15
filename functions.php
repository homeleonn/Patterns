<?php
ini_set('xdebug.var_display_max_depth', 50);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);
ini_set('date.timezone', 'Europe/Kiev');
ini_set('xdebug.overload_var_dump', '1');

//cachegrind
// ini_set('xdebug.profiler_enable', '0');
// ini_set('xdebug.extended_info', '0');
// ini_set('xdebug.remote_enable', '0');
// ini_set('xdebug.auto_trace', '0');
// ini_set('xdebug.profiler_output_dir', 'C:\Program Files\VertrigoServ\www\test\webgrindresults');
// ini_set('xdebug.profiler_output_name', 'cachegrind.out.crc32');
// ini_set('xdebug.profiler_enable_trigger', '1');

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

spl_autoload_register(function($className){
	$class = str_replace('\\', '/', $className) . '.php';
	if (file_exists($class)) {
		require $class;
	}
});

function vd(){
	$trace = debug_backtrace()[1];
	echo '<small style="color: green;"><pre>',$trace['file'],':',$trace['line'],':</pre></small><pre>';
	call_user_func_array('var_dump', func_get_args()[0] ? [func_get_args()[0]] : [NULL]); return;
	// call_user_func_array('var_dump', func_get_args()[0] ? func_get_args()[0] : [NULL]); return;
	
	if (func_get_args()[0]){
		$args = func_get_args()[0];
		switch (count($args)) {
			case 1: var_dump($args[0]);break;
			case 2: var_dump($args[0],$args[1]);break;
			case 3: var_dump($args[0],$args[1],$args[2]);break;
			case 4: var_dump($args[0],$args[1],$args[2],$args[3]);break;
			case 5: var_dump($args[0],$args[1],$args[2],$args[3],$args[4]);break;
			case 6: var_dump($args[0],$args[1],$args[2],$args[3],$args[4],$args[5]);break;
			case 7: var_dump($args[0],$args[1],$args[2],$args[3],$args[4],$args[5],$args[6]);break;
			case 8: var_dump($args[0],$args[1],$args[2],$args[3],$args[4],$args[5],$args[6],$args[7]);break;
			case 9: var_dump($args[0],$args[1],$args[2],$args[3],$args[4],$args[5],$args[6],$args[7],$args[8]);break;
			default: call_user_func_array('var_dump', $args);
		}
	} else {
		return var_dump(NULL);
	}
}

function d(){
	vd(func_get_args());
}

function dd(){
	vd(func_get_args());
	exit;
}

function performance($callback, $steps = 100000){
	if ($steps <= 0) {
		throw new Exception('$steps must be larger then 0');
	}
	
	$start = microtime(true);
	while ($steps--) {
		$callback();
	}
	
	return microtime(true) - $start;
}