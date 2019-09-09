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
  $path = $this->config->paths->assets."backups/database/";
  $config = $this->wire->config;
  $sql = $path."tabulator.sql";
  $zip = $path."tabulator.zip";

  $this->files->unlink($sql);
  $this->files->unlink($zip);

  // create dump
  error_reporting(E_ALL);
  require_once $this->wire->config->paths->assets . 'mysqldump/vendor/autoload.php';
  $fecha = date('Ymd');
  $dumpSettings = array(
      'compress' => \Ifsnop\Mysqldump\Mysqldump::NONE,
      'no-data' => false,
      'add-drop-table' => true,
      'single-transaction' => true,
      'lock-tables' => true,
      'add-locks' => true,
      'extended-insert' => true,
      'disable-foreign-keys-check' => true,
      'skip-triggers' => false,
      'add-drop-trigger' => true,
      'databases' => true,
      'add-drop-database' => true,
      'hex-blob' => true
  );
  $dump = new \Ifsnop\Mysqldump\Mysqldump(
      "mysql:host=".$config->dbHost.";dbname=".$config->dbName,
      $config->dbUser,
      $config->dbPass,
      $dumpSettings
  );
  $dump->start($sql);

  // zip sql file
  $this->files->zip($zip, [$sql]);
  $this->files->unlink($sql);
});
