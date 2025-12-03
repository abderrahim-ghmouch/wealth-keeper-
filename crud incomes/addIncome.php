<?php
    include_once "./database.php";

    $destination = $_POST["destination"];
    $amount = $_POST["amount"];
    $description = $_POST["description"];
    $date_income = $_POST["date_income"];

    $stmt =  $pdo->prepare("INSERT INTO incomes(destination,amount,description,date_income) VALUES(?,?,?,?)");

    $status = $stmt->execute([$destination, $amount, $description, $date_income]);


    if ($status) {
        header("location: /");
        exit();
    }

    echo "Faild Insert Income";
?> 