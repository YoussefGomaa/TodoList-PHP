<?php
require_once "connect.php";
session_start();
 if($_POST){
    $name=trim($_POST['userName']);
    $email=trim($_POST['email']);
    $password=trim($_POST['pass']);
    $insertStmt ="insert into users(name,email,password) values ('$name','$email','$password')";
    $res=$connect->query($insertStmt);
    header('location:http://localhost/todolist/login.php');

}
if(!isset($_SESSION['userID'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" />
    <title>SignUp</title>
    <head>
    
</head> 
</head>
<body>
    <h1 style="color:#fff;text-align:center;font-size:70px">SignUp</h1>
    <form style="margin-top:130px" action="" method="post">
        <input style="width:250px;height:30px;margin-bottom:30px;border-radius:5px" type="text" name="userName">
        <input style="width:250px;height:30px;margin-bottom:30px;border-radius:5px" type="email" name="email">
        <input style="width:250px;height:30px;margin-bottom:30px;border-radius:5px" type="password" name="pass">
        <input type="submit" value="SignUP">
        

    </form>
</body>
</html>
<?php }
else{
    header('location:http://localhost/todolist/index.php');
 
}
?>