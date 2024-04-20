<?php
session_start();

include "./conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['Gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $mem_type = $_POST['mem_type'];
    $mem_duration = $_POST['mem_duration'];
    $hashed_password = password_hash($password, PASSWORD_ARGON2I);

    // Check if file upload is successful
    if ($_FILES['Media']['error'] !== UPLOAD_ERR_OK) {
        $error_message = "File upload failed with error code: " . $_FILES['Media']['error'];
        header("Location: ../html/createacc.php?error=" . urlencode($error_message));
        exit();
    }

    $imgnewfile = file_get_contents($_FILES['Media']['tmp_name']);

    $check_query = "SELECT * FROM `users` WHERE `email` = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $check_result = $stmt->get_result();
    $stmt->close();

    if ($check_result->num_rows > 0) {
        $error_message = "Account already exists";
        header("Location: ../html/createacc.php?error=" . urlencode($error_message));
        exit();
    } else {
        $sql = "INSERT INTO users (name, Gender, Age, email, password, address, profile_pic, membership, duration) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissssss", $name, $gender, $age, $email, $hashed_password, $address, $imgnewfile, $mem_type, $mem_duration);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Account created successfully";
            $_SESSION['email'] = $email;
            header("Location: ../html/dashboard.php");
            exit();
        } else {
            $error_message = "Error: " . $conn->error;
            header("Location: ../html/createacc.php?error=" . urlencode($error_message));
            exit();
        }
        $stmt->close();
    }
} else {
    $error_message = "Error: No POST request received";
    echo $error_message;
    header("Location: ../html/createacc.php?error=" . urlencode($error_message));
    exit();
}

$conn->close();
?>
