<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Admin Login</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        box-sizing: border-box;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #CDE7FF;
    }

    .container {
        background-color: #FFFFFF;
        padding: 40px;
        border: 3px solid #9EBEEE;
        border-radius: 50px;
        text-align: center;
        width: 463px;
        max-width: 100%;
        box-shadow: 5px 5px 5px #EFF5FD;
        opacity: 70%;
    }

    .container h2 {
        margin-top: 20px;
        margin-bottom: 30px;
        color: #03649B;
        font-size: 32px;
        font-weight: 800;
    }

    .input-group {
        position: relative;
        margin-bottom: 20px;
    }

    .input-group input {
        width: 100%;
        padding: 10px 45px 10px 40px;
        border: 3px solid #03649B;
        border-radius: 30px;
        font-size: 16px;
    }

    .input-group i {
        position: absolute;
        top: 50%;
        left: 15px;
        font-size: 20px;
        transform: translateY(-50%);
        color: #2c3e50;
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
        color: #03649B;
    }

    .options label input {
        margin-right: 5px;
    }

    /* Chỉnh checkbox */
    .options label input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        width: 15px;
        height: 15px;
        border: 2px solid #03649B;
        border-radius: 4px;
        position: relative;
        cursor: pointer;
        outline: none;
    }

    .options input[type="checkbox"]:checked {
        background-color: #03649B;
        border-color: #03649B;
    }

    .options input[type="checkbox"]:checked::after {
        content: '✔'; /* Font Awesome checkmark */
        font-family: 'FontAwesome';
        font-size: 12px;
        color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .options a {
        font-size: 14px;
        color: #03649B;
        text-decoration: none;
    }

    .login-btn {
        background-color: #0690DE;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        font-size: 18px;
        font-weight: 500;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
    }

    /* Đảm bảo responsive */
    @media (max-width: 768px) {
        .container {
            width: 90%;
        }

        .input-group input {
            padding: 10px 35px 10px 30px;
        }

        .input-group i {
            font-size: 18px;
            left: 10px;
        }

        .login-btn {
            padding: 10px 15px;
        }
    }
</style>
<body>
    <div class="container">
        <form method="POST">
            <h2>Sign in</h2>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" id="txtUsername" name="username">
            </div>

            <?php if(isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])):?>
                <div class="error-message"><?php echo $_SESSION['error_message']; ?></div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" id="txtPassword" name="password">
            </div>
            <div class="options">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <button name="submit" type="submit" value="submit" class="login-btn">LOGIN</button>
        </form>
    </div>
</body>
</html>
