<?php

namespace Models;

class User extends Model
{
    protected $table = 'users';

    public function findByEmail(string $email = null)
    {
        $sql = "SELECT * FROM {$this->table} where email like :email";

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['email' => '%' . $email . '%']);

        return $statement->fetchAll();
    }
}
