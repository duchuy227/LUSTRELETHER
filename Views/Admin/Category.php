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
    <title>Category</title>
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
        margin-bottom: 20px;
        background: var(--clr-white);
        width: 970px;
        height: auto;
        border-radius: 20px;
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

    main .recent_order a{
        text-align: center;
        display: block;
        margin: 0;
        text-decoration: none;
        color: #fff;
    }

    .row .btn {
        border-radius: 10px;
            font-size: 16px;
            font-weight: 500;
            width: 120px;
            height: 40px;
            text-transform: uppercase;
            color: #fff;
    }


        .recent_order .profile table {
            margin: 0 auto;
            width: 80%;
        }

        .recent_order .profile table tbody td textarea {
            font-weight: 300;
            vertical-align: top;
        }

        .recent_order .profile .btn {
            margin-bottom: 10px;
            margin-left: 100px;
            background-color: #7380EC;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            width: 120px;
            height: 33px;
            text-transform: uppercase;
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

        .pagination1 {
        margin-bottom: 20px;    
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        }
        .pagination1 button {
            margin-right: 10px;
            cursor: pointer;
            background-color: #fff;
            border: 1px solid #797979;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 16px;
            width: 40px;
            
        }
        .pagination1 button:hover {
            background-color: #e0e0e0;
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

        .popup1 {
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

</style>
<body>
    <div class="container1">
        <?php include 'admin_sidebar.php' ?>

        <main>
            <div class="row align-items-center">

                <div class="col-md-9 d-flex align-items-center">
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333">Category</h2>
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
            <br>

            <div class="row" style="margin-left: 10px; margin-top: 10px">
                <div class="col-md-3">
                    <button class="btn btn-success" onclick="scrollToSection('topics')">Topics</button>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary" onclick="scrollToSection('events')">Events</button>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-danger" onclick="scrollToSection('contents')">Contents</button>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-secondary" onclick="scrollToSection('violation')">Violation</button>
                </div>
            </div>

            <div id="topics" class="recent_order">
                <div class="profile">
                    <br>
                    <h3 style="text-align: center;">List of Topics</h3>
                    <button class="btn">
                        <a href="index.php?action=admin_addtopic">Add Topics</a>
                    </button>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-active">
                                <th style="font-size: 18px; font-weight: 400">Name</th>
                                <th style="font-size: 18px; font-weight: 400; width: 40%">Description</th>
                                <th style="font-size: 18px; font-weight: 400">Image</th>
                                <th style="font-size: 18px; font-weight: 400">Content</th>
                                <th style="font-size: 18px; font-weight: 400">Event</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="hell">
                            <?php foreach ($topics as $t): ?>
                            <tr>
                                <td style="font-size: 16px; font-weight: 300; color: #333333" scope="row">
                                    <?php echo $t['Topic_Name'] ?>
                                </td>
                                <td style="font-size: 16px; font-weight: 300; width: 30%; " scope="row">
                                    <textarea readonly style="background: transparent; width: 100%; margin: 0; padding: 0; resize: none" cols="30" rows="3">
                                        <?php echo $t['Topic_Description'] ?>
                                    </textarea>
                                </td>

                                <td style="font-size: 16px; font-weight: 300" scope="row">
                                    <img src="<?php echo $t['Topic_Image'] ?>" width="40" height="40">
                                </td>

                                <td style="font-size: 16px; font-weight: 300; text-align: left;" scope="row">
                                    <?php echo $t['Contents'] ?>
                                </td>

                                <td style="font-size: 16px; font-weight: 300; text-align: left;" scope="row">
                                    <?php echo $t['Events'] ?>
                                </td>

                                <td>
                                    <div>
                                        <a href="index.php?action=admin_edittopic&id=<?php echo $t['Topic_ID']; ?>">
                                            <img src="././Views/Img/u550.png" width="30" height="30">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- <div class="pagination2"></div> -->
                    <br>
                </div>
            </div>

            <div id="contents" class="recent_order">
                <div class="profile">
                    <br>
                    <h3 style="text-align: center;">List of Contents</h3>
                    <button class="btn">
                        <a href="index.php?action=admin_addContent">Add Content</a>
                    </button>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-active">
                                <th style="font-size: 18px; font-weight: 400">Name</th>
                                <th style="font-size: 18px; font-weight: 400; ">Description</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="he">
                            <?php foreach ($content as $c): ?>
                            <tr>
                                <td style="font-size: 16px; font-weight: 300; color: #333333" scope="row"><?php echo $c['Content_Name'] ?></td>
                                <td style="font-size: 16px; font-weight: 300" scope="row">
                                    <textarea readonly style="background: transparent; width: 100%;" cols="30"><?php echo $c['Content_Description'] ?></textarea>
                                </td>
                                <td>
                                    <div class="row" style="display: flex; justify-content: center; align-items: center; gap: 10px">
                                        <a href="index.php?action=admin_editContent&id=<?php echo $c['Content_ID']; ?>">
                                            <img src="././Views/Img/u550.png" width="30" height="30">
                                        </a>
                                        <a href="index.php?action=admin_deleteContent&id=<?php echo $c['Content_ID']; ?>" onclick="openPopup(event);">
                                            <img src="././Views/Img/deletecus_u544.png" width="30" height="30">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="pagination"></div>
                    <div id="deletePopup" class="popup">
                        <div class="popup-content">
                            <p>Are you sure to delete <br>this content?</p>
                            <button id="confirmDelete" class="delete-btn">Delete</button>
                            <button id="cancelDelete" class="cancel-btn">Cancel</button>
                        </div>
                    </div>
                    <br>
                </div>
            </div>


            <div id="events" class="recent_order">
                <div class="profile">
                    <br>
                    <h3 style="text-align: center;">List of Events</h3>
                    <button class="btn">
                        <a href="index.php?action=admin_addEvent">Add Event</a>
                    </button>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-active">
                                <th style="font-size: 18px; font-weight: 400">Name</th>
                                <th style="font-size: 18px; font-weight: 400">Description</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="hello">
                            <?php foreach ($event as $e): ?>
                            <tr>
                                <td style="font-size: 16px; font-weight: 300; color: #333333" scope="row"><?php echo $e['Event_Name'] ?></td>
                                <td style="font-size: 16px; font-weight: 300" scope="row">
                                    <textarea readonly style="background: transparent; width: 100%;" cols="30"><?php echo $e['Event_Description'] ?></textarea>
                                </td>
                                <td>
                                    <div class="row" style="display: flex; justify-content: center; align-items: center; gap: 10px">
                                        <a href="index.php?action=admin_editEvent&id=<?php echo $e['Event_ID']; ?>">
                                            <img src="././Views/Img/u550.png" width="30" height="30">
                                        </a>
                                        <a href="index.php?action=admin_deleteEvent&id=<?php echo $e['Event_ID']; ?>" onclick="openPopup(event);">
                                            <img src="././Views/Img/deletecus_u544.png" width="30" height="30">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="pagination1"></div>
                    <div id="deletePopup1" class="popup1">
                        <div class="popup-content">
                            <p>Are you sure to delete <br>this event?</p>
                            <button id="confirmDelete1" class="delete-btn">Delete</button>
                            <button id="cancelDelete1" class="cancel-btn">Cancel</button>
                        </div>
                    </div>
                    <br>
                </div>
            </div>

            <div id="violation" class="recent_order">
                <div class="profile">
                    <br>
                    <h3 style="text-align: center;">List of Violation</h3>
                    <button class="btn" style="width: 15%; margin-bottom: 10px;">
                        <a href="index.php?action=admin_addviolation">Add Violation</a>
                    </button>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-active">
                                <th style="font-size: 18px; font-weight: 400">Violation Name</th>
                                <th style="font-size: 18px; font-weight: 400;">Violation Word</th>
                                <th style="width: 10%" scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php foreach ($violation as $v): ?>
                            <tr>
                                <td style="font-size: 16px; font-weight: 300; color: #333333" scope="row">
                                    <?php echo $v['Vio_Name'] ?>
                                </td>
                                <td style="font-size: 16px; font-weight: 300; text-align: left" scope="row">
                                        <?php echo $v['Violation_Words'] ?>
                                </td>
                                <td>
                                    <div class="row" style="display: flex; justify-content: center; align-items: center; gap: 10px">
                                        <a href="index.php?action=admin_editviolation&id=<?php echo $v['Vio_ID']; ?>">
                                            <img src="././Views/Img/u550.png" width="30" height="30">
                                        </a>
                                        
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>

        </main>
    </div>

    
    <script>
        function scrollToSection(id) {
            document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
        }
    </script>

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
            var perPage = 3;
            var topics = document.querySelectorAll(".table .he tr"); 
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var perPage = 3;
            var topics = document.querySelectorAll(".table .hello tr"); 
            var totalPages = Math.ceil(topics.length / perPage); 
            showPage(1);

            var pagination = document.querySelector(".pagination1");
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

    <script>
        function openPopup(event) {
            event.preventDefault(); // Ngăn không cho chuyển trang ngay lập tức
            document.getElementById("deletePopup1").style.display = "flex"; // Hiển thị popup

            // Lấy URL của hành động xóa
            const deleteUrl = event.currentTarget.href;

            // Xử lý khi người dùng nhấn nút "Delete"
            document.getElementById("confirmDelete1").onclick = function() {
                window.location.href = deleteUrl; // Chuyển hướng đến URL xóa nếu người dùng xác nhận
            };

            // Xử lý khi người dùng nhấn nút "Cancel"
            document.getElementById("cancelDelete1").onclick = function() {
                document.getElementById("deletePopup1").style.display = "none"; // Đóng popup
            };
        }

    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>