<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" href="././views/Img/u2.png" type="image/x-icon">
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
    .days .day.today {
    color: #fff;
    background-color: var(--primary-color);
    }
    .days .day.next,
    .days .day.prev {
    color: #ccc;
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
                        <h2>Customer Booking</h2>
                        <br>
                        <div class="number">
                                <span>20</span>
                                <img src="./././Image/u9.png">
                        </div>
                    </div>
                </div>

                <div class="projectCard1">
                    <div class="projectTop1">
                        <h2>Article</h2>
                        <img class="options-icon" src="./././Image/u42.png" width="35" height="35" style="opacity: 50%;">
                    </div>
                    <div class="article">
                        <span>A Storm Breaker</span>
                        <p class="rejected">Rejected</p>
                    </div>
                    <div class="article">
                        <span>Hello world</span>
                        <p class="rejected">Rejected</p>
                    </div>
                    <div class="article">
                        <span>Smile All Days</span>
                        <p class="posted">Posted</p>
                    </div>
                    <div class="article">
                        <span>A Day in My Life</span>
                        <p class="posted">Posted</p>
                    </div>
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
                    <div class="email-item">
                        <img src="./././Image/u87.png" width="66" height="66">
                        <div class="email-content">
                            <span class="name">Bẻo Chỏ</span>
                            <p class="message">Check my booking</p>
                        </div>
                    </div>
                    <div class="email-item">
                        <img src="./././Image/u59_div.png" width="66" height="66">
                        <div class="email-content">
                            <span class="name">Viet Huy</span>
                            <p class="message">Are you free?</p>
                        </div>
                    </div>
                    <div class="email-item">
                        <img src="./././Image/u57_div.jpg" width="66" height="66">
                        <div class="email-content">
                            <span class="name">Bẻo Bẻo</span>
                            <p class="message">Rep my email</p>
                        </div>
                    </div>
                </div>

                <div class="projectCard1">
                    <div class="projectTop1">
                        <h2>Timeline</h2>
                        <img class="options-icon" src="./././Image/u42.png" width="35" height="35" style="opacity: 50%;">
                    </div>
                    <div class="timeline">
                        <span><img style="opacity: 50%; margin-right: 5px;" src="./././Image/u79.png" width="25" height="25">Event 1</span>
                        <p>10/09/2024</p>
                    </div>
                    <div class="timeline">
                        <span><img style="opacity: 50%; margin-right: 5px;" src="./././Image/u79.png" width="25" height="25">Event 1</span>
                        <p>11/09/2024</p>
                    </div>
                    <div class="timeline">
                        <span><img style="opacity: 50%; margin-right: 5px;" src="./././Image/u79.png" width="25" height="25">Event 1</span>
                        <p>12/09/2024</p>
                    </div>
                    <div class="timeline">
                        <span><img style="opacity: 50%; margin-right: 5px;" src="./././Image/u79.png" width="25" height="25">Event 1</span>
                        <p>13/09/2024</p>
                    </div>
                </div>

                <div class="projectCard3">
                    <div class="projectTop3">
                        <h2>Feedbacks</h2>
                        <img class="options-icon" src="./././Image/u42.png" width="35" height="35" style="opacity: 50%;">
                    </div>
                    <div class="email-item">
                        <img src="./././Image/u55.png" width="66" height="66">
                        <div class="email-content">
                            <span class="name">QuanDH</span>
                            <p class="message">Good Event</p>
                        </div>
                    </div>
                    <div class="email-item">
                        <img src="./././Image/u56.png" width="66" height="66">
                        <div class="email-content">
                            <span class="name">TuyenPD</span>
                            <p class="message">impressive</p>
                        </div>
                    </div>
                    <div class="email-item">
                        <img src="./././Image/u57.png" width="66" height="66">
                        <div class="email-content">
                            <span class="name">NghiLV</span>
                            <p class="message">Thanks you</p>
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
        const daysContainer = document.querySelector(".days"),
        nextBtn = document.querySelector(".next-btn"),
        prevBtn = document.querySelector(".prev-btn"),
        month = document.querySelector(".month"),
        todayBtn = document.querySelector(".today-btn");
    
        const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
        ];
    
        const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    
        // get current date
        const date = new Date();
    
        // get current month
        let currentMonth = date.getMonth();
    
        // get current year
        let currentYear = date.getFullYear();
    
        // function to render days
        function renderCalendar() {
        // get prev month current month and next month days
        date.setDate(1);
        const firstDay = new Date(currentYear, currentMonth, 1);
        const lastDay = new Date(currentYear, currentMonth + 1, 0);
        const lastDayIndex = lastDay.getDay();
        const lastDayDate = lastDay.getDate();
        const prevLastDay = new Date(currentYear, currentMonth, 0);
        const prevLastDayDate = prevLastDay.getDate();
        const nextDays = 7 - lastDayIndex - 1;
    
        // update current year and month in header
        month.innerHTML = `${months[currentMonth]} ${currentYear}`;
    
        // update days html
        let days = "";
    
        // prev days html
        for (let x = firstDay.getDay(); x > 0; x--) {
            days += `<div class="day prev">${prevLastDayDate - x + 1}</div>`;
        }
    
        // current month days
        for (let i = 1; i <= lastDayDate; i++) {
            // check if its today then add today class
            if (
            i === new Date().getDate() &&
            currentMonth === new Date().getMonth() &&
            currentYear === new Date().getFullYear()
            ) {
            // if date month year matches add today
            days += `<div class="day today">${i}</div>`;
            } else {
            //else dont add today
            days += `<div class="day ">${i}</div>`;
            }
        }
    
        // next MOnth days
        for (let j = 1; j <= nextDays; j++) {
            days += `<div class="day next">${j}</div>`;
        }
    
        // run this function with every calendar render
        hideTodayBtn();
        daysContainer.innerHTML = days;
        }
    
        renderCalendar();
    
        nextBtn.addEventListener("click", () => {
        // increase current month by one
        currentMonth++;
        if (currentMonth > 11) {
            // if month gets greater that 11 make it 0 and increase year by one
            currentMonth = 0;
            currentYear++;
        }
        // rerender calendar
        renderCalendar();
        });
    
        // prev monyh btn
        prevBtn.addEventListener("click", () => {
        // increase by one
        currentMonth--;
        // check if let than 0 then make it 11 and deacrease year
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar();
        });
    
        // go to today
        todayBtn.addEventListener("click", () => {
        // set month and year to current
        currentMonth = date.getMonth();
        currentYear = date.getFullYear();
        // rerender calendar
        renderCalendar();
        });
    
        // lets hide today btn if its already current month and vice versa
    
        function hideTodayBtn() {
            if (
                currentMonth === new Date().getMonth() &&
                currentYear === new Date().getFullYear()
            ) {
                todayBtn.style.display = "none";
            } else {
                todayBtn.style.display = "flex";
            }
        }
    </script>

</body>
</html>