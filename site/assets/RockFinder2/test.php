<?php namespace ProcessWire;
// test finder
$rf = new RockFinder2();
$rf->name = "test";
$rf->find("parent=/data, limit=10");
$rf->addColumns([
  'title',
  'status',
  'created',
]);
return $rf;
