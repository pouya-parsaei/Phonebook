<?php
namespace App\Utilities;

class Validation
{
    public static function  isValidEmail(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
            return false;
        }
    }
}