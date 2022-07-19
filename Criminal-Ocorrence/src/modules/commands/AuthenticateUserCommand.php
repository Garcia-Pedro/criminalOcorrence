<?php
require_once('CreateUserCommand.php');
require_once('../controllers/AuthenticateUserController.php');

class AuthenticateUserCommand
{
    public $email;
    public $password;

    public function SingIn()
    {
        session_start();
        ob_start();

        $datas = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if (isset($_POST['sign-in'])) {
            $AuthenticateUserController = new AuthenticateUserController;

            $this->email =  $datas['user_email'];
            $this->password =  $datas['user_password'];

            if (
                $AuthenticateUserController->emptyInput(
                [
                    $datas['user_email'],
                    $datas['user_password']
                ]
            ))
            {
                echo $AuthenticateUserController->emptyInput("");
            }
            else{
                $validateEmail = new Email;

                if(!$validateEmail->isValid($datas['user_email']))
                {   
                    $_SESSION['message'] = "<p style ='background: red; padding: 2rem;'>Este email ".$datas['user_email'] . " possui um dado inválido</p>";   
                } 
                else{
                    //Instances
                    $user = new User;
                    $hash = new Hash;
                    $AccountRepository =  new AccountRepository;

                    $user->setEmail($datas['user_email']);
                   
                    $user->setPassword($datas['user_password']);
                    $results = $AccountRepository->findByEmail($user);
                    
                    if ($results AND count($results) != 0)
                    {
                        foreach ($results as $result) {
                            if($user->getPassword() === $result['senha_usuario'])
                            {
                                if ($result['adm'] == 1)
                                {
                                    $_SESSION['nome_usuario'] = $result['nome_usuario'];
                                    $_SESSION['admin_user'] = $result['nome_usuario'];
                                    header("Location: admin.php") ;
                                }
                                else{
                                    if($result['setor_usuario'] == "Piquete")
                                    {
                                        $_SESSION['piquete'] = $result['setor_usuario'];
                                        $_SESSION['nome_usuario'] = $result['nome_usuario'];
                                        header("Location: piquete.php");
                                    }
                                    else if($result['setor_usuario'] == "Sala De Operações")
                                    {
                                        $_SESSION['salaOperacoes'] = $result['setor_usuario'];
                                        $_SESSION['nome_usuario'] = $result['nome_usuario'];
                                        header("Location: sala_operacoes.php");
                                    }
                                }
                            }
                            else{
                                $_SESSION['message'] = "<p style ='background: red; padding: 2rem;'>Usuário ou Senha inválida!</p>";
                            }
                        }
                        
                    }
                    else
                    {
                        $_SESSION['message'] = "<p style ='background: red; padding: 2rem;'>Usuário ou Senha inválida!</p>";
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