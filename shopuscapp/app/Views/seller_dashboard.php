<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/assets/imgs/USC-7 Background Removed.png">
        <title>Shop USC | Seller Dashboard</title>
        <link rel="stylesheet" href="/assets/styles/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body style="background-color: #F5F5F5;">
        <nav class="navbar" style="background-image: linear-gradient(to right, rgba(118,218,72), rgba(199,228,185)); color:#071013;">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('homepage'); ?>">
                    <img src="<?= base_url('assets/imgs/USC-7-removebg-preview.png'); ?>" alt="Shop USC logo" class="logo" style="top: 1em; left: 1em; height: 3em; z-index: 3;">
                </a>
                <!--start of icon drop-->
                <div class="navbar-nav text-center">
                    <div class="dropdown d-flex align-items-center">
                        <a class="nav-link dropdown-toggle p-0" href="#" id="sellerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/imgs/user.png" alt="User Icon" class="user-icon" style="height: 2em;">
                            <span class="navbar-text" style="margin-left: 0.5em;">Welcome <?= esc($firstName); ?></span>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="sellerDropdown" style="background-color: transparent !important; border: none;">
                            <li>
                                <form action="<?= site_url('seller/logout'); ?>" method="post">
                                    <button type="submit" class="btn btn-light" style="border-color: #E36588; border-radius: 50px; font-family: Playfair Display, serif; font-size: 15px; color: #071013;">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end of icon drop-->
            </div>
        </nav>

        <div class="container mt-4">
            <div class="row">
                <div class="col-8">
                    <div class="mb-2" style="padding-top: 2em; border-bottom: .08em solid #fff5f6;">
                        <div style="display: flex; justify-content: left; align-items: left;">
                            <a href="<?= base_url('seller_transactions') ?>">
                                <img src="assets/imgs/Transactions logo-2 Background Removed.png" alt="view transactions img" style="height: 4.5em; margin-left: -1em; margin-right: 1em;">
                            </a>
                            <h1 style="color: #19B053; font-family: Merriweather, sans-serif; font-size: 40px; font-weight:bold; margin-top:0.2em;"><?= esc($businessName); ?> Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section for business deets -->
            <div class="row">
                <div class="col-md-5">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h2><strong>Business Details</strong></h2>
                            <div class="container p-3 border rounded" style="border-radius: 10px; border-color:#f3e76e;">
                                <p><strong>Business Type:</strong> <?= esc($businessType); ?></p>
                                <p><strong>Business Category:</strong> <?= esc($businessCategory); ?></p>
                                <p><strong>Business Description:</strong> <?= esc($businessDescription); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Section to manage products + services -->
                    <div class="row mb-3" style="margin-top: 55px;">
                        <div class="col-12">
                            <h2><strong>Manage Products and Services</strong></h2>
                            <div class="container p-3 border rounded" style="border-radius: 10px; border-color: #f3e76e;">
                                <p><strong>Upcoming Transactions: </strong><?= $numOfUpcomingTransactions ?></p>
                                <p><strong>Completed Transactions: </strong><?= $numOfPastTransactions ?></p>
                                <button type="submit" class="btn btn-light" style="border-color: #E36588; border-radius: 50px; font-family: Playfair Display, serif; font-size: 15px; color: #071013;">Delete Ad</button>
                                <button type="button" class="btn btn-light" style="border-color: #19B053; border-radius: 50px; font-family: Playfair Display, serif; font-size: 15px; color: #071013;" onclick="showUpdateForm()">Update Products</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--start of hidden update form-->
                <div id="update-ad-form-container" style="display:none;">
                    <h4>Update Products/Services</h4>
                    <form id="update-ad-form" method="post" action="<?= base_url('seller/updateProductDetails'); ?>">
                        <!--populate with exisiting ad data--> 
                        <div id="product-rows">
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <input type="text" class="form-control product-details" name="product-details[]" placeholder="Product/Service" 
                                    style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                        <div class="invalid-feedback">Please enter a product or service.</div>
                                </div>
                                <div class="col-md-5">
                                    <input type="number" class="form-control product-cost" name="product-cost[]" placeholder="Cost" 
                                    style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                    <div class="invalid-feedback">Please enter a cost.</div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-light btn-outline" style="border-color:#19B053; background-color: #f5f5f5; color:#19B053;" onclick="addRow()">+</button>
                                </div>
                            </div>      
                        </div>
                        <button type="submit" class="btn buyer_signup_btn" style="border-radius: 50px; color: #071013; font-family: Playfair Display, serif; font-size:18px;">Update Details</button>
                    </form>
                </div>
                <!--end of hidden update form-->

                <!-- Business Ad -->
                <div class="col-md-7">
                    <h2><strong>Business Ad</strong></h2>
                    <div class="container p-3 border rounded" style="border-radius: 10px; border-color:#f3e76e;">
                        <!--case when seller has an ad-->
                        <?php if (is_array($ad)): ?>
                            <h3><strong>Ad Details</strong></h3>
                            <p><strong>Product Details</strong></p>
                            <?php
                            //decode json string of product details
                                $productDetails = json_decode($ad['ProductDetails'], true);
                            ?>
                            <ul>
                                <?php foreach ($productDetails as $product): ?>
                                    <li><?= esc($product['detail']) ?> - $<?= esc($product['cost']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <p><strong>Availability</strong></p>
                                <p><?= nl2br(esc(str_replace('<br />', "", $ad['Availability']))) ?></p>
                            <img src="<?= base_url($ad['CoverPhoto']) ?>" class="d-block w-50" alt="Cover Photo">
                        
                        <!--case for when seller has no ad-->
                        <?php else: ?>
                            <h4 class="text-warning"><?= esc($message ?? 'Post your ad'); ?></h4>
                            <form class="needs-validation" id="businessAdForm" novalidate action="<?= site_url('post_ad') ?>" method="post" enctype="multipart/form-data">
                                <!-- product/service + cost -->
                                <div id="product-rows">
                                    <div class="row mb-3">
                                        <div class="col-md-5">
                                            <input type="text" class="form-control product-details" name="product-details[]" placeholder="Product/Service" 
                                            style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                            <div class="invalid-feedback">Please enter a product or service.</div>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control product-cost" name="product-cost[]" placeholder="Cost" 
                                            style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                            <div class="invalid-feedback">Please enter a cost.</div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-light btn-outline" style="border-color:#19B053; background-color: #f5f5f5; color:#19B053;" onclick="addRow()">+</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- availability -->
                                <div class="row mb-3">
                                    <div class="col-md-10">
                                        <textarea class="form-control" rows="5" id="availability" name="availability" placeholder="Days and Times Available (e.g. Monday: 9am - 6pm)" 
                                        style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required></textarea>
                                        <div class="invalid-feedback">Please enter your availability.</div>
                                    </div>
                                </div>

                                <!-- business cover photo -->
                                <div class="row mb-3">
                                    <div class="col-md-10">
                                        <label for="cover-photo" class="form-label">Upload Business Cover Photo</label>
                                        <input type="file" class="form-control" id="cover-photo" name="cover-photo" 
                                        style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                        <div class="invalid-feedback">Please upload a cover photo for your business.</div>
                                    </div>
                                </div>

                                
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-lg buyer_signup_btn" style="border-radius: 50px; color: #071013; font-family: Playfair Display, serif; font-size:18px;">Post Ad</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-5" style="background-image: linear-gradient(to right, rgba(118,218,72) ,rgba(199,228,185));">
            <p>&copy; 2024 Shop USC</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <!--geniunely don't know why functions only work when added here-->
        <script>
            //limit for num of products/services a seller can add
            var maxRows = 10;

            
            //function to allow seller to add new row for products+costs
            function addRow() {
                const container = document.querySelector('#businessAdForm #product-rows') 
                || document.querySelector('#update-ad-form #product-rows');

                if (!container) return;

                const rows = container.querySelectorAll('.row');

                if (rows.length < maxRows) {
                    const newRow = rows[0].cloneNode(true);

                    //clears inputs in new rows
                    newRow.querySelectorAll('input').forEach(input => input.value = '');

                    //changes button to remove row
                    const removeButton = newRow.querySelector('button');
                    if (removeButton) {
                        removeButton.textContent = '-';
                        removeButton.setAttribute('onclick', 'removeRow(this)');
                    }

                    //adds new row to container
                    container.appendChild(newRow);
                } else {
                    alert('You can only add up to ' + maxRows + ' rows.');
                }
            }

                  
            //function to remove row
            function removeRow(button) {
                $(button).closest('.row').remove();
            }

            //function to show update ad form
             function showUpdateForm(){
                const formContainer = document.getElementById('update-ad-form-container');
                formContainer.style.display = 'block';
            }

        </script>
    </body>
</html>
