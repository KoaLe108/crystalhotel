<?php
if (isset($_GET['add'])){
    include_once "connect.php";

    // Kết nối đến database
    $conn = new mysqli("localhost", "root", "", "khachsan");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    $name = $_GET['hoten'];
    $sdt = $_GET['sdt'];
    $mail = $_GET['mail'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];

    // Kiểm tra các giá trị có hợp lệ không
    if ($checkin && $checkout && $name && $sdt && $mail) {
        $sql = "INSERT INTO thongtinkh (id, hoten, sdt, email, checkin, checkout) 
                VALUES (NULL, '$name', '$sdt', '$mail', '$checkin', '$checkout')";
        if ($conn->query($sql) !== TRUE) {
            die("Lỗi: " . $conn->error);
        } else {
            header("location: index.php");
            exit;
        }
    } else {
        echo "<p>Vui lòng nhập đầy đủ thông tin!</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thông tin khách hàng</title>
    <link rel="stylesheet" href="addkh.css">
</head>
<body>
<form action="" method="GET">
    <!-- Nhập họ và tên -->
    <div class="nhapthongtin">
        <label for="hoten">Họ và tên</label>
        <input type="text" name="hoten" id="hoten" placeholder="Họ và tên">
    </div>

    <!-- Nhập số điện thoại -->
    <div class="nhapthongtin">
        <label for="sdt">Số điện thoại</label>
        <input type="tel" pattern="[0-9]{10}" name="sdt" id="sdt" placeholder="Số điện thoại">
    </div>

    <!-- Nhập email -->
    <div class="nhapthongtin">
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail" placeholder="Nhập Email">
    </div>

    <!-- Chọn ngày đặt phòng -->
    <div class="ngaydatphong">
            
        <!-- Ngày nhận phòng -->
        <div class="ngaynp">
            <label for="ngaynp" style="color: black;">Ngày nhận phòng: </label>
            <input type="date" name="checkin" id="checkout">
        </div>

        <!-- Ngày trả phòng -->
        <div class="ngaytp">
            <label for="ngaytp" style="color: black;">Ngày trả phòng: </label>
            <input type="date" name="checkout" id="checkout">
        </div>

    </div>

    <input type="submit" name="add" id="add" value="Thêm">
    <a href="index.php"><input type="submit" value="Huỷ"></a>
    
</form>
    
</body>
</html>