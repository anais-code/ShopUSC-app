<?php
session_start();
include('db_connection.php'); // Include database connection file to access the Buyers table

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the form was submitted)
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email and Password are required.";
        header("Location: buyer_login.php");
        exit();
    }
    
    // Query the database to check credentials
    $query = "SELECT * FROM Buyers WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['id'];
            header("Location: business_listings.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: buyer_login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: buyer_login.php");
        exit();
    }
}
?>
