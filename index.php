<?php
require_once __DIR__ . "/config/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap5.min.css" />
    <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/sweetalert/jquery-3.6.4.min.js"></script>
</head>

<body>
    <style>
        .script {
            z-index: 9999;
        }
    </style>
    <div class="script">
        <script>
            window.onload = function() {
                <?php if (isset($_SESSION['success'])) : ?>
                    Swal.fire("Success", "<?= $_SESSION['success'] ?>", "success");
                <?php endif ?>

                <?php if (isset($_SESSION['error'])) : ?>
                    Swal.fire("Error", "<?= $_SESSION['error'] ?>", "error");
                <?php endif ?>
            };
        </script>
    </div>
    <?php
    if (isset($_SESSION['success'])) :
        echo '<script>console.log("Success message: ' . $_SESSION['success'] . '");</script>';
    endif;

    if (isset($_SESSION['error'])) :
        echo '<script>console.log("Error message: ' . $_SESSION['error'] . '");</script>';
    endif;
    ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center text-primary">INFLUENCE RECEIPT GENERATOR</h3>
                        <h3 class="text-center">Generate Your reciept</h3>
                        <form action="include/signup.include.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <h3>Sender</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="sender_company_name" id="floatingInput" class="form-control"
                                    placeholder="Enter your Company name" />
                                <label for="floatingInput">Enter Company name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="sender_company_address" id="floatingInput" class="form-control"
                                    placeholder="Enter your Address" />
                                <label for="floatingInput">Enter Company Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="sender_company_email" id="floatingInput" class="form-control"
                                    placeholder="Enter your Email" />
                                <label for="floatingInput">Enter Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="sender_company_website" id="floatingInput" class="form-control"
                                    placeholder="Enter your Email" />
                                <label for="floatingInput">Enter Company Website</label>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="sender_fname" id="floatingInput" class="form-control"
                                            placeholder="Enter sender first name" />
                                        <label for="floatingInput">Enter Sender first name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="sender_lname" id="floatingInput" class="form-control"
                                            placeholder="Enter sendder Email" />
                                        <label for="floatingInput">Enter Sender last name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- </div> -->
                            <div class="form-floating mb-3">
                                <input type="text" name="origin_office" id="floatingInput" class="form-control"
                                    placeholder="Enter your username" />
                                <label for="floatingInput">Enter Orgin office</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="product_name" id="floatingInput" class="form-control"
                                    placeholder="Enter your username" />
                                <label for="floatingInput">Enter Product name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="quantity" id="floatingInput" class="form-control"
                                    placeholder="Enter your username" />
                                <label for="floatingInput">Enter Quantiy</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="shipping_cost" id="floatingInput" class="form-control"
                                    placeholder="Enter your username" />
                                <label for="floatingInput">Enter Shipping cost</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="clearance_cost" id="floatingInput" class="form-control"
                                    placeholder="Enter your username" />
                                <label for="floatingInput">Enter Clearance cost</label>
                            </div>
                            <div class="form-group mb-3">

                                <textarea type="text" name="description" id="" class="form-control"
                                    placeholder="Enter Product description"></textarea>

                            </div>
                            <div class="form-group mb-3">
                                <label for="">Company Logo</label>
                                <input type="file" name="logo" class="form-control" id="" />
                            </div>

                            <div class="form-group mt-2">
                                <h3>Receiver</h3>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="receiver_fname" id="floatingInput" class="form-control"
                                            placeholder="Enter sender first name" />
                                        <label for="floatingInput">Enter Receiver first name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="receiver_lname" id="floatingInput" class="form-control"
                                            placeholder="Enter sendder Email" />
                                        <label for="floatingInput">Enter Receiver last name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="receiver_phone" id="floatingInput" class="form-control"
                                    placeholder="Enter your Company name" />
                                <label for="floatingInput">Enter Receiver Phone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="receiver_address" id="floatingInput" class="form-control"
                                    placeholder="Enter your Company name" />
                                <label for="floatingInput">Enter Receiver Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="destination_office" id="floatingInput" class="form-control"
                                    placeholder="Enter your Company name" />
                                <label for="floatingInput">Enter Destination Office</label>
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" value="Generate" class="btn btn-primary w-100 btn-lg" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
<?php unset($_SESSION['success']);
unset($_SESSION['error']) ?>