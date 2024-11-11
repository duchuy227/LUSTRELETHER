<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="././views/Layout/homepage.css?v=1.0">
    <title>Influencer Detail</title>
</head>
<style>
    .profile-card {
        background-color: white;
        border-radius: 15px;
        height: auto;
        margin-bottom: 20px;
        overflow: hidden;
        max-width: 100%;
    }

    .profile-card1 {
        background-color: white;
        border-radius: 10px;
        height: auto;
        margin-bottom: 20px;
        overflow: hidden;
        max-width: 100%;
        overflow-y: auto;
    }

    .profile-image {
        width: 100%;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        height: 300px;
        image-rendering: -webkit-optimize-contrast;
        object-fit: cover;
        cursor: pointer;
    }

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
        display: none;
        
    }

    .carousel {
        display: flex;
        align-items: center;
        position: relative;
        justify-content: center;
        height: 40px;
        margin-top: 10px;
        gap: 10px;
    }

    #imageContainer {
        display: flex;
    }

    .carousel-image {
        margin: 0 5px;
    }

    .carousel i {
        font-size: 30px;
        color: #333;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
    }

    .recently-booked .event {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .recently-booked .event span {
        margin: auto;
    }

    .text-truncate {
        white-space: nowrap;      
        overflow: hidden;         
        text-overflow: ellipsis;  
        max-width: 350px;        
    }

    hr {
        max-width: 100%;
        border: 2px solid #333;    
    }

    .btn-secondary {
        flex: 1 1 0; /* Cho phép button giãn ra và đều nhau */
        min-width: 150px; /* Đảm bảo button không nhỏ hơn 150px */
        height: 50px; 
        margin: 8px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center; /* Căn giữa nội dung của button */
    }

    #bio-textarea {
        word-wrap: break-word; /* Ngắt từ nếu quá dài */
        overflow: hidden; /* Ngăn tràn ra ngoài */
        max-height: 200px; /* Giới hạn chiều cao tối đa */
        overflow-y: auto; /* Cuộn nếu cần */
    }

    .btn-booking {
        background-color: #F0564A;
        color: white;
        width: 218px;
        height: 50px;
        font-weight: 600;
        font-size: 18px;
        margin: 10px 37px
    }

    .btn-booking:hover {
        background-color: #F0564A;
        color: white;
    }


    .feeds, .feedbacks {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        
    }

    .feeds .img, .feedbacks img {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        object-fit: cover;
    }

    .feeds .btn {
        background-color: #F0564A;
        color: white;
        border-radius: 20px;
        padding: 10px 20px;
        border: none;
        font-size: 16px;
        font-weight: 500;
    }


    /* Media query cho màn hình nhỏ hơn 768px */
    @media (max-width: 768px) {
        .profile-card{
            width: 100%;
        }
        .carousel-image {
            width: 30px; /* Tăng kích thước ảnh carousel */
            height: 30px;
            
        }

        .social img {
            width: 30px;
            height: 30px;
        }

        .carousel {
            padding: 0 20px; /* Khoảng cách bên trái và phải cho carousel */
        }

        .carousel i {
            font-size: 20px; /* Tăng kích thước icon */
            color: #000; /* Đảm bảo màu sắc của icon */
            padding: 0 5px; /* Đảm bảo có khoảng cách để không bị chồng lên */
        }
    }

    /* Media query cho màn hình từ 768px đến 1024px */
    @media (min-width: 768px) and (max-width: 1024px) {
        .profile-card{
            width: 100%;
        }
        .carousel-image {
            width: 30px; /* Kích thước ảnh vừa phải */
            height: 30px;
        }

        .social img {
            width: 30px;
            height: 30px;
        }

        .carousel {
            padding: 0 30px;
        }

        .carousel i {
            font-size: 24px; /* Tăng kích thước icon */
            color: #000; /* Màu sắc của icon */
            padding: 0 -10px; /* Khoảng cách tốt hơn */
        }
    }


    

