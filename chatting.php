<?php
include("connection.php");
$NUMBERRECIEVED=$_GET['numberRecieved'];
$NUMBERSENDING=$_GET['numberSending'];
?>
<div class="content2">
        <form method="POST">
               
                <input type="text" name="massageSending" placeholder="type massage here"/>
                <input type="submit" value="send" name="send"/>
            </form>
            <?php
            if(isset($_POST['send'])){
                
                $numberSending=$NUMBERSENDING;
                $numberRecieved=$NUMBERRECIEVED;
                $massageSending=$_POST['massageSending'];
                mysqli_query($con,"INSERT INTO massages values ($numberSending,'$massageSending',$numberRecieved,'')");
                mysqli_query($con,"INSERT INTO massages values ($numberRecieved,'',$numberSending,'$massageSending')");
            }
            $res_3=mysqli_query($con,"select * from massages where numberSending='$NUMBERSENDING' AND numberRecieved='$NUMBERRECIEVED' ");
            while($row = mysqli_fetch_array($res_3)){
                echo"
                <h2 class='sended'>$row[massageSending]</h2>
                <h2 class='recieved'>$row[massageRecieved]</h2>
                ";
            }
            
            ?>
            
</div>
<style>
    .content2{
            border: 1px solid black;
            border-radius: 10px;
            width: 1100px;
            height: 700px;
            padding: 10px;
        }
    .sended{
            position: relative;
            background-color: green;
            color: white;
            width: auto;
            max-width: 160px;
        }
        .recieved{
            position: relative;
            left: 400px;
            background-color: gray;
            width: auto;
            max-width: 160px;
        }
</style>
