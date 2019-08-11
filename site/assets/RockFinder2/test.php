<?php namespace ProcessWire;
// test finder
$rf = new RockFinder2();
$rf->name = "test";
$rf->find("parent=/data");
$rf->addColumns([
  'title',
  'status',
  'created',
]);
return $rf;
