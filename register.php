<?php
include "db.php"; // This uses the PDO connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userType = $_POST["userType"];

    // ✅ Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, "@gmail.com")) {
        die("Invalid Gmail address.");
    }

    // ✅ Validate password
    if (strlen($password) < 6) {
        die("Password must be at least 6 characters.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // ✅ Use PDO prepared statement
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $hashedPassword, $userType]);

        echo "<script>
        alert('Registration successful!');
        window.location.href = 'Rinl.html';
        </script>";
        exit;

    } catch (PDOException $e) {
        echo "<script>
        alert('Registration failed: " . addslashes($e->getMessage()) . "');
        window.history.back();
        </script>";
        exit;
    }
}
?>
