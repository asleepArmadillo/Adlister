<?php

require_once 'ads.index.php';
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
            <h1 class="error">ARE YOU SURE YOU WANT TO DELETE THIS LISTING?</h1>
            <a href="/deletesuccess/?id=<?= $id; ?>">I'm sure!</a>


            <h3><?= $ads[$id]['title']; ?> - $<?= $ads[$id]['price']; ?></h1>

            <img src="<?= $ads[$id]['image_url']; ?>">

            <h3>Details:</h3>
            <ul class="list-unstyled">
                <li>Instrument Type: <?= $ads[$id]['type']; ?></li>
                <li>Brand: <?= $ads[$id]['brand']; ?></li>
                <li>Year: <?= $ads[$id]['year']; ?></li>
                <li>Condition: <?= $ads[$id]['item_condition']; ?></li>
            </ul>

            <h3>Description:</h3>
            <p><?= $ads[$id]['description']; ?> </p>

            <h3>Contact:</h3>
            <a href="mailto:<?= $ads[$id]['email']; ?>"> <span class="glyphicon glyphicon-envelope"></span> <?= $ads[$id]['email']; ?></a>

        </div>

    </div>



    <div class="footer">
        <? include "../views/partials/footer.php"; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>