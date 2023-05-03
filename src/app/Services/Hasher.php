<?php


namespace App\Services;


class Hasher
{
    public static function check(string $pass, string $hash){
        $split = explode('$', $hash);
        $salt = $split[2];
        $known_hash = $split[3];
        $hashed = hash('sha256', hash('sha256', $pass) . $salt);
        return $known_hash == $hashed;
    }
}
