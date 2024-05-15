<?php 
// Include the configuration file
require_once('config.php');

// Get the registration number from the URL parameter
$reg_no = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Registration</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style type="text/css">
        /* Define CSS styles here */
        @page {size: auto; margin:10em; margin-right:-70px; margin-left:-70px;}
        @media print{
            a[href]:after{
                content:none !important;
            }
            #printbtn{
                display:none !important;
            }
            .main-heading {
                font-size:30px !important;
            }
            .underline {
                line-height:27px !important;
                text-decoration-style: dotted !important;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1"></div>
            <!-- Main content area -->
            <div class="col-sm-10" style="border:2px solid black; padding:10px;">
                <?php
                // Fetch registration details from the database based on the registration number
                $sql = "SELECT * FROM registrations WHERE reg_no=:reg_no";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':reg_no', $reg_no, PDO::PARAM_STR);
                $stmt->execute();
                $rows = $stmt->fetchAll();
                foreach($rows as $row) {
                ?>
                <!-- Display registration details -->
                <div class="row">
                    <div class="col-2">
                        <img src="logo.PNG" href="logo.png">
                    </div>
                    <div class="col">
                        <div class="main-heading">Mega Creative Global Tech</div>
                        <p class="sub-heading">Think Digital For Community Development</p>
                        <div class="address">
                            Address: D3-1 NIPOST plaza NEAR EFCC junction Gombe State, Nigera,<br>  S10 Urwa Plaza Amingo Junction Tudun wada, Kaduna State, Nigeria.
                        </div>
                        <p class="email">Website: creativeglobaltech@gmail.com, PhoneNo: +2348146768076 Website: https://www.genglobal.org/node/116170</p> 
                    </div>
                    <div class="col-sm-12">
                        <hr class="hrcls">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"></div>
                </div>
                <div class="col-sm-8" style="text-align: center; padding-bottom: 5px;">
                    <h3><u>Registration form</u></h3>
                </div>
                <div class="col-sm-2"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" style="float:right;">
                            <label class="label">Photo</label>
                            <div style="width: 150px;">
                                <img src="uploads/<?php echo $row['image']; ?>" width="150" height="150">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Display other form fields -->
                <!-- Code for other form fields goes here -->
                <?php } ?>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
    <!-- Print button -->
    <center><button type="button" class="btn btn-warning" id="printbtn" onclick="window.print()">Print Form</button></center>
</body>
</html>

