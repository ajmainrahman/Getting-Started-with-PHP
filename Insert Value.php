<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $cgpa = $_POST['cgpa'];
    $university = $_POST['university'];
    $country = $_POST['country'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'project';

    $conn = mysqli_connect($host,$user,$pass,$dbname);
    $sql = "INSERT INTO portal(name,id,email,mobile,city) values ('$id','$name','email','$mobile','city')";
    mysqli_query($conn,$sql);
    echo "Record Sucessfully";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP with database</title>
</head>
<body>
    <form action="#" method="POST">
        <label> Id: </label>
        <input type="text" name="id"> <br>
        <label> Name: </label>
        <input type="text" name="name"> <br>
        <label> Email: </label>
        <input type="text" name="email"> <br>
        <label> Mobile: </label>
        <input type="text" name="mobile"> <br>
        <label> City: </label>
        <input type="text" name="city"> <br>
        <input type="submit" name="submit" value="send Data">
    </form>
</body>
</html>