<?php 

    $products = array(
        array("id"=> 1, "name"=> "Polo Shirt","price"=> 25),
        array("id"=> 2, "name"=> "Jeans","price"=> 50),
        array("id"=> 3, "name"=> "Sneakers", "price"=> 40)
    );

    if (!isset($_SESSION["cart"])) {
        $_SESSION['cart'] = array();
    }

    function addToCart($productID) {
        global $products;

        foreach ($products as $product) {
            if ($product['id'] == $productID) {
                $_SESSION['cart'][] = $product;
                echo "Item " . $product['name'] . " added to Cart!" . "<br>";
                return;
            }
        }

        echo "The product does not exist";
    }

    function viewCart() {
        if (empty($_SESSION['cart'])) {
            echo 'The cart is empty.';
        } else {
            echo '<h2>Your cart has:</h2>';
            $totalPrice = 0;

            foreach ($_SESSION['cart'] as $item) {
                echo $item['name'] . " - $" . $item["price"] . "<br>";
                $totalPrice += $item["price"];
            }

            echo "<strong>Total amount is: $" . $totalPrice . "</strong>";
       }
    }

    addToCart(1);
    addToCart(2);
    addToCart(1);
    viewCart();
?>