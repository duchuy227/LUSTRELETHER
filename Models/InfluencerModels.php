<?php 
    require_once 'Config/db.php';

    class InfluencerModels {
        private $conn;

        public function __construct()
        {
            global $conn;
            $this->conn = $conn;
        }

        public function InfluLogin($Username, $Password, $Influ_Type) {
            // Sửa tên cột trong JOIN để phù hợp với cấu trúc bảng
            $query = "SELECT * FROM Influencer 
                      JOIN Influencer_Type ON Influencer.InfluType_ID = Influencer_Type.InfluType_ID 
                      WHERE Influencer.Influ_Username = :username 
                      AND Influencer.Influ_Password = :password 
                      AND Influencer.InfluType_ID = :influType";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':username' => $Username,
                ':password' => $Password,
                ':influType' => $Influ_Type
            ]);
        
            // Kiểm tra kết quả
            if ($stmt->rowCount() > 0) {
                $influencer = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($influencer['Influ_Status'] === 'Pending') {
                    return 'pending';
                } elseif  ($influencer['Influ_Status'] === 'Rejected') {
                    return 'rejected';
                } elseif ($influencer['Influ_Status'] === 'Active') {
                    // Lưu thông tin vào session
                    $_SESSION['is_login'] = true;
                    $_SESSION['influ_id'] = $influencer['Influ_ID'];
                    $_SESSION['influencer_username'] = $Username;
                    return true;
                }
            } else {
                return false; // Đăng nhập thất bại
            }
        }
        
        public function getInfluencerbyUsername($username){
            $query = "SELECT Influencer.*, Influencer_Type.InfluType_Name FROM Influencer
            INNER JOIN Influencer_Type ON Influencer.InfluType_ID = Influencer_Type.InfluType_ID
            WHERE Influencer.Influ_Username = :username;";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username'=> $username));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getInfluencerProfile($influ_id){
            $query = 'SELECT Influencer.*,
                    Influencer_Type.InfluType_Name,
                    Workplace.WPlace_Name,
                    Gender.Gender_Name,
                    Followers.Fol_Quantity
                    FROM Influencer 
                    INNER JOIN Influencer_Type ON Influencer.InfluType_ID = Influencer_Type.InfluType_ID
                    INNER JOIN Workplace ON Influencer.WPlace_ID = Workplace.WPlace_ID
                    INNER JOIN Gender ON Influencer.Gender_ID = Gender.Gender_ID
                    INNER JOIN Followers ON Influencer.Fol_ID = Followers.Fol_ID
                    WHERE Influ_ID = :id';
            
            $sql = $this->conn->prepare($query);
            $sql->execute([':id' => $influ_id]);
            $influencer = $sql->fetch(PDO::FETCH_ASSOC);

            // Nếu tìm thấy influencer, lấy thêm các thông tin bổ sung
            if ($influencer) {
                // Lấy danh sách topics của influencer
                $topicQuery = "SELECT t.Topic_Name 
                            FROM Influ_Topic it 
                            JOIN Topic t ON it.Topic_ID = t.Topic_ID 
                            WHERE it.Influ_ID = :id";
                $topicSql = $this->conn->prepare($topicQuery);
                $topicSql->execute([':id' => $influ_id]);
                $influencer['Topics'] = $topicSql->fetchAll(PDO::FETCH_COLUMN);

                // Lấy các liên kết mạng xã hội của influencer
                $socialQueries = [
                    'FB_Link' => "SELECT FB_Link FROM Facebook WHERE Influ_ID = :id",
                    'TT_Link' => "SELECT TT_Link FROM Tiktok WHERE Influ_ID = :id",
                    'Ins_Link' => "SELECT Ins_Link FROM Instagram WHERE Influ_ID = :id"
                ];

                foreach ($socialQueries as $key => $query) {
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute([':id' => $influ_id]);
                    $influencer[$key] = $stmt->fetch(PDO::FETCH_COLUMN) ?: null; // Gán giá trị null nếu không có kết quả
                }
            } else {
                // Nếu không tìm thấy influencer, trả về một mảng trống
                $influencer = [
                    'Topics' => [],
                    'FB_Link' => null,
                    'TT_Link' => null,
                    'Ins_Link' => null
                ];
            }

            return $influencer;
        }

        public function EditProfileInflu($influ_id, $Username, $Password, $Email, $Fullname, $DOB, $PhoneNumber, $Address, $Nickname, $Hastag, $Price, $Image, $OtherImage, $Achievement, $Biography, $InfluType_ID, $Wplace_ID, $Fol_ID, $Gender_ID, $Facebook, $Tiktok, $Instagram, $Topic){
            $this->conn->beginTransaction();

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
            if (!empty($Facebook)) {
                $fbQuery = 'REPLACE INTO Facebook (FB_Link, Influ_ID) VALUES (:fb_link, :influ_ID)';
                $fbStmt = $this->conn->prepare($fbQuery);
                $fbStmt->execute(array(':fb_link' => $Facebook, ':influ_ID' => $influ_id));
            } else {
                $deleteFbQuery = 'DELETE FROM Facebook WHERE Influ_ID = :influ_ID';
                $deleteFbStmt = $this->conn->prepare($deleteFbQuery);
                $deleteFbStmt->execute(array(':influ_ID' => $influ_id));
            }
            
            // Cập nhật bảng Tiktok
            if (!empty($Tiktok)) {
                $ttQuery = 'REPLACE INTO Tiktok (TT_Link, Influ_ID) VALUES (:tt_link, :influ_ID)';
                $ttStmt = $this->conn->prepare($ttQuery);
                $ttStmt->execute(array(':tt_link' => $Tiktok, ':influ_ID' => $influ_id));
            } else {
                $deleteTtQuery = 'DELETE FROM Tiktok WHERE Influ_ID = :influ_ID';
                $deleteTtStmt = $this->conn->prepare($deleteTtQuery);
                $deleteTtStmt->execute(array(':influ_ID' => $influ_id));
            }
            
            // Cập nhật bảng Instagram
            if (!empty($Instagram)) {
                $insQuery = 'REPLACE INTO Instagram (Ins_Link, Influ_ID) VALUES (:ins_link, :influ_ID)';
                $insStmt = $this->conn->prepare($insQuery);
                $insStmt->execute(array(':ins_link' => $Instagram, ':influ_ID' => $influ_id));
            } else {
                $deleteInsQuery = 'DELETE FROM Instagram WHERE Influ_ID = :influ_ID';
                $deleteInsStmt = $this->conn->prepare($deleteInsQuery);
                $deleteInsStmt->execute(array(':influ_ID' => $influ_id));
            }
        
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

        public function InfluencerRegister($Username, $Password, $Email, $Fullname, $DOB, $PhoneNumber, $Address, $Nickname, $Hastag, $Price, $Image, $CCCD_Image, $Achievement, $Biography, $InfluType_ID, $Wplace_ID, $Fol_ID, $Gender_ID, $Facebook, $Tiktok, $Instagram, $Topic) {
            $this->conn->beginTransaction();
            $query = 'INSERT INTO Influencer (Influ_Username, Influ_Password, Influ_Email, Influ_Fullname, Influ_DOB, Influ_PhoneNumber, Influ_Address, Influ_Nickname, Influ_Hastag, Influ_Price, Influ_Image, Influ_ImageAuth, Influ_Achivement, Influ_Biography, Influ_Status, InfluType_ID, WPlace_ID, Fol_ID, Gender_ID) 
                      VALUES (:username, :password, :email, :fullname, :dob, :phonenumber, :address, :nickname, :hashtag, :price, :image, :cccd_image, :achievement, :biography, :status, :influTypeID, :wplaceID, :folID, :genderID)';
            
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
                ':cccd_image'  => $CCCD_Image, 
                ':achievement' => $Achievement, 
                ':biography' => $Biography,
                ':status'  => 'Pending',
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

        public function AddArticle($influ_id, $Title, $Time, $Hastag, $Content, $Image, $Video){
            $query = "INSERT INTO Post (Influ_ID, Post_Title, Post_CreateTime, Post_Hastag, Post_Content, Post_Status, Post_Image, Post_Video) VALUES (:influ_id, :title, :creattime, :hastag, :content,  :status, :image, :video)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':influ_id' => $influ_id, 
                ':title'  => $Title, 
                ':creattime' => $Time, 
                ':hastag' => $Hastag, 
                ':content' => $Content, 
                ':status' => 'Pending', 
                ':image' =>  is_array($Image) ? implode(',', $Image) : $Image, 
                ':video' => $Video
            ));
        }

        public function getAllArticle($influ_id){
            $query = "SELECT * FROM Post WHERE Influ_ID = :influ_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(':influ_id' => $influ_id));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllArticleCurrent($influ_id){
            $query = "SELECT * FROM Post WHERE Influ_ID = :influ_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(':influ_id' => $influ_id));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getArticlebyID($influ_id, $post_id){
            $query = "SELECT * FROM Post WHERE Influ_ID = :influ_id AND Post_ID = :post_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(':influ_id' => $influ_id, ':post_id' => $post_id));
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function updateArticle($influ_id, $Title, $Time, $Hastag, $Content, $Status, $Image, $Video,  $post_id){
            $sql = "UPDATE Post SET Post_Title = :title, Post_CreateTime = :createtime, Post_Hastag = :hastag, Post_Content = :content, Post_Status = :status, Post_Image = :image, Post_Video = :video WHERE Influ_ID = :influ_id AND Post_ID = :post_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array(
                ':influ_id' => $influ_id,
                ':title' => $Title,
                ':createtime' => $Time,
                ':hastag' => $Hastag,
                ':content' => $Content,
                ':status' => $Status,
                ':image' => is_array($Image) ? implode(',', $Image) : $Image,
                ':video' => $Video,
                ':post_id' => $post_id
            ));

        }

        public function  deleteArticle($influ_id, $post_id){
            $sql = "DELETE FROM Post WHERE Influ_ID = :influ_id AND Post_ID = :post_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array(':influ_id' => $influ_id, ':post_id' => $post_id));

        }

        public function getViolationWords() {
            $sql = "SELECT v.Vio_ID, v.Vio_Name, vw.VW_Word 
                    FROM Violation v 
                    JOIN Violation_word vw ON v.Vio_ID = vw.Vio_ID";
            $stmt = $this ->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function checkForViolations($title, $hashtag, $content, $violationWords) {
            $violations = [];
        
            foreach ($violationWords as $wordData) {
                $vioId = $wordData['Vio_ID'];
                $vioName = $wordData['Vio_Name'];
                $vioWord = $wordData['VW_Word'];
        
                // Kiểm tra từ vi phạm có trong tiêu đề, hashtag hoặc nội dung
                if (stripos($title, $vioWord) !== false || stripos($hashtag, $vioWord) !== false || stripos($content, $vioWord) !== false) {
                    // Nếu vi phạm chưa có trong danh sách, thêm vào
                    if (!isset($violations[$vioId])) {
                        $violations[$vioId] = [
                            'Vio_Name' => $vioName,
                            'Vio_Words' => []
                        ];
                    }
                    // Thêm từ vi phạm vào danh sách
                    $violations[$vioId]['Vio_Words'][] = $vioWord;
                }
            }
        
            return $violations;
        }

        public function getAllBookingInflu($influ_id){
            $query = "SELECT * FROM Booking
                    Join Customer  on Booking.Cus_ID = Customer.Cus_ID
                    JOIN Topic  t ON Booking.Topic_ID = t.Topic_ID
                    WHERE Influ_ID = :influ_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':influ_id' => $influ_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        

        public function getBookingDetail($influ_id, $booking_id){
            $query = "SELECT * FROM Booking
                    Join Customer  on Booking.Cus_ID = Customer.Cus_ID
                    JOIN Topic  t ON Booking.Topic_ID = t.Topic_ID
                    WHERE Influ_ID = :influ_id AND Booking_ID = :booking_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':influ_id' => $influ_id, ':booking_id' => $booking_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function UpdateBookingStatus($status, $note, $booking_id) {
            $query = "UPDATE Booking SET Booking_Status = :status, Booking_Note = :note WHERE Booking_ID = :booking_id";
            $sql = $this->conn->prepare($query);
            $sql->execute([':status' => $status, ':note' => $note, ':booking_id' => $booking_id]);
        }

        public function TimeLine($influ_id) {
            // Cập nhật câu truy vấn để bao gồm các trạng thái 'In Progress' và 'Completed'
            $query = "SELECT * FROM Booking WHERE Booking_Status IN ('In Progress', 'Completed') AND Influ_ID = :influ_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':influ_id' => $influ_id
            ]);
            $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            $timeline = [];
            foreach ($bookings as $booking) {
                $start = new DateTime($booking['Booking_StartDate']);
                $end = new DateTime($booking['Booking_EndDate']);
                while ($start <= $end) {
                    $date = $start->format('Y-m-d');
                    $timeline[] = [
                        'Date' => $date,
                        'Booking_Content' => $booking['Booking_Content'],
                        'Booking_Status' => $booking['Booking_Status'],
                        'Booking_ID' => $booking['Booking_ID']
                    ];
                    $start->modify('+1 day');
                }
            }
            return $timeline;
        }
        
        public function UpdateTimelineStatus($status, $booking_id) {
            $query = "UPDATE Booking SET Booking_Status = :status WHERE Booking_ID = :booking_id";
            $sql = $this->conn->prepare($query);
            $sql->execute([':status' => $status, ':booking_id' => $booking_id]);
        }

        public function CreateInvoiceForBooking($booking_id, $booking_expense) {
            $query = "INSERT INTO Invoice (Inv_TotalAmount, Inv_VATamount, Inv_Status, Booking_ID, MT_ID, VNPay_ID) 
                    VALUES (:total_amount, :vat_amount, 'Unpaid', :booking_id, NULL, NULL)";
                    
            $stmt = $this->conn->prepare($query);
            $vat_amount = $booking_expense * 1.15; // Tính 15% VAT
            $stmt->execute([
                ':total_amount' => $booking_expense,
                ':vat_amount' => $vat_amount,
                ':booking_id' => $booking_id
            ]);

            return $this->conn->lastInsertId();
        }

        public function UpdateBookingWithInvoiceId($booking_id, $inv_id) {
            $query = "UPDATE Booking SET Inv_ID = :inv_id WHERE Booking_ID = :booking_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':inv_id' => $inv_id,
                ':booking_id' => $booking_id
            ]);
        }

        public function getAllInvoiceByInflu($influ_id){
            $query = "SELECT Invoice.*, Booking.Booking_Content, Customer.Cus_Fullname
                        FROM Invoice
                        INNER JOIN Booking ON Invoice.Booking_ID = Booking.Booking_ID
                        INNER JOIN Customer ON Booking.Cus_ID = Customer.Cus_ID
                        WHERE Booking.Influ_ID = :influ_id;";
            $sql = $this->conn->prepare($query);
            $sql->execute([':influ_id' => $influ_id]);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>