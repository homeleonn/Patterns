<?php

namespace Example\FactoryMethod\Furniture;

use \Example\FactoryMethod\Factory;

class FurnitureFactory extends Factory
{
	protected static function getNameSpace()
	{
		return __NAMESPACE__;
	}
}

// class TableFactory extends FurnitureFactory
// {
	// public function create(): Table
	// {
		// return new Table();
	// }
// }

// class ChairFactory extends FurnitureFactory
// {
	// public function create(): Chair
	// {
		// return new Chair();
	// }
// }