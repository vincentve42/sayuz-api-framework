<?php

namespace Sayuz\SayuzFramework\model;

use Sayuz\SayuzFramework\class\Model;

class User extends Model{
    protected string $table = "user";

    public string $username ="";

    protected string $password ="";

    public function setPassword($pswd)
    {
        $this->password = $pswd;
    }
}