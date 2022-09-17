<!-- HENRI LOUW ZDV351JB3
This file has all the HTML for the Products page aswell as some PHP to display
products from the database  -->

<!-- The code below connects to the database and creates a session variable that stores all 
the products that gets added to the cart -->
<?php
    include_once 'includes/dbh.inc.php';
    session_start();
    if (isset($_GET["add_to_cart"])) {

        if (isset($_SESSION["shopping_cart"])) {
        
            $product_array_id = array_column($_SESSION["shopping_cart"], "item_id");

            if(!in_array($_GET["product_id"], $product_array_id)) {
                $product_array = array(
                    'item_id' => $_GET["product_id"],
                    'item_name' => $_GET["product_name"],
                    'item_price' => $_GET["product_price"]
                );
                $cartArray = $_SESSION["shopping_cart"];
                array_push($cartArray,$product_array);
                $_SESSION["shopping_cart"] = $cartArray;
            } else {
                echo '<script> alert("Item already added") </script>';
            }
        
        } else {
            $product_array = array (
                    array(
                    'item_id' => $_GET["product_id"],
                    'item_name' => $_GET["product_name"],
                    'item_price' => $_GET["product_price"]
                    )
            );
            $_SESSION["shopping_cart"] = $product_array;
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
    <link rel="stylesheet" href="css/productstyle.css">
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
            <li><a class="active" href="Products.php">Products</a></li>
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
    
    <!-- The code below displays all the products that are in the database
    in a form where users can add it to their cart  -->
    <div class="gallery">
    <?php
    
    if ($conn -> connect_error) {
        die("connection failed:" . $conn ->connect_error);
    }

    $sql = "SELECT * FROM products;";
    $result = $conn->query($sql);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }

    while($row = $result->fetch_assoc()) {?>
    <form method="GET" action="Products.php">
        <div class="content">
            <img class="products-grid" src="<?php echo $row["product_img"] ?>" alt="<?php echo $row["product_name"] ?>">
            <h2 class="h2-style1"> <?php echo $row["product_name"] ?></h2>
            <p class="p-products"><?php echo $row["product_description"] ?></p>
            <h5 class="h5-products">R<?php echo $row["product_price"] ?></h5>
            <input type="hidden" name="product_id" value="<?php echo $row["product_id"] ?>">
            <input type="hidden" name="product_name" value="<?php echo $row["product_name"] ?>">
            <input type="hidden" name="product_price" value="<?php echo $row["product_price"] ?>">
            <input type="submit" name="add_to_cart" class="buy" value="Add to Cart">
        </div>
    </form> 
    <?php
    }
    ?>
    </div>
</body>
</html>