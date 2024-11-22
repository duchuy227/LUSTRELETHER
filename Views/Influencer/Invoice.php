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
    <title>Invoice</title>
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

    .chart-container {
            background-color: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .income-container {
            background-color: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .income-container h5 {
            font-weight: bold;
        }
        .income-container .income-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: #847F7F;
        }
        
</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>Invoice</h2>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="income-container">
                                <h3 class="text-center" style="font-weight: bold; color: #847F7F">Total Booking Paid</h3>
                                <div class="income-value"><?php echo number_format($total); ?> Bookings</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="income-container">
                                <h3 class="text-center" style="font-weight: bold; color: #847F7F">My Income</h3>
                                <div class="income-value"><?php echo number_format($influInfo['Influ_Income']); ?> VND</div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="projectCardd">
                                <div class="projectTopp">
                                    <h4 class="text-center">List of Invoices</h4>
                                    <br>
                                    <div class="table-responsive">
                                        <table style="max-width:100%" class="table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th style="font-size: 16px; font-weight: 400;">Service</th>
                                                    <th style="font-size: 16px; font-weight: 400;">Customer</th>
                                                    <th style="font-size: 16px; font-weight: 400;">Money (VAT)</th>
                                                    <th style="font-size: 16px; font-weight: 400; white-space: nowrap;">Status</th>
                                                    <th scope="col">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($invoice as $i): ?>
                                                <tr>
                                                    <td><?php echo $i['Booking_Content'] ?></td>
                                                    <td><?php echo $i['Cus_Fullname'] ?></td>
                                                    <td><?php echo number_format($i['Inv_VATamount']) ?> VND</td>
                                                    <td style="font-weight: 500; color: <?php 
                                                        if ($i['Inv_Status'] === 'Unpaid') {
                                                            echo '#F79A03';
                                                        } elseif ($i['Inv_Status'] === 'Paid') {
                                                            echo '#069603';
                                                        } ?>">
                                                        <?php echo $i['Inv_Status'] ?>
                                                    </td>
                                                    <td style="font-size: 16px; font-weight: 400; text-align: center; width: 100px" scope="row">
                                                        <div style="margin: auto;" class="d-inline-flex justify-content-between align-items-center">
                                                        <?php if ($i['Inv_Status'] === 'Paid'): ?>
                                                            <a href="index.php?action=influencer_Detailinvoice&id=<?php echo $i['Inv_ID'] ?>">
                                                                <img src="././Views/Img/u223.png" width="30" height="30">
                                                            </a>
                                                        </div>
                                                        <?php elseif ($i['Inv_Status'] === 'Unpaid'): ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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

</body>
</html>