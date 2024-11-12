<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/Admin/style.css">
    <title>Booking Detail</title>
</head>
<style>
    *{
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }
    aside .top .logo h2 {
        font-weight: 600;
        margin-top: 5px;
    }

    .container1  {
        display: grid;
        width: 96%;
        gap: 1.8rem;
        grid-template-columns: 14rem auto 16rem;
        margin: 0 auto;
    }

    main .recent_order{
        margin-top: 2rem;
        background: var(--clr-white);
        width: 970px;
        height: auto;
        border-radius: 20px;
    }

    aside .sidebar{
        background: var(--clr-white);
        display: flex;
        flex-direction: column;
        height: 646px;
        position: relative;
        top: 1rem;
    }

    aside .sidebar a {
        text-decoration: none;
    }

    aside .sidebar a h3 {
        margin-top: 10px;
    }

    .profile-photo img {
        width: 56px;
        height: 56px;
    }

    .info span {
        font-size: 18px;
        color: #3D67BA;
        font-weight: 600;

    }

    .info p {
        font-size: 18px;
        color: #333333;
    }

    

    .btn-success {
        margin-left: 20px;
        margin-top: 10px;
        justify-content: space-between;
        align-items: center;
        width: 140px;
        border-radius: 25px;
        border: none;
        font-size: 18px;
        height: 40px;
    }

    main .recent_order a{
        text-align: center;
        display: block;
        margin: 0;
        text-decoration: none;
        color: #fff;
    }

    

    


</style>
<body>
    <div class="container1">
        <?php include 'admin_sidebar.php' ?>

        <main>
            <div class="row align-items-center">

                <div class="col-md-9 d-flex align-items-center">
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333">Booking Detail</h2>
                </div>

                <div class="col-md-3 d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="info me-3" style=" margin-right: 30px">
                            <small class="text-muted" style="font-size: 15px; font-weight: 300; color: #333333;">
                                <?php foreach ($admins as $admin): ?>
                                    <p class="mb-0"><?php echo $admin['Ad_Username']; ?></p>
                                <?php endforeach; ?>
                            </small>
                        </div>

                        <div class="profile-photo">
                            <?php foreach ($admins as $admin): ?>
                                <img style="object-fit: cover; border-radius: 50%;" src="<?php echo $admin['Ad_Image']; ?>" width="90" height="90"/>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent_order">
                <div class="profile">
                    <br>
                    <h3 style="text-align: center;">Booking Detail</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 40%>
                                    <label class="label">Date Time</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content"><?php echo $booking['Booking_CreateTime'] ?></label>
                                </div>
                            </div>
                            <div class="row mt-5">    
                                <div class="col-md-6">
                                    <label class="label">Start Date</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content"><?php echo $booking['Booking_StartDate'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">    
                                <div class="col-md-6">
                                    <label class="label">End Date</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content"><?php echo $booking['Booking_EndDate'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">    
                                <div class="col-md-6">
                                    <label class="label">Total Days</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php 
                                            $totalDays = $booking['Booking_TotalDay']; 
                                            echo number_format($totalDays) . ($totalDays == 1 ? ' day' : ' days');
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-5">    
                                <div class="col-md-6">
                                    <label class="label">Expense</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content"><?php echo $booking['Booking_Expense'] ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 40%">
                                    <label class="label">Service</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content"><?php echo $booking['Booking_Content'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6" style="width: 40%">
                                    <label class="label">Customer</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content"><?php echo $booking['Cus_Fullname'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6" style="width: 40%">
                                    <label class="label">Topic</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content"><?php echo $booking['Topic_Name'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6" style="width: 40%">
                                    <label class="label">Status</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content"><?php echo $booking['Booking_Status'] ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="index.php?action=influencer_booking">
                            <button type="button" class="btn btn-success">List Bookings</button>
                        </a>
                    </div>
                    <br>
                </div>
            </div>
        </main>
    </div>

    <script>
        const  sideMenu = document.querySelector('aside');
        const menuBtn = document.querySelector('#menu_bar');
        const closeBtn = document.querySelector('#close_btn');

        const themeToggler = document.querySelector('.theme-toggler');

        menuBtn.addEventListener('click',()=>{
            sideMenu.style.display = "block"
        })
        closeBtn.addEventListener('click',()=>{
            sideMenu.style.display = "none"
        })

        themeToggler.addEventListener('click',()=>{
            document.body.classList.toggle('dark-theme-variables')
            themeToggler.querySelector('span:nth-child(1').classList.toggle('active')
            themeToggler.querySelector('span:nth-child(2').classList.toggle('active')
        })
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>