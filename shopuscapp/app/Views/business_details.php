<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop USC | Business Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        <!-- new code -->
         <!--general container-->
        <div class="container mt-4 border rounded p-4 bg-light">
            <div style="padding-left: 68em; padding-bottom: 0.5em;">
                <a href="<?= base_url('business_listing'); ?>" class="btn-close" aria-label="close" style="font-size: 25px;"></a>
            </div>
            <div class="row">
                <!--left col for business details-->
                <div class="col-md-7">
                    <h1 id="businessName" class="mb-3 fw-bold" style="text-align: left; color: #19B053"><?= esc($businessDetails['BusinessName']) ?></h1>
                    <p id="businessDescription" class="text-muted"><?= esc($businessDetails['BusinessDescription']) ?></p>
                    
                    <!--carousel for photos - only cover photo used currently-->
                    <div>
                        <div id="staticCarousel" class="carousel slide" data-bs-ride="carousel">
                            <?php if (!empty($businessDetails['CoverPhoto'])): ?>
                            <div class="mb-4">
                                <img src="<?= base_url($businessDetails['CoverPhoto']) ?>" class="d-block w-50" alt="Cover Photo">
                            </div>
                            <?php else: ?>
                                <p class="text-muted">No cover photo available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!--may be missing a div-->
                    <!--end of carousel-->

                    <!--product details-->
                    <?php
                    //decode json string of product details
                        $productDetails = json_decode($businessDetails['ProductDetails'], true);
                    ?>
                    <h5 class="mt-3">
                        <?= $businessDetails['BusinessDescription'] === 'retail' ? 'Services' : 'Products'; ?>
                    </h5>
                    <!--lists each product with associated cost-->
                    <ul>
                        <?php foreach ($productDetails as $product): ?>
                            <li><?= esc($product['detail']) ?> - $<?= esc($product['cost']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <!-- strip availability based on line breaks-->
                    <h5>Availability</h5>
                    <p><?= nl2br(esc(str_replace('<br />', "", $businessDetails['Availability']))) ?></p>
                </div>
                <!--end of left col-->

                <!--start of right col-->
                <div class="col-md-5">
                    <div class="border rounded p-3 bg-white">
                        <h3 style="text-align: center;" >Order/Book</h3>
                        
                        <!-- order form-->
                        <form class="needs-validation" novalidate action="<?= site_url('buyer/postTransaction/' . $businessDetails['AdID']) ?>" method="post">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <textarea type="text" class="form-control" id="business-description" name="transaction" placeholder="Enter order here (500 characters max.)" 
                                        style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" maxlength="500" required oninput="updateCharCount()"></textarea>
                                    <div class="invalid-feedback">Please enter order details</div>
                                    <small id="char-count">500 characters remaining</small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="datePicker">Select Date</label>
                                <input type="date" class="form-control" id="chosen-date" name="chosen-date" placeholder="Select Date" required>
                            </div>
                            <div class="mb-3">
                                <label for="timePicker">Select Time</label>
                                <select class="form-control" id="chosen-time" name="chosen-time" placeholder="Select Time" required>
                                    <option value="" disabled selected>Select Time</option>
                                    <option>9:00 AM</option>
                                    <option>10:00 AM</option>
                                    <option>11:00 AM</option>
                                    <option>12:00 PM</option>
                                    <option>1:00 PM</option>
                                    <option>2:00 PM</option>
                                    <option>3:00 PM</option>
                                    <option>4:00 PM</option>
                                    <option>5:00 PM</option>
                                    <option>6:00 PM</option>
                                </select>

                                </div>
                                    <button type="submit" class="btn-primary buyer_signup_btn">Submit</button>
                            </div>
                        </form>

                        <!--start of buyer review section-->
                        <div class="mt-4">
                            <h3>Reviews</h3>
                            <div>
                                <textarea id="rating-textbox" name="rating-textbox" class="form-control" rows="4" placeholder="Tell us what you think!" style="background-color: #F5F5F5; color: #444054; border-color: #19B053;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-light mt-3" style="border-color: #19B053; border-radius: 50px; font-family: Playfair Display, serif; font-size: 15px; color: #071013;">Submit Review</button>
                            <div>
                                <h5 style="padding-top: 1.5em;">John Doe </h5>
                                <p>sample review</p>
                            </div>
                        </div>
                        <!--end of buyer review section-->
                        
                    </div>
                </div>
                <!-- end of right col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of general container-->
        
        <footer class="text-center mt-4" style="background-image: linear-gradient(to right, rgba(118,218,72), rgba(199,228,185));">
            <p>&copy; 2024 Shop USC</p>
        </footer>

        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
        // Example of form validation using Bootstrap 5 custom validation
        (function () {
            'use strict'

            // Fetch all the forms we want to apply validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission if invalid
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
</script>
    </body>
</html>
