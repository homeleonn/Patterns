<?php

namespace Example\FactoryMethod;

abstract class Furniture
{
	protected static $shortName;
	public function __construct()
	{
		static::$shortName = (new \ReflectionClass($this))->getShortName();
	}
	
	public function getSelf()
	{
		return [static::who(), get_class() . '::' . get_called_class()];
	}
	
	public static function who()
	{
		return get_parent_class() . '::' . static::$shortName;
	}
	
}

trait WhoIsWho
{
	public static function who()
	{
		return get_parent_class() . '::' . static::$shortName;
	}
	
	public function getSelf()
	{
		$parent = parent::getSelf();
		array_push($parent, 'I\'m a ' . static::$shortName);
		
		return $parent;
	}
}