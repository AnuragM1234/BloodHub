<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "bloodhub";
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT password FROM register WHERE email = ?");
    if (!$stmt) {
        die("Error: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, set session or do any other action
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            // Check if "Remember Me" is checked
            if (isset($_POST["remember_me"]) && $_POST["remember_me"] === "1") {
                $cookie_name = "remember_me_cookie";
                $cookie_value = $email;
                $cookie_expiry = time() + (86400 * 30); // 30 days (86400 seconds per day)
                setcookie($cookie_name, $cookie_value, $cookie_expiry, "/");
            }
            // Redirect the user to the dashboard or any other page
            header("Location: ../../dashboard.php");
            exit();
        } else {
            // echo '<script>alert("Incorrect email or password. Please try again.");</script>';
            $_SESSION["login"] = "failure";
            header("Location: ../../login.php");
            eixt();
        }
    } else {
        // echo '<script>alert("Incorrect email or password. Please try again.");</script>';
        $_SESSION["login"] = "failure";
        header("Location: ../../login.php");
        eixt();
    }
    $stmt->close();
    $conn->close();
}
?>