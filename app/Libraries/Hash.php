<?php

namespace App\Libraries;

class Hash
{
    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function check($enter_pass, $db_pass)
    {

        if (password_verify($enter_pass, $db_pass)) {
            // echo  true;
            // echo 'password valid';
            return true;
        } else {
            // echo 'password not valid';
            // echo false;
            return false;
        }
    }

}

?>