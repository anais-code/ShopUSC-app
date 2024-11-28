<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop USC | Seller Transactions</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="/assets/styles/styles.css">
    </head>
    <body style="background-color: #F5F5F5;">
        <nav class="navbar" style="background-image: linear-gradient(to right, rgba(118,218,72) ,rgba(199,228,185)); color:#071013;">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('homepage'); ?>">
                    <img src="<?= base_url('assets/imgs/USC-7-removebg-preview.png'); ?>" alt="Shop USC logo" class="logo" style=" top: 1em; left: 1em; height: 3em; z-index: 3;">
                </a>
                <div class="navbar-nav text-center">
                    <a class="nav-link" href="#"><img src="/assets/imgs/user.png" alt="User Icon" class="user-icon" style="height: 2em;"></a>
                </div>
            </div>
        </nav>
        
        <div class="container my-4">
        <div class="header-container d-flex align-items-center mb-4">
        <a href="<?= base_url('seller_dashboard'); ?>">
                    <img src="<?= base_url('assets/imgs/business_listing_icon.png'); ?>" alt="Business Listing Icon" class="icon" style="height: 3em; margin-left: 0.5em; margin-right: 1.5em;">
                </a>
                <h1 style="color: #19B053; font-family: Merriweather, sans-serif; font-size: 40px; font-weight:bold; margin-top:0.2em;">Transaction Dashboard</h1>
        </div>

        <h2 style="color: #071013; font-family: Merriweather, sans-serif; font-size: 20px; font-weight:bold; margin-top:0.2em;">Upcoming Transactions</h2>
        
        <hr class="section-divider">
        <!--<div class="row">-->
        <?php foreach ($upcomingSellerTransactions as $transaction): ?>
            <!-- start of change-->
            <div class="col-md-8">
            <div class="card p-3 border border-success rounded mb-3">
            <div class="card-body">
                <h4 class="card-title" style="font-family: Playfair Display; font-weight: bold; color: #ffda48;"><?= esc($transaction['transaction']); ?></h4>
                <p class="card-text"><?= esc($transaction['buyerFirstName']); ?> <?= esc($transaction['buyerLastName']); ?></p>
                <p class="card-text">
                    <i class="far fa-calendar-alt" style="margin-right: 5px; color: #19B053;"></i>
                    <?= esc($transaction['chosenDate']); ?>
                </p>
                <p class="card-text">
                    <i class="far fa-clock" style="margin-right: 5px; color: #19B053;"></i>
                    <?= esc($transaction['chosenTime']); ?>
                </p>
                <p class="card-text">
                    <i class="fas fa-phone-alt" style="margin-right: 5px; color: #19B053;"></i>
                    <?= esc($transaction['contact']); ?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
            <!--end of change-->
           
        </div>
        <hr class="section-divider">
        <h2 style="color: #071013; font-family: Merriweather, sans-serif; font-size: 20px; font-weight:bold; margin-top:0.2em;">Past Transactions</h2>
        <hr class="section-divider">
        <!--<div class="row">-->
            <!-- start of change-->
            <!--end of change-->
            <?php foreach ($pastSellerTransactions as $transaction): ?>
            <!-- start of change-->
            <div class="col-md-8">
            <div class="card p-3 border border-danger rounded mb-3">
            <div class="card-body">
                <h4 class="card-title" style="font-family: Playfair Display; font-weight: bold; color: #ffda48;"><?= esc($transaction['transaction']); ?></h4>
                <p class="card-text"><?= esc($transaction['buyerFirstName']); ?> <?= esc($transaction['buyerLastName']); ?></p>
                <p class="card-text">
                    <i class="far fa-calendar-alt" style="margin-right: 5px; color: #19B053;"></i>
                    <?= esc($transaction['chosenDate']); ?>
                </p>
                <p class="card-text">
                    <i class="far fa-clock" style="margin-right: 5px; color: #19B053;"></i>
                    <?= esc($transaction['chosenTime']); ?>
                </p>
                <p class="card-text">
                    <i class="fas fa-phone-alt" style="margin-right: 5px; color: #19B053;"></i>
                    <?= esc($transaction['contact']); ?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
            <!--end of change-->
           
        </div>
        </div>
    </div>
    </div>
        <footer class="text-center mt-4" style="background-image: linear-gradient(to right, rgba(118,218,72), rgba(199,228,185));">
            <p>&copy; 2024 Shop USC</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>