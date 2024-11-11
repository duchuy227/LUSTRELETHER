<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./views/Img/u2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/Layout/homepage.css">
    <title>Contact Us</title>
</head>
<style>
    .contact {
        padding: 20px;
        background-color: #fff;
        margin-bottom: 50px;
        border-radius: 30px;
    }

    .contact-header {
        color: #FF7588;
        font-weight: 500;
        font-size: 30px;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .card {
        width: 444px;
        height: 133px;
        border: 1px solid #DEDCDC;
        border-radius: 8px;
        display: flex;
        padding: 10px 20px;
        background-color: #fff;
        margin-right: auto;
        margin-bottom: 30px;
    }
    
    .card-body {
        margin-top: 10px;
    }
    
    .icon-frame {
        background-color: #FF7588;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
        width: 55px;
        height: 55px;
        border-radius: 10px;
    }
    
    .icon-frame i {
        font-size: 24px;
        color: #fff;
    }
    
    .text-frame {
        flex-grow: 1;
        text-align: left; /* Đảm bảo text căn từ bên trái */
        display: flex; /* Thiết lập display flex */
        flex-direction: column; /* Đặt chiều hướng của flex là cột */
        height: 100%; /* Đặt chiều cao bằng 100% để chiếm toàn bộ card */
    }
    
    .text-frame h5 {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }
    
    .text-frame p {
        margin: 0;
        font-size: 14px;
        color: #333;
    }
    
    .contact-form {
        padding-left: 20px;
    }

    .contact-form form .mb-3 input {
        margin-bottom: 30px;
    }
    
    .contact-form .btn {
        background-color: #FF7588;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        width: 300px;
        height: 40px;
        margin-top: 10px;
    }
    
    
</style>
<body>
    <?php include 'Layout/homepage_navbar.php'?>
    
    <div class="container">
        <?php include 'Layout/homepage_header.php'?>

        <div class="contact">
            <h2 class="contact-header">Contact Us</h2>
            <div class="row mb-4">
                <div class="col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.2202452403258!2d105.78785887467961!3d21.023871680624175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b329f68977%3A0x6ddf5ff1e829fc56!2zxJDhuqFpIEjhu41jIEdyZWVud2ljaCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1728303491123!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <br>
            <div class="row d-flex">
                <div class="col-md-5">
                    <div class="d-flex flex-column align-items-start">
                        <div class="card mb-3">
                            <div class="card-body d-flex">
                                <div class="icon-frame">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="text-frame">
                                    <h5>Phone</h5>
                                    <p>Toll-free: 000 - 123 - 456789</p>
                                    <p>Fax: 098 - 765 - 4321</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card mb-3">
                            <div class="card-body d-flex">
                                <div class="icon-frame">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="text-frame">
                                    <h5>Email</h5>
                                    <p>lustrelether@gmail.com<br>support@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card mb-3">
                            <div class="card-body d-flex">
                                <div class="icon-frame">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="text-frame">
                                    <h5>Address</h5>
                                    <p>2 P. Phạm Văn Bạch, Dịch Vọng,<br>Cầu Giấy, Hà Nội, Việt Nam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 contact-form">
                    <h3 style="margin-bottom: 20px; font-size: 25px; color: #333333c5">
                        Contact Form
                    </h3>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'Layout/homepage_footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>