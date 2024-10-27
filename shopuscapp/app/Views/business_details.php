<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop USC | Order Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body style="background-color: #F5F5F5;">
    <nav class="navbar" style="background-color: #23C065;">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('homepage'); ?>">
                <img src="<?= base_url('assets/imgs/USC-7-removebg-preview.png'); ?>" alt="Shop USC logo" class="logo" style="height: 3em;">
            </a>
            <div class="d-flex justify-content-end align-items-center w-100">
                <div class="d-flex align-items-center me-3">
                    <a class="nav-link" href="#">
                        <img src="assets/imgs/user.png" alt="User Icon" class="user-icon" style="height: 2em;">
                    </a>
                    <span class="navbar-text" style="margin-left: 0.5em;">Welcome <?= esc($firstName); ?></span>
                </div>
                <a href="/business_listings.php" class="btn-close" aria-label="close"></a>
            </div>
        </div>
    </nav>

    <div class="container mt-4 border rounded p-4 bg-light">
        <div class="row">
            <div class="col-md-8">
                <h1 id="businessName" class="mb-3 fw-bold">Business Name</h1>
                <p id="businessDescription" class="text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>
                    Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>

                <div id="staticCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="image1.jpg" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="image2.jpg" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="image3.jpg" class="d-block w-100" alt="Image 3">
                        </div>
                        <div class="carousel-item">
                            <img src="image4.jpg" class="d-block w-100" alt="Image 4">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#staticCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#staticCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <h5 class="mt-3">
                    <?= $businessType === 'retail' ? 'Products' : 'Services'; ?>
                </h5>
                <ul id="productServiceList" class="list-unstyled">
                    <li class="text-muted">Product/Service 1</li>
                    <li class="text-muted">Product/Service 2</li>
                    <li class="text-muted">Product/Service 3</li>
                    <li class="text-muted">Product/Service 4</li>
                    <li class="text-muted">Product/Service 5</li>
                    <li class="text-muted">Product/Service 6</li>
                    <li class="text-muted">Product/Service 7</li>
                    <li class="text-muted">Product/Service 8</li>
                    <li class="text-muted">Product/Service 9</li>
                    <li class="text-muted">Product/Service 10</li>
                </ul>

                <h5>Availability</h5>
                <p id="availability" class="text-muted">Available: Monday - Friday, 9 AM - 5 PM</p>
            </div>

            <div class="col-md-4">
                <div class="border rounded p-3 bg-white">
                    <h1 class="h3">Order/Book</h1>
                    <p><?= $businessType === 'retail' ? 'Select your items and place your order.' : 'Select your service and book an appointment.'; ?></p>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="order-description" name="order-description" placeholder="enter order here (500 characters max.)" 
                                style="background-color: #F5F5F5; color: #444054; border-color: #19B053; font-family: Playfair Display, serif;" maxlength="500" required oninput="updateCharCount()"></textarea>
                            <div class="invalid-feedback">please enter order details</div>
                            <small id="char-count">500 characters remaining</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="datePicker">Select Date</label>
                        <input type="date" class="form-control" id="datePicker" placeholder="Select Date">
                    </div>
                    <div class="mb-3">
                        <label for="timePicker">Select Time</label>
                        <select class="form-control" id="timePicker" placeholder="Select Time">
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
                        </select>
                    </div>
                    <button class="btn buyer_signup_btn" style="background-color: #19B053; color: white;">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
