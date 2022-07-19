<?php

class LogoutUserCommand
{
    public function __construct()
    {
        session_start();
        
        unset($_SESSION['admin_user']);
        unset($_SESSION['nome_usuario']);
        header("Location: ../views/signIn.php");
    }
}

$LogoutUserCommand = new LogoutUserCommand;