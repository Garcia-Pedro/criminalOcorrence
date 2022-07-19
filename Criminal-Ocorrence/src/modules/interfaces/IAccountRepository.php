<?php
require_once('../../config/Sql.php');
require_once('../entities/User.php');

interface IAccountRespository
{
    public function create(User $user);
    public function update(User $user, $id);
    public function get(User $user);
    public function delete($id);
    public function findByEmail(User $user);
    public function findById($id);
}