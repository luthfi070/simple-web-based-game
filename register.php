<html>
<head>
<title>Register</title>
</head>
<body>
<p>Register</p>
<form action="register.php" method="post">
Username : 
<input type="text" name="username">
<br><br>
Password :
<input type="password" name="pass">
<br><br>
Nama Village :
<input type="text" name="vil">
<br><br>
Email :
<input type="text" name="email">
<button type="submit" name="submit">Register</button>
</form>
</html>
<?php 
include 'koneksi.php';
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['pass'];
$email = $_POST['email'];
$village = $_POST['vil'];
$sql = mysqli_query($con,"SELECT * FROM t_user WHERE username = '$username' AND password = '$password'") or die(mysqli_error($con));
$row = mysqli_num_rows($sql);
if($row > 0){  
    echo "Username sudah digunakan";
}
else{
$query = mysqli_query($con,"INSERT INTO t_user (id_user,username,password,email,nama_wk,lvl_benteng,j_knight,j_resource,uang) 
VALUES ('','$username','$password','$email','$village','1','20','50','200')");
    if($query){
        header('location:login.php');
    }else{
        echo "error" . mysqli_error($con);
    } 
}}

?>