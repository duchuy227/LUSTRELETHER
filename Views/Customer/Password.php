<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" href="././views/Img/u2.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Password</title>
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

    /* Đặt icon vào bên phải của input */
    .toggle-password {
        position: absolute;
        top: 75%;
        right: 10px;
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
        
</style>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
        <?php include_once 'sidebar.php'; ?>
            <div class="col-md-9 offset-md-3">
                <h2>Change Passwod</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="profile-container">
                        <div class="row">
                            <div class="col-md-12">
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
    </div>



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
    
</body>
</html>