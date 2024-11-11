<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <title>Influencer Login</title>
</head>
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
            background-color: #6377F9;
            color: white;
            
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .left h2, .right h2 {
            font-size: 32px;
            font-weight: 800;
            
        }
        .right h2 {
            margin-top: 20px;
        }
        .left h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 20px;
        }
        .left p {
            font-size: 16px;
                font-weight: 200;
                margin-top: 10px;
                margin-bottom: 20px;
        }
        .left button {
            padding: 15px 35px;
                background-color: #7C2FC9;
                color: #fff;
                border: none;
                border-radius: 30px;
                font-size: 19px;
                cursor: pointer;
        }

        .left button a {
            color: #fff;
            text-decoration: none;
        }

        .left .images {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-top: 50px;
        }
        .left .images img {
            width: 50%;
            border-radius: 10px;
        }
        .right {
            background-color: #fff;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right h2 {
            text-align: center;
            font-size: 32px;
            font-weight: 800;
            color: #49038E;
            margin-bottom: 20px;
        }
        .right .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        .right .input-group input {
            width: 78%;
            padding: 10px 40px;
            border: 3px solid #49038E;
            border-radius: 30px;
            font-size: 16px;
        }
        .right .input-group i {
            position: absolute;
            top: 50%;
            left: 13px;
            font-size: 20px;
            transform: translateY(-50%);
            color: #050507;
        }
        .error {
            color: #F07070;
            font-weight: 500;
            font-size: 16px;
            margin-bottom: 20px;
            text-align: center;
        }
        .right .input-group select {
            width: 50%;
            padding: 10px 20px;
            border: 3px solid #49038E;
            border-radius: 20px;
            font-size: 14px;
            
        }
        
        .right .remember-me {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .right .remember-me input {
            margin-right: 10px;
        }
        .right .remember-me label {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #333333;
            font-weight: 400;
        }

        .right .remember-me a {
            text-decoration: none;
            font-size: 14px;
            color: #333333;
            font-weight: 500;
        }
        
        .right button {
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
        .right .signup-link {
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
        }
        .right .signup-link span {
            color: #000; 
            font-weight: 700;
        }
        .right .signup-link a {
            color: #4a3aff;
            text-decoration: none;
            font-weight: 600;
        }
        .right .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 18px;
            font-weight: 500;
            color: #49038E;
        }
        @media (max-width: 900px) {
            .container {
                flex-direction: column;
                width: 100%;
            }
            .right .input-group input, .right button {
                max-width: 100%;
            }
            .right .input-group select {
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
            .left .images {
                flex-direction: column-reverse;
                align-items: center;
            }
            .left .images img {
                width: 80%;
                margin-bottom: 20px;
            }
        }
    </style>
    <body>
        <div class="container">
            <div class="left">
                <h2>You are Customer</h2>
                <p>
                Booking an influencer is hiring or partnering with an influencer to
                promote a product, service or attend an event to reach and influence
                their audience.
                </p>
                <button><a href="index.php?action=cusLogin">SIGN IN</a></button>
                <div class="images">
                <img height="208" src="./././Image/u35.png" width="220"/>
                <img height="208" src="./././Image/u40.png" width="220"/>
                </div>
            </div>
            <div class="right">
                <h2>Sign in</h2>
                <form action="index.php?action=InfluLogin" method="post">
                    <div class="input-group">
                        <input name="username" placeholder="Username" type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"/>
                        <i class="fa fa-user"></i>
                    </div>
                    <?php if (isset($error)) : ?>
                        <div class="error"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <div class="input-group">
                        <input name="password" placeholder="Password" type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"/>
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="input-group">
                        <select name="influType">
                            <option value="" hidden>Influencer</option>
                            <option value="7">KOC</option>
                            <option value="9">KOL</option>
                            <option value="5">MC</option>
                        </select>
                    </div>
                    <div class="remember-me">
                        <label><input type="checkbox"/>Remember me</label>
                        <a href="#">Forgot password ?</a>
                    </div>
                    <button type="submit">LOGIN</button>
                    <div class="signup-link">
                        Don't have an account? Sign up for 
                        <a href="index.php?action=InfluRegister"><span>Influencer</span></a>
                        </div>
                        <a style="text-decoration: none;" href="index.php?action=homepage"><div class="footer">LustreTether - Influencer Community</div></a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
