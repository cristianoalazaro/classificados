<?php 
require 'config.php'; 
?>

<html>
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="./" class="navbar-brand">Classificados</a>
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><?php echo $_SESSION['nome']; ?></a>
                    </li>
                    <li class="nav-item"><a href="meus-anuncios.php" class="nav-link">Meus Anúncios</a></li>
                    <li class="nav-item"><a href="sair.php" class="nav-link">Sair</a></li>
                <?php else : ?>                
                    <li class="nav-item"><a href="cadastre-se.php" class="nav-link">Cadastre-se</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>