<?php
include_once ("connect.php");

$cn = new mysqli($svn, $usn, $pass, $dbname);
if ($cn->connect_error) {
    die("Kết nối thất bại: " . $cn->connect_error);
}

// Kiểm tra nếu nút "delete" được nhấn và có id nào được chọn
if (isset($_POST['delete']) && !empty($_POST['delete_ids'])) {
    $idsToDelete = $_POST['delete_ids'];

    // Tạo chuỗi các ID để dùng trong câu lệnh SQL
    $ids = implode(',', array_map('intval', $idsToDelete));

    // Thực hiện câu lệnh xóa
    $sql = "DELETE FROM thongtinkh WHERE id IN ($ids)";
    if ($cn->query($sql) === TRUE) {
        header("location: index.php");
    }
}
$cn->close();
?>