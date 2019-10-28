<?php namespace ProcessWire;
// ###############################################################
// see Setup > RockMarkup2 > Examples > e02_all_possible_filetypes
// ###############################################################

$rf = new RockFinder2();
$rf->find("template=cat");
$rf->addColumns([
  'title',
  'testCase',
]);

$grid->setData($rf);
return $grid;
