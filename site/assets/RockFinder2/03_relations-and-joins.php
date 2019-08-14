<?php namespace ProcessWire;
// Show relations and join feature of RockFinder2

// test finder
$rf = new RockFinder2();
$rf->find("template=cat, limit=20");
$rf->addColumns([
  'title',
  'owner' => 'owner_aliasdemo',
  'kittens',
]);

/**
 * Add kittens as relation
 * 
 * Relations are handy for 1:n relations, eg Page Reference Fields with multiple
 * pages selected. In RockFinder1 you had to create cached values for this
 * situations (eg populationg a hidden field with a JSON string holding those
 * data entries).
 */
$kittens = new RockFinder2();
$kittens->find('template=kitten');
$kittens->addColumns(['title']);
$rf->addRelation('kittens', $kittens, 'kittens');

/**
 * Join owners of the cats
 * 
 * Joins are great for single page reference fields (1:1 relations). Data is
 * simply joined into the base table and directly available for further actions
 * (processing or display in a RockTabulator).
 */
$owners = new RockFinder2();
$owners->find('template=person');
$owners->addColumns(['title', 'age']);
$rf->addJoin($owners, 'owner');

// return finder
return $rf;