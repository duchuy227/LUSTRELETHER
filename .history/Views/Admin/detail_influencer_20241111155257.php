<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./views/Admin/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Influencer Detail</title>
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
        justify-content: space-between;
        align-items: center;
        width: 240px;
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
        font-weight: 600;
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

    .img-small {
            height: 510px;
            cursor: pointer; 
            image-rendering: -webkit-optimize-contrast;
            object-fit: cover;
        }

        /* CSS để hiển thị ảnh phóng to */
        .img-fullscreen {
            width: 100%;
            height: 100%;
            object-fit: contain; 
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.9);
            cursor: pointer;
            display: none; /* Ẩn ảnh full màn hình ban đầu */
            image-rendering: -webkit-optimize-contrast;
        }

    

    .text-truncate {
        white-space: nowrap;      
        overflow: hidden;         
        text-overflow: ellipsis;  
        max-width: 350px;        
    }

    .fixed-size-img {
        width: 100px; /* Đặt chiều rộng cố định */
        height: 100px; /* Đặt chiều cao cố định */
        object-fit: cover; /* Giúp ảnh được cắt để vừa với khung */
    }

    #bio-textarea {
        word-wrap: break-word; /* Ngắt từ nếu quá dài */
        overflow: hidden; /* Ngăn tràn ra ngoài */
        max-height: 200px; /* Giới hạn chiều cao tối đa */
        overflow-y: auto; /* Cuộn nếu cần */
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

        .form-row .row .col-md-2 {
        padding-right: 10px; /* Tạo khoảng cách ngang */
        padding-bottom: 10px; /* Tạo khoảng cách dọc */
    }

