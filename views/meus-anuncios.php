<div class="container">
    <h1>Meus Anúncios</h1>

    <a href="<?php echo BASE_URL;?>anuncios/add" class="btn btn-info">Adicionar Anúncio</a>

    <table class="table table-striped">
        <thead>
            <tr>
            <th>Foto</th>
            <th>titulo</th>
            <th>Valor</th>
            <th>Ações</th>
            </tr>
        </thead>
        <?php
        $a = new Anuncios();
        $anuncios = $a->getMeusAnuncios();
        foreach($anuncios as $anuncio): ?>
            <tr>
                <?php
                if(!empty($anuncio['url'])): ?>
                <td><img border="0" src="<?php echo BASE_URL;?>assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" /></td>
                <?php else: ?>
                <td><img src="<?php echo BASE_URL;?>assets/images/default.jpg" height="50" border="0" ?></td>
                <?php endif; ?>
                <td><?php echo $anuncio['titulo']; ?></td>
                <td><?php echo 'R$ '.number_format($anuncio['preco'],2,',','.'); ?></td>
                <td>
                    <a href="<?php echo BASE_URL;?>anuncios/editar/<?php echo $anuncio['id'];?>" class="btn btn-secondary">
                    EDITAR</a>
                    <a href="<?php echo BASE_URL;?>anuncios/excluirAnuncio/<?php echo $anuncio['id'];?>" 
                    onclick="return confirm('Deseja realmente excluir?');" class="btn btn-danger">
                    EXCLUIR</a>
                </td>
                </tr>
        <?php endforeach; ?>
    </table>
</div>
