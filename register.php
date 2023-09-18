<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("location: Shapel/index.html");
    }

    if(isset($_POST["submit"])){
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        $db = mysqli_connect("localhost", "root", "", "login");
        $sql  ="INSERT INTO users (username, password) VALUES ('$user', '$pass')";
        mysqli_query($db, $sql);
        mysqli_close($db);
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه التسجيل بالموقع</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body dir="rtl">
    <div class="d-flex align-items-center min-vh-100 bg-dark">
        <div class="container d-flex justify-content-center">
            <form method="post" class="bg-light px-5 py-4 rounded-1 col-md-6 col-lg-5 col-xl-4">
                <h1 class="text-center mb-4">تسجيل عضويه</h1>
                <div class="mb-3">
                    <label for="user" class="form-label">اسم المستخدم او الايميل:</label>
                    <input type="text" id="user" name="user" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">كلمه المرور:</label>
                    <input type="password" id="pass" name="pass" class="form-control" required>
                </div>
                <div class="mb-3">
                    <a href="index.php" style="font-size: 12px" class="text-decoration-none">هل لديك حساب (تسجيل الدخول)؟</a>
                </div>
                <button type="submit" name="submit" class="btn btn-success w-75 d-block m-auto">تسجيل حساب</button>
            </form>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>