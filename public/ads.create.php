<?php

require_once 'ads.index.php';
require_once '../bootstrap.php';

$ads = [];

$ads = Ad::all();

if (Input::has('title') && Input::has('description')) {
    $ad = new Ad();
    $ad->type = Input::get('instrument_type');
    $ad->brand = Input::get('brand');
    $ad->year = Input::get('year');
    $ad->condition = Input::get('condition');
    $ad->title = Input::get('title');
    $ad->price = Input::get('price');
    $ad->description = Input::get('description');
    $ad->image_url = Input::get('image_url');
    $ad->save();
}

//ONLY AFTER auth check, can a user create a listing - only registered users can create/edit/update/delete their own listings. Non-registered users must create an account first before they can create a new listing to sell.

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


        <div class="loginFormFloat">
            <h1>Create a New Listing</h1>

            




            <form>

                <div class="row">
                  <div class="col-lg-6">
                    <label for="InputEmailExisting">Instrument Type</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <input type="checkbox" aria-label="...">
                      </span>
                      <input type="text" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->

                <div class="form-group">
                    <label for="InputEmailExisting">Instrument Type</label>
                    <input type="email" class="form-control" id="InputEmailExisting" placeholder="Email">
                </div>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Select Instrument Type
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Accordion</a></li>
                    <li><a href="#">Brass</a></li>
                    <li><a href="#">Something else here</a></li>
                    </ul>
                </div>







                <div class="form-group">
                    <label for="InputEmailExisting">Brand</label>
                    <input type="email" class="form-control" id="InputEmailExisting" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="InputEmailExisting">Year</label>
                    <input type="email" class="form-control" id="InputEmailExisting" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="InputEmailExisting">Condition</label>
                    <input type="email" class="form-control" id="InputEmailExisting" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="InputEmailExisting">Price</label>
                    <input type="email" class="form-control" id="InputEmailExisting" placeholder="Email">
                </div>   

                <div class="form-group">
                    <label for="InputEmailExisting">Title</label>
                    <input type="email" class="form-control" id="InputEmailExisting" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="InputEmailExisting">Description</label>
                    <input type="email" class="form-control" id="InputEmailExisting" placeholder="Email">
                </div>                



                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            

        </div>

    </div>



    <? include "../views/partials/footer.php"; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>s