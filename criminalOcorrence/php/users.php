<?php

require_once('conexao.php');
require_once 'Sql.php';

class Users{
    private $nome;
    private $email;
    private $senha;
    private $setor;

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($value)
    {
        $this->nome = $value;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($value)
    {
        $this->email = $value;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($value)
    {
        $this->senha = $value;
    }
    public function getSetor()
    {
        return $this->setor;
    }
    public function setSetor($value)
    {
        $this->setor = $value;
    }
    
    public function addUser()
    {
        $sql = new Sql();

        $sql->query("INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario, setor_usuario) VALUES (:nome, :email, :senha, :setor)");
        $sql->bind(":nome", $this->getNome());
        $sql->bind(":email", $this->getEmail());
        $sql->bind(":senha", $this->getSenha());
        $sql->bind(":setor", $this->getSetor());
        $sql->exec();
    }

    public function loginUsers($rotaLogin = 'pages/Home.php')
    {
        $sql = new Sql;

        $sql->query("SELECT  * FROM usuarios WHERE nome_usuario = :nome_usuario AND senha_usuario = :senha_usuario");
        $sql->bind(":nome_usuario", $this->getNome());
        $sql->bind(":senha_usuario", $this->getSenha());
        $results = $sql->getAllResults();
        $nums = count($results);
        
        if($nums == 1){
            //var_dump($results);
           foreach ($results as $result){
               $adm = $result["adm"];
               $nome = $result['nome_usuario'];

               session_start( );

               if ($adm == 1) {
                    $_SESSION['usuario_administrador'] = $nome;
                    echo"<script>Alert('login efectado!')</script>";
                    header('Location: pages/Admin/admin.php');
               }
               else{
                    $_SESSION['usuario_normal'] = $nome;
                    echo"<script>Alert('login efectado!')</script>";
                    header('Location: '.$this->rotaLogin($rotaLogin));
               }
           }
        }
        else{
            echo "nome ou senha inválida!";
        }
    }

    public function rotaLogin($rota)
    {
        return $rota;
    }
    public function getUsers($usuarioLogado)
    {
        $sql = new Sql;
        $sql->query("SELECT * FROM usuarios WHERE nome_usuario = :nome_usuario");
        $sql->bind(':nome_usuario', $usuarioLogado);
        $results = $sql->getAllResults();
        $nums = count($results);

        if($nums == 1){
            foreach ($results as $result){
                return $result['setor_usuario'];
            }
        }
    }
}