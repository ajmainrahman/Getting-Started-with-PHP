<?php
if (isset($_POST['submit'])){
    $ID = $_POST['ID'];
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Department = $_POST['Department'];
    $University = $_POST['University'];
    $Country = $_POST['Country'];

    $host = 'localhost'; 
    $user = 'root';
    $pass =  '';
    $dbname = 'student';

    $conn = mysqli_connect($host,$user,$pass,$dbname);
    $sql  = "INSERT INTO student_info(id, name, age, department, university, country) values('$ID','$Name','$Age','$Department','$University','$Country')";
    mysqli_query($conn,$sql);
}
    if (isset($_POST['update'])){
        $ID = $_POST['ID'];
        $Name = $_POST['Name'];
        $Age = $_POST['Age'];
        $Department = $_POST['Department'];
        $University = $_POST['University'];
        $Country = $_POST['Country'];
    
        $host = 'localhost'; 
        $user = 'root';
        $pass =  '';
        $dbname = 'student';
    $sql2 = "UPDATE student_info SET id = '$ID', name = '$Name', age = '$Age', department = '$Department', university = '$University', country = '$Country' WHERE ID = '$ID'"; 
    mysqli_query($conn,$sql2); 
    }
    if (isset($_POST['delete'])){
        $ID = $_POST['ID'];
    
        $host = 'localhost'; 
        $user = 'root';
        $pass =  '';
        $dbname = 'student';
    $sql3 = "DELETE FROM student_info WHERE ID = '$ID'"; 
    if ($conn ->query($sql3) === TRUE) { 
        echo "<br>Record delete successfully"; 
    } 
    else{ 
        echo "<br>Error deleting record: ". $conn->error; 
    } echo "Successfully";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
</head>
<body>
    <form action = '#' method="POST">
        ID: <input type="text" name ="ID"> <br>
        Name: <input type="text" name = "Name"> <br>
        Age: <input type="text" name = "Age"> <br>
        Department: <input type="text" name = "Department"> <br>
        University:<input type="text" name = "University"> <br>
        Country: <input type="text" name = "Country"> <br>
        
        Update: <input type="text" name= "ID"/> <br>
        <input type = "submit" value = "update" name = "update"> <br>
        Delete: <input type="text" name= "ID"/> <br>
        <input type = "submit" value = "delete "name = "delete"> 
        <input type="submit" name="submit" value = "Send Data"> <br>
    </form>
    
</body>
</html>



