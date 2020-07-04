<div class="container">
    <h1>Meus Anúncios - Editar Anúncio</h1>

    <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria" class="form-control">
            <?php
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
                            <img src="<?php echo BASE_URL;?>assets/images/anuncios/<?php echo 
                            $foto['url']; ?>" border="0"  class="img-thumbnail"><br/>
                            <a href="<?php echo BASE_URL;?>anuncios/excluirImagem/<?php 
                            echo $foto['id'];?>" 
                            class="btn btn-info" onclick="return confirm('Deseja realmente' + 
                            ' excluir?');">Excluir Imagem</a>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
    </div>
    <input type="submit" value="Salvar" class="btn btn-info" />
    </form>
</div>
