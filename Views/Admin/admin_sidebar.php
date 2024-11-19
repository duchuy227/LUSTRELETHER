<style>
    aside .top{
        background: var(--clr-white);
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.4rem;
        border-radius: 10px;
        height: auto;
    }

    aside .sidebar{
        background: var(--clr-white);
        display: flex;
        flex-direction: column;
        height: 720px;
        position: relative;
        top: 1rem;
        border-radius: 10px;
        
    }

    aside .sidebar a {
        transition: all 0.3s ease-in-out;
        border-radius: 0; /* Ban đầu không bo góc */
        text-decoration: none;
    }

    aside .sidebar a:hover {
        border-top-left-radius: 10px; /* Bo góc trên bên trái */
        border-bottom-left-radius: 10px; /* Bo góc dưới bên trái */
        border-top-right-radius: 0; /* Giữ góc phải */
        border-bottom-right-radius: 0;
        background-color: #cde7ff;
        color: #7380ec;
        padding: 10px;
        margin-left: 1rem;
        
    }

    aside .sidebar a:hover h3{
        margin-right: 2rem;
    }

    aside .sidebar a h3.msg_count{
        background-color: var(--clr-danger);
        color: var(--clr-white);
        padding: 2px 5px;
        font-size: 11px;
        border-radius: var(--border-radius-1);
    }

    aside .sidebar a h3{
        font-size: 20px;
        margin-top: 10px;
        transition: all .3s ease-in-out;
        
    }

    aside .sidebar a:last-child{
        position: absolute;
        bottom: 1rem; 
        width: 100%;
    }

    
</style>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<aside>
            <div class="top">
                <div style="margin: auto;" class="logo">
                    <h2>ADMIN<span class="danger"> PAGE</span> </h2>
                </div>
                <div class="close" id="close_btn">
                    <span class="material-symbols-sharp">
                    close
                    </span>
                </div>
            </div>
            <!-- end top -->
            <div class="sidebar">
                <a href="index.php?action=admin_dashboard">
                    <img src="./././Image/u16.png" width="30">
                    <h3>Dashboard</h3>
                </a>

                <a href="index.php?action=admin_analytics">
                    <img src="./././Image/u17.png" width="30">
                    <h3>Analytics</h3>
                </a>
                <a href="index.php?action=admin_customer">
                    <img src="./././Image/u18.png" width="30">
                    <h3>Customer</h3>
                </a>
                <a href="index.php?action=admin_influencer">
                    <img src="./././Image/u19.png" width="30">
                    <h3>Influencer</h3>
                </a>
                <a href="index.php?action=admin_category">
                    <img src="./././Image/u20.png" width="30">
                    <h3>Category</h3>
                </a>
                <a href="index.php?action=admin_article">
                    <img src="./././Image/u21.png"width="30">
                    <h3>Article</h3>
                </a>
                <a href="index.php?action=admin_booking">
                    <img src="./././Image/u22.png" width="30">
                    <h3>Booking</h3>
                </a>
                <a href="index.php?action=admin_feedback">
                    <img src="./././Image/u23.png"width="30">
                    <h3>Feedback</h3>
                </a>
                <a href="index.php?action=admin_invoice">
                    <img src="./././Image/u24.png" width="30">
                    <h3>Invoice</h3>
                </a>
                <a href="index.php?action=admin_mail">
                    <img src="./././Image/u25.png" width="30">
                    <h3>Mail</h3>
                </a>
                <a href="index.php?action=admin_profile">
                    <img src="./././Image/u26.png" width="30">
                    <h3>Profile</h3>
                </a>
                
                <a href="index.php?action=admin_notification">
                    <img src="./././Image/bell.png" width="30">
                    <h3>Notification</h3>
                </a>
                <br>
                <a href="index.php?action=adminLogout">
                    <img src="./././Image/u27.png" width="30">
                    <h3>Logout</h3>
                </a>
            </div>
</aside>

<script>
    const  sideMenu = document.querySelector('aside');
    const menuBtn = document.querySelector('#menu_bar');
    const closeBtn = document.querySelector('#close_btn');


    const themeToggler = document.querySelector('.theme-toggler');



    menuBtn.addEventListener('click',()=>{
        sideMenu.style.display = "block"
    })
    closeBtn.addEventListener('click',()=>{
        sideMenu.style.display = "none"
    })

    themeToggler.addEventListener('click',()=>{
        document.body.classList.toggle('dark-theme-variables')
        themeToggler.querySelector('h3:nth-child(1').classList.toggle('active')
        themeToggler.querySelector('h3:nth-child(2').classList.toggle('active')
    })
</script>