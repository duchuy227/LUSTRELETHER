<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Customer Login</title>
</head>
<body>
    <style>
            body {
                margin: 0;
                font-family: "Poppins", sans-serif;
                background-color: #EFF5FD;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                overflow: auto;
            }
            .container {
                display: flex;
                flex-direction: row;
                width: 100%;
                max-width: 900px;
                height: auto;
                box-shadow: 7px 5px 8px rgba(0, 0, 0, 0.372);
                overflow: hidden;
            }
            .left, .right {
                flex: 1;
                padding: 40px;
            }
            .left {
                background-color: #fff;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .right {
                background-color: #6377F9;
                color: #fff;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
                text-align: center;
                
            }
            .left h2, .right h2 {
                font-size: 32px;
                font-weight: 800;
                
            }
            .left h2 {
                margin-top: 20px;
            }
            .right h2 {
                margin-bottom: -25px;
            }
            .left form {
                width: 100%;
                
            }
            .input-group {
                width: 100%;
                position: relative;
                margin-bottom: 20px;
            }
            .input-group input {
                width: 78%; /* Adjusted width */
                padding: 10px 40px;
                border: 3px solid #49038E;
                border-radius: 30px;
                font-size: 16px;
            }
            .input-group i {
                position: absolute;
                top: 50%;
                left: 13px;
                font-size: 20px;
                transform: translateY(-50%);
                color: #050507;
            }
            
            .error-message {
                color: #F07070;
                font-weight: 500;
                font-size: 16px;
                margin-bottom: 20px;
                text-align: center;
            }
            .options {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }
            .options label {
                display: flex;
                align-items: center;
                font-size: 14px;
                color: #333333;
                font-weight: 400;
            }
            .options label input {
                margin-right: 5px;
            }
            .options a {
                font-size: 14px;
                color: #333333;
                font-weight: 500;
                text-decoration: none;
            }
            .login-btn {
                width: 100%; /* Adjusted width */
                padding: 10px;
                background-color: #49038E;
                color: #fff;
                border: none;
                font-weight: 500;
                border-radius: 30px;
                font-size: 18px;
                cursor: pointer;
            }
            .signup-link {
                margin-top: 20px;
                font-size: 15px;
            }
            .signup-link a {
                color: #333333;
                text-decoration: none;
                font-weight: 400;
                font-size: 15px;
            }
            .signup-link span {
                color: #000; 
                font-weight: 700;
            }
            .footer {
                margin-top: 40px;
                font-size: 18px;
                font-weight: 500;
                color: #49038E;
                text-decoration: none;
            }
            
            .right p {
                font-size: 16px;
                font-weight: 200;
                margin-top: 30px;
                margin-bottom: 20px;
            }
            .right .sign-in-btn {
                padding: 15px 35px;
                background-color: #7C2FC9;
                color: #fff;
                border: none;
                border-radius: 30px;
                font-size: 19px;
                cursor: pointer;
            }

            .right .sign-in-btn a {
                text-decoration: none;
                color: #fff;
            }

            .right .images {
                display: flex;
                justify-content: space-around;
                width: 100%;
                margin-top: 20px;
            }
            .right .images img {
                width: 45%;
                border-radius: 10px;
            }

            @media (max-width: 900px) {
                .container {
                    flex-direction: column;
                    width: 100%;
                }
                .input-group, .login-btn {
                    max-width: 100%;
                }

                .input-group i {
                    right: 30px;
                    position:absolute;
                }
                .left, .right {
                    max-width: 100%;
                    padding: 20px;
                }
                .right .images {
                    flex-direction: column;
                    align-items: center;
                }
                .right .images img {
                    width: 80%;
                    margin-bottom: 20px;
                }
            }
    </style>
    <div class="container">
        <div class="left">
            <h2 style="color: #49038E; font-weight: 800">Sign in</h2>
            <form method="post">
                <div class="input-group">
                    <input placeholder="Username" type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"/>
                    <i class="fa fa-user"></i>
                </div>

                <?php if(isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])):?>
                    <div class="error-message"><?php echo $_SESSION['error_message']; ?></div>
                    <?php unset($_SESSION['error_message']); ?>
                <?php endif; ?>

                <div class="input-group">
                    <input placeholder="Password" type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"/>
                    <i class="fa fa-lock"></i>
                </div>
                <div class="options">
                    <label><input type="checkbox"/>Remember me</label>
                    <a href="#">Forgot password ?</a>
                </div>
                <button class="login-btn" type="submit">
                    LOGIN
                </button>
            </form>
            <div class="signup-link">
                Don't have an account? Sign up for 
                <a href="index.php?action=cusRegister"><span>Customer</span></a>
                </div>
                <a style="text-decoration:none" href="index.php?action=homepage"><div class="footer">LustreTether - Influencer Community</div></a>
            </div>
        <div class="right">
            <h2>You Are Influencer</h2>
            <p>An influencer is a person who has influence in a community, often using social media platforms to share content and influence the consumption decisions or behavior of their followers.</p>
            <button class="sign-in-btn"><a href="index.php?action=InfluLogin">SIGN IN</a></button>
            <div class="images">
                <img height="208" src="./././Image/u14.png" width="220"/>
                <img height="208" src="./././Image/u15.png" width="220"/>
            </div>
        </div>
    </div>
</body>
</html>