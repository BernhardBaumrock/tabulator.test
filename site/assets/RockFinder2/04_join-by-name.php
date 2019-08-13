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

// return finder
return $rf;
