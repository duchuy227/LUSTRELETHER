<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>My Mails</title>
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
    
    .btn1 {
        color: #fff;
        background-color: #D3AA15;
        padding: 7px;
        text-transform: uppercase;
        border-radius: 20px;
        border: 2px solid #797979;
        font-weight: 400;
        font-size: 14px;
    }
        
</style>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
        <?php include_once 'sidebar.php'; ?>
            <div class="col-md-9 offset-md-3">
                <h2>My Mails</h2>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="index.php?action=customer_sendMail">
                                <button class="btn btn-primary">Send An Email</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="profile-container">
                    <h3 class="text-center">Inbox</h3>
                    <br>
                    <div class="table-responsive">
                        <table style="max-width:100%" class="table table-bordered">
                            <thead>
                                <tr class="table-primary">
                                    <th style="font-size: 16px; font-weight: 400; ">Datetime</th>
                                    <th style="font-size: 16px; font-weight: 400; ">Influencer</th>
                                    <th style="font-size: 16px; font-weight: 400;">Title</th>
                                    <th style="font-size: 16px; font-weight: 400; white-space: nowrap;">Content</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                    <?php foreach($mail as $m): ?>
                                    <tr>
                                        <td><?php echo $m['Mail_CreateTime'] ?></td>
                                        <td><?php echo $m['Influ_Nickname'] ?></td>
                                        <td><?php echo $m['Mail_Title'] ?></td>
                                        <td>
                                            <textarea readonly style="background: transparent; width: 100%; border:none; resize:none" cols="30" rows="5"><?php echo $m['Mail_Content'] ?></textarea>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>

                <div class="profile-container">
                    <h3 class="text-center">Sent</h3>
                    <br>
                    <div class="table-responsive">
                        <table style="max-width:100%" class="table table-bordered">
                            <thead>
                                <tr class="table-primary">
                                    <th style="font-size: 16px; font-weight: 400;">Datetime</th>
                                    <th style="font-size: 16px; font-weight: 400;">Influencer</th>
                                    <th style="font-size: 16px; font-weight: 400;">Title</th>
                                    <th style="font-size: 16px; font-weight: 400; white-space: nowrap;">Content</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                    <?php foreach($sent as $m): ?>
                                    <tr>
                                        <td><?php echo $m['Mail_CreateTime'] ?></td>
                                        <td><?php echo $m['Influ_Nickname'] ?></td>
                                        <td><?php echo $m['Mail_Title'] ?></td>
                                        <td>
                                            <textarea readonly style="background: transparent; width: 100%; border:none; resize:none" cols="30" rows="5"><?php echo $m['Mail_Content'] ?></textarea>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>