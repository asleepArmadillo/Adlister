<?php
session_start();

require_once '../bootstrap.php';

if (Auth::check()) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Authorized</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body {
            background-image: url(img/swirl_pattern.png);
            font-family: 'Libre Baskerville', serif;
            text-align: center;
        }
    </style>
</head>
<body>
    <main class="container">
        <h1>Authorized</h1>
        <br>
        <p class="text-right"><a href="logout.php">Log Out</a></p>
    </main>
</body>
</html>