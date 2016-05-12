<?php
 require_once 'core/init.php';


$user = new User();
if ($user->isLoggedIn()) {
   
?>

<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a></p>

<ul>
    <li><a href="logout.php">Logout</a></li>
    <li><a href="update.php">Update</a></li>
    <li><a href="changepassword.php">Change Password</a></li>
</ul>
<?php

if($user->hasPermission('admin')) {
    echo 'Is Admin';
}

if($user->hasPermission('moderator')) {
    echo 'Is Mod';
}


} else {
    echo 'You must <a href="login.php">Login</a> or <a href="register.php">Register</a>';
}

if (Session::exists('home')) {
    echo '<p>'.Session::flash('home').'</p>';
}
/*
echo Session::get(Config::get('session/session_name'));


$users = DB::getInstance()->query('SELECT username FROM users');
foreach ($users->results() as $user) {
   echo $user->username, '<br>';
}
echo '<br><br>';

echo $users->first()->username;
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