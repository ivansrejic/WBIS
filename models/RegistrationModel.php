<?php
namespace app\models;
use app\core\DbModel;

class RegistrationModel extends DbModel
{

    public string $name;
    public string $email;
    public string $password;

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
            ];
    }

    public function registration()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->create();

        $user = new UserModel();
        $role = new RoleModel();
        $userRoles = new UserRolesModel();

        $user->mapData($user->one("email = '$this->email'")); // objekat iz baze where email == this.email
        $role->mapData($role->one("name = 'Seller'"));
        $userRoles->id_user = $user->id;
        $userRoles->id_role = $role->id;

        $userRoles->create();

        print_r($_SESSION);




//        $this->db->con()->query("Insert INTO user_roles (id_role,id_user) VALUES ($userData["id"],3),");

    }

    public function tableName()
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            "name",
            "email",
            "password"
        ];
    }
}