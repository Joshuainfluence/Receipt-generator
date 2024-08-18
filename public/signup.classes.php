<?php
require_once __DIR__ . "/../config/dbh.php";

class Signup extends Dbh
{

    // to insert users into the database or signup users
    protected function RegisterUser($sender_company_name, $sender_company_address, $sender_company_email, $company_website, $sender_fname, $sender_lname, $origin_office, $product_name, $quantity, $shipping_cost, $clearance_cost, $description, $logo, $receiver_fname, $receiver_lname, $receiver_address, $receiver_phone, $destination_office, $order_id, $tracking_no)
    {
        $sql = "INSERT INTO receipt(send_company_name, sender_company_address, sender_company_email, sender_company_website, sender_fname, sender_lname, origin_office, product_name, quantity, shipping_cost, clearance_cost, description, logo, receiver_fname, receiver_lname, receiver_address, receiver_phone, destination_office, order_id, tracking_no) VALUES(:send_company_name, :sender_company_address, :sender_company_email, :sender_company_website, :sender_fname, :sender_lname, :origin_office, :product_name, :quantity, :shipping_cost, :clearance_cost, :description, :logo, :receiver_fname, :receiver_lname, :receiver_address, :receiver_phone, :destination_office, :order_id, :tracking_no)";
        $statement = $this->connection()->prepare($sql);

        
        $statement->bindParam(':send_company_name', $sender_company_name);
        $statement->bindParam(':sender_company_address', $sender_company_address);
        $statement->bindParam(':sender_company_email', $sender_company_email);
        $statement->bindParam(':sender_company_website', $company_website);
        $statement->bindParam(':sender_fname', $sender_fname);
        $statement->bindParam(':sender_lname', $sender_lname);
        $statement->bindParam(':origin_office', $origin_office);
        $statement->bindParam(':product_name', $product_name);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':shipping_cost', $shipping_cost);
        $statement->bindParam(':clearance_cost', $clearance_cost);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':receiver_fname', $receiver_fname);
        $statement->bindParam(':receiver_lname', $receiver_lname);
        $statement->bindParam(':receiver_address', $receiver_address);
        $statement->bindParam(':receiver_phone', $receiver_phone);
        $statement->bindParam(':destination_office', $destination_office);
        $statement->bindParam(':order_id', $order_id);

        $statement->bindParam(':tracking_no', $tracking_no);

        $statement->bindParam(':logo', $logo);



        if (!$statement->execute()) {
            $statement = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        $statement = null;
    }

 
}
