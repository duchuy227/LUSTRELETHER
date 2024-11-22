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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./views/Influencer/style.css?v=1.0">
    <title>Dashboard</title>
</head>
<style>

    :root {
    --primary-color: #f90a39;
    --text-color: #1d1d1d;
    --bg-color: #f1f1fb;
    }

    .calendar {
    width: 100%;
    max-width: 900px;
    padding: 5px 20px;
    border-radius: 10px;
    background-color: var(--bg-color);
    }
    .calendar .header {
    display: flex;
    margin-top: 20px;
    justify-content: space-between;
    align-items: center;
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
    font-size: 14px;
    font-weight: 600;
    }
    .days {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    }
    .days .day {
    width: calc(100% / 7 - 9px);
    height: 30px;
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
    background-color: var(--primary-color);
    transform: scale(1.05);
    }
    
    .days .day.next,
    .days .day.prev {
    color: #ccc;
    }
    .day.booked {
        background-color: #2200B2;
        color: white;
    }

    /* Lớp completed sẽ thay đổi màu nền thành xanh lá */
    .past.completed {
        background-color: #02b519; /* Màu xanh lá cây */
        opacity: 0.5; /* Làm mờ */
    }

    /* Lớp past sẽ làm mờ và thay đổi màu chữ */
    .day.past {
        opacity: 0.5; /* Làm mờ các ngày đã qua */
        color: #bbb;  /* Thay đổi màu sắc các ngày đã qua */
        pointer-events: none; /* Ngừng các sự kiện click cho các ngày đã qua */
    }

    /* Đảm bảo rằng nếu ngày vừa booked vừa past, booked sẽ được ưu tiên */
    .day.booked.past {
        background-color: #02b519 !important;
        color: white !important;
        opacity: 0.5 !important;  /* Hủy opacity của lớp past nếu có lớp booked */
    }




    


