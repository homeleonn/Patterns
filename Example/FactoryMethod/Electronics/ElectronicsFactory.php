<?php

namespace Example\FactoryMethod\Electronics;

use \Example\FactoryMethod\Factory;

class ElectronicsFactory extends Factory
{
	protected static function getNameSpace()
	{
		return __NAMESPACE__;
	}
}