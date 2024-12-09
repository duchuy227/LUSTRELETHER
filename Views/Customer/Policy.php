<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="././views/Layout/homepage.css">
    <title>Policy</title>
</head>
<style>
    .privacy-policy-container {
        background-color: #fff;
        border-radius: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 100%;
        height: 614px;
        padding: 20px;
        margin-bottom: 30px;
        margin-left: 30px;
    }
    
    .privacy-title {
        font-size: 30px;
        color: #FF7588;
        text-align: center;
        font-weight: 500;
        margin-bottom: 15px;
    }
    
    .privacy-content {
        background-color: #ffffff;
        padding: 15px;
        border-radius: 8px;
        max-height: 500px; /* Set maximum height for the scrollable area */
        overflow-y: auto; /* Enable vertical scrolling */
    }
    
    .scroll-content h3 {
        font-size: 22px;
        color: #333;
        font-weight: 500;
        margin-top: 15px;
        margin-bottom: 5px;
    }
    
    .scroll-content p {
        font-size: 18px;
        color: #555;
        font-weight: 300;
        line-height: 1.6;
    }
</style>
<body>
    <?php include 'navbar.php'?>
    
    <div class="container">
        <?php include '././views/Layout/homepage_header.php'?>
        
        <div class="privacy-policy-container" >
            <h2 class="privacy-title">Privacy Policy</h2>
            <div class="privacy-content">
                <div class="scroll-content">
                    <h3>Customer Policy</h3>
                    <p>
                        1. Customers are committed to providing accurate and transparent information when booking Influencers, and are responsible for respecting the rights, personal image, and creative content of Influencers. In addition, customers are not allowed to ask Influencers to promote content that violates ethics or harms the community, including unsafe products, false information, or sensitive content.
                        <br>
                        <br>
                        2.  All transactions and contracts between customers and Influencers must comply with current legal regulations. Customers are not allowed to use the platform to perform illegal acts, including but not limited to distributing illegal content, fraud, or copyright infringement. At the same time, payments must be made through the platform's official channels, ensuring transparency and compliance with regulations.
                        <br>
                        <br>
                        3.  Customers are committed to maintaining a civilized and respectful communication environment when interacting with Influencers, not engaging in any acts of harassment, discrimination, or damage to their personal reputation. Reviews and feedback must be based on real experiences, and false information must not be used to cause negative effects.
                    </p>
                </div>
            </div>
        </div>
        
    </div>

    <?php include '././views/Layout/homepage_footer.php'?>


    <script>
        const privacyContent = document.querySelector('.privacy-content');

        privacyContent.addEventListener('scroll', () => {
            const { scrollTop, scrollHeight, clientHeight } = privacyContent;
            if (scrollTop + clientHeight >= scrollHeight) {
                console.log('You have reached the end of the privacy policy.');
            }
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>