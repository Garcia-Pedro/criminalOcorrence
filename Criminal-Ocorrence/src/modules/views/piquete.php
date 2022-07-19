<?php
    session_start();

    if(!isset($_SESSION['nome_usuario']))
    {
        header("Location: signIn.php");
        $_SESSION['message']  = "<p style ='background: red; padding: 2rem;'>Precisa fazer login!</p>";
    }
    else{
        if(isset($_SESSION['salaOperacoes']))
        {
            header("Location: sala_operacoes.php");
        }
    }
?>

<h1>Piquete <?= ucwords($_SESSION['nome_usuario'])?></h1>

<a href="../commands/LogoutUserCommand.php">LogOut</a>