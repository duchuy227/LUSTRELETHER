<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container d-flex justify-content-between align-items-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="navbar-brand d-flex align-items-center" href="index.php?action=customer_userpage">
                    <img alt="Logo" height="60" src="././views/Img/u2.jpg" width="60"/>
                    <span class="ms-2">LustreLether</span>
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=customer_userpage">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=customer_influencer">Influencers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=customer_topic">All Topics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=customer_policy">Policy</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <span style="margin-right: 20px; margin-top: 13px; font-weight: 500">
                            <?php echo $customer['Cus_Username'] ?>
                        </span>
                        <a class="nav-link" href="index.php?action=customer_dashboard">
                            <?php if (!empty($customer['Cus_Image'])): ?>
                            <img class="rounded-circle" height="50" src="<?php echo $customer['Cus_Image'] ?>" width="50" style="object-fit: cover;"/>
                            <?php else: ?>
                            <img class="rounded-circle" src="././views/Img/avatar.jpg" width="50" height="50" style="object-fit: cover;">
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>