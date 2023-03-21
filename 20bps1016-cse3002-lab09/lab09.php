<?php
    function OpenConn() {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "cse3002_iwp";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        return $conn;
    }
    $conn = OpenConn();
    echo "Connected Successfully<br/><br/>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Modify Records</title>
    </head>
    <body>
        <p>Please fill this form to add new records to the database.</p>
        <form action="insert.php" method="post">
            <label>RegNo</label>
            <input type="text" name="regno"> 
            <br/><br/>
            <label>Name</label>
            <input type="text" name="name">
            <br/><br/>
            <label>GPA</label>
            <input type="number" name="gpa">
            <br/><br/>
            <label>Email</label>
            <input type="email" name="email">
            <br/><br/>
            <input type="submit" name="submit" value="Submit">
            <br/><br/>
        </form>

        <?php
            OpenConn();
            if (isset($_POST['submit'])) {
            $regno = $_POST['regno'];
            $name = $_POST['name'];
            $gpa = $_POST['gpa'];
            $email = $_POST['email'];
            $sql = "INSERT INTO student (RegNo, Name, GPA, Email) VALUES
            ('$regno','$name','$gpa','$email')";
            if (mysqli_query($conn, $sql)) {
                echo "New record has been added successfully!";
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
                mysqli_close($conn);
            }
        ?>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Modify Records</title>      
    </head>
    <body>        
    <p>Please fill this form to delete records from the database.</p>
    <form action="delete.php" method="post">
    <label>RegNo</label>
    <input type="text" name="reg">
    <br/><br/>
    <input type="submit" name="submit" value="Submit">
    <br/><br/>
    </form>
   
    <?php
        OpenConn();
        if (isset($_POST['submit'])) {
            $reg = $_POST['reg'];
            $sql = "DELETE FROM student WHERE REGNO='$reg'";
        if (mysqli_query($conn, $sql)) {
            echo "Record has been deleted successfully !";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
        }
    ?>
    </body>
</html>
