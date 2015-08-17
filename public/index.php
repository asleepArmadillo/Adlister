<?php 

$url = parse_url($_SERVER['REQUEST_URI']);

switch ($url['path']) {
    case '/create':
        include 'ads.create.php';
        break;
    case '/ads/show':
        include 'show.php';
        break;
    case '/login':
        include 'login.php';
        break;
    case '/show/':
        include 'show.php';
        break;
    case '/logout':
        include 'logout.php';
        break;
    default:
        include 'home.php';
        break;
}