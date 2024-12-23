<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Detail Invoice</title>
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #d0e7ff;
        color: #333;
        padding-top: 85px;
    }

    .navbar {
        background-color: #fff;
        height: 85px;
        position: fixed; /* Cố định navbar */
        top: 0; /* Đặt nó ở vị trí trên cùng của trang */
        left: 0;
        right: 0;
        z-index: 1000; /* Đảm bảo navbar nằm trên các phần tử khác */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-brand {
        font-weight: bold;
        color: #333;
        font-size: 30px;
    }
    
    .navbar-nav {
        display: flex;
        gap: 30px; /* Điều chỉnh khoảng cách giữa các nav-item */
    }
    
    .navbar-nav .nav-link {
        color: #333;
        font-size: 22px;
        font-weight: 400;
        text-align: center;
        margin-left: 30px;
    }


    .sidebar {
        background-color: #ffffff;
        height: calc(100vh - 85px);
        width: 300px;
        position: fixed; /* Đặt sidebar ở vị trí cố định */
        top: 85px; /* Đặt dưới navbar */
        left: 0; /* Căn ở bên trái */
        padding-top: 20px;
        box-shadow: 10px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 999; /* Đảm bảo sidebar nằm trên các phần tử khác */
    }
    .sidebar a {
        color: #6c757d;
        text-decoration: none;
        display: block;
        padding: 10px 10px;
        font-size: 18px;
        margin-top: 20px;
        font-weight: 500;
    }

    .sidebar h4 {
        font-size: 30px;
        font-weight: bold;
        opacity: 25%;
        margin-bottom: 40px;
        margin-top: 20px;
        color: #333;
    }

    .sidebar a {
        position: relative;
        color: #333;
        text-decoration: none;
        overflow: hidden;
        border-radius: 30px;
        transition: color 0.3s ease;
    }

    .sidebar a:hover {
        background-color: #d3d9de;
        color: #000;
        border-radius: 30px;
    }

    .sidebar a::before {
        content: "";
        position: absolute;
        top: 0;
        left: 100%; /* Để lớp nền bắt đầu từ bên phải */
        width: 100%;
        height: 100%;
        background-color: #d3d9de; /* Màu nền khi hover */
        transition: left 0.3s ease; /* Tạo hiệu ứng di chuyển từ bên phải vào */
        z-index: -1; /* Để lớp nền ở dưới nội dung */
    }

    .sidebar a:hover::before {
        left: 0; /* Di chuyển lớp nền vào vị trí */
    }

    
    .profile-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        margin-top: 30px;
        width: 95%;
    }
    
    .col-md-9 h2 {
        font-weight: bold;
        margin-top: 30px;
    }

    .col-md-9 h4 {
        font-weight: 600;
        margin-top: 20px;
    }

    .label {
        font-size: 18px;
        color: #333;
        font-weight: 500;
    }

    .content {
        font-size: 18px;
        color: #333;
        font-weight: 400;
    }

    .btn-success {
        justify-content: space-between;
        align-items: center;
        width: 200px;
        border-radius: 25px;
        border: none;
        font-size: 18px;
        height: 40px;
    }
        
