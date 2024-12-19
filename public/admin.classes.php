<?php
require_once __DIR__ . "/../config/dbh.php";
class RoutingNumber extends Dbh
{
    protected function updateNo($routingNo)
    {
        $sql = "UPDATE routing SET (routeNo) VALUE (:routeNo)";
        $stmt = $this->connection()->prepare($sql);

        $stmt->bindParam(':routingNo', $routingNo);
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../admin.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}
