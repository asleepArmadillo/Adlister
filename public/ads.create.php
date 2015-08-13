<?php

var_dump($_POST);

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


if($_FILES) {
    $uploads_directory = 'img/';
    $filename = $uploads_directory . basename($_FILES['somefile']['name']);
    if (move_uploaded_file($_FILES['somefile']['tmp_name'], $filename)) {
        echo '<p>The file '. basename( $_FILES['somefile']['name']). ' has been uploaded.</p>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

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
    <?// include "../views/partials/navbar.php"; ?>


    <div class="container main">


        <div class="loginFormFloat">
            <h1>Create a New Listing</h1>


            <form method="POST" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="70 Character Maximum">
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="instrument_type">Instrument Type</label>
                          <select class="form-control" id="instrument_type" name="instrument_type">
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
                        <label for="brand">Brand</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="checkbox" aria-label="..." id="brand">
                                </span>
                            <input type="text" class="form-control" aria-label="..." id="brand" name="brand">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <label for="year">Year</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="checkbox" aria-label="..." id="year">
                                </span>
                            <input type="text" class="form-control" aria-label="..."  id="year" name="year">
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="item_condition">Condition</label>
                          <select class="form-control" id="item_condition" name="item_condition">
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
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="5" id="description" name="description" placeholder="50 Character Minimum"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image_url">Upload Image</label>
                            <input type="file" name="somefile" id="image_url" name="image_url">
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