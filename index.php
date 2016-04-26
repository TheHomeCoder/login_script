<?php
 require_once 'core/init.php';




 //$users = DB::getInstance()->query('SELECT username FROM users');


$user2 = DB::getInstance()->query("SELECT username FROM users WHERE username = ?", array('SteveB'));
if ($user2->error()) {
    echo 'No User';
} else {
    echo 'Found User';
}
 
echo '<br><br>';



$user = DB::getInstance()->get('users', array('username','=', 'SteveB'));
if (!$user->count ()) {
    echo 'Nope';
} else {
    echo 'Yep';
}


$userDel = DB::getInstance()->delete('users', array('username','=', 'Tom'));


echo '<br><br>';
 echo Config::get('mysql/host');