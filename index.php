
 <?php
  require_once "connect.php";
  session_start();
  if(!isset($_SESSION['userID'])){
    header('location:http://localhost/todolist/login.php');

  }
  else{

  

  $userID=$_SESSION['userID']; 
  if($_POST){
    $title=$_REQUEST['noteTitle'];
    $insertStmt="insert into notes(title,statusID,userID) values('$title',1,'$userID')";
    $res = $connect -> query($insertStmt);
}
if($_GET){
    $noteID=$_GET['noteID'];
    $status=$_GET['status'];
    if($status=='all'){
        $updateStml="update notes set statusID=2 where id='$noteID'";
        $res = $connect->query($updateStml); 
    }
    else if($status=='doing'){
        $updateStml="update notes set statusID=3 where id='$noteID'";
        $res = $connect->query($updateStml);

    }
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css" />
    <title>Home</title>
</head> 

<body>
    <a style="color:white;text-decoration:none;" href="logout.php">Logout</a>
    <form action="" method="Post">
        <textarea cols="65" rows="6" placeholder="Enter your note here" name="noteTitle"></textarea> <br>
        <input type="submit" value="Add To Do" />
    </form>


    <div class="todoContainer">

    <div class="todo">
        <h2>All Notes</h2>
        <?php
        $selectStml="select * from notes where statusID=1 and userID='$userID'";
        $res = $connect->query($selectStml);
        while( $row = $res -> fetch_assoc()){
        ?>
            <div class="all">
                <h3><?php  echo $row["title"]; ?></h3>
                <p><?php  echo $row["noteDateTime"]; ?></p>
                <div class="btns">
                  <a class="btnedit" href='edit.php?noteID=<?php echo $row["id"];?>'>Edit</a>
                  <a class="btndoing" href='index.php?status=all&noteID=<?php echo $row["id"]; ?>'>Doing</a>
               </div>
            </div>
            <?php } ?>
       
    </div>

    <div class="todo">
        <h2>Doing</h2>
        <?php
        $selectStml="select * from notes where statusID=2 and userID='$userID'";
        $res = $connect->query($selectStml);
        while( $row = $res -> fetch_assoc()){
        ?>
            <div class="doing">
                <h3><?php  echo $row["title"]; ?></h3>
                <p><?php  echo $row["noteDateTime"]; ?></p>
                <a class="btndone" href='index.php?status=doing&noteID=<?php echo $row["id"]; ?>'>Done</a>
            </div>
            <?php } ?>
    </div>

    <div class="todo">
        <h2>Done</h2>
        <?php
        $selectStml="select * from notes where statusID=3 and userID='$userID'";
        $res = $connect->query($selectStml);
        while( $row = $res -> fetch_assoc()){
        ?> 
            <div class="done">
            <h3><?php  echo $row["title"]; ?></h3>
            <p><?php  echo $row["noteDateTime"]; ?></p>
            </div>
        <?php } ?>
    </div>

</div>
</body>

</html>
<?php } ?>