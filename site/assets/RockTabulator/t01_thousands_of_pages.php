<?php namespace ProcessWire;
$data = new RockTabulatorData();

$finder = new RockFinder("parent=/data, limit=52560", ['title', 'created', 'status']);
$data->setData($finder);

return $data;
