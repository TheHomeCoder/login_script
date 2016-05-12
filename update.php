<?php
require_once 'core/init.php';

 $user = new User();

 if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if (Input::exists()) {

    if (Token::check(Input::get('token'))) {
        echo 'I have been run';

        $validate = new Validate ();

        $validation = $validate->check($_POST, array(
            'username' => array(
                'field_name' => 'Username',
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            )/*,
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
            )*/
        ));

        if($validation->passed()) {
    

            try {
                $user->update(array(
                    'username' => Input::get('username'),
                    'firstname' => Input::get('first_name'),
                    'lastname' => Input::get('last_name')
                ));

                Session::flash('home', 'You have Updated');
               //Redirect::to('index.php');
            } catch(Exception $e) {
                die($e->getMessage());
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
        <label for="username">Username</label>    
        <input type="text" name="username" id="username" value="<?php echo escape($user->data()->username); ?>" autocomplete="off" />
    </div><!-- /.field -->
   

     <div class="field">
        <label for="first_name">First Name</label>    
        <input type="text" name="first_name" id="first_name" value="<?php echo escape($user->data()->firstname); ?>" autocomplete="off" />
    </div><!-- /.field -->

     <div class="field">
        <label for="last_name">Last Name</label>    
        <input type="text" name="last_name" id="last_name" value="<?php echo escape($user->data()->lastname); ?>" autocomplete="off" />
    </div><!-- /.field -->

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
   
    <input type="submit" value="Register" />

</form>