<?php 
include 'koneksi.php';
session_start();
?>
<html>
    <head>
        <title>My Guild</title>
    </head>
    <style>
        input{
            border: none;
            border-color: transparent;
            }
    </style>
<body>
    <p>My Guild</p>
<?php 
$username = $_SESSION['username'];
$guild_data = mysqli_query($con,"SELECT * FROM t_guild WHERE ketua_guild = (SELECT ketua_guild FROM t_guild WHERE ketua_guild = '$username') or a_guild_1 = '$username' OR a_guild_2 = '$username' OR a_guild_3 = '$username'");
while($q=mysqli_fetch_array($guild_data)){
?>
<form action="my_guild.php" method="post">
<p>Id Guild : <input type="text" name="id" value="<?php echo $q['id_guild']?>" readonly></p>
<p>Nama Guild :<?php echo $q['nama_guild']?></p>
<p>Ketua :<input type="text" name="ketua" value="<?php echo $q['ketua_guild']?>" readonly></p>
<p>Wakil Ketua 1:<?php echo $q['wk_guild_1']?></p>
<p>Wakil Ketua 2:<?php echo $q['wk_guild_2']?></p>
<p>Anggota 1:<?php echo $q['a_guild_1']?></p>
<p>Anggota 2:<?php echo $q['a_guild_2']?></p>
<p>Anggota 3:<?php echo $q['a_guild_3']?></p>
<button type="submit" name="submit">Pilih orang menjadi wakil anggota</button>
<?php }
if(isset($_POST['submit'])){
$id_guild = $_POST['id'];
$ketua = mysqli_query($con,"SELECT ketua_guild FROM t_guild WHERE ketua_guild = '$username' AND id_guild = '$id_guild'") or die(mysqli_error($con));
$result = mysqli_num_rows($ketua);
if($result > 0){
header('location:pilih_wakil.php');
}else{
echo "anda bukan ketua";
} }?>
</body>
</html>