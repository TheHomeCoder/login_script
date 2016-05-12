<?php
require_once 'core/init.php';

 $user = new User();

 if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if (Input::exists()) {

    if (Token::check(Input::get('token'))) {
         $validate = new Validate ();

        $validation = $validate->check($_POST, array(
           'password_current' => array(
                'required' => true,
                'min' => 6
            ),
             'password_new' => array(
                'required' => true,
                'min' => 6
            ),
            'password_new_again' => array(
                'required' => true,
                'matches' => 'password_new'
            )
            
        ));

        if($validation->passed()) {
    

             if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password) {

                
                    echo 'Current Password Wrong';
                } else {
                    $salt = Hash::salt(32);
                     $user->update(array(
                    'password' => Hash::make(Input::get('password_new'), $salt),
                    'salt' => $salt
                ));

                     Session::flash('home', 'Password Updated');
                     Redirect::to('index.php');
                }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error . '<br>';
            }
        }
    } else {
        echo 'Invalid attempt to run';
    }
}
if (Session::exists('home')) {
    echo '<p>'.Session::flash('home').'</p>';
}
?>


<form action="" method="post">
   
    <div class="field">
        <label for="password_current">Current Password</label>
        <input type="text" name="password_current" id="password_current" value="wagon1"/>    
    </div><!-- /.password -->

    <div class="field">
        <label for="password_new">New Password</label>
        <input type="text" name="password_new" id="password_new" value="wagon1"/>    
    </div><!-- /.password -->
    
    <div class="field">
        <label for="password_new_again">New Password Confirm</label>
        <input type="text" name="password_new_again" id="password_new_again" value="wagon1"/>    
    </div><!-- /.password -->

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
   
    <input type="submit" value="Change" />

    </form>