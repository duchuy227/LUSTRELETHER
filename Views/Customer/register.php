<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Customer Register</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        box-sizing: border-box;
    }
    body {
        background-color: #EFF5FD;
        
    }
    .register-form {
        background-color: #E4F2FF;
        border-radius: 10px;
        padding: 20px;
        margin: 50px auto;
        max-width: 100%;
        border: 2px solid #03649B;
        border-radius: 30px;
        box-shadow: 5px 5px 5px #7B7979;
    }
    .register-form h2 {
        text-align: center;
        font-weight: 700;
        color: #03649B;
        font-size: 32px;
        margin-bottom: 20px;
    }
    .form-control {
        border: 1px solid #b0c4de;
        border-radius: 25px;
        padding-left: 40px;
    }
    .form-group {
        position: relative;
        margin-bottom: 53px;
        font-size: 16px;
    }
    .form-group i {
        position: absolute;
        top: 15px;
        left: 10px;
        font-size: 20px;
    }
    .form-group input {
        height: 50px;
        border: 2px solid #03649B;
        width: 90%;
    }

    .btn-primary {
        margin-top: 30px;
        width: 168px;
        border-radius: 25px;
        background-color: #0690DE;
        border: none;
        padding: 10px;
        font-size: 1.2em;
        display: block; /* Chuyển nút thành block-level để căn giữa */
        margin: 0 auto;
    }
    .btn-primary:hover {
        background-color: #0690DE;
    }

    .btn-secondary {
        margin-top: 30px;
        width: 168px;
        border-radius: 25px;
        background-color: #777777;
        border: none;
        padding: 10px;
        font-size: 1.2em;
        display: block; /* Chuyển nút thành block-level để căn giữa */
        margin: 0 auto;
    }

    .btn-secondary a {
        text-decoration: none;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #777777;
    }

    
    .options h5 {
        font-weight: 600;
        color: #03649B;
        font-size: 20px;
    }
    
    .col-md-4 {
        margin-top: 10px;
    }
    .options .form-check {
        margin-bottom: 10px;
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
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 10px;
        height: 10px;
        transform: translate(-50%, -50%);
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: brightness(2) invert(0);
        font-size: 20px;
        opacity: 70%;
    }

    .error {
        color: #F07070;
        font-weight: 500;
        font-size: 16px;
        margin-bottom: 20px;
        text-align: center;
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
    <div class="container">
        <div class="register-form">
            <h2>Register Form</h2>
            <form method="post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''?>">
                        </div>
                        
                        <div class="form-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''?>">
                        </div>
                        
                        <div class="form-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : ''?>">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-id-card"></i>
                            <input type="text" class="form-control" placeholder="Fullname" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : ''?>">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-calendar-alt"></i>
                            <input type="date" class="form-control" name="dob" value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : ''?>">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-phone"></i>
                            <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber" value="<?php echo isset($_POST['phonenumber']) ? $_POST['phonenumber'] : ''?>">
                        </div>

                    </div>
                    <div class="col-md-7">
                        <div class="options">
                            <h5>Select Your Topics</h5>
                            <div class="row">
                            <?php 
                                $count = 0; 
                                $selected_topics = isset($_POST['topics']) ? $_POST['topics'] : []; 
                                foreach ($topics as $topic): 
                                    ?>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="topics[]" id="topic<?php echo $topic['Topic_ID']; ?>" value="<?php echo $topic['Topic_ID']; ?>" <?php echo in_array($topic['Topic_ID'], $selected_topics) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="topic<?php echo $topic['Topic_ID']; ?>" style="display: inline-block; margin-left: auto; font-size: 15px; color: #333333; font-weight: 400; margin-top: 3px"> 
                                                <?php echo $topic['Topic_Name']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php 
                                    $count++; 
                                endforeach; ?>
                            </div>
                        </div>
                        <div class="options">
                            <h5 style="margin-top: 20px;">Select Your Events</h5>
                            <div class="row">
                            <?php 
                                $count = 0; 
                                $selected_events = isset($_POST['events']) ? $_POST['events'] : [];
                                foreach ($events as $event): 
                                    ?>
                                    <div class="col-md-4 mb-3"> 
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="events[]" id="event<?php echo $event['Event_ID']; ?>" value="<?php echo $event['Event_ID']; ?>" <?php echo in_array($event['Event_ID'], $selected_events) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="event<?php echo $event['Event_ID']; ?>" style="display: inline-block; margin-left: auto; font-size: 15px; color: #333333;font-weight: 400; margin-top: 3px"> 
                                                <?php echo $event['Event_Name']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php 
                                    $count++; 
                                endforeach; ?>   
                            </div>
                        </div>
                        <div class="options">
                            <h5 style="margin-top: 20px;">Select Your Contents</h5>
                            <div class="row">
                            <?php 
                                $count = 0; 
                                $selected_contents = isset($_POST['contents']) ? $_POST['contents'] : [];
                                foreach ($contents as $content): 
                                    ?>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="contents[]" id="content<?php echo $content['Content_ID']; ?>" value="<?php echo $content['Content_ID']; ?>" <?php echo in_array($content['Content_ID'], $selected_contents) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="content<?php echo $content['Content_ID']; ?>" style="display: inline-block; margin-left: auto; font-size: 15px; color: #333333; font-weight: 400; margin-top: 3px"> 
                                                <?php echo $content['Content_Name']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php 
                                    $count++; 
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex gap-3">  
                    <button type="submit" class="btn btn-primary">SIGN UP</button>
                    <button class="btn btn-secondary"><a href="index.php?action=cusLogin">Back</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

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