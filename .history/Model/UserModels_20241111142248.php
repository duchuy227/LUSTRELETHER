<?php 
    require_once "Models/UserModels.php";
    class UserControllers {
        public function homepage(){
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