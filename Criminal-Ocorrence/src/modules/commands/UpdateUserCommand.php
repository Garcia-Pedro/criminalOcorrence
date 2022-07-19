<?php

require_once('CreateUserCommand.php');
require_once('../controllers/UpdateUserController.php');

class UpdateUserCommand
{
    public $name;
    public $email;
    public $setor;
    public $passwd;

    public $password;
    public function setDatas($id)
    {
        $user = new User;
        $AccountRepository = new AccountRepository;
        $datas = filter_input_array(INPUT_POST, FILTER_DEFAULT); 

        $results = $AccountRepository->findById($id);

        foreach ($results as $result) {
            $this->name  = $result['nome_usuario'];
            $this->email = $result['email_usuario'];
            $this->passwd = $result['senha_usuario']; 
            $this->setor = $result['setor_usuario']; 
        }

        if(isset($_POST['update-account']))
        {
            session_start();
           $UserController = new UpdateUserController;
           if(
            $UserController->emptyInput(
                [
                 $datas['user_name'],
                 $datas['user_setor'],
                 $datas['user_email'],
                 $datas['user_password'],
                 $datas['confirm_password']
                ]
             )
           )
           {
                echo $UserController->emptyInput("");
           }
           else{
               $validateEmail = new Email;
               $validateName = new Name;

               if ($validateName->isValid($datas['user_name']))
                {
                   $_SESSION['message'] = "<p style='background: red; padding: 2rem;'>O campo nome possui algum dado inválido!</p>";
                }
                else if(!$validateEmail->isValid($datas['user_email']))
                {   
                    $_SESSION['message'] =  "<p style='background: red; padding: 2rem;'>Este email ".$datas['user_email'] . " possui um dado inválido</p>";   
                }  
                else if($datas['user_password'] !== $datas['confirm_password'])
                {
                    $_SESSION['message'] = "<p style='background: red; padding: 2rem;'>As senhas digitadas são diferentes!</p>";
                }
                else{
                    $user->setEmail($datas['user_email']);
                    $user->setName(ucwords($datas['user_name']));
                    $user->setPassword($datas['user_password']);
                    $user->setSetor(ucwords($datas['user_setor']));

                    if ($AccountRepository->update($user, $id)) {
                        $_SESSION['message'] = "<p style='background: green; padding: 2rem;'>Dados atualizados com sucesso!</p>";
                    }
                    else
                    {
                        $_SESSION['message'] = "<p style='background: red; padding: 2rem;'>Falha no Cadastro: Flha ao atualizar dados!</p>";
                    }
                }
            }
        }
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }
}