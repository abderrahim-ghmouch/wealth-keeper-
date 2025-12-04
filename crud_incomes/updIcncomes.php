<?php
include_once "./database.php";

$id = $_POST["id"];
$destination = $_POST["destination"];
$amount = $_POST["amount"];
$description = $_POST["description"];
$date_income = $_POST["date_income"];

$stmt = $pdo->prepare( "UPDATE incomes SET destination = ?, amount = ?, description = ?, date_income = ? WHERE id = ?"
);

$status = $stmt->execute([$destination, $amount, $description, $date_income, $id]);

if ($status) {
    header("location: /");
    exit();
}

echo "Failed UPDATE Income";
?>
