<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method ="POST"> 
        ID: <input type="text" name = "ID"> <br>
        Username: <input type="text" name = "UserName"> <br>
        Password: <input type="password" pass = "Password"> <br>
        <input type="submit" name="submit" value = "Send Data"> <br>
    </form>
<?php
if (isset($_POST['submit'])){
    $ID = $_POST['ID'];
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];

    $host = 'localhost'; 
    $user = 'root';
    $Password =  '';
    $dbname = 'labper';

    $conn = mysqli_connect($host,$user,$Password,$dbname);
    $sql  = "INSERT INTO info(ID, UserName, Password) values('$ID','$UserName','$Password')";
    mysqli_query($conn,$sql);
    echo "Record Updated Successfuly!" ; 
}
?>
</body>
</html>