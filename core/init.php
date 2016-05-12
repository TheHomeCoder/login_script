<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'localhost',
        'username' => 'mfcsteve_steve',
        'password' => 'wagon1',
        'db' => 'login'

    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )

);

/* 
    Automatically loads the class file when the class is called
    Must be the same class name as file
*/
spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';
});

/*
    Include any required functions
    Eventually merge into may one file
*/
require_once 'functions/sanitize.php';
if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    
$hash = Cookie::get(Config::get('remember/cookie_name'));
echo $hash;
$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if ($hashCheck->count()) {
         $user = new User($hashCheck->first()->user_id);
         $user->login();
     } 
}