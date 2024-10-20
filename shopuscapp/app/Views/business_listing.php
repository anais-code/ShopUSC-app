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
    <nav class="navbar" style="background-color: #23C065;">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('homepage'); ?>">
                <img src="<?= base_url('assets/imgs/USC-7-removebg-preview.png'); ?>" alt="Shop USC logo" class="logo" style=" position:fixed; top: 1em; left: 1em; height: 3em; z-index: 3;">
            </a>
            <form class="d-flex mx-auto">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <div class="navbar-nav text-center">
                <a class="nav-link" href="#"><img src="assets/imgs/user.png" alt="User Icon" class="user-icon" style="height: 2em;"></a>
                <span class="navbar-text" style="margin-left: 0.5em;">Welcome <?= esc($firstName); ?></span>
            </div>
        </div>
    </nav>
    
    <div class="container-sm">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="mb-2" style="padding-top: 2em; border-bottom: .08em solid #fff5f6;">
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <img src="assets/imgs/box.png" alt="Packages Logo" class="package-logo" style="height: 2em; margin-right: 0.5em;">
                        <h1 style="display: inline;">Featured</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="assets/imgs/Business Img.jpg" class="card-img-top" alt="Business Image">
                    <div class="card-body">
                        <h5 class="card-title">Business Name</h5>
                        <p class="card-text">Category: Business Category</p>
                        <p class="card-text">Type: Business Type</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="assets/imgs/Business Img.jpg" class="card-img-top" alt="Business Image">
                    <div class="card-body">
                        <h5 class="card-title">Business Name</h5>
                        <p class="card-text">Category: Business Category</p>
                        <p class="card-text">Type: Business Type</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="assets/imgs/Business Img.jpg" class="card-img-top" alt="Business Image">
                    <div class="card-body">
                        <h5 class="card-title">Business Name</h5>
                        <p class="card-text">Category: Business Category</p>
                        <p class="card-text">Type: Business Type</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="assets/imgs/Business Img.jpg" class="card-img-top" alt="Business Image">
                    <div class="card-body">
                        <h5 class="card-title">Business Name</h5>
                        <p class="card-text">Category: Business Category</p>
                        <p class="card-text">Type: Business Type</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="assets/imgs/Business Img.jpg" class="card-img-top" alt="Business Image">
                    <div class="card-body">
                        <h5 class="card-title">Business Name</h5>
                        <p class="card-text">Category: Business Category</p>
                        <p class="card-text">Type: Business Type</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="assets/imgs/Business Img.jpg" class="card-img-top" alt="Business Image">
                    <div class="card-body">
                        <h5 class="card-title">Business Name</h5>
                        <p class="card-text">Category: Business Category</p>
                        <p class="card-text">Type: Business Type</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="assets/imgs/Business Img.jpg" class="card-img-top" alt="Business Image">
                    <div class="card-body">
                        <h5 class="card-title">Business Name</h5>
                        <p class="card-text">Category: Business Category</p>
                        <p class="card-text">Type: Business Type</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="assets/imgs/Business Img.jpg" class="card-img-top" alt="Business Image">
                    <div class="card-body">
                        <h5 class="card-title">Business Name</h5>
                        <p class="card-text">Category: Business Category</p>
                        <p class="card-text">Type: Business Type</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-4">
        <p>Shop USC</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/assets/scripts/script.js"></script>
</body>
</html>
