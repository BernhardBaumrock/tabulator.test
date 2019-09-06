<?php namespace ProcessWire;
// Show pages with template names
// See https://processwire.com/talk/topic/19226-rockfinder-highly-efficient-and-flexible-sql-finder-module/page/4/?tab=comments#comment-190649

$rf = new RockFinder2();
$rf->find("name=cat-50|dog-50");
$rf->addColumns(['title', 'templates_id']);

$rf->query->leftjoin("(SELECT id,name FROM templates) AS templates ON templates.id = pages.templates_id");
$rf->query->select("templates.name AS template");
// optional: $rf->hideColumns(['templates_id']);

return $rf;