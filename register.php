<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "uas_pbd"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['user_password'], PASSWORD_BCRYPT); //Hashing password 
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO users (username, email, user_password, alamat) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $user, $email, $pass, $alamat);

    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
