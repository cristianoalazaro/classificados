<?php 
require 'pages/header.php'; 
?>

<div class="container">
    <h1>Login</h1>
    <?php
    require 'classes/usuarios.class.php';
    $u = new Usuarios();



        if (filter_input(INPUT_POST,'email')){
            $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST,'senha');
                if($u->login($email, $senha)){  
                    header('location: ./');
                    ?>
                    <!-- <script type="text/javascript">window.location.href="./"</script> -->
                    <?php
                }  else {
                    ?>
                    <div class="alert alert-danger">
                        Usuário e/ou senha errados.
                    </div>
                    <?php
                }
        }
 
    
    ?>

    <form method="POST">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="nome">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" />
        </div>
        <input type="submit" value="Fazer login" class="btn btn-info" />
    </form>
</div>

<?php require 'pages/footer.php'; ?>