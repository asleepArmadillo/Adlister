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
    <? include "../views/partials/navbar.php"; ?>


    <div class="container main">
    

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
            <p><?= substr($ads[0]['description'], 0, 100) . '...'; ?> </p>

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