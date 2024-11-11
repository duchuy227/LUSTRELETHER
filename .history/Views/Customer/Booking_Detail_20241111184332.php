<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Booking Detail</title>
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
    
        
</style>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
        <?php include_once 'sidebar.php'; ?>
            <div class="col-md-9 offset-md-3">
                <h2>Booking Detail</h2>
                <div class="profile-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Date Time</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $booking['Booking_CreateTime'] ?></label>
                                </div>
                            </div>
                            <div class="row mt-5">    
                                <div class="col-md-6">
                                    <label class="label">Start Date</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $booking['Booking_StartDate'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">    
                                <div class="col-md-6">
                                    <label class="label">End Date</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $booking['Booking_EndDate'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">    
                                <div class="col-md-6">
                                    <label class="label">Total Days</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $booking['Booking_TotalDay'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">    
                                <div class="col-md-6">
                                    <label class="label">Expense</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $booking['Booking_Expense'] ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Service</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $booking['Booking_Content'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <label class="label">Influencer</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $booking['Influ_Nickname'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <label>Topic</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $booking['Topic_Name'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $booking['Booking_Status'] ?></label>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <label>Note</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $booking['Booking_Note'] ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</body>
</html>