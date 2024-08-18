<?php
require_once __DIR__ . "/../config/dbh.php";
class Receipt extends Dbh
{
    protected function showReceipt($order_id)
    {
        $sql = "SELECT * FROM receipt WHERE order_id = ?";
        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$order_id])) {
            $stmt = null;
            exit();
        }
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }
}
