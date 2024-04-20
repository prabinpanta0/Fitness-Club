<?php
session_start();
include "./conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful";
            // You can set session variables or redirect the user to another page after successful login
            header("Location: ../html/dashboard.php");
            $_SESSION['email'] = $email;
        } else {
            echo "Invalid password";
            header("Location: ../html/login.php?error=Invalid password");
            exit();
        }
    } else {
        echo "Account not found";
        header("Location: ../html/login.php?error=Account not found");
        exit();
    }
}

$conn->close();
?>
