<?php
$unique_id = $_GET['order_id'];
require_once __DIR__ . "/config/dbh.php";

require_once __DIR__ . "/public/receipt.classes.php";
require_once __DIR__ . "/public/receipt.contr.php";
$datas = new ReceiptContr($unique_id);
$datas = $datas->receiptShow();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

</head>
<style>
    body {
        padding: 1rem 1rem 1rem 1rem;
        max-width: 700px;
        height: 700px;
        border: 0px solid red;
        font-family: sans-serif;
        color: #333;
    }

    .container {
        padding: 1rem 1rem 1rem 1rem;

        background: #fff;
        width: 100%;
        height: 100%;
        border: 0px solid green;
        display: flex;
        flex-direction: column;
    }

    .row {
        width: 60px;
        height: 45px;
        border: 0px solid black;
    }

    img {
        width: 100%;
        height: 100%;
    }

    .row-trackship {
        width: 100%;
        height: 100px;
        border: 0px solid blue;
        display: flex;
    }

    .col-trackship {
        width: 70%;
        height: 100%;
        border: 0px solid orange;
    }

    .col2-trackship {
        width: 30%;
        height: 100%;
        border: 0px solid orange;
    }

    .col-trackship h4 {
        color: #ad201c;
    }

    .row-name {
        width: 100%;
        height: 80px;

    }

    .row-name h4 {
        font-size: 0.8rem;
        text-align: center;
        line-height: 0.2;
        color: #1e741b;
        font-weight: 800;

    }

    .row-details {
        width: 100%;
        height: auto;
        border: 0px solid black;
        display: flex;
    }

    .col-details {
        width: 33%;
        height: 100%;
        border: 0px solid green;
    }

    .col2-details {
        width: 33%;
        height: 100%;
        border: 0px solid green;

    }

    .col3-details {
        width: 33%;
        height: 100%;
        border: 0px solid green;
        text-align: center;
        font-size: 0.9rem;
    }

    .col3-details img {
        width: 100%;
        height: 36%;
        margin-top: 0.3rem;

    }

    .col-details h4:nth-child(1),
    .col2-details h4:nth-child(1) {
        font-size: 0.6rem;
        font-weight: 800;
        color: #262456;

    }

    .col-details h4:nth-child(2),
    .col2-details h4:nth-child(2) {
        font-size: 0.9rem;
        font-weight: 600;
        /* line-height: 0.2rem; */
    }

    .col-details h4:nth-child(3),
    .col-details h4:nth-child(4),
    .col2-details h4:nth-child(4),
    .col2-details h4:nth-child(5),

    .col2-details h4:nth-child(3) {
        font-size: 0.6rem;
        font-weight: 500;

        /* line-height: 0.2rem; */
    }

    .row-order {
        width: 100%;
        height: auto;
        border: 0px solid green;
        display: flex;

    }

    .col-order {
        width: 0%;

    }

    .col2-order {
        width: 50%;
        height: 100%;
        /* text-align: end; */
        /* text-justify:inter-word; */
        /* display: flex; */
        /* flex-direction: column; */
        /* align-items: end; */

    }


    .col2-order h4:nth-child(1),
    .col2-order h4:nth-child(2),
    .col2-order h4:nth-child(3),
    .col2-order h4:nth-child(4) {
        font-size: 0.6rem;
        font-weight: 600;
        line-height: 0.2rem;
    }

    .contain-table {
        width: 100%;
    }

    table,
    tr {
        width: 100%;
        font-size: 0.6rem;
    }

    tr,
    th {
        text-align: start;
    }

    tr td {
        color: #909090;
        background: #f9f9f9;
    }

    td div {
        width: 100%;
        height: 20px;
        background: #03a35e;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        border-radius: 2px;
        border: 0px solid #c4f6e5;
    }

    .row-payment {
        width: 100%;
        height: 200px;
        border: 0px solid red;
        display: flex;
    }

    .col-payment,
    .col-payment,
    .col-payment {
        width: 33.5%;
        border: 0px solid blue;
    }

    .col-payment img {
        width: 100%;
        height: 50%;
    }

    .col-payment:nth-child(2) img {
        width: 50%;
        height: 50%;
    }

    .col-payment:nth-child(3) img {
        width: 50%;
        height: 40%;
    }

    #saveImage {
        margin: 1rem 0 0 0;
        width: 150px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #333;
        color: #ccc;
        font-size: 0.9rem;
        border: 1px solid #333;
        border-radius: 2px;
    }
