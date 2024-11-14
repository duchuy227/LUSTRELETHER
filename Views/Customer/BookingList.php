<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>My Booking</title>
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
        position: fixed; /* Đặt sidebar ở vị trí cố định */
        top: 85px; /* Đặt dưới navbar */
        left: 0; /* Căn ở bên trái */
        padding-top: 20px;
        box-shadow: 10px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 999; /* Đảm bảo sidebar nằm trên các phần tử khác */
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
        font-size: 20px;
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
        background-color: #0690DE;
        color: #fff;
        font-weight: bold;
        width: 100%;
        height: 44px;
        font-size: 18px;
        font-weight: 600;
        border-radius: 30px;
    }

    .form-control {
        padding-right: 2.5rem; /* Để khoảng trống cho icon */
    }
    
    
    .popup {
        display: none; /* Ẩn popup mặc định */
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

    .button-container {
    display: flex;
        justify-content: space-between; /* Giữ khoảng cách đều nếu có nhiều thẻ */
        align-items: center; /* Căn giữa theo chiều dọc */
        width: 100px; /* Cố định chiều rộng cho container */
        
    }

    .button-container a {
        margin: 0 5px; /* Khoảng cách giữa các thẻ */
    }

    .button-container a:first-child {
        margin-left: 0; /* Không có khoảng cách bên trái cho thẻ đầu tiên */
    }

    .button-container a:last-child {
        margin-right: 0; /* Không có khoảng cách bên phải cho thẻ cuối cùng */
    }
        
</style>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
        <?php include_once 'sidebar.php'; ?>
            <div class="col-md-9 offset-md-3">
                <h2>My Booking</h2>
                <div class="profile-container">
                <div class="table-responsive">
                    <table style="max-width:100%" class="table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th style="font-size: 16px; font-weight: 400; ">Booking Date</th>
                                <th style="font-size: 16px; font-weight: 400; ">Service</th>
                                <th style="font-size: 16px; font-weight: 400;">Influencer</th>
                                <th style="font-size: 16px; font-weight: 400;">Invoice</th>
                                <th style="font-size: 16px; font-weight: 400; white-space: nowrap;">Status</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php foreach ($booking as $b): ?>
                                <tr>
                                    <td><?php echo $b['Booking_CreateTime'] ?></td>
                                    <td><?php echo $b['Booking_Content'] ?></td>
                                    <td><?php echo $b['Influ_Nickname'] ?></td>
                                    <td style="font-weight: 500; color: <?php 
                                            if ($b['Inv_Status'] === 'Unpaid') {
                                                echo '#2200B2';
                                            } elseif ($b['Inv_Status'] === 'Paid') {
                                                echo '#069603';
                                            } 
                                        ?>;">
                                        <?php 
                                        // Kiểm tra trạng thái của Booking
                                        if ($b['Booking_Status'] === 'Pending' || $b['Booking_Status'] === 'Rejected') {
                                            echo ""; // Cột Invoice sẽ trống
                                        } else {
                                            echo !empty($b['Inv_Status']) ? $b['Inv_Status'] : "No Invoice"; // Hiển thị thông tin Invoice nếu có, hoặc thông báo nếu không có
                                        }
                                        ?>
                                    </td>
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
                                    <td scope="row">
                                        <div class="button-container">
                                        <?php if ($b['Booking_Status'] === 'Completed'): ?>
                                            <a href="#">
                                                <img  src="././Views/Img/comments.png" width="23" height="23">
                                            </a>
                                            
                                            <a href="index.php?action=customer_detailBooking&id=<?php echo $b['Booking_ID'] ?>">
                                                <img src="././Views/Img/u223.png" width="25" height="25">
                                            </a>
                                            
                                        <?php elseif ($b['Booking_Status'] === 'Pending'): ?>
                                            <a href="index.php?action=customer_editBooking&id=<?php echo $b['Booking_ID'] ?>">
                                                <img  src="././Views/Img/u550.png" width="25" height="25">
                                            </a>
                                            <a href="index.php?action=customer_detailBooking&id=<?php echo $b['Booking_ID'] ?>">
                                                <img src="././Views/Img/u223.png" width="25" height="25">
                                            </a>
                                            <a href="index.php?action=customer_deleteBooking&id=<?php echo $b['Booking_ID'] ?>" onclick="openPopup(event);">
                                                <img  src="././Views/Img/deletecus_u544.png" width="25" height="25">
                                            </a>
                                        <?php elseif ($b['Booking_Status'] === 'In Progress'): ?>
                                            <a href="index.php?action=customer_detailBooking&id=<?php echo $b['Booking_ID'] ?>">
                                                <img src="././Views/Img/u223.png" width="25" height="25">
                                            </a>
                                        <?php elseif ($b['Booking_Status'] === 'Rejected'): ?>
                                            <a href="index.php?action=customer_detailBooking&id=<?php echo $b['Booking_ID'] ?>">
                                                <img src="././Views/Img/u223.png" width="25" height="25">
                                            </a>
                                            <a href="index.php?action=customer_deleteBooking&id=<?php echo $b['Booking_ID'] ?>" onclick="openPopup(event);">
                                                <img  src="././Views/Img/deletecus_u544.png" width="25" height="25">
                                            </a>
                                        <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php  endforeach; ?>
                        </tbody>
                    </table>
                    <div id="deletePopup" class="popup">
                        <div class="popup-content">
                            <p>Are you sure to delete <br>this booking?</p>
                            <button id="confirmDelete" class="delete-btn">Delete</button>
                            <button id="cancelDelete" class="cancel-btn">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openPopup(event) {
            event.preventDefault(); // Ngăn không cho chuyển trang ngay lập tức
            document.getElementById("deletePopup").style.display = "flex"; // Hiển thị popup

            // Lấy URL của hành động xóa
            const deleteUrl = event.currentTarget.href;

            // Xử lý khi người dùng nhấn nút "Delete"
            document.getElementById("confirmDelete").onclick = function() {
                window.location.href = deleteUrl; // Chuyển hướng đến URL xóa nếu người dùng xác nhận
            };

            // Xử lý khi người dùng nhấn nút "Cancel"
            document.getElementById("cancelDelete").onclick = function() {
                document.getElementById("deletePopup").style.display = "none"; // Đóng popup
            };
        }

    </script>
    
</body>
</html>