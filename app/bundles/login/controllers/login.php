<?php

use Login\LoginService;

class Login_Login_Controller extends Base_Controller {

    public $restful = true;

    public function __construct()
    {
        $this->filter('before', 'csrf')->on('post');
    }

    public function get_index()
    {
        if (Cookie::get('rtoya_remember_me') && LoginService::check_remember_me()) {
            return Redirect::to('/dashboard');
        }

        if (!Auth::guest())
            return Redirect::to('/dashboard');

        return View::make('login::index');
    }

    public function post_login()
    {
        $credentials = array(
            'username' => Input::get('login'),
            'password' => Input::get('password')
        );

        if (!LoginService::attempt($credentials))
            return Redirect::to_route('login');

        if (Input::get('remember_me'))
            LoginService::set_remember_me();

        LoginService::set_session();

        return Redirect::to('/dashboard');
    }

    public function get_logout()
    {
        LoginService::logout();
        return Redirect::to_route('home');
    }
}