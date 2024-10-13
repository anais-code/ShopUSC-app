<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Login - Shop USC</title>
    <link rel="icon" type="image/png" href="/assets/imgs/USC-7 Background Removed.png">
    <link rel="stylesheet" href="/assets/styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="body-lsm">
    <header class="header-lsm">
        <a href="<?= base_url('homepage'); ?>"> <!-- Link to homepage -->
            <img src="/assets/imgs/USC-7-removebg-preview.png" alt="Shop USC logo" class="logo" style="position: fixed">
        </a>
    </header>

    <main class="main-lsm">
        <div class="login-container">
            <h2>Seller Login</h2>
            <form action="process_seller_login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="Enter your email">
                
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
                
                <input type="submit" value="Login">
            </form>
            <p>Don't have an Account? <a href="seller_signup.php" class="signup-link">Sign Up</a></p>
        </div>
    </main>

    <footer class="footer-lsm">
        <p>And a footer of course</p>
    </footer>
</body>
</html>
