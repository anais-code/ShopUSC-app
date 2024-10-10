<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/assets/imgs/USC-7 Background Removed.png">
        <title>Shop USC</title>
        <link rel="stylesheet" href="/assets/styles/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body class="body-homepage">
        <div class="homepage-background-image">
            <a href="<?= base_url('homepage'); ?>">
            <img src="<?= base_url('assets/imgs/USC-7-removebg-preview.png'); ?>" alt="Shop USC logo" class="logo" style="position: fixed; top: 1em; left: 1em; height: 5em; z-index: 3;">
            </a>
            <div class="homepage-image-overlay"></div>
            <div class="header-content" style="position: relative; z-index: 2; text-align: center;">
                <h1 class="homepage-shop-heading">Shop</h1>
                <h1 class="homepage-USC-heading">USC</h1>
                <?= anchor('login_signup_main', '<button class="get-started-button">GET STARTED</button>', ['class' => 'btn-link']) ?>
            </div>
        </div>
    </body>
</html>

