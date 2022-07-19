<?php
require_once('../validators/Email.php');
require_once('../validators/Name.php');
require_once('../validators/Phone.php');

class AuthenticateUserController 
{
    public function emptyInput($datas = [], $state = false)
    {
        if ($state == false) {
            if (
                empty($datas[0]) || 
                empty($datas[1]) 
            ){
                return "
                    Preencha todos os campos por favor!
                ";
            }
            else
            {
                $state = true;
            }
        }
    }
}