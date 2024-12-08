<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="navbar-brand d-flex align-items-center" href="index.php?action=customer_userpage">
                    <img alt="Logo" height="60" src="././views/Img/u2.jpg" width="60"/>
                    <span class="ms-2">LustreLether</span>
                </a>
                
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" style="font-weight: 500;" href="index.php?action=customer_userpage">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-weight: 500;" href="index.php?action=customer_influencer">Influencers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-weight: 500;" href="index.php?action=customer_topic">All Topics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-weight: 500;" href="index.php?action=customer_policy">Policy</a>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center profile">
                        <span style=" font-weight: 500; font-size: 17px">
                            <?php echo $customer['Cus_Username'] ?>
                        </span>
                        <a class="nav-link" style="margin: 0 20px;" href="index.php?action=customer_dashboard">
                            <?php if (!empty($customer['Cus_Image'])): ?>
                            <img class="rounded-circle" height="50" src="<?php echo $customer['Cus_Image'] ?>" width="50" style="object-fit: cover;"/>
                            <?php else: ?>
                            <img class="rounded-circle" src="././views/Img/avatar.jpg" width="50" height="50" style="object-fit: cover;">
                            <?php endif; ?>
                        </a>
                    </div>
                
            </div>
        </div>
</nav>

    <style>
        @media (min-width: 1200px) {
            .navbar-nav {
                display: flex;
                justify-content: space-evenly; /* Hoặc space-between */
                width: 100%; /* Đảm bảo danh sách chiếm toàn bộ chiều ngang */
            }
        }
        @media (max-width: 950px) {
            /* Đặt nền trắng cho navbar */
            .navbar {
                background-color: #ffffff;
                padding: 10px;
                
            }

            .navbar-brand span{
                margin-right: 100%;
            }

            

            /* Avatar và username hiển thị hàng ngang */
            .navbar .d-flex {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                gap: -15px;
            }

            /* Thu nhỏ avatar trong màn hình nhỏ */
            .profile span {
                display: none;
            }

            /* Hiển thị menu dọc trong responsive */
            .collapse.show {
                display: block;
                background-color: #ffffff; /* Nền trắng khi mở menu */
                padding: 15px;
                margin: 10px;
                border-radius: 0 0 5px 5px;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
                transition: 0.3s ease;
                max-width: 100%;
                width: 346px;
            }

            .navbar-nav {
                flex-direction: column;
                align-items: start;
            }

            .nav-item {
                padding: 10px 0;
            }

            .nav-link {
                font-size: 16px;
                color: #333;
            }
        }
    </style>