<?php

require_once 'ads.index.php';
require_once '../bootstrap.php';

$ads = [];

$ads = Ad::all();

if (Input::has('title') && Input::has('description') && Input::has('instrument_type') && Input::has('condition') && Input::has('price')) {
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

// ONLY AFTER auth check, can a user create a 
// listing - only registered users can 
// create/edit/update/delete their own listings. 
// Non-registered users must create an account 
// first before they can create a new listing to sell.

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
                        <div class="form-group">
                          <label for="InputInstrumentType">Instrument Type</label>
                          <select class="form-control" id="InputInstrumentType">
                            <option>Accordion</option>
                            <option>Brass</option>
                            <option>Guitar</option>
                            <option>Harmonica</option>
                            <option>Percussion</option>
                            <option>Piano / Keys</option>
                            <option>String</option>
                            <option>Woodwind</option>
                            <option>Amplifier / Gear</option>
                            <option>Other</option>
                          </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="InputBrand">Brand</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="checkbox" aria-label="..." id="InputBrand">
                                </span>
                            <input type="text" class="form-control" aria-label="...">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <label for="InputYear">Year</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="checkbox" aria-label="..." id="InputYear">
                                </span>
                            <input type="text" class="form-control" aria-label="...">
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="InputCondition">Condition</label>
                          <select class="form-control" id="InputCondition">
                            <option>Not Specified</option>
                            <option>Excellent</option>
                            <option>Very Good</option>
                            <option>Good</option>
                            <option>Poor</option>
                            <option>New</option>
                            <option>Refurbished</option>
                            <option>For Parts / Not Working</option>
                          </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="InputPrice">Price</label>
                            <input type="email" class="form-control" id="InputPrice" placeholder="Email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="InputTitle">Title</label>
                            <input type="email" class="form-control" id="InputTitle" placeholder="70 Character Maximum">
                        </div>
                    </div>
                </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="InputComment">Comment:</label>
                    <textarea class="form-control" rows="5" id="InputComment" placeholder="50 Character Minimum"></textarea>
                </div>
            </div>
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