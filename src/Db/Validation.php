<?php

namespace App\Db;

class Validation 
{
    public static function check_empty($data, $fields)
    {
        $msg = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "$value field empty <br />";
            }
        } 
        return $msg;
    }

    public static function is_empty_field(array $data) : bool
    {
        // var_dump($data);

        // die();
        foreach ($data as $key => $value) {
            if(empty($value))
                return true;
        }
        return false;

    }
    
    public function is_age_valid($age)
    {
        //if (is_numeric($age)) {
        if (preg_match("/^[0-9]+$/", $age)) {    
            return true;
        } 
        return false;
    }
    
    public function is_email_valid($email)
    {
        //if (preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {    
            return true;  
        }
        return false;
    }

    public static function check_connected_user(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        // var_dump();
        if(!$_SESSION['user']){
            header('Location: login.php');
            exit;
        }
    }

    public static function desconnect_user(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        unset($_SESSION['user']);

        header('Location: login.php');
        exit;

    }
}
?>