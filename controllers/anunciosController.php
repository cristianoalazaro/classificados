<?php
class anunciosController extends controller{
    public function validar(){
        if (empty($_SESSION['cLogin'])){
            header('location: '.BASE_URL.'login');
            exit;
        }
    }

    public function index(){
        $dados = [];
        $this->validar();
        $this->loadTemplate('meus-anuncios',$dados);
    }

    public function add(){
        $dados = [];
        $this->validar();
        $a = new Anuncios();
        $titulo = filter_input(INPUT_POST,'titulo',FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_POST,'categoria');
        $valor = filter_input(INPUT_POST,'valor',FILTER_VALIDATE_FLOAT);
        $descricao = filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING);
        $estado = filter_input(INPUT_POST,'estado');

        if($titulo && $categoria){
            $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
            
            ?>
            <div class="alert alert-success">
                Produto Adicionado com sucesso!
            </div>
            <?php
        }
        $this->loadTemplate('anuncios-add',$dados);
    }

    public function editar($id){
        $dados = [];
        $this->validar();
        $a = new Anuncios();
        $titulo = filter_input(INPUT_POST,'titulo',FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_POST,'categoria');
        $valor = filter_input(INPUT_POST,'valor',FILTER_VALIDATE_FLOAT);
        $descricao = filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING);
        $estado = filter_input(INPUT_POST,'estado');
        if (isset($_FILES['fotos'])){
            $fotos = $_FILES['fotos'];
        } else {
            $fotos = [];
        }
        
        if ($id){
            $info = $a->getAnuncio($id);
        } else {
            ?>
            <script type="text/javascript">window.location.href="<?php echo BASE_URL;?>anuncios";</script>
            <?php
        }
        
        $dados['id'] = $id;
        $dados['info'] = $info;
        $dados['fotos'] = $fotos;

        if($titulo && $categoria){
            $a->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id);
            ?>
            <div class="alert alert-success">
                Produto editado com sucesso!
            </div>
            <?php
            header('Refresh:0');
            //header('location:'.BASE_URL.'anuncios-editar/'.$id);
            //$this->loadTemplate('anuncios-editar',$dados);
            exit;
        }
        $this->loadTemplate('anuncios-editar',$dados);
        
    }

    public function excluirImagem($id){
        $dados['id'] = $id;
        $this->validar();
        $a = new Anuncios();
        $id_anuncio = $a->getAnuncioImagem($id);
        if($a->excluirFoto($id)){
            header('location:'.BASE_URL.'anuncios/editar/'.$id_anuncio);  
            exit;          
        }
    }

    public function excluirAnuncio($id){
        $dados = [];
        $this->validar();
        $a = new Anuncios();
        $a->excluirAnuncio($id);
        header('location:'.BASE_URL.'anuncios');
        exit;
    }

}


?>