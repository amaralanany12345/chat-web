<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
</head>
<body>
    <form method="POST">
        <div class="content">
            <input type="text" name="name"/>
            <input type="text" name="email"/>
            <input type="number" name="number"/>
            <input type="submit" name="signin" value="sign in"/>
        </div>
    </form>
    <?php
    include("connection.php");
    if(isset($_POST['signin'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $res=mysqli_query($con,"select * from users");
        while($row= mysqli_fetch_array($res)){
             if($name==$row['name'] && $number=$row['number'] ){
                header("location: chatpot.php? number=$row[number]");
            }
                        
        }        
        
    }
    ?>
    <style>
        .content{
            display: flex;
            flex-direction: column;
            width: 200px;
            gap: 10px;
        }
    </style>
</body>
</html>