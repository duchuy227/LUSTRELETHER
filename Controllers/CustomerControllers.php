<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once "Models/CustomerModels.php";
    require_once "Models/AdminModels.php";
    require_once "Controllers/AdminControllers.php";

    class CustomerControllers {
        private  $is_login;
        public function __construct() {
            $this->is_login = $this->is_login();
        }
        public function cusLogin(){
            $_SESSION ['is_login'] = false;
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == false){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $Username =  $_POST['username'];
                    $Password =  $_POST['password'];
                    $customer  = new CustomerModels();
                    $result = $customer->CusLogin($Username, $Password);

                    if ($result === true) {
                        header('Location: index.php?action=customer_userpage');
                        exit();
                    } else {
                        $_SESSION['error_message'] = "Invalid Username or Password";
                    }
                }
            }

            include 'views/Customer/login.php';
        }

        public function cusRegister(){
            if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] == false){
                $AdminModels =  new AdminModels();
                $customerModel  = new CustomerModels();
                $topics  = $AdminModels->getAllTopic();
                $contents =  $AdminModels->showContent();
                $events =  $AdminModels->showEvent();

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $Username = $_POST['username'];
                    $Password  = $_POST['password'];
                    $ConfirmPassword =  $_POST['confirm_password'];
                    $Email = $_POST['email'];
                    $Fullname =  $_POST['fullname'];
                    $PhoneNumber = $_POST['phonenumber'];
                    $DOB = $_POST['dob'];

                    $topicss = isset($_POST['topics']) ? $_POST['topics'] : [];
                    $contentss = isset($_POST['contents']) ? $_POST['contents'] : [];
                    $eventss = isset($_POST['events']) ? $_POST['events'] : [];

                        // Kiểm tra các trường trống
                    if (empty($Username) || empty($Email) || empty($Fullname) || empty($PhoneNumber) || empty($DOB) || empty($topicss) || empty($contentss) || empty($eventss)) {
                        $_SESSION['errorMessage'] = 'All fields must be required.';
                        include 'views/Customer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate username
                    if (!preg_match('/^[A-Z]/', $Username) || !preg_match('/\d/', $Username) || strlen($Username) < 5 || strlen($Username) > 15) {
                        $_SESSION['errorMessage'] = 'Username must start with a capital letter, contain at least one number, and be between 5 to 15 characters long.';
                        include 'views/Customer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    } elseif ($AdminModels->checkUsernameExists($Username)) {
                        $_SESSION['errorMessage'] = 'Username already exists. Please enter a different one.';
                        include 'views/Customer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate password
                    if (!preg_match('/^[A-Z]/', $Password) || strlen($Password) < 8 || strlen($Password) > 20 || !preg_match('/\d/', $Password) || !preg_match('/[a-z]/', $Password) || !preg_match('/[\W_]/', $Password)) {
                        $_SESSION['errorMessage'] = 'Password must start with a capital letter, be at least 8 to 20 characters long, include at least 1 number, 1 lowercase letter, and 1 special letter.';
                        include 'views/Customer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    } elseif ($Password !== $ConfirmPassword) {
                        $_SESSION['errorMessage'] = "Password do not match";
                        include 'views/Customer/register.php';
                        return;
                    }
                
                    // Validate Full name
                    if (!preg_match('/^[A-Z]/', $Fullname) || strlen($Fullname) < 5 || strlen($Fullname) > 30) {
                        $_SESSION['errorMessage'] = 'Full name must start with a capital letter, be at least 5 to 30 characters long.';
                        include 'views/Customer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate Date of birth
                    $dob = new DateTime($DOB);
                    $currentDate = new DateTime();
                    $age = $dob->diff($currentDate)->y;
                    if ($age < 18) {
                        $_SESSION['errorMessage'] = 'Date of birth must be over 18 years old.';
                        include 'views/Customer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate Phone Number
                    if (!preg_match('/^[0-9]{10}$/', $PhoneNumber)) { // 10 số
                        $_SESSION['errorMessage'] = 'Phone number must start with a number, contain only digits, and be 10 digits long.';
                        include 'views/Customer/register.php';
                        return; // Dừng xử lý nếu có lỗi
                    }

                    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

                    
                    $customerModel ->CusRegister($Username, $hashedPassword, $Email, $Fullname, $PhoneNumber, $DOB, $topicss, $contentss, $eventss);
                    header('Location: index.php?action=cusLogin');
                    exit();
                }
            }

            include 'views/Customer/register.php';
        }

        public function customer_userpage(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $topics = $customerModel ->getTopicssByCusId($_SESSION['cus_id']);

                $mostInfluentialEvent = $customerModel->getMostInfluentialEventByCustomer($_SESSION['cus_id']);

                if ($mostInfluentialEvent) {
                    $event_id = $mostInfluentialEvent['Event_ID'];
                    $influencers = $customerModel->getInfluencersByEvent($event_id);
                
                    if (empty($influencers)) {
                        $noInfluencersMessage = "Event " . $mostInfluentialEvent['Event_Name'] . " chưa có dịch vụ nào từ bất kỳ influencer.";
                    }
                } else {
                    // Trường hợp không có sự kiện nào cho khách hàng hoặc topic không có event nào
                    $noInfluencersMessage = "The event you selected is not in any topic or has no influencer participating yet";
                }

                $mostInfluentialContent = $customerModel ->getMostInfluentialContentByCustomer($_SESSION['cus_id']);

                if ($mostInfluentialContent){
                    $content_id = $mostInfluentialContent['Content_ID'];
                    $influencerss = $customerModel->getInfluencersByContent($content_id);

                    if (empty($influencers)) {
                        $noInfluencersMessage = "Content " . $mostInfluentialContent['Content_Name'] . " chưa có dịch vụ nào từ bất kỳ influencer.";
                    }
                } else {
                    $Message = "The Content you selected is not in any topic or has no influencer participating yet";
                }

                include 'views/Customer/User_page.php';
            }
        }

        public function customer_topic(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $AdminModels  = new AdminModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $influTopic = $customerModel ->getAllInflubyTopic();
                $topics = [];
                foreach ($influTopic as $row) {
                    $topicID = $row['Topic_ID'];
                    $topicName = $row['Topic_Name'];
                    
                    // Nếu topic chưa tồn tại trong danh sách, khởi tạo
                    if (!isset($topics[$topicID])) {
                        $topics[$topicID] = [
                            'Topic_Name' => $topicName,
                            'Influencers' => []
                        ];
                    }

                    // Thêm influencer vào topic nếu có đầy đủ thông tin
                    if (!empty($row['Influ_ID']) && !empty($row['Influ_Nickname'])) {
                        $topics[$topicID]['Influencers'][] = [
                            'Influ_ID' => $row['Influ_ID'],
                            'Influ_Nickname' => $row['Influ_Nickname'],
                            'Influ_Address' => $row['Influ_Address'],
                            'Influ_Image' => $row['Influ_Image'],
                            'Fol_Quantity' => $row['Fol_Quantity']
                        ];
                    }
                }

                include 'views/Customer/Topic.php';
            }
        }

        public function customer_eachtopic($topic_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $AdminModels  = new AdminModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
        
                $type_id = isset($_POST['type_id']) ? $_POST['type_id'] : null;
                $all_type = $AdminModels -> getAllInfluType();
                $type  = $AdminModels -> getInfluencerTypeByID($type_id);

                $wplace_id = isset($_POST['wplace_id']) ? $_POST['wplace_id'] : null;
                $all_wplace = $AdminModels -> getAllWorkplace();
                $wplace  = $AdminModels -> getWorkplaceByID($wplace_id);

                $fol_id = isset($_POST['fol_id']) ? $_POST['fol_id'] : '';
                $all_fol = $AdminModels -> getAllFollowers();
                $fol  = $AdminModels -> getFollowersByID($fol_id);

                $topic = $AdminModels->getTopicByID($topic_id);
                $influencers = $customerModel -> getAllInfluByEachTopic($topic_id);

                if($_SERVER ['REQUEST_METHOD'] == 'POST'){
                    if(isset( $_POST['wplace_id'])){
                        $wplace_id = $_POST['wplace_id'];
                        $influencers =  $customerModel->getAllInfluencerTopicByWorkplace($wplace_id, $topic_id);
                        if (empty($influencers)) {
                            $message = "No influencers found ";
                        }
                    }
                    if(isset( $_POST['fol_id'])){
                        $fol_id = $_POST['fol_id'];
                        $influencers =  $customerModel->getAllInfluencerTopicByFollowers($fol_id, $topic_id);
                        if (empty($influencers)) {
                            $message = "No influencers found ";
                        }
                    }
                    if(isset( $_POST['type_id'])){
                        $type_id = $_POST['type_id'];
                        $influencers =  $customerModel->getAllInfluencerTopicByType($type_id, $topic_id);
                    }

                    if(isset( $_POST['username'])){
                        $username =  $_POST['username'];
                        $influencers = $customerModel->getInfluencerTopicByUsername($username, $topic_id);
                        if (empty($influencers)) {
                            $message = "No influencers found named: $username ";
                        }
                    }
                } else {
                    $influencers = $customerModel ->getAllInfluByEachTopic($topic_id);
                }

                include 'Views/Customer/EachTopic.php';
            }
        }

        public function customer_eventDetail($event_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $AdminModels  = new AdminModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
        
                $type_id = isset($_POST['type_id']) ? $_POST['type_id'] : null;
                $all_type = $AdminModels -> getAllInfluType();
                $type  = $AdminModels -> getInfluencerTypeByID($type_id);

                $wplace_id = isset($_POST['wplace_id']) ? $_POST['wplace_id'] : null;
                $all_wplace = $AdminModels -> getAllWorkplace();
                $wplace  = $AdminModels -> getWorkplaceByID($wplace_id);

                $fol_id = isset($_POST['fol_id']) ? $_POST['fol_id'] : '';
                $all_fol = $AdminModels -> getAllFollowers();
                $fol  = $AdminModels -> getFollowersByID($fol_id);

                $event = $AdminModels ->getEventByID($event_id);
                $influencers = $customerModel ->getInfluencersByEvent($event_id);

                include 'Views/Customer/Event.php';
            }
        }

        public function customer_contentDetail($content_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $AdminModels  = new AdminModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
        
                $type_id = isset($_POST['type_id']) ? $_POST['type_id'] : null;
                $all_type = $AdminModels -> getAllInfluType();
                $type  = $AdminModels -> getInfluencerTypeByID($type_id);

                $wplace_id = isset($_POST['wplace_id']) ? $_POST['wplace_id'] : null;
                $all_wplace = $AdminModels -> getAllWorkplace();
                $wplace  = $AdminModels -> getWorkplaceByID($wplace_id);

                $fol_id = isset($_POST['fol_id']) ? $_POST['fol_id'] : '';
                $all_fol = $AdminModels -> getAllFollowers();
                $fol  = $AdminModels -> getFollowersByID($fol_id);

                $content = $AdminModels ->getContentByID($content_id);
                $influencers = $customerModel ->getInfluencersByContent($content_id);

                include 'Views/Customer/Content.php';
            }
        }

        public function customer_influencer(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $AdminModels  = new AdminModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
                $topics  = $AdminModels->getAllTopic();
                $contents =  $AdminModels->showContent();
                $events =  $AdminModels->showEvent();
                $gender  = $AdminModels -> getAllGender();

                $type_id = isset($_POST['type_id']) ? $_POST['type_id'] : null;
                $all_type = $AdminModels -> getAllInfluType();
                $type  = $AdminModels -> getInfluencerTypeByID($type_id);

                $wplace_id = isset($_POST['wplace_id']) ? $_POST['wplace_id'] : null;
                $all_wplace = $AdminModels -> getAllWorkplace();
                $wplace  = $AdminModels -> getWorkplaceByID($wplace_id);

                $fol_id = isset($_POST['fol_id']) ? $_POST['fol_id'] : null;
                $all_fol = $AdminModels -> getAllFollowers();
                $fol  = $AdminModels -> getFollowersByID($fol_id);

                $message = '';
                
                if($_SERVER ['REQUEST_METHOD'] == 'POST'){
                    if (isset($_POST['gender_ids']) && is_array($_POST['gender_ids'])) {
                        // Lấy danh sách các Gender_ID từ checkbox
                        $gender_ids = $_POST['gender_ids'];
                        $influencers = $AdminModels->getInfluencerByGender($gender_ids);
        
                        if (empty($influencers)) {
                            $message = "No influencers found for the selected.";
                        }
                    }

                    if (isset($_POST['topic_ids']) && is_array($_POST['topic_ids'])) {
                        // Lấy danh sách các Gender_ID từ checkbox
                        $topic_ids = $_POST['topic_ids'];
                        $influencers = $AdminModels->getInfluencerByTopics($topic_ids);
        
                        if (empty($influencers)) {
                            $message = "No influencers found for the selected.";
                        }
                    }

                    if (isset($_POST['event_ids']) && is_array($_POST['event_ids'])) {
                        // Lấy danh sách các Gender_ID từ checkbox
                        $event_ids = $_POST['event_ids'];
                        $influencers = $AdminModels->getInfluencerByEvents($event_ids);
        
                        if (empty($influencers)) {
                            $message = "No influencers found for the selected.";
                        }
                    }

                    if (isset($_POST['content_ids']) && is_array($_POST['content_ids'])) {
                        // Lấy danh sách các Gender_ID từ checkbox
                        $content_ids = $_POST['content_ids'];
                        $influencers = $AdminModels->getInfluencerByContent($content_ids);
        
                        if (empty($influencers)) {
                            $message = "No influencers found for the selected.";
                        }
                    }


                    if(isset( $_POST['wplace_id'])){
                        $wplace_id = $_POST['wplace_id'];
                        $influencers =  $AdminModels->getAllInfluencerByWorkplace($wplace_id);
                        if (empty($influencers)) {
                            $message = "No influencers found ";
                        }
                    }
                    if(isset( $_POST['fol_id'])){
                        $fol_id = $_POST['fol_id'];
                        $influencers =  $AdminModels->getAllInfluencerByFollowers($fol_id);
                        if (empty($influencers)) {
                            $message = "No influencers found ";
                        }
                    }
                    if(isset( $_POST['type_id'])){
                        $type_id = $_POST['type_id'];
                        $influencers =  $AdminModels->getAllInfluencerByType($type_id);
                    }

                    if(isset( $_POST['username'])){
                        $username =  $_POST['username'];
                        $influencers = $AdminModels->getInfluencerByUsername($username);
                        if (empty($influencers)) {
                            $message = "No influencers found named: $username ";
                        }
                    }
                } else {
                    $influencers = $customerModel ->getAllInfluencer();
                }

                include 'Views/Customer/Influencer.php';
            }
        }

        public function customer_influencerDetail($influ_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $AdminModels  = new AdminModels();

                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $influencers = $AdminModels ->getInfluencerByID($influ_id);

                $topics = $customerModel ->getTopicsByInfluId($influ_id);

                $contents  = $customerModel ->getContentByInfluencer($influ_id);

                $events =  $customerModel ->getEventByInfluencer($influ_id);

                $articles = $customerModel ->getArticlebyID($influ_id);

                $feedback = $customerModel ->getAllFeedbackCurrentInflu($influ_id);

                include 'Views/Customer/Influencer_Detail.php';
            }
        }

        public function customer_allPost($influ_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $AdminModels  = new AdminModels();

                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
                $influencers = $AdminModels ->getInfluencerByID($influ_id);
                $articles = $customerModel ->getArticlebyID($influ_id);

                include 'Views/Customer/All_Post.php';
            }
        }

        public function customer_createbooking(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $AdminModels  = new AdminModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
                $influencers = $AdminModels->getInfluencerByID($_GET['influ_id']);
                $topics = $customerModel ->getTopicsByInfluId($_GET['influ_id']);
                $bookedDates = $customerModel->getBookedDate($_GET['influ_id']);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $time = time();
                    $currentTime = $time - (7 * 3600);
                    $CreateTime = date('Y-m-d H:i:s', $currentTime);
                    $TotalDay = $_POST['total_days'];
                    $Content = $_POST['service_name'];

                    $Topic_ID = isset($_POST['topic']) ? trim($_POST['topic']) : '';

                    $StartDate = $_POST['start_date'];
                    $EndDate = $_POST['end_date'];
                    if (empty($Topic_ID)) {
                        $_SESSION['errorMessage'] = "Topic is required.";
                    } elseif(empty($Content)) {
                        $_SESSION['errorMessage'] = "Service are required";
                    } elseif ($TotalDay <= 0 || $TotalDay > 7) {
                        $_SESSION['errorMessage'] = "Total days must be greater than 0 and smaller than 7.";
                    } elseif (empty($StartDate) || empty($EndDate)) {
                        $_SESSION['errorMessage'] = "Start date and end date are required.";
                    } else {
                        // Chỉ gọi checkBookingConflict nếu start_date và end_date hợp lệ
                        $isConflict = $customerModel->checkBookingConflict($StartDate, $EndDate, $_GET['influ_id']);
                        
                        if ($isConflict) {
                            $_SESSION['errorMessage'] = "The selected date range is already set, please select another date.";
                        } else {
                            unset($_SESSION['errorMessage']); // Clear previous errors if validation passes
                            
                            $Cus_ID = $_SESSION['cus_id'];
                            $Influ_ID = $_GET['influ_id'];
        
                            $InfluencerPrice = $customerModel->getInfluencerPrice($Influ_ID);
                            $Expense = $InfluencerPrice * $TotalDay;
                            $customerModel->createBooking($CreateTime, $TotalDay, $Content, $StartDate, $EndDate, $Expense, $Topic_ID,  $Cus_ID, $Influ_ID);
                            $this->mailBookingtoInflu($Content);
                            header("Location: index.php?action=customer_bookinglist");
                            exit();
                        }
                    }
                }
                
                include 'Views/Customer/Create_Booking.php';
            }
        }

        public function getServicesByTopic() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['topic_id'])) {
                $topic_id = $_POST['topic_id'];
                $customerModel = new CustomerModels();
                $contents = $customerModel -> getContentsByTopicId($topic_id);
                $events  = $customerModel -> getEventsByTopicId($topic_id);

                echo json_encode([
                    'contents' => $contents,
                    'events' => $events
                ]);
            }
        }

        public function mailBookingtoInflu($Content){
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
                $mail->Subject = 'New Booking';
                $htmlContent = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>New Booking</title>
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
                            <h1>New Booking</h1>
                            <span>Dear Influencer,</span>
                            <p>I have sent a booking request with the service is ' . htmlspecialchars($Content) . ' to you</p>
                            <br>
                            <p>Hope you can see the booking and approve it for me.</p>
                        </div>
                    </body>
                    </html>
                ';
                $mail->Body = $htmlContent;
                $mail->send();
            } catch (Exception $e) {
        
            }
        }



        public function customer_policy(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                

                include 'views/Customer/Policy.php';
            }
        }

        public function customer_dashboard(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $AdminModels = new AdminModels();
                $topics = $AdminModels->getAllTopic();
                $events =  $AdminModels->showEvent();
                $contents =  $AdminModels->showContent();

                $selectedTopics = $AdminModels->getTopicsByCusId($_SESSION['cus_id']);
                $selectedEvents = $AdminModels->getEventsByCusId($_SESSION['cus_id']);
                $selectedContents = $AdminModels->getContentsByCusId($_SESSION['cus_id']);

                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $id = $_SESSION['cus_id'];
                    $Username = $_POST['username'];
                    
                    $Email = $_POST['email'];
                    $Fullname =  $_POST['fullname'];
                    $PhoneNumber = $_POST['phonenumber'];
                    $DOB = $_POST['dob'];
                    $imagePath = $customer['Cus_Image'];

                    $topicss = isset($_POST['topics']) ? $_POST['topics'] : [];
                    $contentss = isset($_POST['contents']) ? $_POST['contents'] : [];
                    $eventss = isset($_POST['events']) ? $_POST['events'] : [];

                    // Kiểm tra các trường trống
                    if (empty($Username) || empty($Email) || empty($Fullname) || empty($PhoneNumber) || empty($DOB) || empty($topicss) || empty($contentss) || empty($eventss)) {
                        $_SESSION['errorMessage'] = 'All fields must be required.';
                        include 'views/Customer/Dashboard.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate username
                    $currentUsername = $customer['Cus_Username'];
                    if (!preg_match('/^[A-Z]/', $Username) || !preg_match('/\d/', $Username) || strlen($Username) < 5 || strlen($Username) > 15) {
                        $_SESSION['errorMessage'] = 'Username must start with a capital letter, contain at least one number, and be between 5 to 15 characters long.';
                        include 'views/Customer/Dashboard.php';
                        return; // Dừng xử lý nếu có lỗi
                    } elseif ($AdminModels->checkUsernameExists($_POST['username'], $currentUsername)) {
                        $_SESSION['errorMessage'] = 'Username already exists. Please enter a different one.';
                        include 'views/Customer/Dashboard.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate Full name
                    if (!preg_match('/^[A-Z]/', $Fullname) || strlen($Fullname) < 5 || strlen($Fullname) > 30) {
                        $_SESSION['errorMessage'] = 'Full name must start with a capital letter, be at least 5 to 30 characters long.';
                        include 'views/Customer/Dashboard.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate Date of birth
                    $dob = new DateTime($DOB);
                    $currentDate = new DateTime();
                    $age = $dob->diff($currentDate)->y;
                    if ($age < 18) {
                        $_SESSION['errorMessage'] = 'Date of birth must be over 18 years old.';
                        include 'views/Customer/Dashboard.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
                
                    // Validate Phone Number
                    if (!preg_match('/^[0-9]{10}$/', $PhoneNumber)) { // 10 số
                        $_SESSION['errorMessage'] = 'Phone number must start with a number, contain only digits, and be 10 digits long.';
                        include 'views/Customer/Dashboard.php';
                        return; // Dừng xử lý nếu có lỗi
                    }

                    if (isset($_FILES['cus_image']) && $_FILES['cus_image']['error'] == 0) {
                        $imagePath = 'Views/Img/' . basename($_FILES['cus_image']['name']);
                        move_uploaded_file($_FILES['cus_image']['tmp_name'], $imagePath); 
                    }

                    $selectedTopics = isset($_POST['topics']) ? $_POST['topics'] : [];
                    $selectedEvents = isset($_POST['events']) ? $_POST['events'] : [];
                    $selectedContents = isset($_POST['contents']) ? $_POST['contents'] : [];
                    
                    $customerModel->updateCusProfile($id, $Username, $Email, $Fullname, $PhoneNumber, $DOB, $imagePath, $selectedTopics, $selectedContents, $selectedEvents);
                    header('Location: index.php?action=customer_dashboard');
                    exit();
                }

                include  'views/Customer/Dashboard.php';

            }
        }

        public function customer_password() {
            if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel->GetCustomerbyID($_SESSION['cus_id']);
        
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id = $_SESSION['cus_id'];
                    $currentPassword = $_POST['current_password'] ?? '';
                    $newPassword = $_POST['new_password'] ?? '';
                    $confirmPassword = $_POST['confirm_password'] ?? '';

                    if (!preg_match('/^[A-Z]/', $newPassword) || strlen($newPassword) < 8 || strlen($newPassword) > 20 || !preg_match('/\d/', $newPassword) || !preg_match('/[a-z]/', $newPassword) || !preg_match('/[\W_]/', $newPassword)) {
                        $message = 'New Password must start with a capital letter, be at least 8 to 20 characters long, include at least 1 number, 1 lowercase letter, and 1 special letter.';
                        include 'views/Customer/Password.php';
                        return; // Dừng xử lý nếu có lỗi
                    }
        
                    if (!password_verify($currentPassword, $customer['Cus_Password'])) {
                        $message = "Current password is incorrect.";
                    }

                    elseif ($newPassword !== $confirmPassword) {
                        $message = "New password and confirm password do not match.";
                    }

                    else {
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        $isUpdated = $customerModel->changePassword($id, $hashedPassword);
                        $message = "Password changed successfully.";
                    }
                }
                include 'views/Customer/Password.php';
            }
        }
        

        public function customer_bookinglist(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $booking = $customerModel ->getAllBookingCurrentCus($_SESSION['cus_id']);


                include 'Views/Customer/BookingList.php';
            }
        }

        public function customer_detailBooking($booking_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $booking =  $customerModel -> getBookingById($_SESSION['cus_id'], $booking_id);


                include 'Views/Customer/Booking_Detail.php';
            }
        }

        public function customer_editBooking($booking_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
                $booking =  $customerModel -> getBookingById($_SESSION['cus_id'], $booking_id);

                $Influ_ID = $booking['Influ_ID'];  // Lấy Influ_ID từ booking chi tiết
                $topics = $customerModel->getTopicsByInfluId($Influ_ID);
                $bookedDates = $customerModel->getBookedDate($Influ_ID);

                $selectedTopicId = $booking['Topic_ID'];


                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $time = time();
                    $currentTime = $time - (7 * 3600);
                    $CreateTime = date('Y-m-d H:i:s', $currentTime);
                    $TotalDay = $_POST['total_days'];
                    $Content = $_POST['service_name'];

                    $Topic_ID = isset($_POST['topic']) ? trim($_POST['topic']) : '';

                    $StartDate = $_POST['start_date'];
                    $EndDate = $_POST['end_date'];
                    if (empty($Topic_ID)) {
                        $_SESSION['errorMessage'] = "Topic is required.";
                    } elseif(empty($Content)) {
                        $_SESSION['errorMessage'] = "Service are required";
                    } elseif ($TotalDay <= 0 || $TotalDay > 7) {
                        $_SESSION['errorMessage'] = "Total days must be greater than 0 and smaller than 7.";
                    } elseif (empty($StartDate) || empty($EndDate)) {
                        $_SESSION['errorMessage'] = "Start date and end date are required.";
                    } else {
                        // Chỉ gọi checkBookingConflict nếu start_date và end_date hợp lệ
                        $isConflict = $customerModel->checkBookingConflict($StartDate, $EndDate, $_GET['influ_id']);
                        
                        if ($isConflict) {
                            $_SESSION['errorMessage'] = "The selected date range is already set, please select another date.";
                        } else {
                            unset($_SESSION['errorMessage']); // Clear previous errors if validation passes
                            $Status = $_POST['status'];
        
                            $InfluencerPrice = $customerModel->getInfluencerPrice($Influ_ID);
                            $Expense = $InfluencerPrice * $TotalDay;
                            $customerModel->editBooking($CreateTime, $TotalDay, $Content, $StartDate, $EndDate, $Status, $Expense, $Topic_ID,  $booking_id);
                            header("Location: index.php?action=customer_bookinglist");
                            exit();
                        }
                    }
                }
                include 'Views/Customer/Edit_Booking.php';
            }
        }

        public function customer_deleteBooking($booking_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $customerModel ->deleteBooking($booking_id);
                header("Location: index.php?action=customer_bookinglist");
                exit();
            }
        }

        public function customer_payment(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
                $invoice = $customerModel ->GetAllInvoiceByCurrentCus($_SESSION['cus_id']);

                include 'Views/Customer/Payment.php';
            }
        }

        public function customer_paymentinfo($inv_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $paymentinfo = $customerModel -> GetInfoInvoiceByCusID($_SESSION['cus_id'], $inv_id);

                $_SESSION['inv_id'] = $inv_id;

                include 'Views/Customer/PaymentInfo.php';
            }
        }

        public function vnpay_payment($invID) {
            $customerModel = new CustomerModels();
            $invoiceInfo = $customerModel->getInvoiceBookingInfluencerInfo($invID);


            if ($invoiceInfo) {
                
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost/LUSTRELETHER/index.php?action=customer_paymentsuccess";
                $vnp_TmnCode = "660JIX0L";
                $vnp_HashSecret = "E4CIQ974CQZ2XAOBUAQEEGYDQN9AVDE1";
        
                $vnp_TxnRef = rand(00,9999); // Tạo mã đơn hàng ngẫu nhiên
                $vnp_OrderInfo = 'Thanh toan Booking';
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = intval($invoiceInfo['Inv_VATamount']) * 100; // Giá trị đơn hàng (VNĐ)
                $vnp_Locale = 'vn';
                $vnp_BankCode = 'NCB';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        
                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,
                );
        
                if (!empty($vnp_BankCode)) {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
        
                // Sắp xếp tham số và tạo chuỗi hash
                ksort($inputData);
                $hashdata = "";
                $query = "";
                foreach ($inputData as $key => $value) {
                    if ($key === "vnp_OrderInfo") {
                        $value = str_replace(" ", "+", $value); // Thay khoảng trắng bằng "+"
                    }
                    $hashdata .= ($hashdata ? '&' : '') . urlencode($key) . "=" . urlencode($value);
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }
        
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $vnp_Url = $vnp_Url . "?" . $query . 'vnp_SecureHash=' . $vnpSecureHash;
        
                // Điều hướng tới URL thanh toán VNPay
                header('Location: ' . $vnp_Url);
                exit();
            }
        }

        public function customer_paymentsuccess(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                if (isset($_GET['vnp_Amount'])) {
                    $vnp_Amount = $_GET['vnp_Amount'];
                    $vnp_BankCode = $_GET['vnp_BankCode'];
                    $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
                    $vnp_CardType = $_GET['vnp_CardType'];
                    $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
                    $vnp_PayDate = $_GET['vnp_PayDate'];
                    $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
                    $vnp_TMNCode = $_GET['vnp_TmnCode'];
                    $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
                    $vnp_TransactionStatus = $_GET['vnp_TransactionStatus'];
                    $vnp_TxnRef = $_GET['vnp_TxnRef'];
                    $vnp_SecureHash = $_GET['vnp_SecureHash'];
                    
                    $inv_id = isset($_SESSION['inv_id']) ? $_SESSION['inv_id'] : null;
                    $save = $customerModel ->saveVNPayPayment($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TMNCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash, $inv_id);

                    if($save !== null) {
                        $customerModel->UpdateInvoiceVnpayID($save, $inv_id);
                        $this->mailPaymentToInflu();
                        $invoiceDetails = $customerModel->getTransactionDetailsByInvoiceID($inv_id, $_SESSION['cus_id']);
                        $invoiceTotalAmount = $invoiceDetails['Inv_VATamount'];

                        $adminIncome = $invoiceTotalAmount * 0.30;
                        $influencerIncome = $invoiceTotalAmount * 0.70;

                        $bookingDetails = $customerModel->getBookingByInvoiceID($inv_id);
                        $influencerId = $bookingDetails['Influ_ID'];

                        // Cập nhật Admin Income (cộng dồn vào Ad_Income hiện tại)
                        $currentAdminIncome = $customerModel->getAdminIncome();
                        $newAdminIncome = $currentAdminIncome + $adminIncome;
                        $customerModel->updateAdminIncome($newAdminIncome);

                        // Cập nhật Influencer Income (cộng dồn vào Influ_Income hiện tại)
                        $currentInfluencerIncome = $customerModel->getInfluencerIncome($influencerId);
                        $newInfluencerIncome = $currentInfluencerIncome + $influencerIncome;
                        $customerModel->updateInfluencerIncome($influencerId, $newInfluencerIncome);
                    }
                    
                }

                include 'Views/Customer/PaymentSuccess.php';
            }
        }

        public function mailPaymentToInflu(){
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
                $mail->Subject = 'Payment';
                $htmlContent = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Payment</title>
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
                            <h1>Payment</h1>
                            <span>Dear Influencer,</span>
                            <p>I have paid for the booking please check</p>
                            <br>
                            <p>Hope you can see the email soon.</p>
                        </div>
                    </body>
                    </html>
                ';
                $mail->Body = $htmlContent;
                $mail->send();
            } catch (Exception $e) {
        
            }
        }

        public function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
        }

        public function momo_payment($invID){
            $customerModel = new CustomerModels();
            $invoiceInfo = $customerModel->getInvoiceBookingInfluencerInfo($invID);

            if($invoiceInfo){
                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                $orderInfo = "Thanh toán qua MoMo";
                $amount = intval($invoiceInfo['Inv_VATamount']);
                $orderId = rand(00,9999);
                $redirectUrl = "http://localhost/LUSTRELETHER/index.php?action=customer_momosuccess";
                $ipnUrl = "http://localhost/LUSTRELETHER/index.php?action=customer_momosuccess";
                $extraData = "";


                
                    $partnerCode = $partnerCode;
                    $accessKey = $accessKey;
                    $serectkey = $secretKey;
                    $orderId = $orderId; // Mã đơn hàng
                    $orderInfo = $orderInfo;

                    $amount = $amount;
                    $ipnUrl = $ipnUrl;
                    $redirectUrl = $redirectUrl;
                    $extraData = $extraData;

                    $requestId = time() . "";
                    $requestType = "payWithATM";
                    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                    //before sign HMAC SHA256 signature
                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                    $signature = hash_hmac("sha256", $rawHash, $serectkey);
                    $data = array('partnerCode' => $partnerCode,
                        'partnerName' => "Test",
                        "storeId" => "MomoTestStore",
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'redirectUrl' => $redirectUrl,
                        'ipnUrl' => $ipnUrl,
                        'lang' => 'vi',
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature);
                    $result = $this->execPostRequest($endpoint, json_encode($data));
                    $jsonResult = json_decode($result, true);  // decode json

                    //Just a example, please check more in there

                    header('Location: ' . $jsonResult['payUrl']);
                
            }
        }

        public function customer_momosuccess(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                if (isset($_GET['partnerCode'])) {
                    $partnerCode = $_GET['partnerCode'];
                    $orderId = $_GET['orderId'];
                    $requestId = $_GET['requestId'];
                    $amount = $_GET['amount'];
                    $orderInfo = $_GET['orderInfo'];
                    $orderType = $_GET['orderType'];
                    $transId = $_GET['transId'];
                    $payType = $_GET['payType'];
                    $signature = $_GET['signature'];

                    $inv_id = isset($_SESSION['inv_id']) ? $_SESSION['inv_id'] : null;
                    $saveMomo = $customerModel ->saveMomoPayment($partnerCode, $orderId, $requestId, $amount, $orderInfo, $orderType, $transId, $payType, $signature, $inv_id);

                    if($saveMomo !== null) {
                        $customerModel->UpdateInvoiceMomoID($saveMomo, $inv_id);
                        $this->mailPaymentToInflu();
                        $invoiceDetails = $customerModel->getTransactionDetailsByInvoiceID($inv_id, $_SESSION['cus_id']);
                        $invoiceTotalAmount = $invoiceDetails['Inv_VATamount'];

                        $adminIncome = $invoiceTotalAmount * 0.30;
                        $influencerIncome = $invoiceTotalAmount * 0.70;

                        $bookingDetails = $customerModel->getBookingByInvoiceID($inv_id);
                        $influencerId = $bookingDetails['Influ_ID'];

                        // Cập nhật Admin Income (cộng dồn vào Ad_Income hiện tại)
                        $currentAdminIncome = $customerModel->getAdminIncome();
                        $newAdminIncome = $currentAdminIncome + $adminIncome;
                        $customerModel->updateAdminIncome($newAdminIncome);

                        // Cập nhật Influencer Income (cộng dồn vào Influ_Income hiện tại)
                        $currentInfluencerIncome = $customerModel->getInfluencerIncome($influencerId);
                        $newInfluencerIncome = $currentInfluencerIncome + $influencerIncome;
                        $customerModel->updateInfluencerIncome($influencerId, $newInfluencerIncome);
                    }
                }

                include 'Views/Customer/MomoSuccess.php';
            }
        }

        public function customer_detailInvoice($inv_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
                $invoiceDetails = $customerModel ->getTransactionDetailsByInvoiceID($inv_id, $_SESSION['cus_id']);

                include 'Views/Customer/Detail_Invoice.php';
            }
        }

        public function customer_feedback($booking_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $booking =  $customerModel -> getBookingById($_SESSION['cus_id'], $booking_id);

                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $time = time();
                    $currentTime = $time - (7 * 3600);
                    $CreateTime = date('Y-m-d H:i:s', $currentTime);
                    $Feed_Content = $_POST['content'];
                    $result = $customerModel ->getFeedback($CreateTime, $Feed_Content, $booking_id);

                    if ($result !== null){
                        $customerModel ->UpdateBookingFeedID($result, $booking_id);
                    }

                    header("Location: index.php?action=customer_Allfeedback");
                    exit();
                }


                include 'Views/Customer/Feedback.php';
            }
        }

        public function customer_Allfeedback(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $feedback = $customerModel -> getAllFeedbackCurrentCus($_SESSION['cus_id']);

                include 'Views/Customer/AllFeedback.php';
            }
        }

        public function customer_MailList(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                $mail = $customerModel -> getAllMailCurrentCus($_SESSION['cus_id']);

                $sent = $customerModel -> getAllMailCusSent($_SESSION['cus_id']);

                include 'Views/Customer/Mail_List.php';
            }
        }

        public function customer_sendInfluMail(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $AdminModels  = new AdminModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
                $influencers = $AdminModels->getInfluencerByID($_GET['influ_id']);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $Nickname = $_POST['nickname'];
                    $time = time();
                    $currentTime = $time - (7 * 3600);
                    $CreateTime = date('Y-m-d H:i:s', $currentTime);

                    $Influ_ID = $_POST['influ_id'];
                    $Title = $_POST['title'];
                    $Content = $_POST['content'];

                    $customerModel -> SendAnEmail($CreateTime, $Title, $Content, $Influ_ID, $_SESSION['cus_id']);
                    $this ->mailToInfluencer($Nickname, $Title, $Content, $customer);
                    header("Location: index.php?action=customer_MailList");
                    exit();
                }


                include 'Views/Customer/SendEmail.php';
            }
        }

        public function customer_sendMail(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);
                $influencers = $customerModel->getInfluencersForCustomer($_SESSION['cus_id']);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $Nickname = $_POST['nickname'];
                    $time = time();
                    $currentTime = $time - (7 * 3600);
                    $CreateTime = date('Y-m-d H:i:s', $currentTime);

                    $Influ_ID = $_POST['influ_id'];
                    $Title = $_POST['title'];
                    $Content = $_POST['content'];

                    $customerModel -> SendAnEmail($CreateTime, $Title, $Content, $Influ_ID, $_SESSION['cus_id']);
                    $this ->mailToInfluencer($Nickname, $Title, $Content, $customer);
                    header("Location: index.php?action=customer_MailList");
                    exit();
                }


                include 'Views/Customer/SendAnEmail.php';
            }
        }

        public function mailToInfluencer($Nickname, $Title, $Content, $customer){
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
                            <h1>Mail To Influencer</h1>
                            <span>Dear ' . htmlspecialchars($Nickname) . '</span>
                            
                            <p>I am <strong>' . htmlspecialchars($customer['Cus_Username']) . '</strong></p>
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

        public function is_login() {
            if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] == false){
                return false;
            }
            else{
                return true;
            }
        }

        public function CusLogout(){
            session_unset();
            session_destroy();
            $_SESSION['is_login'] = false;
            header("Location:index.php?action=homepage"); 
            exit();
        }
    }
?>