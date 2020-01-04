<?php

namespace Example\FactoryMethod\Electronics;

use \Example\FactoryMethod\TWhoIsWho;

class OfficeComputer extends Electronics
{
	use TWhoIsWho;
	
	public function compute()
	{
		d('I\'m computing office files...');
	}
}