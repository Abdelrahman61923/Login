<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("location: Shapel/index.html");
    }

    if(isset($_POST["submit"])){
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        $db = mysqli_connect("localhost", "root", "", "login");
        $sql  ="SELECT * FROM users WHERE username='$user' AND password='$pass'";
        $res = mysqli_query($db, $sql);
        $rows = mysqli_num_rows($res);
        if($rows === 1){
            $_SESSION["user"] = $user;
            header("location: Shapel/index.html");
        }
        $error = true;
        mysqli_close($db);
    }
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه تسجيل الدخول</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body dir="rtl">
    <div class="d-flex align-items-center min-vh-100 bg-dark">
        <div class="container d-flex justify-content-center">
            <form method="post" class="bg-light px-5 py-4 rounded-1 col-md-6 col-lg-5 col-xl-4">
                <h1 class="text-center mb-4">تسجيل الدخول</h1>
                <div class="mb-3">
                    <label for="user" class="form-label">اسم المستخدم او الايميل:</label>
                    <input type="text" id="user" name="user" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">كلمه المرور:</label>
                    <input type="password" id="pass" name="pass" class="form-control" required>
                </div>
                <div class="mb-3">
                    <a href="register.php" style="font-size: 12px" class="text-decoration-none">ليس لديك حساب ( تسجيل حساب )</a>
                </div>
                <button type="submit" name="submit" class="btn btn-success w-75 d-block m-auto">تسجيل الدخول</button>
            </form>
        </div>
    </div>

    <div class="modal" id="modal1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-danger bg-gradient">
                <div class="modal-header text-warning">
                    <button class="btn btn-close" data-bs-dismiss="modal"></button>
                    <h5 class="position-absolute mx-5 mt-2">لقد حدث خطأ</h5>
                </div>
                <div class="modal-body text-warning">
                    <h4 class="text-center p-3">فشل تسجيل الدخول برجاء المحاوله مره اخرى!</h4>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark w-75 d-block m-auto" data-bs-dismiss="modal">اغلاق!</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>

    <?php
        if(isset($error)){
            echo "
                <script>
                    var x = document.getElementById('modal1');
                    new bootstrap.Modal(x).show();
                </script>
            ";
        }
    ?>

</body>
</html>