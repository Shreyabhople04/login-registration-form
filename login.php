<?php require_once "./conn1.php";

if(isset($_SESSION['logindata'])){
    header("Location:dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

   
    <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>

        <div class="form-box login">
            <h1 class="animation" style="--i:0; --j:21;">Login</h1>
            <form action="loginuser.php" method="post">
                
                <div class="input-box animation" style="--i:1; --j:22;">
                    <input type="text" name="uname" required>
                    <label>Username</label>
                    <i class='bx bxs-user-pin'></i>
                </div>

                <div class="input-box animation" style="--i:2; --j:23;">
                    <input type="password" name="pass" required>
                    <label>Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" name="login" class="btn animation" style="--i:3; --j:24;">Login</button>
                <div class="logreg-link animation" style="--i:4;  --j:25;">
                    <p>Dont have an Account...?<a href="#" class="register-link">Sign up</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome Back...!</h2>
            <p class="animation" style="--i:1; --j:21;">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>


        <div class="form-box register">
            <h1 class="animation" style="--i:17; --j:0;">Sign Up</h1>
            <form action="insert1.php" method="post">
                <div class="input-box animation" style="--i:18; --j:1;">
                    <input type="text" name="uname" id="username" required>
                    <label>Username</label>
                    <i class='bx bxs-user-pin'></i>
                </div>

                <div class="input-box animation" style="--i:19; --j:2;">
                    <input type="text" name="email" id="gmail" required>
                    <label>Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>


                <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="password" name="pass" id="password" required>
                    <label>Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" name="log" class="btn animation" style="--i:21; --j:4;">Sign Up</button>
                <div class="logreg-link animation" style="--i:22; --j:5;">
                    <p>Already have an Account...?<a href="#" class="login-link">Login</a></p>
                </div>
            </form>

        </div>
        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">Welcome Back...!</h2>
            <p class="animation" style="--i:18; --j:1;">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>

    </div>

    <script src="script.js"></script>

</body>
</html>