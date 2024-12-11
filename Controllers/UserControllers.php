<?php 
    require_once "Models/UserModels.php";
    require_once "Models/AdminModels.php";
    class UserControllers {
        public function homepage(){
            $_SESSION['is_login'] = false;
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == false){
                $adminModel = new AdminModels();
                $favo = $adminModel->FavouriteInflu();
                $viral = $adminModel->ViralInflu();
            }
            include 'views/homepage.php';
        }

        public function aboutUs(){
            include 'views/AboutUs.php';
        }

        public function contactUs(){
            include 'views/Contact.php';
        }

        public function policy(){
            include 'views/Policy.php';
        }
    }
?>