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
    <link rel="stylesheet" href="./views/Admin/style.css">
    <title>Booking</title>
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

    .profile .col-md-6 {
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
        font-weight: 500;
    }

    .recent_order .profile table {
        margin: 0 auto;
        width: 80%;
    }

    
    .select {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        appearance: none;
        outline: none;
        box-shadow: none;
        border: 0!important;
        background-image: none;
        position: relative;
        display: flex;
        width: 15em;
        height: 40px;
        line-height: 2.5;
        background: #5c6664;
        overflow: hidden;
        border-radius: .25em;
        margin-left: 20px;
    }
    select ::-ms-expand {
        display: none;
    }

    select {
        flex: 1;
        padding: 0 .5em;
        background-color: #5c6664;
        color: #fff;
            cursor: pointer;
            font-size: 1.2em;
        }

        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            right: 0;
            padding: 5px 1em;
            background: #2b2e2e;
            cursor: pointer;
            pointer-events: none;
            transition: .25s all ease;
            color: #fff;
        }
        .select:hover::after{
            color: #23b499;
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
        margin-left: 40px;
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
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333">Bookings</h2>
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


            <div class="row" style="margin-top: 20px;">
                <div class="col-md-4">
                    <div class="row">
                        <div class="select">
                            <select name="fa_id" id="fa_id">
                                <option selected disabled>Type of service</option>
                            </select>
                        </div>
                            
                        <button style="margin-left: 20px; width: 90px; color: white; font-weight: 600;" type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>

                <div class="col-md-4 d-flex justify-content-center">
                    <div class="row">
                        <div class="select">
                            <select name="fa_id" id="fa_id">
                                <option selected disabled>Time</option>
                            </select>
                        </div>
                            
                        <button style="margin-left: 20px; width: 90px; color: white; font-weight: 600;" type="submit" class="btn btn-danger">Filter</button>
                    </div>
                </div>

                <div class="col-md-4 d-flex justify-content-end">
                    <div class="inputBx">
                        <img src="././Views/Img/search.png" alt="" width="30" height="30">
                        <input type="text" placeholder="Search . . .">
                        
                    </div>
                </div>
            </div>

            <div class="recent_order">
                <div class="profile">
                    <br>
                    <h3 style="text-align: center;">List of Bookings</h3>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-active">
                                <th style="font-size: 18px; font-weight: 400">Customer</th>
                                <th style="font-size: 18px; font-weight: 400;">Influencer</th>
                                <th style="font-size: 18px; font-weight: 400;">Service</th>
                                <th style="font-size: 18px; font-weight: 400;">Status</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="hello">
                            <?php foreach ($booking as $b): ?>
                            <tr>
                                <td style="font-size: 16px; font-weight: 300; color: #333333" scope="row">
                                    <?php echo $b['Cus_Username']; ?>
                                </td>
                                <td style="font-size: 16px; font-weight: 300; text-align: left" scope="row">
                                    <?php echo $b['Influ_Nickname']; ?>
                                </td>
                                <td style="font-size: 16px; font-weight: 300; text-align: left" scope="row">
                                    <?php echo $b['Booking_Content']; ?>
                                </td>
                                <td style="font-size: 16px; font-weight: 300; text-align: left" scope="row">
                                    <?php echo $b['Booking_Status']; ?>
                                </td>
                                <td style="font-size: 16px; font-weight: 300; text-align: left" scope="row">
                                    <a href="">
                                        <img src="././Views/Img/u223.png" width="30" height="30">
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <div class="pagination"></div>
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
            var perPage = 3;
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