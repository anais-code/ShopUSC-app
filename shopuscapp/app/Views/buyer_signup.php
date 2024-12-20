<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/assets/imgs/USC-7 Background Removed.png">
        <title>Shop USC | Buyer Sign Up</title>
        <link rel="stylesheet" href="/assets/styles/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body style="background-color: #F5F5F5;">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('homepage'); ?>">
                  <img src="<?= base_url('assets/imgs/USC-7-removebg-preview.png'); ?>" alt="Shop USC logo" class="logo" style=" position:fixed; top: 1em; left: 1em; height: 3em; z-index: 3;">
                </a>
            </div>
          </nav>

        <div class="container-sm d-flex align-items-center justify-content-center">
            
                <div class="col-md-5 col-8">
                    <div style="display:block;">
                        <h1 class="text-center" style="color: #19B053; font-family:Merriweather, sans-serif; font-size: 50px; font-weight:bold; padding-top:2em; margin-top:-20px; margin-bottom: 50px;">Buyer Sign Up</h1>
                        <form class="needs-validation" id="buyerSignup" novalidate action="<?= site_url('auth/registerBuyer') ?>" method="post">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="first-name" name="first-name" placeholder="first name" 
                                    style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                    <div class="invalid-feedback">please enter first name</div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="last-name" name="last-name" placeholder="last name" 
                                    style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                    <div class="invalid-feedback">please enter last name</div>
                                </div>
                            </div>

                            <!--row for email and phone-->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="email" class="form-control" id="buyer-email" name="buyer-email" placeholder="enter email address" 
                                    style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                    <div class="invalid-feedback">please enter valid email address</div>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" id="phone-number" name="phone-number" placeholder="phone number" 
                                    style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                    <div class="invalid-feedback">please enter valid phone number e.g. 1868xxxxxxx</div>
                                </div>
                            </div>

                            <!--rows for password-->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="password (8-20 characters, 1 uppercase, 1 digit, 1 symbol)" 
                                           style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                           <div class="invalid-feedback">Password must be 8-20 characters, with at least one uppercase, one digit, and one symbol</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="confirm password" 
                                           style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                           <div class="invalid-feedback">Passwords must match</div>
                                </div>
                            </div>
                            

                            <div class="d-flex justify-content-center mb-3">
                                <button type="submit" class="btn-primary buyer_signup_btn">Sign Up</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center mb-3">
                            <p>Already a member? <a href="<?= base_url('buyer_login') ?>" style="color: rgb(253, 218, 70); font-weight:bold;" >Login</a><p>
                        </div>
                    </div>
                </div>
            
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="/assets/scripts/script.js"></script>
    </body>
</html>