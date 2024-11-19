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
                    <h3>1. General Terms</h3>
                    <p>When registering and using our website's services, you agree to comply with the terms and conditions below. These terms apply to both influencer users and customers who need to hire services.</p>
        
                    <h3>2. User Rights and Responsibilities</h3>
                    <p><strong>Influencers:</strong> When participating, you need to provide accurate personal information and update your profile regularly. You are responsible for ensuring that the content shared on your profile does not violate the law, including copyrighted content, hate speech, or inappropriate information.</p>
                    <p><strong>Customers:</strong> When using the service to hire influencers, you need to comply with the payment and contract regulations. You are not allowed to ask influencers to perform content that violates the law or negatively affects their image.</p>
        
                    <h3>3. Service Cancellation Policy</h3>
                    <p>Influencers have the right to refuse requests if the content is not suitable for their personal brand or contrary to the regulations of the website.</p>

                    <h3>4. Content Violation</h3>
                    <p><strong>Inappropriate content: </strong> Posts or activities related to inappropriate content, including vulgar language, inflammatory speech, or sharing harmful information, will be warned or removed from the platform.</p>
                    <p><strong>Copyright infringement: </strong> Any content that uses copyrighted works (images, videos, music) without permission may be removed immediately without prior notice.</p>
        
                    <h3>5. Privacy Policy</h3>
                    <p>We are committed to protecting users' personal information and only using data for service operation purposes, not sharing with third parties without the user's consent.</p>

                    <h3>6. Payment Regulations</h3>
                    <p>All payment transactions between customers and influencers must go through the website's system. We are not responsible for any transactions that take place outside the platform.</p>

                    <h3>7. Modifications to Terms</h3>
                    <p>We reserve the right to change or modify these terms at any time without prior notice. It is the user's responsibility to review and update the latest terms regularly.</p>
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