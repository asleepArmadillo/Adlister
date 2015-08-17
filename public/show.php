<?php

require_once 'ads.index.php';
require_once '../bootstrap.php';

$ads = [];

$ads = Ad::all();

if (Input::has('id') && Input::get('id') >= 0) {
    $id = Input::get('id');
} else {
    $id = 0;
}

$idUp = $id + 1;
$idDown = $id -1;

$lastId = Ad::count() - 1;

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

        <div class="row" id="listing-wrapper">

            <h1><?= $ads[$id]['title']; ?> - $<?= $ads[$id]['price']; ?></h1>

            <img src="<?= $ads[$id]['image_url']; ?>" class="pull-right">

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
            <a href="mailto:<?= $ads[$id]['email']; ?>"><?= $ads[$id]['email']; ?></a>

        </div>

        <nav>
            <ul class="pager">
                <? if ($id > 0) : ?>        
                    <li class="previous"><a href="?id=0" class="btn btn-default">First Listing</a></li>
                    <li class="previous"><a href="?id=<?= $idDown; ?>" class="btn btn-default">Previous</a></li>
                <? endif; ?>
                <? if ($id < $lastId) : ?>
                    <li class="next"><a href="?id=<?= $idUp; ?>" class="btn btn-default">Next</a></li>
                    <li class="next"><a href="?id=<?= $lastId; ?>" class="btn btn-default">Last Listing</a></li>
                <? endif; ?>
               
            </ul>
        </nav>

    </div>



    <div class="footer">
        <? include "../views/partials/footer.php"; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>