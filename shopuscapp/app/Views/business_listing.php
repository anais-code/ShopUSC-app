<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/assets/imgs/USC-7 Background Removed.png">
        <title>Shop USC | Business Listing</title>
        <link rel="stylesheet" href="/assets/styles/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body style="background-color: #F5F5F5;">
        <nav class="navbar" style="background-image: linear-gradient(to right, rgba(118,218,72) ,rgba(199,228,185)); color:#071013;">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('homepage'); ?>">
                    <img src="<?= base_url('assets/imgs/USC-7-removebg-preview.png'); ?>" alt="Shop USC logo" class="logo" style=" top: 1em; left: 1em; height: 3em; z-index: 3;">
                </a>
                <form class="d-flex mx-auto" action="<?= base_url('business_listing') ?>" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
                <div class="navbar-nav text-center">
                    <a class="nav-link" href="#"><img src="assets/imgs/user.png" alt="User Icon" class="user-icon" style="height: 2em;"></a>
                    <span class="navbar-text" style="margin-left: 0.5em;">Welcome <?= esc($firstName); ?></span>
                </div>
            </div>
        </nav> 
        
        <div class="container-sm">
            <div class="row">
                <div class="col-8">
                    <div class="mb-2" style="padding-top: 2em; border-bottom: .08em solid #fff5f6;">
                        <div style="display: flex; justify-content: left; align-items: left;">
                            <a href="<?= base_url('buyer_transactions') ?>">
                            <img src="assets/imgs/Transactions logo-2 Background Removed.png" alt="view transactions img" style="height: 4.5em; margin-left: -2em; margin-right: 1.5em;">
                            </a>
                            <h1 style="color: #19B053; font-family: Merriweather, sans-serif; font-size: 40px; font-weight:bold; margin-top:0.2em;">Featured</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- carousel-->
            <div class="row">
                <?php foreach ($businesses as $business): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="<?= esc(base_url($business['CoverPhoto'] ?? 'assets/imgs/Business Img.jpg')) ?>" class="card-img-top" alt="Cover Photo" style="width: 100%; height: 150px; object-fit: cover;">
                            <div class="card-body" style="border: 1.5px solid #f3e76e;">
                            <h5 class="card-title"><?= esc($business['BusinessName']) ?></h5>
                            <p class="card-text" style="color: #444054">Category: <?= esc($business['BusinessCategory']) ?></p>
                            <div>
                                <span class="btn btn-light" style="pointer-events: none; border-color: rgba(199,228,185); border-radius: 60px; font-family: Playfair Display, serif; font-size: 10px; color: #071013;">
                                <?= esc($business['BusinessType']) ?>
                                </span>
                            </div>
                            <div style="padding-top:10px;">
                                <span class="buyer_signup_btn" style="border-color: border-radius: 60px; font-family: Playfair Display, serif; font-size: 10px; color: #071013; padding: 5px 10px;">
                                <a href="<?= isset($business['AdID']) ? base_url('buyer/viewBusinessDetails/' . $business['AdID']) : '#' ?>" style="color: #071013; text-decoration: none;">View Business</a>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!--end of carousel-->
        </div>
        
        <footer class="text-center mt-4" style="background-image: linear-gradient(to right, rgba(118,218,72) ,rgba(199,228,185));">
            <p>&copy; 2024 Shop USC</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="/assets/scripts/script.js"></script>
    </body>
</html>
