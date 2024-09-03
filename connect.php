<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "login";

// Create a connection to the database
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"])){
    // Collect the form data
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $placeOfBirth = $_POST['placeOfBirth'];
    $dob = $_POST['dob'];
    $childName = $_POST['childName'];

    // Prepare the SQL statement
    $sql = "INSERT INTO family_records (father_name, mother_name, place_of_birth, dob, child_name) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssss", $fatherName, $motherName, $placeOfBirth, $dob, $childName);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Family record saved successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();

?>
