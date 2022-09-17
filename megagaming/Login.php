<!-- HENRI LOUW ZDV351JB3
This file has all the HTML for the Login page aswell as some PHP to display
error messages -->

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZFY845NK4Y"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-ZFY845NK4Y');
    </script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/x-icon" href="Resources/Logostatic.png">
    <script src="https://kit.fontawesome.com/53bc16e5b7.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MegaGaming</title>
</head>
<body>
    
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <img class="Navlogo" src="Resources/Navbarlogo.png" alt="MegaGaming" >
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Products.php">Products</a></li>
            <li><a class="active" href="Login.php">Login</a></li>
        </ul>
    </nav>

    <div class="center-login-reg">
        <h1>Welcome Back! <br> Please<span id="login"> Login!</span></h1>
        <form action="includes/Login.inc.php" method="post">
            <div class="txt_field">
                <input type="text" name="email">
                <span></span>
                <label><i class="fa-solid fa-user"></i> Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pwd">
                <span></span>
                <label><i class="fa-solid fa-key"></i> Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" name="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="Register.php">Signup</a>
            </div>
        </form>
        
        <!-- PHP code that display error messages where needed -->
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<center><h4 style='color: #0b4f6c; font-size: 16px;'> Please fill in all the fields </h4></center>";
            }
            else if ($_GET["error"] == "wronglogin") {
                echo "<center><h4 style='color: #0b4f6c; font-size: 16px;'> Email and Password does not match </h4></center>";
            }
        }
        ?>
    </div>


    <section class="footer">
        <div class="social">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>

        <p class="copyright"> <i class="fa-solid fa-copyright"></i> COPYRIGHT MEGAGAMING. ALL RIGHTS RESERVED.<br>CREATED BY HENRI LOUW</p>

    </section>

</body>
</html>