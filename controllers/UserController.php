<?php

class UserController {

    public function index () {

        return view('register');
    }

    public function register () {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        global $app;
        $oUser = $app['database']->selectUserByEmail('users', ['email' => $email]);

        var_dump($oUser);
    }

}