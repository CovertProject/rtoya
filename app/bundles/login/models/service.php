<?php

namespace Login;

use \Auth;

class LoginService {
    public function __construct()
    {
    }

    public static function attempt($credentials)
    {
        if (Auth::attempt($credentials))
            return true;

        return false;
    }
}