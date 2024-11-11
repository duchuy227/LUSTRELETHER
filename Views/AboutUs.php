<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/Layout/homepage.css">
    <title>About Us</title>
</head>
    <style>
    .card1 {
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background-color: #fff;
        margin-bottom: 30px;
    }
    .card-header {
        background-color: #fff;
        padding: 0;
        margin-top: 30px;
    }
    .card-header img {
        width: 508px;
        height: 503px;
    }
    .card-body {
        padding: 20px;
        text-align: left;
        margin-top: 20px;
    }
    .badge {
        background-color: #9BAFF7;
        color: #1661F2;
        font-size: 20px;
        width: 167px;
        height: 46px;
        border-radius: 20px;
        padding: 15px 20px;
        font-weight: 700;
    }
    .contact-btn {
        background-color: #5a67d8;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 20px;
        font-size: 19px;
    }
    .contact-btn:hover {
        background-color: #434190;
    }
    .profile-img {
        width: 144px;
        height: 137px;
        border-radius: 50%;
        object-fit: cover;
    }
    .stat-number {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
    }
    
    .divider {
        border: 0;
        border-top: 10px solid #040492;
        background-color: #1661F2;
        border-radius: 20px;
        width: 50%;
        margin: 0 auto 5px auto;
    }
    
    .row {
        display: flex;
        justify-content: space-between; /* Sắp xếp các cột theo thứ tự trái - giữa - phải */
        align-items: center; /* Căn giữa theo chiều dọc */
    }

    .col-4 p {
        font-size: 24px;
        font-weight: 700;
        color: #1661F2;
    }
    </style>
<body>
    <?php include 'Layout/homepage_navbar.php'?>
    
    <div class="container">
        <?php include 'Layout/homepage_header.php'?>
        
        <div class="container mt-5">
            <div class="card1 mx-auto" style="width: 1064px; height: 858px;">
                <div class="row">
                    <div class="col-md-7 d-flex flex-column align-items-center">
                        <div class="card-header">
                            <img src="./views/Img/u270.png"/>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card-body">
                            <span class="badge">
                                LustreLether
                            </span>
                            <h3 class="mt-3" style="font-weight: bold; color: #666; font-size: 30px">
                                Influencer Community
                            </h3>
                            <p style="font-size: 20px; font-weight: 400; color: #00000076">
                                Our influencer community brings together creative minds from diverse backgrounds, fostering a sense of collaboration and mutual growth. Through authentic content and shared experiences, we create meaningful connections that resonate deeply with audiences. This platform allows influencers to not only support one another but also inspire and engage with their followers on a personal level.
                            </p>
                            <button class="contact-btn">CONTACT US</button>
                            <span class="ms-3" style="font-size: 20px; color: #3F3D3D; font-weight: 300">
                                <img src="./views/Img/u275.png" width="30" height="30" style="opacity: 50%; margin-right: 10px"/>
                                0987654321
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4 d-flex flex-column align-items-center">
                        <img class="profile-img" src="./views/Img/u286.png"/>
                        <p class="mt-2">
                            Truong Quoc Bao
                        </p>
                    </div>
                    <div class="col-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-4 d-flex flex-column align-items-center">
                                <p class="stat-number">40</p>
                                <hr class="divider">
                                <p>MC</p>
                            </div>
                            <div class="col-md-4 d-flex flex-column align-items-center">
                                <p class="stat-number">50</p>
                                <hr class="divider">
                                <p>KOL</p>
                            </div>
                            <div class="col-md-4 d-flex flex-column align-items-center">
                                <p class="stat-number">45</p>
                                <hr class="divider">
                                <p>KOC</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4 d-flex flex-column align-items-center">
                        <img class="profile-img" src="./views/Img/u287.png"/>
                        <p class="mt-2">
                            Le Duc Huy
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'Layout/homepage_footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>