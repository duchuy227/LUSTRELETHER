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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Analytics</title>
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
        grid-template-columns: 250px auto;
        margin: 0 auto;
    }

    main .recent_order{
        margin-top: 2rem;
        background: var(--clr-white);
        width: 100%;
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


    .faculty-contri {
        max-width: 100%;
        height: 500px;
        position: relative;
        overflow: hidden;
        margin: 40px;
    }

    .chart-container {
        display: flex;
        flex-direction: column; /* Căn theo chiều dọc */
        justify-content: center; /* Canh giữa nội dung */
        align-items: center; /* Canh giữa nội dung */
        text-align: center; /* Canh giữa chữ */
    }

    .chart-container canvas {
        max-width: 100%; /* Giới hạn kích thước biểu đồ */
        height: 500px;
        margin-bottom: 30px;
    }

    .chart-wrapper {
        display: flex;
        justify-content: center; /* Căn giữa theo chiều ngang */
        align-items: center; /* Căn giữa theo chiều dọc */
        height: 400px; /* Đặt chiều cao của khung bao quanh */
        margin: 40px;
    }

    .chart-wrapper canvas {
        max-width: 100%; /* Đảm bảo biểu đồ không bị vỡ kích thước */
        max-height: 100%;
        position: relative;
        overflow: hidden;
    }


</style>
<body>
    <div class="container1">
        <?php include 'admin_sidebar.php' ?>

        <main>
            <div class="row align-items-center">
                <div class="col-md-9 d-flex align-items-center">
                    <h2 style="font-size: 40px; font-weight:bold; color:#333333">Chart - Analytics</h2>
                </div>

                <div class="col-md-3 d-flex align-items-center justify-content-end">
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

            <div class="recent_order">
                <div class="profile">
                    <br>
                    <h3 class="text-center">Booking Topic Chart</h3>
                    <div class="faculty-contri">
                        <canvas id="facultyChart"></canvas>
                    </div>
                </div>
                <br>
            </div>

            <div class="recent_order">
                <div class="profile">
                    <br>
                    <div class="chart-container">
                        <h3 class="text-center">Total Influencer by Type</h3>
                        <br>
                        <div class="influencer-type">
                            <canvas id="influencerChart"></canvas>
                        </div>
                    </div>
                </div>
                <br>
            </div>

            <div class="recent_order">
                <div class="profile">
                    <br>
                    <h3 class="text-center">Average Service Price by Influencer Type</h3>
                    <div class="chart-wrapper">
                        <canvas id="priceChart"></canvas>
                    </div>
                </div>
                <br>
            </div>

            <div class="recent_order">
                <div class="profile">
                    <br>
                    <h3 class="text-center">Booking Rate by Type of Influencers</h3>
                    <div class="chart-wrapper">
                        <canvas id="bookingChart"></canvas>
                    </div>
                </div>
                <br>
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
        // Data for Booking Topic Chart
        var facultyData = <?php echo json_encode($bdata); ?>;
        var topicNames = [];
        var bookingCounts = [];

        for (var i = 0; i < facultyData.length; i++) {
            topicNames.push(facultyData[i].Topic_Name); // Sử dụng Topic_Name từ dữ liệu
            bookingCounts.push(parseInt(facultyData[i].booking_count)); // Sử dụng booking_count từ dữ liệu
        }

        var facultyCtx = document.getElementById('facultyChart').getContext('2d');
        var facultyChart = new Chart(facultyCtx, {
            type: 'bar',
            data: {
                labels: topicNames, // Labels cho biểu đồ
                datasets: [{
                    label: 'Number of Bookings',
                    data: bookingCounts, // Dữ liệu số lượng booking
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { // Tùy chỉnh trục x
                        ticks: {
                            font: {
                                size: 14 // Kích thước chữ của topic (nhãn trục x)
                            },
                            color: '#333333' // Tùy chọn: chỉnh màu chữ (nếu cần)
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                size: 14 // Kích thước chữ của số liệu trục y
                            },
                            color: '#333333'
                        }
                    }
                }
            }
        });


       // Data for Influencer Count by Type Chart
        var influencerData = <?php echo json_encode($idata); ?>;
        var influencerTypeNames = [];
        var influencerCounts = [];

        for (var i = 0; i < influencerData.length; i++) {
            influencerTypeNames.push(influencerData[i].InfluType_Name); // Tên loại influencer
            influencerCounts.push(parseInt(influencerData[i].influencer_count)); // Số lượng influencer (chuyển sang số nguyên)
        }

        var influencerCtx = document.getElementById('influencerChart').getContext('2d');
        var influencerChart = new Chart(influencerCtx, {
            type: 'pie',
            data: {
                labels: influencerTypeNames, // Nhãn của các loại influencer
                datasets: [{
                    label: 'Influencer Count',
                    data: influencerCounts, // Dữ liệu số lượng influencer
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                        // Thêm màu nếu cần
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                        // Thêm màu nếu cần
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top', // Vị trí của chú thích (top, bottom, left, right)
                        labels: {
                            font: {
                                size: 14 // Kích thước chữ của chú thích
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = influencerTypeNames[tooltipItem.dataIndex] || '';
                                var value = influencerCounts[tooltipItem.dataIndex] || 0;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });


       // Lấy dữ liệu từ PHP
        var priceData = <?php echo json_encode($priceData); ?>;
        var typeNames = [];
        var averagePrices = [];

        // Xử lý dữ liệu thành mảng labels và data
        for (var i = 0; i < priceData.length; i++) {
            typeNames.push(priceData[i].InfluType_Name); // Tên loại influencer
            averagePrices.push(parseFloat(priceData[i].average_price)); // Giá trung bình
        }

        // Vẽ biểu đồ bằng Chart.js
        var ctx = document.getElementById('priceChart').getContext('2d');
        var priceChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: typeNames, // Nhãn trục X
                datasets: [{
                    label: '', // Bạn có thể để trống hoặc thêm label nếu cần
                    data: averagePrices, // Dữ liệu trục Y (giá trung bình)
                    backgroundColor: [
                        'rgba(0, 139, 139, 0.5)',  // Cyan
                        'rgba(0, 0, 139, 0.5)',    // Xanh biển
                        'rgba(0, 128, 0, 0.5)'     // Xanh lá cây
                    ],
                    borderColor: [
                        'rgba(0, 139, 139, 1)',    // Viền Cyan
                        'rgba(0, 0, 139, 1)',      // Viền Xanh biển
                        'rgba(0, 128, 0, 1)'       // Viền Xanh lá cây
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Average Price (VND)' // Thay đổi label của trục Y thành giá trung bình
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Influencer Type',
                            font: { size: 16 }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Ẩn hoàn toàn chú thích nếu không cần
                    }
                }
            }
        });


        var bookingData = <?php echo json_encode($bookingData); ?>;
        var typeNames = [];
        var bookingPercentages = [];

        // Xử lý dữ liệu thành mảng labels và data
        for (var i = 0; i < bookingData.length; i++) {
            typeNames.push(bookingData[i].InfluType_Name); // Tên loại influencer
            bookingPercentages.push(parseFloat(bookingData[i].booking_percentage)); // Tỷ lệ phần trăm booking
        }

        var ctx = document.getElementById('bookingChart').getContext('2d');
        var bookingChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: typeNames,
                datasets: [{
                    label: 'Booking Percentage (%)',
                    data: bookingPercentages,
                    backgroundColor: [
                        'rgba(205, 85, 85, 0.5)', 
                        'rgba(205, 140, 57, 0.5)',   
                        'rgba(205, 170, 125, 0.5)' 
                    ],
                    borderColor: [
                        'rgba(205, 85, 85, 1)',  
                        'rgba(205, 140, 57, 1)', 
                        'rgba(205, 170, 125, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'y', // Đảo trục để biểu đồ cột nằm ngang
                scales: {
                    x: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Booking Percentage (%)',
                            font: { size: 16 }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Influencer Type',
                            font: { size: 16 }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });



    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>