<?php
    require_once('../commands/CreateUserCommand.php');
    $create = new CreateUserCommand;
    $create->setDatas();

?>

<h1>Cadastre-se</h1>

<form method = "POST" action="" enctype="multipart/form-data">
    <input 
        required
        type="text" 
        name="user_name"
        placeholder="Nome" 
        value="<?= $create->name ?>"
    ><br>
    <input 
        type="email" 
        placeholder="Email" 
        name="user_email" 
        required
        value="<?= $create->email ?>"
    ><br>
    <input 
        required
        type="password" 
        placeholder="Senha" 
        name="user_password" 
    ><br>
    <input 
        required
        type="password" 
        name="confirm_password" 
        placeholder="Confirmar Senha" 
    ><br>
    <input 
        required
        type="text" 
        name="user_setor" 
        placeholder="Setor" 
        value="<?= $create->setor ?>"
    ><br>
    <input 
        type="file" 
        name="photo"
    ><br>
    <button type="submit" name="create-account">Cadastrar</button>
</form>

<a href="signIn.php">Fazer Login</a>