<?php
// Database connection details
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "saleconnect_db";

// 1. Create connection
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// 2. Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Process the form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the 'name' attributes in your HTML
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $plainPassword = $_POST['password'];

    // 4. Secure the password (hashing)
    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    // 5. SQL to insert user
    $sql = "INSERT INTO users (full_name, email, password) VALUES ('$fullName', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration Successful!'); window.location.href='auth.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>