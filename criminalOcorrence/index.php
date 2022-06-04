<h1>Login</h1>

<form method="POST" action="index.php">
    <input type="text"name="nome_usuario" placeholder="nome"><br><br>
    <input type="password"name="senha_usuario" placeholder="senha"><br><br>
    <a href="pages/cadastro.php">Não possui uma conta? Cadastre-se</a><br>
    <input type="submit" name =" login" value="Login">
</form>

<?php

require_once 'php/users.php';

if (isset($_POST['login'])) {
    $nome = $_POST['nome_usuario'];
    $senha = $_POST['senha_usuario'];

    if (!empty($nome) || !empty($senha)) {
        $users = new Users;
        $users->setNome($nome);
        $users->setSenha($senha);
        $users->loginUsers();
    }
    else{
        echo "Preencha todos os campos";
    }
}

