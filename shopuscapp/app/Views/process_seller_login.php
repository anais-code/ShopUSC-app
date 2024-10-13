<?php
session_start();
include('database_connection.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch seller from database
    $stmt = $conn->prepare("SELECT * FROM Sellers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Store session data
            $_SESSION['seller_id'] = $row['id'];
            header("Location: seller_dashboard.html"); // Redirect to seller dashboard
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "No account found with that email. Please check your credentials.";
    }
}
?>
