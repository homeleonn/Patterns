<?php

namespace Example\FactoryMethod;

abstract class Factory
{
	protected $product;
	
	public function __construct(string $product)
	{
		$this->product = $product;
	}
	
	public function create()
	{
		$productClassName = static::getNameSpace() . '\\' . ucfirst(strtolower($this->product));
		
		if (!class_exists($productClassName)) {
			throw new \Exception('Class ' . $productClassName . ' not exists!');
		} else {
			return new $productClassName;
		}
	}
}