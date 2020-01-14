<?php

namespace Example\Composite;

abstract class CompositeUnit extends Unit
{
	public function getComposite()
	{
		return $this;
	}
	
	abstract public function addUnit(Unit $unit);
	abstract public function removeUnit(Unit $unit);
}