<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            if ($user['user_type'] === "customer") {
                echo "<script>
                alert('Customer login successful!');
                window.location.href = 'customer.html'; // ✅ change this to your customer page
                </script>";
            } else if ($user['user_type'] === "admin") {
                echo "<script>
                alert('Admin login successful!');
                window.location.href = 'admin.html';
                </script>";
            }
        } else {
            echo "<script>
            alert('Invalid email or password!');
            window.history.back();
            </script>";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
