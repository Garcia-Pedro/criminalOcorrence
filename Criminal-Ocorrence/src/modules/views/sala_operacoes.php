<?php
    ob_start();
    session_start();

    if(!isset($_SESSION['nome_usuario']))
    {
        header("Location: signIn.php");
        $_SESSION['message']  = "<p style ='background: red; padding: 2rem;'>Precisa fazer login!</p>";
    }   
?>

<h1>Sala de Operações <?= ucwords($_SESSION['nome_usuario'])?></h1>

<a href="../commands/LogoutUserCommand.php">LogOut</a>