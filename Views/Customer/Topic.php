<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="././views/Layout/homepage.css?v=2.0">
    <title>All Topic</title>
</head>
<style>
    .card-viral img {
        aspect-ratio: 16 / 9;
        width: 211px;
        height: 242px;
        object-fit: cover;
        transition: transform 0.3s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .card-viral img:hover {
        transform: scale(1.05);
    }

    .popup {
        display: none; /* Ẩn popup */
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Hiệu ứng mờ */
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    /* Nội dung của popup */
    .popup-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 20px;
        width: 450px;
        height: auto;
        text-align: center;
        position: relative;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .popup-content h2 {
        font-size: 28px;
        font-weight: 700;
        color: #EE0C0C;
    }

    /* Biểu tượng cảnh báo */
    .warning-icon {
        margin-bottom: 10px;
        
    }

    /* Nút trong popup */
    .popup-buttons {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .btn1 {
        padding: 5px 10px;
        width: 110px;
        height: 40px;
        border: none;
        border-radius: 20px;
        font-weight: bold;
        cursor: pointer;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .cancel-btn {
        background-color: gray;
        color: white;
    }

    .login-btn {
        background-color: purple;
        color: white;
    }

    .btn-booking {
        background-color: #F0564A;
        width: 206px;
        height: 47px;
        font-size: 20px;
        text-transform: uppercase;
        font-weight: 700;
        color: white;
        border-radius: 20px;
        border: none;
        margin-bottom: 40px;
    }

    .btn-booking:hover {
        background-color: #F0564A;
        color: white;
    }

    .card-large {
    width: 240px; 
    height: 340px;
    overflow: hidden;
}

    
</style>
<body>
    <?php include 'navbar.php'?>
    
    <div class="container">
        <?php include '././views/Layout/homepage_header.php'?>

        
        <?php foreach ($topics as $topicID => $topic): ?>
            <div class="influencer-viral text-center">
                <h1 class="d-flex justify-content-center"><?php echo $topic['Topic_Name']; ?></h1>
                <div class="row justify-content-center">
                    <?php if (!empty($topic['Influencers'])): ?>
                        <?php foreach (array_slice($topic['Influencers'], 0, 4) as $influencer): ?>
                            <div class="col-md-3 mb-4">
                                <div class="card-viral">
                                    <a href="index.php?action=customer_influencerDetail&id=<?php echo $influencer['Influ_ID']; ?>">
                                        <img class="card-img-top" src="<?php echo $influencer['Influ_Image']; ?>" alt="Influencer Image">
                                    </a>
                                    <div class="card-body-viral">
                                        <h5 class="card-title-viral"><?php echo $influencer['Influ_Nickname']; ?></h5>
                                        <p class="card-text-viral"><?php echo $influencer['Fol_Quantity']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No influencers available for this topic.</p>
                    <?php endif; ?>
                </div>
                <div class="row d-flex justify-content-center">
                    <a href="index.php?action=customer_eachtopic&id=<?php echo $topicID; ?>">
                        <button class="btn-booking">See More</button>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>

        
    </div>

    <?php include '././views/Layout/homepage_footer.php'?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    
</body>
</html>