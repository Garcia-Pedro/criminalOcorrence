<?php

require_once('../../config/Sql.php');
require_once('../entities/Ocorrence.php');

interface IOcorenceRepository
{
    public function create(Ocorrence $ocorrence);
    public function get(Ocorrence $ocorrence);
    public function update(Ocorrence $ocorrence, $id);
    public function delete($id);
}

