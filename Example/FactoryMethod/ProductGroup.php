<?php

namespace Example\FactoryMethod;

abstract class ProductGroup
{
	protected static $shortName;
	
	public function __construct()
	{
		static::$shortName = (new \ReflectionClass($this))->getShortName();
	}
	
	public function getSelf(): array
	{
		return [static::who(), get_class() . '::' . get_called_class()];
	}
	
	public static function who(): string
	{
		return get_parent_class() . '::' . static::$shortName;
	}
}