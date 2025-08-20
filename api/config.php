<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { exit; }
header('Content-Type: application/json; charset=utf-8');

function envget($k,$d){$v=getenv($k);return ($v!==false&&$v!=='')?$v:$d;}
$DB_HOST=envget('DB_HOST','127.0.0.1');
$DB_NAME=envget('DB_NAME','wuki');
$DB_USER=envget('DB_USER','root');
$DB_PASS=envget('DB_PASS','');
$DB_PORT=envget('DB_PORT','3306');

function json_ok($data=[]){echo json_encode(array_merge(['ok'=>true],$data),JSON_UNESCAPED_UNICODE);exit;}
function json_error($msg,$code=400){http_response_code($code);echo json_encode(['ok'=>false,'error'=>$msg],JSON_UNESCAPED_UNICODE);exit;}
