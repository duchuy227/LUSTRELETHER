<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="././views/Layout/homepage.css?v=1.0">
    <title>Send An Email</title>
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


    .btn1{
        background-color: #F0564A;
        color: white;
        border-radius: 10px;
        padding: 10px 20px;
        border: none;
        font-size: 20px;
        font-weight: 500;
        width: 220px;
    }

    .btn1:hover {
        background-color: #F0564A;
        color: white;
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

    .img {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        object-fit: cover;
    }

    .btn-primary {
        width: 120px;
        height: 38px;
    }

    .label {
        font-size: 18px;
        color: #000;
        font-weight: 400;
        margin-bottom: 10px;
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
                <div class="d-flex justify-content-center mt-4" style="margin-bottom: 20px;">
                    <a href="index.php?action=customer_influencerDetail&id=<?php echo $influencers['Influ_ID'] ?>">
                        <button class="btn btn1 mt-3">BACK</button>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <form method="post">
                    <div class="profile-card1">
                        <h5 style="text-align: center; font-weight:500; font-size: 30px; margin: 20px">Send An Email</h5>
                        
                        <div class="col-md-12" style="margin: 20px; width: 93%">
                            <label class="label">Influencer</label>
                            <input type="text" class="form-control" name="nickname" value="<?php echo $influencers['Influ_Nickname']; ?>" readonly>
                            <input type="text" class="form-control" name="influ_id" value="<?php echo $influencers['Influ_ID']; ?>" hidden>
                        </div>

                        <div class="col-md-12" style="margin: 20px; width: 93%">
                            <label class="label">Title</label>
                            <input name="title" type="text" class="form-control" required>
                        </div>

                        <div class="col-md-12" style="margin: 20px; width: 93%">
                            <label class="label">Content</label>
                            <textarea name="content" class="form-control" name="" rows="5" required></textarea>
                        </div>

                        <div class="d-flex justify-content-center mt-2 mb-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <br>
                    </div>
                </form>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="profile-card">
                    <p style="margin: 20px 20px 0 20px; font-size: 16px; font-weight: 500">Booking Recieved: 20</p>
                    <p style="margin: 10px 20px; font-size: 16px; font-weight: 500">20 feedbacks</p>
                    
                    <br>
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