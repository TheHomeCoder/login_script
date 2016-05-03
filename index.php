<?php
 require_once 'core/init.php';


$user = new User();
if ($user->isLoggedIn()) {
   
?>

<p>Hello <a href="#"><?php echo escape($user->data()->username); ?></a></p>

<ul>
    <li><a href="logout.php">Logout</a></li>
    <li></li>
    <li></li>
</ul>
<?php
} else {
    echo 'You must <a href="login.php">Login</a> or <a href="register.php">Register</a>';
}
/*
echo Session::get(Config::get('session/session_name'));

if (Session::exists('home')) {
    echo '<p>'.Session::flash('home').'</p>';
}
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