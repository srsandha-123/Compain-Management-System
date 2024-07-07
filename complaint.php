<?php
$server_name = "localhost";
$username = "root";
$password = ""; // Replace with your database password
$dbname = "rail_sadan";

$conn = mysqli_connect($server_name, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

function generateComplaintId() {
    $code = '';
    $digits = '0123456789';

    for ($i = 0; $i < 6; $i++) {
        $index = mt_rand(0, strlen($digits) - 1);
        $code .= $digits[$index];
    }

    return $code;
}

if (isset($_POST['save'])) {
    // Sanitize and validate user input
    $division = mysqli_real_escape_string($conn, $_POST['division']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $user_id = mysqli_real_escape_string($conn, $_POST['userid']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $complain = mysqli_real_escape_string($conn, $_POST['complaint']);

    $complaintId = generateComplaintId();
    $adminid="admin";

    if (isset($_FILES['doc']) && $_FILES['doc']['error'] === UPLOAD_ERR_OK) {
        // File uploaded successfully
        $tempFilePath = $_FILES['doc']['tmp_name'];
        $targetPath = 'path/to/your/uploads/' . $_FILES['doc']['name'];
    
        if (move_uploaded_file($tempFilePath, $targetPath)) {
            // File moved to the desired location, save the file path in the database
            $sql_query = "INSERT INTO complaint (sgid, division, section, userid, name, mobile, complaint, document,adminid)
                          VALUES ('$complaintId', '$division', '$section', '$user_id', '$name', '$mobile', '$complain', '$targetPath','$adminid')";
    
            if (mysqli_query($conn, $sql_query)) {
                
                    session_start();
                    $_SESSION['loggedin3'] = true;
                    $_SESSION['sgid'] = $complaintId;
                    header("location: complaint-id.php");
                    exit;
                } else {
                    echo "Error: " . $sql_query2 . "<br>" . mysqli_error($conn);
                }
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        // No file uploaded, save the record without the file path
        
        $sql_query = "INSERT INTO complaint (sgid, division, section, userid, name, mobile, complaint,adminid)
                      VALUES ('$complaintId', '$division', '$section', '$user_id', '$name', '$mobile', '$complain','$adminid')";
    
        if (mysqli_query($conn, $sql_query)) {
                session_start();
                $_SESSION['loggedin3'] = true;
                $_SESSION['sgid'] = $complaintId;
                header("location: complaint-id.php");
                exit;
            }else {
                echo "Error: " . $sql_query2 . "<br>" . mysqli_error($conn);
            }
        
    mysqli_close($conn);
}}
?>
