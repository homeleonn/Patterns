<?php

namespace Example\Composite;

class Army extends CompositeUnit
{
	private $units = [];
	private $armies = [];
	
	public function addUnit(Unit $unit)
	{
		$this->units[] = $unit;
	}
	
	public function addArmy(Army $army)
	{
		$this->armies[] = $army;
	}
	
	public function removeUnit(Unit $unit)
	{
		if ($removeKey = array_search($unit, $this->units)) {
			unset($this->units[$removeKey]);
		}
	}
	
	public function getDamage()
	{
		$fullDamage = 0;
		foreach ([$this->units, $this->armies] as $army) {
			$fullDamage += $this->calcDamage($army);
		}
		
		return $fullDamage;
	}
	
	private function calcDamage($army)
	{
		$fullDamage = 0;
		if ($army) {
			foreach ($army as $a) {
				$fullDamage += $a->getDamage();
			}
			return $fullDamage;
		}
		
		return $fullDamage;
	}
}