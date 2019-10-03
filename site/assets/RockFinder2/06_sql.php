<?php namespace ProcessWire;
// Find data via SQL
$query = new DatabaseQuerySelect();
$query->select('*');
$query->from('pages');
$query->limit('0,10');

$rf = new RockFinder2();
$rf->find($query);
return $rf;