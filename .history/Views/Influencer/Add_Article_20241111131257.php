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
    <title>Add Article</title>
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
    

    .info span {
        font-size: 18px;
        color: #3D67BA;
        font-weight: 600;

    }

    .info p {
        font-size: 18px;
        color: #333333;
    }

    

    .form-group label {
        font-size: 18px;
        color: #847F7F;
        font-weight: 500;
    }

    .btn-success {
        margin-top: 20px;
        width: 140px;
        border-radius: 25px;
        border: none;
        font-size: 18px;
        height: 40px;
        font-weight: 600;
    }

    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        text-align: center;
        border-radius: 20px;
        width: 450px;
        height: auto;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        border: 1px solid #333333;
    }

    .cancel-btn {
        background-color: #888;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 30px;
        width: 111px;
    }

</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>Add Article</h2>
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="projectCardd">
                                <div class="projectTopp">
                                    <h4 style="color: #847F7F; font-size: 26px; font-weight:bold" class="text-center">Add New Article</h4>
                                    <br>
                                    <form id="addArticleForm" enctype="multipart/form-data" method="post" onsubmit="return handleFormSubmit(event);">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Title</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Hastag</label>
                                                <input type="text" class="form-control" id="title" name="hastag">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Image</label>
                                                <input style="border:none" name="influ_other_images[]" class="form-control" type="file" multiple>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Video (Optional)</label>
                                                <input style="border:none" name="video" class="form-control" type="file">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="">Content</label>
                                                <textarea name="content" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <input type="radio">
                                                <a style="text-decoration: none; color: #333333" href="index.php?action=influencer_term"> I agree to the terms and conditionals</a>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button type="submit" id="submitBtn" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                    <div id="violationPopup" class="popup" style="display: none;">
                                        <div class="popup-content">
                                            <img src="././views/Img/u118.png" alt="Warning" style="width: 50px; height: 50px">
                                            <?php if (!empty($errorMessage)): ?>
                                                <div id="violationMessage"><?php echo $errorMessage; ?></div>
                                            <?php endif; ?>
                                            <button id="closePopup" class="cancel-btn">Close</button>
                                        </div>
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


    <script>
        // Lấy lỗi từ PHP, nếu có, và đặt vào biến errorMessage
        let errorMessage = <?php echo json_encode(isset($errorMessage) ? $errorMessage : ''); ?>;

        document.addEventListener("DOMContentLoaded", function() {
            // Nếu có lỗi, hiển thị popup ngay khi trang vừa tải xong
            if (errorMessage) {
                document.getElementById("violationMessage").innerHTML = errorMessage;
                document.getElementById("violationPopup").style.display = "flex";
            }
        });

        // Xử lý khi submit form
        document.getElementById("addArticleForm").onsubmit = function(event) {
            if (errorMessage) {
                event.preventDefault(); // Ngăn form gửi đi
                document.getElementById("violationMessage").innerHTML = errorMessage;
                document.getElementById("violationPopup").style.display = "flex";
            }
        };

        // Đóng popup khi bấm nút Close và reset errorMessage
        document.getElementById("closePopup").onclick = function() {
            document.getElementById("violationPopup").style.display = "none";
            document.getElementById("violationMessage").innerHTML = ""; // Xóa nội dung thông báo
            errorMessage = ""; // Reset biến errorMessage
        };
    </script>


</body>
</html>