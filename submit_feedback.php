<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    $rate = htmlspecialchars($_POST["rate"]);
    $idno = htmlspecialchars($_POST["idno"]);
    $phone = htmlspecialchars($_POST["phone"]);

    $newFeedback = [
        "name" => $name,
        "email" => $email,
        "rate" => $rate,
        "idno" => $idno,
        "phone" => $phone,
        "message" => $message,
        "datetime" => date("Y-m-d H:i:s")  // ✅ Add timestamp
    ];

    $file = "feedback.json";
    $existing = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $existing[] = $newFeedback;
    file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT));

    echo "<script>
        alert('Your feedback has been submitted successfully!');
        window.location.href = 'customer.html';
    </script>";
    exit;
}
?>
