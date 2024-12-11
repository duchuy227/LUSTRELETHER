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
    <title>Profile</title>
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
        padding: 30px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .img-small {
        width: 100%; /* Đảm bảo ảnh bao phủ toàn bộ chiều rộng của container */
        height: auto; /* Tự điều chỉnh chiều cao theo tỉ lệ ảnh */
        cursor: pointer;
        object-fit: cover;
        border-radius: 10px; /* Làm tròn góc cho ảnh */
    }

    .info span {
        font-size: 18px;
        color: #3D67BA;
        font-weight: 600;
    }

    .profile-container {
        padding: 1rem; /* Giảm padding của container */
    }

    .info p {
        font-size: 18px;
        color: #333333;
        margin: 0;
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
    
    #bio-textarea {
        word-wrap: break-word; /* Ngắt từ nếu quá dài */
        overflow: hidden; /* Ngăn tràn ra ngoài */
        max-height: 200px; /* Giới hạn chiều cao tối đa */
        overflow-y: auto; /* Cuộn nếu cần */
    }

    .form-group label {
        font-size: 18px;
        color: #333;
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

    .social-network-row input {
        background: transparent;
        border: none;
        font-size: 16px;
        color: #333;
        cursor: pointer;
    }

    .fixed-size-img {
        width: 200px; /* Đặt chiều rộng cố định */
        height: 200px; /* Đặt chiều cao cố định */
        object-fit: cover; /* Giúp ảnh được cắt để vừa với khung */
    }

    @media (max-width: 768px) {
    .projectCardd {
        padding: 15px; /* Giảm padding cho màn hình nhỏ hơn */
    }

    .profile-container .img-small {
        height: auto; /* Điều chỉnh chiều cao tự động cho màn hình nhỏ */
    }

    .info span,
    .info p {
        font-size: 16px; /* Giảm kích thước font cho màn hình nhỏ */
    }

    .social-network-row input {
        font-size: 16px;
    }
}

/* Giảm khoảng cách và font size cho các thiết bị rất nhỏ */
@media (max-width: 576px) {
    .info span,
    .info p {
        font-size: 16px;
    }

    .projectTopp .row > div {
        padding: 5px; /* Giảm khoảng cách padding giữa các cột */
    }

    .fixed-size-img {
        width: 100%; /* Đảm bảo ảnh bao phủ toàn bộ chiều rộng của container nhỏ */
        height: auto;
    }

    .btn-success {
        margin-top: 30px;
        width: 200px;
        border-radius: 25px;
        margin-bottom: 30px;
        border: none;
        padding: -30px;
        font-size: 18px;
        margin: 0 auto;
        height: 44px;
    }

    .btn-spacing {
        margin-right: 1px; 
    }
}

</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>Profile</h2>
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
                        
                        <div class="row">
                            <div class="col-md-5 d-flex align-items-center justify-content-center">
                                <div class="profile-container">
                                    <img class="img-fluid img-small"  src="<?php echo $influInfo['Influ_Image']; ?>"/>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="info p-5">
                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span>Username</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['Influ_Username'] ; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span>Email</span>
                                        </div>
                                        <div class="col-md-7">
                                        <p class="mb-0 text-truncate" data-toggle="tooltip" data-placement="top" title="<?php echo $influInfo['Influ_Email']; ?>">
                                            <?php echo $influInfo['Influ_Email']; ?>
                                        </p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span class="me-3">Gender</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['Gender_Name'] ; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span>Fullname</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['Influ_Fullname'] ; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span>Influencer</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['InfluType_Name'] ; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span>Date of birth</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['Influ_DOB'] ; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span class="me-3">Phone Number</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['Influ_PhoneNumber'] ; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span class="me-3">Nickname</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['Influ_Nickname'] ; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span class="me-3">Price of service</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['Influ_Price'] ; ?> VND</p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span class="me-3">Address</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['Influ_Address']; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span class="me-3">Workplace</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['WPlace_Name']; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span class="me-3">Hastag</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate"><?php echo $influInfo['Influ_Hastag'] ; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span class="me-3">Followers</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate" title="<?php echo $influInfo['Fol_Quantity'] ; ?>"><?php echo $influInfo['Fol_Quantity'] ; ?></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                        <div class="col-md-5 d-flex justify-content-between">
                                            <span class="me-3">Topic</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0 text-truncate" title="<?php echo implode(', ', $influInfo['Topics']); ?>">
                                                <?php echo implode(', ', array_slice($influInfo['Topics'], 0, 3)); ?><?php if (count($influInfo['Topics']) > 3) echo '...'; ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label style="color:#3D67BA">Other Images</label>
                                <div class="row">
                                <?php 
                                // Tách các đường dẫn ảnh
                                $otherImages = explode(',', $influInfo['Influ_OtherImage']);
                                $count = count($otherImages); // Đếm số lượng ảnh
                
                                // Dựa trên số lượng ảnh, chọn kích thước cột phù hợp
                                $colSize = 12; // Mặc định cho trường hợp chỉ có 1 ảnh
                                if ($count == 2) $colSize = 6;  // 2 ảnh: mỗi ảnh chiếm 6 cột
                                if ($count == 3) $colSize = 4;  // 3 ảnh: mỗi ảnh chiếm 4 cột
                                if ($count == 4) $colSize = 3;  // 4 ảnh: mỗi ảnh chiếm 3 cột
                                if ($count == 5 || $count == 6) $colSize = 2;  // 5 hoặc 6 ảnh: mỗi ảnh chiếm 2 cột
                                
                                // Lặp qua từng ảnh và hiển thị
                                foreach ($otherImages as $image) { 
                                ?>
                                    <div class="col-md-<?php echo $colSize; ?> mb-3">
                                        <img src="<?php echo trim($image); ?>" width="200" height="200" class="img-fluid fixed-size-img">
                                    </div>
                                <?php 
                                } 
                                ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-group">
                                    <label style="color:#3D67BA">Biography</label>
                                    <div style="background:transparent; border:none; resize: none; font-size: 18px; height:auto" id="bio-textarea" readonly class="form-control"><?php 
                                        $biography = $influInfo['Influ_Biography'];
                                        $formattedBiography = str_replace('. ', '.<br><br>', $biography);
                                        echo nl2br($formattedBiography); 
                                    ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-group">
                                    <label style="color:#3D67BA" for="">Achivement</label>
                                    <div style="background:transparent; border:none; resize: none; font-size: 18px; height: auto" id="bio-textarea" readonly class="form-control"><?php 
                                        $biography = $influInfo['Influ_Achivement'];
                                        $formattedBiography = str_replace('. ', '.<br><br>', $biography);
                                        echo nl2br($formattedBiography); 
                                    ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label style="color:#3D67BA" class="form-group" for="social_media">Social Network</label>
                                <div class="form-group">
                                    <!-- Facebook -->
                                    <?php if (isset($influInfo['FB_Link']) && !empty($influInfo['FB_Link'])): ?>
                                        <div class="social-network-row">
                                            <label for="facebook" class="col-form-label">Facebook</label>
                                            <input style="border:none; background:transparent" type="text" name="facebook_link" class="form-control" readonly
                                                value="<?= $influInfo['FB_Link']; ?>">
                                        </div>
                                    <?php endif; ?>

                                    <!-- Tiktok -->
                                    <?php if (isset($influInfo['TT_Link']) && !empty($influInfo['TT_Link'])): ?>
                                        <div class="social-network-row">
                                            <label for="tiktok" class="col-form-label">Tiktok</label>
                                            <input style="border:none; background:transparent" type="text" name="tiktok_link" class="form-control" readonly
                                                value="<?= $influInfo['TT_Link']; ?>">
                                        </div>
                                    <?php endif; ?>

                                    <!-- Instagram -->
                                    <?php if (isset($influInfo['Ins_Link']) && !empty($influInfo['Ins_Link'])): ?>
                                        <div class="social-network-row">
                                            <label for="instagram" class="col-form-label">Instagram</label>
                                            <input style="border:none; background:transparent" type="text" name="instagram_link" class="form-control" readonly 
                                                value="<?= $influInfo['Ins_Link']; ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <a href="index.php?action=influencer_editprofile">
                                <button type="button" class="btn btn-success btn-spacing">Edit Profile</button>
                            </a>

                            <a href="index.php?action=influencer_password&id=<?php echo $influInfo['Influ_ID']; ?>">
                                <button type="button" class="btn btn-success">Change Password</button>
                            </a>
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