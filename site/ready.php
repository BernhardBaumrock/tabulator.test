<?php namespace ProcessWire;
/** @var Wire $this */

// add global RockTabulator translation string
$this->addHookAfter("InputfieldRockTabulator::getTranslations", function(HookEvent $event) {
  $langs = $event->return;
  $langs['foo'] = 'bar';
  $event->return = $langs;
});

$this->addHookProperty("Language::locale", function($event) {
  $event->return = 'xx-xx';
});
