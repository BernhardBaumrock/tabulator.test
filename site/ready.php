<?php namespace ProcessWire;
/** @var Wire $this */

// add global RockTabulator translation string
$this->addHookAfter("InputfieldRockTabulator::getTranslations", function(HookEvent $event) {
  $langs = $event->return;
  $langs['foo'] = 'bar';
  $event->return = $langs;
});

$this->addHookAfter("RockFinder2::getCol", function($event) {
  $type = $event->arguments('type');
  switch($type) {

    // test custom
    case 'test':
      $event->return = function($data){
        bd($data, 'test');
      };
      return;
  }
});

// example how to add a directory to RockMarkup via hook
// $this->addHookAfter("RockMarkup::getDirs", function(HookEvent $event) {
//   $dirs = $event->return;
//   $dirs[] = '/site/modules/MyModule/RockMarkup/';
//   $event->return = $dirs;
// });

/**
 * Backup database on logout and ZIP it
 */
$this->addHookAfter("Session::logout", function(HookEvent $event) {
  $db = $this->database->backups(); /** @var WireDatabaseBackup $db */
  $path = $this->config->paths->assets."backups/database/";
  $sql = $path."tabulator.sql";
  $zip = $path."tabulator.zip";

  $this->files->unlink($sql);
  $this->files->unlink($zip);
  $file = $db->backup(['file' => $path]);
  $this->files->rename($file, $sql);
  $this->files->zip($zip, [$sql]);
  $this->files->unlink($sql);
});
