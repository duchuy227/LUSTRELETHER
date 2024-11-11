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
    <title>Detail Article</title>
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
        height: auto; 
        background-color: rgba(255, 255, 255, 1);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
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
    

    .info span {
        font-size: 18px;
        color: #3D67BA;
        font-weight: 600;

    }

    .info p {
        font-size: 18px;
        color: #333333;
    }

    .popup {
        display: none; /* Ẩn popup mặc định */
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 90%;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 10px 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 400px;
        height: 180px;
        border: 1px solid #333;
    }

    .popup-content p {
        font-size: 20px;
        font-weight: 400;
    }

    .delete-btn {
        background-color: #d9534f; /* Màu đỏ cho nút xóa */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
        font-size: 16px;
        font-weight: 300;
    }

    .cancel-btn {
        background-color: #6c757d; /* Màu xám cho nút cancel */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 300;
    }

    .fixed-size-img {
        width: 200px; /* Đặt chiều rộng cố định */
        height: 200px; /* Đặt chiều cao cố định */
        object-fit: contain; /* Giúp ảnh được cắt để vừa với khung */
    }

    .col-md-4 {
        color: #3D67BA;
        font-size: 18px;
        font-weight: 500;
    }

    .col-md-8 a{
        font-size: 18px;
        color: #333;
        font-weight: 400;
        text-decoration: none;
        cursor: pointer;
    }

    .col-md-8 p{
        font-size: 18px;
        color: #333;
        font-weight: 400;
        
    }
    

</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>Detail Article</h2>
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
                <div class="container">
                        <div class="row">
                            <div class="projectCardd">
                                <div class="projectTopp">
                                    <h4 class="text-center">Article Detail</h4>
                                    <br>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <span>Create Date</span>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $article['Post_CreateTime'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <span>Title</span>
                                        </div>
                                        <div class="col-md-8">
                                            <a href="https://translate.google.com/?sl=en&tl=vi&text=<?php echo urlencode($article['Post_Title']); ?>&op=translate" target="_blank">
                                                <p><?php echo $article['Post_Title'] ?></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <span>Content</span>
                                        </div>
                                        <div class="col-md-8">
                                            <a href="https://translate.google.com/?sl=en&tl=vi&text=<?php echo urlencode($article['Post_Content']); ?>&op=translate" target="_blank">
                                                <?php echo $article['Post_Content']; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <span>Hashtag</span>
                                        </div>
                                        <div class="col-md-8">
                                            <a href="https://translate.google.com/?sl=en&tl=vi&text=<?php echo urlencode($article['Post_Hastag']); ?>&op=translate" target="_blank">
                                                <?php echo $article['Post_Hastag']; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <span>Images</span>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                            <?php 
                                                $otherImages = explode(',', $article['Post_Image']);
                                                $count = count($otherImages); // Đếm số lượng ảnh
                                
                                                // Dựa trên số lượng ảnh, chọn kích thước cột phù hợp
                                                $colSize = 12; // Mặc định cho trường hợp chỉ có 1 ảnh
                                                if ($count == 2) $colSize = 6;  // 2 ảnh: mỗi ảnh chiếm 6 cột
                                                if ($count == 3) $colSize = 4;  // 3 ảnh: mỗi ảnh chiếm 4 cột
                                                if ($count == 4) $colSize = 3;  // 4 ảnh: mỗi ảnh chiếm 3 cột
                        
                                                
                                                foreach ($otherImages as $image) { 
                                                ?>
                                                    <div class="col-md-<?php echo $colSize; ?> mb-3">
                                                        <img src="<?php echo trim($image); ?>" width="200" height="200" class=" fixed-size-img">
                                                    </div>
                                                <?php 
                                                } 
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <span>Video</span>
                                        </div>
                                        <div class="col-md-8">
                                            <video src="<?php echo $article['Post_Video'] ?>" width="200" height="200" controls></video>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-4">
                                        <a href="index.php?action=influencer_article">
                                            <button type="button" class="btn btn-success">List Article</button>
                                        </a>
                                    </div>
                                </div>
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