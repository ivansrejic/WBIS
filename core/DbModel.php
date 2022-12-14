<?php

namespace app\core;

abstract class DbModel extends Model
{
    public DBConnection $db;

    public function __construct()
    {
        $this->db = new DbConnection();
    }

    abstract public function tableName();

    abstract public function attributes(): array;

    public function create()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $values = array_map(fn($attr) => ":$attr", $attributes);
        $sqlString = "INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUES (" . implode(',', $values) . ")";

        foreach ($attributes as $attribute) {
            $sqlString = str_replace(":$attribute", is_numeric($this->{$attribute}) ? $this->{$attribute} : '"' . $this->{$attribute} . '"', $sqlString);
        }

        $this->db->con()->query($sqlString);
    }

    public function all()
    {
        $tableName = $this->tableName();

        $sqlString = "SELECT * FROM $tableName;";
        $dataResult= $this->db->con()->query($sqlString);

        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return $resultArray;
    }

    public function one($where)
    {
        $tableName = $this->tableName();
        $sqlString = "SELECT * FROM $tableName WHERE $where limit 1;";
        $dbResult = $this->db->con()->query($sqlString);

        return $dbResult->fetch_assoc();
    }

    public function delete($where)
    {
        $tableName = $this->tableName();

        $sqlString = "DELETE FROM $tableName WHERE $where;";
        $dbResult = $this->db->con()->query($sqlString);

        return true;
    }

    public function rules(): array
    {
        return [];
    }
}