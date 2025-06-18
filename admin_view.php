<?php
$feedbackFile = "feedback.json";
$feedbacks = file_exists($feedbackFile) ? json_decode(file_get_contents($feedbackFile), true) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Customer Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 0 10px #aaa;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #3c8dbc;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f6f6f6;
        }
    </style>
</head>
<body>

<h2>Customer Feedback</h2>

<?php if (!empty($feedbacks)): ?>
    <table>
        <tr>
            <th>Name</th>
            <th>ID No</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Rating</th>
            <th>Message</th>
            <th>Submitted On</th>
        </tr>
        <?php foreach ($feedbacks as $entry): ?>
            <tr>
                <td><?= htmlspecialchars($entry["name"]) ?></td>
                <td><?= htmlspecialchars($entry["idno"] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($entry["email"]) ?></td>
                <td><?= htmlspecialchars($entry["phone"] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($entry["rate"] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($entry["message"]) ?></td>
                <td><?= htmlspecialchars($entry["datetime"] ?? 'N/A') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No feedback submitted yet.</p>
<?php endif; ?>

</body>
</html>
