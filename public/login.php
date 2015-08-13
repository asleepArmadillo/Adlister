<?php




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
                <form>
                    <div class="form-group">
                    <label for="InputEmailExisting">Email address</label>
                    <input type="email" class="form-control" id="InputEmailExisting" placeholder="Email">
                    </div>

                    <div class="form-group">
                    <label for="InputPasswordExisting">Password</label>
                    <input type="password" class="form-control" id="InputPasswordExisting" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        
                <h2>Signup for New Users</h2>
                <form>
                    
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