<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buyer Login - Shop USC</title>
        <link rel="icon" type="image/png" href="/assets/imgs/USC-7 Background Removed.png">
        <link rel="stylesheet" href="/assets/styles/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
        <header>
            <img src="<?= base_url('assets/imgs/USC-7-removebg-preview.png'); ?>" alt="WeFit logo" style="position: fixed; top: 1em; left: 1em; height: 3em;">
        </header>
        <div class= "login-container">
            <h2>Buyer Login</h2>
            <form action="/process_buyer_login" method="POST">
                <label for="email">Email</label>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
                
                <input type="submit" value="Login">
                </form>
        <p>Don't have an Account? <a href="buyer_signup.php" class="signup-link">Sign Up</a></p>
    </div>

    <footer>
        <p>And a footer of course</p>
    </footer>
</body>
</html>
