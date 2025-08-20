<?php
require_once __DIR__ . '/config.php';
function db(){
  static $pdo=null; global $DB_HOST,$DB_NAME,$DB_USER,$DB_PASS,$DB_PORT;
  if($pdo) return $pdo;
  $dsn="mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME;charset=utf8mb4";
  $opts=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES=>false];
  $pdo=new PDO($dsn,$DB_USER,$DB_PASS,$opts);
  return $pdo;
}
