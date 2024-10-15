<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Shop USC | Get Started </title>
        <link rel="icon" type="image/png" href="/assets/imgs/USC-7 Background Removed.png">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/styles/styles.css">
    </head>
    <body style="background-color: #F5F5F5;">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('homepage'); ?>">
                  <img src="<?= base_url('assets/imgs/USC-7-removebg-preview.png'); ?>" alt="Shop USC logo" class="logo" style=" position:fixed; top: 1em; left: 1em; height: 3em; z-index: 3;">
                </a>
            </div>
        </nav>

        <div class="container-fluid">
        <div class="row d-flex">
        <div class="col-md-9 col-8" style="background-color: #F5F5F5;">
            <div class="text-center">
            <h1 style="color: #19B053; display: inline-block; font-family:Merriweather, sans-serif; font-size: 50px; font-weight:bold; margin-top:1em;"> LOGIN </h1>
            <h1 style="display: inline-block; font-family:Merriweather, sans-serif; font-size: 50px; font-weight:bold;"> / </h1>
            <h1 style="color: #f3e76e; display: inline-block; font-family:Merriweather, sans-serif; font-size: 50px; font-weight:bold;"> SIGN UP </h1>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <?= anchor('buyer_login', '<button class="buyer_signup_btn" style="margin-top: 5em; margin-bottom: 5em;">Login as a Buyer</button>', ['class' => 'btn-link']) ?>
                
            </div>

            <div class="d-flex justify-content-center mb-3">
                <?= anchor('seller_login', '<button class="buyer_signup_btn">Login as a Seller</button>', ['class' => 'btn-link']) ?>
            </div>
        </div>
        <div class="col-md-3 col-4" style="background-image: url('/assets/imgs/masked-woman-with-shopping-bags.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh;"></div>
    </div>

    </body>
</html>