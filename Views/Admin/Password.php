<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./views/Admin/style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Change Password</title>
</head>
<style>
    aside .top .logo h2 {
        font-weight: 700;
    }

    .container1  {
        display: grid;
        width: 96%;
        gap: 1.8rem;
        grid-template-columns: 250px auto;
        margin: 0 auto;
    }

    main .recent_order{
        margin-top: 2rem;
        background: var(--clr-white);
        width: 100%;
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
        width: 168px;
        border-radius: 30px;
        border: none;
       
        font-size: 18px;
       
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

    .profile .col-md-6 {
        margin-top: 20px;
    }

    .profile .form-group {
        margin-bottom: 15px; /* Khoảng cách giữa các trường */
        padding: 0 30px; /* Đẩy lùi vào trong bằng cách thêm padding */
        flex: 1; /* Đảm bảo chúng có chiều rộng tương đương nhau */
    }

    .profile .form-group label {
        display: block; /* Đảm bảo label chiếm toàn bộ chiều rộng */
        margin-bottom: 5px; /* Khoảng cách giữa label và input */
    }

    .profile .form-group input {
        width: 100%; /* Giữ chiều rộng của input là 70% */
        display: block; /* Đảm bảo input chiếm chiều rộng */
        height: 30px;
    }

    .profile .form-group label {
        font-size: 18px;
        color: #3D67BA;
        font-weight: 500;
    }



    .input-group-text {
        border: none; /* Xóa viền */
        background: transparent; /* Xóa màu nền */
        padding: 0; /* Xóa padding để biểu tượng gần với input hơn */
        margin-right: 0; /* Xóa margin bên phải */
    }

    .toggle-password {
        position: absolute;
        top: 75%;
        right: 40px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6c757d; /* Màu xám nhẹ cho icon */
    }

    /* Điều chỉnh kích thước của icon */
    .toggle-password i {
        font-size: 1.2em;
    }

    .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            display: none; /* Hide by default */
        }
        .popup-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 300px;
            text-align: center;
        }
        .popup-content button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 200px;
        }
        
    .btn-save {
        background-color: #0690DE;
        color: #fff;
        font-weight: bold;
        width: 90%;
        height: 44px;
        font-size: 18px;
        font-weight: 600;
        border-radius: 30px;
        margin-bottom: 30px;
    }

    .profile-container .mb-3 .form-label {
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: 500;
    }

    .profile-container .mb-3 .row .col-md-4 label {
        font-size: 17px;
        font-weight: 300;
    }


    .profile-container .form-control {
        margin-bottom: 45px;
    }


</style>
<body>
    <div class="container1">
        <?php include 'admin_sidebar.php' ?>

        <main>
            <div class="row align-items-center">

                <div class="col-md-9 d-flex align-items-center">
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333">Change Password</h2>
                </div>

                <div class="col-md-3 d-flex align-items-center justify-content-end">
                    <div class="d-flex align-items-center">
                        <div class="info me-3" style=" margin-right: 30px">
                            <small class="text-muted" style="font-size: 15px; font-weight: 400; color: #333333;">
                                    <p class="mb-0"><?php echo $admin['Ad_Username']; ?></p>
                            </small>
                        </div>

                        <div class="profile-photo">
                                <img style="object-fit: cover; border-radius: 50%;" src="<?php echo $admin['Ad_Image']; ?>" width="90" height="90"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent_order">
                <div class="profile">
                <form method="post" enctype="multipart/form-data">
                    <div class="profile-container">
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <div class="form-group position-relative">
                                    <label class="form-label">Current Password</label>
                                    <input class="form-control" id="currentPassword" name="current_password" type="password" required>
                                    <span class="toggle-password" onclick="togglePassword('currentPassword', this)">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label class="form-label">New Password</label>
                                    <input class="form-control" id="newPassword" name="new_password" type="password" required>
                                    <span class="toggle-password" onclick="togglePassword('newPassword', this)">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label class="form-label">Confirm New Password</label>
                                    <input class="form-control" id="confirmPassword" name="confirm_password" type="password" required>
                                    <span class="toggle-password" onclick="togglePassword('confirmPassword', this)">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-save" type="submit">Change Password</button>
                        </div>
                    </div>
                </form>

                <?php if (isset($message)): ?>
                    <div class="popup-overlay" id="popup">
                        <div class="popup-content">
                            <p><?php echo htmlspecialchars($message); ?></p>
                            <button onclick="closePopup()">OK</button>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

    <script>
    // Function to open the popup
    function openPopup() {
        document.getElementById('popup').style.display = 'flex';
    }

    // Function to close the popup
    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }

    // Open popup automatically if there's a message
    <?php if (isset($message)): ?>
        openPopup();
    <?php endif; ?>
</script>

<script>
        function togglePassword(inputId, iconElement) {
            const passwordInput = document.getElementById(inputId);
            const icon = iconElement.querySelector("i");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>

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
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash'); // Thay đổi biểu tượng thành "eye-slash"
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye'); // Trở lại biểu tượng "eye"
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>