<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/Admin/style.css?v=1.0">
    <title>Dashboard</title>
</head>
<style>
    aside .top .logo h2 {
        font-weight: 600;
        margin: auto;
    }

    main table tbody td{
        height: 3.8rem;
        border-bottom: 1px solid var(--clr-white);
        color:var(--clr-dark-variant)
    }

    main .recent_order table{
        background: var(--clr-white);
        width: 100%;
        border-radius: var(--card-border-radius);
        padding: var(--card-padding);
        text-align: center;
        color: var(--clr-dark);
        font-size: 13px;
        }
        main .recent_order table:hover{
        box-shadow: none;
        }
    

    
    
</style>
<body>
    <div class="container">
        <?php include 'admin_sidebar.php' ?>

        <main>
            <h1>Dashboard</h1>

            <div class="insights">

                <div class="box" style="width: 200px; height: 200px">
                    <h3 style="text-align: center">Total Booking</h3>
                    <br>
                    <div class="content" style="display: flex; justify-content: center; align-items: center; gap: 20px">
                        <span style="font-size: 70px" class="number"><?php echo $booking ?></span>
                        <img src="./././Image/u22.png" width="60">
                    </div>
                </div>

                <div class="box" style="width: 200px; height: 200px">
                    <h3 style="text-align: center">Total Influencer</h3>
                    <br>
                    <div class="content" style="display: flex; justify-content: center; align-items: center; gap: 20px">
                        <span style="font-size: 70px" class="number"><?php echo $influencers ?></span>
                        <img src="./././Image/u19.png" width="60">
                    </div>
                </div>

                <div class="box" style="width: 200px; height: 200px">
                    <h3 style="text-align: center">Total Articles</h3>
                    <br>
                    <div class="content" style="display: flex; justify-content: center; align-items: center; gap: 20px">
                        <span style="font-size: 70px" class="number"><?php echo $post ?></span>
                        <img src="./././Image/u21.png" width="60">
                    </div>
                </div>

            </div>

            <div class="recent_order">
                <h2>Recent Booking</h2>
                <table> 
                    <thead>
                    <tr>
                        <th>Create Time</th>
                        <th>Service</th>
                        <th>Expense</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($booking_list as $b): ?>
                        <tr>
                            <td><?php echo $b['Booking_CreateTime'] ?></td>
                            <td><?php echo $b['Booking_Content'] ?></td>
                            <td><?php echo number_format($b['Booking_Expense']) ?></td>

                            <td style="font-weight: 400; color: <?php 
                                if ($b['Booking_Status'] === 'Pending') {
                                    echo '#F79A03';
                                } elseif ($b['Booking_Status'] === 'Rejected') {
                                    echo '#DB0101'; 
                                } elseif ($b['Booking_Status'] === 'Approval') {
                                    echo '#6F00B2';
                                } elseif ($b['Booking_Status'] === 'In Progress') {
                                    echo '#2200B2';
                                } elseif ($b['Booking_Status'] === 'Completed') {
                                    echo '#069603';
                                } 
                                ?>"><?php echo $b['Booking_Status'] ?></td>
                            <td>
                                <a style="color: #0066FF; font-weight: 500" href="index.php?action=admin_detailbooking&id=<?php echo $b['Booking_ID']?>">Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </main>


        <div class="right">
    <div class="top">
        <button id="menu_bar">
            <span class="material-symbols-sharp">menu</span>
        </button>

        <div class="profile">
            <div class="info">
            <br>
            <small class="text-muted" style="font-size: 15px; font-weight: 300; color: #333333">
                    <?php foreach ($admins as $admin): ?>
                        <p><?php echo $admin['Ad_Username']; ?></p>
                    <?php endforeach; ?>
                    </small>
                </div>
                <div class="profile-photo">
                    <?php foreach ($admins as $admin): ?>
                    <img style="object-fit: cover; border-radius: 50%" src="<?php echo $admin['Ad_Image']; ?>"/>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div style="margin-left: 5px;" class="recent_updates">
            <h2 style="margin-bottom: 10px;">Recent Article</h2>
            <div class="updates">
                <?php foreach ($articles as $article): ?>
                <div class="update">
                    <div class="message">
                        <p style="font-size: 15px; color: #666666; font-weight:400; margin-bottom: 10px">
                            <?php echo $article['Influ_Username']?><span style="color: #FF6600;"> (<?php echo $article['InfluType_Name']?>) </span> has posted an article
                        </p>
                    
                        <a href="index.php?action=admin_detailarticle&id=<?php echo $article['Post_ID'] ?>"><span style="color: #0000FF; font-size: 14px; font-weight:500">
                            See Detail
                        </span></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="sales-analytics">
        <h2>Feedbacks</h2>

        <div class="item onlion">
            <img src="./././Image/u84.png" width="56">
            <div class="right_text">
            <div class="info" style="margin-left: 20px;">
                <h3>Duc Huy</h3>
                <small class="text-muted">Thank you for event</small>
            </div>
            </div>
        </div>
        <div class="item onlion">
            <img src="./././Image/u87.png" width="56">
            <div class="right_text">
            <div class="info" style="margin-left: 20px;">
                <h3>Quoc Bao</h3>
                <small class="text-muted">Thank you for event</small>
            </div>
            </div>
        </div>
        </div>

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
</body>
</html>