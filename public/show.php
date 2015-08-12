<?php

require_once 'ads.index.php';
require_once '../bootstrap.php';

$ads = [];

$ads = Ad::all();

$id = Input::get('id');

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
    

        <!-- This include is for sidebar navigation -->
        <? include "../views/partials/sidebar.php"; ?>

        <div class="row">

            <h2><?= $ads[$id]['title']; ?> - $<?= $ads[$id]['price']; ?></h2>

            <img src="<?= $ads[$id]['image_url']; ?>" class="pull-right">


            <h3>Details:</h3>
            <ul class="list-unstyled">
                <li>Instrument Type: <?= $ads[$id]['category_id']; ?></li>
                <li>Brand: <?= $ads[$id]['brand']; ?></li>
                <li>Year: <?= $ads[$id]['year']; ?></li>
                <li>Condition: <?= $ads[$id]['item_condition']; ?></li>
            </ul>

            <h3>Description:</h3>
            <p><?= $ads[$id]['description']; ?> </p>

            <h3>Contact:</h3>
            <ul>
                <li></li>
                <li></li>
            </ul>

        </div>

    </div>



    <? include "../views/partials/footer.php"; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>