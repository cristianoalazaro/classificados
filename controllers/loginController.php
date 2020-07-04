<?php
class loginController extends controller{

    public function index(){
        $u = new Usuarios();
        $dados = [];
    
        if (filter_input(INPUT_POST,'email')){
            $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST,'senha');
                if($u->login($email, $senha)){  
                    header('location:'.BASE_URL);
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
        $this->loadTemplate('login',$dados);
    }

    public function sair(){
        unset($_SESSION['cLogin']);
        header('location:'.BASE_URL);
    }
}


?>