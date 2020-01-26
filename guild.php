<?php 
include 'koneksi.php';
session_start() ?>
<html>
    <head>
        <title>Guild</title>
    </head>
<body>
    <p>Guild</p>
    <a href="buat_guild.php"><button type="submit" name="buat">Buat Guild</button></a>
    <p>Guild List</p>
<?php
$query = mysqli_query($con,"SELECT * FROM t_guild") or die($con);
while($q=mysqli_fetch_array($query)){ 
?>
<form method="POST" action="guild.php">
<input type="hidden" name="id_guild" value="<?php echo $q['id_guild']?>">
<p>Nama Guild : <?php echo $q['nama_guild'];?></p>
<p>Ketua Guild : <?php echo $q['ketua_guild'];?></p>
<button type="submit" name="anggota1">Cek slot 1</button>
<button type="submit" name="anggota2">Cek slot 2</button>
<button type="submit" name="anggota3">Cek slot 3</button>
<?php } ?>
</body>
</html>
<?php 
$username = $_SESSION['username'];
    if(isset($_POST['anggota1'])){
        $id_guild = $_POST['id_guild'];
        $anggota1 = mysqli_query($con,"SELECT a_guild_1 FROM t_guild WHERE a_guild_1 = '' AND id_guild = '$id_guild'") or die($con);
        $ceka1 = mysqli_num_rows($anggota1);       
        if($ceka1 > 0){
            $join1 = mysqli_query($con,"UPDATE t_guild SET a_guild_1 = '$username' WHERE id_guild = '$id_guild'");
            header('location:main.php');
        }else{
            echo "anggota 1 udah ada orang gan";
        }
        } 
    if(isset($_POST['anggota2'])){
        $id_guild = $_POST['id_guild'];
        $anggota2 = mysqli_query($con,"SELECT a_guild_2 FROM t_guild WHERE a_guild_2 = '' AND id_guild = '$id_guild'") or die($con);
        $ceka2 = mysqli_num_rows($anggota2);       
        if($ceka2 > 0){
            $join2 = mysqli_query($con,"UPDATE t_guild SET a_guild_2 = '$username' WHERE id_guild = '$id_guild'");
            header('location:main.php');
        }else{
            echo "anggota 2 udah ada orang gan";
        } 
    }
    if(isset($_POST['anggota3'])){
        $id_guild = $_POST['id_guild'];
        $anggota3 = mysqli_query($con,"SELECT a_guild_2 FROM t_guild WHERE a_guild_3 = '' AND id_guild = '$id_guild'") or die($con);
        $ceka3 = mysqli_num_rows($anggota3);       
        if($ceka3 > 0){
            $join3 = mysqli_query($con,"UPDATE t_guild SET a_guild_3 = '$username' WHERE id_guild = '$id_guild'");
            header('location:main.php');
        }else{
            echo "anggota 3 udah ada orang gan";
        } 
    }
?>