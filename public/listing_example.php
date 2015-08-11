<?php

require_once 'ads.index.php';



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

            <h2><?= $ads[0]['title']; ?> - $<?= $ads[0]['price']; ?></h2>

            <img src="<?= $ads[0]['image_url']; ?>" class="pull-right">


            <h3>Details:</h3>
            <ul class="list-unstyled">
                <li>Instrument Type: <?= $ads[0]['type']; ?></li>
                <li>Brand: <?= $ads[0]['brand']; ?></li>
                <li>Year: <?= $ads[0]['year']; ?></li>
                <li>Condition: <?= $ads[0]['condition']; ?></li>
            </ul>

            <h3>Description:</h3>
            <p><?= $ads[0]['description']; ?></p>

            <h3>Contact:</h3>

        </div>

    </div>



    <? include "../views/partials/footer.php"; ?>

    

</body>
</html>