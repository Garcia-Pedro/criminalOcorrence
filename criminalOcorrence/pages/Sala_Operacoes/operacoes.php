<?php
require_once('../../php/users.php');

session_start();

if($_SESSION['sala_operacoes'] || $_SESSION['usuario_administrador']){
    echo "SEJA BEM VINDO A ".$_SESSION['sala_operacoes']." ". $_SESSION['usuario_normal'];
}
else if($_SESSION['piquete']){
    echo "<script>Alert('Faça Login por favor')</script>";
    header("Location: ../Piquete/piquete.php");
}

?>

<a href="../Piquete/piquete.php">Piquete</a>
<a href="../Sala_Operacoes/operacoes.php">Sala de Operações</a>
<a href="../../php/logout.php">Sair</a>