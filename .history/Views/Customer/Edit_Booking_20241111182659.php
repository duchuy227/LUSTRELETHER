<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Edit Booking</title>
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #d0e7ff;
        color: #333;
        padding-top: 85px;
    }

    .navbar {
        background-color: #fff;
        height: 85px;
        position: fixed; /* Cố định navbar */
        top: 0; /* Đặt nó ở vị trí trên cùng của trang */
        left: 0;
        right: 0;
        z-index: 1000; /* Đảm bảo navbar nằm trên các phần tử khác */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-brand {
        font-weight: bold;
        color: #333;
        font-size: 30px;
    }
    
    .navbar-nav {
        display: flex;
        gap: 30px; /* Điều chỉnh khoảng cách giữa các nav-item */
    }
    
    .navbar-nav .nav-link {
        color: #333;
        font-size: 22px;
        font-weight: 400;
        text-align: center;
        margin-left: 30px;
    }


    .sidebar {
        background-color: #ffffff;
        height: calc(100vh - 85px);
        width: 300px;
        position: fixed; /* Đặt sidebar ở vị trí cố định */
        top: 85px; /* Đặt dưới navbar */
        left: 0; /* Căn ở bên trái */
        padding-top: 20px;
        box-shadow: 10px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 999; /* Đảm bảo sidebar nằm trên các phần tử khác */
    }
    .sidebar a {
        color: #6c757d;
        text-decoration: none;
        display: block;
        padding: 10px 10px;
        font-size: 18px;
        margin-top: 20px;
        font-weight: 500;
    }

    .sidebar h4 {
        font-size: 30px;
        font-weight: bold;
        opacity: 25%;
        margin-bottom: 40px;
        margin-top: 20px;
        color: #333;
    }

    .sidebar a {
        position: relative;
        color: #333;
        text-decoration: none;
        overflow: hidden;
        border-radius: 30px;
        transition: color 0.3s ease;
    }

    .sidebar a:hover {
        background-color: #d3d9de;
        color: #000;
        border-radius: 30px;
    }

    .sidebar a::before {
        content: "";
        position: absolute;
        top: 0;
        left: 100%; /* Để lớp nền bắt đầu từ bên phải */
        width: 100%;
        height: 100%;
        background-color: #d3d9de; /* Màu nền khi hover */
        transition: left 0.3s ease; /* Tạo hiệu ứng di chuyển từ bên phải vào */
        z-index: -1; /* Để lớp nền ở dưới nội dung */
    }

    .sidebar a:hover::before {
        left: 0; /* Di chuyển lớp nền vào vị trí */
    }

    
    .profile-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        margin-top: 30px;
        width: 95%;
    }
    .col-md-9 h2 {
        font-weight: bold;
        margin-top: 30px;
    }

    .mb-5 .col-md-6 .label {
        font-size: 18px;
        font-weight: 500;
        color: #333;
    }

    .mb-5 .col-md-6 .content {
        font-weight: 300;
        color: #333;
    }

    .btn-success {
        margin-top: 10px;
        justify-content: space-between;
        align-items: center;
        width: 240px;
        border-radius: 25px;
        border: none;
        font-size: 18px;
        height: 40px;
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
        margin-right: 10px;
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
        width: 90%;
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

    .specific-booking {
        background-color: #2200B2 !important; /* Color for specific booking dates */
        color: white !important; /* Text color for visibility */
    }


    .note {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
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

    .note .booked span {
        background-color: #2200B2;
        border : 1px solid #2200B2;
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

    .btn-primary {
        width: 120px;
        height: 38px;
    }
    

    
        
</style>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
        <?php include_once 'sidebar.php'; ?>
            <div class="col-md-9 offset-md-3">
                <h2>Edit Booking</h2>
                <div class="profile-container">
                    <form action="index.php?action=customer_editBooking&id=<?php echo $booking['Booking_ID'] ?>" method="post">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="img" src="<?php echo $booking['Influ_Image'] ?>" alt="">
                                    <div class="ms-3">
                                        <h6 style="font-size: 17px;" class="mb-0"><?php echo $booking['Influ_Nickname'] ?></h6>
                                    </div>
                                </div>
                                <h6 style="font-size: 18px; font-weight: 400">Choose Topics</h6>
                                <div class="d-flex flex-wrap">
                                    <?php foreach($topics as $t): ?>
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" name="topic" type="radio" value="<?php echo $t['Topic_ID']; ?>" onchange="loadServices(this.value)" <?php echo ($t['Topic_ID'] == $selectedTopicId) ? 'checked' : ''; ?>/>
                                        <label class="form-check-label" for="topic<?php echo $t['Topic_ID']; ?>">
                                            <?php echo $t['Topic_Name'] ?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                    
                                <h6 style="font-size: 18px; font-weight: 400">Choose Service</h6>
                                <select class="dropdown me-3" name="service" id="serviceDropdown">
                                    <option value=""></option>
                                </select>
                                <input type="hidden" id="serviceName" name="service_name" value="">
                                
                                <h6 style="margin: 10px 0px; font-size: 18px; font-weight: 400">Total Days</h6>
                                <input type="number" class="dropdown me-3" name="total_days" id="totalDays" min="1" onchange="calculatePrice()" value="<?php echo number_format($booking['Booking_TotalDay']); ?>">

                                <h6 style="margin: 10px 0px; font-size: 18px; font-weight: 400">Expense</h6>
                                <input class="dropdown me-3" id="servicePrice" readonly value="<?php echo number_format($booking['Booking_Expense']) . ' VND'; ?>">

                                <h6 style="margin: 10px 0px; font-size: 18px; font-weight: 400">Status</h6>
                                <input class="dropdown me-3" name="status" readonly value="<?php echo $booking['Booking_Status'] ?>">
                            </div>

                            <div class="col-md-7">
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

                                    <div class="col-md-4" style="margin: 20px; margin-bottom: 20px; width: 55%">
                                        <div class="note">
                                            <div class="booked">
                                                <span></span>
                                                Booking Selected
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between" style="margin: 0px 20px;">
                                    <div>
                                        <p>Start Date: 
                                            <input name="start_date" type="text" placeholder="Start Date" style="border: none; outline:none" value="<?php echo date('j M Y', strtotime($booking['Booking_StartDate'])); ?>">
                                        </p>
                                        <p>End Date: <input name="end_date" type="text" placeholder="End Date" style="border: none; outline:none" value="<?php echo date('j M Y', strtotime($booking['Booking_EndDate'])); ?>"></p>
                                    </div>
                                    <p style="margin: 0px 20px; font-size: 20px" id="countdown">Time:  <strong id="timeLeft" style="color:#F0564A">5: 00</strong></p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-2 mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
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

    <div id="popupModal1" class="popup-modal1">
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
                <?php unset($_SESSION['errorMessage']); ?>  <!-- Xóa thông báo lỗi -->
                
            });
        });
    </script>

    <script>

        const influPrice = <?= json_encode($booking['Influ_Price']) ?>;

        function calculatePrice() {
            const totalDays = document.getElementById('totalDays').value;
            const servicePrice = influPrice * totalDays;
            document.getElementById('servicePrice').value = servicePrice.toFixed(2) + ' VND';
        }

        let time = 300; // 30 phút
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
            modal.style.display = 'flex'; // Hiển thị modal

            // Xử lý sự kiện khi nhấn "OK"
            document.getElementById('closeBtn').addEventListener('click', function () {
                modal.style.display = 'none'; // Ẩn modal
                window.location.reload(); // Reload lại trang
            });
        }

        const countdownInterval = setInterval(updateCountdown, 1000);

        const selectedTopicId = <?= json_encode($selectedTopicId) ?>;

        // Hàm này sẽ được gọi ngay khi trang tải để hiển thị các dịch vụ tương ứng với topic đã chọn
        document.addEventListener("DOMContentLoaded", function() {
            if (selectedTopicId) {
                loadServices(selectedTopicId);  // Gọi hàm loadServices với topic đã chọn
            }
        });

        const serviceDropdown = document.getElementById('serviceDropdown');
        const serviceNameInput = document.getElementById('serviceName');

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
                serviceDropdown.innerHTML = '<option value="">Select a service</option>';
                
                if (data.contents) {
                    data.contents.forEach(content => {
                        const option = document.createElement('option');
                        option.value = content.Content_Name;
                        option.text = content.Content_Name;
                        serviceDropdown.appendChild(option);
                    });
                }

                if (data.events) {
                    data.events.forEach(event => {
                        const option = document.createElement('option');
                        option.value = event.Event_Name;
                        option.text = event.Event_Name;
                        serviceDropdown.appendChild(option);
                    });
                }

                const selectedService = <?= json_encode($booking['Booking_Content']) ?>;
                if (selectedService) {
                    const options = serviceDropdown.querySelectorAll('option');
                    options.forEach(option => {
                        if (option.value === selectedService) {
                            option.selected = true;
                            serviceNameInput.value = option.text; // Set giá trị mặc định cho service_name
                        }
                    });
                }

                serviceDropdown.addEventListener('change', function() {
                    const selectedOptionText = serviceDropdown.options[serviceDropdown.selectedIndex].text;
                    serviceNameInput.value = selectedOptionText;
                });
            })
            .catch(error => console.error('Error:', error));
        }

        // Đảm bảo service_name có giá trị khi submit, kể cả khi không thay đổi gì
        document.getElementById('serviceForm').addEventListener('submit', function(event) {
            const selectedOptionText = serviceDropdown.options[serviceDropdown.selectedIndex].text;
            if (!serviceNameInput.value && selectedOptionText) {
                serviceNameInput.value = selectedOptionText;
            }
        });

        // Tải dịch vụ khi DOM đã sẵn sàng
        document.addEventListener("DOMContentLoaded", function() {
            if (selectedTopicId) {
                loadServices(selectedTopicId);
            }
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
        const specificBookingStartDate = new Date("<?php echo $booking['Booking_StartDate']; ?>");
        const specificBookingEndDate = new Date("<?php echo $booking['Booking_EndDate']; ?>");
        
        const specificBookingDates = [];
        for (let d = new Date(specificBookingStartDate); d <= specificBookingEndDate; d.setDate(d.getDate() + 1)) {
            specificBookingDates.push(`${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`);
        }

        function renderCalendar() {
            const currentMonth = currentDate.getMonth();
            const currentYear = currentDate.getFullYear();

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
                const date = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;

                // Kiểm tra nếu ngày hiện tại có trong mảng specificBookingDates hoặc bookedDates
                if (specificBookingDates.includes(date)) {
                    dayCell.classList.add("specific-booking");
                    dayCell.style.cursor = "pointer";

                    dayCell.addEventListener("click", function () {
                        if (selectedDates.includes(date)) {
                            // Nếu ngày đã được chọn trước đó, bỏ chọn và gỡ bỏ lớp đã đánh dấu
                            selectedDates = selectedDates.filter(d => d !== date);
                            this.style.backgroundColor = ""; // Bỏ màu nền
                        } else {
                            // Nếu ngày chưa được chọn, thêm vào danh sách các ngày đã chọn và đánh dấu
                            selectedDates.push(date);
                            this.style.backgroundColor = "#07C940"; // Màu đánh dấu ngày đã chọn
                        }
                        updateDateInputs(); // Cập nhật input ngày
                    });
                } else if (bookedDates.includes(date) && !specificBookingDates.includes(date)) {
                    dayCell.classList.add("booked");
                    dayCell.style.cursor = "not-allowed"; // Không cho phép nhấp vào
                } else {
                    dayCell.addEventListener("click", function () {
                        if (selectedDates.includes(date)) {
                            selectedDates = selectedDates.filter(d => d !== date);
                            this.classList.remove("selected");
                        } else {
                            selectedDates.push(date);
                            this.classList.add("selected");
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

            // Sắp xếp selectedDates theo thứ tự ngày tháng
            selectedDates.sort((a, b) => new Date(a) - new Date(b));
            
            const startDate = new Date(selectedDates[0]);
            const endDate = new Date(selectedDates[selectedDates.length - 1]);

            // Chuyển đổi định dạng ngày theo kiểu 'j M Y'
            const formatDate = (date) => {
                const day = date.getDate();
                const month = months[date.getMonth()];
                const year = date.getFullYear();
                return `${day} ${month} ${year}`;
            };

            // Cập nhật giá trị cho các input theo định dạng 'j M Y'
            startDateInput.value = formatDate(startDate);
            endDateInput.value = formatDate(endDate);
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

</body>
</html>