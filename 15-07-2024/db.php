<?php
require_once 'db_connect.php';

function getItemLimit($limit, $offset)
{
    global $pdo;

    try {
        $sql = "SELECT * FROM tblitem LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $items;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return [];
    }
}
