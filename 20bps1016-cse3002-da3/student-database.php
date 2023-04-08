<?php
function OpenConn()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "iwp_da3";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}
$conn = OpenConn();
echo "Connected Successfully<br/><br/>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Title -->
    <title>Student Database</title>
    <!-- CSS -->
    <style>
        table {
            padding: 1px;
            margin: 1px;
            border-spacing: 2px;
            border: 1px solid navy;
            border-radius: 5px;
            background-color: aquamarine;
        }

        caption {
            color: navy;
            font-size: small;
            font-style: oblique;
            text-transform: uppercase;
            padding-bottom: 5px;
        }

        th,
        td {
            border: 1px solid navy;
            border-radius: 5px;
            padding: 2px;
        }
    </style>
</head>

<body></body>

</html>

<?php
// CREATE A NEW TABLE
$sql = "CREATE TABLE Student_Database(First_Name VARCHAR(20) NOT NULL, Last_Name VARCHAR(20) NOT NULL, Marks INT(3) NOT NULL)";
if ($conn->query($sql) === TRUE) {
    echo nl2br("\nTable has been created successfully!");
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}

// INSERT THE GIVEN INFORMATION INTO THE DATABASE
$sql = "INSERT INTO Student_Database(First_Name, Last_Name, Marks) VALUES
    ('Sonoo', 'Jaiswal', '60'),
    ('James', 'William', '80'), 
    ('Swati', 'Sironi', '82'),
    ('Chetna', 'Singh', '72')";
if ($conn->query($sql) === TRUE) {
    echo nl2br("\nRecords have been inserted successfully!");
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}

// UPDATE THE INFORMATION AS REQUIRED
$sql = "UPDATE Student_Database SET Marks = '90' WHERE (First_Name = 'Swati')";
if ($conn->query($sql) === TRUE) {
    echo nl2br("\nThe record has been updated successfully!");
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
$sql = "UPDATE Student_Database SET Last_Name = 'Anderson' WHERE (First_Name = 'James')";
if ($conn->query($sql) === TRUE) {
    echo nl2br("\nThe record has been updated successfully!");
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}

// INSERT THE SPECIFIC DETAILS AS REQUIRED
$sql = "DELETE FROM Student_Database WHERE (First_Name = 'Chetna')";
if ($conn->query($sql) === TRUE) {
    echo nl2br("\nThe record has been deleted successfully!");

    // Retrieve data from the table
    $sql = "SELECT * FROM Student_Database";
    $result = $conn->query($sql);
    // Create an HTML table to display the data
    echo nl2br("\n<table>\n<caption>Updated Student Database</caption>\n");
    echo "<tr><th>First Name</th><th>Last Name</th><th>Marks</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["First_Name"] . "</td><td>" . $row["Last_Name"] . "</td><td>" . $row["Marks"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}

mysqli_close($conn);
?>
