<?php
require 'function.php';
if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit;    
}
?>
<!DOCTYPE >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authentication</title>
</head>
<body>
    <h1>welcome </h1>
    <a href="logout.php">logout</a>
</body>
</html>