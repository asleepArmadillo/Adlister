<?php  
require_once '../bootstrap.php';
if (!Auth::check()) {
    header("Location: login.php");
    exit();
}

$user = Auth::user();
$user_id = User::loggedInUserID($user);

$listings = Ad::allUsersListings($user_id);
// var_dump($listings);



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


    <div class="container">

        <div class="row listing-wrapper">

            <h1><?= $userInfo[0]['name']; ?></h1>

            <h2>Your contact info</h2>
            <ul>
                <li>Email: <?= $userInfo[0]['email']; ?></li>
            </ul>
            
            <h2>Your listings</h2>
            <ul class="list-unstyled">
            <? foreach ($listings as $listing) { ?>
                <li>
                    <a href="delete/?id=<?= $listing['id']-1; ?>"<span class="glyphicon glyphicon-remove"></span> </a>
                    <a href="show/?id=<?= $listing['id']-1; ?>"><?= $listing['title']; ?></a>
                </li>
            <? } ?>
            </ul>

        </div>
  

    </div>



    <div class="footer">
        <? include "../views/partials/footer.php"; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>