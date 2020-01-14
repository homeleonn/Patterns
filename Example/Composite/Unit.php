<?php

namespace Example\Composite;

abstract class Unit
{
	public function getComposite()
	{
		return null;
	}
	
	abstract public function getDamage();
}