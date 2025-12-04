<?php
include_once "./database.php";
$destination = $_POST["destination"];
$amount = $_POST["amount"];
$description = $_POST["description"];
$date_income = $_POST["date_income"];

$stmt = $pdo->prepare("delete from incomes where id=?");

$status = $stmt->execute([$id]);

if ($status) {
    header("location: /");
    exit();
}

echo "Failed" ;

?>
