<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="././views/Img/u2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="././views/Layout/homepage.css?v=1.0">
    <title>All Influencer</title>
</head>
<style>
    .sidebar {
        background-color: #ffffff;
        height: calc(100vh - 85px);
        max-width: 100%;
        position: fixed;
        top: 85px;
        left: 0;
        padding: 15px;
        box-shadow: 10px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 999;
        overflow-y: auto;
        
    }

    .filter-section {
        padding: 20px;
        margin-right: 20px;
    }

    .filter-section h5 {
        color: #7D7B7B;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .filter-section label {
        display: block;
        margin-bottom: 10px;
        font-size: 16px;
        font-weight: 500;
        color: #545252;
    }

    .filter-section input[type="checkbox"] {
        margin-right: 10px;
        width: 20px;
        height: 20px;
        border: 2px solid #7D7B7B;
        cursor: pointer;
    }

    .filter-section  input[type="checkbox"]:checked {
        background-color: #7D7B7B;
    }

        /* Tạo dấu chấm bên trong khi checkbox được chọn */
    .filter-section  input[type="checkbox"]:checked::before {
        content: "✔";
        color: #fff;
        font-size: 16px;
        line-height: 1;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        }
    
    .col-md-9 h2 {
        font-weight: bold;
        margin-top: 30px;
        margin-left: 20px;
    }
    
    .dropdown {
        border-radius: 20px;
        padding: 5px 15px;
        border: 1px solid #D7D7D7;
        width: 150px;
        margin-left: 20px;
        font-weight: 500;
        color: #646363;
    }

    .inputBx {
        position: relative;
        width: 223px;
        height: 39px;
        background: #FFFFFF;
        border-radius: 10px;
        display: flex;
        align-items: center;
        padding-left: 10px;
        gap: 10px;
        overflow: hidden;
        margin-right: 20px;
    }

    .inputBx input {
        position: relative;
        width: 100%;
        height: 25px;
        outline: none;
        border: none;
        background: transparent;
        margin-right: 10px;
        font-size: 1.2em;
        color: #000;
    }

    .inputBx input::placeholder {
        color: #8C7E7E;
        font-size: 18px;
        font-weight: 400;
    }

    .card-viral {
        width: 200px;
        height: 330px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 20px auto;
        background-color: #fff;
    }
    .card-viral img {
        width: 211px;
        height: 222px;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .card-viral img:hover {
        transform: scale(1.05);
    }

    .card-body-viral {
        margin-top: 5px;
        padding: 10px;
        text-align: left;
    }
    .card-title-viral {
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 5px;
        color: #333333c8;
    }
    .card-text-viral {
        font-size: 15px;
        color: #333333c8;
        font-weight: 500;
    }

    .btn-booking {
        width: 100px;
        background-color: #F0564A;
        color: #fff;
        border-radius: 20px;
        font-size: 18px;
        font-weight: 500;
        margin-right: 20px;
        border: none;
    }

    .btn-filter {
        width: 100px;
        background-color: #7D7B7B;
        color: #fff;
        border-radius: 5px;
        font-size: 18px;
        font-weight: 500;
        margin-right: 20px;
        border: none;
    }
    
</style>
<body>
    <?php include 'navbar.php'?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <div class="filter-section">
                    <h5>Gender</h5>
                    <?php 
                    $selected_genders = isset($_POST['gender_ids']) ? $_POST['gender_ids'] : [];
                    ?>
                    <form method="post">
                        <?php foreach ($gender as $g):  ?>
                        <label for="gender<?php echo $g['Gender_ID']; ?>">
                            <input required class="form-check-input" type="checkbox" id="gender<?php echo $g['Gender_ID']; ?>" name="gender_ids[]"  value="<?php echo $g['Gender_ID']; ?>" <?php echo in_array($g['Gender_ID'], $selected_genders) ? 'checked' : ''; ?>>
                            <?php echo $g['Gender_Name']; ?>
                        </label>
                        <?php endforeach; ?>

                        <button type="submit" class="btn-filter">Filter</button>
                    </form>
                    
                    <br>
                    <h5>Topic</h5>
                    <?php 
                    $selected_topics = isset($_POST['topic_ids']) ? $_POST['topic_ids'] : [];
                    ?>
                    <form method="post">
                        <?php foreach ($topics as $topic):  ?>
                        <label class="form-check-label" for="topic<?php echo $topic['Topic_ID']; ?>">
                            <input required class="form-check-input" type="checkbox" id="topic<?php echo $topic['Topic_ID']; ?>" name="topic_ids[]" value="<?php echo $topic['Topic_ID']; ?>" <?php echo in_array($topic['Topic_ID'], $selected_topics) ? 'checked' : ''; ?>>
                            <?php echo $topic['Topic_Name']; ?>
                        </label>
                        <?php endforeach; ?>
                        <button type="submit" class="btn-filter">Filter</button>
                    </form>
                    
                    <br>
                    <h5>Event</h5>
                    <form method="post">
                        <?php 
                        // Lấy danh sách đã chọn (giữ trạng thái checked)
                        $selected_events = isset($_POST['event_ids']) ? $_POST['event_ids'] : [];
                        ?>
                        <?php foreach ($events as $event): ?>
                            <label class="form-check-label" for="event<?php echo $event['Event_ID']; ?>">
                                <input required class="form-check-input" 
                                    type="checkbox" 
                                    id="event<?php echo $event['Event_ID']; ?>" 
                                    name="event_ids[]" 
                                    value="<?php echo $event['Event_ID']; ?>" 
                                    <?php echo in_array($event['Event_ID'], $selected_events) ? 'checked' : ''; ?>>
                                <?php echo $event['Event_Name']; ?>
                            </label>
                        <?php endforeach; ?>
                        <button type="submit" class="btn-filter">Filter</button>
                    </form>

                    <br>
                    <form method="post">
                        <h5>Content</h5>
                        <?php 
                        $selected_contents = isset($_POST['content_ids']) ? $_POST['content_ids'] : [];
                        ?>
                        <?php foreach ($contents as $content):  ?>
                        <label class="form-check-label" for="content<?php echo $content['Content_ID']; ?>">
                            <input required class="form-check-input" type="checkbox" id="content<?php echo $content['Content_ID']; ?>" name="content_ids[]" value="<?php echo $content['Content_ID']; ?>" <?php echo in_array($content['Content_ID'], $selected_contents) ? 'checked' : ''; ?>>
                            <?php echo $content['Content_Name']; ?>
                        </label>
                        <?php endforeach; ?>
                        <button type="submit" class="btn-filter">Filter</button>
                    </form>
                </div>
            </div>

            <div class="col-md-9 offset-md-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="mb-4">All Influencers</h2>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end">
                        <form method="post">
                            <div class="inputBx">
                                <img src="././Views/Img/search.png" alt="" width="30" height="30">
                                <input name="username" type="text" placeholder="Search . . .">
                            </div>
                        </form>
                    </div>
                </div>
                
                    <div class="d-flex mb-4">
                        <form method="post">
                            <select name="wplace_id" class="dropdown me-3">
                                <option hidden>Workplace</option>
                                <?php 
                                    foreach ($all_wplace as $t){
                                        echo '<option value="'.$t['WPlace_ID'].'">'.$t['WPlace_Name'].'</option>';
                                    }
                                ?>
                            </select>

                            <button type="submit" class="btn-booking">Filter</button>
                        </form>
                        
                        <form method="post">
                            <select name="fol_id" class="dropdown me-3">
                                <option hidden>Followers</option>
                                <?php 
                                    foreach ($all_fol as $t){
                                        echo '<option value="'.$t['Fol_ID'].'">'.$t['Fol_Quantity'].'</option>';
                                    }
                                ?>
                            </select>

                            <button type="submit" class="btn-booking">Filter</button>
                        </form>
                        
                        <form method="post">
                            <select name="type_id" class="dropdown me-3">
                                <option hidden>Type</option>
                                <?php 
                                    foreach ($all_type as $t){
                                    echo '<option value="'.$t['InfluType_ID'].'">'.$t['InfluType_Name'].'</option>';
                                    }
                                ?>
                            </select>

                            <button type="submit" class="btn-booking">Filter</button>
                        </form>
                    </div>
                
                <?php if (!empty($message)): ?>
                    <p style="color: red; text-align: center; font-size: 30px; margin-top: 20px; font-weight:600"><?php echo $message; ?></p>
                <?php endif; ?>

                <?php if (!empty($influencers)): ?>
                <div class="row justify-content-center">
                    <?php foreach ($influencers as $i):  ?>
                    <div class="col-md-3">
                        <div class="card-viral">
                            <a href="index.php?action=customer_influencerDetail&id=<?php echo $i['Influ_ID'] ?>">
                                <img class="card-img-top" src="<?php echo $i['Influ_Image'] ?>">
                            </a>
                            <div class="card-body-viral">
                                <h5 class="card-title-viral"><?php echo $i['Influ_Nickname'] ?></h5>
                                <p class="card-text-viral"><?php echo $i['Fol_Quantity'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <?php endif; ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    
</body>
</html>