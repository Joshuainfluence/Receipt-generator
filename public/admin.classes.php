<?php
require_once __DIR__ . "/../config/dbh.php";
class RoutingNumber extends Dbh
{
    protected function updateNo($routingNo)
    {
        $sql = "UPDATE routing SET routeNo = ?";
        $stmt = $this->connection()->prepare($sql);

      
        if (!$stmt->execute([$routingNo])) {
            $stmt = null;
            header("Location: ../admin.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}
