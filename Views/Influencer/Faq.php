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
    <title>FAQ</title>
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

    .privacy-content {
        background-color: #ffffff;
        padding: 15px;
        border-radius: 8px;
        max-height: 500px; /* Set maximum height for the scrollable area */
        overflow-y: auto; /* Enable vertical scrolling */
    }
    
    .scroll-content h3 {
        font-size: 22px;
        color: #7B7979;
        font-weight: 500;
        margin-top: 15px;
        margin-bottom: 5px;
    }
    
    .scroll-content p {
        font-size: 18px;
        color: #333;
        font-weight: 300;
        line-height: 1.6;
    }

    .scroll-content b {
        font-weight: 500;
    }

</style>
<body>
    <div class="container1">
        <?php include 'left.php' ?>

        <div class="right">
            <div class="top">
                <div class="searchBx">
                    <h2>FAQ</h2>
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
                                    <h4 style="color: #847F7F; font-size: 26px; font-weight:bold" class="text-center">Frequently Asked Questions For Influencer</h4>
                                    
                                    <div class="privacy-content">
                                        <div class="scroll-content">
                                            <h3>1. How do I sign up to become an Influencer on the platform?</h3>
                                            <br>
                                            <p>To sign up to become an Influencer, simply click the "Sign Up" button on the homepage, then select the Influencer role and complete the registration form with your personal information, social media, and the field you operate in.</p>
                                    
                                            <h3>2. How can I get contracts from brands?</h3>
                                            <br>
                                            <p>After creating an Influencer profile, brands will review your profile. If it is suitable for their campaign, they will contact you and propose a partnership. You can also view available campaigns and apply if you find it suitable.</p>
                                    
                                            <h3>3. Can I edit my personal profile after I have signed up?</h3>
                                            <br>
                                            <p>Yes, you can edit your profile information at any time by logging into your account and going to "Edit Profile". Information may include areas of activity, social media links, and latest statistics.</p>
                                            
                                            <h3>4. Can I work with multiple brands at the same time?</h3>
                                            <br>
                                            <p>You can work with multiple brands as long as the contracts do not conflict in content or timing. Make sure you manage your schedule appropriately to meet the requirements of the brand.</p>

                                            <h3>5. Can I decline a contract or campaign?</h3>
                                            <br>
                                            <p>Yes, if a campaign is not right for you, you have the right to decline without penalty. We encourage you to only participate in campaigns that you feel are suitable and can complete well.</p>
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
        const privacyContent = document.querySelector('.privacy-content');

        privacyContent.addEventListener('scroll', () => {
            const { scrollTop, scrollHeight, clientHeight } = privacyContent;
            if (scrollTop + clientHeight >= scrollHeight) {
                console.log('You have reached the end of the privacy policy.');
            }
        });

    </script>

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