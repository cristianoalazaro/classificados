<?php
class produtoController extends controller{
    public function index(){

    }

    public function abrir($id){
        $dados = [];
        $a = new Anuncios();

        if(empty($id)){
            header('location:'.BASE_URL);
            exit;
        }
        $info = $a->getAnuncio($id);

        $dados['info'] = $info;

        $this->loadTemplate('produto',$dados);

    }
}


?>