</style>

<body>


    <div class="container">
        <?php
        foreach ($datas as $row):
        ?>
            <div class="row">
                <img src="include/log/<?= $row['logo'] ?>" alt="">
            </div>
            <div class="row-trackship">
                <div class="col-trackship">
                    <h4>Tracking Number: PRO-<?= $row['tracking_no'] ?></h4>
                </div>
                <div class="col2-trackship">
                    <img src="assets/img/Screenshot 2024-08-17 090838.png" alt="">
                </div>
            </div>
            <div class="row-name">
                <h4><?= $row['send_company_name'] ?> Company</h4>
                <h4>Address: <?= $row['sender_company_address'] ?></h4>

                <h4>Email: <?= $row['sender_company_email'] ?></h4>

                <h4>Company Website:<?= $row['sender_company_website'] ?></h4>

            </div>
            <div class="row-details">
                <div class="col-details">
                    <h4>FROM (SENDER)</h4>
                    <h4><?= $row['sender_fname'] . " " . $row['sender_lname'] ?> </h4>
                    <h4><b>Address: </b> <?= $row['sender_company_address'] ?></h4>
                    <h4><b>Origin Office: </b><?= $row['origin_office'] ?></h4>

                </div>
                <div class="col2-details">
                    <h4>TO (CONSIGNEE)</h4>
                    <h4><?= $row['receiver_fname'] . " " . $row['receiver_lname'] ?></h4>
                    <h4><b>Phone: </b> <?= $row['receiver_phone'] ?></h4>

                    <h4><b>Address: </b> <?= $row['receiver_address'] ?></h4>
                    <h4><b>Destination Office: </b> <?= $row['destination_office'] ?></h4>

                </div>
                <div class="col3-details">
                    <img src="assets/img/qr.png" alt="">
                    PRO-<?= $row['tracking_no'] ?>
                </div>
            </div>
            <div class="row-order">
                <div class="col-order"></div>
                <div class="col2-order">
                    <h4>Order ID:<?= $row['order_id'] ?></h4>
                    <h4>Booking Mode:</h4>
                    <h4><b>Shipping Cost: </b> USD <?= $row['shipping_cost'] ?></h4>
                    <h4><b>Tracking number: </b> PRO-<?= $row['tracking_no'] ?></h4>

                </div>
            </div>
            <div class="contain-table">
                <table>
                    <thead>
                        <tr>
                            <th>
                                Qty
                            </th>
                            <th>
                                Product
                            </th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Shipping cost</th>
                            <th>Clearance cost</th>
                            <th>Total cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $row['quantity'] ?></td>
                            <td><?= $row['product_name'] ?></td>
                            <td>
                                <div>Approved</div>
                            </td>
                            <td><?= $row['description'] ?></td>
                            <td>USD <?= $row['shipping_cost'] ?></td>
                            <td>USD <?= $row['clearance_cost'] ?></td>
                            <td>USD <?= $row['shipping_cost'] + $row['clearance_cost'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row-payment">
                <div class="col-payment">
                    <h4>Payment Methods</h4>
                    <img src="assets/img/payment.png" alt="">
                </div>
                <div class="col-payment">
                    <h4>Official Stamp/ </h4>
                    <img src="assets/img/official.png" alt="">
                    <h4>Amount Due</h4>

                </div>
                <div class="col-payment">
                    <h4>Stamp Duty</h4>
                    <img src="assets/img/stmp.png" alt="">
                </div>
            </div>
        <?php endforeach ?>

    </div>




    <button id="saveImage">Save as Image</button>

    <script>
        const container = document.querySelector('.container');
        document
            .getElementById("saveImage")
            .addEventListener("click", function() {
                html2canvas(container, {
                    onrendered: function(canvas) {
                        // Convert the canvas to an image
                        var imgData = canvas.toDataURL("image/png");

                        // Create a link element to download the image
                        var link = document.createElement("a");
                        link.href = imgData;
                        link.download = "page-image.png";
                        link.click();
                    },
                });
            });
    </script>
</body>

</html>