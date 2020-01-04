<?php

use Example\FactoryMethod\Furniture\Furniture;
use Example\FactoryMethod\Furniture\FurnitureFactory;
use Example\FactoryMethod\Electronics\ElectronicsFactory;

function foo(Furniture $furniture): void
{
	d($furniture->getSelf());
}

function bar(ElectronicsFactory $factory): void
{
	$electronics = $factory->create();
	d($electronics->getSelf());
}

foo((new FurnitureFactory('table'))->create());
foo((new FurnitureFactory('chair'))->create());
bar(new ElectronicsFactory('computer'));
bar(new ElectronicsFactory('Videoplayer'));
// foo(new TableFactory());
// foo(new ChairFactory());