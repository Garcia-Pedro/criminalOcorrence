<?php
    require_once('../commands/UpdateUserCommand.php');
    $UpdateUserCommand = new UpdateUSerCommand;
    $UpdateUserCommand->setDatas($_GET['id']);

?>

<h1>Atualizar Dados</h1>

<form method = "POST" action="" enctype="multipart/form-data">
    <input 
        required
        type="text" 
        name="user_name"
        placeholder="Nome" 
        value="<?= $UpdateUserCommand->name ?>"
    ><br>
    <input 
        type="email" 
        placeholder="Email" 
        name="user_email" 
        required
        value="<?= $UpdateUserCommand->email ?>"
    ><br>
    <input 
        required
        type="password" 
        placeholder="Senha" 
        name="user_password" 
        value="<?= $UpdateUserCommand->passwd ?>"
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
        value="<?= $UpdateUserCommand->setor ?>"
    ><br>
    <button type="submit" name="update-account">Cadastrar</button>
</form>

<a href="admin.php">Voltar</a>