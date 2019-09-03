<?php namespace ProcessWire;
$data = new RockTabulatorGrid();

$finder = new RockFinder("parent=/data, limit=52560", ['title', 'created', 'status']);
$data->setData($finder);

return $data;