</style>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
        <?php include_once 'sidebar.php'; ?>
            <div class="col-md-9 offset-md-3">
                <h2>Detail</h2>
                <div class="profile-container">
                    <h4>Invoice Detail</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 35%">
                                    <label class="label">Booking</label>
                                </div>
                                <div class="col-md-6" style="width: 60%">
                                    <label class="content">
                                        <?php echo $invoiceDetails['Booking_Content']; ?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 35%">
                                    <label class="label">Beneficiary</label>
                                </div>
                                <div class="col-md-6" style="width: 60%">
                                    <label class="content">
                                        <?php echo $invoiceDetails['Influ_Fullname']; ?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 35%">
                                    <label class="label">Payment</label>
                                </div>
                                <div class="col-md-6" style="width: 60%">
                                    <label class="content">
                                        <?php 
                                            if (!empty($invoiceDetails['method'])) {
                                                echo $invoiceDetails['method']; 
                                            }
                                        ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Total Days</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php 
                                            $totalDays = $invoiceDetails['Booking_TotalDay'];
                                            echo number_format($totalDays) . ($totalDays == 1 ? ' day' : ' days');
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Total Amount</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php echo number_format($invoiceDetails['Inv_TotalAmount'])?> VND
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Amount (VAT)</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php echo number_format($invoiceDetails['Inv_VATamount'])?> VND
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    <h4>
                        <?php 
                            if (!empty($invoiceDetails['method'])) {
                                echo $invoiceDetails['method']; 
                            } 
                        ?> Transaction Detail
                    </h4>
                    <?php if (!empty($invoiceDetails['MT_ID'])): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 35%">
                                    <label class="label">Partner Code</label>
                                </div>
                                <div class="col-md-6" style="width: 60%">
                                    <label class="content">
                                        <?php echo $invoiceDetails['MT_PartnerCode']; ?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 35%">
                                    <label class="label">Order Info</label>
                                </div>
                                <div class="col-md-6" style="width: 60%">
                                    <label class="content">
                                        <?php echo $invoiceDetails['MT_OrderInfo']; ?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 35%">
                                    <label class="label">Request ID</label>
                                </div>
                                <div class="col-md-6" style="width: 60%">
                                    <label class="content">
                                        <?php echo $invoiceDetails['MT_RequestID']; ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Amount</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php echo number_format($invoiceDetails['MT_Ammount'])?> VND
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Order ID</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php echo $invoiceDetails['MT_OrderID']?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Trans ID</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php echo $invoiceDetails['MT_TransID'] ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($invoiceDetails['VNPay_ID'])): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 35%">
                                    <label class="label">Pay Date</label>
                                </div>
                                <div class="col-md-6" style="width: 60%">
                                    <label class="content">
                                    <?php
                                        // Xử lý PayDate để chuyển đổi định dạng từ YYYYMMDDHHMMSS thành YYYY MM DD HH:MM:SS
                                        $payDate = $invoiceDetails['VNP_PayDate'];  // Ví dụ: 20241112220318
                                        $formattedPayDate = substr($payDate, 0, 4) . ' ' . substr($payDate, 4, 2) . ' ' . substr($payDate, 6, 2) . ' ' . substr($payDate, 8, 2) . ':' . substr($payDate, 10, 2) . ':' . substr($payDate, 12, 2);
                                        echo $formattedPayDate;
                                    ?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 35%">
                                    <label class="label">Order Info</label>
                                </div>
                                <div class="col-md-6" style="width: 60%">
                                    <label class="content">
                                    <?php 
                                        // Xử lý OrderInfo để thay thế dấu "+" bằng khoảng trắng
                                        $orderInfo = str_replace('+', ' ', $invoiceDetails['VNP_OrderInfo']);
                                        echo $orderInfo;
                                    ?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 35%">
                                    <label class="label">Trans No</label>
                                </div>
                                <div class="col-md-6" style="width: 60%">
                                    <label class="content">
                                        <?php echo $invoiceDetails['VNP_TransactionNo']; ?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6" style="width: 35%">
                                    <label class="label">TxnRef</label>
                                </div>
                                <div class="col-md-6" style="width: 60%">
                                    <label class="content">
                                        <?php echo $invoiceDetails['VNP_TxnRef']; ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Amount</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php echo number_format($invoiceDetails['VNP_Amount'])?> VND
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Bank Code</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php echo $invoiceDetails['VNP_BankCode']?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Card Type</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php echo $invoiceDetails['VNP_CardType'] ?>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="label">Bank TransNo</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="content">
                                        <?php echo $invoiceDetails['VNP_BankTranNo'] ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>


                    <div class="d-flex justify-content-center mt-4">
                        <a href="index.php?action=customer_payment">
                            <button type="button" class="btn btn-success">List Invoice</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</body>
</html>