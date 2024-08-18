<?php

require_once __DIR__ . "/../config/session.php";
// require_once __DIR__."/../public/signup.classes.php";
class SignupContr extends Signup
{
    private $sender_company_name;
    private $sender_company_address;
    private $sender_company_email;
    private $company_website;
    private $sender_fname;
    private $sender_lname;
    private $origin_office;
    private $product_name;
    private $quantity;
    private $shipping_cost;
    private $clearance_cost;
    private $description;
    private $receiver_fname;
    private $receiver_lname;
    private $receiver_address;
    private $receiver_phone;
    private $destination_office;
    private $order_id;
    private $tracking_no;

   

    // for image validation
    private $logo;
    private $image_name; //the image name
    private $image_type; // the image type
    private $image_size; // the image size
    private $image_temp; //the temporary location where the uploaded image is stored
    // the upload folder should be created in the same folder that the include/final execution file is
    private $uploads_folders = "./log/"; // the uplodas folder
    private $upload_max_size = 2 * 1024 * 1024; // setting the max upload file size to 2MB
    //property to hold an array of allowed image types

    private $allowed_image_types = ["image/jpg", "image/jpeg", "image/png", "image/gif"];

    //property to store validation error
    //setting it to public to have access to it from the index file

    public $error;
    // public $verification;


    public function __construct($sender_company_name, $sender_company_address, $sender_company_email, $company_website, $sender_fname, $sender_lname, $origin_office, $product_name, $quantity, $shipping_cost, $clearance_cost, $description, $files, $receiver_fname, $receiver_lname, $receiver_address, $receiver_phone, $destination_office, $order_id, $tracking_no)
    {
        $this->sender_company_name = $sender_company_name;
        $this->sender_company_address = $sender_company_address;
        $this->sender_company_email = $sender_company_email;
        $this->company_website = $company_website;
        $this->sender_fname = $sender_fname;
        $this->sender_lname = $sender_lname;
        $this->origin_office = $origin_office;
        $this->product_name = $product_name;
        $this->quantity = $quantity;
        $this->shipping_cost = $shipping_cost;
        $this->clearance_cost = $clearance_cost;
        $this->description = $description;
        $this->receiver_fname = $receiver_fname;
        $this->receiver_lname = $receiver_lname;
        $this->receiver_address = $receiver_address;
        $this->receiver_phone = $receiver_phone;
        $this->destination_office = $destination_office;
        $this->order_id = $order_id;
        $this->tracking_no = $tracking_no;

        // fpr image
        // Use $files['product_image'] instead of $files['image']
        $this->image_name = $files['logo']['name'] ?? '';
        $this->image_size = $files['logo']['size'] ?? 0;
        $this->image_temp = $files['logo']['tmp_name'] ?? '';
        $this->image_type = $files['logo']['type'] ?? '';
    }

    private function emptyInput()
    {
        $result = 0;
        if (empty($this->sender_company_name) || empty($this->sender_company_address) || empty($this->sender_company_email) || empty($this->company_website) || empty($this->sender_fname) || empty($this->sender_lname) || empty($this->origin_office) || empty($this->product_name) || empty($this->quantity) || empty($this->shipping_cost) || empty($this->clearance_cost) || empty($this->description) || empty($this->receiver_fname) || empty($this->receiver_lname) || empty($this->receiver_address) || empty($this->receiver_phone) || empty($this->destination_office) || empty($this->order_id) || empty($this->tracking_no) || empty($this->image_name)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

   
   

    private function invalidEmail()
    {
        $result = 0;
        if (!filter_var($this->sender_company_email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidWebsite()
    {
        $result = 0;
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $this->company_website)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

  
    // methods for image validation

    private function isImage()
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        $mime = finfo_file($finfo, $this->image_temp);
        if (!in_array($mime, $this->allowed_image_types)) {
            return $this->error = "Only [.jpg, .jpeg, .png, and .gif] files are allowed";
        }
        finfo_close($finfo);
    }

    // we need a method to validate the image's name
    //  the method will return the sanitized image name, so we are sure that it is save to store the name in the database

    private function imageNameValidation()
    {
        return $this->image_name = filter_var($this->image_name, FILTER_SANITIZE_STRING);
    }





    // we need a method to validate the max upload size
    // the method will return an error if the file's size exceeds the 2MB limit

    private function sizeValidation()
    {
        if ($this->image_size > $this->upload_max_size) {
            return $this->error = "File is too large";
        }
    }

    // we need to check if the file already exists in the folder
    // the method will return an error if the file exists

    private function checkFile()
    {
        if (file_exists($this->uploads_folders . $this->newName())) {
            return $this->error = "File already exists in the folder";
        }
    }

    // we will move the file from our temporary storage to the uploads folder
    // when we're uploading a file, php is storing that file to a temporary location in the server. Then we have to move the file to our uploads folder



    private function newName()
    {
        return "influence" . md5($this->image_name);
    }




    private function moveFile()
    {

        // initially the #3 was $this->image_name, but the because it was appearing in the upload folder as the default image name and appeared in the database as the encrypted name, i have to change it here to the newNname,,,with the method created
        // i switched it back to image name because i am trying something
        if (!move_uploaded_file($this->image_temp, $this->uploads_folders . $this->newName())) {
            return $this->error = "There was an error, please try again";
        }
    }

    private function set_message($type, $message)
    {
        $_SESSION[$type] = $message;
    }




    public function signUser()
    {
        if ($this->emptyInput() == true) {
            $this->set_message("error", "Fields cannot be empty");
            header("Location: ../index.php?error=emptyfields");
            exit();
        }

       
        if ($this->invalidEmail() == false) {
            $this->set_message("error", "Invalid Email format");
            header("Location: ../index.php?error=invalidEmail");
            exit();
        }

        if ($this->invalidWebsite() == false) {
            $this->set_message("error", "Invalid format");
            header("Location: ../index.php?error=invalidnameformat");
            exit();
        }

       
        // for the image aspect
        $this->isImage();
        $this->imageNameValidation();
        $this->sizeValidation();
        $this->checkFile();
        $this->newName();

        if ($this->error == null) {
            $this->moveFile();
        }
        $this->set_message("success", "Registration successful");
        // Generate 6-digit verification code
        // $verificationCode = rand(100000, 999999);

        // set expiration time to 3 minutes
        // $expirationTime = date("Y-m-d H:i:s", strtotime('+3 minutes'));



        $this->RegisterUser($this->sender_company_name, $this->sender_company_address, $this->sender_company_email, $this->company_website, $this->sender_fname, $this->sender_lname, $this->origin_office, $this->product_name, $this->quantity, $this->shipping_cost, $this->clearance_cost, $this->description, $this->newName(), $this->receiver_fname, $this->receiver_lname, $this->receiver_address, $this->receiver_phone, $this->destination_office, $this->order_id, $this->tracking_no);
    }


}
