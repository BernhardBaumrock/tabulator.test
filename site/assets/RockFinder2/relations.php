<?php namespace ProcessWire;
$persons = new RockFinder2();
$persons->find('template=person');
$persons->addColumns(['title', 'age']);

// test finder
$rf = new RockFinder2();
$rf->name = "test";
$rf->find("template=cat, owner=1235|1236");
$rf->addColumns([
  'title',
  'owner',
  'childcats',
]);
$rf->addRelation('persons', $persons, 'owner');
return $rf;