<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $email = $_SESSION["email"];
    $name = isset($_POST["full_name"]) ? htmlspecialchars($_POST["full_name"]) : "";
    $phone = isset($_POST["mobile_number"]) ? htmlspecialchars($_POST["mobile_number"]) : "";
    $bloodgroup = isset($_POST["blood_group"]) ? htmlspecialchars($_POST["blood_group"]) : "";
    $weight = isset($_POST["weight"]) ? htmlspecialchars($_POST["weight"]) : "";
    $height = isset($_POST["height"]) ? htmlspecialchars($_POST["height"]) : "";
    $conditions = isset($_POST["conditions"]) ? htmlspecialchars($_POST["conditions"]) : "";
    $previous_donations = isset($_POST["previous_donations"]) ? htmlspecialchars($_POST["previous_donations"]) : "";
    $last_donation = isset($_POST["last_donation"]) ? htmlspecialchars($_POST["last_donation"]) : "";
    $schedule_date = isset($_POST["schedule_date"]) ? htmlspecialchars($_POST["schedule_date"]) : "";
    $state = isset($_POST["state"]) ? htmlspecialchars($_POST["state"]) : "";
    $city = isset($_POST["city"]) ? htmlspecialchars($_POST["city"]) : "";

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "bloodhub";
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
    $stmt = $conn->prepare("INSERT INTO donor (email, name, contact_number, blood_group, weight, medical_conditions, height, last_donation, schedule_date, state, city) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error: " . $conn->error);
    }
    $stmt->bind_param("sssssssssss", $email, $name, $phone, $bloodgroup, $weight, $conditions, $height, $last_donation, $schedule_date, $state, $city);
    if ($stmt->execute()) {
        echo '<script>alert("Registration for Donation successful!");</script>';
        $_SESSION["donate"] = "success";
        $_SESSION["schedule"] = "success";
    } else {
        echo '<script>alert("Error: Unable to register. Please try again later.");</script>';
        $_SESSION["donate"] = "failure";
    }
    header("Location: ../../donate.php");
    exit();
    $stmt->close();
    $conn->close();
}
?>