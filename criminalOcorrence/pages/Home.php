<?php
require_once('../php/users.php');

session_start();

if(isset($_SESSION['usuario_normal'])){
    echo "Bem Vindo ". $_SESSION['usuario_normal'];
}
else{
    echo "<script>Alert('Faça Login por favor')</script>";
    header("Location: index.php");
}

$user = new Users;
$setor = $user->getUsers($_SESSION['usuario_normal']);

session_start();

if ($setor == "Piquete" && $link = "piquete") {

    $_SESSION['piquete'] = $setor;
    header('Location: Piquete/piquete.php');

}
else if ($setor ==  "Sala de Operações" && $link = "operacoes")
{
    $_SESSION['sala_operacoes'] = $setor;
    header('Location: Sala_Operacoes/operacoes.php');
}
?>

<body>
    <a href="../php/logout.php">Sair</a>
    <a href = <?= $link = "piquete" ?>>Piquete</a>
    <a href = <?= $link = "operacoes" ?>>Sala de Operações</a>
</body>

