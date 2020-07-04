<?php 
require 'pages/header.php'; 

if (empty($_SESSION['cLogin'])){
    header('location: login.php');
    exit;
}

require 'classes/anuncios.class.php';
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

$id = filter_input(INPUT_GET,'id');

if ($id){
    $info = $a->getAnuncio($_GET['id']);
} else {
    ?>
    <script type="text/javascript">window.location.href="meus-anuncios.php";</script>
    <?php
}

if($titulo && $categoria){
    $a->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id);
    ?>
    <div class="alert alert-success">
        Produto editado com sucesso!
    </div>
    <?php
    header('location:editar-anuncio.php?id='.$id);
}
?>

<div class="container">
    <h1>Meus Anúncios - Editar Anúncio</h1>

    <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria" class="form-control">
            <?php
            require 'classes/categorias.class.php';
            $c = new Categorias();
            $cats = $c->getLista();
            foreach ($cats as $cat):
                ?>
                <option value="<?php echo $cat['id'] ?>" <?php echo ($info['id_categoria'] == 
                $cat['id'])?'selected="selected"':''?>>
                <?php echo $cat['nome'];?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" class="form-control" 
        value="<?php echo $info['titulo']; ?>">
    </div>
    <div class="form-group">
        <label for="valor">Valor:</label>
        <input type="text" name="valor" id="valor" class="form-control" 
        value="<?php echo $info['preco']; ?>">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" class="form-control">
            <?php echo $info['descricao']; ?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="estado">Estado:</label>
        <select class="form-control" name="estado" id="estado">
            <option value="0" <?php echo ($info['estado']=='0')?'
            selected="selected"':'';?>>Ruim</option>
            <option value="1" <?php echo ($info['estado']=='1')?'
            selected="selected"':''?>>Bom</option>
            <option value="2" <?php echo ($info['estado']=='2')?'
            selected="selected"':''?>>Ótimo</option>
        </select>
    </div>
    <div class="form-group">
        <label for="add_foto">Fotos do Anúncio:</label>
        <input type="file" name="fotos[]" multiple /><br/><br/>
        <div class="card panel-default">
                <div class="card-header">Fotos do Anúncio</div>
                <div class="card-body">
                    <?php foreach($info['fotos'] as $foto): ?>
                        <div class="foto-item">
                            <img src="assets/images/anuncios/<?php echo 
                            $foto['url']; ?>" border="0"  class="img-thumbnail"><br/>
                            <a href="excluir-foto.php?id=<?php echo $foto['id'];?>" 
                            class="btn btn-info">Excluir Imagem</a>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
    </div>
    <input type="submit" value="Salvar" class="btn btn-info" />
    </form>
</div>

<?php require 'pages/footer.php'; ?>