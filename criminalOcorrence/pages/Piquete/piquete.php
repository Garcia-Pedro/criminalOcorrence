<?php

session_start();

if ($_SESSION['piquete'] || $_SESSION['usuario_administrador']) {
    echo "SEJA BENVINDO AO ".$_SESSION['piquete']." ".$_SESSION['usuario_normal'];
}
else if($_SESSION['sala_operacoes']){
    header("Location: ../Sala_Operacoes/operacoes.php");
}
else{
    echo '<script type="text/javascript">Alert("Faça Login por favor")</script>';
}
?>

<a href="../Piquete/piquete.php">Piquete</a>
<a href="../Sala_Operacoes/operacoes.php">Sala de Operações</a>
<a href="../../php/logout.php">Sair</a>


