<?php namespace ProcessWire;
if(!defined("PROCESSWIRE")) die();

/*** SITE CONFIG *************************************************************************/

/** @var Config $config */

$config->debug = true;
$config->useFunctionsAPI = true;

/*** INSTALLER CONFIG ********************************************************************/

$config->dbHost = 'localhost';
$config->dbName = 'tabulator';
$config->dbUser = 'root';
$config->dbPass = '';
$config->dbPort = '3306';

$config->userAuthSalt = '8e1352af350d7de406f154a632f91c18'; 
$config->chmodDir = '0755'; // permission for directories created by ProcessWire
$config->chmodFile = '0644'; // permission for files created by ProcessWire 
$config->timezone = 'Europe/Vienna';
$config->defaultAdminTheme = 'AdminThemeUikit';
$config->installed = 1560844078;
$config->httpHosts = [$_SERVER['HTTP_HOST']];
