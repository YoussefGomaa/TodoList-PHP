 <?php
 require_once "connect.php";
 session_start();
  if($_POST){
    $email=trim($_POST['email']);
    $password=trim($_POST['pass']);
    $selectStmt="select * from users where email='$email' and '$password'";
    $res=$connect->query($selectStmt);
    if($res->num_rows>0){
     $arr = $res->fetch_assoc();
      $_SESSION['userID']=$arr["id"];
      header('location:http://localhost/todolist/index.php');

    }
    else{
      header('location:http://localhost/todolist/signup.php');
      
   }
   }
if(!isset($_SESSION['userID'])){

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <link rel="stylesheet" href="style.css" />
    <title>Login</title>
 </head>
 <body>
  <h1 style="color:#fff;text-align:center;font-size:70px">Login</h1>
 <form action="" method="post">
        <input style="width:250px;height:30px;margin-bottom:30px;border-radius:5px" type="email" name="email">
        <input style="width:250px;height:30px;margin-bottom:30px;border-radius:5px" type="password" name="pass">
        <input type="submit" value="Login">
        

    </form>
 </body>
 </html>
 <?php } 
 else {
   header('location:http://localhost/todolist/index.php');

 }
 ?>