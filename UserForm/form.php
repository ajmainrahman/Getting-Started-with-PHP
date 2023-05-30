<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <p>I am metally Tired!</p>
    
    <form action = "#" method="POST">
        <table align="center"> 
            <h1 align="center">User Form</h1>
            <hr>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="Name"></td>
            </tr> 
            <tr>
                <td>ID: </td>
                <td><input type="text" name="ID"> </td> <br>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="Email"></td>
            </tr>
            <tr>
                <td>CGPA: </td>
                <td><input type="number" name="CGPA"></td>
            </tr>
            <tr>
                <td>University: </td>
                <td><input type="text" name="University"></td>
            </tr>
            <tr>
                <td>Country: </td>
                <td><input type="text" name="Country"></td>
            </tr>
            <tr>
                <td colspan = "2">
                    <button type="submit" value = "submit" name = "submit">Submit</button>
                    <button type="submit" value = "update" name = "update">Update</button>
                    <button type="submit" value = "view" name = "view">View</button>
                    <button type="submit" value = "delete" name = "delete">Delete</button>
                </td>
            </tr>
        </table>
    </form>
    
<?php

if (isset($_POST['submit'])){

    $Name = $_POST['Name'];
    $ID = $_POST['ID'];
    $Email = $_POST['Email'];
    $CGPA = $_POST['CGPA'];
    $University = $_POST['University'];
    $Country= $_POST['Country'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'project';

    $connect = mysqli_connect($host,$user,$pass,$dbname);

    $sql = "INSERT INTO portal(Name, ID, Email, CGPA, University, Country) values ('$Name', '$ID', '$Email', '$CGPA', '$University','$Country')"; 

    mysqli_query($connect, $sql);
    echo 'Recorded Succefully';
}
if (isset($_POST['update'])){

    $Name = $_POST['Name'];
    $ID = $_POST['ID'];
    $Email = $_POST['Email'];
    $CGPA = $_POST['CGPA'];
    $University = $_POST['University'];
    $Country= $_POST['Country'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'project';

    $connect = mysqli_connect($host,$user,$pass,$dbname);

    $sql1 = "UPDATE portal SET Name ='$Name', Email = '$Email',CGPA = '$CGPA', University = '$University', Country = '$Country' where ID = $ID"; 

    mysqli_query($connect, $sql1);
    echo 'Record Updated Succefully';
}
?>

</body>
</html>