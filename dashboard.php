<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("location: index.php");
    }

    if(isset($_GET["logout"])){
        session_destroy();
        header("location: index.php");
    }

    $user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه المستخدمين</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
    <div class="text text-center">
        <h1>Welcome <?php echo $user;?> </h1>
        <h4>How Can I Help You</h4>
        <a href="?logout" class="text-decoration-none">Sign out</a>
    </div>
</body>
</html>