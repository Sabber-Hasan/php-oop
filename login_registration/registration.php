<?php
require 'function.php';
if(isset($_SESSION['email'])){
    header('location: index.php');
}
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new Registration();
    $result = $user->registration($username, $email, $password);
    // if($result == 1){
    //     echo "registration successful";
    // }
    // else if($result == 10){
    //     echo "username or email already exists";
    // }
    // else if($result == 100){
    //     echo "password must be between 4 and 8 characters";
    // }
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
    <h1>Registration page</h1>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username" required>
        <input type="email" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="register">
    </form>
    <br>
    <a href="login.php">login</a>

    <script>
    var result = "<?php echo isset($result) ? $result : ''; ?>";

    if(result == 1){
        alert("registration successful") ;
    }
    else if(result == 10){
        alert("username or email already exists");
    }
    else if(result == 100){
        alert("password must be between 4 and 8 characters");
    }
    </script>
</body>
</html>