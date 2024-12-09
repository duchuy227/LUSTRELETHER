<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="././views/Layout/homepage.css?v=1.0">
    <title>Event</title>
</head>
<style>
    .sidebar {
        background-color: #ffffff;
        height: calc(100vh - 85px);
        max-width: 100%;
        position: fixed;
        top: 85px;
        left: 0;
        padding: 15px;
        box-shadow: 10px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 999;
        overflow-y: auto;
        
    }

    .filter-section {
        padding: 20px;
        margin-right: 20px;
    }

    .filter-section h5 {
        color: #7D7B7B;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .filter-section label {
        display: block;
        margin-bottom: 10px;
        font-size: 16px;
        font-weight: 500;
        color: #545252;
    }

    .filter-section input[type="checkbox"] {
        margin-right: 10px;
        width: 20px;
        height: 20px;
        border: 2px solid #7D7B7B;
        cursor: pointer;
    }

    .filter-section  input[type="checkbox"]:checked {
        background-color: #7D7B7B;
    }

        /* Tạo dấu chấm bên trong khi checkbox được chọn */
    .filter-section  input[type="checkbox"]:checked::before {
        content: "✔";
        color: #fff;
        font-size: 18px;
        line-height: 1;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        }
    
    .col-md-9 h2 {
        font-weight: bold;
        margin-top: 30px;
        margin-left: 20px;
    }
    
    .dropdown {
        border-radius: 20px;
        padding: 5px 15px;
        border: 1px solid #D7D7D7;
        width: 250px;
        margin-left: 20px;
        font-weight: 500;
        color: #646363;
    }

    .inputBx {
        position: relative;
        width: 223px;
        height: 39px;
        background: #FFFFFF;
        border-radius: 10px;
        display: flex;
        align-items: center;
        padding-left: 10px;
        gap: 10px;
        overflow: hidden;
        margin-right: 20px;
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

    .card-viral {
        width: 200px;
        height: 330px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 20px auto;
        background-color: #fff;
    }
    .card-viral img {
        width: 211px;
        height: 222px;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .card-viral img:hover {
        transform: scale(1.05);
    }

    .card-body-viral {
        margin-top: 5px;
        padding: 10px;
        text-align: left;
    }
    .card-title-viral {
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 5px;
        color: #333333c8;
    }
    .card-text-viral {
        font-size: 15px;
        color: #333333c8;
        font-weight: 500;
    }

    .btn {
        width: 100px;
        background-color: #F0564A;
        color: #fff;
        border-radius: 20px;
        font-size: 18px;
        font-weight: 500;
        margin-right: 20px;
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
            background-color: #F0564A;
            color: #fff;
            border: 1px solid #F0564A;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 20px;
            width: 50px;
            height: 50px;
            
        }
        .pagination button:hover {
            background-color: #F0564A;
        }
    
</style>
<body>
    <?php include 'navbar.php'?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="row align-items-center" style="margin-bottom: 20px; margin-top: 20px;">
                <div class="col-md-6">
                    <h2 class="mb-4" style="margin: 20px; font-weight: 600"><?php echo $event['Event_Name'] ?></h2>
                </div>

                <div class="col-md-6 d-flex justify-content-end">
                    <form action="" method="post">
                        <div class="inputBx">
                            <img src="././Views/Img/search.png" alt="" width="30" height="30">
                            <input name="username" type="text" placeholder="Search . . .">
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="d-flex mb-4">
                    <form method="post">
                        <select name="wplace_id" class="dropdown me-3">
                            <option hidden>Workplace</option>
                            <?php 
                                foreach($all_wplace as $wplace){
                                    echo '<option value="'.$wplace['WPlace_ID'].'"';
                                    if ($wplace['WPlace_ID'] == $wplace_id) {
                                        echo ' selected';
                                    }
                                    echo '>'.$wplace['WPlace_Name'].'</option>';
                                }
                            ?>
                        </select>
                        <button type="submit" class="btn">Filter</button>
                    </form>
                    
                    <form method="post">
                        <select name="fol_id" class="dropdown me-3">
                            <option hidden>Followers</option>
                            <?php 
                                foreach($all_fol as $fol){
                                    echo '<option value="'.$fol['Fol_ID'].'"';
                                    if ($fol['Fol_ID'] == $fol_id) {
                                        echo ' selected';
                                    }
                                    echo '>'.$fol['Fol_Quantity'].'</option>';
                                    }
                            ?>
                        </select>
                        <button type="submit" class="btn">Filter</button>
                    </form>
                    
                    <form method="post">
                        <select name="type_id" class="dropdown me-3">
                            <option hidden>Influencer</option>
                            <?php 
                                foreach($all_type as $types){
                                    echo '<option value="'.$types['InfluType_ID'].'"';
                                    if ($types['InfluType_ID'] == $type_id) {
                                        echo ' selected';
                                    }
                                    echo '>'.$types['InfluType_Name'].'</option>';
                                }
                            ?>
                        </select>

                        <button type="submit" class="btn">Filter</button>
                    </form>
            </div>

            <?php if (!empty($message)): ?>
                <p style="color: red; text-align: center; font-size: 30px; margin-top: 20px; font-weight:600"><?php echo $message; ?></p>
            <?php endif; ?>

            <?php if (!empty($influencers)): ?>
                <div class="row justify-content-center" id="influencer-list">
                        <?php foreach ($influencers as $i):  ?>
                        <div class="col-md-3 influencer-item">
                            <div class="card-viral">
                                <a href="index.php?action=customer_influencerDetail&id=<?php echo $i['Influ_ID'] ?>">
                                    <img class="card-img-top" src="<?php echo $i['Influ_Image'] ?>">
                                </a>
                                <div class="card-body-viral">
                                    <h5 class="card-title-viral"><?php echo $i['Influ_Nickname'] ?></h5>
                                    <p class="card-text-viral"><?php echo $i['Fol_Quantity'] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="pagination"></div>
        </div>
    </div>

    <?php include '././views/Layout/homepage_footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var perPage = 8; // Số influencers mỗi trang
            var influencers = document.querySelectorAll(".influencer-item"); // Lấy danh sách influencers
            var totalPages = Math.ceil(influencers.length / perPage); // Tính tổng số trang
            showPage(1);

            // Tạo các nút phân trang
            var pagination = document.querySelector(".pagination");
            for (var i = 1; i <= totalPages; i++) {
                var button = document.createElement("button");
                button.textContent = i;
                button.addEventListener("click", function () {
                    var page = parseInt(this.textContent); // Lấy số trang từ nút bấm
                    showPage(page);
                });
                pagination.appendChild(button);
            }

            function showPage(page) {
                var start = (page - 1) * perPage; // Bắt đầu
                var end = start + perPage;       // Kết thúc

                influencers.forEach(function (influencer) {
                    influencer.style.display = "none"; // Ẩn tất cả influencers
                });

                for (var i = start; i < end && i < influencers.length; i++) {
                    influencers[i].style.display = "block"; // Hiển thị influencers thuộc trang hiện tại
                }
            }
        });


    </script>


    
</body>
</html>