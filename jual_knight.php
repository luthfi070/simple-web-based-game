<?php
include 'koneksi.php';
session_start();
$user = $_SESSION['username'];
$id = mysqli_query($con,"SELECT id_user FROM t_user WHERE username='$user'");
while($r=mysqli_fetch_array($id)){
?>
<html>
    <head>
        <title>Jual Knight</title>
    </head>
<body>
    <form action="jual_knight.php" method="post">
    <p>Jual Knight</p>
    <?php 
    $sisa = mysqli_query($con,"SELECT j_knight FROM t_user WHERE username='$user'");
    while($i=mysqli_fetch_array($sisa)){
    ?>
    <P>Jumlah Knight Saat Ini :</p> 
    <input type="text" name="sisa" value="<?php echo $i['j_knight']?>" readonly>
    <?php } ?>  
    <p>Jumlah :</p>
    <input type="number" name="jumlah">
    <p>Harga :</p>
    <input type="text" name="harga">
    <input type="hidden" name="id" value="<?php echo $r['id_user']?>"> 
    <br><br>
    <button type="submit" name="submit">Jual</button>
<?php } ?>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$id = $_POST['id'];
$user = $_SESSION['username'];
$sisa = $_POST['sisa'];
$query = mysqli_query($con,"INSERT INTO t_market (id_market,nama_user,id_user
,barang,harga,jumlah) VALUES ('','$user','$id','knight','$harga','$jumlah')");
if($query){
    $sql = mysqli_query($con,"UPDATE t_user SET j_knight = $sisa - $jumlah WHERE id_user = '$id'");
}
}
?>