<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

require_once('functions/route.php');

// Acessar arquivos de imagens, js e css
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|txt|php)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}
 
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
 
rota($url);
 

