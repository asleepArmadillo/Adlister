<?php
session_start();

require_once '../bootstrap.php';

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
                    <label for="InputEmailNew">Email address</label>
                    <input type="email" class="form-control" id="InputEmailNew" placeholder="Email">
                    </div>

                    <div class="form-group">
                    <label for="InputPasswordExisting">Password</label>
                    <input type="password" class="form-control" id="InputPasswordExisting" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>

        </div>

    </div>



    <? include "../views/partials/footer.php"; ?>

    

</body>
</html>