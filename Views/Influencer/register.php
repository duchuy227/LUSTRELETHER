<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Influencer Register</title>
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
        background-color: #CDE7FF;
        border-radius: 10px;
        padding: 20px;
        margin: 50px auto;
        max-width: 900px;
        border: 2px solid #CDE7FF;
        border-radius: 30px;
        box-shadow: 2px 2px 2px #a2a2a2;
    }
    .register-form h2 {
        text-align: center;
        font-weight: 700;
        color: #03649B;
        font-size: 32px;
    }
    .form-control {
        margin-bottom: 15px;
        border-radius: 10px;
    }
    .form-control::placeholder {
        color: #4a4a4a;
    }
    .form-group i {
        position: absolute;
        left: 30px;
        top: 50px;
        transform: translateY(-50%);
        color: #4a4a4a;
        font-size: 20px;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: brightness(2) invert(0);
        font-size: 20px;
        opacity: 70%;
    }
    .form-group {
        position: relative;
    }
    .form-group input {
        padding-left: 30px;
        margin-top: 30px;
        margin-left: 10px;
        border: 2px solid #03649B;
    }

    .form-group input::placeholder {
        padding-left: 10px;
        opacity: 70%;
    }

    .form-group input[type="file"]{
        border: 2px solid #30649B;
        padding-left: 10px;
        margin-top: 10px;
        appearance: none;
        -webkit-appearance: none;
        
    }
    input[type="file"]::-webkit-file-upload-button{
        background-color: #03649B;
        color: #fff;
    }

    
    .form-group select {
        margin-top: 30px;
        padding-left: 40px;
        margin-left: 10px;
        border: 2px solid #03649B;
    }
    .form-group select option {
        margin-left: 10px;
    }
    .form-group label {
        font-size: 18px;
        color: #03649B;
        font-weight: 700;
        margin-left: 10px;
        margin-bottom: 10px;
        margin-top: 10px;
    }
    .form-group textarea {
        margin-left: 10px;
        padding-left: 10px;
        border: 2px solid #03649B;
        border-radius: 10px;
    }
    .btn-primary {
        margin-top: 30px;
        width: 40%;
        border-radius: 25px;
        background-color: #0690DE;
        border: none;
        padding: 10px;
        font-size: 1.2em;
        display: block; /* Chuyển nút thành block-level để căn giữa */
        margin: 0 auto;
        margin-top: 30px;
    }
    .btn-primary:hover {
        background-color: #0690DE;
    }
    .options h5 {
        font-weight: 600;
        color: #03649B;
        font-size: 18px;
    }
    .options label {
        color: #363949;
        font-size: 16px;
        font-weight: 400;
    }

    .options input[type="checkbox"] {
        width: 20px;
        height: 20px;
        border: 2px solid #03649B;
        cursor: pointer;
        position: relative;
        margin-right: 10px;
        margin-bottom: 10px;
    }
    .col-md-4 {
        margin-top: 10px;
    }
    .social-group {
        margin-top: 20px;
        align-items: center;
        margin-bottom: 15px;
    }

    span {
        font-size: 18px;
        color: #03649B;
        font-weight: 700;
        margin-left: 10px;
        margin-bottom: 10px;
        margin-top: 20px;
    }
    .social-group input[type="checkbox"] {
        width: 25px;
        height: 25px;
        border: 2px solid #03649B;
        cursor: pointer;
        position: relative;
        margin-right: 10px;
        margin-bottom: 10px;
    }
    .social-group .form-control {
        height: 30px;
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

    input[type="date"]::-webkit-inner-spin-button,
    input[type="date"]::-webkit-calendar-picker-indicator {
        display: none;
        -webkit-appearance: none;
    }

    .social-network-row {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
        
    .social-network-row label {
        flex: 0 0 100px;
        margin-right: 50px;
        margin-top: -15px;
        font-weight: 500;
        font-size: 18px;
    }
    .social-network-row .form-control {
        flex-grow: 1;
        padding: 20px;
        border: 2px solid #03649B;
    }

    .social-network-row .form-control::placeholder {
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
    <div class="register-form">
        <h2>Influencer Register</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''?>">
                </div>
                <div class="col-md-6 form-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>">
                </div>
                <div class="col-md-6 form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''?>">
                </div>
                
                <div class="col-md-6 form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : ''?>">
                </div>

                <div class="col-md-4 form-group">
                    <i class="fas fa-address-book"></i>
                    <input type="text" class="form-control" placeholder="Fullname" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : ''?>">
                </div>
                <div class="col-md-4 form-group">
                    <i class="fas fa-address-card"></i>
                    <input type="address" class="form-control" placeholder="Address" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''?>">
                </div>
                <div class="col-md-4 form-group">
                    <i class="fas fa-signature"></i>
                    <input type="text" class="form-control" placeholder="Nickname" name="nickname" value="<?php echo isset($_POST['nickname']) ? $_POST['nickname'] : ''?>">
                </div>
                
                <div class="col-md-3 form-group">
                    <i class="far fa-calendar"></i>
                    <input type="date" class="form-control" name="dob" value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : ''?>">
                </div>
                <div class="col-md-3 form-group">
                    <i class="fas fa-phone"></i>
                    <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber" value="<?php echo isset($_POST['phonenumber']) ? $_POST['phonenumber'] : ''?>">
                </div>
                <div class="col-md-3 form-group">
                    <i class="fas fa-dollar-sign"></i>
                    <input type="text" class="form-control" placeholder="Price of Service" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''?>">
                </div>
                <div class="col-md-3 form-group">
                    <i class="fas fa-hashtag"></i>
                    <input type="text" class="form-control" placeholder="Hashtag" name="hastag" value="<?php echo isset($_POST['hastag']) ? $_POST['hastag'] : ''?>">
                </div>
                
                <div class="col-md-3 form-group">
                    <i class="fas fa-user-check"></i>
                    <?php 
                        $type_id = isset($_POST['type_id']) ? $_POST['type_id'] : '';
                    ?>
                    <select class="form-control" name="type_id">
                        <option hidden value="">Influencer</option>
                        <?php 
                            foreach($all_type as $types){
                                echo '<option value="'.$types['InfluType_ID'].'"';
                                if ($types['InfluType_ID'] == $type_id) {
                                    echo ' selected';
                                }
                                echo '>'.$types['InfluType_Name'].'</option>';
                                }
                            ?>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <i class="fas fa-map-marker-alt"></i>
                    <?php 
                        $wplace_id = isset($_POST['wplace_id']) ? $_POST['wplace_id'] : '';
                    ?>
                    <select class="form-control" name="wplace_id">
                        <option hidden value="">Workplace</option>
                        <?php 
                            foreach($all_wplace as $wplace){
                                echo '<option value="'.$wplace['WPlace_ID'].'"';
                                if ($wplace['WPlace_ID'] == $wplace_id) {
                                    echo ' selected';
                                }
                                echo '>'.$wplace['WPlace_Name'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <i class="fas fa-users"></i>
                    <?php 
                        $fol_id = isset($_POST['fol_id']) ? $_POST['fol_id'] : '';
                    ?>
                    <select class="form-control" name="fol_id">
                        <option hidden value="">Followers</option>
                        <?php 
                            foreach($all_fol as $fol){
                                echo '<option value="'.$fol['Fol_ID'].'"';
                                if ($fol['Fol_ID'] == $fol_id) {
                                    echo ' selected';
                                }
                                echo '>'.$fol['Fol_Quantity'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <i class="fas fa-venus-mars"></i>
                    <?php 
                        $gender_id = isset($_POST['gender_id']) ? $_POST['gender_id'] : '';
                    ?>
                    <select class="form-control" name="gender_id">
                        <option hidden value="">Gender</option>
                        <?php 
                            foreach($all_gender as $gender){
                                echo '<option value="'.$gender['Gender_ID'].'"';
                                if ($gender['Gender_ID'] == $gender_id) {
                                    echo ' selected';
                                }
                                echo '>'.$gender['Gender_Name'].'</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label style="margin-bottom: -30px;" for="cccd_image">CCCD Image</label>
                    <input type="file" class="form-control" name="cccd_image">
                </div>

                <div class="col-md-6 form-group">
                    <label style="margin-bottom: -30px;" for="influ_image">Profile Image</label>
                    <input type="file" class="form-control" name="influ_image">
                </div>

                <div class="col-md-12 form-group">
                    <label for="achivement">Achivement</label>
                    <textarea class="form-control" type="text" name="achivement" cols="25" rows="3" ><?php echo isset($_POST['achivement']) ? htmlspecialchars(trim($_POST['achivement'])) : ''; ?></textarea>
                    
                </div>
                <div class="col-md-12 form-group">
                    <label for="biography">Biography</label>
                    <textarea class="form-control" type="text" name="biography"  cols="25" rows="3" ><?php echo isset($_POST['biography']) ? htmlspecialchars($_POST['biography']) : ''; ?></textarea>
                </div>
                <br>
                <div class="options" style="margin-top: 20px;">
                    <span>Social Network</span>
                    <div class="row">
                        <div class="col-md-12 social-group">
                            <div class="social-network-row">
                                <label for="facebook" class="col-form-label">Facebook</label>
                                <input type="text" name="facebook_link" class="form-control" placeholder="Enter Facebook link">
                            </div>
                        </div>
                        <div class="col-md-12 social-group">
                            <div class="social-network-row">
                                <label for="facebook" class="col-form-label">Tiktok</label>
                                <input type="text" name="tiktok_link" class="form-control" placeholder="Enter Tiktok link">
                            </div>
                        </div>
                        <div class="col-md-12 social-group">
                            <div class="social-network-row">
                                <label for="facebook" class="col-form-label">Instagram</label>
                                <input type="text" name="instagram_link" class="form-control" placeholder="Enter Instagram link">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
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
                                <label class="form-check-label" for="topic<?php echo $topic['Topic_ID']; ?>" style="display: inline-block; margin-left: 8px; font-size: 16px; color: #333333"> 
                                <?php echo $topic['Topic_Name']; ?>
                                </label>
                            </div>
                        </div>
                        <?php 
                        $count++; 
                        endforeach; ?>
                    </div>

                <div class="row" style="margin-top: 20px">  
                    <button type="submit" class="btn btn-primary">SIGN UP</button>
                    <button class="btn btn-secondary"><a href="index.php?action=InfluLogin">Back</a></button>
                </div>
            </div>
        </form>
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