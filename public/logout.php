<?php

require_once '../bootstrap.php';

Auth::logout();
header("Location: /");
exit();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Logging Out...</title>
</head>
<body>

</body>
</html>