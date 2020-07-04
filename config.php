<?php

require 'environment.php';
$config = [];
//const BASE_URL = "http://localhost/estrutura_mvc/";
if(ENVIRONMENT == 'development'){
    define("BASE_URL","http://localhost/classificados_mvc/");
    $config['dbname'] = 'classificados';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE_URL","http://meusite.com.br/");
    $config['dbname'] = '';
    $config['host'] = '';
    $config['dbuser'] = '';
    $config['dbpass'] = '';
}

global $db;
try{
    $db = new PDO("mysql:host=".$config['host'].";dbname=".$config['dbname'],
    $config['dbuser'],$config['dbpass']);
} catch(PDOException $e){
    echo "ERRO: ".$e->getMessage();
    exit;
}

?>