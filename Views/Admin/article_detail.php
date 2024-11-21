<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/Admin/style.css?v=1.0">
    <title>Article Detail</title>
</head>
<style>
    *{
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }
    aside .top .logo h2 {
        font-weight: 600;
        margin-top: 5px;
    }

    .container1  {
        display: grid;
        width: 96%;
        gap: 1.8rem;
        grid-template-columns: 250px auto;
        margin: 0 auto;
    }

    main .recent_order{
        margin-top: 2rem;
        background: var(--clr-white);
        width: 100%;
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

    
    .fixed-size-img {
        width: 200px; /* Đặt chiều rộng cố định */
        height: 200px; /* Đặt chiều cao cố định */
        object-fit: cover; /* Giúp ảnh được cắt để vừa với khung */
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
        <?php include 'admin_sidebar.php' ?>

        <main>
            <div class="row align-items-center">

                <div class="col-md-9 d-flex align-items-center">
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333">Article Detail</h2>
                </div>

                <div class="col-md-3 d-flex align-items-center justify-content-end">
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
                    <br>
                    <h3 style="text-align: center;">Detail of Article</h3>
                    <br>
                    <div class="row mb-3">
                        <div class="col-md-4 d-flex justify-content-center">
                            <span>Create Date</span>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $article['Post_CreateTime'] ?></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 d-flex justify-content-center">
                            <span>Influencer</span>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $article['Influ_Username'] ?></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 d-flex justify-content-center">
                            <span>Title</span>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $article['Post_Title'] ?></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 d-flex justify-content-center">
                            <span>Hashtag</span>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $article['Post_Hastag'] ?></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 d-flex justify-content-center">
                            <span>Content</span>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $article['Post_Content'] ?></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 d-flex justify-content-center">
                            <span>Status</span>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $article['Post_Status'] ?></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 d-flex justify-content-center">
                            <span>Images</span>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <?php 
                                    $otherImages = explode(',', $article['Post_Image']);
                                    $count = count($otherImages);
                                
                                    $colSize = 12;
                                    if ($count == 2) $colSize = 6;
                                    if ($count == 3) $colSize = 4; 
                                    if ($count == 4) $colSize = 3;
                        
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
                    <div class="row mb-3">
                        <div class="col-md-4 d-flex justify-content-center">
                            <span>Video</span>
                        </div>
                        <?php
                            // Kiểm tra xem có video hay không
                            $videoSrc = $article['Post_Video'];
                        ?>
                        <div class="col-md-8">
                            <?php if (!empty($videoSrc)): // Kiểm tra nếu video không trống ?>
                                <video src="<?php echo htmlspecialchars($videoSrc); ?>" width="200" height="200" controls></video>                    
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <a href="index.php?action=admin_article">
                            <button type="button" class="btn btn-success">List Article</button>
                        </a>
                    </div>
                    <br>
                </div>
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
        document.addEventListener("DOMContentLoaded", function() {
            var perPage = 4;
            var topics = document.querySelectorAll(".table .hello tr"); 
            var totalPages = Math.ceil(topics.length / perPage); 
            showPage(1);

            var pagination = document.querySelector(".pagination");
            for (var i = 1; i <= totalPages; i++) {
                var button = document.createElement("button");
                button.textContent = i;
                button.addEventListener("click", function() {
                    var page = parseInt(this.textContent);
                    showPage(page);
                });
                pagination.appendChild(button);
            }

            function showPage(page) {
                var start = (page - 1) * perPage;
                var end = start + perPage;

                topics.forEach(function(topic) {
                    topic.style.display = "none";
                });

                for (var i = start; i < end && i < topics.length; i++) {
                    topics[i].style.display = "table-row";
                }
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>