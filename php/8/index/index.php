<?php
namespace App;

use App\User as AppUser;
include '../vendor/autoload.php';
class User{
    public static function make(){
        echo __METHOD__;
    }
}
AppUser::make();