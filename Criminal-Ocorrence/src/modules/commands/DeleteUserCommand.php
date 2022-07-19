<?php

require_once('CreateuserCommand.php');

class DeleteUserCommand
{
    public function __construct()
    {
        $AccountRepository = new AccountRepository;
        if ($AccountRepository->delete($_GET['id'])) {    
            $_SESSION['message'] = "<p style='background: green; padding: 2rem;'>Usuário removido sucesso!</p>";
        }
        else
        {
            $_SESSION['message'] = "<p style='background: red; padding: 2rem;'>Falha ao deletar usuário!</p>";
        }

        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['messages']);
        }
    }
}

$DeleteUserCommand = new DeleteUserCommand;