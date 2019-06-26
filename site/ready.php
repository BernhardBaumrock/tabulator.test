<?php namespace ProcessWire;
/** @var Wire $this */

// add global RockTabulator translation string
$this->addHookAfter("InputfieldRockTabulator::getTranslations", function(HookEvent $event) {
  $langs = $event->return;
  $langs['foo'] = 'bar';
  $event->return = $langs;
});

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
