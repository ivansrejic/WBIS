<?php

namespace app\models;

use app\core\DbModel;

class LoginModel extends DbModel
{
    //public string $name;
    public string $email;
    public string $password;

    public function tableName()
    {
        return "users";
    }

    public function rules(): array
    {
        return [
            //'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $result = $this->one("email = '$this->email'");
        if ($result != null)
        {
            return password_verify($this->password, $result["password"]);
        }
        return false;
    }

    public function attributes(): array
    {
        return [
            //'name',
            "email",
            "password"
        ];
    }
}