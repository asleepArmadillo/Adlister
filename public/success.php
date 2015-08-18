<?php  
require_once '../bootstrap.php';
if (!Auth::check()) {
    header("Location: login.php");
    exit();
}

$listing = Ad::count() - 1;
var_dump($listing);


header("Refresh: 3;url=show.php?id=$listing");

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
    <?// include "../views/partials/navbar.php"; ?>


    <div class="container main">


    <h1>Your listing has been created successfully!</h1>
    <h2>We're headed there now...</h2>
            

  

    </div>



    <div class="footer">
        <? include "../views/partials/footer.php"; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>