<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
</head>
<body>
    <form method="POST">
        <div class="content">
            <input type="text" name="name"/>
            <input type="number" name="number"/>
            <input type="text" name="email"/>
            <input type="submit" name="signup" value="sign up"/>
        </div>
    </form>
    <?php
    include("connection.php");
    if(isset($_POST['signup'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        mysqli_query($con,"INSERT INTO users values ('$name',$number,'$email')");
        header("location: chatpot.php? number=$number");
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