</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
        <div class="top">
                <div class="searchBx">
                    <h2>Dashboard</h2>
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
                    <!-- <div class="arrow">
                        <span class="material-symbols-outlined">
                            expand_more
                        </span>
                    </div> -->
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
                <div class="projectCard">
                    <div class="projectTop">
                        <h2>Total Booking</h2>
                        <br>
                        <div class="number" style="display: flex; justify-content: center; align-items: center; gap: 20px">
                            <span><?php echo $book ?></span>
                            <img src="./././Image/u9.png">
                        </div>
                    </div>
                </div>

                <div class="projectCard1">
                    <div class="projectTop1">
                        <h2>Article</h2>
                        <img class="options-icon" src="./././Image/u42.png" width="35" height="35" style="opacity: 50%;">
                    </div>
                    <?php foreach ($article as $a):?>
                    <div class="article">
                        <span><?php echo $a['Post_Title'] ?></span>
                        <p style="font-weight: 500; color: <?php 
                            if ($a['Post_Status'] === 'Pending') {
                                echo '#F79A03';
                            } elseif ($a['Post_Status'] === 'Rejected') {
                                echo '#DB0101'; 
                            } elseif ($a['Post_Status'] === 'Active') {
                                echo '#069603';
                            } ?>;"><?php echo $a['Post_Status'] ?>
                        </p>
                    </div>
                    <?php endforeach;?>
                </div>
                
                <div class="projectCard2">
                    <div class="projectTop2">
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
                    </div>
                </div>

                <div class="projectCard3">
                    <div class="projectTop3">
                        <h2>Email</h2>
                        <img class="options-icon" src="./././Image/u42.png" width="35" height="35" style="opacity: 50%;">
                    </div>
                    <?php foreach ($mail as $m) : ?>
                    <div class="email-item">
                        <img src="<?php echo $m['Cus_Image'] ?>" width="66" height="66">
                        <div class="email-content">
                            <span class="name"><?php echo $m['Cus_Username'] ?></span>
                            <p class="message"><?php echo $m['Mail_Content'] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="projectCard1">
                    <div class="projectTop1">
                        <h2>Timeline</h2>
                        <img class="options-icon" src="./././Image/u42.png" width="35" height="35" style="opacity: 50%;">
                    </div>
                    <br>
                    <?php foreach($timeline as $t): ?>
                    <div class="timeline">
                        <span><img style="opacity: 50%; margin-right: 5px;" src="./././Image/u79.png" width="25" height="25"><?php echo $t['Booking_Content'] ?></span>
                    </div>
                    <br>
                    <?php endforeach; ?>
                </div>

                <div class="projectCard3">
                    <div class="projectTop3">
                        <h2>Feedbacks</h2>
                        <img class="options-icon" src="./././Image/u42.png" width="35" height="35" style="opacity: 50%;">
                    </div>
                    <?php foreach ($feedback as $f): ?>
                    <div class="email-item">
                        <img src="<?php echo $f['Cus_Image'] ?>" width="66" height="66">
                        <div class="email-content">
                            <span class="name"><?php echo $f['Cus_Username'] ?></span>
                            <p class="message">
                            <?php 
                                $content = $f['Feed_Content']; 
                                echo strlen($content) > 25 ? substr($content, 0, 25) . '...' : $content; 
                            ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
        const daysContainer = document.querySelector(".days"),
            nextBtn = document.querySelector(".next-btn"),
            prevBtn = document.querySelector(".prev-btn"),
            month = document.querySelector(".month"),
            todayBtn = document.querySelector(".today-btn");

        // Giả sử bạn đã có danh sách các booking với thông tin 'Date' và 'Booking_Status' từ PHP
        const bookedDates = <?php echo json_encode(array_column($bookings ?? [], 'Date')); ?>;
        const completedBookings = <?php echo json_encode(array_column(array_filter($bookings ?? [], function($booking) {
            return $booking['Booking_Status'] === 'Completed';
        }), 'Date')); ?>;

        const months = [
            "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
        ];

        const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

        const date = new Date();
        let currentMonth = date.getMonth();
        let currentYear = date.getFullYear();

        function renderCalendar() {
            date.setDate(1); // Đặt ngày thành ngày đầu tiên của tháng hiện tại
            const firstDay = new Date(currentYear, currentMonth, 1); // Ngày đầu tiên của tháng
            const lastDay = new Date(currentYear, currentMonth + 1, 0); // Ngày cuối cùng của tháng
            const lastDayDate = lastDay.getDate();
            const firstDayIndex = firstDay.getDay(); // Thứ trong tuần của ngày đầu tiên
            
            month.innerHTML = `${months[currentMonth]} ${currentYear}`;
            let daysHTML = "";

            // Thêm khoảng trống cho các ngày trước ngày đầu tiên của tháng
            for (let x = 0; x < firstDayIndex; x++) {
                daysHTML += `<div class="day empty"></div>`; // Ô trống
            }

            // Lặp qua tất cả các ngày trong tháng
            for (let i = 1; i <= lastDayDate; i++) {
                const currentDay = new Date(currentYear, currentMonth, i);
                const currentDayFormatted = `${currentYear}-${(currentMonth + 1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}`;
                const isBooked = bookedDates.includes(currentDayFormatted); // Ngày có sự kiện được đặt
                const isTodayOrFuture = currentDay < new Date().setHours(0, 0, 0, 0);

                let dayClass = "";

                if (isTodayOrFuture) {
                    const isCompleted = completedBookings.some(booking => booking['Booking_StartDate'] === currentDayFormatted);
                    if (isCompleted) {
                        dayClass = "completed";  // Nếu booking đã hoàn thành, thêm lớp completed
                    }
                    dayClass += " past";  // Thêm lớp past cho các ngày đã qua
                }

                // Thêm lớp 'booked' nếu ngày này đã được đặt
                if (isBooked) {
                    dayClass += " booked";
                }

                daysHTML += `<div class="day ${dayClass}">${i}</div>`;
            }

            daysContainer.innerHTML = daysHTML;
            hideTodayBtn();
        }


        renderCalendar();

        nextBtn.addEventListener("click", () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar();
        });

        prevBtn.addEventListener("click", () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar();
        });

        todayBtn.addEventListener("click", () => {
            currentMonth = date.getMonth();
            currentYear = date.getFullYear();
            renderCalendar();
        });

        function hideTodayBtn() {
            if (currentMonth === new Date().getMonth() && currentYear === new Date().getFullYear()) {
                todayBtn.style.display = "none";
            } else {
                todayBtn.style.display = "flex";
            }
        }
    </script>

</body>
</html>