<?php

require_once('../repositories/AccountRespository.php');
require_once('../entities/User.php');
$AccountRepository = new AccountRepository;
$user = new User;
$results  = $AccountRepository->get($user);

foreach ($results as $result) {

    if ($result['adm'] == 1) {
        $state = "Admin";
    }  
    else
    {
        $state = "User";
    }
?>

<div style = "display: flex;">
    <img style="width: 40px; height: 40px; border-radius: 50px;" src="../../resources/users-images/<?= $result['imagem_usuario']?>" alt="Imagem do usuario: <?= $result['nome_usuario']?>">
    <div>
        <span style="text-transform: capitalize; font-weight: bold;"><?= $result['nome_usuario']?></span><br>
        <span><?= $state ?></span>
        <button><a href="../commands/DeleteUserCommand.php?id=<?= $result['id_usuario']?>">Deletar Usuario</a></button>
        <button><a href="update-account.php?id=<?= $result['id_usuario']?>">Atualizar dados</a></button>
    </div>
</div><br>

<?php

}