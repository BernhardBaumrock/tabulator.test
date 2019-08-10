<?php namespace ProcessWire;
// test finder
$rf = new RockFinder2();
$rf->name = "test";
$rf->selector("template=cat, limit=10");
$rf->addColumns([
  'title',
  'test:xxx',
]);
return $rf;
