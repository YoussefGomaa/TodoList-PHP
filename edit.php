<?php
  require_once 'connect.php';
  session_start();
  if(!isset($_SESSION['userID'])){
    header('location:http://localhost/todolist/login.php');

  }
  else{
  $noteID=$_GET['noteID'];
  if($_POST){
    $title=$_POST['noteTitle'];
    $updateStmt="update notes set title = '$title' where id='$noteID'";
    $res=$connect->query($updateStmt);
    header('location:http://localhost/todolist/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css" />
    <title>Edit</title>
</head>

<body>
    <?php
      if($_GET){
        $noteID=$_GET['noteID'];
        $selectStmt="select * from notes where id='$noteID'";
        $res=$connect->query($selectStmt);
        $arr=$res -> fetch_assoc(); //row -> associative array id>4 ,title>sass
      }
    ?>

    <form action="" method="Post">
        <textarea cols="65" rows="6" name="noteTitle"><?php echo $arr['title']?></textarea> <br>
        <input type="submit" value="Update" />
    </form>


</body>

</html>
<?php }?>