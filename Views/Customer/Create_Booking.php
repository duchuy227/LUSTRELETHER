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
    <title>Create Booking</title>
</head>
<style>
    .profile-card {
        background-color: white;
        border-radius: 15px;
        height: auto;
        margin-bottom: 20px;
        overflow: hidden;
        max-width: 100%;
    }

    .profile-card1 {
        background-color: white;
        border-radius: 10px;
        height: auto;
        margin-bottom: 20px;
        overflow: hidden;
        max-width: 100%;
        overflow-y: auto;
    }

    .profile-image {
        width: 100%;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        height: 300px;
        image-rendering: -webkit-optimize-contrast;
        object-fit: cover;
        cursor: pointer;
    }

    .img-fullscreen {
        width: 100%;
        height: 100%;
        object-fit: contain; 
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        background-color: rgba(0, 0, 0, 0.9);
        cursor: pointer;
        display: none;
        
    }

    .carousel {
        display: flex;
        align-items: center;
        position: relative;
        justify-content: center;
        height: 40px;
        margin-top: 10px;
        gap: 10px;
    }

    #imageContainer {
        display: flex;
    }

    .carousel-image {
        margin: 0 5px;
    }

    .carousel i {
        font-size: 30px;
        color: #333;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
    }

    
    

    

    .btn-booking {
        background-color: #F0564A;
        color: white;
        width: 218px;
        height: 50px;
        font-weight: 600;
        font-size: 18px;
        margin: 10px 37px
    }

    .btn-booking:hover {
        background-color: #F0564A;
        color: white;
    }


    .btn1{
        background-color: #F0564A;
        color: white;
        border-radius: 10px;
        padding: 10px 20px;
        border: none;
        font-size: 20px;
        font-weight: 500;
        width: 220px;
    }

    .btn1:hover {
        background-color: #F0564A;
        color: white;
    }


    /* Media query cho màn hình nhỏ hơn 768px */
    @media (max-width: 768px) {
        .profile-card{
            width: 100%;
        }
        .carousel-image {
            width: 30px; /* Tăng kích thước ảnh carousel */
            height: 30px;
            
        }

        .social img {
            width: 30px;
            height: 30px;
        }

        .carousel {
            padding: 0 20px; /* Khoảng cách bên trái và phải cho carousel */
        }

        .carousel i {
            font-size: 20px; /* Tăng kích thước icon */
            color: #000; /* Đảm bảo màu sắc của icon */
            padding: 0 5px; /* Đảm bảo có khoảng cách để không bị chồng lên */
        }
    }

    /* Media query cho màn hình từ 768px đến 1024px */
    @media (min-width: 768px) and (max-width: 1024px) {
        .profile-card{
            width: 100%;
        }
        .carousel-image {
            width: 30px; /* Kích thước ảnh vừa phải */
            height: 30px;
        }

        .social img {
            width: 30px;
            height: 30px;
        }

        .carousel {
            padding: 0 30px;
        }

        .carousel i {
            font-size: 24px; /* Tăng kích thước icon */
            color: #000; /* Màu sắc của icon */
            padding: 0 -10px; /* Khoảng cách tốt hơn */
        }
    }

    .img {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        object-fit: cover;
    }

    .form-check input[type="radio"]{
        width: 18px;
        height: 18px;
        margin-right: 10px;
        border: 2px solid #03649B;
        position: relative;
        cursor: pointer;
    }

    .form-check label {
        font-size: 16px;
        margin-top: auto;
    }

    .form-check {
        margin-bottom: 20px;
    }

    .dropdown {
        
        padding: 5px 10px;
        border: 1px solid #868686;
        width: 100%;
        font-weight: 500;
        color: #646363;
    }

    :root {
    --primary-color: #f90a39;
    --text-color: #1d1d1d;
    --bg-color: #f1f1fb;
    }

    .calendar {
        width: 95%;
        max-width: 900px;
        padding: 5px 20px;
        border-radius: 10px;
        background-color: var(--bg-color);
        margin: 10px 20px;
    }
    .calendar .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        margin-bottom: 15px;
        padding-bottom: 20px;
        border-bottom: 2px solid #ccc;
    }
    .calendar .header .month {
        display: flex;
        align-items: center;
        font-size: 18px;
        font-weight: 600;
        color: var(--text-color);
    }
    .calendar .header .btns {
        display: flex;
        gap: 5px;
    }
    .calendar .header .btns .btn {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        color: #fff;
        background-color: var(--primary-color);
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s;
    }
    .calendar .header .btns .btn:hover {
        background-color: #db0933;
        transform: scale(1.05);
    }
    .weekdays {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
    }
    .weekdays .day {
        width: calc(100% / 7 - 10px);
        text-align: center;
        font-size: 16px;
        font-weight: 600;
    }
    .days {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .days .day {
        width: calc(100% / 7 - 10px);
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 18px;
        font-weight: 400;
        color: var(--text-color);
        background-color: #fff;
        transition: all 0.3s;
    }
    .days .day:not(.next):not(.prev):hover {
        color: #fff;
        background-color: #07C940;
        transform: scale(1.05);
    }
    
    .days .day.next,
    .days .day.prev {
        color: #ccc;
    }

    .selected {
        background-color: #07C940;
        color: white;
    }

    .day.selected {
        background-color: #07C940;
        color: white;
    }

    .day.booked {
        background-color: #f90a39 !important;
        color: white !important;
    }

    .past-date {
        color: #ccc !important;
        pointer-events: none; /* Chặn nhấp chuột */
        opacity: 0.5 !important;
    }

    .note {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        justify-content: center;
    }

    .note div {
        display: flex;
        align-items: center;
        margin-right: 10px;
    }
    
    .note div span {
        display: inline-block;
        width: 50px;
        height: 25px;
        margin-right: 10px;
        border-radius: 5px;
    }
    
    .note .free span {
        background-color: #fff;
        border : 1px solid #646363;
    }

    .note .busy span {
        background-color: #f90a39;
        border : 1px solid #f90a39;
    }

    .note .choose span {
        background-color: #07C940;
        border : 1px solid #07C940;
    }

    .btn-primary {
        width: 120px;
        height: 38px;
    }


    .popup-modal {
        display: none; /* Ẩn modal khi chưa xuất hiện */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Màu nền mờ */
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .popup-content {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
        width: 450px;
    }

    .popup-content h2 {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .popup-content p {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 18px;
    }

    .popup-content button {
        padding: 10px 20px;
        font-size: 20px;
        cursor: pointer;
        background-color: #4CAF50;
        color: white;
        border: none;
        width: 100px;
        border-radius: 10px;

    }

    .popup-content button:hover {
        background-color: #45a049;
    }


    .popup-modal1 {
        display: none; /* Hidden by default */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4); /* Black background with opacity */
        padding-top: 100px;
    }

    .popup-content1 {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
        text-align: center;
    }

    .popup-content1 img {
        margin-bottom: 20px;
    }

    .popup-content1 p {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 18px;
    }

    #closeBtn1 {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        width: 100px;
        border-radius: 10px;
    }

    #closeBtn1:hover {
        background-color: #45a049;
    }

    

