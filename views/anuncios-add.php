<div class="container">
    <h1>Meus Anúncios - Adicionar Anúncio</h1>

    <form method="POST" enctype="multpart/form-data">
    <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php
                $c = new Categorias();
                $cats = $c->getLista();
                foreach ($cats as $cat):
                ?>
                    <option value="<?php echo $cat['id'] ?>">
                    <?php echo $cat['nome'];?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control" name="estado" id="estado">
                <option value="0">Ruim</option>
                <option value="1">Bom</option>
                <option value="2">Ótimo</option>
            </select>
        </div>
        <input type="submit" value="Adicionar" class="btn btn-info" />
    </form>
</div>
