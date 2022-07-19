<?php

require_once('../../common/File.php');
require_once('../../middleware/security/Hash.php');
require_once('../repositories/AccountRespository.php');
require_once('../controllers/CreateUserController.php');

class CreateUserCommand
{
    public $name;
    public $email;
    public $setor;

    public $password;
    public function setDatas()
    {
        $datas = filter_input_array(INPUT_POST, FILTER_DEFAULT); 

        if(isset($_POST['create-account']))
        {
            session_start();

            $this->name = $datas['user_name'];
            $this->email = $datas['user_email'];
            $this->setor = $datas['user_setor'];

           $UserController = new CreateUserController;
           
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
                    $photo = $_FILES['photo'];  

                    //Instances
                    $file = new File($photo);
                    $user = new User;

                    $user->setEmail($datas['user_email']);
                    $user->setPassword($datas['user_password']);
                    $user->setName(ucwords($datas['user_name']));
                    $user->setSetor(ucwords($datas['user_setor']));
                    $user->setImage($file->Upload("../../resources/users-images/"));

                    $AccountRepository = new AccountRepository;

                    if ($AccountRepository->create($user)) {
                        $_SESSION['message'] = "<p style='background: green; padding: 2rem;'>Cadastro realizado com sucesso!</p>";
                    }
                    else
                    {
                        $_SESSION['message'] = "<p style='background: red; padding: 2rem;'>Falha no Cadastro: Já existe uma conta com este email!</p>";
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