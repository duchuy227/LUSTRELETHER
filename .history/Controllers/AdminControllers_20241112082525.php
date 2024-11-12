<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once "Models/AdminModels.php";

    class AdminControllers {
        private  $is_login;
        public function __construct() {
            $this->is_login = $this->is_login();
        }
        public function adminLogin(){
            ob_start();
            $_SESSION ['is_login'] = false;
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == false){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $Username =  $_POST['username'];
                    $Password =  $_POST['password'];
                    $admin = new AdminModels();
                    $result = $admin->adminLogin($Username, $Password);

                    if($result === true){
                        header('location: index.php?action=admin_dashboard');
                        exit();
                    }else{
                        $_SESSION['error_message'] = "Invalid Username or Password";
                        $_SESSION['is_login'] = false;
                    }
                }
            } else {
                header('location: index.php?action=admin_login');
            } include 'views/Admin/login.php';
        }


        public function admin_dashboard(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                include  'views/Admin/Dashboard.php';
            }
        }

        public function admin_profile(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                include  'views/Admin/Profile.php';
            }
        }

        public function admin_editprofile($id) {
            ob_start();
            if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
                $AdminModels = new AdminModels();
        
                $admin = $AdminModels->getAdminAccountbyID($id);
        
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $Username = $_POST['username'];
                    $Password = $_POST['password'];
                    $Email = $_POST['email'];
                    $Fullname = $_POST['fullname'];
                    $DOB = $_POST['dob'];
        
                    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                        $imagePath = 'Views/Img/' . basename($_FILES['image']['name']);
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                            $Image = $imagePath;
                        } else {
                            $Image = $admin['image']; 
                        }
                    } else {
                        $Image = $admin['image'];
                    }
        
                    $AdminModels->updateAdmin($id, $Username, $Password, $Email, $Fullname, $DOB, $Image);
        
                    header('Location: index.php?action=admin_profile');
                    exit;
                    } 
                
                include 'views/Admin/admin_editprofile.php';
            }
            ob_end_flush();
        }
        

        public function admin_category(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $content = $AdminModels -> showContent();
                $event =  $AdminModels -> showEvent();
                $topics =   $AdminModels -> getAllTopic();
                $violation =   $AdminModels -> getViolationsWithKeywords();
                include 'views/Admin/Category.php';
            }
        }

        public function admin_addContent(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $Content_name =  $_POST['content_name'];
                    $Content_Des =   $_POST['content_des'];
                    $AdminModels ->addContent($Content_name, $Content_Des);
                    header('Location: index.php?action=admin_category');
                    exit;
                }
                include 'views/Admin/add_content.php';
            }
        }

        public function admin_editContent($id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                $contents = $AdminModels ->getContentbyID($id);

                if($_SERVER['REQUEST_METHOD'] ==  'POST'){
                    $Content_name =  $_POST['content_name'];
                    $Content_Des =   $_POST['content_des'];
                    $AdminModels ->editContent($id, $Content_name, $Content_Des);
                    header('Location: index.php?action=admin_category');
                    exit;
                }
                include 'views/Admin/edit_content.php';
            }
        }

        public function  admin_deleteContent($id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $AdminModels ->deleteContent($id);
                header('Location: index.php?action=admin_category');
                exit;
            }
        }
        
        public function admin_addEvent(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $Event_name =  $_POST['event_name'];
                    $Event_Des =   $_POST['event_des'];
                    $AdminModels ->addEvent($Event_name, $Event_Des);
                    header('Location: index.php?action=admin_category');
                    exit;
                }
                include 'views/Admin/add_event.php';
            }
        }

        public function admin_editEvent($id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                $events = $AdminModels ->getEventbyID($id);

                if($_SERVER['REQUEST_METHOD'] ==  'POST'){
                    $Event_name =  $_POST['event_name'];
                    $Event_Des =   $_POST['event_des'];
                    $AdminModels ->editEvent($id, $Event_name, $Event_Des);
                    header('Location: index.php?action=admin_category');
                    exit;
                }
                include 'views/Admin/edit_event.php';
            }
        }

        public function  admin_deleteEvent($id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $AdminModels ->deleteEvent($id);
                header('Location: index.php?action=admin_category');
                exit;
            }
        }

        

        public function admin_addtopic(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $events =  $AdminModels ->showEvent();
                $contents  =  $AdminModels ->showContent();

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $Topic_Name =   $_POST['topic_name'];
                    $Topic_Des =   $_POST['topic_des'];
                    if (isset($_FILES['topic_image']) && $_FILES['topic_image']['error'] == 0) {
                        $imagePath = 'Views/Img/' . basename($_FILES['topic_image']['name']);
                        if (move_uploaded_file($_FILES['topic_image']['tmp_name'], $imagePath)) {
                            $Topic_Image = $imagePath;
                        }
                    }
                    $events = isset($_POST['events']) ? $_POST['events'] : [];
                    $contents = isset($_POST['contents']) ? $_POST['contents'] : [];
                    $AdminModels -> addTopic($Topic_Name, $Topic_Des, $Topic_Image, $contents, $events);
                    header('Location: index.php?action=admin_category');
                    exit;
                }
                include 'views/Admin/add_topic.php';
            }
        }

        public function admin_edittopic($topic_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $events = $AdminModels->showEvent();
                $contents = $AdminModels->showContent();

                if (isset($_GET['id'])) {
                    $topic_id = $_GET['id'];
                    $topic = $AdminModels->getTopicById($topic_id);
                    $selectedEvents = $AdminModels->getEventsByTopicId($topic_id);
                    $selectedContents = $AdminModels->getContentsByTopicId($topic_id);

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $Topic_Name = $_POST['topic_name'];
                        $Topic_Des = $_POST['topic_des'];
                        
                        if (isset($_FILES['topic_image']) && $_FILES['topic_image']['error'] == 0) {
                            $imagePath = 'Views/Img/' . basename($_FILES['topic_image']['name']);
                            if (move_uploaded_file($_FILES['topic_image']['tmp_name'], $imagePath)) {
                                $Topic_Image = $imagePath;
                            }
                        } else {
                            $Topic_Image = $topic['topic_image']; 
                        }
        
                        $selectedEvents = isset($_POST['events']) ? $_POST['events'] : [];
                        $selectedContents = isset($_POST['contents']) ? $_POST['contents'] : [];
        
                        $AdminModels->updateTopic($topic_id, $Topic_Name, $Topic_Des, $Topic_Image, $selectedContents, $selectedEvents);
                        header('Location: index.php?action=admin_category');
                        exit;
                    }

                    include 'Views/Admin/edit_topic.php';
                }
                
            }
        }

        public function admin_addviolation(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $Violation_Name = $_POST['violation_name'];
                    $keywords_input = $_POST['keywords'];
                    $keywords = array_map('trim', explode(',', $keywords_input));
                    $AdminModels ->addViolationWithKeywords($Violation_Name, $keywords);
                    header('Location: index.php?action=admin_category');
                }
                include 'Views/Admin/add_violation.php';
            }
        }

        public function admin_editviolation($violation_id) {
            if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
                $AdminModels = new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                
                $violation = $AdminModels->getViolationById($violation_id);
                $violation_words = $AdminModels->getViolationWordsByViolationId($violation_id);
        
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $violation_name = $_POST['violation_name'];
                    $keywords = explode(',', $_POST['keywords']);
                    
                    $AdminModels->updateViolationWithKeywords($violation_id, $violation_name, $keywords);
                    
                    header('Location: index.php?action=admin_category');
                    exit;
                }
        
                include 'Views/Admin/edit_violation.php';
            }
        }
        

        public function admin_analytics(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                include 'Views/Admin/analytics.php';
            }
        }

        public function admin_mail(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $mails = $AdminModels->getAllMail();

                include  'Views/Admin/mail.php';
            }
        }

        public function admin_feedback(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $mails = $AdminModels->getAllFeedback();

                include  'Views/Admin/feedback.php';
            }
        }

        public function admin_invoice(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                include 'Views/Admin/invoice.php';
            }
        }

        public function admin_booking(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $type =   $AdminModels->getAllInfluType();

                
                if($_SERVER ['REQUEST_METHOD'] == 'POST'){
                    if(isset( $_POST['type_id'])){
                        $type_id = $_POST['type_id'];
                        $booking =  $AdminModels->getAllBookingByInfluType($type_id);
                    }
                    if(isset( $_POST['status'])){
                        $status = $_POST['status'];
                        if (empty($booking)) {
                            $message = "There are currently no bookings with the status  $status";
                        }
                        else {
                            $booking =  $AdminModels->getAllBookingByStatus($status);
                        }
                    }

                    if(isset($_POST))

                } else {
                    $booking = $AdminModels->getAllBooking();
                }

                include  'Views/Admin/booking.php';
            }
        }

        public function admin_article(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $articles = $AdminModels->getAllArticle();

                include   'Views/Admin/article.php';
            }
        }

        public function admin_detailarticle($post_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                
                $article = $AdminModels -> GetArticleByID($post_id);

                include   'Views/Admin/article_detail.php';
            }
        }

        public function admin_commentarticle($post_id) {
            if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
                $AdminModels = new AdminModels();
                $admins = $AdminModels->getAllAdminAccount();
        
                $article = $AdminModels->GetArticleByID($post_id);
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['status'])) {
                        $Status = $_POST['status'];
                        $AdminModels->UpdatePostStatus($post_id, $Status);
                    }
        
                    if (isset($_POST['comment']) && !empty($_POST['comment'])) {
                        $Comment = $_POST['comment'];
                        if (isset($_SESSION['ad_id']) && !empty($_SESSION['ad_id'])) {
                            $Ad_ID = $_SESSION['ad_id'];
                            // Thêm bình luận và nhận lại Com_ID
                            $Com_ID = $AdminModels->AddCommentToPost($Comment, $post_id, $Ad_ID);
        
                            // Chỉ cập nhật Com_ID trong bảng Post nếu Com_ID không phải là null
                            if ($Com_ID !== null) {
                                $AdminModels->UpdatePostCommentID($post_id, $Com_ID);
                            } else {
                                echo "Error: Could not retrieve Com_ID.";
                            }
                        } else {
                            echo "Error: Admin ID is not set or is null.";
                            exit;
                        }
                    }
        
                    header("Location: index.php?action=admin_article");
                    exit;
                }
                include 'views/Admin/comment.php';
            }
        }
        
        

        public function admin_customer(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $customers =  $AdminModels->getAllCustomer();
                $message = '';

                if($_SERVER ['REQUEST_METHOD'] == 'POST') {
                    $Username  = $_POST['username'];
                    $customers  = $AdminModels->GetCustomerbyName($Username);
                    if (empty($customers)) {
                        $message = "No influencers found named: $Username ";
                    }
                } else {
                    $customers = $AdminModels->getAllCustomer();
                }

                include   'Views/Admin/customer.php';
            }
        }

        public function admin_addcustomer(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $topics  = $AdminModels->getAllTopic();
                $contents =  $AdminModels->showContent();
                $events =  $AdminModels->showEvent();

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $Username = $_POST['username'];
                    $Password  = $_POST['password'];
                    $Email = $_POST['email'];
                    $Fullname =  $_POST['fullname'];
                    $PhoneNumber = $_POST['phonenumber'];
                    $DOB = $_POST['dob'];

                    if (isset($_FILES['cus_image']) && $_FILES['cus_image']['error'] == 0) {
                        $imagePath = 'Views/Img/' . basename($_FILES['cus_image']['name']);
                        if (move_uploaded_file($_FILES['cus_image']['tmp_name'], $imagePath)) {
                            $Cus_Image = $imagePath;
                        }
                    }

                    $events = isset($_POST['events']) ? $_POST['events'] : [];
                    $contents = isset($_POST['contents']) ? $_POST['contents'] : [];
                    $topics = isset($_POST['topics']) ? $_POST['topics'] : [];
                    $AdminModels->addCustomer($Username, $Password, $Email, $Fullname, $PhoneNumber, $DOB, $Cus_Image, $topics, $contents, $events);
                    header('Location: index.php?action=admin_customer');


                }
                include 'views/Admin/add_customer.php';
            }
        }

        public function admin_detailcustomer($cus_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $customers =  $AdminModels->getCustomerByID($cus_id);

                include  'Views/Admin/customer_detail.php';
            }
        }

        public function admin_editcustomer($cus_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $topics  = $AdminModels->getAllTopic();
                $contents =  $AdminModels->showContent();
                $events =  $AdminModels->showEvent();
                

                if (isset($_GET['id'])) {
                    $cus_id = $_GET['id'];
                    $customers =  $AdminModels->getCustomerByID($cus_id);
                    $selectedTopics = $AdminModels ->getTopicssByCusId($cus_id);
                    $selectedEvents = $AdminModels->getEventsByCusId($cus_id);
                    $selectedContents = $AdminModels->getContentsByCusId($cus_id);

                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $Username = $_POST['username'];
                        $Password  = $_POST['password'];
                        $Email = $_POST['email'];
                        $Fullname =  $_POST['fullname'];
                        $PhoneNumber = $_POST['phonenumber'];
                        $DOB = $_POST['dob'];

                        if (isset($_FILES['cus_image']) && $_FILES['cus_image']['error'] == 0) {
                            $imagePath = 'Views/Img/' . basename($_FILES['cus_image']['name']);
                            if (move_uploaded_file($_FILES['cus_image']['tmp_name'], $imagePath)) {
                                $Cus_Image = $imagePath;
                            } else {
                                $Cus_Image = $customers['cus_image']; 
                            }
                        }

                        $selectedTopics = isset($_POST['topics']) ? $_POST['topics'] : [];

                        $selectedEvents = isset($_POST['events']) ? $_POST['events'] : [];
                        $selectedContents = isset($_POST['contents']) ? $_POST['contents'] : [];
                        $topics = isset($_POST['topics']) ? $_POST['topics'] : [];
                        $AdminModels->editCustomer($cus_id, $Username, $Password, $Email, $Fullname, $PhoneNumber, $DOB, $Cus_Image, $selectedTopics, $selectedContents, $selectedEvents);
                        header('Location: index.php?action=admin_customer');
                    }
                }
                include 'views/Admin/edit_customer.php';
            }
        }

        public function admin_deletecustomer($cus_id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $customers = $AdminModels ->deleteCus($cus_id);
                header('Location: index.php?action=admin_customer');
                exit;
            }
        }

        public function admin_influencer(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                $type =   $AdminModels->getAllInfluType();
                $message = '';
                if($_SERVER ['REQUEST_METHOD'] == 'POST'){
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
                    $influencers =  $AdminModels->getAllInfluencer();
                }

                include  'Views/Admin/influencer.php';
            }
        }

        public function admin_Addinfluencer(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels =  new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $topics  = $AdminModels->getAllTopic();

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
                    $Email  = $_POST['email'];
                    $Fullname   = $_POST['fullname'];
                    $DOB   = $_POST['dob'];
                    $PhoneNumber =  $_POST['phonenumber'];
                    $Address =  $_POST['address'];
                    $Nickname =   $_POST['nickname'];
                    $Hastag =   $_POST['hastag'];
                    $Price =    $_POST['price'];
                    $mainImagePath = '';

                    if (isset($_FILES['influ_image']) && $_FILES['influ_image']['error'] == 0) {
                        $mainImagePath = 'Views/Influ_Image/' . basename($_FILES['influ_image']['name']);
                        if (move_uploaded_file($_FILES['influ_image']['tmp_name'], $mainImagePath)) {
                            $Influ_Image = $mainImagePath;
                        }
                    }

                    $otherImagePaths = [];
                    if (isset($_FILES['influ_other_images']) && is_array($_FILES['influ_other_images']['name'])) {
                        $uploadedOtherImages = $_FILES['influ_other_images'];
                        $totalOtherImages = min(count($uploadedOtherImages['name']), 6);
                        
                        for ($i = 0; $i < $totalOtherImages; $i++) {
                            if (isset($uploadedOtherImages['error'][$i]) && $uploadedOtherImages['error'][$i] === UPLOAD_ERR_OK) {
                                $otherImagePath = 'Views/Influ_Image/' . basename($uploadedOtherImages['name'][$i]);
                                if (move_uploaded_file($uploadedOtherImages['tmp_name'][$i], $otherImagePath)) {
                                    $otherImagePaths[] = $otherImagePath;
                                }
                            }
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

                    $topics = isset($_POST['topics']) ? $_POST['topics'] : [];

                    $AdminModels -> AddInfluencer($Username, $Password, $Email, $Fullname, $DOB, $PhoneNumber, $Address, $Nickname, $Hastag, $Price, $Influ_Image, $otherImagePaths, $Achivement, $Biography, $InfluType_ID, $Workplace_id, $Followers_id, $Gender_id,  $Facebook, $Tiktok, $Instagram, $topics);
                    header('Location: index.php?action=admin_influencer');
                }

                include 'Views/Admin/add_influencer.php';
            }
        }


        public function admin_detailinfluencer($id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels = new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                $influencers  = $AdminModels->getInfluencerById($id);

                include  'Views/Admin/detail_influencer.php';
            }
            
        }

        public function admin_editinfluencer($id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels = new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();

                
                    $influencers = $AdminModels->getInfluencerById($id);
                    $topics  = $AdminModels->getAllTopic();
            
                    $type_id = $influencers['InfluType_ID'];
                    $all_type = $AdminModels->getAllInfluType();
                    $type = $AdminModels->getInfluencerTypeByID($type_id);
            
                    $gender_id = $influencers['Gender_ID'];
                    $all_gender = $AdminModels->getAllGender();
                    $gender = $AdminModels->getGenderByID($gender_id);
            
                    $wplace_id = $influencers['WPlace_ID'];
                    $all_wplace = $AdminModels->getAllWorkplace();
                    $wplace = $AdminModels->getWorkplaceByID($wplace_id);
            
                    $fol_id = $influencers['Fol_ID'];
                    $all_fol = $AdminModels->getAllFollowers();
                    $fol = $AdminModels->getFollowersByID($fol_id);

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $selectedTopics = $AdminModels ->getTopicsByInfluId($id);
            
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Nhận các giá trị từ form
                        $Username  = $_POST['username'];
                        $Password  = $_POST['password'];
                        $Email  = $_POST['email'];
                        $Fullname   = $_POST['fullname'];
                        $DOB   = $_POST['dob'];
                        $PhoneNumber =  $_POST['phonenumber'];
                        $Address =  $_POST['address'];
                        $Nickname =   $_POST['nickname'];
                        $Hastag =   $_POST['hastag'];
                        $Price =    $_POST['price'];
                        $mainImagePath = $influencers['Influ_Image'];
            
                        // Xử lý upload ảnh chính
                        if (isset($_FILES['influ_image']) && $_FILES['influ_image']['error'] == 0) {
                            $mainImagePath = 'Views/Influ_Image/' . basename($_FILES['influ_image']['name']);
                            if (move_uploaded_file($_FILES['influ_image']['tmp_name'], $mainImagePath)) {
                                $mainImagePath = $mainImagePath;
                            } 
                        }
            
                        // Xử lý upload các ảnh phụ
                        $otherImagePaths = [];
                        if (isset($_FILES['influ_other_images']) && is_array($_FILES['influ_other_images']['name'])) {
                            $uploadedOtherImages = $_FILES['influ_other_images'];
                            $totalOtherImages = min(count($uploadedOtherImages['name']), 6);
            
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
            
                        // Các thông tin khác
                        $Achivement =  $_POST['achivement'];
                        $Biography =   $_POST['biography'];
                        $InfluType_ID =   $_POST['type_id'];
                        $Workplace_id =    $_POST['wplace_id'];
                        $Followers_id =   $_POST['fol_id'];
                        $Gender_id  =   $_POST['gender_id'];
                        $Facebook = isset($_POST['facebook_link']) ? $_POST['facebook_link'] : null;
                        $Tiktok = isset($_POST['tiktok_link']) ? $_POST['tiktok_link'] : null;
                        $Instagram = isset($_POST['instagram_link']) ? $_POST['instagram_link'] : null;
            
                        $selectedTopics = isset($_POST['topics']) ? $_POST['topics'] : [];
            
                        // Cập nhật dữ liệu vào database
                        $AdminModels->editInfluencer($id, $Username, $Password, $Email, $Fullname, $DOB, $PhoneNumber, $Address, $Nickname, $Hastag, $Price, $mainImagePath, $otherImagePaths, $Achivement, $Biography, $InfluType_ID, $Workplace_id, $Followers_id, $Gender_id, $Facebook, $Tiktok, $Instagram, $selectedTopics);
                        
                        header('Location: index.php?action=admin_influencer');
                    }
                }
        
                include 'Views/Admin/edit_influencer.php';
            }
        }


        public function admin_deleteinfluencer($id){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels = new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $influencers = $AdminModels -> deleteInflu($id);
                header('Location: index.php?action=admin_influencer');
                exit;
            }
        }

        public function admin_notification(){
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true){
                $AdminModels = new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $influencers = $AdminModels ->getInfluAccountPending();

                include 'Views/Admin/notification.php';
            }
        }

        public function admin_changestatus($influ_id) {
            if ($this->is_login == true && isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
                $AdminModels = new AdminModels();
                $admins =  $AdminModels->getAllAdminAccount();
                $influencers = $AdminModels->getInfluencerByID($influ_id);
        
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $status = $_POST['new_status'];
                    $AdminModels->changeStatusAccount($influ_id, $status);
                    
                    // Kiểm tra trạng thái để gọi hàm phù hợp
                    if ($status === 'Active') {
                        $this->mailAccountApproval($influencers['Influ_Fullname']);
                    } elseif ($status === 'Rejected') {
                        $this->mailAccountRejected($influencers['Influ_Fullname']);
                    }
        
                    header('Location: index.php?action=admin_influencer');
                    exit;
                }
                include 'Views/Admin/change_status.php';
            }
        }
        

        public function mailAccountApproval($username){
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
                                color:  #696969;
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
                            <h1>Account Notification</h1>
                            <span>Dear ' . htmlspecialchars($username) . ',</span>
                            <p>Your account has been <span class="rejected">Approved</span>. You may log in at your convenience.</p>
                        </div>
                    </body>
                    </html>
                ';
                $mail->Body = $htmlContent;
                $mail->send();
            } catch (Exception $e) {
        
            }
        }

        public function mailAccountRejected($username){
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
                                color:  #696969;
                                font-size: 24px;
                                margin-bottom: 20px;
                                font-weight: bold;
                            }
                            
                            .rejected {
                                color: #FF3300;
                                font-size: 20px;
                                font-weight: bold;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h1>Account Notification</h1>
                            <span>Dear ' . htmlspecialchars($username) . ',</span>
                            <p>Your account has been <span class="rejected">REJECTED</span> due to issues with your personal identification. We ask that you register a new account.</p>
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

        public function adminLogout(){
            session_unset();
            session_destroy();
            $_SESSION['is_login'] = false;
            header("Location:index.php?action=homepage"); 
            exit();
        }


    }
?>