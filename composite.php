<?php

use Example\Composite\{Army, Archer, Laser};

$army = new Army;

$army->addUnit(new Archer);
$army->addUnit(new Laser);

$army2 = new Army;

$army2->addUnit(new Archer);
$army2->addUnit(new Laser);
$army2->addUnit(new Archer);

$army->addArmy($army2);

d($army->getDamage());