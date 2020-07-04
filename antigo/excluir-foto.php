<?php

require 'config.php';

if(empty($_SESSION['cLogin'])){
    header('location: login.php');
    exit;
}

require 'classes/anuncios.class.php';
$a = new Anuncios();

$id = filter_input(INPUT_GET,'id');

if($id){
    $id_anuncio = $a->excluirFoto($id);
}

if (isset($id_anuncio)){
    header('location:editar-anuncio.php?id='.$id_anuncio);
} else {
    header('location:meus-anuncios.php');
}


?>