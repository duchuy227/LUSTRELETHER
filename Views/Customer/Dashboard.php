<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #d0e7ff;
        color: #333;
        padding-top: 85px;
    }

    .navbar {
        background-color: #fff;
        height: 85px;
        position: fixed; /* Cố định navbar */
        top: 0; /* Đặt nó ở vị trí trên cùng của trang */
        left: 0;
        right: 0;
        z-index: 1000; /* Đảm bảo navbar nằm trên các phần tử khác */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-brand {
        font-weight: bold;
        color: #333;
        font-size: 30px;
    }
    
    .navbar-nav {
        display: flex;
        gap: 30px; /* Điều chỉnh khoảng cách giữa các nav-item */
    }
    
    .navbar-nav .nav-link {
        color: #333;
        font-size: 22px;
        font-weight: 400;
        text-align: center;
        margin-left: 30px;
    }


    .sidebar {
        background-color: #ffffff;
        height: calc(100vh - 85px);
        width: 300px;
        max-width: 100%;
        position: fixed; /* Đặt sidebar ở vị trí cố định */
        top: 85px; /* Đặt dưới navbar */
        left: 0; /* Căn ở bên trái */
        padding-top: 20px;
        box-shadow: 10px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 999; /* Đảm bảo sidebar nằm trên các phần tử khác */
        transition: transform 0.3s ease-in-out; /* Thêm hiệu ứng chuyển động */
    }

    
    .sidebar a {
        color: #6c757d;
        text-decoration: none;
        display: block;
        padding: 10px 10px;
        font-size: 18px;
        margin-top: 20px;
        font-weight: 500;
    }

    .sidebar h4 {
        font-size: 30px;
        font-weight: bold;
        opacity: 25%;
        margin-bottom: 40px;
        margin-top: 20px;
        color: #333;
    }

    .sidebar a {
        position: relative;
        color: #333;
        text-decoration: none;
        overflow: hidden;
        border-radius: 30px;
        transition: color 0.3s ease;
    }

    .sidebar a:hover {
        background-color: #d3d9de;
        color: #000;
        border-radius: 30px;
    }

    .sidebar a::before {
        content: "";
        position: absolute;
        top: 0;
        left: 100%; /* Để lớp nền bắt đầu từ bên phải */
        width: 100%;
        height: 100%;
        background-color: #d3d9de; /* Màu nền khi hover */
        transition: left 0.3s ease; /* Tạo hiệu ứng di chuyển từ bên phải vào */
        z-index: -1; /* Để lớp nền ở dưới nội dung */
    }

    .sidebar a:hover::before {
        left: 0; /* Di chuyển lớp nền vào vị trí */
    }

    /* Ẩn sidebar trên màn hình nhỏ (mặc định) */
@media (max-width: 768px) {
    .sidebar {
        display: none; /* Ẩn sidebar */
    }
    .sidebar.active {
        display: block; /* Hiển thị khi có class "active" */
        animation: slideIn 0.3s ease; /* Thêm hiệu ứng nếu cần */
    }
}

/* Hiệu ứng khi mở sidebar (nếu cần) */
@keyframes slideIn {
    from {
        transform: translateX(-100%);
    }
    to {
        transform: translateX(0);
    }
}

/* Nút toggle (hiển thị trên màn hình nhỏ) */
#toggleSidebar {
    display: none; /* Ẩn trên desktop */
    position: fixed;
    top: 95px;
    right: 15px;
    z-index: 1000;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}

