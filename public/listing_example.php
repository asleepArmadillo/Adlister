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
    <? include "../views/partials/header.php"; ?>
    <? include "../views/partials/navbar.php"; ?>


    <div class="container">
        <!-- <div class="jumbotron container">
            <h1>Welcome to Instrument Exchange.</h1>
        </div> -->

        <!-- Figure out how to put a carousel later. -->


        <!-- This include is for sidebar navigation -->
        <? include "../views/partials/sidebar.php"; ?>

        <div class="row">

            <h2>Title</h2>

            <img src="/img/guitar_450.jpg" class="pull-right">

            <h3>Details:</h3>
            <ul class="list-unstyled">
                <li>Instrument Type:</li>
                <li>Brand: </li>
                <li>Year:</li>
                <li>Condition: </li>
            </ul>

            <h3>Description:</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



        </div>

    </div>



    <? include "../views/partials/footer.php"; ?>

    

</body>
</html>