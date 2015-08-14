<?php
session_start();

require_once '../bootstrap.php';

//this is for new user create
$pass1 = '';
$pass2 = '';

//if $pass1 == $pass2, then set $pass2 as password on insert 

if (!empty(Input::get('name')) && !empty(Input::get('email')) && !empty(Input::get('phone') && !empty(Input::get('password1')) && !empty(Input::get('password'))) 
{
    $user = new User();

    try {
        $user->name = Input::getString('name');
    } catch (Exception $e) {
        $errors['name'] = "An error occurred: " . $e->getMessage();
    }

    try {
        $user->email = Input::getString('email');
    } catch (Exception $e) {
        $errors['email'] = "An error occurred: " . $e->getMessage();
    } 

    try {
        $user->phone = Input::getString('phone');
    } catch (Exception $e) {
        $errors['phone'] = "An error occurred: " . $e->getMessage();
    }    
    

    $user->save();
}



//this is for existing user login
$data = User::findUserByEmail('josh@example.com');
        var_dump($data);

if (isset($_SESSION['LOGGED_IN_USER'])) {
    header("Location: auth.login.php");
    exit();
}

function pageController(){
    $data = [];
    $data['location'] = 'login.php';

    $password = Input::get('password');
    $userName = Input::get('user');

    Auth::attempt($userName, $password);

    return $data;
}

extract(pageController());

?>

<html>
<head>
    <title>Instrument Exchange</title>
    <!-- Bootstrap styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Custom styling for site -->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
    <? include "../views/partials/navbar.php"; ?>


    <div class="container main">


        <div class="loginFormFloat">
            <h1>Log In or Create Account</h1>
        
                <h2>Login for Existing Users</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="InputEmailExisting">Email address</label>
                    <input type="email" class="form-control" name="user" id="InputEmailExisting" placeholder="Email">
                    </div>

                    <div class="form-group">
                    <label for="InputPasswordExisting">Password</label>
                    <input type="password" class="form-control" name="password" id="InputPasswordExisting" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        
                <h2>Signup for New Users</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                    </div>


                    <div class="form-group">
                    <label for="EmailNew">Email address</label>
                    <input type="email" class="form-control" id="EmailNew" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Email">
                    </div>


                    <div class="form-group">
                    <label for="PasswordNew">Password</label>
                    <input type="password" class="form-control" id="PasswordNew" name="password1" placeholder="Password">
                    </div>

                    <div class="form-group">
                    <label for="RetypePasswordNew">Retype Password</label>
                    <input type="password" class="form-control" id="RetypePasswordNew" name="password" placeholder="Password">
                    </div>

                    

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>

        </div>

    </div>



    <? include "../views/partials/footer.php"; ?>

    

</body>
</html>