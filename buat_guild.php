<?php 
include 'koneksi.php';
session_start();
?>
<html>
    <head>
        <title>
            Buat Guild
        </title>
    </head>
<body>
<p>Buat Guild</p>
<form method="post" action="buat_guild.php">
<p>Nama Guild : </p>
<input type="text" name="nama">
<p>Username anda : </p>
<input type="text" name="username" value="<?php echo $_SESSION['username'] ?>" readonly>
<br><br>
<button type="submit" name="submit">Buat</button>
<p>Note : anda bisa mengundang teman menjadi anggota nanti setelah guild berhasil dibuat</p>
<?php
    $username = $_SESSION['username'];
    $sql = mysqli_query($con,"SELECT id_user FROM t_user WHERE username = '$username' ");
    while($a=mysqli_fetch_array($sql)){
?>
<input type="hidden" name="id" value="<?php echo $a['id_user']?>">
    <?php } ?>
</form>    
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $nama = $_POST['nama'];
    $id = $_POST['id'];
    $query = mysqli_query($con,"INSERT INTO t_guild (id_guild, nama_guild, ketua_guild, wk_guild_1, wk_guild_2, a_guild_1, a_guild_2, a_guild_3, id_username) VALUES ('','$nama','$user','','','','','','$id')");
    if($query){
        header('location:guild.php');
    }else{
        echo "error" or die(mysqli_error($con));
    }
}
?>