<?php
require_once(dirname(__FILE__) . '/includes/DB.php');
require_once(dirname(__FILE__) . '/includes/Migration.php');
require_once(dirname(__FILE__) . '/includes/MigrationManager.php');

const DB_HOST = 'localhost';
const DB_NAME = 'db';
const DB_USER = 'homestead';
const DB_PASSWORD = 'secret';
$dsn = 'mysql:host=' . DB::DB_HOST . ';dbname=' . DB::DB_NAME . ';charset=utf8';
$db = new PDO($dsn, DB::DB_USER, DB::DB_PASSWORD);
$command = new MigrationManager($db);
$command->path = dirname(__FILE__) . '/migrations';

$action = isset($argv[1]) ? ucfirst($argv[1]) : 'help';
$params = array_slice($argv, 2);

if (method_exists($command,$action)) {
    if ($exitCode = call_user_func_array(array($command, $action), $params)) {
        exit($exitCode);
    }
} else {
    $command->help();
    exit(1);
}