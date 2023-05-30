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
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
        }
        
        td {
            padding: 10px;
        }
        
        button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        button[type="submit"] {
            background-color: #007bff;
        }
    </style>
    
    <form action="#" method="POST">
        <table align="center"> 
            <h1 align="center">User Form</h1>
            <hr>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="Name"></td>
            </tr> 
            <tr>
                <td>ID: </td>
                <td><input type="text" name="ID"></td>
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
                <td colspan="2">
                    <button type="submit" value="insert" name="insert">Insert</button>
                    <button type="submit" value="update" name="update">Update</button>
                    <!-- <button type="submit" value="view" name="view">View</button> -->
                    <button type="submit" value="delete" name="delete">Delete</button>
                </td>
            </tr>
        </table>
    </form>
    
<?php
if (isset($_POST['insert'])){
    $Name = $_POST['Name'];
    $ID = $_POST['ID'];
    $Email = $_POST['Email'];
    $CGPA = $_POST['CGPA'];
    $University = $_POST['University'];
    $Country = $_POST['Country'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'project';

    $connect = mysqli_connect($host, $user, $pass, $dbname);

    // Prepare the SQL statement using prepared statements to prevent SQL injection
    $sql = "INSERT INTO portal (Name, ID, Email, CGPA, University, Country) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "sssdss", $Name, $ID, $Email, $CGPA, $University, $Country);

    if (mysqli_stmt_execute($stmt)) {
        echo 'Record inserted successfully';
    } else {
        echo 'Error inserting record: ' . mysqli_error($connect);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}

if (isset($_POST['update'])){
    $Name = $_POST['Name'];
    $ID = $_POST['ID'];
    $Email = $_POST['Email'];
    $CGPA = $_POST['CGPA'];
    $University = $_POST['University'];
    $Country = $_POST['Country'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'project';

    $connect = mysqli_connect($host, $user, $pass, $dbname);

    // Prepare the SQL statement using prepared statements to prevent SQL injection
    $sql = "UPDATE portal SET Name = '$Name', Email = '$Email', CGPA = '$Email', University = '$University', Country = '$Country' WHERE ID = '$ID'";
    $stmt = mysqli_prepare($connect, $sql);
    // mysqli_stmt_bind_param($stmt, $Name, $Email, $CGPA, $University, $Country, $ID);

    if (mysqli_stmt_execute($stmt)) {
        echo 'Record updated successfully';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}

// if (isset($_POST['view'])){
//     $host = 'localhost';
//     $user = 'root';
//     $pass = '';
//     $dbname = 'project';

//     $connect = mysqli_connect($host, $user, $pass, $dbname);

//     // Retrieve all records from the "portal" table
//     $sql = "SELECT * FROM portal";
//     $result = mysqli_query($connect, $sql);

//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             echo "Name: " . $row['Name'] . "<br>";
//             echo "ID: " . $row['ID'] . "<br>";
//             echo "Email: " . $row['Email'] . "<br>";
//             echo "CGPA: " . $row['CGPA'] . "<br>";
//             echo "University: " . $row['University'] . "<br>";
//             echo "Country: " . $row['Country'] . "<br>";
//             echo "----------------------<br>";
//         }
//     } else {
//         echo "No records found";
//     }

//     mysqli_close($connect);
// }

if (isset($_POST['delete'])){
    $ID = $_POST['ID'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'project';

    $connect = mysqli_connect($host, $user, $pass, $dbname);

    // Delete record from the "portal" table based on the ID
    $sql = "DELETE FROM portal WHERE ID = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID);

    if (mysqli_stmt_execute($stmt)) {
        echo 'Record deleted successfully';
    }
}
?>

