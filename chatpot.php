<?php
include("connection.php");
$NUMBER=$_GET['number'];
$res=mysqli_query($con,"select * from users where number='$NUMBER' ");
$res_2=mysqli_query($con,"select * from friends where number='$NUMBER'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat pot</title>
</head>
<body>
    <div class="container">

        <div class="content1">
            <?php
                while($row= mysqli_fetch_array($res)){
                    echo"
                    <h1>$row[name]</h1>
                    <a class='btn' href='addFriend.php? number=$row[number]'>add friend</a>            
                    ";
                }   
                echo "<h1>Friends</h1>";
                while($row= mysqli_fetch_array($res_2)){
                    echo"
                    <div class='friends'>
                    </div>
                    <a class='friend' href='chatting.php? numberRecieved=$row[friendNumber]&numberSending=$NUMBER'>$row[friendName]</a>
                    ";
                }
                
            ?>
        </div>  
        
    </div>
    <style>
        .container{
            display: flex;
            flex-direction: row;
            gap: 30px;
        }
        .content1{
            border: 1px solid black;
            border-radius: 10px;
            width: 300px;
            height: 700px;
            padding: 10px;
        }
        .content2{
            border: 1px solid black;
            border-radius: 10px;
            width: 1100px;
            height: 700px;
            padding: 10px;
        }
        .friends{
            display: flex;
            flex-direction: column;
        }
        .friend{
            text-decoration: none;
            color: black;
            font-weight: bold;
            width: 120px;
            padding: 5px;
        }
        .btn{
            text-decoration: none;
            background-color: blue;
            color: white;
            width: 120px;
            padding: 5px;
            border-radius: 5px;
        }
        .sended{
            position: relative;
            background-color: green;
            color: white;
            width: 70px;
        }
        .recieved{
            position: relative;
            left: 400px;
            background-color: gray;
            width: 70px;
        }
    </style> 
</body>
</html>