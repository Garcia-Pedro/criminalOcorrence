<?php

require_once('../interfaces/IAccountRepository.php');

class AccountRepository implements IAccountRespository
{
    private $sql;

    public function create(User $user)
    {
        $this->sql = new Sql;
        $this->sql->query("INSERT INTO usuarios (
            nome_usuario, 
            email_usuario, 
            senha_usuario, 
            setor_usuario,
            imagem_usuario
            ) 
            VALUES (
                :nome, 
                :email, 
                :senha, 
                :setor,
                :imagem
            )"
        );
        $this->sql->bind(":nome", $user->getName());
        $this->sql->bind(":email", $user->getEmail());
        $this->sql->bind(":senha", $user->getPassword());
        $this->sql->bind(":setor", $user->getSetor());
        $this->sql->bind(":imagem", $user->getImage());
        return $this->sql->execute();
    }
    public function update(User $user, $id)
    {
        $this->sql = new Sql;
        $this->sql->query("UPDATE `usuarios` SET
            `nome_usuario`= :nome,
            `email_usuario`= :email,
            `senha_usuario` = :senha,
            `setor_usuario`= :setor

            WHERE id_usuario = :id
        ");
        $this->sql->bind(":id", $id);
        $this->sql->bind(":nome", $user->getName());
        $this->sql->bind(":email", $user->getEmail());
        $this->sql->bind(":senha", $user->getPassword());
        $this->sql->bind(":setor", $user->getSetor());
        return $this->sql->execute();
    }
    public function get(User $user)
    {
        $this->sql = new Sql;
        $this->sql->query("SELECT * FROM usuarios");
        return $this->sql->getResults();
    }
    public function delete($id)
    {   
        $this->sql = new Sql;
        $this->sql->query("DELETE FROM usuarios WHERE id_usuario = :id");
        $this->sql->bind(":id", $id);
        $this->sql->execute();
    }
    public function findByEmail(User $user)
    {
        $this->sql = new Sql;
        $this->sql->query("SELECT  * FROM usuarios WHERE email_usuario = :email_usuario");
        $this->sql->bind(":email_usuario", $user->getEmail());
        return $this->sql->getResults();
    }
    public function findById($id)
    {
        $this->sql = new Sql;
        $this->sql->query("SELECT  * FROM usuarios WHERE id_usuario = :id");
        $this->sql->bind(":id", $id);
        return $this->sql->getResults();
    }
}
