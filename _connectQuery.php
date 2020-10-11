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

$query = "DELETE FROM `t_todos` WHERE id = 3";
$query = "UPDATE `t_todos` SET header = 'Update value test' WHERE id = 2";
$query = "INSERT INTO t_todos (idtodogroup, header, description) VALUES (2, 'Test header 3', 'Some random description')";
$query = "INSERT INTO t_todos (idtodogroup, header, description, dueDate) VALUES (2, 'Test header 3', 'Some random description', '$date')";

// Execute the query.
$connection->query($query);

echo "Created todo with id: ".$connection->insert_id;

$connection->close();