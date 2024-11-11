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
    <title>Article</title>
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
        height: 530px; 
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

    

</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>Articles</h2>
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="index.php?action=influencer_addarticle">
                                    <button class="btn btn-primary">Add Article</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="projectCardd">
                                <div class="projectTopp">
                                    <h4 class="text-center">List of Articles</h4>
                                    <br>
                                    <div class="table-responsive">
                                        <table style="max-width:100%" class="table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th style="font-size: 16px; font-weight: 400; ">Date time</th>
                                                    <th style="font-size: 16px; font-weight: 400; ">Title</th>
                                                    <th style="font-size: 16px; font-weight: 400;">Content</th>
                                                    <th style="font-size: 16px; font-weight: 400; white-space: nowrap;">Status</th>
                                                    <th scope="col">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($article as $a): ?>
                                                <tr>
                                                    <td><?php echo $a['Post_CreateTime']; ?></td>
                                                    <td><?php echo $a['Post_Title']; ?></td>
                                                    <td>
                                                        <textarea readonly style="background: transparent; width: 100%; border:none" cols="30" rows="3"><?php echo $a['Post_Content']; ?></textarea>
                                                    </td>
                                                    <td><?php echo $a['Post_Status']; ?></td>
                                                    <td style="font-size: 16px; font-weight: 400; text-align: center; width: 100px" scope="row">
                                                        <div style="margin: auto; width: 100px;" class="d-inline-flex justify-content-between align-items-center">
                                                            <a href="index.php?action=influencer_editarticle&id=<?php echo  $a['Post_ID']; ?>">
                                                                <img  src="././Views/Img/u550.png" width="30" height="30" alt="Edit">
                                                            </a>
                                                            <a href="index.php?action=influencer_detailarticle&id=<?php echo  $a['Post_ID']; ?>">
                                                                <img style="margin-right: 5px;" src="././Views/Img/u223.png" width="30" height="30">
                                                            </a>
                                                            <a href="index.php?action=influencer_deletearticle&id=<?php echo  $a['Post_ID']; ?>" onclick="openPopup(event);">
                                                                <img  src="././Views/Img/deletecus_u544.png" width="30" height="30">
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div id="deletePopup" class="popup">
                                            <div class="popup-content">
                                                <p>Are you sure to delete <br>this article?</p>
                                                <button id="confirmDelete" class="delete-btn">Delete</button>
                                                <button id="cancelDelete" class="cancel-btn">Cancel</button>
                                            </div>
                                        </div>
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
        function openPopup(event) {
            event.preventDefault(); // Ngăn không cho chuyển trang ngay lập tức
            document.getElementById("deletePopup").style.display = "flex"; // Hiển thị popup

            // Lấy URL của hành động xóa
            const deleteUrl = event.currentTarget.href;

            // Xử lý khi người dùng nhấn nút "Delete"
            document.getElementById("confirmDelete").onclick = function() {
                window.location.href = deleteUrl; // Chuyển hướng đến URL xóa nếu người dùng xác nhận
            };

            // Xử lý khi người dùng nhấn nút "Cancel"
            document.getElementById("cancelDelete").onclick = function() {
                document.getElementById("deletePopup").style.display = "none"; // Đóng popup
            };
        }

    </script>

</body>
</html>