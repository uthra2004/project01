<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root"; // Your database username
    $password = "Tiger"; // Your database password
    $dbname = "project1"; // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST['username']);
    $birthday = $conn->real_escape_string($_POST['birthday']);
    $gender = isset($_POST['gender']) ? $conn->real_escape_string($_POST['gender']) : null;
    $email = $conn->real_escape_string($_POST['email']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        echo "Error: Email already exists. Please choose another email.";
    } else {
        // Updated SQL query
        $sql = "INSERT INTO users (username, birthday, gender, email, phone_number, password) VALUES ('$username', '$birthday', '$gender', '$email', '$phone_number', '$password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: login.php"); // Redirect to login page
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
