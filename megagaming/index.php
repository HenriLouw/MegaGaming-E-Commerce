<!-- HENRI LOUW ZDV351JB3
This file has all the HTML for the Home page/Index page aswell -->
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
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="Products.php">Products</a></li>
            <?php
                if (!isset($_SESSION["useruid"])) {
                   echo " <li><a href='Login.php'>Login</a></li>";
                } else {
                    echo " <li><a href='Login.php'><i class='fa-solid fa-arrow-right-from-bracket'></i></a></li>";
                }
            ?>
            
        </ul>
    </nav>

    <div class="flex-container">
        <div class="1-gif">
            <img class="gif" src="Resources/Logo.gif" alt="Gif" style=width:100%>
        </div>
        <div class="2-logo-text">
            <img class="Logo-text" src="Resources/logotext.png" alt="Logo Text" style=width:100%>
        </div>
    </div> 
    
    <img class="Products-three" src="Resources/Products.png" alt="Products">

    <div class="container">
        <div class="center">
            <a href="Products.php" class="shop-button">Shop Now!</a>
        </div>
    </div>

    <section class="footer">
        <div class="social">
            <a href="www.instagram.com"><i class="fab fa-instagram"></i></a>
            <a href="www.facebook.com"><i class="fab fa-facebook"></i></a>
            <a href="www.twitter.com"><i class="fab fa-twitter"></i></a>
        </div>

        <p class="copyright"> <i class="fa-solid fa-copyright"></i> COPYRIGHT MEGAGAMING. ALL RIGHTS RESERVED.<br>CREATED BY HENRI LOUW</p>
    </section>
</body>
</html>
