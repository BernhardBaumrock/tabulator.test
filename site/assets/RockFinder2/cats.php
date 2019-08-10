<?php namespace ProcessWire;
// list first 10 cats
$rf = new RockFinder2();
$rf->name = "cats";
$rf->selector("template=cat, limit=10");
$rf->addColumns([
  'title',
  'images',
  'childcats',
]);
return $rf;
