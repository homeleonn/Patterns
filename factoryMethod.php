<?php

use Example\FactoryMethod\Factory;

function foo(Factory $factory): void
{
	$furniture = $factory->create();
	d($furniture->getSelf());
}

foo(new Factory('table'));
foo(new Factory('chair'));
// foo(new TableFactory());
// foo(new ChairFactory());