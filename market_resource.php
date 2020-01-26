<?php
include 'koneksi.php';
session_start();
?>
<html>
    <head>
        <title>Market Resource</title>
        <style>
            input{
            border: none;
            border-color: transparent;
            }
        </style>
    </head>
<body>
    <p>Selamat Datang di Marketplace</p>
    <form action="market_resource.php" method="post">
    <?php 
    $username = $_SESSION['username'];
    $sql = mysqli_query($con,"SELECT id_user,username,uang,j_resource FROM t_user WHERE username = '$username'");
    while($a=mysqli_fetch_array($sql)){
    ?>
    <input type="hidden" name="id_user" value="<?php echo $a['id_user']?>"> 
    <p>Uang anda saat ini : <input type="text" name="uang" value="<?php echo $a['uang']?>" readonly></p>
    <P>Jumlah Resource Saat Ini : <input type="text" name="sisa" value="<?php echo $a['j_resource']?>" readonly></p> 
    <?php 
$query = mysqli_query($con,"SELECT * FROM t_market WHERE barang = 'resource'") or die(mysqli_error($con));
while($q=mysqli_fetch_array($query)){
?>
<table>
<tr>
<input type="hidden" name="id" value="<?php echo $q['id_market']; ?>">
<input type="hidden" name="id_penjual" value="<?php echo $q['id_user']?>">
<td>Nama Barang : <input type="text" name="barang" value="<?php echo $q['barang']?>" readonly></td>
</tr>
<br>
<tr>
<td>Harga : <input type="text" name="harga" value="<?php echo $q['harga']?>" readonly></td>
</tr>
<td>Jumlah : <input type="text" name="jumlah" value="<?php echo $q['jumlah']?>" readonly></td>
</tr>
<tr><td>
<button type="submit" name="submit">beli</button>
</td></tr>
<?php } ?>
<?php } ?>
</body>
</html>
<?php 

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $uang = $_POST['uang'];
    $harga = $_POST['harga'];
    $id_user = $_POST['id_user'];
    $jumlah = $_POST['jumlah'];
    $resource = $_POST['sisa'];
    $id_penjual = $_POST['id_penjual'];
    $delete = mysqli_query($con,"DELETE FROM t_market WHERE id_market = '$id'");
    if($delete){
    $sql = mysqli_query($con,"UPDATE t_user SET j_resource = $resource + $jumlah WHERE id_user = '$id_user'");    
    $tambah_uang = mysqli_query($con,"UPDATE t_user SET uang = $uang + $harga WHERE id_user = '$id_penjual'");
    header('location:main.php');
}else{
        echo "gagal";
    }
}
?>