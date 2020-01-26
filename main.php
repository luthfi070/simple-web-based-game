<?php
include 'koneksi.php';
?>
<html>
    <head>Castle Game</head>
<body>
    <?php 
    session_start();
    $user = $_SESSION['username'];
    $query = mysqli_query($con,"SELECT nama_wk, j_knight, j_resource, lvl_benteng, uang FROM t_user WHERE 
    username = '$user'") or die(mysqli_error($con));
    while($r=mysqli_fetch_array($query)){
    ?>
    <p>selamat datang <?php echo $user?></p>
    <p>Wilayah Kekuasaan : <?php echo $r['nama_wk']?></p>
    <p>Jumlah Knight Saat ini : <?php echo $r['j_knight']?>
    <a href="jual_knight.php"><button type="submit" name="jual">Jual Knight</button>
    <a href="market.php"><button type="submit" name="knight">Beli Knight</button></a></p>
    <p>Level Benteng Pertahanan : <?php echo $r['lvl_benteng']?></p>
    <p>Jumlah Resource saat ini : <?php echo $r['j_resource']?>
    <a href="jual_resource.php"><button type="submit" name="jual">jual</button></a>
    <a href="market_resource.php"><button type="submit" name="resource">Beli Resource</button></a></p>
    <p>Uang : <?php echo $r['uang']?></p>
    <p><a href="my_guild.php"><button type="submit" name="guild" value="buka guild">Guild</button></a>
    <p><a href="logout.php"><button type="submit" name="logout" value="logout">Logout</button></a>
    <?php } ?>
</body>
</html>