</style>
<body>
    <?php include 'navbar.php'?>
    
    <div class="container-fluid">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-3 col-sm-12">
                <div class="profile-card text-center">
                    <img class="profile-image mb-3" src="<?php echo $influencers['Influ_Image'] ?>" id="mainProfileImage" onclick="showFullscreenImage()">
                    <img class="img-fullscreen" src="<?php echo $influencers['Influ_Image']; ?>" id="fullscreenImage"/>
                    <div class="carousel">
                        <i class="fas fa-chevron-left" onclick="slideLeft()" style="position: absolute; top: 50%; left: 0px; transform: translateY(-50%); cursor: pointer;"></i>
                        <div class="d-flex" id="imageContainer">
                        <?php
                            $profileImage = $influencers['Influ_Image'];
                            $otherImages = explode(',', $influencers['Influ_OtherImage']);
                            $otherImages = array_filter(array_map('trim', $otherImages));
                            array_unshift($otherImages, $profileImage);
                            $count = count($otherImages);

                            $visibleCount = 4;
                            $shownImages = array_slice($otherImages, 0, $visibleCount); 
                            
                            $colSize = 12;
                            if ($count == 2) $colSize = 6;
                            if ($count == 3) $colSize = 4;
                            if ($count == 4) $colSize = 3;
                            if ($count == 5 || $count == 6) $colSize = 2;
                        if ($count > 0): ?>
                            <?php foreach ($shownImages as $imagePath): ?>
                                <div class="col-md-<?php echo $colSize; ?> col-6">
                                    <img class="carousel-image" style=" border-radius: 5px; object-fit:cover; cursor:pointer" src="<?php echo htmlspecialchars($imagePath); ?>" width="45" height="45" onclick="changeProfileImage(this.src)"/>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                        <i class="fas fa-chevron-right" onclick="slideRight()" style="position: absolute; top: 50%; right: 0px; transform: translateY(-50%); cursor: pointer;"></i>
                    </div>
                    <div class="social">
                        <?php if (isset($influencers['FB_Link']) && !empty($influencers['FB_Link'])): ?>
                            <a href="<?= $influencers['FB_Link']; ?>" target="_blank"><img src="././views/Img/u32.png" width="45" height="45"></a>
                        <?php endif; ?>
                        
                        <?php if (isset($influencers['Ins_Link']) && !empty($influencers['Ins_Link'])): ?>
                            <a href="<?= $influencers['Ins_Link']; ?>" target="_blank"><img src="././views/Img/u31.png" width="45" height="45"></a>
                        <?php endif; ?>

                        <?php if (isset($influencers['TT_Link']) && !empty($influencers['TT_Link'])): ?>
                            <a href="<?= $influencers['TT_Link']; ?>" target="_blank"><img src="././views/Img/u29.png" width="45" height="45"></a>
                        <?php endif; ?>
                    </div>
                    <br>
                </div>

                <div class="profile-card">
                    <h5 style="margin: 10px 20px;">Recently Booked</h5>
                    <p style="margin: 15px 20px; font-size: 18px; font-weight: 400">Total: 20</p>
                    <div class="recently-booked">
                        <div class="event">
                            <img style="border-radius: 50%; margin: auto" src="././views/Img/avatar.jpg" width="50" height="50">
                            <span>Event 1</span>
                            <span>1 days</span>
                        </div>
                        <div class="event">
                            <img style="border-radius: 50%; margin: auto" src="././views/Img/a1.jpg" width="50" height="50">
                            <span>Event 1</span>
                            <span>1 days</span>
                        </div>
                        <div class="event">
                            <img style="border-radius: 50%; margin: auto" src="././views/Img/u73.jpg" width="50" height="50">
                            <span>Event 1</span>
                            <span>1 days</span>
                        </div>
                        <div class="event">
                            <img style="border-radius: 50%; margin: auto" src="././views/Img/u87.png" width="50" height="50">
                            <span>Event 1</span>
                            <span>1 days</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="profile-card1">
                    <h4 style="margin: 10px 20px; font-size: 26px; font-weight: 500;"><?php echo $influencers['Influ_Nickname'] ?> -  <?php echo $influencers['Influ_Fullname'] ?></h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 style="margin: 10px 20px; font-weight:400; font-size: 17px;">Influencer</h5>
                                </div>
                                <div class="col-md-8">
                                    <p style="margin: 8px 20px; font-weight:300 ; font-size: 17px;"><?php echo $influencers['InfluType_Name'] ?></p>
                                </div>

                                <div class="col-md-4">
                                    <h5 style="margin: 10px 20px; font-weight:400; font-size: 17px;">Email</h5>
                                </div>
                                <div class="col-md-8">
                                    <p class="text-truncate" title="<?php echo $influencers['Influ_Email']; ?>" style="margin: 8px 20px; font-weight:300 ; font-size: 17px;"><?php echo $influencers['Influ_Email'] ?></p>
                                </div>

                                <div class="col-md-4">
                                    <h5 style="margin: 10px 20px; font-weight:400; font-size: 17px;">Follower</h5>
                                </div>
                                <div class="col-md-8">
                                    <p class="text-truncate" title="<?php echo $influencers['Fol_Quantity']; ?>" style="margin: 8px 20px; font-weight:300 ; font-size: 17px;"><?php echo $influencers['Fol_Quantity'] ?></p>
                                </div>

                                <div class="col-md-4">
                                    <h5 style="margin: 10px 20px; font-weight:400; font-size: 17px;">Workplace</h5>
                                </div>
                                <div class="col-md-8">
                                    <p style="margin: 8px 20px; font-weight:300 ; font-size: 17px;"><?php echo $influencers['WPlace_Name'] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 style="margin: 10px 20px; font-weight:400; font-size: 17px;">Gender</h5>
                                </div>
                                <div class="col-md-8">
                                    <p style="margin: 8px 20px; font-weight:300 ; font-size: 17px;"><?php echo $influencers['Gender_Name'] ?></p>
                                </div>

                                <div class="col-md-4">
                                    <h5 style="margin: 10px 20px; font-weight:400; font-size: 17px;">Age</h5>
                                </div>
                                <div class="col-md-8">
                                    <p style="margin: 8px 20px; font-weight:300 ; font-size: 17px;">
                                        <?php 
                                            $dob = new DateTime($influencers['Influ_DOB']);
                                            $now = new DateTime();
                                            $age = $now->diff($dob)->y;
                                            echo $age;
                                        ?>
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <h5 style="margin: 10px 20px; font-weight:400; font-size: 17px;">Phone</h5>
                                </div>
                                <div class="col-md-8">
                                    <p style="margin: 8px 20px; font-weight: 300; font-size: 17px;">
                                        <?php 
                                            // Lấy số điện thoại và ẩn 4 chữ số cuối
                                            $phone = $influencers['Influ_PhoneNumber'];
                                            $hiddenPhone = substr($phone, 0, -4) . '****'; 
                                            echo $hiddenPhone;
                                        ?>
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <h5 style="margin: 10px 20px; font-weight:400; font-size: 17px;">Hashtag</h5>
                                </div>
                                <div class="col-md-8">
                                    <p style="margin: 8px 20px; font-weight:300 ; font-size: 17px;"><?php echo $influencers['Influ_Hastag'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5 style="margin: 10px 20px; font-weight:500; font-size: 20px;">Topics</h5>
                    <div class="row" style="gap: 13px;">
                        <div class="row">
                            <?php 
                            $count = count($topics); // Đếm số lượng button
                            $colSize = 4; // Mặc định chia theo col-md-4

                            foreach($topics as $index => $t): 
                                // Nếu số lượng là 2, thì chia mỗi cái là col-md-6
                                if ($count == 2) {
                                    $colSize = 6;
                                }
                                // Nếu số lượng là 3, chia mỗi cái là col-md-4
                                elseif ($count == 3) {
                                    $colSize = 4;
                                } 
                                // Nếu số lượng chia hết cho 3 thì mỗi cái sẽ là col-md-4
                                elseif ($count % 3 == 0) {
                                    $colSize = 4;
                                } 
                                // Nếu số lượng không chia hết cho 3 và có dư, thì col-md-4 cho các item đầy đủ,
                                // phần dư sẽ xuống hàng dưới với col-md-4 (hoặc col-md-6 nếu chỉ còn 1 hoặc 2 item)
                                else {
                                    if ($index < $count - ($count % 3)) {
                                        $colSize = 4; // Các phần chia hết cho 3
                                    } else {
                                        $colSize = ($count - $index == 1 || $count - $index == 2) ? 6 : 4;
                                    }
                                }
                            ?>
                                <div class="col-md-<?php echo $colSize; ?> col-6">
                                    <button class="btn btn-secondary">
                                        <?php echo $t['Topic_Name']; ?>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <hr>
                    <h5 style="margin: 10px 20px; font-weight:500; font-size: 20px;">Contents</h5>
                    <div class="row" style="gap: 13px;">
                        <div class="row">
                            <?php 
                            $count = count($contents); // Đếm số lượng button
                            $colSize = 4; // Mặc định chia theo col-md-4

                            foreach($contents as $index => $t): 
                                // Nếu số lượng là 2, thì chia mỗi cái là col-md-6
                                if ($count == 2) {
                                    $colSize = 6;
                                }
                                // Nếu số lượng là 3, chia mỗi cái là col-md-4
                                elseif ($count == 3) {
                                    $colSize = 4;
                                } 
                                // Nếu số lượng chia hết cho 3 thì mỗi cái sẽ là col-md-4
                                elseif ($count % 3 == 0) {
                                    $colSize = 4;
                                } 
                                // Nếu số lượng không chia hết cho 3 và có dư, thì col-md-4 cho các item đầy đủ,
                                // phần dư sẽ xuống hàng dưới với col-md-4 (hoặc col-md-6 nếu chỉ còn 1 hoặc 2 item)
                                else {
                                    if ($index < $count - ($count % 3)) {
                                        $colSize = 4; // Các phần chia hết cho 3
                                    } else {
                                        $colSize = ($count - $index == 1 || $count - $index == 2) ? 6 : 4;
                                    }
                                }
                            ?>
                                <div class="col-md-<?php echo $colSize; ?> col-6">
                                    <button class="btn btn-secondary">
                                        <?php echo $t['Content_Name']; ?>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <hr>
                    <h5 style="margin: 10px 20px; font-weight:500; font-size: 20px;">Events</h5>
                    <div class="row" style="gap: 13px;">
                        <div class="row">
                            <?php 
                            $count = count($events); // Đếm số lượng button
                            $colSize = 4; // Mặc định chia theo col-md-4

                            foreach($events as $index => $t): 
                                // Nếu số lượng là 2, thì chia mỗi cái là col-md-6
                                if ($count == 2) {
                                    $colSize = 6;
                                }
                                // Nếu số lượng là 3, chia mỗi cái là col-md-4
                                elseif ($count == 3) {
                                    $colSize = 4;
                                } 
                                // Nếu số lượng chia hết cho 3 thì mỗi cái sẽ là col-md-4
                                elseif ($count % 3 == 0) {
                                    $colSize = 4;
                                } 
                                // Nếu số lượng không chia hết cho 3 và có dư, thì col-md-4 cho các item đầy đủ,
                                // phần dư sẽ xuống hàng dưới với col-md-4 (hoặc col-md-6 nếu chỉ còn 1 hoặc 2 item)
                                else {
                                    if ($index < $count - ($count % 3)) {
                                        $colSize = 4; // Các phần chia hết cho 3
                                    } else {
                                        $colSize = ($count - $index == 1 || $count - $index == 2) ? 6 : 4;
                                    }
                                }
                            ?>
                                <div class="col-md-<?php echo $colSize; ?> col-6">
                                    <button class="btn btn-secondary">
                                        <?php echo $t['Event_Name']; ?>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <hr>
                    <h5 style="margin: 10px 20px; font-weight:500; font-size: 20px;">Biography</h5>
                    <div style="background:transparent; border:none; margin: 10px 10px; resize: none; font-size: 18px; height:auto" readonly class="form-control"><?php 
                                    
                        $biography = $influencers['Influ_Biography'];
                                    
                        $formattedBiography = str_replace('. ', '.<br><br>', $biography);
                                    
                        echo nl2br($formattedBiography); 
                    ?></div>

                    <hr>
                    <h5 style="margin: 10px 20px; font-weight:500; font-size: 20px;">Achievement</h5>
                    <div style="background:transparent; border:none; margin: 10px 10px; resize: none; font-size: 18px; height:auto" readonly class="form-control"><?php 
                                    
                        $biography = $influencers['Influ_Achivement'];
                                    
                        $formattedBiography = str_replace('. ', '.<br><br>', $biography);
                                    
                        echo nl2br($formattedBiography); 
                    ?></div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="profile-card">
                    <p style="margin: 20px 20px 0 20px; font-size: 16px; font-weight: 500">Booking Recieved: 20</p>
                    <p style="margin: 10px 20px; font-size: 16px; font-weight: 500">20 feedbacks</p>
                    <a href="index.php?action=customer_createbooking&influ_id=<?php echo $influ_id; ?>"><button class="btn btn-booking">BOOKING</button></a>
                    <br>
                    <button style="margin: 10px 37px; width: 218px; height: 50px; font-weight: 600;font-size: 18px;" class="btn btn-secondary">MAIL</button>
                    <br>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;">
            <div class="col-md-7">
                <div class="feeds">
                    <h5 style="margin: 10px 20px; font-weight:500; font-size: 20px;">Feeds</h5>
                    <?php 
                        // Kiểm tra số lượng bài viết
                        $totalArticles = count($articles);

                        // Hiển thị bài viết đầu tiên nếu có
                        if ($totalArticles > 0):
                            $a = $articles[0]; // Lấy bài viết đầu tiên
                    ?>
                            <div class="d-flex align-items-center mb-3" style="margin: 10px 20px;">
                                <img class="img" src="<?php echo $a['Influ_Image'] ?>" alt="">
                                <div class="ms-3">
                                    <h6 style="font-size: 17px;" class="mb-0"><?php echo $a['Influ_Nickname'] ?></h6>
                                    <small><?php echo $a['Post_CreateTime'] ?></small>
                                </div>
                            </div>
                            <h5 style="margin: 10px 20px; font-weight:400; font-size: 20px;"><?php echo $a['Post_Title'] ?></h5>
                            <div style="background:transparent; border:none; resize: none; font-size: 18px; margin: 10px 10px; font-weight: 300;" readonly class="form-control"><?php echo $a['Post_Content'];?></div>
                            <p style="margin: 10px 20px; font-weight:300; font-size: 18px;"><?php echo $a['Post_Hastag'];?></p>

                            <div class="row" style="margin: auto;">
                                <?php 
                                    $otherImagess = explode(',', $a['Post_Image']);
                                    $otherImagess = array_filter(array_map('trim', $otherImagess));
                                    $count = count($otherImagess);
                                    
                                    if ($count > 0): 
                                        foreach ($otherImagess as $index => $imagePath): 
                                            // Xử lý số lượng 3 ảnh
                                            if ($count == 3) {
                                                if ($index < 2) { 
                                                    $colSize = 6; // 2 ảnh đầu là col-md-6
                                                    $marginTop = 0;
                                                } else {
                                                    $colSize = 12;
                                                    $marginTop = 20; // Ảnh cuối là col-md-12
                                                }
                                            } 
                                            // Xử lý số lượng 4 ảnh
                                            else if ($count == 4) {
                                                $colSize = 6; // Tất cả đều là col-md-6
                                                $marginTop = 20;
                                            } 

                                            else if ($count == 2) {
                                                $colSize = 6; // Tất cả đều là col-md-6
                                                
                                            } 
                                            // Các trường hợp khác, mặc định là col-md-12
                                            else {
                                                $colSize = 12;
                                                $marginTop = 20;
                                            }
                                ?>
                                            <div class="col-md-<?php echo $colSize; ?>" style="margin-top: <?php echo $marginTop; ?>px;">
                                                <img style="object-fit:cover; border-radius: 10px; max-width:100%" src="<?php echo htmlspecialchars($imagePath); ?>" width="95%" height="450" class="image-fluid"/>
                                            </div>
                                <?php 
                                        endforeach; 
                                    endif; 
                                ?>
                            </div>

                            <div class="row" style="margin: 10px 20px;">
                                <div class="col-md-12">
                                    <?php $videoSrc = $a['Post_Video']; ?>
                                    <?php if (!empty($videoSrc)): ?>
                                        <video src="<?php echo htmlspecialchars($videoSrc); ?>" width="100%" height="400" controls></video>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Hiển thị nút "See More Article" nếu có nhiều hơn 1 bài viết -->
                            <?php if ($totalArticles > 1): ?>
                                <div class="d-flex justify-content-center mt-4">
                                    <a href="index.php?action=customer_allPost&id=<?php echo $a['Influ_ID'] ?>"><button class="btn mt-3">See More Article</button></a>
                                </div>
                            <?php endif; ?>

                    <?php else: ?>
                        <p style=" font-size: 18px; color: #333; margin: 10px 20px;">This influencer has not posted anything yet.</p>
                    <?php endif; ?>

                </div>

            </div>

            <div class="col-md-5">
                <div class="feedbacks">
                    <h5 style="margin: 10px 20px; font-weight:500; font-size: 20px;">Feedbacks</h5>
                    <div class="d-flex align-items-center mb-3" style="margin: 10px 20px;">
                        <img src="././views/Img/quan.png">
                        <div class="ms-3">
                            <h6 class="mb-0">QuanDH</h6>
                            <small>21:05:32 22/08/2024</small>
                        </div>
                        <div class="ms-auto">
                            <small>Book 2 days</small>
                        </div>
                    </div>
                    <p style="margin: 10px 20px;">KOC's booking process is very quick and professional, the results exceed expectations!</p>

                    <hr style="margin: 10px 20px;">
                    <div class="d-flex align-items-center mb-3" style="margin: 10px 20px;">
                        <img src="././views/Img/tuyen.png">
                        <div class="ms-3">
                            <h6 class="mb-0">TuyenPD</h6>
                            <small>20:05:32 20/08/2024</small>
                        </div>
                        <div class="ms-auto">
                            <small>Book 2 days</small>
                        </div>
                    </div>
                    <p style="margin: 10px 20px;">Working with you was easy, you were always on time and her creative content fit our campaign</p>

                    <hr style="margin: 10px 20px;">
                    <div class="d-flex align-items-center mb-3" style="margin: 10px 20px;">
                        <img src="././views/Img/Chu.png">
                        <div class="ms-3">
                            <h6 class="mb-0">ChuNH</h6>
                            <small>13:05:32 10/08/2024</small>
                        </div>
                        <div class="ms-auto">
                            <small>Book 2 days</small>
                        </div>
                    </div>
                    <p style="margin: 10px 20px;">Booking you was the right decision, you understands the product well and conveys naturally</p>

                    <hr style="margin: 10px 20px;">
                    <div class="d-flex align-items-center mb-3" style="margin: 10px 20px;">
                        <img src="././views/Img/u57_div.jpg">
                        <div class="ms-3">
                            <h6 class="mb-0">HuyVH</h6>
                            <small>11:05:32 02/08/2024</small>
                        </div>
                        <div class="ms-auto">
                            <small>Book 1 day</small>
                        </div>
                    </div>
                    <p style="margin: 10px 20px;">Very satisfied with the results when working with you, creative review content and high communication effectiveness</p>
                </div>
            </div>
        </div>
    </div>

    <?php include '././views/Layout/homepage_footer.php'?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        let startIndex = 0;  // Biến lưu chỉ mục ảnh hiện tại
        const images = <?php echo json_encode($otherImages); ?>; // Chuyển mảng ảnh sang JavaScript
        const visibleCount = 4; // Số lượng ảnh được hiển thị ban đầu

        // Hàm cập nhật các ảnh hiển thị
        function updateVisibleImages() {
            const imageContainer = document.getElementById("imageContainer");
            imageContainer.innerHTML = ''; // Xóa ảnh cũ
            const currentImages = images.slice(startIndex, startIndex + visibleCount); // Cắt mảng ảnh từ startIndex
            
            currentImages.forEach(imagePath => {
                const imgElement = document.createElement("img");
                imgElement.classList.add("carousel-image");
                imgElement.style.borderRadius = "10px";
                imgElement.style.objectFit = "cover";
                imgElement.style.cursor = "pointer";
                imgElement.src = imagePath;
                imgElement.width = 45;
                imgElement.height = 45;
                imgElement.onclick = () => changeProfileImage(imagePath);
                
                const colDiv = document.createElement("div");
                colDiv.classList.add("col-md-3");
                colDiv.appendChild(imgElement);
                
                imageContainer.appendChild(colDiv);
            });
        }

        // Hàm di chuyển sang trái
        function slideLeft() {
            if (startIndex > 0) {
                startIndex -= 1; // Di chuyển về ảnh trước
                updateVisibleImages();
            }
        }

        // Hàm di chuyển sang phải
        function slideRight() {
            if (startIndex + visibleCount < images.length) {
                startIndex += 1; // Di chuyển đến ảnh tiếp theo
                updateVisibleImages();
            }
        }


        // Hiển thị 4 ảnh đầu tiên khi trang được tải
        document.addEventListener('DOMContentLoaded', updateVisibleImages);

        // Hàm thay đổi ảnh profile và ảnh fullscreen
        function changeProfileImage(newSrc) {
            document.getElementById("mainProfileImage").src = newSrc;
            document.getElementById("fullscreenImage").src = newSrc;
        }

        // Hiển thị ảnh fullscreen khi nhấp vào profile-image
        function showFullscreenImage() {
            var fullscreenImage = document.getElementById("fullscreenImage");
            fullscreenImage.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        // Ẩn ảnh fullscreen khi nhấp vào ảnh đó
        document.addEventListener('DOMContentLoaded', function() {
            var fullscreenImage = document.getElementById("fullscreenImage");
            fullscreenImage.addEventListener('click', function() {
                fullscreenImage.style.display = 'none';
                document.body.style.overflow = 'auto';
            });
        });
    </script>

        
</body>
</html>