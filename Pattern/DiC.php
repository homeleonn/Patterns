<?php

namespace Pattern;

class DiC
{
	use Singleton;
	
	public static function i()
	{
		return self::getInstance();
	}
	
	private $el;
	private function __construct(){}
	
	public function set($dependencyName, $dependency){
		$this->el[$dependencyName] = $dependency;
	}
	
	public function get($dependencyName){
		return $this->has($dependencyName) ? $this->el[$dependencyName] : NULL;
	}
	
	public function has($dependencyName){
		return isset($this->el[$dependencyName]);
	}
}