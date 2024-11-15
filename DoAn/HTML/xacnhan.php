<?php
    if (isset($_GET['add'])){
        include_once "model/connect.php";

        // Kết nối đến database
        $conn = new mysqli("localhost", "root", "", "khachsan");

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Lấy dữ liệu từ form
        $name = isset($_GET['hoten']) ? $_GET['hoten'] : '';
        $sdt = isset($_GET['sdt']) ? $_GET['sdt'] : '';
        $mail = isset($_GET['mail']) ? $_GET['mail'] : '';
        $checkin = isset($_GET['checkin']) ? $_GET['checkin'] : '';
        $checkout = isset($_GET['checkout']) ? $_GET['checkout'] : '';

        // Kiểm tra các giá trị có hợp lệ không
        if ($checkin && $checkout && $name && $sdt && $mail) {
            $sql = "INSERT INTO thongtinkh (id, hoten, sdt, email, checkin, checkout) 
                    VALUES (NULL, '$name', '$sdt', '$mail', '$checkin', '$checkout')";
            if ($conn->query($sql) !== TRUE) {
                die("Lỗi: " . $conn->error);
            } else {
                header("location: ../index.php?action=home");
                exit;
            }
        } else {
            echo "<p>Vui lòng nhập đầy đủ thông tin!</p>";
        }

        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Thông Tin Đặt Phòng</title>
    <link rel="stylesheet" href="../VIEW/xacnhan.css">
</head>
<style>
    
</style>
<body>
<?php
    // Lấy dữ liệu từ URL và gán cho các biến
    $name = isset($_GET['hoten']) ? $_GET['hoten'] : '';
    $sdt = isset($_GET['sdt']) ? $_GET['sdt'] : '';
    $mail = isset($_GET['mail']) ? $_GET['mail'] : '';
    $checkin = isset($_GET['checkin']) ? $_GET['checkin'] : '';
    $checkout = isset($_GET['checkout']) ? $_GET['checkout'] : '';
?>

    <h1> CRYSTAL HOTEL </h1>
    
    <form action="" method="GET">
        <div class="form-container">
            <div class="form-title">
                <img src="../img/logovlu.webp" alt="Logo Văn Lang">
                Xác Nhận Thông Tin Đặt Phòng
            </div>

            <!-- Hiển thị dữ liệu và thêm trường ẩn để giữ thông tin -->
            <div class="form-group" style="background-color: #d3d3d3; padding: 3px; border-radius: 8px">
                <p>Ngày nhận phòng: <?php echo htmlspecialchars($checkin); ?></p>
                <input type="hidden" name="checkin" value="<?php echo htmlspecialchars($checkin); ?>">
            </div>
            <div class="form-group" style="background-color: #d3d3d3; padding: 3px; border-radius: 8px">
                <p>Ngày trả phòng: <?php echo htmlspecialchars($checkout); ?></p>
                <input type="hidden" name="checkout" value="<?php echo htmlspecialchars($checkout); ?>">
            </div>
            <div class="form-group" style="background-color: #d3d3d3; padding: 3px; border-radius: 8px">
                <p>Họ tên: <?php echo htmlspecialchars($name); ?></p>
                <input type="hidden" name="hoten" value="<?php echo htmlspecialchars($name); ?>">
            </div>
            <div class="form-group" style="background-color: #d3d3d3; padding: 3px; border-radius: 8px">
                <p>Số điện thoại: <?php echo htmlspecialchars($sdt); ?></p>
                <input type="hidden" name="sdt" value="<?php echo htmlspecialchars($sdt); ?>">
            </div>
            <div class="form-group" style="background-color: #d3d3d3; padding: 3px; border-radius: 8px">
                <p>Email: <?php echo htmlspecialchars($mail); ?></p>
                <input type="hidden" name="mail" value="<?php echo htmlspecialchars($mail); ?>">
            </div>
            
            <div class="button-container">
                <button type="submit" name="add" class="button-confirm">Xác nhận</button>
                <a href="../index.php?action=home"><input type="button" class="button-cancel" value="Huỷ"></a>
                <!-- <a href="../index.php?action=home"><button type="button" class="button-cancel">Huỷ</button></a> -->
            </div>
        </div>
    </form>
</body>
</html>