/* Hiển thị nút toggle trên màn hình nhỏ */
@media (max-width: 768px) {
    #toggleSidebar {
        display: block;
    }
}

    
    .profile-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        margin-top: 30px;
        width: 95%;
    }
    .col-md-9 h2 {
        font-weight: bold;
        margin-top: 30px;
    }
    .profile-container label {
        font-weight: 500;
    }

    .profile-container .col-md-4 {
        margin-top: 20px;
    }

    .profile-container .col-md-4  input{
        font-size: 16px;
        font-weight: 300;
    }

    .profile-container .col-md-4  label{
        font-size: 18px;
        font-weight: 500;
    }

    .profile-container .col-md-8  input{
        font-size: 16px;
        font-weight: 300;
    }

    .profile-container .col-md-8  label{
        font-size: 18px;
        font-weight: 500;
    }

    .profile-container .mb-3 .row .col-md-4 {
        margin-bottom: 20px;
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

    .profile-container .col-md-4 input[type="file"] {
        width: 240px;
        padding: 5px; 
        box-sizing: border-box; 
        overflow: hidden;
        white-space: nowrap;
        font-size: 14px;
        border: 1px solid #e3e3e3;
    }

    .profile-container .col-md-4 input[type="date"] {
        width: 240px;
    } 

    .profile-container .form-control {
        margin-bottom: 45px;
    }
    .profile-container .btn-save {
        background-color: #F0564A;
        color: #fff;
        font-weight: bold;
        width: 180px;
        height: 44px;
        font-size: 18px;
        font-weight: 600;
    }

    .img-small {
        height: 240px;
        cursor: pointer; 
        image-rendering: -webkit-optimize-contrast;
        object-fit: cover;
        border-radius: 10%;
    }

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

    input[type="checkbox"] {
        width: 20px;
        height: 20px;
        border: 2px solid #03649B;
        cursor: pointer;
        position: relative;
    }

    input[type="checkbox"]:checked {
        background-color: #03649B;
    }

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
        
</style>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once 'sidebar.php'; ?>
                        
            <div class="col-md-9 offset-md-3">
            <div id="toggleSidebar">☰</div>
                <h2>My Profile</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="profile-container">
                        <div class="row">
                            <div class="col-md-4">
                                <?php if (!empty($customer['Cus_Image'])): ?>
                                <img class="img-small" height="240" src="<?php echo $customer['Cus_Image'] ?>" width="240"/>
                                <?php else: ?>
                                <img style="border-radius: 10%" class="defalut-img" src="././views/Img/avatar.jpg" width="240" height="240">
                                <?php endif; ?>

                                <img class="img-fullscreen"  src="<?php echo $customer['Cus_Image']; ?>" width="356" height="383" class="img-fluid"/>
                                <input class="form-control mt-4" type="file" name="cus_image"/>
                                
                                <label class="form-label" for="dob">Date of Birth</label>
                                <input class="form-control" id="dob" type="date" value="<?php echo $customer['Cus_DOB'] ?>" name="dob"/>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input class="form-control" id="username" type="text" value="<?php echo $customer['Cus_Username'] ?>" name="username"/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" id="email" type="email" value="<?php echo $customer['Cus_Email'] ?>" name="email"/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="fullname">Fullname</label>
                                    <input class="form-control" id="fullname" type="text" value="<?php echo $customer['Cus_Fullname'] ?>" name="fullname"/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Phone Number</label>
                                    <input class="form-control" id="phone" type="text" value="<?php echo $customer['Cus_PhoneNumber'] ?>" name="phonenumber"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Topics</label>
                            <div class="row">
                                <?php 
                                $count = 0; 
                                foreach ($topics as $topic): 
                                    ?>
                                <div class="col-md-4 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="topics[]" id="topic<?php echo $topic['Topic_ID']; ?>" value="<?php echo $topic['Topic_ID']; ?>" 
                                        <?php echo in_array($topic['Topic_ID'], $selectedTopics) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="topic<?php echo $topic['Topic_ID']; ?>" style="display: inline-block; margin-left: 8px; font-size: 16px; color: #333333; margin-top: 3px"> 
                                            <?php echo $topic['Topic_Name']; ?>
                                        </label>
                                    </div>
                                </div>
                                <?php 
                                    $count++; 
                                endforeach; ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Event</label>
                            <div class="row">
                            <?php 
                                $count = 0; 
                                foreach ($events as $event): 
                                    ?>
                                    <div class="col-md-4 mb-3"> <!-- Thêm class mb-3 cho mỗi cột -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="events[]" id="event<?php echo $event['Event_ID']; ?>" value="<?php echo $event['Event_ID']; ?>" 
                                            <?php echo in_array($event['Event_ID'], $selectedEvents) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="event<?php echo $event['Event_ID']; ?>" style="display: inline-block; margin-left: 8px; font-size: 16px; color: #333333;margin-top: 3px"> 
                                                <?php echo $event['Event_Name']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php 
                                    $count++; 
                                endforeach; ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <div class="row">
                            <?php 
                                $count = 0; 
                                foreach ($contents as $content): 
                                    ?>
                                    <div class="col-md-4 mb-3"> 
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="contents[]" id="content<?php echo $content['Content_ID']; ?>" value="<?php echo $content['Content_ID']; ?>" 
                                            <?php echo in_array($content['Content_ID'], $selectedContents) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="content<?php echo $content['Content_ID']; ?>" style="display: inline-block; margin-left: 8px; font-size: 16px; color: #333333; margin-top: 3px"> 
                                                <?php echo $content['Content_Name']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php 
                                    $count++; 
                                endforeach; ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-save" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>