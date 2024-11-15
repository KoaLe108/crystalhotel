<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt phòng</title>
    <link rel="stylesheet" href="VIEW/dphong.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<style>
.luuy {
    text-align: center;
    font-size: 1.0rem;
    font-weight: bold;
    color: #000;
    margin: 0 auto;
    padding: 10px;
}
.nutxacnhan{
    display: flex;
    height: 60px;
    width: 200px;
    justify-content: center;
    margin-bottom: 50px;
    align-items: center;
    padding: center;
    border: none;
    border-radius: 20px;
    font-weight: bold;
    background-color: black;
    cursor: center;
    color: white;
}
.xacnhan {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 50px;
}
</style>
<body>
    
    <?php 
        include_once("model/thongtinphong.php");
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $ttphong = new ttphong();
            $thongTinPhong =$ttphong-> getttphong($id);
        }
    ?>

    <img src="img/logovlu.webp" alt="LogoVanLang">
    <div class="thongtindatphong">
        <h1 class="datphong-title">Thông tin đặt phòng</h1>

        <form method="GET" action="HTML/xacnhan.php">

            <!-- Chọn ngày đặt phòng -->
            <div class="ngaydatphong">
                
                <!-- Ngày nhận phòng -->
                <div class="ngaynp">
                    <i></i>
                    <label for="ngaynp" style="color: black;">Ngày nhận phòng: </label>
                    <input type="date" name="checkin" id="checkout">
                </div>

                <!-- Ngày trả phòng -->
                <div class="ngaytp">
                    <i></i>
                    <label for="ngaytp" style="color: black;">Ngày trả phòng: </label>
                    <input type="date" name="checkout" id="checkout">
                </div>
            </div>

            <!-- Nhập họ và tên -->
            <div class="nhapthongtin">
                <i class="fas fa-user"></i>
                <input type="text" name="hoten" id="hoten" placeholder="Họ và tên">
                <label for="hoten">Họ và tên</label>
            </div>

            <!-- Nhập số điện thoại -->
            <div class="nhapthongtin">
                <i class="fas fa-phone"></i>
                <input type="tel" pattern="[0-9]{10}" name="sdt" id="sdt" placeholder="Số điện thoại" >
                <label for="sdt">Số điện thoại</label>
            </div>

            <!-- Nhập email -->
            <div class="nhapthongtin">
                <i class="fas fa-envelope"></i>
                <input type="email" name="mail" id="mail" placeholder="Nhập Email">
                <label for="mail">Email</label>
            </div>

            <!-- Thông tin phòng vừa bấm đặt -->
            <div class="thongtinphongvuadat">
                <p id="loaip" style ="border: none;">Loại phòng: <?php echo $thongTinPhong['loaiphong']; ?></p><br>
                <p id="giap" style ="border: none;">Giá phòng: <?php echo number_format($thongTinPhong['giaphong'], 0, ',', '.') . ' VNĐ'; ?></p>
            </div>

            <!-- Nút xác nhận -->
            <div class="xacnhan" style="float: center">
                <button type="submit" class="nutxacnhan">XÁC NHẬN ĐẶT</button>
            </div>

        </form>
        <p class="luuy">Lưu ý: Thanh toán khi nhận phòng</p>
    </div>

</body>
</html>