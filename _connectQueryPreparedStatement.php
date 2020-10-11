<?php

$dbPassword = "MEe566JIR6MLTkU9";
$dbUserName = "PHPdatabase";
$dbServer = "localhost";
$dbName = "todos";

$connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);

if ($connection->connect_errno) {
    exit("Database connection failed. Reason:".$connection->connect_error);
}

$searchTerm = "header";
$query = "SELECT header, description, dueDate FROM `t_todos` WHERE MATCH(header) AGAINST(?)";
$statementObject = $connection->prepare($query);

$statementObject->bind_param("s", $searchTerm);
$statementObject->execute();

$statementObject->bind_result($header, $description, $dueDate);
$statementObject->store_result();

if ($statementObject->num_rows > 0) {
    while ($statementObject->fetch()) 
    {
        $dueDate ?? "No due date";
        echo "Todo Item: ".$header.", ".$description.". Due Date: ".$dueDate;
        echo "<br/>";
    }
}

$statementObject->close();

$connection->close();