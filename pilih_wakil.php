<?php
include 'koneksi.php';
session_start();
?>
<html>
  <head>
    <title>Pilih Wakil</title>
    <style>
        input{
            border: none;
            border-color: transparent;
            }
    </style>
  </head>
<body>
<?php 
$username = $_SESSION['username'];
$query = mysqli_query($con,"SELECT id_guild,a_guild_1,a_guild_2,a_guild_3 FROM t_guild WHERE ketua_guild = '$username'");
while($a=mysqli_fetch_array($query)){
?>
<form method="post" action="pilih_wakil.php">
<input type="hidden" name="id" value="<?php echo $a['id_guild'] ?>">
<p>Anggota Guild 1 :<input type="text" name="a1" value="<?php echo $a['a_guild_1']?>" readonly></p>
<button type="submit" name="wakil1a1">Jadikan wakil 1</button> | <button type="submit" name="wakil2a1">Jadikan wakil 2</button>
<p>Anggota Guild 2 :<input type="text" name="a2" value="<?php echo $a['a_guild_2']?>" readonly></p>
<button type="submit" name="wakil1a2">Jadikan wakil 1</button> | <button type="submit" name="wakil2a2">Jadikan wakil 2</button>
<p>Anggota Guild 3 :<input type="text" name="a3" value="<?php echo $a['a_guild_3']?>" readonly></p>
<button type="submit" name="wakil1a3">Jadikan wakil 1</button> | <button type="submit" name="wakil2a3">Jadikan wakil 2</button>
<?php } ?>
</body>
</html>
<?php 
if(isset($_POST['wakil1a1'])){
    $nama = $_POST['a1'];
    $id = $_POST['id'];
    $query = mysqli_query($con, "UPDATE t_guild SET wk_guild_1 = '$nama' WHERE id_guild = '$id'");
    if($query){
        header('location:my_guild.php');
    }
}
if(isset($_POST['wakil2a1'])){
    $nama = $_POST['a1'];
    $id = $_POST['id'];
    $query = mysqli_query($con, "UPDATE t_guild SET wk_guild_2 = '$nama' WHERE id_guild = '$id'");
    if($query){
        header('location:my_guild.php');
    }
}
if(isset($_POST['wakil1a2'])){
    $nama = $_POST['a2'];
    $id = $_POST['id'];
    $query = mysqli_query($con, "UPDATE t_guild SET wk_guild_1 = '$nama' WHERE id_guild = '$id'");
    if($query){
        header('location:my_guild.php');
    }
}
if(isset($_POST['wakil2a2'])){
    $nama = $_POST['a2'];
    $id = $_POST['id'];
    $query = mysqli_query($con, "UPDATE t_guild SET wk_guild_2 = '$nama' WHERE id_guild = '$id'");
    if($query){
        header('location:my_guild.php');
    }
}
if(isset($_POST['wakil1a3'])){
    $nama = $_POST['a3'];
    $id = $_POST['id'];
    $query = mysqli_query($con, "UPDATE t_guild SET wk_guild_1 = '$nama' WHERE id_guild = '$id'");
    if($query){
        header('location:my_guild.php');
    }
}
if(isset($_POST['wakil2a3'])){
    $nama = $_POST['a3'];
    $id = $_POST['id'];
    $query = mysqli_query($con, "UPDATE t_guild SET wk_guild_2 = '$nama' WHERE id_guild = '$id'");
    if($query){
        header('location:my_guild.php');
    }
    }

?>