<!-- HENRI LOUW ZDV351JB3
This file has all the HTML for the Payment Page aswell as some php
to validate payment fields -->



<!-- 
The php code below are to validate the users card information 
to make sure its valid -->
<?php
include_once 'includes/dbh.inc.php';
session_start();
$_SESSION["error_count"] = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $cardnumber = $_POST["creditcard"]; 
    $cardname = $_POST["cardname"]; 
    $expmonth = $_POST["expmonth"]; 
    $expyear = $_POST["expyear"]; 
    $cvc = $_POST["cvc"]; 

    $error_count = 0;
    
    if (!preg_match("^[0-9]{16}$^", $cardnumber)) {
        $carderror = "Card Number is invalid";
        $error_count += 1;
        $_SESSION["error_count"] = $error_count;
        
    } 


    if (!preg_match("/(?:(?:19|20)[0-9]{2})/", $expyear)) {
        $yearerror = "Experation year is invalid";
        $error_count += 1;
        $_SESSION["error_count"] = $error_count;
    }

    if (!preg_match("/[0-9]{3}/", $cvc)) {
        $cvcerror = "CVC is invalid";
        $error_count += 1;
        $_SESSION["error_count"] = $error_count;
    }

    function Redirect() {
        header("Location: ../megagaming/index.php");
    }

    if ($_SESSION["error_count"] == 0){
        echo "<script>
        alert('Thanks for ordering');
        window.location.href='../megagaming/index.php';
        </script>";
    }
}

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
            <li class="cart"><a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i><span><?php echo " " . (isset($_SESSION['shopping_cart']) ? count($_SESSION['shopping_cart']) : 0);?></span></a></li>
            <?php
                if (!isset($_SESSION["useruid"])) {
                   echo " <li><a href='Login.php'>Login</a></li>";
                } else {
                    echo " <li><a href='Login.php'><i class='fa-solid fa-arrow-right-from-bracket'></i></a></li>";
                }
            ?>
        </ul>
    </nav>

<div class="center-login-reg">
    <h1 class="payment-title">payment information</h1>
    <center><form action="payment.php" method="POST">

        

        <div class="inputpayment">
            <img class="cards" src="Resources/cards.png" alt="">
        </div>
        <div class="txt_field">
            <input type="text" name="cardname" required>
            <span class="span-error"></span>
            <label><i class="fa-solid fa-user"></i> Name On Card</label>
        </div>
        <div class="txt_field">
            <input type="text" name="creditcard" required>
            <span></span>
            <label><i class="fa-brands fa-cc-visa"></i> Credit Card Number</label>
        </div>
        <div class="txt_field">
            <input type="text" name="expmonth" required>
            <span></span>
            <label><i class="fa-solid fa-calendar-days"></i> Expiration Month</label>
        </div>
        <div class="txt_field">
            <input type="text" name="expyear" required>
            <span></span>
            <label><i class="fa-solid fa-calendar-days"></i> Expiration Year</label>
        </div>
        <div class="txt_field">
            <input type="text" name="cvc" required>
            <span></span>
            <label><i class="fa-solid fa-lock"></i> CVC</label>
        </div>
       
        <input id="payment" type="submit" name="submit" value="Make Payment">
        <center><h4 style='color: #fa6262; font-size: 16px;'><?php echo (isset($carderror) ? $carderror : ''); ?></h4></center>
        <center><h4 style='color: #fa6262; font-size: 16px;'><?php echo (isset($yearerror) ? $yearerror : ''); ?></h4></center>
        <center><h4 style='color: #fa6262; font-size: 16px;'><?php echo (isset($cvcerror) ? $cvcerror : ''); ?></h4></center>

</div>

    </form></center>
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