<?php

namespace app\core;

use mysqli;

class DbConnection
{
    public function con() : mysqli
    {
        $mysql =  new mysqli("localhost", "root", "", "wbis") or die(mysqli_error($mysql));

        return $mysql;
    }
}