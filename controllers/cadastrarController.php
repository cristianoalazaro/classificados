<?php
class cadastrarController extends controller{
    public function index(){
        $u = new Usuarios();
        $dados = [];

        if (filter_input(INPUT_POST,'nome')){
            $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST,'senha');
            $telefone = filter_input(INPUT_POST,'telefone');            
            
            if ($nome && $email && $senha){
                if($u->cadastrar($nome, $email, $senha, $telefone)){
                    ?>
                    <div class="alert alert-success">
                        <strong>Parabéns!</strong> Cadastrado com sucesso. <a href="login.php" 
                        class="alert-link">Faça o login agora</a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-warning">
                        Este usuário já existe! <a href="login.php" class="alert-link">
                        Faça o login agora</a>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="alert alert-warning">
                    Preencha todos os campos
                </div>
                <?php
            }
    
        }
        $this->loadTemplate('cadastrar',$dados);
  
    }

    public function cadastrar(){
  }
}


?>