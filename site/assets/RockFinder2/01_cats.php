<?php namespace ProcessWire;
// list first 10 cats
$rf = new RockFinder2();
$rf->find("template=cat, limit=10");
$rf->addColumns([
  'title',
  'images',
  'kittens',
  'sex',
  'tags',
  'owner',
]);
$rf->addOptions([
  'tags',
  'sex',
]);
return $rf;