</style>
<body>
    <div class="container1">
        <?php include 'admin_sidebar.php' ?>

        <main>
            <div class="row align-items-center">

                <div class="col-md-9 d-flex align-items-center">
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333"> Influencer Detail</h2>
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
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-container p-5">
                                <img class="img-small"  src="<?php echo $influencers['Influ_Image']; ?>" width="356" height="400" class="img-fluid"/>
                                <img class="img-fullscreen"  src="<?php echo $influencers['Influ_Image']; ?>" width="356" height="383" class="img-fluid"/>
                                
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="info p-5">
                                
                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span>Username</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['Influ_Username'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-md-7">
                                    <p class="mb-0 text-truncate" data-toggle="tooltip" data-placement="top" title="<?php echo $influencers['Influ_Email']; ?>">
                                        <?php echo $influencers['Influ_Email']; ?>
                                    </p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span class="me-3">Gender</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['Gender_Name'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span>Fullname</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['Influ_Fullname'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span>Influencer</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['InfluType_Name'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span>Date of birth</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['Influ_DOB'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span class="me-3">Phone Number</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['Influ_PhoneNumber'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span class="me-3">Nickname</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['Influ_Nickname'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span class="me-3">Price of service</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['Influ_Price'] ; ?> VND</p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span class="me-3">Income</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['Influ_Income'] ; ?> VND</p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span class="me-3">Address</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['Influ_Address']; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span class="me-3">Workplace</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['WPlace_Name']; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span class="me-3">Hastag</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo $influencers['Influ_Hastag'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span class="me-3">Followers</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate" title="<?php echo $influencers['Fol_Quantity'] ; ?>"><?php echo $influencers['Fol_Quantity'] ; ?></p>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-md-5 d-flex justify-content-between">
                                        <span class="me-3">Topic</span>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0 text-truncate"><?php echo implode(', ', $influencers['Topics']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label  for="form-group">Other Images</label>
                            <div class="row">
                                <?php 
                                // Tách các đường dẫn ảnh
                                $otherImages = explode(',', $influencers['Influ_OtherImage']);
                                // Lọc bỏ các đường dẫn trống
                                $otherImages = array_filter(array_map('trim', $otherImages)); // Loại bỏ khoảng trắng và chuỗi trống
                                $count = count($otherImages); // Đếm số lượng ảnh
                                
                                // Dựa trên số lượng ảnh, chọn kích thước cột phù hợp
                                $colSize = 12; // Mặc định cho trường hợp chỉ có 1 ảnh
                                if ($count == 2) $colSize = 6;  // 2 ảnh: mỗi ảnh chiếm 6 cột
                                if ($count == 3) $colSize = 4;  // 3 ảnh: mỗi ảnh chiếm 4 cột
                                if ($count == 4) $colSize = 3;  // 4 ảnh: mỗi ảnh chiếm 3 cột
                                if ($count == 5 || $count == 6) $colSize = 2;  // 5 hoặc 6 ảnh: mỗi ảnh chiếm 2 cột

                                // Chỉ hiển thị các ảnh nếu có ảnh trong danh sách
                                if ($count > 0): ?>
                                    <?php foreach ($otherImages as $imagePath): ?>
                                        <div class="col-md-<?php echo $colSize; ?>">
                                            <img class="fixed-size-img" src="<?php echo htmlspecialchars($imagePath); ?>" alt="Other Image"/>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="">Biography</label>
                                <div style="background:transparent; border:none; resize: none; font-size: 18px; height:auto" id="bio-textarea" readonly class="form-control"><?php 
                                    // Lấy dữ liệu từ database
                                    $biography = $influencers['Influ_Biography'];
                                    
                                    // Thay dấu chấm kèm theo khoảng trắng bằng dấu chấm và xuống dòng (thẻ <br>)
                                    $formattedBiography = str_replace('. ', '.<br><br>', $biography);
                                    
                                    // Hiển thị nội dung với dấu chấm xuống dòng
                                    echo nl2br($formattedBiography); 
                                ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="">Achivement</label>
                                <div style="background:transparent; border:none; resize: none; font-size: 18px; height: auto" id="bio-textarea" readonly class="form-control"><?php 
                                    // Lấy dữ liệu từ database
                                    $biography = $influencers['Influ_Achivement'];
                                    
                                    // Thay dấu chấm kèm theo khoảng trắng bằng dấu chấm và xuống dòng (thẻ <br>)
                                    $formattedBiography = str_replace('. ', '.<br><br>', $biography);
                                    
                                    // Hiển thị nội dung với dấu chấm xuống dòng
                                    echo nl2br($formattedBiography); 
                                ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-group" for="social_media">Social Network</label>
                            <div class="form-group">
                                <!-- Facebook -->
                                <?php if (isset($influencers['FB_Link']) && !empty($influencers['FB_Link'])): ?>
                                    <div class="social-network-row">
                                        <label for="facebook" class="col-form-label">Facebook</label>
                                        <input style="border:none; background:transparent" type="text" name="facebook_link" class="form-control" readonly
                                            value="<?= $influencers['FB_Link']; ?>">
                                    </div>
                                <?php endif; ?>

                                <!-- Tiktok -->
                                <?php if (isset($influencers['TT_Link']) && !empty($influencers['TT_Link'])): ?>
                                    <div class="social-network-row">
                                        <label for="tiktok" class="col-form-label">Tiktok</label>
                                        <input style="border:none; background:transparent" type="text" name="tiktok_link" class="form-control" readonly
                                            value="<?= $influencers['TT_Link']; ?>">
                                    </div>
                                <?php endif; ?>

                                <!-- Instagram -->
                                <?php if (isset($influencers['Ins_Link']) && !empty($influencers['Ins_Link'])): ?>
                                    <div class="social-network-row">
                                        <label for="instagram" class="col-form-label">Instagram</label>
                                        <input style="border:none; background:transparent" type="text" name="instagram_link" class="form-control" readonly 
                                            value="<?= $influencers['Ins_Link']; ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>



                    <div class="d-flex justify-content-center mt-4">
                        <a href="index.php?action=admin_influencer">
                            <button type="button" class="btn btn-success">List Influencers</button>
                        </a>
                    </div>
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
        document.addEventListener('DOMContentLoaded', function() {
        var fullscreenImage = document.querySelector('.img-fullscreen');

        // Lắng nghe sự kiện click trên ảnh nhỏ
        document.querySelector('.img-small').addEventListener('click', function() {
            // Hiển thị ảnh full màn hình khi nhấp vào ảnh nhỏ
            fullscreenImage.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Ngăn cuộn trang web khi ảnh full màn hình được hiển thị
        });

        // Lắng nghe sự kiện click trên ảnh full màn hình
        fullscreenImage.addEventListener('click', function() {
            // Ẩn ảnh full màn hình khi nhấp vào ảnh đó
            fullscreenImage.style.display = 'none';
            document.body.style.overflow = 'auto'; // Cho phép cuộn trang web trở lại khi ảnh full màn hình bị ẩn
        });
        });
    </script>

    <script>
    // Tự động điều chỉnh chiều cao của textarea theo nội dung
    var textarea = document.getElementById('bio-textarea');
    textarea.style.height = 'auto';  // Đặt lại chiều cao ban đầu
    textarea.style.height = (textarea.scrollHeight) + 'px';  // Điều chỉnh chiều cao dựa trên nội dung
    </script>

    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>