<?php
    session_start();

    if(!isset($_SESSION['nome_usuario']))
    {
        header("Location: signIn.php");
        $_SESSION['message']  = "<p style ='background: red; padding: 2rem;'>Precisa fazer login!</p>";
    }
    else{
        if(!isset($_SESSION['admin_user']))
        {
            if(isset($_SESSION['piquete']))
            {
                header("Location: piquete.php");
            }
            else if(isset($_SESSION['salaOperacoes']))
            {
                header("Location: sala_operacoes.php");
            }
        }
    }
?>
<h1>ADMIN <?= ucwords($_SESSION['admin_user']) ?></h1>

<div>
    <?php include 'users.php' ?>
</div>
<a href="../commands/LogoutUserCommand.php">LogOut</a>
