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
    <title>Edit Influencer</title>
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
        grid-template-columns: 14rem auto 16rem;
        margin: 0 auto;
    }

    main .recent_order{
        margin-top: 2rem;
        background: var(--clr-white);
        width: 970px;
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

    .social-network-row {
            display: flex;
            margin-bottom: 15px;
        }
        
        .social-network-row label {
            flex: 0 0 100px; /* Độ rộng cố định cho label */
            margin-right: 50px;
        }
        .social-network-row .form-control {
            flex-grow: 1;
        }


</style>
<body>
    <div class="container1">
        <?php include 'admin_sidebar.php' ?>

        <main>
            <div class="row align-items-center">

                <div class="col-md-9 d-flex align-items-center">
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333">Edit Influencer</h2>
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
                    <form action="index.php?action=admin_editinfluencer&id=<?php echo $influencers['Influ_ID']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $influencers['Influ_Username']; ?>" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $influencers['Influ_Password']; ?>" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePassword">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $influencers['Influ_Email']; ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $influencers['Influ_Address']; ?>" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $influencers['Influ_Fullname']; ?>" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="nickname">Nickname</label>
                                <input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo $influencers['Influ_Nickname']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob"  value="<?php echo $influencers['Influ_DOB']; ?>" required>
                            </div>
                        </div>
                        <div class="form-row" style="margin-top: 20px;">
                            <div class="form-group col-md-3">
                                <label for="price">Price of service</label>
                                <input type="text" class="form-control" id="price" name="price"  value="<?php echo $influencers['Influ_Price']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="phonenumber">Phone Number</label>
                                <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $influencers['Influ_PhoneNumber']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hastag">Hastag</label>
                                <input type="text" class="form-control" id="hastag" name="hastag" value="<?php echo $influencers['Influ_Hastag']; ?>" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="type_id">Type of Influencer</label>
                                <select name="type_id" class="form-control" required>
                                    <option value="">Choose Type</option>
                                    <?php 
                                        foreach($all_type as $types){
                                            if($types['InfluType_ID'] == $influencers['InfluType_ID'])
                                            {
                                                echo "  <option selected value='".$types['InfluType_ID']."'>".$types['InfluType_Name'] ."</option>";
                                            }
                                            else{ echo "  <option value='".$types['InfluType_ID']."'>".$types['InfluType_Name'] ."</option>";}
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row" style="margin-top: 20px;">
                            <div class="form-group col-md-3">
                                <label for="wplace_id">Workplace</label>
                                <select name="wplace_id" class="form-control" required>
                                    <option value="">Choose Workplace</option>
                                    <?php 
                                        foreach($all_wplace as $wplace){
                                            if($wplace['WPlace_ID'] == $influencers['WPlace_ID'])
                                            {
                                                echo "  <option selected value='".$wplace['WPlace_ID']."'>".$wplace['WPlace_Name'] ."</option>";
                                            }
                                            else{ echo "  <option value='".$wplace['WPlace_ID']."'>".$wplace['WPlace_Name'] ."</option>";}
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="gender_id">Gender</label>
                                <select name="gender_id" class="form-control" required>
                                    <option value="">Choose Gender</option>
                                    <?php 
                                        foreach($all_gender as $gender){
                                            if($gender['Gender_ID'] == $influencers['Gender_ID'])
                                            {
                                                echo "  <option selected value='".$gender['Gender_ID']."'>".$gender['Gender_Name'] ."</option>";
                                            }
                                            else{ echo "  <option value='".$gender['Gender_ID']."'>".$gender['Gender_Name'] ."</option>";}
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fol_id">Followers</label>
                                <select name="fol_id" class="form-control" required>
                                    <option value="">Choose</option>
                                    <?php 
                                        foreach($all_fol as $fol){
                                            if($fol['Fol_ID'] == $influencers['Fol_ID'])
                                            {
                                                echo "  <option selected value='".$fol['Fol_ID']."'>".$fol['Fol_Quantity'] ."</option>";
                                            }
                                            else{ echo "  <option value='".$fol['Fol_ID']."'>".$fol['Fol_Quantity'] ."</option>";}
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="influ_image">Profile Image</label>
                                <br>
                                <img style="margin-left: 13px;"  src="<?php echo $influencers['Influ_Image']; ?>" alt="Current Image" width="100" height="100">
                                <input style="border:none" type="file" name="influ_image" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <?php
                            $otherImages = explode(',', $influencers['Influ_OtherImage']);
                            

                            $count = count($otherImages); // Đếm số lượng ảnh
            
                            // Dựa trên số lượng ảnh, chọn kích thước cột phù hợp
                            $colSize = 12; // Mặc định cho trường hợp chỉ có 1 ảnh
                            if ($count == 2) $colSize = 6;  // 2 ảnh: mỗi ảnh chiếm 6 cột
                            if ($count == 3) $colSize = 4;  // 3 ảnh: mỗi ảnh chiếm 4 cột
                            if ($count == 4) $colSize = 3;  // 4 ảnh: mỗi ảnh chiếm 3 cột
                            if ($count == 5 || $count == 6) $colSize = 2;
                            ?>

                            <div class="form-group col-md-12">
                                <label for="influ_other_images">Other Image</label>
                                <div class="row">
                                    <?php if (!empty($otherImages)): ?>
                                        <?php foreach ($otherImages as $imagePath): ?>
                                            <div class="col-md-<?php echo $colSize; ?>" style="margin-bottom: 10px;">
                                                <img src="<?php echo trim($imagePath); ?>" alt="Other Image" width="100" height="100"/>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No other images available.</p>
                                    <?php endif; ?>
                                </div>
                                
                                <input style="border:none" type="file" name="influ_other_images[]" class="form-control" multiple>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="achivement">Achievement</label>
                            <textarea rows="10" id="achivement" name="achivement"  class="form-control"><?php echo $influencers['Influ_Achivement'];?></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="biography">Biography</label>
                                <textarea rows="10" id="biography" name="biography"  class="form-control"><?php echo $influencers['Influ_Biography'];?></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="social_media">Social Network</label>
                                <div class="form-group">

                                    <!-- Facebook -->
                                    <div class="social-network-row">
                                        <label for="facebook" class="col-form-label">Facebook</label>
                                        <input type="text" name="facebook_link" class="form-control" 
                                            value="<?= isset($influencers['FB_Link']) ? $influencers['FB_Link'] : ''; ?>" 
                                            placeholder="Enter Facebook link">
                                    </div>

                                    <!-- Tiktok -->
                                    <div class="social-network-row">
                                        <label for="tiktok" class="col-form-label">Tiktok</label>
                                        <input type="text" name="tiktok_link" class="form-control" 
                                            value="<?= isset($influencers['TT_Link']) ? $influencers['TT_Link'] : ''; ?>" 
                                            placeholder="Enter Tiktok link">
                                    </div>

                                    <!-- Instagram -->
                                    <div class="social-network-row">
                                        <label for="instagram" class="col-form-label">Instagram</label>
                                        <input type="text" name="instagram_link" class="form-control" 
                                            value="<?= isset($influencers['Ins_Link']) ? $influencers['Ins_Link'] : ''; ?>" 
                                            placeholder="Enter Instagram link">
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <h5 class="mb-1">Select Topics</h5> 
                            <div class="row">
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

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <br>
            </div>
        </main>
    </div>

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