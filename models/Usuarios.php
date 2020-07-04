<?php

class Usuarios extends model{

    public function cadastrar($nome, $email, $senha, $telefone){
        $sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(':email',$email);
        $sql->execute();

        if ($sql->rowCount() == 0){
            $sql = $this->db->prepare("INSERT INTO usuarios (nome, email, senha, telefone) 
            VALUES (:nome, :email, :senha, :telefone)");
            $sql->bindValue(':nome',$nome);
            $sql->bindValue(':email',$email);
            $sql->bindValue(':senha',md5($senha));
            $sql->bindValue(':telefone',$telefone);
            $sql->execute();  
            return true;  
        } else {
            return false;
        }        
    }

    public function login($email, $senha){
        $sql = $this->db->prepare("SELECT id, nome FROM usuarios WHERE email = :email AND 
        senha = :senha");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];
            $_SESSION['nome'] = $dado['nome'];
            return true;
        } else {
            return false;
        }
    }

}
?>