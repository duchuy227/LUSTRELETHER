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
    <title>Send Mail</title>
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
        height: 590px; 
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

</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>Send Email</h2>
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
                                    <h4 style="color: #847F7F; font-size: 26px; font-weight:bold" class="text-center">Send An Email</h4>
                                    <br>
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="">Title</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Content</label>
                                                <textarea class="form-control" name="content" rows="5"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Receiver</label>
                                                <select class="form-control" name="username" id="influencerDropdown" onchange="updateInfluencerId()">
                                                <option hidden>Recipient</option>
                                                    <?php foreach ($customer as $customer): ?>
                                                        <option value="<?php echo $customer['Cus_Username']; ?>" data-id="<?php echo $customer['Cus_ID']; ?>">
                                                            <?php echo $customer['Cus_Username']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <input type="hidden" name="cus_id" id="influencerIdInput">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success">Send Mail</button>
                                            </div>
                                        </div>
                                    </form>
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
    function updateInfluencerId() {
        // Lấy giá trị của lựa chọn trong dropdown
        var dropdown = document.getElementById("influencerDropdown");
        var selectedOption = dropdown.options[dropdown.selectedIndex];
        
        // Lấy Influ_ID từ data-id của lựa chọn đã chọn
        var influencerId = selectedOption.getAttribute("data-id");
        
        // Cập nhật giá trị của input với Influ_ID
        document.getElementById("influencerIdInput").value = influencerId;
    }
</script>

</body>
</html>