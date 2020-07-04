<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo 
    BASE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo 
    BASE_URL; ?>/assets/css/bootstrap.min.css">
    <title>Meu Site</title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="<?php echo BASE_URL;?>" class="navbar-brand">Classificados</a>
                <ul class="navbar-nav ml-auto">
                    <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><?php echo $_SESSION['nome']; ?></a>
                        </li>
                        <li class="nav-item"><a href="<?php echo BASE_URL;?>anuncios" class="nav-link">Meus Anúncios</a></li>
                        <li class="nav-item"><a href="<?php echo BASE_URL;?>login/sair" class="nav-link">Sair</a></li>
                    <?php else : ?>                
                        <li class="nav-item"><a href="<?php echo BASE_URL;?>cadastrar" class="nav-link">Cadastre-se</a></li>
                        <li class="nav-item"><a href="<?php echo BASE_URL;?>login" class="nav-link">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        <script type="text/javascript" src="<?php echo 
        BASE_URL; ?>/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo 
        BASE_URL; ?>/assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo 
        BASE_URL; ?>/assets/js/script.js"></script>

</body>
</html>