<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" href="././views/Img/u2.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="./views/Influencer/style.css?v=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Profile</title>
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
        height: auto; /* Tự điều chỉnh chiều cao theo nội dung */
        background-color: rgba(255, 255, 255, 1);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .img-small {
        height: 510px;
        cursor: pointer; 
        image-rendering: -webkit-optimize-contrast;
        object-fit: cover;
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

    .social-network-row {
        display: flex;
        margin-bottom: 15px;
    }
        
    .social-network-row label {
        flex: 0 0 100px; /* Độ rộng cố định cho label */            margin-right: 50px;
    }
    .social-network-row .form-control {
        flex-grow: 1;
    }
    
    #bio-textarea {
        word-wrap: break-word; /* Ngắt từ nếu quá dài */
        overflow: hidden; /* Ngăn tràn ra ngoài */
        max-height: 200px; /* Giới hạn chiều cao tối đa */
        overflow-y: auto; /* Cuộn nếu cần */
    }

    .form-group label {
        font-size: 18px;
        color: #3D67BA;
        font-weight: 600;
    }

    .btn-success {
        justify-content: space-between;
        align-items: center;
        width: 240px;
        border-radius: 25px;
        border: none;
        font-size: 18px;
        height: 40px;
    }

    .form-group input {
        font-size: 18px;
    }

    .fixed-size-img {
        width: 200px; /* Đặt chiều rộng cố định */
        height: 200px; /* Đặt chiều cao cố định */
        object-fit: cover; /* Giúp ảnh được cắt để vừa với khung */
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

</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>Edit Profile</h2>
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
                    <!-- <div class="arrow">
                        <span class="material-symbols-outlined">
                            expand_more
                        </span>
                    </div> -->
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
                <div class="projectCardd">
                    <div class="projectTopp">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="username">Username</label>
                                <input type="hidden" name="id" value="<?php echo $influInfo['Influ_ID']; ?>">
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $influInfo['Influ_Username']; ?>" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $influInfo['Influ_Password']; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePassword">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $influInfo['Influ_Email']; ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $influInfo['Influ_Address']; ?>" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $influInfo['Influ_Fullname']; ?>" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="nickname">Nickname</label>
                                <input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo $influInfo['Influ_Nickname']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob"  value="<?php echo $influInfo['Influ_DOB']; ?>" required>
                            </div>
                        </div>
                        <div class="form-row" style="margin-top: 20px;">
                            <div class="form-group col-md-3">
                                <label for="price">Price of service</label>
                                <input type="text" class="form-control" id="price" name="price"  value="<?php echo $influInfo['Influ_Price']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="phonenumber">Phone Number</label>
                                <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $influInfo['Influ_PhoneNumber']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hastag">Hastag</label>
                                <input type="text" class="form-control" id="hastag" name="hastag" value="<?php echo $influInfo['Influ_Hastag']; ?>" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="type_id">Type of Influencer</label>
                                <select name="type_id" class="form-control" required>
                                    <option value="">Choose Type</option>
                                    <?php 
                                        foreach($all_type as $types){
                                            if($types['InfluType_ID'] == $influInfo['InfluType_ID'])
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
                                            if($wplace['WPlace_ID'] == $influInfo['WPlace_ID'])
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
                                            if($gender['Gender_ID'] == $influInfo['Gender_ID'])
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
                                            if($fol['Fol_ID'] == $influInfo['Fol_ID'])
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
                                <img style="margin-left: 13px;"  src="<?php echo $influInfo['Influ_Image']; ?>" alt="Current Image" width="100" height="100">
                                <input style="border:none" type="file" name="influ_image" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <?php
                            $otherImages = explode(',', $influInfo['Influ_OtherImage']);

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
                            <textarea rows="10" id="achivement" name="achivement"  class="form-control"><?php echo $influInfo['Influ_Achivement'];?></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="biography">Biography</label>
                                <textarea rows="10" id="biography" name="biography"  class="form-control"><?php echo $influInfo['Influ_Biography'];?></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="social_media">Social Network</label>
                                <div class="form-group">
                                    <div class="social-network-row">
                                        <label for="facebook" class="col-form-label">Facebook</label>
                                        <input type="text" name="facebook_link" class="form-control" 
                                            value="<?= isset($influInfo['FB_Link']) ? $influInfo['FB_Link'] : ''; ?>" 
                                            placeholder="Enter Facebook link">
                                    </div>

                                    <div class="social-network-row">
                                        <label for="tiktok" class="col-form-label">Tiktok</label>
                                        <input type="text" name="tiktok_link" class="form-control" 
                                            value="<?= isset($influInfo['TT_Link']) ? $influInfo['TT_Link'] : ''; ?>" 
                                            placeholder="Enter Tiktok link">
                                    </div>
                                    
                                    <div class="social-network-row">
                                        <label for="instagram" class="col-form-label">Instagram</label>
                                        <input type="text" name="instagram_link" class="form-control" 
                                            value="<?= isset($influInfo['Ins_Link']) ? $influInfo['Ins_Link'] : ''; ?>" 
                                            placeholder="Enter Instagram link">
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <h5 class="mb-1">Select Topics</h5> 
                            <div class="row">
                            <?php foreach ($topics as $topic): ?>
                            <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="topics[]" id="topic<?php echo $topic['Topic_ID']; ?>" value="<?php echo $topic['Topic_ID']; ?>" 
                                    <?php echo in_array($topic['Topic_ID'], $selectedTopics) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="topic<?php echo $topic['Topic_ID']; ?>" style="display: inline-block; margin-left: 8px; font-size: 16px; color: #333333"> 
                                        <?php echo $topic['Topic_Name']; ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    </div>
                    </div>
                </div>
            </main>
        </div>
    </div>



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