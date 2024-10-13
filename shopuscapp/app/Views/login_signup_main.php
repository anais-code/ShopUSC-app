<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Shop USC - Sign Up / Log In</title>
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
            <h2>SIGN UP /LOG IN</h2> <!-- Title for the page -->
            <div class= "button-container">
                <a href="<?= base_url('buyer_signup') ?>" class="buyer-btn">Buyer</a>
                <a href="<?= base_url('seller_signup') ?>" class="seller-btn">Seller</a>
</div>
        </main>

        <footer class="footer-lsm">
            <p>And a footer of course</p>
        </footer>
    </body>
</html>