<?php

use Example\AbstractFactory;
use Example\AbstractFactory\House;
use Example\AbstractFactory\OfficeSituationFactory;

$house = new House();

$house->createFurniture('table');
$house->createFurniture('table');
$house->createElectronics('Computer');
$house->createFurniture('Chair');
$house->createElectronics('Videoplayer');

d($house);

// Office

$situationFactory = new OfficeSituationFactory();

$office = [];

$office['chairs'][] = $situationFactory->getChair();
$office['tables'][] = $situationFactory->getTable();
$office['tables'][] = $situationFactory->getTable();
$office['computers'][] = $situationFactory->getComputer();

d($office);
$office['computers'][0]->compute();