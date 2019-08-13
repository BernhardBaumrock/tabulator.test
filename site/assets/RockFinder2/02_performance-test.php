<?php namespace ProcessWire;
// Loads 10 pages from /data parent (200k pages)
$rf = new RockFinder2();
$rf->find("parent=/data, limit=10");
$rf->addColumns([
  'title',
  'status',
  'created',
]);
return $rf;