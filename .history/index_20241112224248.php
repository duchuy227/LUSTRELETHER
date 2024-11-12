<?php 
    session_start();
    $action = $_GET['action'] ?? 'index';

    switch ($action){
        case 'index':
            header("Location: index.php?action=homepage");
            exit;

        case 'homepage':
            require_once "Controllers/UserControllers.php";
            $UserControllers =  new UserControllers();
            $UserControllers -> homepage();
            break;
        
        case 'aboutUs':
            require_once "Controllers/UserControllers.php";
            $UserControllers =  new UserControllers();
            $UserControllers -> aboutUs();
            break;
        
        case 'contactUs':
            require_once "Controllers/UserControllers.php";
            $UserControllers =  new UserControllers();
            $UserControllers -> contactUs();
            break;
        
        case 'policy':
            require_once "Controllers/UserControllers.php";
            $UserControllers =  new UserControllers();
            $UserControllers -> policy();
            break;
        
        case 'adminLogin':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =   new AdminControllers();
            $AdminControllers -> adminLogin();
            break;
        
        case 'adminLogout':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =   new AdminControllers();
            $AdminControllers -> adminLogout();
            break;
        
        case 'cusLogin':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> cusLogin();
            break;
        
        case 'cusRegister':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> cusRegister();
            break;
        
        case 'CusLogout':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> CusLogout();
            break;
        
        case 'InfluLogin':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers =  new InfluencerControllers();
            $InfluControllers -> InfluLogin();
            break;

        case 'InfluRegister':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers =  new InfluencerControllers();
            $InfluControllers -> InfluRegister();
            break;
        
        case 'InfluLogout':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers =  new InfluencerControllers();
            $InfluControllers -> InfluLogout();
            break;

        case 'admin_dashboard':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_dashboard();
            break;
        
        case 'admin_profile':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_profile();
            break;
        
        case 'admin_editprofile':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_editprofile($_GET['id']);
            break;
        
        case 'admin_category':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_category();
            break;
        
        case 'admin_addContent':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_addContent();
            break;
        
        case 'admin_editContent':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_editContent($_GET['id']);
            break;
        
        case 'admin_deleteContent':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_deleteContent($_GET['id']);
            break;

        case 'admin_addEvent':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_addEvent();
            break;
        
        case 'admin_editEvent':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_editEvent($_GET['id']);
            break;
        
        case 'admin_deleteEvent':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_deleteEvent($_GET['id']);
            break;
        
        
        case 'admin_addtopic':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_addtopic();
            break;
        
        case 'admin_edittopic':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_edittopic($_GET['id']);
            break;
        
        case 'admin_addviolation':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_addviolation();
            break;
        
        case 'admin_editviolation':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_editviolation($_GET['id']);
            break;
        
        case 'admin_analytics':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_analytics();
            break;

        case 'admin_mail':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_mail();
            break;
        
        case 'admin_feedback':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_feedback();
            break;
        
        case 'admin_invoice':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_invoice();
            break;
        
        case 'admin_booking':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_booking();
            break;
        
        case 'admin_detailbooking':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_detailbooking($_GET['id']);
            break;
        
        case 'admin_article':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_article();
            break;
        
        case 'admin_detailarticle':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_detailarticle($_GET['id']);
            break;
        
        case 'admin_commentarticle':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_commentarticle($_GET['id']);
            break;
        
        case 'admin_customer':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_customer();
            break;

        case 'admin_addcustomer':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_addcustomer();
            break;
        
        case 'admin_detailcustomer':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_detailcustomer($_GET['id']);
            break;

        case 'admin_editcustomer':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_editcustomer($_GET['id']);
            break;
        
        case 'admin_deletecustomer':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_deletecustomer($_GET['id']);
            break;

        case 'admin_influencer':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_influencer();
            break;
        
        case 'admin_Addinfluencer':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_Addinfluencer();
            break;
        
        case 'admin_detailinfluencer':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_detailinfluencer($_GET['id']);
            break;
        
        case 'admin_editinfluencer':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_editinfluencer($_GET['id']);
            break;
        
        case 'admin_deleteinfluencer':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_deleteinfluencer($_GET['id']);
            break;
        
        case 'admin_notification':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_notification();
            break;
        
        case 'admin_changestatus':
            require_once "Controllers/AdminControllers.php";
            $AdminControllers =  new AdminControllers();
            $AdminControllers -> admin_changestatus($_GET['id']);
            break;
        
        case 'influencer_dashboard':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_dashboard();
            break;
        
        case 'influencer_profile':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_profile();
            break;
        
        case 'influencer_editprofile':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_editprofile();
            break;

        case 'influencer_timeline':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_timeline();
            break;
        
        case 'influencer_booking':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_booking();
            break;
        
        case 'influencer_detailbooking':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_detailbooking($_GET['id']);
            break;
        
        case 'influencer_statusbooking':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_statusbooking($_GET['id']);
            break;
        
        case 'influencer_changetimeline':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_changetimeline($_GET['id']);
            break;
        
        case 'influencer_article':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_article();
            break;
        
        case 'influencer_addarticle':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_addarticle();
            break;
        
        case 'influencer_detailarticle':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_detailarticle($_GET['id']);
            break;
        
        case 'influencer_editarticle':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_editarticle($_GET['id']);
            break;

        case 'influencer_deletearticle':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_deletearticle($_GET['id']);
            break;
        
        case 'influencer_invoice':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_invoice();
            break;
        
        case 'influencer_feedback':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_feedback();
            break;

        case 'influencer_mail':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_mail();
            break;
        
        case 'influencer_sendmail':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_sendmail();
            break;

        case 'influencer_repmail':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_repmail();
            break;
        
        case 'influencer_faq':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_faq();
            break;
        
        case 'influencer_term':
            require_once "Controllers/InfluencerControllers.php";
            $InfluControllers = new InfluencerControllers();
            $InfluControllers -> influencer_term();
            break;
        
        case 'customer_userpage':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_userpage();
            break;
        
        case 'customer_policy':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_policy();
            break;
        
        case 'customer_dashboard':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_dashboard();
            break;
        
        case 'customer_password':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_password();
            break;

        case 'customer_bookinglist':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_bookinglist();
            break;

        case 'customer_payment':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_payment();
            break;
        
        case 'customer_MailList':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_MailList();
            break;
        
        case 'customer_influencer':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_influencer();
            break;

        case 'customer_influencerDetail':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_influencerDetail($_GET['id']);
            break;

        case 'customer_allPost':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_allPost($_GET['id']);
            break;

        case 'customer_createbooking':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_createbooking();
            break;

        case 'getServicesByTopic':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> getServicesByTopic();
            break;
        
        case 'customer_detailBooking':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_detailBooking($_GET['id']);
            break;
        
        case 'customer_editBooking':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_editBooking($_GET['id']);
            break;

        case 'customer_deleteBooking':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_deleteBooking($_GET['id']);
            break;

        case 'customer_paymentinfo':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_paymentinfo($_GET['id']);
            break;

        case 'customer_vnpay_payment':
            require_once "Controllers/CustomerControllers.php";
            $customerControllers = new CustomerControllers();
            $customerControllers->vnpay_payment($_GET['id']);
            break;
        
        case 'customer_paymentsuccess':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_paymentsuccess();
            break;

        case 'customer_momo_payment':
            require_once "Controllers/CustomerControllers.php";
            $customerControllers = new CustomerControllers();
            $customerControllers->momo_payment($_GET['id']);
            break;

        case 'customer_paymentsuccess':
            require_once "Controllers/CustomerControllers.php";
            $CustomerControllers =  new CustomerControllers();
            $CustomerControllers -> customer_paymentsuccess();
            break;
    }
?>