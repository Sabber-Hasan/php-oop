<?php
require 'function.php';
if (isset($_SESSION['email'])) {
    header('location: index.php');
    exit;
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new Login();
    $result = $user->login($email, $password);
    // var_dump($result);
    if ($result == 1) {
        header('location: index.php');
    } else {
        $error_message = "Login failed. Please check your credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authentication</title>
</head>
<body>
    <h1>Login page</h1>
    <form action="" method="post">
        <input type="email" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="login">
    </form>
    <br>
    <a href="registration.php">registration</a>
</body>
</html>