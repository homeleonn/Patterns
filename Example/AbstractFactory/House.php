<?php

namespace Example\AbstractFactory;

use \Example\FactoryMethod\Furniture\{Furniture, FurnitureFactory};
use \Example\FactoryMethod\Electronics\{Electronics, ElectronicsFactory};

class House
{
	private $furniture 	 = [];
	private $electronics = [];
	private $factories   = [];
	
	public function createFurniture($product): Furniture
	{
		return $this->create('furniture', $product);
	}
	
	public function createElectronics($product): Electronics
	{
		return $this->create('electronics', $product);
	}
	
	private function create($type, $product)
	{
		if (!isset($this->factories[$type][$product])){
			$namespaceType = ucfirst($type);
			$factory = '\\Example\\FactoryMethod\\' . $namespaceType . '\\' . $type . 'Factory';
			$this->factories[$type][$product] = new $factory($product);
		}
		
		$this->$type[] = $this->factories[$type][$product]->create($product);
		
		return $this->$type[count($this->$type) - 1];
	}
}