<?php  
session_start();
require_once '../utils/Input.php';
require_once '../utils/Logger.php';
require_once '../models/BaseModel.php';
require_once '../models/Ad.php';
require_once '../models/User.php';
require_once '../utils/Auth.php';

$_ENV = include '.env.php';

?>