<?php
require_once('../validators/Email.php');
require_once('../validators/Name.php');
require_once('../validators/Phone.php');
class UpdateUserController 
{
    public function emptyInput($datas = [], $state = false)
    {
        if ($state == false) {
            if (
                empty($datas[0]) || 
                empty($datas[1]) ||
                empty($datas[2]) ||
                empty($datas[3]) ||
                empty($datas[4])
 
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