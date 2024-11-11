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
    <title>Detail Booking</title>
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
        height: auto; 
        background-color: rgba(255, 255, 255, 1);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
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
    

    .info span {
        font-size: 18px;
        color: #3D67BA;
        font-weight: 600;

    }

    .info p {
        font-size: 18px;
        color: #333333;
    }

    .popup {
        display: none; /* Ẩn popup mặc định */
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 90%;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 10px 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 400px;
        height: 180px;
        border: 1px solid #333;
    }

    .popup-content p {
        font-size: 20px;
        font-weight: 400;
    }

    .delete-btn {
        background-color: #d9534f; /* Màu đỏ cho nút xóa */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
        font-size: 16px;
        font-weight: 300;
    }

    .cancel-btn {
        background-color: #6c757d; /* Màu xám cho nút cancel */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 300;
    }

    .fixed-size-img {
        width: 200px; /* Đặt chiều rộng cố định */
        height: 200px; /* Đặt chiều cao cố định */
        object-fit: cover; /* Giúp ảnh được cắt để vừa với khung */
    }

    .col-md-4 {
        color: #3D67BA;
        font-size: 18px;
        font-weight: 500;
    }

    .col-md-8 a{
        font-size: 18px;
        color: #333;
        font-weight: 400;
        text-decoration: none;
        cursor: pointer;
    }

    .col-md-8 p{
        font-size: 18px;
        color: #333;
        font-weight: 400;
        
    }
    

</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>Detail Article</h2>
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
                <div class="container">
                        <div class="row">
                            <div class="projectCardd">
                                <div class="projectTopp">
                                    <h4 class="text-center">Booking Detail</h4>
                                    <br>
                                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6">
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
                                    <label class="label">Influencer</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content"><?php echo $booking['Influ_Nickname'] ?></label>
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

                            <div class="row mt-5">
                                <div class="col-md-6" style="width: 40%">
                                    <label class="label">Note</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content"><?php echo $booking['Booking_Note'] ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <a href="index.php?action=customer_bookinglist">
                                <button type="button" class="btn btn-success">Booking List</button>
                            </a>
                        </div>
                    </div>
                                    <div class="d-flex justify-content-center mt-4">
                                        <a href="index.php?action=influencer_article">
                                            <button type="button" class="btn btn-success">List Article</button>
                                        </a>
                                    </div>
                                </div>
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