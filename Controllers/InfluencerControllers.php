<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once __DIR__ . '/../vendor/autoload.php'; 
    require_once "Models/InfluencerModels.php";
    require_once "Models/AdminModels.php";
    require_once "Controllers/AdminControllers.php";
    
    class InfluencerControllers {
        private  $is_login;
        public function __construct() {
            $this->is_login = $this->is_login();
        }

        public function InfluLogin(){
            ob_start();
            $_SESSION ['is_login'] = false;
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == false){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $influType = $_POST['influType'];
                    $influencerModel = new InfluencerModels();
                    $isLoginSuccessful = $influencerModel->InfluLogin($username, $password, $influType);

                    if ($isLoginSuccessful === true) {
                        header('Location: index.php?action=influencer_dashboard');
                        exit();
                    } elseif ($isLoginSuccessful === 'pending'){
                        $error = "Your account is pending";

                    }elseif($isLoginSuccessful === 'rejected') {
                        // Đăng nhập thất bại, hiển thị lỗi
                        $error = "Your account is rejected";
                    } else {
                        $error = "Invalid Information";
                    }
                }
            }

            include 'views/Influencer/login.php';
        }


        public function InfluRegister(){
            if($this->is_login == true && !isset($_SESSION['is_login']) || $_SESSION['is_login'] == false){
                $AdminModels =  new AdminModels();
                $topics  = $AdminModels->getAllTopic();
                
                $influencerModel = new InfluencerModels();
                
                $type_id = isset($_POST['type_id']) ? $_POST['type_id'] : null;
                $all_type = $AdminModels -> getAllInfluType();
                $type  = $AdminModels -> getInfluencerTypeByID($type_id);

                $gender_id = isset($_POST['gender_id']) ? $_POST['gender_id'] : '';
                $all_gender = $AdminModels -> getAllGender();
                $gender  = $AdminModels -> getGenderByID($gender_id);

                $wplace_id = isset($_POST['wplace_id']) ? $_POST['wplace_id'] : null;
                $all_wplace = $AdminModels -> getAllWorkplace();
                $wplace  = $AdminModels -> getWorkplaceByID($wplace_id);

                $fol_id = isset($_POST['fol_id']) ? $_POST['fol_id'] : '';
                $all_fol = $AdminModels -> getAllFollowers();
                $fol  = $AdminModels -> getFollowersByID($fol_id);

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $Username  = $_POST['username'];
                    $Password  = $_POST['password'];
                    $ConfirmPassword = $_POST['confirm_password'];
                    $Email  = $_POST['email'];
                    $Fullname   = $_POST['fullname'];
                    $DOB   = $_POST['dob'];
                    $PhoneNumber =  $_POST['phonenumber'];
                    $Address =  $_POST['address'];
                    $Nickname =   $_POST['nickname'];
                    $Hastag =   $_POST['hastag'];
                    $Price =    $_POST['price'];
                    
                    
                    if (isset($_FILES['influ_image']) && $_FILES['influ_image']['error'] == 0) {
                        $mainImagePath = 'Views/Influ_Image/' . basename($_FILES['influ_image']['name']);
                        if (move_uploaded_file($_FILES['influ_image']['tmp_name'], $mainImagePath)) {
                            $Influ_Image = $mainImagePath;
                        }
                    }

                    
                    if (isset($_FILES['cccd_image']) && $_FILES['cccd_image']['error'] == 0) {
                        $CCCDImagePath = 'Views/Influ_Image/' . basename($_FILES['cccd_image']['name']);
                        if (move_uploaded_file($_FILES['cccd_image']['tmp_name'], $CCCDImagePath)) {
                            $CCCD_Image = $CCCDImagePath;
                        }
                    }

                    $Achivement =  $_POST['achivement'];
                    $Biography =   $_POST['biography'];
                    $InfluType_ID =   $_POST['type_id'];
                    $Workplace_id =    $_POST['wplace_id'];
                    $Followers_id =   $_POST['fol_id'];
                    $Gender_id  =   $_POST['gender_id'];
                    $Facebook = isset($_POST['facebook_link']) ? $_POST['facebook_link'] : null;
                    $Tiktok = isset($_POST['tiktok_link']) ? $_POST['tiktok_link'] : null;
                    $Instagram = isset($_POST['instagram_link']) ? $_POST['instagram_link'] : null;

                    $topicss = isset($_POST['topics']) ? $_POST['topics'] : [];
                    // Kiểm tra các trường trống
                    if (empty($Username) || empty($Password) || empty($Email) || empty($Fullname) || empty($PhoneNumber) || empty($DOB) || empty($Address) || empty($Nickname) || empty($Hastag) || empty($Price) || empty($Achivement) || empty($Biography) || empty($InfluType_ID) || empty($Workplace_id) || empty($Followers_id) || empty($Gender_id) || empty($topicss)) {
                        $_SESSION['errorMessage'] = 'All fields must be required.';
                        include 'views/Influencer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate username
                    if (!preg_match('/^[A-Z]/', $Username) || !preg_match('/\d/', $Username) || strlen($Username) < 5 || strlen($Username) > 15) {
                        $_SESSION['errorMessage'] = 'Username must start with a capital letter, contain at least one number, and be between 5 to 15 characters long.';
                        include 'views/Influencer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    } elseif ($AdminModels->checkUsernameExists($Username)) {
                        $_SESSION['errorMessage'] = 'Username already exists. Please enter a different one.';
                        include 'views/Influencer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate password
                    if (!preg_match('/^[A-Z]/', $Password) || strlen($Password) < 8 || strlen($Password) > 20 || !preg_match('/\d/', $Password) || !preg_match('/[a-z]/', $Password) || !preg_match('/[\W_]/', $Password)) {
                        $_SESSION['errorMessage'] = 'Password must start with a capital letter, be at least 8 to 20 characters long, include at least 1 number, 1 lowercase letter, and 1 special letter.';
                        include 'views/Influencer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    } elseif ($Password !== $ConfirmPassword) {
                        $_SESSION['errorMessage'] = "Password do not match";
                        include 'views/Influencer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }

                    // Validate Address
                    if (!preg_match('/^[A-Z]/', $Address) || strlen($Address) < 5 || strlen($Address) > 30){
                        $_SESSION['errorMessage'] = 'Address must start with a capital letter, be at least 5 to 30 characters long.';
                        include 'views/Influencer/register.php';
                        return;
                    }
                
                    // Validate Full name
                    if (!preg_match('/^[A-Z]/', $Fullname) || strlen($Fullname) < 5 || strlen($Fullname) > 30) {
                        $_SESSION['errorMessage'] = 'Full name must start with a capital letter, be at least 5 to 30 characters long.';
                        include 'views/Influencer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }

                    // Validate nickname
                    if (strlen($Nickname) > 30) {
                        $_SESSION['errorMessage'] = 'Nickname must be at least 30 characters long.';
                        include 'views/Influencer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate Date of birth
                    $dob = new DateTime($DOB);
                    $currentDate = new DateTime();
                    $age = $dob->diff($currentDate)->y;
                    if ($age < 18) {
                        $_SESSION['errorMessage'] = 'Date of birth must be over 18 years old.';
                        include 'views/Influencer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }

                    // Validate price
                    if (!is_numeric($Price)){
                        $_SESSION['errorMessage'] = 'Price must be a numeric value.';
                        include 'views/Influencer/register.php';
                        return;
                    } elseif ((float)$Price > 100000000){
                        $_SESSION['errorMessage'] = 'Price cannot be large 100 million.';
                        include 'views/Influencer/register.php';
                        return;
                    }
                
                    // Validate Phone Number
                    if (!preg_match('/^[0-9]{10}$/', $PhoneNumber)) { // 10 số
                        $_SESSION['errorMessage'] = 'Phone number must start with a number, contain only digits, and be 10 digits long.';
                        include 'views/Influencer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }

                    // Validate Hashtag
                    if (!preg_match('/^#/', $Hastag)) {
                        $_SESSION['errorMessage'] = 'Hashtag must start with the # character.';
                        include 'views/Influencer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }

                    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

                    $influencerModel ->InfluencerRegister($Username, $hashedPassword, $Email, $Fullname, $DOB, $PhoneNumber, $Address, $Nickname, $Hastag, $Price, $Influ_Image, $CCCD_Image, $Achivement, $Biography, $InfluType_ID, $Workplace_id, $Followers_id, $Gender_id, $Facebook, $Tiktok, $Instagram, $topicss);
                    $this -> mailInfluAccountToAdmin($Username);
                    header('Location: index.php?action=InfluLogin');
                    exit();
                }
                
            } include 'views/Influencer/register.php';
        }

        public function mailInfluAccountToAdmin($username){
            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; 
                $mail->SMTPAuth   = true;
                $mail->Username   = 'leduchuy22072002@gmail.com';
                $mail->Password   = 'utkziciechiujjxy';
                $mail->Port       = 587;
                $mail->setFrom('leduchuy22072002@gmail.com');
                $mail->addAddress('huyldgbh200353@fpt.edu.vn');
                $mail->isHTML(true);
                $mail->Subject = 'Account Status';
                $htmlContent = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Account Status</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f4f4f4;
                                margin: 0;
                                padding: 0;
                                box-sizing: border-box;
                            }
                            .container {
                                max-width: 600px;
                                margin: 20px auto;
                                background-color: #fff;
                                padding: 20px;
                                border-radius: 8px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            h1 {
                                color: #8B008B;
                                text-align: center;
                            }
                            p {
                                color: #333;
                                font-size: 18px;
                                line-height: 1.6;
                                margin-bottom: 20px;
                            }

                            span {
                                color:  #14BA05;
                                font-size: 20px;
                                margin-bottom: 20px;
                                font-weight: bold;
                            }   
                            .rejected {
                                color: #009966;
                                font-size: 20px;
                                font-weight: bold;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h1>New Influencer Registers Account</h1>
                            <span>Dear Admin,</span>
                            <p>A new influencer has username: <span class="rejected">' . htmlspecialchars($username) . ' </span> just registered an account on the system. Please review and confirm this account so they can start using the features on the platform.</p>
                            <br>
                            <p>The new account details have been updated in the management system.</p>
                        </div>
                    </body>
                    </html>
                ';
                $mail->Body = $htmlContent;
                $mail->send();
            } catch (Exception $e) {
        
            }
        }

        public function influencer_dashboard(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $influencerModel =  new influencerModels();
                $influInfo = $influencerModel -> getInfluencerbyUsername($_SESSION['influencer_username']);
                $article =  $influencerModel -> getAllArticle($_SESSION['influ_id']);
                $bookings = $influencerModel->TimeLine($_SESSION['influ_id']);

                $book = $influencerModel -> getBookingCount($_SESSION['influ_id']);

                $timeline = $influencerModel -> getTimeline($_SESSION['influ_id']);

                $feedback = $influencerModel -> getLatestFeedback($_SESSION['influ_id']);

                $mail = $influencerModel -> getLatestMail($_SESSION['influ_id']);
                
                include  'views/Influencer/Dashboard.php';
            }
        }

        public function influencer_profile(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['influ_id'])) {
                $influencerModel =  new influencerModels();
                
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);
                
                include  'views/Influencer/Profile.php';
            }  else {
                header("Location: index.php?action=InfluLogin");
                exit();
            }
        }

        public function influencer_password($id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['influ_id'])) {
                $influencerModel =  new influencerModels();
                
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id = $_SESSION['influ_id'];
                    $currentPassword = $_POST['current_password'] ?? '';
                    $newPassword = $_POST['new_password'] ?? '';
                    $confirmPassword = $_POST['confirm_password'] ?? '';

                    if (!preg_match('/^[A-Z]/', $newPassword) || strlen($newPassword) < 8 || strlen($newPassword) > 20 || !preg_match('/\d/', $newPassword) || !preg_match('/[a-z]/', $newPassword) || !preg_match('/[\W_]/', $newPassword)) {
                        $message = 'New Password must start with a capital letter, be at least 8 to 20 characters long, include at least 1 number, 1 lowercase letter, and 1 special letter.';
                        include 'views/Customer/Password.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
        
                    if (!password_verify($currentPassword, $influInfo['Influ_Password'])) {
                        $message = "Current password is incorrect.";
                    }

                    elseif ($newPassword !== $confirmPassword) {
                        $message = "New password and confirm password do not match.";
                    }

                    else {
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        $isUpdated = $influencerModel->changePassword($id, $hashedPassword);
                        $message = "Password changed successfully.";
                    }
                }

                include  'views/Influencer/Password.php';
            } 
        }

        public function influencer_editprofile(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['influ_id'])) {
                $influencerModel = new influencerModels();
                $influInfo = $influencerModel->getInfluencerProfile($_SESSION['influ_id']);
        
                $AdminModels = new AdminModels();
                $topics = $AdminModels->getAllTopic();
                
                // Lấy danh sách các Topic mà influencer đã chọn từ trước
                $selectedTopics = $AdminModels->getTopicsByInfluId($_SESSION['influ_id']);
                
                $type_id = $influInfo['InfluType_ID'];
                $all_type = $AdminModels->getAllInfluType();
                $type = $AdminModels->getInfluencerTypeByID($type_id);
                
                $gender_id = $influInfo['Gender_ID'];
                $all_gender = $AdminModels->getAllGender();
                $gender = $AdminModels->getGenderByID($gender_id);
                
                $wplace_id = $influInfo['WPlace_ID'];
                $all_wplace = $AdminModels->getAllWorkplace();
                $wplace = $AdminModels->getWorkplaceByID($wplace_id);
                
                $fol_id = $influInfo['Fol_ID'];
                $all_fol = $AdminModels->getAllFollowers();
                $fol = $AdminModels->getFollowersByID($fol_id);
        
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id = $_SESSION['influ_id'];
                    $Username = $_POST['username'];
                    $Email = $_POST['email'];
                    $Fullname = $_POST['fullname'];
                    $DOB = $_POST['dob'];
                    $PhoneNumber = $_POST['phonenumber'];
                    $Address = $_POST['address'];
                    $Nickname = $_POST['nickname'];
                    $Hastag = $_POST['hastag'];
                    $Price = $_POST['price'];
                    $mainImagePath = $influInfo['Influ_Image'];
        
                    if (isset($_FILES['influ_image']) && $_FILES['influ_image']['error'] == 0) {
                        $mainImagePath = 'Views/Influ_Image/' . basename($_FILES['influ_image']['name']);
                        move_uploaded_file($_FILES['influ_image']['tmp_name'], $mainImagePath);
                    }
        
                    // Xử lý upload các ảnh phụ
                    $otherImagePaths = [];
                    if (isset($_FILES['influ_other_images']) && is_array($_FILES['influ_other_images']['name'])) {
                        $uploadedOtherImages = $_FILES['influ_other_images'];
                        $totalOtherImages = count($uploadedOtherImages['name']);

                        // Kiểm tra số lượng ảnh tải lên
                        if ($totalOtherImages > 6) {
                            $_SESSION['errorMessage'] = 'You can only upload a maximum of 6 images.';
                            include 'Views/Influencer/edit_profile.php';
                            return;
                        }

                        // Giới hạn số lượng ảnh tải lên tối đa là 6
                        $totalOtherImages = min($totalOtherImages, 6);
                        
                        // Xử lý việc tải ảnh
                        for ($i = 0; $i < $totalOtherImages; $i++) {
                            if (isset($uploadedOtherImages['error'][$i]) && $uploadedOtherImages['error'][$i] === UPLOAD_ERR_OK) {
                                $otherImagePath = 'Views/Influ_Image/' . basename($uploadedOtherImages['name'][$i]);
                                if (move_uploaded_file($uploadedOtherImages['tmp_name'][$i], $otherImagePath)) {
                                    $otherImagePaths[] = $otherImagePath;
                                }
                            }
                        }
                    } else {
                        $otherImagePaths = explode(',', $influencers['Influ_OtherImage']);
                    }
        
                    $Achivement = $_POST['achivement'];
                    $Biography = $_POST['biography'];
                    $InfluType_ID = $_POST['type_id'];
                    $Workplace_id = $_POST['wplace_id'];
                    $Followers_id = $_POST['fol_id'];
                    $Gender_id = $_POST['gender_id'];
                    $Facebook = $_POST['facebook_link'] ?? null;
                    $Tiktok = $_POST['tiktok_link'] ?? null;
                    $Instagram = $_POST['instagram_link'] ?? null;

                    $topicss = isset($_POST['topics']) ? $_POST['topics'] : [];

                        // Kiểm tra các trường trống
                        if (empty($Username) || empty($Email) || empty($Fullname) || empty($PhoneNumber) || empty($DOB) || empty($Address) || empty($Nickname) || empty($Hastag) || empty($Price) || empty($Achivement) || empty($Biography) || empty($InfluType_ID) || empty($Workplace_id) || empty($Followers_id) || empty($Gender_id) || empty($topicss)) {
                            $_SESSION['errorMessage'] = 'All fields must be required.';
                            include 'Views/Influencer/edit_profile.php';
                            return; // Dừng xử lý nếu có lỗi
                        }
                    
                        // Validate username
                        $currentUsername = $influencers['Influ_Username'];
                        if (!preg_match('/^[A-Z]/', $Username) || !preg_match('/\d/', $Username) || strlen($Username) < 5 || strlen($Username) > 15) {
                            $_SESSION['errorMessage'] = 'Username must start with a capital letter, contain at least one number, and be between 5 to 15 characters long.';
                            include 'Views/Influencer/edit_profile.php';
                            return; // Dừng xử lý nếu có lỗi
                        } elseif ($AdminModels->checkUsernameExists($_POST['username'], $currentUsername)) {
                            $_SESSION['errorMessage'] = 'Username already exists. Please enter a different one.';
                            include 'Views/Influencer/edit_profile.php';
                            return; // Dừng xử lý nếu có lỗi
                        }

                        // Validate Address
                        if (!preg_match('/^[A-Z]/', $Address) || strlen($Address) < 5 || strlen($Address) > 30){
                            $_SESSION['errorMessage'] = 'Address must start with a capital letter, be at least 5 to 30 characters long.';
                            include 'Views/Influencer/edit_profile.php';
                            return;
                        }
                    
                        // Validate Full name
                        if (!preg_match('/^[A-Z]/', $Fullname) || strlen($Fullname) < 5 || strlen($Fullname) > 30) {
                            $_SESSION['errorMessage'] = 'Full name must start with a capital letter, be at least 5 to 30 characters long.';
                            include 'Views/Influencer/edit_profile.php';
                            return; // Dừng xử lý nếu có lỗi
                        }

                        // Validate nickname
                        if ( strlen($Nickname) > 30) {
                            $_SESSION['errorMessage'] = 'Nickname must be at least 30 characters long.';
                            include 'Views/Influencer/edit_profile.php';
                            return; // Dừng xử lý nếu có lỗi
                        }
                    
                        // Validate Date of birth
                        $dob = new DateTime($DOB);
                        $currentDate = new DateTime();
                        $age = $dob->diff($currentDate)->y;
                        if ($age < 18) {
                            $_SESSION['errorMessage'] = 'Date of birth must be over 18 years old.';
                            include 'Views/Influencer/edit_profile.php';
                            return; // Dừng xử lý nếu có lỗi
                        }

                        // Validate price
                        if (!is_numeric($Price)){
                            $_SESSION['errorMessage'] = 'Price must be a numeric value.';
                            include 'Views/Influencer/edit_profile.php';
                            return;
                        } elseif ((float)$Price > 100000000){
                            $_SESSION['errorMessage'] = 'Price cannot be large 100 million.';
                            include 'Views/Influencer/edit_profile.php';
                            return;
                        }
                    
                        // Validate Phone Number
                        if (!preg_match('/^[0-9]{10}$/', $PhoneNumber)) { // 10 số
                            $_SESSION['errorMessage'] = 'Phone number must start with a number, contain only digits, and be 10 digits long.';
                            include 'Views/Influencer/edit_profile.php';
                            return; // Dừng xử lý nếu có lỗi
                        }

                        // Validate Hashtag
                        if (!preg_match('/^#/', $Hastag)) {
                            $_SESSION['errorMessage'] = 'Hashtag must start with the # character.';
                            include 'Views/Influencer/edit_profile.php';
                            return;
                        }
            
                        $selectedTopics = isset($_POST['topics']) ? $_POST['topics'] : [];
        
                    // Cập nhật dữ liệu vào database
                    $influencerModel->EditProfileInflu($id, $Username, $Email, $Fullname, $DOB, $PhoneNumber, $Address, $Nickname, $Hastag, $Price, $mainImagePath, $otherImagePaths, $Achivement, $Biography, $InfluType_ID, $Workplace_id, $Followers_id, $Gender_id, $Facebook, $Tiktok, $Instagram, $selectedTopics);
        
                    header('Location: index.php?action=influencer_profile');
                    exit();
                }
        
                include 'Views/Influencer/edit_profile.php';
            }
        }


        public function influencer_timeline(){
            if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);
                $bookings = $influencerModel->TimeLine($_SESSION['influ_id']);
                
                // Truyền dữ liệu timeline để View sử dụng
                include 'views/Influencer/Timeline.php';
            }
        }

        public function influencer_changetimeline($booking_id) {
            if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel->getInfluencerProfile($_SESSION['influ_id']);
                $bookings = $influencerModel->TimeLine($_SESSION['influ_id']);
                $booking = $influencerModel->getBookingDetail($_SESSION['influ_id'], $booking_id);
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Kiểm tra thanh toán trước khi thay đổi trạng thái
                    $isPaid = $influencerModel->isBookingPaid($booking_id);
        
                    if (!$isPaid) {
                        // Nếu chưa thanh toán, hiển thị thông báo lỗi
                        $_SESSION['error_message'] = "Customer has not paid for this booking, please remind them.";
                    } else {
                        // Nếu đã thanh toán, cho phép thay đổi trạng thái
                        $status = $_POST['status'];
                        $influencerModel->UpdateTimelineStatus($status, $booking_id);
                        header('Location: index.php?action=influencer_timeline');
                        exit();
                    }
                }
                include 'views/Influencer/changetimeline.php';
            }
        }
        
        

        public function influencer_booking(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                $booking = $influencerModel -> getAllBookingInflu($_SESSION['influ_id']);

                include  'views/Influencer/Booking.php';
            }
        }

        public function influencer_detailbooking($booking_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                $booking = $influencerModel ->getBookingDetail($_SESSION['influ_id'], $booking_id);


                include  'views/Influencer/Booking_Detail.php';
            }
        }

        public function influencer_statusbooking($booking_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                $booking = $influencerModel ->getBookingDetail($_SESSION['influ_id'], $booking_id);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $status = $_POST['status'];
                    $Note = $_POST['Note'];
                    $influencerModel->updateBookingStatus($status, $Note, $booking_id);

                    // Nếu trạng thái mới là 'Completed', thêm bản ghi vào bảng Invoice
                    if ($status === 'In Progress') {
                        // Giả sử booking_expense có trong thông tin $booking
                        $booking_expense = $booking['Booking_Expense'];
                        $inv_id = $influencerModel->CreateInvoiceForBooking($booking_id, $booking_expense);
                
                        // Cập nhật Inv_ID trong bảng Booking
                        $influencerModel->UpdateBookingWithInvoiceId($booking_id, $inv_id);
                    }

                    header('Location: index.php?action=influencer_timeline');
                    exit();
                }
                include  'views/Influencer/ChangeStatus_Booking.php';
            }
        }

        public function influencer_article(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);
                $article =  $influencerModel -> getAllArticle($_SESSION['influ_id']);

                include  'views/Influencer/Article.php';
            }
        }

        public function influencer_detailarticle($post_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                if(isset($_GET['id'])){
                    $post_id = $_GET['id'];
                    $article =  $influencerModel -> getArticlebyID($_SESSION['influ_id'], $post_id);
                }

                include  'views/Influencer/Detail_Article.php';

                
            }
        }

        public function influencer_addarticle(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);


                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $title = $_POST['title'];
                    $time = time();
                    $currentTime = $time - (7 * 3600);
                    $submissionDate = date('Y-m-d H:i:s', $currentTime);

                    $Hastag = $_POST['hastag'];
                    $content = $_POST['content'];

                    $violationWords = $influencerModel -> getViolationWords();

                    $otherImagePaths = [];
                    if (isset($_FILES['influ_other_images']) && is_array($_FILES['influ_other_images']['name'])) {
                        $uploadedOtherImages = $_FILES['influ_other_images'];
                        $totalOtherImages = min(count($uploadedOtherImages['name']), 4);
                        
                        for ($i = 0; $i < $totalOtherImages; $i++) {
                            if (isset($uploadedOtherImages['error'][$i]) && $uploadedOtherImages['error'][$i] === UPLOAD_ERR_OK) {
                                $otherImagePath = 'Views/Influ_Image/' . basename($uploadedOtherImages['name'][$i]);
                                if (move_uploaded_file($uploadedOtherImages['tmp_name'][$i], $otherImagePath)) {
                                    $otherImagePaths[] = $otherImagePath;
                                }
                            }
                        }
                    }

                    $videoPath = null;
                    if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
                        $videoFileType = strtolower(pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION));
                        $allowedTypes = ["mp4", "avi", "mov", "mkv"];
        
                        // Kiểm tra định dạng video
                        if (in_array($videoFileType, $allowedTypes)) {
                            $videoPath = 'Views/Influ_Video/' . basename($_FILES['video']['name']);
                            if (!move_uploaded_file($_FILES['video']['tmp_name'], $videoPath)) {
                                $message = "Có lỗi xảy ra khi upload video.";
                                $videoPath = null;
                            }
                        }
                    }

                    $violations = $influencerModel ->checkForViolations($title, $Hastag, $content, $violationWords);

                    if (!empty($violations)) {
                        $errorMessage = "<p style='color: #EE0C0C; font-size: 26px; font-weight: bold;'>" . "Your article was violated ";

                        foreach ($violations as $violation) {
                            $highlightedWords = array_map(function($word) {
                                return '<span style="color: red;">' . htmlspecialchars($word) . '</span>';
                            }, $violation['Vio_Words']);
                            
                            $errorMessage .= "<p>Your post has been found to be in violation of our policies and terms with the error - " . $violation['Vio_Name'] . " because it contains words: " . implode(", ", $highlightedWords) . "</p>";
                        }
                    } else {
                        $influencerModel->AddArticle($_SESSION['influ_id'], $title, $submissionDate, $Hastag, $content, $otherImagePaths, $videoPath);
                        header('Location: index.php?action=influencer_article');
                        exit;
                    }

                    
                }

                include  'views/Influencer/Add_Article.php';
            }
        }

        public function influencer_editarticle($post_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                if(isset($_GET['id'])){
                    $post_id = $_GET['id'];
                    $article =  $influencerModel -> getArticlebyID($_SESSION['influ_id'], $post_id);
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $title = $_POST['title'];
                    $time = time();
                    $currentTime = $time - (7 * 3600);
                    $submissionDate = date('Y-m-d H:i:s', $currentTime);

                    $violationWords = $influencerModel -> getViolationWords();

                    $Hastag = $_POST['hastag'];
                    $content = $_POST['content'];
                    $Status =  $_POST['status'];

                    $otherImagePaths = [];
                    if (isset($_FILES['influ_other_images']) && is_array($_FILES['influ_other_images']['name'])) {
                        $uploadedOtherImages = $_FILES['influ_other_images'];
                        $totalOtherImages = min(count($uploadedOtherImages['name']), 4);
                        
                        for ($i = 0; $i < $totalOtherImages; $i++) {
                            if (isset($uploadedOtherImages['error'][$i]) && $uploadedOtherImages['error'][$i] === UPLOAD_ERR_OK) {
                                $otherImagePath = 'Views/Influ_Image/' . basename($uploadedOtherImages['name'][$i]);
                                if (move_uploaded_file($uploadedOtherImages['tmp_name'][$i], $otherImagePath)) {
                                    $otherImagePaths[] = $otherImagePath;
                                }
                            }
                        }
                    } else {
                        $otherImagePaths = explode(',', $article['Post_Image']);
                    }

                    $videoPath = null;
                    if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
                        $videoFileType = strtolower(pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION));
                        $allowedTypes = ["mp4", "avi", "mov", "mkv"];
        
                        // Kiểm tra định dạng video
                        if (in_array($videoFileType, $allowedTypes)) {
                            $videoPath = 'Views/Influ_Video/' . basename($_FILES['video']['name']);
                            if (!move_uploaded_file($_FILES['video']['tmp_name'], $videoPath)) {
                                $message = "Có lỗi xảy ra khi upload video.";
                                $videoPath = null;
                            }
                        }
                    }

                    $violations = $influencerModel ->checkForViolations($title, $Hastag, $content, $violationWords);

                    if (!empty($violations)) {
                        $errorMessage = "<p style='color: #EE0C0C; font-size: 26px; font-weight: bold;'>" . "Your article was violated ";

                        foreach ($violations as $violation) {
                            $highlightedWords = array_map(function($word) {
                                return '<span style="color: red;">' . htmlspecialchars($word) . '</span>';
                            }, $violation['Vio_Words']);
                            
                            $errorMessage .= "<p>Your post has been found to be in violation of our policies and terms with the error - " . $violation['Vio_Name'] . " because it contains words: " . implode(", ", $highlightedWords) . "</p>";
                        }
                    } else {
                        $influencerModel ->updateArticle($_SESSION['influ_id'], $title, $submissionDate,  $Hastag, $content, $Status, $otherImagePaths, $videoPath, $post_id);
                        header('Location: index.php?action=influencer_article');
                        exit;
                    }
                }

                include 'views/Influencer/Edit_Article.php';
            }
        }

        public function influencer_deletearticle($post_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                if(isset($_GET['id'])){
                    $post_id = $_GET['id'];
                    $article =  $influencerModel -> deleteArticle($_SESSION['influ_id'], $post_id);
                    header('Location: index.php?action=influencer_article');
                    exit;
                }
            }
        }

        public function influencer_invoice(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);
                $invoice = $influencerModel -> getAllInvoiceByInflu($_SESSION['influ_id']);

                $total = $influencerModel ->getBookingPaidCount($_SESSION['influ_id']);

                include  'views/Influencer/Invoice.php';
            }
        }

        public function influencer_Detailinvoice($inv_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);
                $invoiceDetails = $influencerModel ->getDetailInvoice($_SESSION['influ_id'], $inv_id);

                include  'views/Influencer/Detail_Invoice.php';
            }
        }

        public function influencer_feedback(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                $feedback = $influencerModel -> getAllFeedback($_SESSION['influ_id']);

                include  'views/Influencer/Feedback.php';
            }
        }

        public function influencer_mail(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                $mailInbox = $influencerModel -> getAllMailInfluInbox($_SESSION['influ_id']);

                $mailSent = $influencerModel -> getAllMailInfluSent($_SESSION['influ_id']);

                include  'views/Influencer/Mail.php';
            }
        }

        public function influencer_sendmail(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                $customer = $influencerModel -> getCustomerForInflu($_SESSION['influ_id']);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $Username = $_POST['username'];
                    $time = time();
                    $currentTime = $time - (7 * 3600);
                    $CreateTime = date('Y-m-d H:i:s', $currentTime);

                    $Cus_ID = $_POST['cus_id'];
                    $Title = $_POST['title'];
                    $Content = $_POST['content'];
                    $influencerModel -> SendAnEmail($CreateTime, $Title, $Content, $_SESSION['influ_id'], $Cus_ID);
                    $this ->mailToCustomer($Username, $Title, $Content, $influInfo);
                    header("Location: index.php?action=influencer_mail");
                    exit();
                }

                include  'views/Influencer/SendMail.php';
            }
        }

        public function mailToCustomer($Username, $Title, $Content, $influInfo){
            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; 
                $mail->SMTPAuth   = true;
                $mail->Username   = 'leduchuy22072002@gmail.com';
                $mail->Password   = 'utkziciechiujjxy';
                $mail->Port       = 587;
                $mail->setFrom('leduchuy22072002@gmail.com');
                $mail->addAddress('huyldgbh200353@fpt.edu.vn');
                $mail->isHTML(true);
                $mail->Subject = 'Account Status';
                $htmlContent = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Account Status</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f4f4f4;
                                margin: 0;
                                padding: 0;
                                box-sizing: border-box;
                            }
                            .container {
                                max-width: 600px;
                                margin: 20px auto;
                                background-color: #fff;
                                padding: 20px;
                                border-radius: 8px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            h1 {
                                color: #8B008B;
                                text-align: center;
                            }
                            p {
                                color: #333;
                                font-size: 18px;
                                line-height: 1.6;
                                
                            }

                            span {
                                color:  #14BA05;
                                font-size: 20px;
                                margin-bottom: 20px;
                                font-weight: bold;
                            }   
                            .rejected {
                                color: #009966;
                                font-size: 20px;
                                font-weight: bold;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h1>Mail To Customer</h1>
                            <span>Dear ' . htmlspecialchars($Username) . '</span>
                            
                            <p>I am <strong>' . htmlspecialchars($influInfo['Influ_Nickname']) . '</strong></p>
                            <p> Title: <strong>' .$Title.' </strong></p>
                            <p> Content: <strong>' .$Content.' </strong></p>
                            
                            <p>I hope you can reply as soon as possible</p>
                        </div>
                    </body>
                    </html>
                ';
                $mail->Body = $htmlContent;
                $mail->send();
            } catch (Exception $e) {
        
            }
        }

        

        public function influencer_faq(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                include  'views/Influencer/Faq.php';
            }
        }

        public function influencer_term(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset ($_SESSION['influ_id'])) {
                $influencerModel = new InfluencerModels();
                $influInfo = $influencerModel -> getInfluencerProfile($_SESSION['influ_id']);

                include  'views/Influencer/Term.php';
            }
        }
        

        public function is_login() {
            if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] == false){
                return false;
            }
            else{
                return true;
            }
        }

        public function InfluLogout(){
            session_unset();
            session_destroy();
            $_SESSION['is_login'] = false;
            header("Location:index.php?action=homepage"); 
            exit();
        }
    }
?>