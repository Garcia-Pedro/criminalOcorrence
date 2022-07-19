<?php
    require_once('../commands/AuthenticateUserCommand.php');
    $AuthenticateUserCommand = new AuthenticateUserCommand;
    $AuthenticateUserCommand->SingIn();
?>

<h1>Faça Login</h1>

<form action="" method="POST">
    <input type="email" placeholder="Email" value="<?= $AuthenticateUserCommand->email?>" name="user_email"required><br>
    <input type="password" placeholder="Senha" value="<?= $AuthenticateUserCommand->password?>" name="user_password" required><br>
    <button type="submit" name="sign-in">Sign In</button>
</form>
<a href="create-account.php">Não possui uma conta? Cadastre-se</a>