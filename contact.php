<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = trim($_POST["name"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $message === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?status=error#contact");
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO messages (sender_name, sender_email, message) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php?status=success#contact");
    exit;
}

header("Location: index.php");
exit;