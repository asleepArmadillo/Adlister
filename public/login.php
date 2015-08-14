<?php

require_once '../bootstrap.php';

//this is for new user create
$users = [];

$errors = [];

$users = User::all();

$pass1 = '';
$pass2 = '';


if (!empty($_POST)) 
{

    if (!empty(Input::get('name')) && !empty(Input::get('email')) && !empty(Input::get('password1')) && !empty(Input::get('password'))) 
    {
        $user = new User();
        $pass1 = Input::getString('password1');
        $pass2 = Input::getString('password');

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

        if (Input::getString('phone') == '') {
            $phone = null;
            try {
                $user->phone = $phone;
            } catch (Exception $e) {
                $errors['phone'] = "An error occurred: " . $e->getMessage();
            }
        } else {
            $phone = str_replace(str_split('() -'), "", Input::getString('phone'));
            var_dump($phone);
            try {
                $user->phone = $phone;
            } catch (Exception $e) {
                $errors['phone'] = "An error occurred: " . $e->getMessage();
            }
        }

        if ($pass1 == $pass2) {
            try {
                $passToHash = Input::getString('password');
                $user->password = password_hash($passToHash, PASSWORD_DEFAULT);
            } catch (Exception $e) {
                $errors['password'] = "An error occurred: " . $e->getMessage();
            }
        } else {
            $errors['password'] = "Passwords don't match!";
        }  

        if (empty($errors)) {
            $user->save();
        } 
        
    } else {
        $errors['name'] = "Please complete ALL FIELDS!";
    }
}


//this is for existing user login
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
    <!-- Custom Bootstrap Form Helper for phone input-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-formhelpers.min.css">
    <!-- Custom Bootstrap Form Helper for phone input-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-formhelpers.css">
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
                    <label for="name">Your Name</label><p class="error"><? if (isset($errors['name'])){ echo $errors['name'];};?></p>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                    </div>


                    <div class="form-group">
                    <label for="EmailNew">Email address</label><p class="error"><? if (isset($errors['email'])){ echo $errors['email'];};?></p>
                    <input type="email" class="form-control" id="EmailNew" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                    <label for="phone-number">Phone number:</label><p class="error"><? if (isset($errors['phone'])){ echo $errors['phone'];};?></p>
                    <!-- I used an input type of text here so browsers like Chrome do not display the spin box -->
                    <input id="phone-number" name="phone" type="text" maxlength="14" placeholder="Optional" />
                    </div>

                    <div class="form-group">
                    <label for="PasswordNew">Password</label><p class="error"><? if (isset($errors['password'])){ echo $errors['password'];};?></p>
                    <input type="password" class="form-control" id="PasswordNew" name="password1" placeholder="Password">
                    </div>

                    <div class="form-group">
                    <label for="RetypePasswordNew">Retype Password</label><p class="error"><? if (isset($errors['password'])){ echo $errors['password'];};?></p>
                    <input type="password" class="form-control" id="RetypePasswordNew" name="password" placeholder="Password">
                    </div>

                    

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>

        </div>

    </div>



    <? include "../views/partials/footer.php"; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script type="text/javascript">
       
        $('#phone-number')

        .keydown(function (e) {
            var key = e.charCode || e.keyCode || 0;
            $phone = $(this);

            // Auto-format- do not expose the mask as the user begins to type
            if (key !== 8 && key !== 9) {
                if ($phone.val().length === 0) {
                    $phone.val('(');
                }
                if ($phone.val().length === 4) {
                    $phone.val($phone.val() + ')');
                }
                if ($phone.val().length === 5) {
                    $phone.val($phone.val() + ' ');
                }           
                if ($phone.val().length === 9) {
                    $phone.val($phone.val() + '-');
                }
            }

            // Allow numeric (and tab, backspace, delete) keys only
            return (key == 8 || 
                    key == 9 ||
                    key == 46 ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105)); 
        })
        
        .bind('focus click', function () {
            $phone = $(this);
            
            if ($phone.val().length === 0) {
                $phone.val('(');
            }
            else {
                var val = $phone.val();
                $phone.val('').val(val); // Ensure cursor remains at the end
            }
        })
        
        .blur(function () {
            $phone = $(this);
            
            if ($phone.val() === '(') {
                $phone.val('');
            }
        });

    </script>
</body>
</html>