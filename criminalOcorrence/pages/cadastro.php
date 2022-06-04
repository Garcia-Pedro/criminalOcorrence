<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <form action="cadastro.php" method="POST">
        <input type="text" name="nome_usuario" placeholder="nome" /><br>
        <input type="email" name="email_usuario" placeholder="email" /><br>
        <input type="password" name="senha_usuario" placeholder="senha" /><br>
        <input type="text" name="setor_usuario" placeholder="setor" /><br>
        <input type="submit" name="cadastrar" value="cadastrar"/><br>
    </form>
</body>
</html>

<?php
require_once '../php/users.php';

if (isset($_POST['cadastrar'])) {

    $nome = $_POST['nome_usuario'];
    $email = $_POST['email_usuario'];
    $senha = $_POST['senha_usuario'];
    $setor = $_POST['setor_usuario'];

    $user = new Users();
    $user->setNome($nome);
    $user->setEmail($email);
    $user->setSenha($senha);
    $user->setSetor($setor);
    $user->addUser();
    $user->loginUsers('Home.php');
}