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
    case '/delete/':
        include 'delete.php';
        break;
    case '/deletesuccess/':
        include 'deletesuccess.php';
        break;
    case '/logout':
        include 'logout.php';
        break;
    case '/profile':
        include 'users.show.php';
        break;
    default:
        include 'home.php';
        break;
}