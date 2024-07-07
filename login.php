<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rail_sadan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($conn, $_POST['adminid']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT adminid, password FROM admins WHERE adminid = '$myusername' AND password = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['loggedin1'] = true;
        $_SESSION['ipasid'] = $myusername;

        header('Location: admin-page.php');
        exit;
    } else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
    }
}
?>
