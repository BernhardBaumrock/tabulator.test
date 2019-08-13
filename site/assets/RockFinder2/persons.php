<?php namespace ProcessWire;
$rf = new RockFinder2();
$rf->find('template=person');
$rf->addTemplateColumns('person');
return $rf;