<?php
$servername = "localhost"; // Your server name or IP
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "uas_pbd"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch products from the database
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_id = $row["product_id"];
        $product_name = $row["product_name"];
        $price = $row["price"];
        $image = $row["product_image"]; 


        echo '<div class="col-4">';
        echo '<a href="showProductDetails.php?product_id=' . $product_id . '">';
        echo '<img src="'.$image.'"></a>';
        echo '<h4>' . $product_name . '</h4>';
        echo '<p>$' . $price . '.00</p>';
        echo '</div>';
    }
} else {
    echo "No products found.";
}

// Close database connection
$conn->close();
?>

