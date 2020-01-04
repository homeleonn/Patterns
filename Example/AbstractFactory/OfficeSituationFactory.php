<?php

namespace Example\AbstractFactory;

use \Example\FactoryMethod\Furniture\{Table, OfficeChair};
use \Example\FactoryMethod\Electronics\{Computer, Videoplayer, OfficeComputer};

class OfficeSituationFactory extends SituationFactory
{
	public function getTable()
	{
		return new Table;
	}
	
	public function getChair()
	{
		return new OfficeChair;
	}
	
	public function getComputer()
	{
		return new OfficeComputer;
	}
}