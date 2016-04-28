<?php
require_once 'core/init.php';

if (Input::exists()) {
    $validate = new Validate ();

    $validation = $validate->check($_POST, array(
        'username' => array(
            'field_name' => 'Username',
            'required' => true,
            'min' => 2,
            'max' => 20,
            'unique' => 'users'
        ),
        'password' => array(
            'required' => true,
            'min' => 6
        ),
        'password_again' => array(
            'required' => true,
            'matches' => 'password'
        ),
        'first_name' => array(
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
            'last_name' => array(
            'required' => true,
            'min' => 2,
            'max' => 50
        )
    ));

    if($validation->passed()) {
        echo 'Passed';
    } else {
        foreach ($validation->errors() as $error) {
            echo $error . '<br>';
        }
    }
}
?>    
<form action="" method="post">
    <div class="field">
        <label for="username">Username</label>    
        <input type="text" name="username" id="username" value="<?php echo Input::get('username'); ?>" autocomplete="off" />
    </div><!-- /.field -->
   
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password"/>    
    </div><!-- /.password -->
    
    <div class="field">
        <label for="password_again">Password Confirm</label>
        <input type="password" name="password_again" id="password_again"/>    
    </div><!-- /.password -->

     <div class="field">
        <label for="first_name">First Name</label>    
        <input type="text" name="first_name" id="first_name" value="<?php echo Input::get('first_name'); ?>" autocomplete="off" />
    </div><!-- /.field -->

     <div class="field">
        <label for="last_name">Last Name</label>    
        <input type="text" name="last_name" id="last_name" value="<?php echo Input::get('last_name'); ?>" autocomplete="off" />
    </div><!-- /.field -->
   
    <input type="submit" value="Register" />

</form>