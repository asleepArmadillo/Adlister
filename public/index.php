<?php

require_once 'ads.index.php';
require_once '../bootstrap.php';

$ads = [];

$ads = Ad::all();

if(Input::has('page')) {
    $page = Input::get('page');
} else {
    $page = 1;
}


$items_per_page = 4;

$totalListings = Ad::count();
$lastPage = ceil($totalListings / $items_per_page);

if ($page > $lastPage) {
    $page = $lastPage;
}
if ($page < 1) {
    $page = 1;
}

$offset = ($page - 1) * $items_per_page;

$ads = Ad::pager($offset, $items_per_page);

$pageUp = $page + 1;
$pageDown = $page - 1;

?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instrument Exchange</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Custom styling for site -->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Quattrocento' rel='stylesheet' type='text/css'>
</head>
<body>
    <!-- Top nav
    ================================================== -->
    <? include "../views/partials/navbar.php"; ?>


    <!-- Carousel
    ================================================== -->
    <? include "../views/partials/carousel.php"; ?>


    <!-- Container below the slider
    ================================================== -->
    <div class="container main">
        <!-- This include is for sidebar navigation -->
        <? include "../views/partials/sidebar.php"; ?>
        
        <div class="row">
            
            <? foreach($ads as $id => $ad): ?>
                 <div class="col-md-4">
                    <div class="thumbnail">
                        <h2><?= $ad['title']; ?> - $<?= $ad['price']; ?></h2>
                            
                        <img class="img-thumbnail" data-src="<?= $ad['image_url']; ?>" src="<?= $ad['image_url']; ?>" data-holder-rendered="true" style="width: 200px; display: block;">

                        <p><?= $ad['type']; ?></p>
                        <p><?= mb_strimwidth($ad['description'], 0, 150, "..."); ?></p> 
                        <p>Posted by: <?= $ad['name']?></p>
                        <a href="show.php?id=<?= $id; ?>" class="btn btn-sm btn-primary">More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>
            <? endforeach; ?>
            
            <nav>
                <ul class="pager">
                    <? if ($totalListings >= $items_per_page) : ?>        
                        <? if ($page > 1) : ?>
                            <li class="previous"><a href="?page=1" class="btn btn-default">First Page</a></li>
                            <li class="previous"><a href="?page=<?= $pageDown; ?>" class="btn btn-default">Previous</a></li>
                        <? endif; ?>
                        <? if ($page < $lastPage) : ?>
                            <li class="next"><a href="?page=<?= $lastPage; ?>" class="btn btn-default">Last Page</a></li>
                            <li class="next"><a href="?page=<?= $pageUp; ?>" class="btn btn-default">Next</a></li>
                        <? endif; ?>
                    <? endif; ?>
                </ul>
            </nav>


        </div>
    </div>


    <? include "../views/partials/footer.php"; ?>

    


<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>
</html>