</style>
<body>
    <?php include 'navbar.php'?>
    
    <div class="container-fluid">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-3 col-sm-12">
                <div class="profile-card text-center">
                    <img class="profile-image mb-3" src="<?php echo $influencers['Influ_Image'] ?>" id="mainProfileImage" onclick="showFullscreenImage()">
                    <img class="img-fullscreen" src="<?php echo $influencers['Influ_Image']; ?>" id="fullscreenImage"/>
                    <div class="carousel">
                        <i class="fas fa-chevron-left" onclick="slideLeft()" style="position: absolute; top: 50%; left: 0px; transform: translateY(-50%); cursor: pointer;"></i>
                        <div class="d-flex" id="imageContainer">
                        <?php
                            $profileImage = $influencers['Influ_Image'];
                            $otherImages = explode(',', $influencers['Influ_OtherImage']);
                            $otherImages = array_filter(array_map('trim', $otherImages));
                            array_unshift($otherImages, $profileImage);
                            $count = count($otherImages);

                            $visibleCount = 4;
                            $shownImages = array_slice($otherImages, 0, $visibleCount); 
                            
                            $colSize = 12;
                            if ($count == 2) $colSize = 6;
                            if ($count == 3) $colSize = 4;
                            if ($count == 4) $colSize = 3;
                            if ($count == 5 || $count == 6) $colSize = 2;
                        if ($count > 0): ?>
                            <?php foreach ($shownImages as $imagePath): ?>
                                <div class="col-md-<?php echo $colSize; ?> col-6">
                                    <img class="carousel-image" style=" border-radius: 5px; object-fit:cover; cursor:pointer" src="<?php echo htmlspecialchars($imagePath); ?>" width="45" height="45" onclick="changeProfileImage(this.src)"/>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                        <i class="fas fa-chevron-right" onclick="slideRight()" style="position: absolute; top: 50%; right: 0px; transform: translateY(-50%); cursor: pointer;"></i>
                    </div>
                    <div class="social">
                        <?php if (isset($influencers['FB_Link']) && !empty($influencers['FB_Link'])): ?>
                            <a href="<?= $influencers['FB_Link']; ?>" target="_blank"><img src="././views/Img/u32.png" width="45" height="45"></a>
                        <?php endif; ?>
                        
                        <?php if (isset($influencers['Ins_Link']) && !empty($influencers['Ins_Link'])): ?>
                            <a href="<?= $influencers['Ins_Link']; ?>" target="_blank"><img src="././views/Img/u31.png" width="45" height="45"></a>
                        <?php endif; ?>

                        <?php if (isset($influencers['TT_Link']) && !empty($influencers['TT_Link'])): ?>
                            <a href="<?= $influencers['TT_Link']; ?>" target="_blank"><img src="././views/Img/u29.png" width="45" height="45"></a>
                        <?php endif; ?>
                    </div>
                    <br>
                </div>
                <div class="d-flex justify-content-center mt-4" style="margin-bottom: 20px;">
                    <a href="index.php?action=customer_influencerDetail&id=<?php echo $influencers['Influ_ID'] ?>">
                        <button class="btn btn1 mt-3">BACK</button>
                    </a>
                </div>
            </div>

            <div class="col-md-9 col-sm-12">
                <form method="post">
                    <div class="profile-card1">
                        <h5 style="text-align: center; font-weight:500; font-size: 30px; margin: 20px">Booking</h5>
                        <div class="d-flex align-items-center mb-3" style="margin: 10px 20px;">
                            <img class="img" src="<?php echo $influencers['Influ_Image'] ?>" alt="">
                            <div class="ms-3">
                                <h6 style="font-size: 17px;" class="mb-0"><?php echo $influencers['Influ_Nickname'] ?></h6>
                                <small><?php echo $influencers['InfluType_Name'] ?></small>
                            </div>
                        </div>
                        
                        <h6 style="margin: 30px 20px; font-size: 18px; font-weight: 400">Choose Topics</h6>
                        <div class="d-flex flex-wrap" style="margin: 0px 20px;">
                            <?php foreach($topics as $t): ?>
                            <div class="form-check col-md-4">
                                <input class="form-check-input" name="topic" type="radio" value="<?php echo $t['Topic_ID']; ?>" onchange="loadServices(this.value)"/>
                                <label class="form-check-label" for="topic1"><?php echo $t['Topic_Name'] ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="width:35%">
                                <h6 style="margin: 30px 20px; font-size: 18px; font-weight: 400">Choose Service</h6>
                            </div>
                            <div class="col-md-6" style="width: 55%">
                                <select style="margin: 20px;" class="dropdown me-3" name="service" id="serviceDropdown">
                                    <option value=""></option>
                                </select>
                            </div>
                            <input type="hidden" id="serviceName" name="service_name" value="">

                            <div class="col-md-6" style="width:35%">
                                <h6 style="margin: 30px 20px; font-size: 18px; font-weight: 400">Total Days</h6>
                            </div>
                            <div class="col-md-6" style="width: 55%">
                                <input  type="number" style="margin: 20px;" class="dropdown me-3" name="total_days" id="totalDays" onchange="calculatePrice()">
                            </div>

                            <div class="col-md-6" style="width:35%">
                                <h6 style="margin: 30px 20px; font-size: 18px; font-weight: 400">Expense</h6>
                            </div>
                            <div class="col-md-6" style="width: 55%">
                                <input style="margin: 20px;" class="dropdown me-3" id="servicePrice" readonly>
                            </div>
                        </div>
                        <h6 style="margin: 30px 20px; font-size: 18px; font-weight: 400">Choose Date</h6>
                        <div class="calendar">
                            <div class="header">
                            <div class="month"></div>
                                <div class="btns">
                                    <div class="btn today-btn">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div class="btn prev-btn">
                                        <i class="fas fa-chevron-left"></i>
                                    </div>
                                    <div class="btn next-btn">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="weekdays">
                                <div class="day">Sun</div>
                                <div class="day">Mon</div>
                                <div class="day">Tue</div>
                                <div class="day">Wed</div>
                                <div class="day">Thu</div>
                                <div class="day">Fri</div>
                                <div class="day">Sat</div>
                            </div>
                            <div class="days"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="margin: 20px; margin-bottom: 20px; width: 25%">
                                <div class="note">
                                    <div class="free">
                                        <span></span>
                                        Free
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" style="margin: 20px; margin-bottom: 20px; width: 25%">
                                <div class="note">
                                    <div class="busy">
                                        <span></span>
                                        Busy
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" style="margin: 20px; margin-bottom: 20px; width: 25%">
                                <div class="note">
                                    <div class="choose">
                                        <span></span>
                                        Choose
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between" style="margin: 0px 20px;">
                            <div>
                                <p>Start Date: <input readonly name="start_date" type="text" placeholder="Start Date" style="border: none; outline:none"></p>
                                <p>End Date: <input readonly name="end_date" type="text" placeholder="End Date" style="border: none; outline:none"></p>
                            </div>
                            <p style="margin: 0px 20px; font-size: 20px" id="countdown">Time:  <strong id="timeLeft" style="color:#F0564A">5: 00</strong></p>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-2 mb-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            
        </div>

        
    </div>

    <div id="popupModal" class="popup-modal">
        <div class="popup-content">
            <img src="././views/Img/u118.png" width="50" height="50">
            <p>Time expired! Please try booking again.</p>
            <button id="closeBtn">OK</button>
        </div>
    </div>

    <!-- Popup Modal -->
    <div id="popupModal1" class="popup-modal1" style="display: none;">
        <div class="popup-content1">
            <img src="././views/Img/u118.png" width="50" height="50">
            <p><?php echo isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : ''; ?></p>
            <button id="closeBtn1">OK</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Kiểm tra nếu có thông báo lỗi trong session
            <?php if (isset($_SESSION['errorMessage'])): ?>
                // Hiển thị popup khi có thông báo lỗi
                document.getElementById('popupModal1').style.display = 'block';
            <?php endif; ?>

            // Đảm bảo sự kiện click chỉ được gán một lần
            document.getElementById('closeBtn1').addEventListener('click', function() {
                // Đóng popup
                document.getElementById('popupModal1').style.display = 'none';

                // Sau khi đóng popup, xóa thông báo lỗi trong session và reload trang
                <?php 
                    unset($_SESSION['errorMessage']); // Xóa thông báo lỗi trong session
                ?>
            });
        });
    </script>



    <?php include '././views/Layout/homepage_footer.php'?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        let startIndex = 0;  // Biến lưu chỉ mục ảnh hiện tại
        const images = <?php echo json_encode($otherImages); ?>; // Chuyển mảng ảnh sang JavaScript
        const visibleCount = 4; // Số lượng ảnh được hiển thị ban đầu

        // Hàm cập nhật các ảnh hiển thị
        function updateVisibleImages() {
            const imageContainer = document.getElementById("imageContainer");
            imageContainer.innerHTML = ''; // Xóa ảnh cũ
            const currentImages = images.slice(startIndex, startIndex + visibleCount); // Cắt mảng ảnh từ startIndex
            
            currentImages.forEach(imagePath => {
                const imgElement = document.createElement("img");
                imgElement.classList.add("carousel-image");
                imgElement.style.borderRadius = "10px";
                imgElement.style.objectFit = "cover";
                imgElement.style.cursor = "pointer";
                imgElement.src = imagePath;
                imgElement.width = 45;
                imgElement.height = 45;
                imgElement.onclick = () => changeProfileImage(imagePath);
                
                const colDiv = document.createElement("div");
                colDiv.classList.add("col-md-3");
                colDiv.appendChild(imgElement);
                
                imageContainer.appendChild(colDiv);
            });
        }

        // Hàm di chuyển sang trái
        function slideLeft() {
            if (startIndex > 0) {
                startIndex -= 1; // Di chuyển về ảnh trước
                updateVisibleImages();
            }
        }

        // Hàm di chuyển sang phải
        function slideRight() {
            if (startIndex + visibleCount < images.length) {
                startIndex += 1; // Di chuyển đến ảnh tiếp theo
                updateVisibleImages();
            }
        }


        // Hiển thị 4 ảnh đầu tiên khi trang được tải
        document.addEventListener('DOMContentLoaded', updateVisibleImages);

        // Hàm thay đổi ảnh profile và ảnh fullscreen
        function changeProfileImage(newSrc) {
            document.getElementById("mainProfileImage").src = newSrc;
            document.getElementById("fullscreenImage").src = newSrc;
        }

        // Hiển thị ảnh fullscreen khi nhấp vào profile-image
        function showFullscreenImage() {
            var fullscreenImage = document.getElementById("fullscreenImage");
            fullscreenImage.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        // Ẩn ảnh fullscreen khi nhấp vào ảnh đó
        document.addEventListener('DOMContentLoaded', function() {
            var fullscreenImage = document.getElementById("fullscreenImage");
            fullscreenImage.addEventListener('click', function() {
                fullscreenImage.style.display = 'none';
                document.body.style.overflow = 'auto';
            });
        });
    </script>




    <script>
        const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        let currentDate = new Date();
        let selectedDates = [];

        const monthElement = document.querySelector(".month");
        const daysContainer = document.querySelector(".days");
        const prevBtn = document.querySelector(".prev-btn");
        const nextBtn = document.querySelector(".next-btn");
        const todayBtn = document.querySelector(".today-btn");
        const startDateInput = document.querySelector("input[placeholder='Start Date']");
        const endDateInput = document.querySelector("input[placeholder='End Date']");

        // Mảng chứa các ngày đã đặt, định dạng dưới dạng chuỗi 'YYYY-MM-DD'
        const bookedDates = <?php echo json_encode($bookedDates); ?>;
        console.log(bookedDates);

        document.getElementById('totalDays').addEventListener('change', function () {
            const totalDays = parseInt(this.value);
            if (!isNaN(totalDays) && totalDays > 0) {
                selectedDates = []; // Reset các ngày đã chọn
                renderCalendar();
                updateDateInputs();
            }
        });

        function renderCalendar() {
            const currentMonth = currentDate.getMonth();
            const currentYear = currentDate.getFullYear();
            const today = new Date();

            monthElement.textContent = `${months[currentMonth]} ${currentYear}`;

            const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
            const lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);
            const numDaysInMonth = lastDayOfMonth.getDate();
            const firstDay = firstDayOfMonth.getDay();

            daysContainer.innerHTML = "";

            // Thêm ô trống trước ngày đầu tiên của tháng
            for (let i = 0; i < firstDay; i++) {
                const emptyCell = document.createElement("div");
                emptyCell.classList.add("day");
                daysContainer.appendChild(emptyCell);
            }

            // Duyệt qua tất cả các ngày trong tháng
            for (let i = 1; i <= numDaysInMonth; i++) {
                const dayCell = document.createElement("div");
                dayCell.classList.add("day");
                dayCell.textContent = i;

                // Tạo chuỗi ngày với định dạng 'YYYY-MM-DD'
                const dateString = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
                const date = new Date(dateString);

                // Kiểm tra nếu ngày hiện tại có trong mảng bookedDates
                if (date < new Date(today.getFullYear(), today.getMonth(), today.getDate())) {
                    dayCell.classList.add("past-date");
                    dayCell.style.cursor = "not-allowed";
                } else if (bookedDates.includes(dateString)) {
                    // Kiểm tra nếu ngày đã được đặt trước
                    dayCell.classList.add("booked");
                    dayCell.style.cursor = "not-allowed";
                } else {
                    dayCell.addEventListener("click", function () {
                    const totalDays = parseInt(document.getElementById('totalDays').value);

                    if (selectedDates.includes(i)) {
                        // Nếu ngày đã được chọn trước đó, xóa nó ra khỏi danh sách và không kiểm tra điều kiện liên tiếp
                        selectedDates = selectedDates.filter(date => date !== i);
                        this.classList.remove("selected");
                    } else {
                        if (totalDays === "" || isNaN(totalDays) || totalDays <= 0) {
                            alert("Vui lòng chọn ngày");
                        } else if (selectedDates.length < totalDays) {
                            // Kiểm tra nếu ngày mới chọn là ngày liên tiếp với ngày cuối cùng đã chọn
                            if (selectedDates.length > 0) {
                                const lastSelectedDate = selectedDates[selectedDates.length - 1];
                                const dayDifference = Math.abs(i - lastSelectedDate);

                                if (dayDifference !== 1) {
                                    alert("Bạn chỉ có thể chọn các ngày liên tiếp.");
                                    return;
                                }
                            }

                            // Thêm ngày vào danh sách và đánh dấu là đã chọn
                            selectedDates.push(i);
                            this.classList.add("selected");
                        } else {
                            alert("Bạn chỉ được chọn tối đa số ngày bạn đã chọn.");
                        }
                    }
                    updateDateInputs();
                });
                }

                daysContainer.appendChild(dayCell);
            }
        }

        


        function updateDateInputs() {
            if (selectedDates.length === 0) {
                startDateInput.value = "";
                endDateInput.value = "";
                return;
            }
            
            selectedDates.sort((a, b) => a - b);
            
            const startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDates[0]);
            const endDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDates[selectedDates.length - 1]);

            startDateInput.value = `${selectedDates[0]} ${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
            endDateInput.value = `${selectedDates[selectedDates.length - 1]} ${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
        }

        todayBtn.addEventListener("click", () => {
            currentDate = new Date();
            selectedDates = [];
            renderCalendar();
            updateDateInputs();
        });

        prevBtn.addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        nextBtn.addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        renderCalendar();
    </script>


    <script>
        const influPrice = <?= json_encode($influencers['Influ_Price']) ?>;

        function calculatePrice() {
            const totalDays = document.getElementById('totalDays').value;
            const servicePrice = influPrice * totalDays;
            document.getElementById('servicePrice').value = servicePrice.toLocaleString('en-US', { maximumFractionDigits: 0 }) + ' VND';
        }

        let time = 300;
        const countdownElement = document.getElementById('timeLeft');

        function updateCountdown() {
            const minutes = Math.floor(time / 60);
            const seconds = time % 60;
            countdownElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            time--;

            if (time <= 0) {
                clearInterval(countdownInterval);
                showPopup();
            }
        }

        function showPopup() {
            const modal = document.getElementById('popupModal');
            modal.style.display = 'flex';

            // Xử lý sự kiện khi nhấn "OK"
            document.getElementById('closeBtn').addEventListener('click', function () {
                modal.style.display = 'none'; 
                window.location.reload(); 
            });
        }

        const countdownInterval = setInterval(updateCountdown, 1000);

        function loadServices(topicId) {
        fetch('index.php?action=getServicesByTopic', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'topic_id=' + topicId
        })
        .then(response => response.json())
        .then(data => {
            const serviceDropdown = document.getElementById('serviceDropdown');
            const serviceNameInput = document.getElementById('serviceName');
            serviceDropdown.innerHTML = '<option value="">Select a service</option>'; // Reset dropdown

            // Thêm các Content vào dropdown
            if (data.contents) {
                data.contents.forEach(content => {
                    const option = document.createElement('option');
                    option.value = content.Content_Name;
                    option.text = content.Content_Name;
                    serviceDropdown.appendChild(option);
                });
            }

            // Thêm các Event vào dropdown
            if (data.events) {
                data.events.forEach(event => {
                    const option = document.createElement('option');
                    option.value = event.Event_Name;
                    option.text = event.Event_Name;
                    serviceDropdown.appendChild(option);
                });
            }

            serviceDropdown.addEventListener('change', function() {
                // Lấy tên dịch vụ (text) từ option được chọn
                const selectedOptionText = serviceDropdown.options[serviceDropdown.selectedIndex].text;
                serviceNameInput.value = selectedOptionText; // Lưu tên dịch vụ vào input hidden

            });
        })
        .catch(error => console.error('Error:', error));
        }

    </script>

    <script>
        // Lắng nghe sự kiện submit
        document.querySelector('form').addEventListener('submit', function(event) {
            const totalDays = parseInt(document.getElementById('totalDays').value);

            // Kiểm tra nếu số ngày thực tế không khớp với totalDays
            if (selectedDates.length !== totalDays) {
                event.preventDefault(); // Ngừng gửi form
                alert(`Vui lòng chọn đúng số ngày mà bạn đã chọn.`);
            }
        });
    </script>

        
</body>
</html>