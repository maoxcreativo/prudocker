<?php
require_once __DIR__ . '/db.php';
try {
  $pdo = db();
  $pdo->query('SELECT 1');
  json_ok(['service'=>'wuki','php'=>PHP_VERSION,'db'=>true]);
} catch(Throwable $e){
  json_error($e->getMessage(),500);
}
