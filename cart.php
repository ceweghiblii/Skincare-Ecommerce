<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uas_pbd";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT product_id, product_name, price, product_image FROM product WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $product = [
            'id' => $row['product_id'],
            'product_name' => $row['product_name'],
            'price' => $row['price'],
            'quantity' => 1,
            'image' => $row['product_image']
        ];

        // Check if the product is already in the cart
        $found = false;
        foreach ($_SESSION['cart'] as &$cart_item) {
            if ($cart_item['id'] == $product_id) {
                $cart_item['quantity']++;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION['cart'][] = $product;
        }
    }

    $stmt->close();
    $conn->close();

    // Redirect to cart page
    header("Location: cart.php");
    exit;
}

// Handle remove from cart
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if ($cart_item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the array
            break;
        }
    }

    // Redirect to cart page
    header("Location: cart.php");
    exit;
}

// Handle other cart actions (e.g., update quantity)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | RedStore</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.html"><img src="images/logo.png" alt="logo" width="125px"></a>
            </div>
            <nav>
            <ul id="MenuItems">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#philosophy">Philosophy</a></li>
                <li><a href="index.php#all-products">Products</a></li>
                <li><a href="account.html">Log Out</a></li>
            </ul>
            </nav>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <!-- Cart items details -->
    <div class="small-container cart-page">
        <form method="post" action="">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Subtotal</th>
                </tr>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $item):
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="<?php echo $item['image']; ?>" alt="product image">
                            <div>
                                <p><?php echo $item['product_name']; ?></p>
                                <small>Price: $<?php echo $item['price']; ?>.00</small>
                                <br>
                                <a href="cart.php?action=remove&product_id=<?php echo $item['id']; ?>">Remove</a>
                            </div>
                        </div>
                    </td>
                    <td>$<?php echo $subtotal; ?>.00</td>
                </tr>
                <?php endforeach; ?>
            </table>
            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>$<?php echo $total; ?>.00</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>$35.00</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>$<?php echo $total + 35; ?>.00</td>
                    </tr>
                </table>
            </div>
            <div class="orderButton">
                <button type="submit" class="btn" id="OrderButton">Buy</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">

                <div class="footer-col-2">
                    <img src="images/logo-white.png">
                    <p>Our Purpose Is To Make a Bare and Beauty Skin.
                    </p>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2024 - Deandra Santoso</p>
        </div>
    </div>


    <!-- JavaScript -->
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
        var orderButton = document.getElementById("OrderButton");
        orderButton.addEventListener("click", function(event) {
            alert("Order berhasil!"); 
        });
    </script>
</body>

</html>
