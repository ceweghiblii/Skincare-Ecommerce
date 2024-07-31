<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uas_pbd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);
    
    $sql = "SELECT product_image, product_name, price, product_description, category_name FROM product JOIN category ON category.category_id = product.category_id WHERE product_id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image = $row["product_image"]; 
        $product_name = $row["product_name"];
        $price = $row["price"];
        $product_description = $row["product_description"];
        $category = $row["category_name"];

        // Display product details
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$product_name | RedStore</title>
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

            <!-- Product Details -->
            <div class="small-container single-product">
                <div class="row">
                    <div class="col-2">
                        <img src="$image" width="100%" id="ProductImg">
                    </div>
                    <div class="col-2">
                        <p>Home / $category</p>
                        <h1>$product_name</h1>
                        <h4>$price.00</h4>
                        <form method="post" action="cart.php?action=add&product_id=$product_id">
                            <button type="submit" class="btn">Buy</button>
                        </form>
                        <h3>Product Details</h3>
                        <br>
                        <p>$product_description</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-col-2">
                            <img src="images/logo-white.png">
                            <p>Our Purpose Is To Make a Bare and Beauty Skin.</p> 
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
                        MenuItems.style.maxHeight = "200px"
                    }
                    else {
                        MenuItems.style.maxHeight = "0px"
                    }
                }
            </script>

        </body>
        </html>
        HTML;
    } else {
        echo "Product not found.";
    }

    $stmt->close();
} else {
    echo "No product selected.";
}

$conn->close();
?>
