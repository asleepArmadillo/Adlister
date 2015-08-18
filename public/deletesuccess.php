<?php  
require_once '../bootstrap.php';


if (!Auth::check()) {
    header("Location: login.php");
    exit();
}

$ads = [];

$ads = Ad::all();

if (Input::has('id') && Input::get('id') >= 0) {
    $id = Input::get('id');
} else {
    $id = 0;
} 

Ad::isOwner($ads[$id]['user_id']);


Ad::delete($id);


header("Refresh: 3;url=/profile");

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


    <h1>Your listing has been deleted successfully!</h1>
    <h2>Heading to your profile now...</h2>
            

  

    </div>



    <div class="footer">
        <? include "../views/partials/footer.php"; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>