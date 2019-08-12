<?php namespace ProcessWire;
$persons = new RockFinder2();
$persons->find('template=person');
$persons->addColumns(['title', 'age']);

// test finder
$rf = new RockFinder2();
$rf->name = "test";
$rf->find("template=dog");
$rf->addColumns([
  'title',
]);
$rf->addRelation('foo', ['foo'=>'bar']);
$rf->addRelation('persons', $persons);
return $rf;