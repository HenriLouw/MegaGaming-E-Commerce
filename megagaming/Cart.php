<!-- HENRI LOUW ZDV351JB3
This file has all the HTML for the Cart Page aswell as some php
to handle the adding and removing of products to cart -->


<!-- The php code below handles the removal of products from cart by
removing them from the session -->
<?php
    session_start();

        if(isset($_GET["action"]))
        {
        if($_GET["action"] == "delete")
        {
            $currentCartObj = 0;
            foreach($_SESSION["shopping_cart"] as $data)
            {
                if($data["item_id"] == $_GET["id"])
                {
                    unset($_SESSION["shopping_cart"][$currentCartObj]);
                }
                $currentCartObj++;
            }
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
            <li class="cart"><a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i><span><?php echo (isset($_SESSION['shopping_cart']) ? count($_SESSION['shopping_cart']) : 0);?></span></a></li>
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
            <img class="gif" src="Resources/Logo.gif"" alt="Gif style="width:100%">
        </div>
        <div class="2-logo-text">
            <img class="Logo-text" src="Resources/logotext.png"" alt="Logo Text style="width:100%">
        </div>
    </div> 

    
    <!-- The code below creates a table where all products in the cart 
    will be displayed -->
    <div class="orders">
    <center><div class="table">
        <table>
            <tr>
                <th colspan="3">Order Details</th>
            </tr>
            <tr>
                <th width="40%">Item name</th>
                <th width="40%">Price</th>
                <th width="10%">Action</th>
            </tr>
            <?php
                if(!empty($_SESSION["shopping_cart"])){
                    $total = 0;
                    foreach($_SESSION["shopping_cart"] as $data) {
            ?>

                    
            <tr>
                <td align="center"><?php echo $data['item_name'] ?></td>
                <td align="center">R <?php echo $data['item_price'] ?></td>
                <td align="center"><a href="cart.php?action=delete&id=<?php echo $data['item_id'] ?>"><span class="remove">Remove</span></a></td>
            </tr>

            <?php
                $total+=$data["item_price"];
            }
            ?>
            <tr>
                <td class="total-bottom" colspan="2" align="right">Total</td>
                <td class="total-bottom" align="center">R <?php echo round($total,2) ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    </center>
</div>

    
    <div class="container">
        <div class="center">
            <a href="payment.php" class="Checkout-button">Checkout</a>
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