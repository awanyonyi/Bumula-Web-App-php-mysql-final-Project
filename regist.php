<?php
$host = "localhost";
$user = "root";
$pass = "Allanware5895";
$db_name = "william";

// Create a MySQLi connection
$conn = new mysqli($host, $user, $pass, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Initialize variables
$F_Name = isset($_POST['F_Name']) ? $_POST['F_Name'] : '';
$L_Name = isset($_POST['L_Name']) ? $_POST['L_Name'] : '';
$U_Name = isset($_POST['U_Name']) ? $_POST['U_Name'] : '';
$P_Word1 = isset($_POST['P_Word1']) ? $_POST['P_Word1'] : '';
$P_Word2 = isset($_POST['P_Word2']) ? $_POST['P_Word2'] : '';

if (isset($_POST['register'])) {
    // Validate if the passwords match
    if ($P_Word1 != $P_Word2) {
        echo "<script>
            alert('The two passwords do not match');
            window.location='Register.php';
        </script>";
    } else {
        // Create a MySQLi connection (assuming you've already set up the connection)
        $link = mysqli_connect("localhost", "root", "Allanware5895", "william");

        // Validate the user credentials using prepared statement
        $Pdo = "SELECT * FROM student WHERE U_Name = ? AND P_Word = ?";
        $stmt = mysqli_prepare($link, $Pdo);
        mysqli_stmt_bind_param($stmt, "ss", $U_Name, $P_Word1);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            // User exists, handle accordingly
            echo "Login successful";
        } else {
            // User does not exist, handle accordingly
            echo "Login failed";
        }

        // Close the statement
        mysqli_stmt_close($stmt);

        // Close the connection (optional)
        mysqli_close($link);
    }
} else {
    // Insert data into database
    $Pdo = "INSERT INTO apply (column1, column2) VALUES ('$F_Name', '$L_Name')";
    if ($Pdo->query($Pdo) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $Pdo . "<br>" . $Pdo->error;
    }
}

// Close the connection
$Pdo->close();

