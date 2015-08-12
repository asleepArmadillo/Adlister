<?php

require_once 'ads.index.php';
require_once '../bootstrap.php';

$ads = [];

$ads = Ad::all();
var_dump($ads);



/*$addPark = new Park ();
$addPark->park = Input::getString('park');
$addPark->location = Input::getString('location');
$addPark->established = Input::getString('established');
$addPark->area_in_acres = Input::getString('area_in_acres');
$addPark->description = Input::getString('description');
$addPark->save();*/



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
</head>
  <body>
    <!-- Top nav
    ================================================== -->
    <?// include "../views/partials/navbar.php"; ?>


    <!-- Carousel
    ================================================== -->
    <?// include "../views/partials/carousel.php"; ?>


    <!-- Container below the slider
    ================================================== -->
        <div class="container main">
        <!-- This include is for sidebar navigation -->
        <? include "../views/partials/sidebar.php"; ?>
        

        <div class="row">

            <? foreach($ads as $id => $ad): ?>
             <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                        <h3><?= $ad['title']; ?> - $<?= $ad['price']; ?></h3>
                        
                    <img class="img-thumbnail" data-src="<?= $ad['image_url']; ?>" src="<?= $ad['image_url']; ?>" data-holder-rendered="true" style="width: 200px; display: block;">

                        
                    <p><?= $ad['category_id']; ?></p>
                    <p><?= mb_strimwidth($ad['description'], 0, strpos($ad['description'], ' ', 150), "..."); ?></p> 

                    <a href="#" class="btn btn-sm btn-primary">More <span class="glyphicon glyphicon-chevron-right"></span></a>

                </div>
                </div>
            <? endforeach; ?>




            

                </div>
            </div>

            


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