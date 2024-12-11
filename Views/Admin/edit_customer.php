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
    <title>Edit Customer</title>
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

    input[type="checkbox"] {
            width: 20px;
            height: 20px;
            border: 2px solid #03649B;
            cursor: pointer;
            position: relative;
        }

        /* Đổi màu khi checkbox được chọn */
        input[type="checkbox"]:checked {
            background-color: #03649B;
        }

        /* Tạo dấu chấm bên trong khi checkbox được chọn */
        input[type="checkbox"]:checked::before {
            content: "✔";
            color: #fff;
            font-size: 16px;
            line-height: 1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #togglePassword {
        position: absolute; /* Đặt vị trí tuyệt đối */
        right: 10px; /* Điều chỉnh vị trí từ bên trái */
        top: 50%; /* Căn giữa theo chiều dọc */
        transform: translateY(-50%); /* Căn giữa */
    }

    .input-group-text {
        border: none; /* Xóa viền */
        background: transparent; /* Xóa màu nền */
        padding: 0; /* Xóa padding để biểu tượng gần với input hơn */
        margin-right: 0; /* Xóa margin bên phải */
    }

    .popup-modal1 {
        display: none; /* Hidden by default */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4); /* Black background with opacity */
        padding-top: 100px;
    }

    .popup-content1 {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
        text-align: center;
    }

    .popup-content1 img {
        margin-bottom: 20px;
    }

    .popup-content1 p {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 18px;
    }

    #closeBtn1 {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        width: 100px;
        border-radius: 10px;
    }

    #closeBtn1:hover {
        background-color: #45a049;
    }


</style>
<body>
    <div class="container1">
        <?php include 'admin_sidebar.php' ?>

        <main>
            <div class="row align-items-center">

                <div class="col-md-9 d-flex align-items-center">
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333">Edit Customer</h2>
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
                    <form action="index.php?action=admin_editcustomer&id=<?php echo $customers['Cus_ID']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required value="<?php echo  $customers['Cus_Username']; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo  $customers['Cus_Email']; ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" required value="<?php echo  $customers['Cus_Fullname']; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" required value="<?php echo  $customers['Cus_DOB']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phonenumber">Phone Number</label>
                                <input type="text" class="form-control" id="phonenumber" name="phonenumber" required value="<?php echo  $customers['Cus_PhoneNumber']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label style="margin-left: 10px;" for="cus_image">Image</label>
                                <br>
                                <img style="margin-left: 13px;" src="<?php echo $customers['Cus_Image']; ?>" alt="Current Image" width="100" height="100">
                                <input style="border:none" type="file" class="form-control" id="cus_image" name="cus_image" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <h5 class="mb-1">Select Topics</h5>
                            </div>
                            <div class="row" style="margin: 0px;">
                                <?php 
                                $count = 0; 
                                foreach ($topics as $topic): 
                                    ?>
                                    <div class="col-md-4 mb-3"> <!-- Thêm class mb-3 cho mỗi cột -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="topics[]" id="topic<?php echo $topic['Topic_ID']; ?>" value="<?php echo $topic['Topic_ID']; ?>" 
                                            <?php echo in_array($topic['Topic_ID'], $selectedTopics) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="topic<?php echo $topic['Topic_ID']; ?>" style="display: inline-block; margin-left: 8px; font-size: 16px; color: #333333"> 
                                                <?php echo $topic['Topic_Name']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php 
                                    $count++; 
                                endforeach; ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <h5 class="mb-1">Select Events</h5> 
                            <div class="row">
                                <?php 
                                $count = 0; 
                                foreach ($events as $event): 
                                    ?>
                                    <div class="col-md-4 mb-3"> <!-- Thêm class mb-3 cho mỗi cột -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="events[]" id="event<?php echo $event['Event_ID']; ?>" value="<?php echo $event['Event_ID']; ?>" 
                                            <?php echo in_array($event['Event_ID'], $selectedEvents) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="event<?php echo $event['Event_ID']; ?>" style="display: inline-block; margin-left: 8px; font-size: 16px; color: #333333"> 
                                                <?php echo $event['Event_Name']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php 
                                    $count++; 
                                endforeach; ?>
                            </div>
                        </div>


                        <div class="form-row">
                            <h5 class="mb-1">Select Content</h5> 
                            <div class="row">
                                <?php 
                                $count = 0; 
                                foreach ($contents as $content): 
                                    ?>
                                    <div class="col-md-4 mb-3"> <!-- Thêm class mb-3 cho mỗi cột -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="contents[]" id="content<?php echo $content['Content_ID']; ?>" value="<?php echo $content['Content_ID']; ?>" 
                                            <?php echo in_array($content['Content_ID'], $selectedContents) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="content<?php echo $content['Content_ID']; ?>" style="display: inline-block; margin-left: 8px; font-size: 16px; color: #333333"> 
                                                <?php echo $content['Content_Name']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php 
                                    $count++; 
                                endforeach; ?>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <br>
            </div>
        </main>
    </div>

    <div id="popupModal1" class="popup-modal1" style="display: none;">
        <div class="popup-content1">
            <img src="././views/Img/u118.png" width="50" height="50">
            <p><?php echo isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : ''; ?></p>
            <button id="closeBtn1">OK</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Kiểm tra nếu có thông báo lỗi trong session
            <?php if (isset($_SESSION['errorMessage'])): ?>
                // Hiển thị popup khi có thông báo lỗi
                document.getElementById('popupModal1').style.display = 'block';
            <?php endif; ?>

            // Đảm bảo sự kiện click chỉ được gán một lần
            document.getElementById('closeBtn1').addEventListener('click', function() {
                // Đóng popup
                document.getElementById('popupModal1').style.display = 'none';

                // Sau khi đóng popup, xóa thông báo lỗi trong session và reload trang
                <?php 
                    unset($_SESSION['errorMessage']); // Xóa thông báo lỗi trong session
                ?>
            });
        });
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