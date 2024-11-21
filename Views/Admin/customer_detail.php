<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./views/Admin/style.css?v=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Customer Detail</title>
</head>
<style>
    aside .top .logo h2 {
        font-weight: 600;
        margin-top: 5px;
    }

    .container1  {
        display: grid;
        width: 96%;
        gap: 1.8rem;
        grid-template-columns: 250px auto;
        margin: 0 auto;
    }

    main .recent_order {
        margin-top: 2rem;
        background: var(--clr-white);
        width: 100%; /* Tăng kích thước thành toàn chiều ngang */
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
        justify-content: space-between;
        align-items: center;
        width: 240px;
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

    .profile .col-md-4 {
        margin-top: 20px;
    }

    .profile .form-row .col-md-6 {
        margin-top: 20px;
    }

    .profile .form-group {
        margin-bottom: 15px; /* Khoảng cách giữa các trường */
        padding: 0 30px; /* Đẩy lùi vào trong bằng cách thêm padding */
        flex: 1; /* Đảm bảo chúng có chiều rộng tương đương nhau */
    }

    .profile .form-group label {
        font-size: 18px;
        color: #3D67BA;
        font-weight: 500;
    }

    .form-row h5{
        font-size: 18px;
        color: #3D67BA;
        font-weight: 500;
        margin-left: 30px;
        
        margin-top: 20px;
    }

    .form-row .mb-3 .form-check {
        margin-left: 30px;
        
    }

    .img-small {
            height: 356px;
            cursor: pointer; 
            image-rendering: -webkit-optimize-contrast;
            object-fit: contain;
            border-radius: 20px;
        }

        /* CSS để hiển thị ảnh phóng to */
        .img-fullscreen {
            width: 100%;
            height: 100%;
            object-fit: contain; 
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.9);
            cursor: pointer;
            display: none; /* Ẩn ảnh full màn hình ban đầu */
            image-rendering: -webkit-optimize-contrast;
        }


</style>
<body>
    <div class="container1">
        <?php include 'admin_sidebar.php' ?>

        <main>
            <div class="row align-items-center">

                <div class="col-md-9 d-flex align-items-center">
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333"> Customer Detail</h2>
                </div>

                <div class="col-md-3 d-flex align-items-center justify-content-end">
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
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-container p-5 mt-4">
                                <img class="img-small"  src="<?php echo $customers['Cus_Image']; ?>" width="356" class="img-fluid"/>
                                <img class="img-fullscreen"  src="<?php echo $customers['Cus_Image']; ?>">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="info p-5">
                                
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <span>Username</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0"><?php echo $customers['Cus_Username'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0"><?php echo $customers['Cus_Email'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <span>Fullname</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0"><?php echo $customers['Cus_Fullname'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <span class="me-3">Phone Number</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0"><?php echo $customers['Cus_PhoneNumber'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <span class="me-3">Date of Birth</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0"><?php echo $customers['Cus_DOB']; ?></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <span class="me-3">Topic</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0"><?php echo implode(', ', $customers['Topics']); ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <span class="me-3">Event</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0"><?php echo implode(', ', $customers['Events']); ?></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <span class="me-3">Content</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0"><?php echo implode(', ', $customers['Contents']); ?></p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="index.php?action=admin_customer">
                            <button type="button" class="btn btn-success">List Customer</button>
                        </a>
                    </div>
                </div>
                <br>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var fullscreenImage = document.querySelector('.img-fullscreen');

        // Lắng nghe sự kiện click trên ảnh nhỏ
        document.querySelector('.img-small').addEventListener('click', function() {
            // Hiển thị ảnh full màn hình khi nhấp vào ảnh nhỏ
            fullscreenImage.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Ngăn cuộn trang web khi ảnh full màn hình được hiển thị
        });

        // Lắng nghe sự kiện click trên ảnh full màn hình
        fullscreenImage.addEventListener('click', function() {
            // Ẩn ảnh full màn hình khi nhấp vào ảnh đó
            fullscreenImage.style.display = 'none';
            document.body.style.overflow = 'auto'; // Cho phép cuộn trang web trở lại khi ảnh full màn hình bị ẩn
        });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>