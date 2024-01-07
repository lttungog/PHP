<?php 

    session_start();

    $products = array(
        array("id"=> 1, "name"=> "Polo Shirt","price"=> 25),
        array("id"=> 2, "name"=> "Jeans","price"=> 50),
        array("id"=> 3, "name"=> "Sneakers", "price"=> 40)
    );

    if(!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    function addToCart($productID) {
        global $products;

        foreach ($products as $product) {
            if($product["id"] == $productID) {
                $_SESSION["cart"][] = $product;
                echo "Added". $product["name"] ." to cart." . "<br>";
                return;
            }
        }

        echo "The product does not exist.";
    }

    function viewCart() {
        if (empty($_SESSION["cart"])) {
            echo "The cart is empty.";
        } else {
            echo "<h2>Your cart: </h2>";
            $totalPrice = 0;

            foreach ($_SESSION["cart"] as $item) {
                echo $item["name"] . " - $" . $item["price"] ."<br>";
                $totalPrice +=  $item["price"];
            }

            echo "<strong>Total amount: $" . $totalPrice ."</strong>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Shopping Cart</title>
    </head>

    <body>

    <h1>Shopping page PHP</h1>

    <form method="post">
        <label for="productID">Choose products:</label>
        <select name="productID" id="productID">
            <?php foreach ($products as $product): ?>
                <option value="<?php echo $product["id"];?>"> <?php echo $product["name"];?> - $<?php echo $product["price"];?> </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="addToCart">Add to Cart</button>
    </form>

    <?php 
        if (isset($_POST["addToCart"]) && isset($_POST["productID"])) {
            addToCart($_POST["productID"]);
        }

        viewCart();
    ?>

    </body>
</html>