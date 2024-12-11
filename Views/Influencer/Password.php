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
    <title>Change Password</title>
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
        height: 590px; 
        background-color: rgba(255, 255, 255, 1);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
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

    

    .form-group label {
        font-size: 18px;
        color: #847F7F;
        font-weight: 500;
    }

    .btn-success {
        margin-top: 20px;
        width: 140px;
        border-radius: 25px;
        border: none;
        font-size: 18px;
        height: 40px;
        font-weight: 600;
    }

    .toggle-password {
        position: absolute;
        top: 75%;
        right: 20px;
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
        width: 100%;
        height: 44px;
        font-size: 18px;
        font-weight: 600;
        border-radius: 30px;
        margin-bottom: 30px;
    }

</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>Password</h2>
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
                
                    <div class="col-md-12">
                        <div class="row">
                            <div class="projectCardd">
                                <div class="projectTopp">
                                    <h4 style="color: #847F7F; font-size: 26px; font-weight:bold" class="text-center">Change Password</h4>
                                    <br>
                                    <form method="post">
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
                    </div>
            </main>
        </div>
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