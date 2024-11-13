<?php 
    require_once 'Config/db.php';

    class CustomerModels {
        private $conn;

        public function __construct()
        {
            global $conn;
            $this->conn = $conn;
        }

        public function CusLogin($Username, $Password){
            $query = "SELECT *  FROM Customer WHERE Cus_Username = '$Username' AND  Cus_Password = '$Password'";
            $sql =  $this->conn->prepare($query);
            $sql->execute(array(":username" => $Username, ":password" => $Password));
            
            if ($sql->rowCount() > 0) {
                $influencer = $sql->fetch(PDO::FETCH_ASSOC);
                // Lưu thông tin vào session
                $_SESSION['is_login'] = true;
                $_SESSION['cus_id'] = $influencer['Cus_ID']; // Lưu Influ_ID vào session
                $_SESSION['cus_username'] = $Username;
                return true;
            } else {
                return false; // Đăng nhập thất bại
            }
        }

        public function CusRegister($Username, $Password, $Email, $Fullname, $PhoneNumber, $DOB, $Topic, $Content, $Event){
            $this->conn->beginTransaction();

            $query = "INSERT INTO Customer (Cus_Username, Cus_Password, Cus_Email, Cus_Fullname, Cus_PhoneNumber, Cus_DOB) VALUES  (:username, :password, :email, :fullname, :phonenumber, :dob)";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username' => $Username, ':password' => $Password,  ':email' => $Email, ':fullname' => $Fullname, ':phonenumber' => $PhoneNumber, ':dob' => $DOB));

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


        public function GetCustomerbyID($cus_id){
            $query = "SELECT * FROM Customer WHERE Cus_ID = '$cus_id'";
            $sql =  $this->conn->prepare($query);
            $sql->execute(array(":id" => $cus_id));
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

        public function updateCusProfile($cus_id, $Username, $Email, $Fullname, $PhoneNumber, $DOB, $Image, $Topic, $Content, $Event){
            $this->conn->beginTransaction();

            $query = "UPDATE Customer SET Cus_Username = :username, Cus_Email = :email, Cus_Fullname = :fullname, Cus_PhoneNumber = :phonenumber, Cus_DOB = :dob, Cus_Image =  :image WHERE Cus_ID = :cus_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username' => $Username, ':email' => $Email, ':fullname' => $Fullname, ':phonenumber' =>  $PhoneNumber, ':dob' => $DOB, ':image' => $Image, ':cus_id' => $cus_id));

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

        public function changePassword($cus_id, $newPassword){
            $query = "UPDATE Customer SET Cus_Password = :password WHERE Cus_ID = :cus_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':password' => $newPassword, ':cus_id' => $cus_id));
        }

        public function getTopicssByCusId($cus_id) {
            $query = "
                SELECT t.Topic_ID, t.Topic_Name, t.Topic_Image 
                FROM Cus_Topic ct
                JOIN Topic t ON ct.Topic_ID = t.Topic_ID
                WHERE ct.Cus_ID = :cus_id
            ";
            $sql = $this->conn->prepare($query);
            $sql->execute([':cus_id' => $cus_id]);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getMostInfluentialEventByCustomer($cus_id) {
            $query = "
                SELECT e.Event_ID, e.Event_Name, COUNT(it.Influ_ID) AS influencer_count
                FROM Event e
                JOIN Cus_Event ce ON e.Event_ID = ce.Event_ID
                JOIN Topic_Event te ON e.Event_ID = te.Event_ID
                JOIN Influ_Topic it ON te.Topic_ID = it.Topic_ID
                WHERE ce.Cus_ID = :cus_id
                GROUP BY e.Event_ID, e.Event_Name
                ORDER BY influencer_count DESC
                LIMIT 1;
            ";
        
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':cus_id' => $cus_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        
        public function getInfluencersByEvent($event_id) {
            $query = "
                SELECT i.Influ_ID, i.Influ_Address, i.Influ_Image, i.Influ_Nickname
                FROM Influencer i
                JOIN Influ_Topic it ON i.Influ_ID = it.Influ_ID
                JOIN Topic_Event te ON it.Topic_ID = te.Topic_ID
                WHERE te.Event_ID = :event_id;
            ";
        
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':event_id' => $event_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getMostInfluentialContentByCustomer($cus_id) {
            $query = "
                SELECT c.Content_ID, c.Content_Name, COUNT(it.Influ_ID) AS influencer_count
                FROM Content c
                JOIN Cus_Content cc ON c.Content_ID = cc.Content_ID
                JOIN Topic_Content tc ON c.Content_ID = tc.Content_ID
                JOIN Influ_Topic it ON tc.Topic_ID = it.Topic_ID
                WHERE cc.Cus_ID = :cus_id
                GROUP BY c.Content_ID, c.Content_Name
                ORDER BY influencer_count DESC
                LIMIT 1;
            ";
        
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':cus_id' => $cus_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getInfluencersByContent($content_id) {
            $query = "
                SELECT i.Influ_ID, i.Influ_Address, i.Influ_Image, i.Influ_Nickname
                FROM Influencer i
                JOIN Influ_Topic it ON i.Influ_ID = it.Influ_ID
                JOIN Topic_Content tc ON it.Topic_ID = tc.Topic_ID
                WHERE tc.Content_ID = :content_id;
            ";
        
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':content_id' => $content_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllInfluencer(){
            $query = 'SELECT * FROM Influencer 
                    JOIN Influencer_Type ON Influencer.InfluType_ID = Influencer_Type.InfluType_ID
                    JOIN Workplace ON Influencer.WPlace_ID = Workplace.WPlace_ID
                    JOIN Gender ON Influencer.Gender_ID = Gender.Gender_ID
                    INNER JOIN  Followers ON Influencer.Fol_ID = Followers.Fol_ID';
                    
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getTopicsByInfluId($influ_id) {
            $query = "SELECT t.Topic_ID, t.Topic_Name FROM Influ_Topic it 
                    JOIN Topic t ON it.Topic_ID = t.Topic_ID
                    WHERE it.Influ_ID = :influ_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':influ_id' => $influ_id));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getContentByInfluencer($influ_id) {
            $query = "SELECT DISTINCT c.* 
                    FROM Content c
                    JOIN Topic_Content tc ON c.Content_ID = tc.Content_ID
                    JOIN Influ_Topic it ON tc.Topic_ID = it.Topic_ID
                    WHERE it.Influ_ID = :influ_id";
                    
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':influ_id' => $influ_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        

        public function getEventByInfluencer($influ_id) {
            $query = "SELECT DISTINCT e.* 
                    FROM Event e
                    JOIN Topic_Event te ON e.Event_ID = te.Event_ID
                    JOIN Influ_Topic it ON te.Topic_ID = it.Topic_ID
                    WHERE it.Influ_ID = :influ_id";
                    
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':influ_id' => $influ_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getArticlebyID($influ_id) {
            $query = "SELECT * FROM Post
                    JOIN Influencer ON Post.Influ_ID = Influencer.Influ_ID
                    WHERE Post.Influ_ID = :influ_id";          
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

        public function createBooking($CreateTime, $TotalDay, $ServiceName, $StartDate, $EndDate, $Expense, $Topic_ID, $Cus_ID, $Influ_ID) {
            // Chuyển đổi ngày tháng sang định dạng đúng (YYYY-MM-DD)
            $startDateFormatted = DateTime::createFromFormat('j M Y', $StartDate)->format('Y-m-d');
            $endDateFormatted = DateTime::createFromFormat('j M Y', $EndDate)->format('Y-m-d');
        
            // Chuẩn bị câu lệnh SQL
            $query = 'INSERT INTO Booking (Booking_CreateTime, Booking_TotalDay, Booking_Content, Booking_StartDate, Booking_EndDate, Booking_Status, Booking_Expense, Topic_ID, Cus_ID, Influ_ID) VALUES (:createtime, :totalday, :content, :startdate, :enddate, :status, :expense, :topic_id, :cus_id, :influ_id)';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(
                ':createtime' => $CreateTime,
                ':totalday' => $TotalDay,
                ':content' => $ServiceName,
                ':startdate' => $startDateFormatted,
                ':enddate' => $endDateFormatted,
                ':status' => 'Pending',
                ':expense' => $Expense,
                ':topic_id' => $Topic_ID,
                ':cus_id' => $Cus_ID,
                ':influ_id' => $Influ_ID
            ));
        }
        
        public function GetBookedDate($influ_id) {
            $query = "
                SELECT Booking_StartDate, Booking_EndDate 
                FROM Booking 
                WHERE Influ_ID = :influ_id AND (Booking_Status = 'Pending' OR Booking_Status = 'Accepted')
            ";
        
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':influ_id', $influ_id, PDO::PARAM_INT);
            $stmt->execute();
            $bookedDates = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            // Mảng để lưu các ngày đã đặt với định dạng 'YYYY-MM-DD'
            $formattedDates = [];
        
            foreach ($bookedDates as $booking) {
                $start = new DateTime($booking['Booking_StartDate']);
                $end = new DateTime($booking['Booking_EndDate']);
        
                // Lấy tất cả các ngày từ start đến end và thêm vào mảng với định dạng 'YYYY-MM-DD'
                while ($start <= $end) {
                    $formattedDates[] = $start->format('Y-m-d');
                    $start->modify('+1 day'); // Tăng lên 1 ngày
                }
            }
        
            return $formattedDates;
        }

        public function checkBookingConflict($startDate, $endDate, $influencerId, $booking_id = null) {
            // Chuyển đổi ngày sang định dạng Y-m-d H:i:s để kiểm tra
            $startDateFormatted = DateTime::createFromFormat('j M Y', $startDate);
            $endDateFormatted = DateTime::createFromFormat('j M Y', $endDate);
        
            // Kiểm tra nếu $startDateFormatted hoặc $endDateFormatted không hợp lệ
            if (!$startDateFormatted || !$endDateFormatted) {
                throw new Exception("Invalid date format. Please provide the date in 'Y-m-d H:i:s' format.");
            }
        
            // Format lại ngày để sử dụng trong câu truy vấn SQL
            $startDateFormatted = $startDateFormatted->format('Y-m-d');
            $endDateFormatted = $endDateFormatted->format('Y-m-d');
        
            // Truy vấn CSDL để kiểm tra xem có booking nào trùng trong khoảng thời gian này
            $query = 'SELECT * FROM Booking WHERE Influ_ID = :influ_id AND (
                (Booking_StartDate BETWEEN :start_date AND :end_date) OR 
                (Booking_EndDate BETWEEN :start_date AND :end_date) OR 
                (:start_date BETWEEN Booking_StartDate AND Booking_EndDate) OR 
                (:end_date BETWEEN Booking_StartDate AND Booking_EndDate)
              )';
            
            // Nếu có booking_id (khi chỉnh sửa), loại bỏ booking hiện tại của khách hàng
            if ($booking_id) {
                $query .= ' AND booking_id != :booking_id';
            }
        
            $sql = $this->conn->prepare($query);
            $params = [
                ':influ_id' => $influencerId,
                ':start_date' => $startDateFormatted,
                ':end_date' => $endDateFormatted,
            ];
            if ($booking_id) {
                $params[':booking_id'] = $booking_id;
            }
            $sql->execute($params);
        
            // Kiểm tra xem có kết quả nào không (nếu có tức là đã có người đặt)
            return $sql->rowCount() > 0;
        }
        
        
        
        public function getInfluencerPrice($influ_id) {
            $query = 'SELECT Influ_Price FROM Influencer WHERE Influ_ID = :influ_id';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':influ_id' => $influ_id));
            return $sql->fetchColumn();
        }

        public function getContentsByTopicId($topic_id) {
            $query = "SELECT c.Content_ID, c.Content_Name 
                      FROM Content c
                      JOIN Topic_Content tc ON c.Content_ID = tc.Content_ID
                      WHERE tc.Topic_ID = :topic_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':topic_id' => $topic_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getEventsByTopicId($topic_id) {
            $query = "SELECT e.Event_ID, e.Event_Name 
                      FROM Event e
                      JOIN Topic_Event te ON e.Event_ID = te.Event_ID
                      WHERE te.Topic_ID = :topic_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':topic_id' => $topic_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getAllBookingCurrentCus($cus_id){
            $query = "SELECT * FROM Booking
                    JOIN Influencer  i ON Booking.Influ_ID = i.Influ_ID
                    JOIN Topic  t ON Booking.Topic_ID = t.Topic_ID
                    WHERE Cus_ID = :cus_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':cus_id' => $cus_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getBookingbyID($cus_id, $booking_id){
            $query = "SELECT * FROM Booking
            JOIN Influencer  i ON Booking.Influ_ID = i.Influ_ID
            JOIN Topic  t ON Booking.Topic_ID = t.Topic_ID
            WHERE Cus_ID = :cus_id AND Booking_ID = :booking_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':cus_id' => $cus_id, ':booking_id' => $booking_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function editBooking($CreateTime, $TotalDay, $ServiceName, $StartDate, $EndDate, $Status, $Expense, $Topic_ID, $booking_id){
            $startDateFormatted = DateTime::createFromFormat('j M Y', $StartDate)->format('Y-m-d');
            $endDateFormatted = DateTime::createFromFormat('j M Y', $EndDate)->format('Y-m-d');

            $query = "UPDATE Booking SET Booking_CreateTime = :createtime, Booking_TotalDay = :totalday, Booking_Content = :content, Booking_StartDate = :startdate, Booking_EndDate = :enddate, Booking_Status = :status, Booking_Expense = :expense, Topic_ID = :topic_id WHERE  Booking_ID = :booking_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':createtime' => $CreateTime, 
                ':totalday' => $TotalDay, 
                ':content' => $ServiceName, 
                ':startdate' => $startDateFormatted, 
                ':enddate' => $endDateFormatted,
                ':status' => $Status, 
                ':expense' => $Expense, 
                ':topic_id' => $Topic_ID,
                ':booking_id' => $booking_id
            ]);
        }

        public function deleteBooking($id){
            $query = "DELETE FROM Booking WHERE Booking_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
        }

        public function GetAllInvoiceByCurrentCus($cus_id){
            $query = "SELECT Invoice.*, Booking.Booking_Content, Influencer.Influ_Fullname
                        FROM Invoice
                        INNER JOIN Booking ON Invoice.Booking_ID = Booking.Booking_ID
                        INNER JOIN Influencer ON Booking.Influ_ID = Influencer.Influ_ID
                        WHERE Booking.Cus_ID = :cus_id;";
            $sql = $this->conn->prepare($query);
            $sql->execute([':cus_id' => $cus_id]);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function GetInfoInvoiceByCusID($cus_id, $inv_id){
            $query = "SELECT * FROM Invoice 
                        INNER JOIN Booking ON Invoice.Booking_ID = Booking.Booking_ID
                        INNER JOIN Influencer ON Booking.Influ_ID = Influencer.Influ_ID
                        WHERE Booking.Cus_ID = :cus_id AND Invoice.Inv_ID = :inv_id";
            $sql = $this->conn->prepare($query);
            $sql->execute([':cus_id' => $cus_id, ':inv_id' => $inv_id]);
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getInvoiceBookingInfluencerInfo($invId) {
            // Truy vấn để lấy thông tin từ bảng invoice, booking và influencer
            $sql = "
                SELECT 
                    invoice.Inv_VATamount, 
                    booking.Booking_Content, 
                    influencer.Influ_Fullname
                FROM 
                    invoice
                INNER JOIN 
                    booking ON invoice.Booking_ID = booking.Booking_ID
                INNER JOIN 
                    influencer ON booking.Influ_ID = influencer.Influ_ID
                WHERE 
                    invoice.Inv_ID = :invId
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':invId', $invId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function saveVNPayPayment($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TMNCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash, $inv_id){
            $query = "INSERT INTO VNPay_Transaction (VNP_Amount, VNP_BankCode, VNP_BankTranNo, VNP_CardType, VNP_OrderInfo, VNP_PayDate, VNP_Respond_code, VNP_TMNCode, VNP_TransactionNo, VNP_TransactionStatus, VNP_TxnRef, VNP_SecureHash, Inv_ID) 
                      VALUES(:vnp_amount, :vnp_bank_code, :vnp_bank_tranno, :vnp_card_type, :vnp_order_info, :vnp_pay_date, :vnp_response_code, :vnp_tmn_code, :vnp_transaction_no, :vnp_transaction_status, :vnp_txn_ref, :vnp_secure_hash, :inv_id)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':vnp_amount' => $vnp_Amount,
                ':vnp_bank_code' => $vnp_BankCode,
                ':vnp_bank_tranno' => $vnp_BankTranNo,
                ':vnp_card_type' => $vnp_CardType,
                ':vnp_order_info' => $vnp_OrderInfo,
                ':vnp_pay_date' => $vnp_PayDate,
                ':vnp_response_code' => $vnp_ResponseCode,
                ':vnp_tmn_code' => $vnp_TMNCode,
                ':vnp_transaction_no' => $vnp_TransactionNo,
                ':vnp_transaction_status' => $vnp_TransactionStatus,
                ':vnp_txn_ref' => $vnp_TxnRef,
                ':vnp_secure_hash' => $vnp_SecureHash,
                ':inv_id' => $inv_id // Thêm phần này để truyền Inv_ID
            ));
        
            return $this->conn->lastInsertId();
        }
        

        public function UpdateInvoiceVnpayID($vnpay_id, $inv_id) {
            $query = "UPDATE Invoice SET VNPay_ID = :vnpay_id, Inv_Status = 'Paid' WHERE Inv_ID = :inv_id";
            $sql = $this->conn->prepare($query);
            $sql->execute([':vnpay_id' => $vnpay_id, ':inv_id' => $inv_id]);
        }

        public function saveMomoPayment($partnerCode, $orderId, $requestId, $amount, $orderInfo, $orderType, $transId, $payType, $signature, $inv_id){
            $query = "INSERT INTO Momo_Transaction (MT_PartnerCode, MT_OrderID, MT_RequestID, MT_Ammount, MT_OrderInfo, MT_OrderType, MT_TransID, MT_PayType, MT_Signature, Inv_ID) VALUES (:partnerCode, :orderId, :requestId, :amount, :orderInfo, :orderType, :transId, :payType, :signature, :inv_id)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':partnerCode' => $partnerCode,
                ':orderId' => $orderId,
                ':requestId' => $requestId,
                ':amount' => $amount,
                ':orderInfo' => $orderInfo,
                ':orderType' => $orderType,
                ':transId' => $transId,
                ':payType' => $payType,
                ':signature' => $signature,
                ':inv_id' => $inv_id
            ));
            return $this->conn->lastInsertId();
        }

        public function UpdateInvoiceMomoID($momo_id, $inv_id) {
            $query = "UPDATE Invoice SET MT_ID = :mt_id, Inv_Status = 'Paid' WHERE Inv_ID = :inv_id";
            $sql = $this->conn->prepare($query);
            $sql->execute([':mt_id' => $momo_id, ':inv_id' => $inv_id]);
        }


        public function getTransactionDetailsByInvoiceID($inv_id){
            $query = "SELECT MT_ID, VNPay_ID From Invoice WHERE Inv_ID = :inv_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':inv_id' => $inv_id]);
            $invoice = $st->fetch(PDO::FETCH_ASSOC);
        }

    }
?>