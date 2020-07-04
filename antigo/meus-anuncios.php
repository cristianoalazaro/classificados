<?php 
require 'pages/header.php'; 

if (empty($_SESSION['cLogin'])){
    header('location: login.php');
    exit;
}
?>

<div class="container">
    <h1>Meus Anúncios</h1>

    <a href="add-anuncio.php" class="btn btn-info">Adicionar Anúncio</a>

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
        require 'classes/anuncios.class.php';
        $a = new Anuncios();
        $anuncios = $a->getMeusAnuncios();
        foreach($anuncios as $anuncio): ?>
            <tr>
                <?php
                if(!empty($anuncio['url'])): ?>
                <td><img border="0" src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" /></td>
                <?php else: ?>
                <td><img src="assets/images/default.jpg" height="50" border="0" ?></td>
                <?php endif; ?>
                <td><?php echo $anuncio['titulo']; ?></td>
                <td><?php echo 'R$ '.number_format($anuncio['preco'],2,',','.'); ?></td>
                <td>
                    <a href="editar-anuncio.php?id=<?php echo $anuncio['id'];?>" class="btn btn-secondary">
                    EDITAR</a>
                    <a href="excluir-anuncio.php?id=<?php echo $anuncio['id'];?>" class="btn btn-danger">
                    EXCLUIR</a>
                </td>
                </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php require 'pages/footer.php'; ?>