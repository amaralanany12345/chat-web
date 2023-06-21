<?php
include("connection.php");
$NUMBER=$_GET['number'];
$res=mysqli_query($con,"select * from users where number='$NUMBER'");
$data=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add friend</title>
</head>
<body>
    <form method="POST">
        <div>
            <input name="friendNumber" type="number"/>
            <input type="submit" name="addFriend" value="add friend"/>
        </div>
    </form>
    <?php
    if(isset($_POST['addFriend'])){
        $friendNumber=$_POST['friendNumber'];
        $x=mysqli_query($con,"select name from users where number='$friendNumber'");
        $data_2=mysqli_fetch_array($x);
        mysqli_query($con,"INSERT INTO friends values ($data[number],'$data[name]',$friendNumber,'$data_2[name]')");
        mysqli_query($con,"INSERT INTO friends values ($friendNumber,'$data_2[name]',$data[number],'$data[name]')");        
    }
    ?>
</body>
</html>