<?php namespace ProcessWire;
// join another finder by its name

// test finder
$rf = new RockFinder2();
$rf->find("template=dog");
$rf->addColumns([
  'title',
  'owner',
]);

/**
 * Join owners
 * 
 * This is a separate finder joined only by its name loaded from persons.php;
 * This is great if you want/need to reuse finders
 */
$rf->addJoin('persons', 'owner');

/**
 * You can easily hide columns from the final output
 * See https://bit.ly/2jXbyYR
 */
$rf->hideColumns(['owner']);

// return finder
return $rf;