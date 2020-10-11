<?php

$dbPassword = "MEe566JIR6MLTkU9";
$dbUserName = "PHPdatabase";
$dbServer = "localhost";
$dbName = "todos";

$connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);

if ($connection->connect_errno) {
    exit("Database connection failed. Reason:".$connection->connect_error);
}

$date = date("Y-m-d H:i:s", mktime(5, 55, 0, 03, 23, 2022));

$query = "SELECT idtodogroup, header, description, dueDate, createdDate FROM t_todos ORDER BY dueDate";

// Execute the query.
$results = $connection->query($query);

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) 
    {
        $dueDate = $row['dueDate'] == "" ? "No due date" : $row['dueDate'];
        echo "Todo Item: ".$row['header'].", ".$row['description'].". Due Date: ".$dueDate.PHP_EOL;
        echo "<br/>";
    }
}

$results->close();

$connection->close();