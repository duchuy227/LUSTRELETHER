<?php 
    require_once 'Config/db.php';

    class AdminModels {
        private $conn;

        public function __construct()
        {
            global $conn;
            $this->conn = $conn;
        }

        public function adminLogin($Username, $Password){
            $query = "SELECT *  FROM admin WHERE Ad_Username = :username AND  Ad_Password = :password";
            $sql =  $this->conn->prepare($query);
            $sql->execute(array(":username" => $Username, ":password" => $Password));

            if ($sql->rowCount() > 0) {
                $admin = $sql->fetch(PDO::FETCH_ASSOC);
                $_SESSION['is_login'] = true;
                $_SESSION['ad_id'] = $admin['Ad_ID'];
                return true;
            } else {
                return false; // Đăng nhập thất bại
            }
        }

        public function getAdminAccountbyID($id){
            $query = "SELECT * FROM Admin WHERE Ad_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllAdminAccount(){
            $query = "SELECT * FROM Admin";
            $sql = $this->conn->query($query);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateAdmin($id,$Username, $Password, $Email, $Fullname, $DOB, $Image){
            $query = "UPDATE Admin Set Ad_Username = :username, Ad_Password = :password, Ad_Email = :email, Ad_Fullname = :fullname, Ad_DOB = :dob, Ad_Image  = :image WHERE Ad_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(
                ':username' => $Username,
                ':password' => $Password,
                ':email' => $Email,
                ':fullname' => $Fullname,  // Đảm bảo không có khoảng trắng
                ':dob' => $DOB,
                ':image' => $Image,
                ':id' => $id
            ));
        }

        public function showContent(){
            $query = "SELECT * FROM Content";
            $sql = $this->conn->query($query);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addContent($Content_Name, $Content_Descrition){
            $query = "INSERT INTO Content (Content_Name, Content_Description) VALUES (:name, :description)";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':name' => $Content_Name,  ':description' => $Content_Descrition));
        }

        public function getContentbyID($id){
            $query = "SELECT * FROM Content WHERE Content_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function editContent($id, $Content_Name, $Content_Descrition){
            $query = "UPDATE Content SET Content_Name = :name, Content_Description = :description WHERE  Content_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':name' => $Content_Name,  ':description' => $Content_Descrition,  ':id' => $id));
        }

        public function deleteContent($id){
            $query = "DELETE FROM Content WHERE Content_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
        }


        public function showEvent(){
            $query = "SELECT * FROM Event";
            $sql = $this->conn->query($query);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addEvent($Event_Name, $Event_Descrition){
            $query = "INSERT INTO Event (Event_Name, Event_Description) VALUES (:name, :description)";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':name' => $Event_Name,  ':description' => $Event_Descrition));
        }

        public function getEventbyID($id){
            $query = "SELECT * FROM Event WHERE Event_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function editEvent($id, $Event_Name, $Event_Descrition){
            $query = "UPDATE Event SET Event_Name = :name, Event_Description = :description WHERE  Event_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':name' => $Event_Name,  ':description' => $Event_Descrition,  ':id' => $id));
        }

        public function deleteEvent($id){
            $query = "DELETE FROM Event WHERE Event_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
        }

        public function addTopic($Topic_Name, $Topic_Des, $Topic_Image, $contents, $events){
            $this->conn->beginTransaction();

            $query = "INSERT INTO Topic (Topic_Name, Topic_Description, Topic_Image)VALUES (:name, :description, :image)";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':name' => $Topic_Name, ':description' => $Topic_Des,  ':image' => $Topic_Image));

            $topic_id = $this->conn->lastInsertId();

            $queryContent = "INSERT INTO Topic_Content (Topic_ID, Content_ID) VALUES (:topic_id, :content_id)";
            $sqlContent = $this->conn->prepare($queryContent);
            
            foreach ($contents as $content_id) {
                $sqlContent->execute(array(':topic_id' => $topic_id, ':content_id' => $content_id));
            }

            $queryEvent = "INSERT INTO Topic_Event (Topic_ID, Event_ID) VALUES (:topic_id, :event_id)";
            $sqlEvent = $this->conn->prepare($queryEvent);
            
            foreach ($events as $event_id) {
                $sqlEvent->execute(array(':topic_id' => $topic_id, ':event_id' => $event_id));
            }

            $this->conn->commit();

        }

        public function getAllTopic(){
            $query = "SELECT 
                        t.Topic_ID,
                        t.Topic_Name,
                        t.Topic_Description,
                        t.Topic_Image,
                        GROUP_CONCAT(DISTINCT c.Content_Name ORDER BY c.Content_Name ASC) AS Contents,
                        GROUP_CONCAT(DISTINCT e.Event_Name ORDER BY e.Event_Name ASC) AS Events
                    FROM Topic t
                    LEFT JOIN Topic_Content tc ON t.Topic_ID = tc.Topic_ID
                    LEFT JOIN Content c ON tc.Content_ID = c.Content_ID
                    LEFT JOIN Topic_Event te ON t.Topic_ID = te.Topic_ID
                    LEFT JOIN Event e ON te.Event_ID = e.Event_ID
                    GROUP BY t.Topic_ID;";
            $sql = $this->conn->query($query);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getTopicById($topic_id) {
            $query = "SELECT * FROM Topic WHERE Topic_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $topic_id)); 
            $topic = $sql->fetch(PDO::FETCH_ASSOC);
            
            if ($topic) {
                $contentQuery = "SELECT Content_ID FROM Topic_Content WHERE Topic_ID = :id";
                $contentSql = $this->conn->prepare($contentQuery);
                $contentSql->execute(array(':id' => $topic_id));
                $contents = $contentSql->fetchAll(PDO::FETCH_COLUMN);
        
                $eventQuery = "SELECT Event_ID FROM Topic_Event WHERE Topic_ID = :id";
                $eventSql = $this->conn->prepare($eventQuery);
                $eventSql->execute(array(':id' => $topic_id));
                $events = $eventSql->fetchAll(PDO::FETCH_COLUMN);
        
                $topic['Contents'] = $contents;
                $topic['Events'] = $events;
            }
        
            return $topic;
        }

        public function updateTopic($topic_id, $Topic_Name, $Topic_Des, $Topic_Image, $contents, $events){
            $this->conn->beginTransaction();
        
            $query = "UPDATE Topic SET Topic_Name = :name, Topic_Description = :description, Topic_Image = :image WHERE Topic_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(
                ':name' => $Topic_Name,
                ':description' => $Topic_Des,
                ':image' => $Topic_Image,
                ':id' => $topic_id
            ));
        
            // Xóa các liên kết cũ trước khi thêm liên kết mới
            $deleteContentQuery = "DELETE FROM Topic_Content WHERE Topic_ID = :topic_id";
            $sqlDeleteContent = $this->conn->prepare($deleteContentQuery);
            $sqlDeleteContent->execute(array(':topic_id' => $topic_id));
        
            $deleteEventQuery = "DELETE FROM Topic_Event WHERE Topic_ID = :topic_id";
            $sqlDeleteEvent = $this->conn->prepare($deleteEventQuery);
            $sqlDeleteEvent->execute(array(':topic_id' => $topic_id));
        
            // Thêm các liên kết mới
            $queryContent = "INSERT INTO Topic_Content (Topic_ID, Content_ID) VALUES (:topic_id, :content_id)";
            $sqlContent = $this->conn->prepare($queryContent);
            foreach ($contents as $content_id) {
                $sqlContent->execute(array(':topic_id' => $topic_id, ':content_id' => $content_id));
            }
        
            $queryEvent = "INSERT INTO Topic_Event (Topic_ID, Event_ID) VALUES (:topic_id, :event_id)";
            $sqlEvent = $this->conn->prepare($queryEvent);
            foreach ($events as $event_id) {
                $sqlEvent->execute(array(':topic_id' => $topic_id, ':event_id' => $event_id));
            }
        
            $this->conn->commit();
        }
        
        public function getEventsByTopicId($topic_id) {
            $query = "SELECT Event_ID FROM Topic_Event WHERE Topic_ID = :topic_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':topic_id' => $topic_id));
            return $sql->fetchAll(PDO::FETCH_COLUMN);
        }

        public function getContentsByTopicId($topic_id) {
            $query = "SELECT Content_ID FROM Topic_Content WHERE Topic_ID = :topic_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':topic_id' => $topic_id));
            return $sql->fetchAll(PDO::FETCH_COLUMN);
        }

        public function getViolationsWithKeywords() {
            $query = "SELECT v.Vio_ID, v.Vio_Name, GROUP_CONCAT(vw.VW_Word SEPARATOR ', ') AS Violation_Words
            FROM Violation AS v
            LEFT JOIN Violation_word AS vw ON v.Vio_ID = vw.Vio_ID
            GROUP BY v.Vio_ID";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addViolationWithKeywords($violation_name, $keywords) {
            
            $this->conn->beginTransaction();
            
            
            $query = "INSERT INTO Violation (Vio_Name) VALUES (:violation_name)";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':violation_name' => $violation_name));
            
            $violation_id = $this->conn->lastInsertId();
        
            if ($violation_id) {
                foreach ($keywords as $keyword) {
                    $query = "INSERT INTO Violation_word (VW_Word, Vio_ID) VALUES (:keyword, :violation_id)";
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute(array(':keyword' => $keyword, ':violation_id' => $violation_id));
                    
                    if ($stmt->rowCount() <= 0) {
                        $this->conn->rollBack();
                        return false; 
                    }
                }
            
                $this->conn->commit();
                return true; 
            }
        
            $this->conn->rollBack();
            return false;
        }

        public function getViolationById($violation_id) {
            $query = "SELECT * FROM Violation WHERE Vio_ID = :violation_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(':violation_id' => $violation_id));
            return $stmt->fetch(PDO::FETCH_ASSOC); 
        }

        public function getViolationWordsByViolationId($violation_id) {
            $query = "SELECT VW_Word FROM Violation_word WHERE Vio_ID = :violation_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(':violation_id' => $violation_id));
            return $stmt->fetchAll(PDO::FETCH_COLUMN); 
        }

        public function updateViolationWithKeywords($violation_id, $violation_name, $keywords) {
            $this->conn->beginTransaction();
            
            $query = "UPDATE Violation SET Vio_Name = :violation_name WHERE Vio_ID = :violation_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(':violation_name' => $violation_name, ':violation_id' => $violation_id));
            
            $query = "DELETE FROM Violation_word WHERE Vio_ID = :violation_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(':violation_id' => $violation_id));
            
            foreach ($keywords as $keyword) {
                $keyword = trim($keyword);
                if (!empty($keyword)) {
                    $query = "INSERT INTO Violation_word (VW_Word, Vio_ID) VALUES (:keyword, :violation_id)";
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute(array(':keyword' => $keyword, ':violation_id' => $violation_id));
                }
            }
            
            $this->conn->commit();
        }
        

        public function getALlMail(){
            $query = "SELECT * FROM Mail";
            $sql = $this->conn->prepare($query);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getALlFeedback(){
            $query = "SELECT * FROM Feedbacks";
            $sql = $this->conn->prepare($query);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function addCustomer($Username, $Password, $Email, $Fullname, $PhoneNumber, $DOB, $Image, $Topic, $Content, $Event){
            $this->conn->beginTransaction();

            $query = "INSERT INTO Customer (Cus_Username, Cus_Password, Cus_Email, Cus_Fullname, Cus_PhoneNumber, Cus_DOB, Cus_Image) VALUES  (:username, :password, :email, :fullname, :phonenumber, :dob, :image)";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username' => $Username, ':password' => $Password,  ':email' => $Email, ':fullname' => $Fullname, ':phonenumber' => $PhoneNumber, ':dob' => $DOB, ':image' => $Image));

            $Cus_id = $this->conn->lastInsertId();

            $queryEvent = "INSERT INTO Cus_Topic (Cus_ID, Topic_ID) VALUES (:cus_id, :topic_id)";
            $sqlEvent = $this->conn->prepare($queryEvent);
            
            foreach ($Topic as $topic_id) {
                $sqlEvent->execute(array(':cus_id' => $Cus_id, ':topic_id' => $topic_id));
            }

            $queryContent = "INSERT INTO Cus_Content (Cus_ID, Content_ID) VALUES (:cus_id, :content_id)";
            $sqlContent = $this->conn->prepare($queryContent);
            
            foreach ($Content as $content_id) {
                $sqlContent->execute(array(':cus_id' => $Cus_id, ':content_id' => $content_id));
            }

            $queryEvent = "INSERT INTO Cus_Event (Cus_ID, Event_ID) VALUES (:cus_id, :event_id)";
            $sqlEvent = $this->conn->prepare($queryEvent);
            
            foreach ($Event as $event_id) {
                $sqlEvent->execute(array(':cus_id' => $Cus_id, ':event_id' => $event_id));
            }

            $this->conn->commit();
        }

        public function getAllCustomer(){
            $query = "SELECT * FROM Customer";
            $sql = $this->conn->query($query);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getCustomerByID($cus_id) {
            $query = "SELECT * FROM Customer WHERE Cus_ID = :cus_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':cus_id' => $cus_id));
            $customer = $sql->fetch(PDO::FETCH_ASSOC);
        
            if ($customer) {
                // Lấy Topic Name
                $topicQuery = "SELECT t.Topic_Name FROM Cus_Topic ct 
                               JOIN Topic t ON ct.Topic_ID = t.Topic_ID 
                               WHERE ct.Cus_ID = :id";
                $topicSql = $this->conn->prepare($topicQuery);
                $topicSql->execute(array(':id' => $cus_id));
                $topics = $topicSql->fetchAll(PDO::FETCH_COLUMN);
        
                // Lấy Content Name
                $contentQuery = "SELECT c.Content_Name FROM Cus_Content cc 
                                 JOIN Content c ON cc.Content_ID = c.Content_ID 
                                 WHERE cc.Cus_ID = :id";
                $contentSql = $this->conn->prepare($contentQuery);
                $contentSql->execute(array(':id' => $cus_id));
                $contents = $contentSql->fetchAll(PDO::FETCH_COLUMN);
        
                // Lấy Event Name
                $eventQuery = "SELECT e.Event_Name FROM Cus_Event ce 
                               JOIN Event e ON ce.Event_ID = e.Event_ID 
                               WHERE ce.Cus_ID = :id";
                $eventSql = $this->conn->prepare($eventQuery);
                $eventSql->execute(array(':id' => $cus_id));
                $events = $eventSql->fetchAll(PDO::FETCH_COLUMN);
        
                $customer['Topics'] = $topics;
                $customer['Contents'] = $contents;
                $customer['Events'] = $events;
            }
        
            return $customer;
        }
        
        public function editCustomer($cus_id, $Username, $Password, $Email, $Fullname, $PhoneNumber, $DOB, $Image, $Topic, $Content, $Event){
            $this->conn->beginTransaction();

            $query = "UPDATE Customer SET Cus_Username = :username, Cus_Password = :password, Cus_Email = :email, Cus_Fullname = :fullname, Cus_PhoneNumber = :phonenumber, Cus_DOB = :dob, Cus_Image =  :image WHERE Cus_ID = :cus_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username' => $Username, ':password' => $Password,  ':email' => $Email, ':fullname' => $Fullname, ':phonenumber' =>  $PhoneNumber, ':dob' => $DOB, ':image' => $Image, ':cus_id' => $cus_id));

            $deleteTopicQuery = "DELETE FROM Cus_Topic WHERE Cus_ID = :cus_id";
            $sqlDeleteTopic = $this->conn->prepare($deleteTopicQuery);
            $sqlDeleteTopic->execute(array(':cus_id' => $cus_id));

            $deleteContentQuery = "DELETE FROM Cus_Content WHERE Cus_ID = :cus_id";
            $sqlDeleteContent = $this->conn->prepare($deleteContentQuery);
            $sqlDeleteContent->execute(array(':cus_id' => $cus_id));
        
            $deleteEventQuery = "DELETE FROM Cus_Event WHERE Cus_ID = :cus_id";
            $sqlDeleteEvent = $this->conn->prepare($deleteEventQuery);
            $sqlDeleteEvent->execute(array(':cus_id' => $cus_id));

            $queryTopic = "INSERT INTO Cus_Topic (Cus_ID, Topic_ID) VALUES (:cus_id, :topic_id)";
            $queryTopic = $this->conn->prepare($queryTopic);
            
            foreach ($Topic as $topic_id) {
                $queryTopic->execute(array(':cus_id' => $cus_id, ':topic_id' => $topic_id));
            }
        
            // Thêm các liên kết mới
            $queryContent = "INSERT INTO Cus_Content (Cus_ID, Content_ID) VALUES (:cus_id, :content_id)";
            $sqlContent = $this->conn->prepare($queryContent);
            
            foreach ($Content as $content_id) {
                $sqlContent->execute(array(':cus_id' => $cus_id, ':content_id' => $content_id));
            }
        
            $queryEvent = "INSERT INTO Cus_Event (Cus_ID, Event_ID) VALUES (:cus_id, :event_id)";
            $sqlEvent = $this->conn->prepare($queryEvent);
            
            foreach ($Event as $event_id) {
                $sqlEvent->execute(array(':cus_id' => $cus_id, ':event_id' => $event_id));
            }
        
            $this->conn->commit();
        }

        public function getEventsByCusId($cus_id) {
            $query = "SELECT Event_ID FROM Cus_Event WHERE Cus_ID = :cus_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':cus_id' => $cus_id));
            return $sql->fetchAll(PDO::FETCH_COLUMN);
        }

        public function getContentsByCusId($cus_id) {
            $query = "SELECT Content_ID FROM Cus_Content WHERE Cus_ID = :cus_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':cus_id' => $cus_id));
            return $sql->fetchAll(PDO::FETCH_COLUMN);
        }

        public function getTopicssByCusId($cus_id) {
            $query = "SELECT Topic_ID FROM Cus_Topic WHERE Cus_ID = :cus_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':cus_id' => $cus_id));
            return $sql->fetchAll(PDO::FETCH_COLUMN);
        }

        public function deleteCus($cus_id){
            $query = "DELETE FROM Customer WHERE Cus_ID = :cus_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':cus_id' => $cus_id));
        }

        public function GetCustomerbyName($username){
            $query = 'SELECT * from Customer where Customer.Cus_Username like :username;';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username' => '%' . $username . '%'));
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function AddInfluencer($Username, $Password, $Email, $Fullname, $DOB, $PhoneNumber, $Address, $Nickname, $Hastag, $Price, $Image, $OtherImage, $Achievement, $Biography, $InfluType_ID, $Wplace_ID, $Fol_ID, $Gender_ID, $Facebook, $Tiktok, $Instagram, $Topic) {
            $this->conn->beginTransaction();
            $query = 'INSERT INTO Influencer (Influ_Username, Influ_Password, Influ_Email, Influ_Fullname, Influ_DOB, Influ_PhoneNumber, Influ_Address, Influ_Nickname, Influ_Hastag, Influ_Price, Influ_Image, Influ_OtherImage, Influ_Achivement, Influ_Biography, Influ_Status, InfluType_ID, WPlace_ID, Fol_ID, Gender_ID) 
                      VALUES (:username, :password, :email, :fullname, :dob, :phonenumber, :address, :nickname, :hashtag, :price, :image, :otherImages, :achievement, :biography, :status, :influTypeID, :wplaceID, :folID, :genderID)';
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':username' => $Username, 
                ':password' => $Password, 
                ':email' => $Email, 
                ':fullname' => $Fullname,
                ':dob' => $DOB,
                ':phonenumber' => $PhoneNumber, 
                ':address' => $Address, 
                ':nickname' => $Nickname, 
                ':hashtag' => $Hastag, 
                ':price' => $Price, 
                ':image' => $Image, 
                ':otherImages' => is_array($OtherImage) ? implode(',', $OtherImage) : $OtherImage, 
                ':achievement' => $Achievement, 
                ':biography' => $Biography,
                ':status'  => 'Active',
                ':influTypeID' => $InfluType_ID, 
                ':wplaceID' => $Wplace_ID, 
                ':folID' => $Fol_ID, 
                ':genderID' => $Gender_ID
            ));
        
            $Influ_ID = $this->conn->lastInsertId();
        
            // Thêm các mạng xã hội
            if ($Facebook) {
                $fbQuery = 'INSERT INTO Facebook (FB_Link, Influ_ID) VALUES (:fb_link, :influ_ID)';
                $fbStmt = $this->conn->prepare($fbQuery);
                $fbStmt->execute(array(':fb_link' => $Facebook, ':influ_ID' => $Influ_ID));
            }
        
            if ($Tiktok) {
                $TTQuery = 'INSERT INTO Tiktok (TT_Link, Influ_ID) VALUES (:tt_link, :influ_ID)';
                $ttStmt = $this->conn->prepare($TTQuery);
                $ttStmt->execute(array(':tt_link' => $Tiktok, ':influ_ID' => $Influ_ID));
            }
        
            if ($Instagram) {
                $InsQuery = 'INSERT INTO Instagram (Ins_Link, Influ_ID) VALUES (:ins_link, :influ_ID)';
                $insStmt = $this->conn->prepare($InsQuery);
                $insStmt->execute(array(':ins_link' => $Instagram, ':influ_ID' => $Influ_ID));
            }
        
            // Xử lý các chủ đề
            $queryTopic = "INSERT INTO Influ_Topic (Influ_ID, Topic_ID) VALUES (:influ_id, :topic_id)";
            $sqlTopic = $this->conn->prepare($queryTopic);
            
            if (is_array($Topic)) {
                foreach ($Topic as $topic_id) {
                    $sqlTopic->execute(array(':influ_id' => $Influ_ID, ':topic_id' => $topic_id));
                }
            }
        
            $this->conn->commit();
        }

        

        public function getAllInfluType(){
            $query = 'SELECT * FROM Influencer_Type';
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getInfluencerTypeByID($id){
            $query = 'SELECT * FROM Influencer_Type WHERE InfluType_ID = :id';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllGender(){
            $query = 'SELECT * FROM Gender';
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getGenderByID($id){
            $query = 'SELECT * FROM Gender WHERE Gender_ID = :id';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllWorkplace(){
            $query = 'SELECT * FROM Workplace';
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getWorkplaceByID($id){
            $query = 'SELECT * FROM Workplace WHERE WPlace_ID = :id';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllFollowers(){
            $query = 'SELECT * FROM Followers';
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getFollowersByID($id){
            $query = 'SELECT * FROM Followers WHERE Fol_ID = :id';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllInfluencer(){
            $query = 'SELECT * FROM Influencer JOIN Influencer_Type ON Influencer.InfluType_ID = Influencer_Type.InfluType_ID';
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllInfluencerByType($type_id){
            $query = 'SELECT Influencer.*, Influencer_Type.InfluType_Name 
                      FROM Influencer 
                      INNER JOIN Influencer_Type ON Influencer.InfluType_ID = Influencer_Type.InfluType_ID
                      WHERE Influencer.InfluType_ID = :type_id';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':type_id' => $type_id));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getInfluencerByUsername($username){
            $query = 'SELECT Influencer.* ,Influencer_Type.InfluType_Name 
                      FROM Influencer INNER Join Influencer_Type ON Influencer.InfluType_ID = Influencer_Type.InfluType_ID WHERE Influencer.Influ_Username LIKE :username;';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username' => '%' . $username . '%'));
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getInfluencerByID($influ_id) {
            // Lấy thông tin influencer cơ bản
            $query = 'SELECT Influencer.* ,
                        Influencer_Type.InfluType_Name,
                        Workplace.WPlace_Name,
                        Gender.Gender_Name,
                        Followers.Fol_Quantity
                        FROM Influencer 
                        INNER JOIN Influencer_Type ON Influencer.InfluType_ID = Influencer_Type.InfluType_ID
                        INNER JOIN Workplace ON Influencer.WPlace_ID = Workplace.WPlace_ID
                        INNER JOIN Gender ON Influencer.Gender_ID = Gender.Gender_ID
                        INNER JOIN  Followers ON Influencer.Fol_ID = Followers.Fol_ID
                        WHERE Influ_ID = :id';
        
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $influ_id));
            $influencer = $sql->fetch(PDO::FETCH_ASSOC);
        
            // Nếu có influencer, thì lấy thêm các topics của họ
            if ($influencer) {
                // Lấy danh sách topics
                $topicQuery = "SELECT t.Topic_Name 
                                FROM Influ_Topic it 
                                JOIN Topic t ON it.Topic_ID = t.Topic_ID 
                                WHERE it.Influ_ID = :id";
                $topicSql = $this->conn->prepare($topicQuery);
                $topicSql->execute(array(':id' => $influ_id));
                $topics = $topicSql->fetchAll(PDO::FETCH_COLUMN);
                $influencer['Topics'] = $topics;
        
                // Lấy link Facebook nếu có
                $fbQuery = "SELECT FB_Link FROM Facebook WHERE Influ_ID = :id";
                $fbSql = $this->conn->prepare($fbQuery);
                $fbSql->execute(array(':id' => $influ_id));
                $facebook = $fbSql->fetch(PDO::FETCH_COLUMN);
                if ($facebook) {
                    $influencer['FB_Link'] = $facebook;
                }
        
                // Lấy link Tiktok nếu có
                $ttQuery = "SELECT TT_Link FROM Tiktok WHERE Influ_ID = :id";
                $ttSql = $this->conn->prepare($ttQuery);
                $ttSql->execute(array(':id' => $influ_id));
                $tiktok = $ttSql->fetch(PDO::FETCH_COLUMN);
                if ($tiktok) {
                    $influencer['TT_Link'] = $tiktok;
                }
        
                // Lấy link Instagram nếu có
                $insQuery = "SELECT Ins_Link FROM Instagram WHERE Influ_ID = :id";
                $insSql = $this->conn->prepare($insQuery);
                $insSql->execute(array(':id' => $influ_id));
                $instagram = $insSql->fetch(PDO::FETCH_COLUMN);
                if ($instagram) {
                    $influencer['Ins_Link'] = $instagram;
                }
        
            } else {
                // Nếu không tìm thấy influencer, gán mảng trống cho Topics và Links
                $influencer['Topics'] = [];
                $influencer['FB_Link'] = null;
                $influencer['TT_Link'] = null;
                $influencer['Ins_Link'] = null;
            }
        
            return $influencer;
        }
        
        public function editInfluencer($influ_id, $Username, $Password, $Email, $Fullname, $DOB, $PhoneNumber, $Address, $Nickname, $Hastag, $Price, $Image, $OtherImage, $Achievement, $Biography, $InfluType_ID, $Wplace_ID, $Fol_ID, $Gender_ID, $Facebook, $Tiktok, $Instagram, $Topic){
            $this->conn->beginTransaction();
            
            // Cập nhật bảng Influencer
            $sql = "UPDATE Influencer SET Influ_Username = :username, Influ_Password = :password, Influ_Email = :email, Influ_Fullname = :fullname, Influ_DOB = :dob, Influ_PhoneNumber = :phonenumber, Influ_Address = :address, Influ_Nickname = :nickname, Influ_Hastag = :hastag, Influ_Price = :price, Influ_Image = :image, Influ_OtherImage = :otherimage, Influ_Achivement = :achievement, Influ_Biography = :biography, InfluType_ID = :influTypeID, WPlace_ID = :wplaceID, Fol_ID = :folID, Gender_ID = :genderID WHERE Influ_ID = :influ_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array(
                ':username' => $Username, 
                ':password' => $Password, 
                ':email' => $Email, 
                ':fullname' => $Fullname,
                ':dob' => $DOB,
                ':phonenumber' => $PhoneNumber, 
                ':address' => $Address, 
                ':nickname' => $Nickname, 
                ':hastag' => $Hastag, 
                ':price' => $Price, 
                ':image' => $Image, 
                ':otherimage' => is_array($OtherImage) ? implode(',', $OtherImage) : $OtherImage, 
                ':achievement' => $Achievement, 
                ':biography' => $Biography, 
                ':influTypeID' => $InfluType_ID, 
                ':wplaceID' => $Wplace_ID, 
                ':folID' => $Fol_ID, 
                ':genderID' => $Gender_ID,
                ':influ_id' => $influ_id
            ));
            
            // Cập nhật bảng Facebook
            $fbQuery = 'REPLACE INTO Facebook (FB_Link, Influ_ID) VALUES (:fb_link, :influ_ID)';
            $fbStmt = $this->conn->prepare($fbQuery);
            $fbStmt->execute(array(':fb_link' => $Facebook, ':influ_ID' => $influ_id));
        
            // Cập nhật bảng Tiktok
            $ttQuery = 'REPLACE INTO Tiktok (TT_Link, Influ_ID) VALUES (:tt_link, :influ_ID)';
            $ttStmt = $this->conn->prepare($ttQuery);
            $ttStmt->execute(array(':tt_link' => $Tiktok, ':influ_ID' => $influ_id));
        
            // Cập nhật bảng Instagram
            $insQuery = 'REPLACE INTO Instagram (Ins_Link, Influ_ID) VALUES (:ins_link, :influ_ID)';
            $insStmt = $this->conn->prepare($insQuery);
            $insStmt->execute(array(':ins_link' => $Instagram, ':influ_ID' => $influ_id));
        
            // Cập nhật các chủ đề
            $deleteTopicQuery = "DELETE FROM Influ_Topic WHERE Influ_ID = :influ_id";
            $sqlDeleteTopic = $this->conn->prepare($deleteTopicQuery);
            $sqlDeleteTopic->execute(array(':influ_id' => $influ_id));
        
            $queryTopic = "INSERT INTO Influ_Topic (Influ_ID, Topic_ID) VALUES (:influ_id, :topic_id)";
            $sqlTopic = $this->conn->prepare($queryTopic);
            
            foreach ($Topic as $topic_id) {
                $sqlTopic->execute(array(':influ_id' => $influ_id, ':topic_id' => $topic_id));
            }
        
            $this->conn->commit();
        }        
        

        public function getTopicsByInfluId($influ_id) {
            $query = "SELECT Topic_ID FROM Influ_Topic WHERE Influ_ID = :influ_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':influ_id' => $influ_id));
            return $sql->fetchAll(PDO::FETCH_COLUMN);
        }

        public function getTopicsByCusId($cus_id) {
            $query = "SELECT Topic_ID FROM Cus_Topic WHERE Cus_ID = :cus_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':cus_id' => $cus_id));
            return $sql->fetchAll(PDO::FETCH_COLUMN);
        }

        public function deleteInflu($influ_id){
            $query = "DELETE FROM Influencer WHERE Influ_ID = :influ_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':influ_id' => $influ_id));
        }

        public function getInfluAccountPending(){
            $query = "SELECT * FROM Influencer JOIN Influencer_Type ON Influencer.InfluType_ID = Influencer_Type.InfluType_ID WHERE Influ_Status = 'Pending'";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function changeStatusAccount($influencerId, $newStatus){
            $query = "UPDATE Influencer SET Influ_Status = :status WHERE Influ_ID = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':status' => $newStatus,
                ':id' => $influencerId
            ]);
        }

        public function GetAllArticle(){
            $query = "SELECT * FROM Post Join Influencer ON Post.Influ_ID = Influencer.Influ_ID";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function GetArticleByID($post_id){
            $query = "SELECT * FROM Post Join Influencer ON Post.Influ_ID = Influencer.Influ_ID WHERE Post.Post_ID = :post_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':post_id' => $post_id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function AddCommentToPost($Com_Detail, $Post_id, $Ad_ID){
            $query = "INSERT INTO Comment(Post_ID, Com_Detail, Ad_ID) VALUES (:post_id, :com_detail, :ad_id)";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(
                ':post_id' => $Post_id,
                ':com_detail' => $Com_Detail,
                ':ad_id' => $Ad_ID
            ));
            return $this->conn->lastInsertId();
        }

        public function UpdatePostStatus($post_id, $status) {
            $query = "UPDATE Post SET Post_Status = :status WHERE Post_ID = :post_id";
            $sql = $this->conn->prepare($query);
            $sql->execute([':status' => $status, ':post_id' => $post_id]);
        }

        public function UpdatePostCommentID($post_id, $com_id) {
            $query = "UPDATE Post SET Com_ID = :com_id WHERE Post_ID = :post_id";
            $sql = $this->conn->prepare($query);
            $sql->execute([':com_id' => $com_id, ':post_id' => $post_id]);
        }

        public function getAllBooking(){
            $query = "SELECT * FROM Booking
                    Join Customer  on Booking.Cus_ID = Customer.Cus_ID
                    Join Influencer on Booking.Influ_ID = Influencer.Influ_ID
                    Join Topic  on Booking.Topic_ID = Topic.Topic_ID
                    Join Invoice on Booking.Inv_ID = Invoice.Inv_ID";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>