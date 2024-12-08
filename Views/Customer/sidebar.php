
<div class="col-md-3 sidebar">
                <h4 class="text-center">Personal Center</h4>
                <a href="index.php?action=customer_dashboard">
                    <img src="././views/Img/u433.png" width="30" height="30"> My Personal Information
                </a>
                <a href="index.php?action=customer_payment">
                    <img src="././views/Img/u434.png" width="30" height="30"> Payment history
                </a>
                <a href="index.php?action=customer_bookinglist">
                    <img src="././views/Img/u435.png" width="30" height="30"> My Booking
                </a>
                <a href="index.php?action=customer_MailList">
                    <img src="././views/Img/u436.png" width="30" height="30"> Mail
                </a>
                <a href="index.php?action=customer_password">
                    <img src="././views/Img/u437.png" width="30" height="30"> Change Password
                </a>
                <a href="index.php?action=customer_Allfeedback">
                    <img src="././views/Img/comments.png" width="30" height="30"> Feedback
                </a>
                <a href="index.php?action=CusLogout">
                    <img src="././views/Img/u440.png" width="30" height="30"> Log Out
                </a>
            </div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleSidebar");
    const sidebar = document.querySelector(".sidebar");

    // Thêm/tắt class "active" để hiển thị sidebar
    toggleButton.addEventListener("click", function () {
        sidebar.classList.toggle("active");
    });
});
</script>

<style>
    @media (min-width: 1200px) {
    .sidebar {
        width: 300px; /* Tăng chiều rộng */
    }
}

/* Kích thước lớn hơn 1600px */
@media (min-width: 1600px) {
    .sidebar {
        width: 400px; /* Tăng thêm chiều rộng */
    }
}

/* Kích thước lớn hơn 1920px */
@media (min-width: 1920px) {
    .sidebar {
        width: 450px; /* Tăng chiều rộng cho màn hình siêu lớn */
    }
}
</style>