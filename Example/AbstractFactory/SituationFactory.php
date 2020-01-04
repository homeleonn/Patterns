<?php

namespace Example\AbstractFactory;

abstract class SituationFactory
{
	abstract public function getChair();
	abstract public function getTable();
	abstract public function getComputer();
}