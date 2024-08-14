<?php
// crud_functions.php

require_once 'db_connect.php';

$pdo = getPDO();
if (!$pdo) {
    //echo "Connected successfully to the database.";
    // You can perform database operations here
    echo '<p style="color: red;">Connection to db failed</p>';
}
function readEmployees(){
    global $pdo;
    $sql = "SELECT * FROM employees";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function createEmployee($data) {
    global $pdo;
    $sql = "INSERT INTO employees (first_name, last_name, salary) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    return $pdo->lastInsertId();
}

function updateEmployee($data) {
    global $pdo; // Giả sử bạn đã kết nối với database và lưu kết nối vào biến $pdo

    $sql = "UPDATE employees
            SET salary = ?
            WHERE last_name = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    return $stmt->rowCount();
}

function deleteEmployee($data) {
    global $pdo; // Giả sử bạn đã kết nối với database và lưu kết nối vào biến $pdo

    $sql = "DELETE FROM employees 
            WHERE last_name = ?";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([$data]);

    if ($result) {
        return $stmt->rowCount();
    } else {
        return false;
    }
}