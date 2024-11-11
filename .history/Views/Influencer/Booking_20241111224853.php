<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="./views/Influencer/style.css?v=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Booking</title>
</head>
<style>
    body {
        background: #D1DFFF;
    }

    :root {
    --primary-color: #f90a39;
    --text-color: #1d1d1d;
    --bg-color: #f1f1fb;
    }


    .container1 .right main {
        flex: 1; /* Để phần main chiếm hết chiều cao còn lại */
        display: flex;
    }

    .container1 .right main .projectCardd {
        position: relative;
        width: 100%;
        height: 670px; 
        background-color: rgba(255, 255, 255, 1);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
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
        justify-content: space-between;
        align-items: center;
        width: 240px;
        border-radius: 25px;
        border: none;
        font-size: 18px;
        height: 40px;
    }

    

</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>Booking</h2>
                </div>
                <div class="user">
                    <h2><?php echo $influInfo['Influ_Username'] ?></h2>
                    <h2><?php echo $influInfo['InfluType_Name'] ?></h2>
                    <div class="userImg">
                        <img style="border-radius: 50%" src="<?php echo $influInfo['Influ_Image'] ?>" alt="user">
                    </div>
                    <a href="index.php?action=InfluLogout">
                        <img style="opacity: 50%; margin-right: 20px; margin-top:5px" src="./././Image/u27.png" alt="" width="35" height="35">
                    </a>
                    <!-- <div class="arrow">
                        <span class="material-symbols-outlined">
                            expand_more
                        </span>
                    </div> -->
                    <div class="toggle">
                        <span class="material-symbols-outlined">
                            menu
                        </span>
                        <span class="material-symbols-outlined">
                            close
                        </span>
                    </div>
                </div>
            </div>
            <main>
                <div class="projectCardd">
                    <div class="projectTopp">
                        <h4 class="text-center">List of bookings</h4>
                        <br>
                        <div class="table-responsive">
                            <table style="max-width:100%" class="table table-bordered">
                                <thead>
                                    <tr class="table-primary">
                                        <th style="font-size: 16px; font-weight: 400; ">Customer</th>
                                        <th style="font-size: 16px; font-weight: 400; ">Service</th>
                                        <th style="font-size: 16px; font-weight: 400;">Start Date</th>
                                        <th style="font-size: 16px; font-weight: 400;">End Date</th>
                                        <th style="font-size: 16px; font-weight: 400; white-space: nowrap;">Status</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($booking as $b): ?>
                                    <tr>
                                        <td><?php echo $b['Cus_Fullname'] ?></td>
                                        <td><?php echo $b['Booking_Content'] ?></td>
                                        <td><?php echo $b['Booking_StartDate'] ?></td>
                                        <td><?php echo $b['Booking_EndDate'] ?></td>
                                        <td style="font-weight: 500; color: <?php 
                                            if ($b['Booking_Status'] === 'Pending') {
                                                echo '#F79A03';
                                            } elseif ($b['Booking_Status'] === 'Rejected') {
                                                echo '#DB0101'; 
                                            } elseif ($b['Booking_Status'] === 'Approval') {
                                                echo '#6F00B2';
                                            } elseif ($b['Booking_Status'] === 'In Progress') {
                                                echo '#2200B2';
                                            } elseif ($b['Booking_Status'] === 'Completed') {
                                                echo '#069603';
                                            } 
                                        ?>;"><?php echo $b['Booking_Status'] ?></td>
                                        <td style="font-size: 16px; font-weight: 400; text-align: center; width: 100px" scope="row">
                                            <div style="width: 50px;" class="d-inline-flex justify-content-center align-items-center">
                                            <?php if ($b['Booking_Status'] === 'Pending'): ?>
                                                <a href="#">
                                                    <img style="margin-right: 5px;" src="././Views/Img/change.png" width="25" height="25">
                                                </a>
                                                <a href="#">
                                                    <img  src="././Views/Img/u223.png" width="25" height="25">
                                                </a>
                                            <?php elseif ($b['Booking_Status'] === 'Rejected') && : ?>
                                                <a href="#">
                                                    <img  src="././Views/Img/u223.png" width="25" height="25">
                                                </a>
                                            <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php  endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>



    <script>
        let toggle = document.querySelector('.toggle');
        let left = document.querySelector('.left');
        let right = document.querySelector('.right');
        let close = document.querySelector('.close');
        let body = document.querySelector('body');
        let searchBx = document.querySelector('.searchBx');
        let searchOpen = document.querySelector('.searchOpen');
        let searchClose = document.querySelector('.searchClose');
        toggle.addEventListener('click', () => {
            toggle.classList.toggle('active');
            left.classList.toggle('active');
            right.classList.toggle('overlay');
            body.style.overflow = 'hidden';
        });
        close.onclick = () => {
            toggle.classList.remove('active');
            left.classList.remove('active');
            right.classList.remove('overlay');
            body.style.overflow = '';
        };
        searchOpen.onclick = () => {
            searchBx.classList.add('active');
        };
        searchClose.onclick = () => {
            searchBx.classList.remove('active');
        };
        window.onclick = (e) => {
            if (e.target == right) {
                toggle.classList.remove('active');
                left.classList.remove('active');
                right.classList.remove('overlay');
                body.style.overflow = '';
            }
        };
    </script>

    

</body>
</html>