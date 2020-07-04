<?php
class homeController extends controller{
    public function index(){
        $dados = [];

        $a = new Anuncios();
        $c = new Categorias();



        $filtros = [
            'categoria' => '',
            'preco' => '',
            'estado' => ''
        ];

        if (isset($_GET['filtros'])){
            $filtros = $_GET['filtros'];
        }

        $total_anuncios = $a->getTotalAnuncios($filtros);
        $total_usuarios = $a->getTotalUsuarios(); 

        $p = 1;
        if (filter_input(INPUT_GET,'p')){
            $p = $_GET['p'];
        }

        $porPagina = 4;

        $total_paginas =  ceil($total_anuncios / $porPagina);

        $anuncios = $a->getUltimosAnuncios($p,$porPagina, $filtros);
        $categorias = $c->getLista();

        $dados['total_anuncios'] = $total_anuncios;
        $dados['total_usuarios'] = $total_usuarios;
        $dados['categorias'] = $categorias;
        $dados['filtros'] = $filtros;
        $dados['anuncios'] = $anuncios;
        $dados['total_paginas'] = $total_paginas;

        $this->loadTemplate('home', $dados);
    }
}
?>