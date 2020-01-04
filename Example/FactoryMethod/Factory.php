<?php

namespace Example\FactoryMethod;

class Factory
{
	private $product;
	
	public function __construct(string $product)
	{
		$this->product = $product;
	}
	
	public function create()
	{
		$productClassName = __NAMESPACE__ . '\\' . ucfirst(strtolower($this->product));
		
		if (!class_exists($productClassName)) {
			throw new \Exception('Class ' . $productClassName . ' not exists!');
		} else {
			return new $productClassName;
		}
	}
}

// class TableFactory extends Factory
// {
	// public function create()
	// {
		// return new Table();
	// }
// }

// class ChairFactory extends Factory
// {
	// public function create()
	// {
		// return new Chair();
	// }
// }