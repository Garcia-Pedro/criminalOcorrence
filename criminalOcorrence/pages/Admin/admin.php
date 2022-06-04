<?php
    session_start();

    $setor1 = 'Piquete';
    $setor2 = 'Sala de Operações';

    if(isset($_SESSION['usuario_administrador'])){
        echo "Bem vindo ". $_SESSION['usuario_administrador'] . " ADMINISTRADOR";

        $_SESSION['piquete'] = $setor1;
        $_SESSION['sala_operacoes'] = $setor2;
        $_SESSION['usuario_normal'] = $_SESSION['usuario_administrador'];
    }
    else{
        echo "<script>Alert('Faça Login por favor')</script>";
        header("Location: index.php");
    }
?>

<body>
    <a href="../Piquete/piquete.php">Piquete</a>
    <a href="../Sala_Operacoes/operacoes.php">Sala de Operações</a>
    <a href="../../php/logout.php">Sair</a>
</body>