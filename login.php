<html>
<head>
<title>Login Games</title>
</head>
<body>
<p>LOGIN</p>
<form method ="post" action="">
Username : 
<input type="text" name="username">
<br><br>
Password : 
<input type="password" name="pass">
<button type="submit" name="login">Login</button>
<a href="register.php">register</a>
</body>
<?php
if(isset($_POST['login'])){
    include 'koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['pass']; 
    $sql = mysqli_query($con,"SELECT * FROM t_user WHERE username = '$username' AND password = '$password'");
    $row = mysqli_num_rows($sql);
    if($row > 0){
        session_start();
        $_SESSION['username'] = $username; 
        header("location:main.php");
    }else{
        echo"gagal" or die(mysqli_error($con));
    }
}
?>