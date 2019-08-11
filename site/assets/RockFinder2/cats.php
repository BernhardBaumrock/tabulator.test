<?php namespace ProcessWire;
// list first 10 cats
$rf = new RockFinder2();
$rf->name = "cats";
$rf->find("template=cat, limit=10");
$rf->addColumns([
  'title',
  'images',
  'childcats',
  'sex',
  'tags',
  'owner',
]);
$rf->addOptions([
  'tags',
  'sex',
]);
return $rf;
