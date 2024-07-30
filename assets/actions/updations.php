<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "bloodhub";
$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $_SESSION["email"];

$stmt = $conn->prepare("SELECT full_name, phone_number, email, password, blood_group, birth_date, gender, weight, state, city, zip_code, area, landmark, donations, received FROM register WHERE email = ?");
if (!$stmt) {
    die("Error: " . $conn->error);
}
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($name, $phone, $email, $password, $bloodgroup, $birthdate, $gender, $weight, $state, $city, $zipcode, $area, $landmark, $donations, $received);
$stmt->fetch();
$stmt->close();

// Calculate the number of donations from the "donations" table
$donations_count = 0;
$result = $conn->query("SELECT COUNT(*) as total FROM donations WHERE user_email = '$email'");
if ($result) {
    $data = $result->fetch_assoc();
    $donations_count = $data['total'];
}

// Update user information in the database
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["change_password"])) {
        // Password change form is submitted
        $current_password = $_POST["current_password"];
        $new_password = $_POST["new_password"];
        $confirm_new_password = $_POST["confirm_new_password"];

        // Validate the current password (You might want to check if it matches the one in the database)
        if (!password_verify($current_password, $password)) {
            // Incorrect current password
            $_SESSION["updated"] = "failure";
            $_SESSION["error_msg"] = "Old password is incorrect. Please try again.";
        } elseif (strlen($new_password) < 6) {
            // Validate the new password (You can add more validation rules if needed)
            $_SESSION["updated"] = "failure";
            $_SESSION["error_msg"] = "Password must be at least 6 characters long.";
        } elseif ($new_password !== $confirm_new_password) {
            // New password and Confirm new password do not match
            $_SESSION["updated"] = "failure";
            $_SESSION["error_msg"] = "New password and Confirm new password do not match.";
        } else {
            // Hash the new password before updating in the database
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $stmt = $conn->prepare("UPDATE register SET password=? WHERE email=?");
            if (!$stmt) {
                die("Error: " . $conn->error);
            }
            $stmt->bind_param("ss", $hashed_password, $email);
            $stmt->execute();
            $stmt->close();

            // Show success message
            $_SESSION["updated"] = "success";
        }
    } else if(isset($_POST["submitReview"])) {
        $review = $_POST["review_text"];
        // echo $_SESSION["sche"];
        $stmt = $conn->prepare("UPDATE donor SET review = ? WHERE email = ? AND schedule_date = ?");
        if (!$stmt) {
            die("Error: " . $conn->error);
        }
        $stmt->bind_param("sss", $review, $email, $_SESSION["sche"]);
        $stmt->execute();
        $stmt->close();
        $_SESSION["reviewDone"] = true;
        // $_SESSION["review"] = "done";
    }
    else {
        if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
            // Debugging: print the $_FILES array
            echo '<pre>';
            print_r($_FILES);
            echo '</pre>';
        
            // Get the temporary file path
            $image = $_FILES["profile_image"]["tmp_name"];
        
            // Read the file content and escape it for the database
            $imgData = addslashes(file_get_contents($image));
        
            // Update the database with the new image data
            $sql = "UPDATE register SET profile_image = '$imgData' WHERE email = '$email'";
        
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $conn->error;
            } else {
                // Fetch the updated image data from the database
                $sql = "SELECT profile_image FROM register WHERE email = '$email'";
                $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $imageData = $row['profile_image'];
        
                    // Encode the binary data to Base64
                    $base64Image = base64_encode($imageData);
        
                    // Create the data URL
                    $imageSrc = 'data:image/jpeg;base64,' . $base64Image; // Adjust the mime type if necessary
        
                    // Store the data URL in session
                    // echo $imageSrc;
                    $_SESSION['imageSrc'] = $imageSrc;
                    header("Location: ../../dashboard.php");
                    exit();
                } else {
                    // echo "No image found for this user.<br>";
                    $_SESSION['imageSrc'] = ''; // Clear the session variable if no image is found
                    header("Location: ../../dashboard.php");
                    exit();
                }
            }
        } else {
            // Handle errors or missing file
            if (isset($_FILES["profile_image"])) {
                switch ($_FILES["profile_image"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        $_SESSION['imageError'] = 'File is too large.';
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $_SESSION['imageError'] = 'File upload was partial.';
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $_SESSION['imageError'] = 'No file was uploaded.';
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $_SESSION['imageError'] = 'Missing temporary folder.';
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $_SESSION['imageError'] = 'Failed to write file to disk.';
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        $_SESSION['imageError'] = 'File upload stopped by extension.';
                        break;
                    default:
                        $_SESSION['imageError'] = 'Unknown upload error.';
                        break;
                }
            } else {
                echo "No file uploaded.";
            }
        }
        // else {
        //     $_SESSION['imageData'] = "Losser";
        // }
        // Other credentials form is submitted
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $bloodgroup = $_POST["bloodgroup"];
        $gender = $_POST["gender"];
        $birthdate = $_POST["birthdate"];
        $weight = $_POST["weight"];
        $state = $_POST["state"];
        $zipcode = $_POST["zipcode"];
        $city = $_POST["city"];
        $area = $_POST["area"];
        $landmark = $_POST["landmark"];

        $stmt = $conn->prepare("UPDATE register SET full_name=?, phone_number=?, blood_group=?, birth_date=?, gender=?, weight=?, state=?, city=?, zip_code=?, area=?, landmark=? WHERE email=?");
        if (!$stmt) {
            die("Error: " . $conn->error);
        }
        $stmt->bind_param("ssssssssssss", $name, $phone, $bloodgroup, $birthdate, $gender, $weight, $state, $city, $zipcode, $area, $landmark, $email);
        $stmt->execute();
        $stmt->close();

        // Show success message
        $_SESSION["updated_details"] = "success";
    }

    header("Location: ../../dashboard.php");
    exit();
}
$conn->close();
?>