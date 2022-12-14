<?php

namespace app\models;

use app\core\DbModel;

class RoleModel extends DbModel
{
    public $id;
    public $name;
    public $active;

    public function tableName()
    {
        return "roles";
    }

    public function attributes(): array
    {
        return [
            "name",
            "active"
        ];
    }
}