<?php 
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
                        header('Location: index.php?action=customer_dashboard');
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
                    if ($Password !== $ConfirmPassword) {
                        $error = "Password do not match";
                    }
                    $Email = $_POST['email'];
                    $Fullname =  $_POST['fullname'];
                    $PhoneNumber = $_POST['phonenumber'];
                    $DOB = $_POST['dob'];

                    $events = isset($_POST['events']) ? $_POST['events'] : [];
                    $contents = isset($_POST['contents']) ? $_POST['contents'] : [];
                    $topics = isset($_POST['topics']) ? $_POST['topics'] : [];
                    $customerModel ->CusRegister($Username, $Password, $Email, $Fullname, $PhoneNumber, $DOB, $topics, $contents, $events);
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
                }

                $mostInfluentialContent = $customerModel ->getMostInfluentialContentByCustomer($_SESSION['cus_id']);

                if ($mostInfluentialContent){
                    $content_id = $mostInfluentialContent['Content_ID'];
                    $influencerss = $customerModel->getInfluencersByContent($content_id);
                }

                include 'views/Customer/User_page.php';
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

                $influencers = $customerModel ->getAllInfluencer();

                $type_id = isset($_POST['type_id']) ? $_POST['type_id'] : null;
                $all_type = $AdminModels -> getAllInfluType();
                $type  = $AdminModels -> getInfluencerTypeByID($type_id);

                $wplace_id = isset($_POST['wplace_id']) ? $_POST['wplace_id'] : null;
                $all_wplace = $AdminModels -> getAllWorkplace();
                $wplace  = $AdminModels -> getWorkplaceByID($wplace_id);

                $fol_id = isset($_POST['fol_id']) ? $_POST['fol_id'] : '';
                $all_fol = $AdminModels -> getAllFollowers();
                $fol  = $AdminModels -> getFollowersByID($fol_id);

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

                    $StartDate = $_POST['start_date'];
                    $EndDate = $_POST['end_date'];
                    $isConflict = $customerModel->checkBookingConflict($StartDate, $EndDate, $_GET['influ_id']);
                    if ($isConflict) {
                        // Hiển thị thông báo nếu có xung đột
                        $_SESSION['errorMessage']  = "The selected date range is already set, please select another date.";
                    } else {
                        unset($_SESSION['errorMessage']);
                        $Topic_ID = $_POST['topic'];
                        $Cus_ID = $_SESSION['cus_id'];
                        $Influ_ID = $_GET['influ_id'];

                        $InfluencerPrice = $customerModel->getInfluencerPrice($Influ_ID);
                        $Expense = $InfluencerPrice * $TotalDay;
                        $customerModel -> createBooking($CreateTime, $TotalDay, $Content, $StartDate, $EndDate, $Expense, $Topic_ID,  $Cus_ID, $Influ_ID);
                        header("Location: index.php?action=customer_bookinglist");
                        exit();
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

                    if (isset($_FILES['cus_image']) && $_FILES['cus_image']['error'] == 0) {
                        $imagePath = 'Views/Img/' . basename($_FILES['cus_image']['name']);
                        move_uploaded_file($_FILES['cus_image']['tmp_name'], $imagePath); 
                            
                        
                    }
                    $selectedTopics = isset($_POST['topics']) ? $_POST['topics'] : [];

                    $selectedEvents = isset($_POST['events']) ? $_POST['events'] : [];
                    $selectedContents = isset($_POST['contents']) ? $_POST['contents'] : [];
                    $topics = isset($_POST['topics']) ? $_POST['topics'] : [];
                    $customerModel->updateCusProfile($id, $Username, $Email, $Fullname, $PhoneNumber, $DOB, $imagePath, $selectedTopics, $selectedContents, $selectedEvents);
                    header('Location: index.php?action=customer_dashboard');
                    exit();
                }

                include  'views/Customer/Dashboard.php';

            }
        }

        public function customer_password(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $id = $_SESSION['cus_id'];
                    $currentPassword = $_POST['current_password'] ?? '';
                    $newPassword = $_POST['new_password'] ?? '';
                    $confirmPassword = $_POST['confirm_password'] ?? '';

                    if ($currentPassword !== $customer['Cus_Password']) {
                        $message = "Current password is incorrect.";
                    }
                    // Kiểm tra xem mật khẩu mới và xác nhận có khớp nhau không
                    elseif ($newPassword !== $confirmPassword) {
                        $message = "New password and confirm password do not match.";
                    }

                    else {
                        $isUpdated = $customerModel->changePassword($id, $newPassword);
                        $message = "Password changed successfully.";
                    }
                }
                include  'views/Customer/Password.php';
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
                    $Booking_Content = $_POST['service_name'];

                    $StartDate = $_POST['start_date'];
                    $EndDate = $_POST['end_date'];
                    $isConflict = $customerModel->checkBookingConflict($StartDate, $EndDate, $Influ_ID, $booking_id);
                    if ($isConflict) {
                        // Hiển thị thông báo nếu có xung đột
                        $_SESSION['errorMessage']  = "The selected date range is already set, please select another date.";
                    } else {
                        unset($_SESSION['errorMessage']);
                        $Topic_ID = $_POST['topic'];
                        $Status = $_POST['status'];

                        $InfluencerPrice = $customerModel->getInfluencerPrice($Influ_ID);
                        $Expense = $InfluencerPrice * $TotalDay;
                        $customerModel -> editBooking($CreateTime, $TotalDay, $Booking_Content, $StartDate, $EndDate, $Status, $Expense, $Topic_ID,  $booking_id);
                        header("Location: index.php?action=customer_bookinglist");
                        exit();
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
                $vnp_Amount = intval($invoiceInfo['Inv_VATamount']) *100; // Giá trị đơn hàng (VNĐ)
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
                    
                    $inv_id = isset($_SESSION['Inv_ID']) ? $_SESSION['Inv_ID'] : null;
                    $save = $customerModel ->saveVNPayPayment($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TMNCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash, $inv_id);

                    if($save !== null){
                        $customerModel ->
                    }
                    
                }

                include 'Views/Customer/PaymentSuccess.php';
            }
        }

        public function customer_MailList(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['cus_id'])) {
                $customerModel = new CustomerModels();
                $customer = $customerModel -> GetCustomerbyID($_SESSION['cus_id']);

                include 'Views/Customer/Mail_List.php';
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