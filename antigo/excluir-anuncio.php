<?php
require 'config.php';

if (empty($_SESSION['cLogin'])){
    header('location:login.php');
    exit;
}

require 'classes/anuncios.class.php';

$id = filter_input(INPUT_GET,'id');

if ($id){
    $a = new Anuncios();
    $a->excluirAnuncio($id);
}
header('location: meus-anuncios.php');

?>