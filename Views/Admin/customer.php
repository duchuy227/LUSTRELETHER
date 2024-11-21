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
    <title>Customer</title>
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

    main .recent_order{
        margin-top: 2rem;
        background: var(--clr-white);
        width: 100%;
        height: auto;
        border-radius: 20px;
    }

    main .recent_order a{
        text-align: center;
        display: block;
        margin: 0;
        text-decoration: none;
        color: #fff;
    }

    .profile .col-md-6 {
        margin: 20px;
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

    .recent_order .profile table {
        margin: 0 auto;
        width: 90%;
    }

    

    .inputBx {
        position: relative;
        width: 235px;
        height: 40px;
        background: #FFFFFF;
        border-radius: 10px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding-left: 10px;
        margin: 0px;
        gap: 10px;
        overflow: hidden;
    }

    .inputBx input {
        position: relative;
        width: 100%;
        height: 25px;
        outline: none;
        border: none;
        background: transparent;
        margin-right: 10px;
        font-size: 1.2em;
        color: #000;
    }

    .inputBx input::placeholder {
        color: #8C7E7E;
        font-size: 18px;
        font-weight: 400;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
            height: 180px;
            border: 2px solid #000000;
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

        .pagination {
        margin-bottom: 20px;    
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        }
        .pagination button {
            margin-right: 10px;
            cursor: pointer;
            background-color: #fff;
            border: 1px solid #797979;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 16px;
            width: 40px;
            
        }
        .pagination button:hover {
            background-color: #e0e0e0;
        }
    
        

</style>
<body>
    <div class="container1">
        <?php include 'admin_sidebar.php' ?>

        <main>
            <div class="row align-items-center">

                <div class="col-md-9 d-flex align-items-center">
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333">Customers</h2>
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

            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6 d-flex justify-content-start align-items-center">
                    <div class="row">
                        <a href="index.php?action=admin_addcustomer"><button style="width: auto; color: white; font-weight: 500; margin:20px" type="submit" class="btn btn-primary">Add Customer</button></a>
                    </div>
                </div>

                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <form method="post">
                        <div class="inputBx">
                            <img src="././Views/Img/search.png" alt="" width="30" height="30">
                            <input name="username" type="text" placeholder="Search . . .">
                        </div>
                    </form>
                </div>
            </div>

            <div class="recent_order">
                <div class="profile">
                    <br>
                    <h3 style="text-align: center;">List of customers</h3>
                    <br>
                    <div class="table-responsive">
                        <?php if (!empty($message)): ?>
                            <p style="color: red; text-align: center; font-size: 20px; margin-top: 20px"><?php echo $message; ?></p>
                        <?php endif; ?>
                        
                        <?php if (!empty($customers)): ?>
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-active">
                                    <th style="font-size: 18px; font-weight: 400">Username</th>
                                    <th style="font-size: 18px; font-weight: 400;">Email</th>
                                    <th style="font-size: 18px; font-weight: 400;">Fullname</th>
                                    <th style="font-size: 18px; font-weight: 400;">Date of birth</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="hello">
                                <?php foreach ($customers as $c): ?>
                                <tr>
                                    <td style="font-size: 16px; font-weight: 400; color: #333333" scope="row">
                                        <?php echo $c['Cus_Username']; ?>
                                    </td>
                                    <td style="font-size: 16px; font-weight: 400; color: #333333" scope="row">
                                        <?php echo $c['Cus_Email']; ?>
                                    </td>
                                    <td style="font-size: 16px; font-weight: 400; color: #333333" scope="row">
                                        <?php echo $c['Cus_Fullname']; ?>
                                    </td>
                                    <td style="font-size: 16px; font-weight: 400; color: #333333" scope="row">
                                        <?php echo $c['Cus_DOB']; ?>
                                    </td>
                                    <td style="font-size: 16px; font-weight: 400;" scope="row">
                                        <div class="row d-flex justify-content-center" style="gap: 10px;">
                                            <a href="index.php?action=admin_editcustomer&id=<?php echo $c['Cus_ID']; ?>">
                                                <img src="././Views/Img/u550.png" width="30" height="30">
                                            </a>

                                            <a href="index.php?action=admin_detailcustomer&id=<?php echo $c['Cus_ID']; ?>">
                                                <img src="././Views/Img/u223.png" width="30" height="30">
                                            </a>

                                            <a href="index.php?action=admin_deletecustomer&id=<?php echo $c['Cus_ID']; ?>" onclick="openPopup(event);">
                                                <img src="././Views/Img/deletecus_u544.png" width="30" height="30">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                    <div class="pagination"></div>
                    <div id="deletePopup" class="popup">
                        <div class="popup-content">
                            <p>Are you sure to delete <br>this customer?</p>
                            <button id="confirmDelete" class="delete-btn">Delete</button>
                            <button id="cancelDelete" class="cancel-btn">Cancel</button>
                        </div>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var perPage = 5;
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