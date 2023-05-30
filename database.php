<?php
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];


    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname =  'web';

    $conn = mysqli_connect($host,$user,$pass,$dbname);
    $sql = "INSERT INTO student(name, email, mobile, city) values ('$name','$email','$mobile', '$city')";
    mysqli_query($conn,$sql);
    echo "Record successfully";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>

<body>
    <form action="#" method="POST">
        <label>Name: </label>
        <input type="text" name = 'name'> <br>
        <label>Email: </label>
        <input type="text" name = 'email'> <br>
        <label>Mobile:</label>
        <input type="text" name = 'mobile' ><br>
        <label>City: </label>
        <input type="text" name = 'city'> <br> <br>
        <input type="submit" name="submit" value="Send Data">
    </form>
</body>

</html>