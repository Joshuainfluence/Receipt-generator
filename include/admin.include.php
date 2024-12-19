<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $routingNo = $_POST['routeNo'];

    require_once __DIR__. "/../config/dbh.php";
    require_once __DIR__. "/../public/admin.classes.php";
    require_once __DIR__. "/../public/admin.contr.php";

    require_once __DIR__. "/../config/session.php";

    $number = new RoutingNumberContr($routingNo);

    $number->noUpdate();
    header("Location: ../admin.php?update saved");


}