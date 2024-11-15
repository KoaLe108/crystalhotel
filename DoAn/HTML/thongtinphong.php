<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Khách Sạn</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="VIEW/ttphong.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <!-- Tiêu đề -->
    <div class="header">
        <h1>CRYSTAL Hotel</h1>
    </div>

    <?php
        include_once("../model/thongtinphong.php");
        $ttphong = new ttphong();
        $result = $ttphong->thongtinphong();
        while ($set = $result->fetch()){
    ?>
    <div class="small-box">
        <img src="img/<?php echo$set['hinh']?>" class="d-block w-100" alt="...">
        <div class="room-description">
            <p><?php echo $set['mota']?></p>
        </div>

        <div class="room-info">
            <div class="room-type">
                <p><?php echo $set['loaiphong']?></p>
            </div>
            <div class="room-price">
            <p><?php echo number_format($set['giaphong'], 0, ',', '.') . ' VND'; ?></p>
            </div>
            <div class="room-booking">
                <a href="index.php?action=phong&id=<?php echo $set['id_phong']?>"><button>Đặt phòng</button></a>
            </div>
        </div>
    </div>
    
<?php } ?>
</div>

</body>
</html>
