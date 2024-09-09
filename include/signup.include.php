<?php 

// checking is the form was submitted successfully
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // fetching out the details from the form
    
    $order_id = rand(0000, 9999); 
    $tracking_no = rand(00000000, 99999999);
    $sender_company_name = htmlspecialchars($_POST['sender_company_name'], ENT_QUOTES, 'UTF-8');
    $sender_company_address = htmlspecialchars($_POST['sender_company_address'], ENT_QUOTES, 'UTF-8');
    $sender_company_email = htmlspecialchars($_POST['sender_company_email'], ENT_QUOTES, 'UTF-8');
    $company_website = htmlspecialchars($_POST['sender_company_website'], ENT_QUOTES, 'UTF-8');
    $sender_fname = htmlspecialchars($_POST['sender_fname'], ENT_QUOTES, 'UTF-8');
    $sender_lname = htmlspecialchars($_POST['sender_lname'], ENT_QUOTES, 'UTF-8');
    $origin_office = htmlspecialchars($_POST['origin_office'], ENT_QUOTES, 'UTF-8');
    $product_name = htmlspecialchars($_POST['product_name'], ENT_QUOTES, 'UTF-8');
    $quantity = htmlspecialchars($_POST['quantity'], ENT_QUOTES, 'UTF-8');
    $shipping_cost = htmlspecialchars($_POST['shipping_cost'], ENT_QUOTES, 'UTF-8');
    $clearance_cost = htmlspecialchars($_POST['clearance_cost'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
    $receiver_fname = htmlspecialchars($_POST['receiver_fname'], ENT_QUOTES, 'UTF-8');
    $receiver_lname = htmlspecialchars($_POST['receiver_lname'], ENT_QUOTES, 'UTF-8');
    $receiver_address = htmlspecialchars($_POST['receiver_address'], ENT_QUOTES, 'UTF-8');
    $receiver_phone = htmlspecialchars($_POST['receiver_phone'], ENT_QUOTES, 'UTF-8');
    $destination_office = htmlspecialchars($_POST['destination_office'], ENT_QUOTES, 'UTF-8');
    $routingNo = htmlspecialchars($_POST['routingNo'], ENT_QUOTES, 'UTF-8');

   
   
    // remaining the profile image
    $logo = isset($_POST['logo']) ? $_FILES['logo'] : null;
    

    // including all necessary files
    require_once __DIR__. "/../config/dbh.php";
    require_once __DIR__. "/../config/session.php";
    require_once __DIR__. "/../public/signup.classes.php";
    require_once __DIR__. "/../public/signup.contr.php";

    // With the help of require_once we are able to get the signup controller class 
    // which is responsible for all form validation 
    $signup = new SignupContr($sender_company_name, $sender_company_address, $sender_company_email, $company_website, $sender_fname, $sender_lname, $origin_office, $product_name, $quantity, $shipping_cost, $clearance_cost, $description, $_FILES, $receiver_fname, $receiver_lname, $receiver_address, $receiver_phone, $destination_office, $order_id, $tracking_no, $routingNo);

    // signUser is a method created in the controller class for final execution 
    // header("Location: ../sendEmail/send.php?error=none");
    // header("Location: ../sendEmail/send.php?error=none");
    // header("Location: ../sendEmail/send.php?error=none");
    $signup->signUser();
    header("Location: ../receipt.php?order_id=$order_id");

    
    
}