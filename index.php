<?php
 require_once 'core/init.php';


if (Session::exists('home')) {
    echo '<p>'.Session::flash('home').'</p>';
}
 //$users = DB::getInstance()->query('SELECT username FROM users');
/*

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


//$userDel = DB::getInstance()->delete('users', array('username','=', 'Tom'));


echo '<br><br>';


$userInsert = DB::getInstance()->insert('users', array(
    'username' => '1234567890123456789012345',
    'password' => 'password',
    'salt' => 'salt'


    ));

if ($userInsert) {
    echo 'Inserted';
} else {
    echo 'Failed';
}
echo '<br><br>';

$userUpdate = DB::getInstance()->update('users', 12, array(
    'password' => 'newpass2',
    'salt' => 'newsalt2'


    ));

if ($userInsert) {
    echo 'Inserted';
} else {
    echo 'Failed';
}



echo '<br><br>';
 echo Config::get('mysql/host');

 */