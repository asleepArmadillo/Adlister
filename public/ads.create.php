<?php
// var_dump($_POST);
var_dump($_FILES);

require_once 'ads.index.php';
require_once '../bootstrap.php';

$ads = [];

$errors =   [];

$ads = Ad::all();

if (!empty(Input::get('title')) && !empty(Input::get('description')) && !empty(Input::get('instrument_type')) && !empty(Input::get('item_condition')) && !empty(Input::get('price'))) {
    $ad = new Ad();

    try {
        $ad->type = Input::getString('instrument_type');
    } catch (Exception $e) {
        $errors['instrument_type'] = "An error occurred: " . $e->getMessage();
    }

    try {
        $ad->brand = Input::getString('brand');
    } catch (Exception $e) {
        $errors['brand'] = "An error occurred: " . $e->getMessage();
    }

    try {
        $ad->year = Input::getNumber('year');
    } catch (Exception $e) {
        $errors['year'] = "An error occurred: " . $e->getMessage();
    }

    try {
        $ad->item_condition = Input::getString('item_condition');
    } catch (Exception $e) {
        $errors['item_condition'] = "An error occurred: " . $e->getMessage();
    }

    try {
        $ad->title = Input::getString('title');
    } catch (Exception $e) {
        $errors['title'] = "An error occurred: " . $e->getMessage();
    }

    try {
        $ad->price = Input::getNumber('price');
    } catch (Exception $e) {
        $errors['price'] = "An error occurred: " . $e->getMessage();
    }

    try {
        $ad->description = Input::getString('description');
    } catch (Exception $e) {
        $errors['description'] = "An error occurred: " . $e->getMessage();
    }

    if($_FILES) {
        $uploads_directory = '/img/';

        $filename = $uploads_directory . basename($_FILES['somefile']['name']);
        if (move_uploaded_file($_FILES['somefile']['tmp_name'], $filename)) {
            $image_status = '<p>The file '. basename( $_FILES['somefile']['name']). ' has been uploaded.</p>';
        } else {
            $image_status = "Sorry, there was an error uploading your file.";
        }
    }

    try {
        $ad->image_url = $filename;
    } catch (Exception $e) {
        $errors['image_url'] = "An error occurred: " . $e->getMessage();
    }


    $ad->date_posted = date('Y-m-d');
    $ad->category_id = 1;
    $ad->user_id = 1;
    // var_dump($ad);
    // var_dump($errors);

    if (empty($errors)) {
        $ad->save();
    }
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


            <form method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="title">Title</label><p class="error"><? if (isset($errors['title'])){ echo $errors['title'];};?></p>
                            <input type="text" class="form-control" id="title" name="title" placeholder="70 Character Maximum">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="instrument_type">Instrument Type</label><p class="error"><? if (isset($errors['instrument_type'])){ echo $errors['instrument_type'];;};?></p>
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
                        <label for="brand">Brand</label><p class="error"><? if (isset($errors['brand'])){ echo $errors['brand'];};?></p>
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
                        <label for="year">Year</label><p class="error"><? if (isset($errors['year'])){ echo $errors['year'];};?></p>
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
                          <label for="item_condition">Condition</label><p class="error"><? if (isset($errors['item_condition'])){ echo $errors['item_condition'];};?></p>
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
                        <label for="price">Price</label><p class="error"><? if (isset($errors['price'])){ echo $errors['price'];};?></p>
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                    <input type="text" class="form-control" id="price" name="price"  aria-label="Amount (to the nearest dollar)">
                                
                            </div>
                        </div> 
                    </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="description">Description</label><p class="error"><? if (isset($errors['description'])){ echo $errors['description'];};?></p>
                    <textarea class="form-control" rows="5" id="description" name="description" placeholder="50 Character Minimum"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="image_url">Upload Image</label><p class="error"><? if (isset($image_status)){ echo $image_status;};?></p>
                    <input type="file" name="somefile" id="image_url" name="image_url">
                </div>
            </div>
        </div>
<!-- =======
                            <label for="image_url">Upload Image</label>
                            <input type="file" name="somefile" id="image_url" name="image_url">
                        </div>
                    </div>
                </div>
>>>>>>> fb752fc79970f2c5634dcd0e3b87aed4c154c2d4 -->
    
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
            

        </div>

    </div>



    <? include "../views/partials/footer.php"; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>s