<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop USC | Seller Login</title>
    <link rel="icon" type="image/png" href="/assets/imgs/USC-7 Background Removed.png">
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
                        <h1 class="text-center" style="color: #19B053; font-family:Merriweather, sans-serif; font-size: 50px; font-weight:bold; padding-top:2em; margin-top:-20px; margin-bottom: 50px;">Seller Login</h1>
                        <form class="needs-validation" id="sellerLogin" action="<?= base_url('auth/loginSeller') ?>" method="post" novalidate>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                <input type="email" class="form-control" id="seller-email" name="seller-email" placeholder="enter email address" 
                                    style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                    <div class="invalid-feedback">invalid email</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                <input type="password" class="form-control" id="password" name="password" placeholder="enter password" 
                                        style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" required>
                                        <div class="invalid-feedback">invalid password</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <button type="submit" class="btn-primary buyer_signup_btn">Login</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center mb-3">
                            <p>Not yet a member? <a href="<?= base_url('seller_signup') ?>" style="color: rgb(253, 218, 70); font-weight:bold;" >Sign Up</a><p>
                        </div>
                    </div>
                </div>
            
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            // Disable form submission if there are invalid fields
            (() => {
                'use strict'
                const forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission if invalid
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        // Add Bootstrap's validation feedback style
                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>
    </body>
</html>
