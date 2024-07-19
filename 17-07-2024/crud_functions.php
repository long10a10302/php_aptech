<?php
// crud_functions.php

require_once 'db_connect.php';

$pdo = getPDO();
if (!$pdo) {
    //echo "Connected successfully to the database.";
    // You can perform database operations here
    echo '<p style="color: red;">Connection to db failed</p>';
}
// Create function
function createItem($name)
{
    global $pdo;
    //$_GLOBALS["pdo"] = $pdo;
    $sql = "INSERT INTO tblItem (name) VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name]);
    return $pdo->lastInsertId();
}

// Read function
function readItems($page_number, $page_size)
{
    global $pdo;
    $sql = "SELECT * FROM tblItem LIMIT " . $page_size . " OFFSET " . $page_number * $page_size;
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Update function
function updateItem($id, $newName)
{
    global $pdo;
    $sql = "UPDATE tblItem SET name = :name WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $newName, 'id' => $id]);
    return $stmt->rowCount();
}

// Delete function
function deleteItem($id)
{
    global $pdo;
    $sql = "DELETE FROM tblItem WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->rowCount();
}
function getTotalItemCount()
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM tblitem";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $totalItems = $stmt->fetchColumn();
    return $totalItems;
}
//--------------------------------------------------------------------------------------
function readPersons($page_number, $page_size)
{
    global $pdo;
    $sql = "SELECT * FROM tblPerson LIMIT " . $page_size . " OFFSET " . $page_number * $page_size;
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function readPersonById($id)
{
    $pdo = getPDO();
    $sql = "SELECT * FROM tblPerson WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $person = $stmt->fetch(PDO::FETCH_ASSOC);
    return $person;
}


function createPersons($name, $gender, $day)
{
    global $pdo;
    $sql = "INSERT INTO tblPerson (Name, Gender, DateOfBirth) VALUES (:name, 
                                   CASE WHEN :gender = 'Female' THEN 0
                                        WHEN :gender = 'Male' THEN 1
                                        ELSE NULL
                                   END, :day)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'gender' => $gender, 'day' => $day]);

    return $pdo->lastInsertId();
}

function updatePersons($id, $name, $gender, $day)
{
    global $pdo;
    $sql = "UPDATE tblPerson 
            SET Name = :name,
                Gender = CASE :gender
                    WHEN 'Female' THEN 0
                    WHEN 'Male' THEN 1
                    ELSE NULL
                END,
                DateOfBirth = :day
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'gender' => $gender, 'day' => $day, 'id' => $id]);
    return $stmt->rowCount();
}
function deletePerson($id)
{
    global $pdo;
    $sql = "DELETE FROM tblPerson WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->rowCount();
}
