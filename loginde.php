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
    $myusername = mysqli_real_escape_string($conn, $_POST['dealerid']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT dealerid,password FROM dealers WHERE dealerid = '$myusername' AND password = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['loggedin1'] = true;
        $_SESSION['dealerid'] = $myusername;
    
        header('Location: dealer.php');
        exit;
    } else {
        $_SESSION['loggedin1'] = false;
        $error = "Your Login Name or Password is invalid";
        header('Location: dealer.html?error=' . urlencode($error));
        exit;
    }    
}
?>
