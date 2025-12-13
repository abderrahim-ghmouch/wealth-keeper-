<?php
include_once "../database.php";

// Get form data - MATCH YOUR TABLE COLUMNS!
$destination = $_POST["destination"];    // ✅ CORRECT for your table
$amount = $_POST["amount"];
$description = $_POST["description"];
$date_expense = $_POST["date_expense"];  // ✅ CORRECT for your table

// Insert into expenses table with YOUR column names
$stmt = $db->prepare("INSERT INTO expenses (destination, amount, description, date_expense) VALUES (?, ?, ?, ?)");
$status = $stmt->execute([$destination, $amount, $description, $date_expense]);

if ($status) {
    header("location: ../expences.php");
    exit();
}

echo "Failed to insert expense";