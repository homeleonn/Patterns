<?php

abstract class Tile
{
	abstract public function getWealthFactor(): int;
}

class Plane extends Tile
{
	private $wealthFactor = 2;
	
	public function getWealthFactor(): int
	{
		return $this->wealthFactor;
	}
}

/**
 *  Wrong variant via(using) inheritance
 */
 
class DiamondPlains extends Plane
{
	public function getWealthFactor(): int
	{
		return parent::getWealthFactor() + 2;
	}
}

class PollutionPlains extends Plane
{
	public function getWealthFactor(): int
	{
		return parent::getWealthFactor() - 4;
	}
}

$tile = new PollutionPlains();
d($tile->getWealthFactor());


/**
 *  Correct variant via(using) aggregation
 */


abstract class TileDecorator extends Tile
{
	protected $tile;
	
	public function __construct(Tile $tile)
	{
		$this->tile = $tile;
	}
}

class DiamondDecorator extends TileDecorator
{
	use TConcretteDecorator;
	private $wealthFactor = 2;
}

class PollutionDecorator extends TileDecorator
{
	use TConcretteDecorator;
	private $wealthFactor = -4;
}

class GoldDecorator extends TileDecorator
{
	use TConcretteDecorator;
	private $wealthFactor = 5;
}

trait TConcretteDecorator
{
	public function getWealthFactor(): int
	{
		return $this->tile->getWealthFactor() + $this->wealthFactor;
	}
}

d(
	(new GoldDecorator(
		new PollutionDecorator(
			new DiamondDecorator(
				new Plane()
			)
		)
	))->getWealthFactor()
);
