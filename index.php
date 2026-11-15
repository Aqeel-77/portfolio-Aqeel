<?php
require "db.php";

$about    = $conn->query("SELECT * FROM about LIMIT 1")->fetch_assoc();
$skills   = $conn->query("SELECT * FROM skills ORDER BY id");
$projects = $conn->query("SELECT * FROM projects ORDER BY id");

$status = $_GET["status"] ?? "";
function e($text) {
    return htmlspecialchars($text, ENT_QUOTES, "UTF-8");
}


include "index.html";