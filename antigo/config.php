<?php

session_start();

global $pdo;
try{
    $pdo = new PDO("mysql:host=localhost;dbname=classificados","root","");
    return $pdo;
} catch(PDOException $e){
    echo 'FALHOU: '.$e->getMessage();
    exit;
}

?>