<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/Admin/style.css">
    <title>Profile</title>
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
        grid-template-columns: 14rem auto 16rem;
        margin: 0 auto;
    }

    main .recent_order{
        margin-top: 2rem;
        background: var(--clr-white);
        width: 970px;
        height: 558px;
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
        margin-top: 30px;
        width: 168px;
        border-radius: 25px;
        margin-bottom: 30px;
        border: none;
        padding: -30px;
        font-size: 18px;
        margin: 0 auto;
        height: 44px;
    }

    .btn-spacing {
        margin-right: 1px; 
    }

    main .recent_order a{
        text-align: center;
        display: block;
        margin: 0;
        text-decoration: none;
        color: #fff;
    }

    .img-small {
            height: 383px;
            cursor: pointer; 
            image-rendering: -webkit-optimize-contrast;
            object-fit: cover;
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
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333">Admin Profile</h2>
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
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-container p-5">
                                <?php foreach ($admins as $admin): ?>
                                <img class="img-small"  src="<?php echo $admin['Ad_Image']; ?>" width="356" height="383" class="img-fluid"/>
                                <img class="img-fullscreen"  src="<?php echo $admin['Ad_Image']; ?>" width="356" height="383" class="img-fluid"/>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-md-7" style="margin-top: 70px;">
                            <div class="info p-5">
                                <?php foreach ($admins as $admin): ?>
                                <div class="row align-items-center mb-5">
                                    <div class="col-md-6 d-flex justify-content-between">
                                        <span>Username</span>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0"><?php echo $admin['Ad_Username'] ; ?></p>
                                    </div>
                                </div>
                                
                                <!-- <div class="row align-items-center mb-5">
                                    <div class="col-md-6 d-flex justify-content-between">
                                        <span>Password</span>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0"><?php echo $admin['Ad_Password'] ; ?></p>
                                    </div>
                                </div> -->

                                <div class="row align-items-center mb-5">
                                    <div class="col-md-6 d-flex justify-content-between">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0"><?php echo $admin['Ad_Email'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-5">
                                    <div class="col-md-6 d-flex justify-content-between">
                                        <span>Fullname</span>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0"><?php echo $admin['Ad_Fullname'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-6 d-flex justify-content-between">
                                        <span class="me-3">Date of Birth</span>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0"><?php echo $admin['Ad_DOB'] ; ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button" style="margin-bottom: 30px;">
                    <div class="row">
                        <button class="btn btn-success btn-spacing"><a href="index.php?action=admin_dashboard">Dashboard</a></button>
                        <button class="btn btn-success"><a href="index.php?action=admin_editprofile&id=<?php echo $admin['Ad_ID']; ?>">Edit Profile</a></button>
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