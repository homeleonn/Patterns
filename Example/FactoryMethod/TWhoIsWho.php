<?php

namespace Example\FactoryMethod;

trait TWhoIsWho
{
	public static function who(): string
	{
		return get_parent_class() . '::' . static::$shortName;
	}
	
	public function getSelf(): array
	{
		$parent = parent::getSelf();
		array_push($parent, 'I\'m a ' . static::$shortName);
		
		return $parent;
	}
}