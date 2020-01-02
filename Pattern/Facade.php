<?php

namespace Pattern;

abstract class Facade
{
	public static function __callStatic(string $method, array $args)
	{
		if (!isset(static::$className)) {
			throw new Exception('Extended class must declare static variable className');
		}
		
		static::$className = 'Example\\Facade\\Implementation\\' . static::$className;
		
		if (!class_exists(static::$className)){
			throw new Exception('Not declared called class');
		}
		
		if (class_exists(DiC::class)) {
			if (!DiC::i()->has(static::$className)) {
				DiC::i()->set(static::$className, new static::$className);
			} 
			
			$class = DiC::i()->get(static::$className);
		} else {
			$class = new static::$className;
		}
		
		
		if (!method_exists($class, $method)) {
			throw new Exception('Method not exists in "' . static::$className . '" class.');
		}
		
		return call_user_func_array([$class, $method], $args);
	}
}