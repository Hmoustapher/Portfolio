<?php 
// Include the configuration file
require_once("config.php");

// Check if the form is submitted
if(isset($_POST['form_submit'])) {
    // Sanitize and retrieve form data
    $name = trim($_POST['name']);
    $fname = trim($_POST['fname']);
    $gender=trim($_POST['gender']);
    $dob = trim($_POST['dob']);
    $address = trim($_POST['address']);
    $category = trim($_POST['category']);
    $course = trim($_POST['course']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']); 
    $pay_status = 'PAID';
    $course_fees = '1000';
    $reg_no = "TS" .rand(99,10).time();
    $folder = "uploads/";

    // Photo upload
    $image_file = $_FILES['image']['name'];
    $file = $_FILES['image']['tmp_name'];
    $path = $folder.$image_file;
    $file_name_array = explode(".", $image_file);
    $extension = end($file_name_array);
    $new_image_name = 'photo_'.rand() . '.' . $extension;

    // Signature upload
    $simage_file = $_FILES['simage']['name'];
    $sfile = $_FILES['simage']['tmp_name'];
    $spath = $folder . $simage_file;
    $file_name_array = explode(".", $simage_file);
    $extension = end($file_name_array);
    $snew_image_name = 'sign_' .rand() . '.' . $extension; 

    // Move uploaded photo to the folder
    if($file != '') {
        move_uploaded_file($file, $folder . $new_image_name);
    }

    // Move uploaded signature to the folder
    if($sfile != '') {
        move_uploaded_file($sfile, $folder . $snew_image_name);

        // Insert data into database
        $sql = "INSERT INTO registrations(name, surname, gender, dob, address, category, course, email, mobile, pay_status, course_fees, reg_no, image, sign) VALUES (:name, :surname, :gender, :dob, :address, :category, :course, :email, :mobile, :pay_status, :course_fees, :reg_no, :image, :sign)";

        // Prepare and execute the SQL statement
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':course', $course, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $stmt->bindParam(':pay_status', $pay_status, PDO::PARAM_STR);
        $stmt->bindParam(':course_fees', $course_fees, PDO::PARAM_STR);
        $stmt->bindParam(':reg_no', $reg_no, PDO::PARAM_STR);
        $stmt->bindParam(':image', $new_image_name, PDO::PARAM_STR);
        $stmt->bindParam(':sign', $snew_image_name, PDO::PARAM_STR);
        $stmt->execute();

        // Get the last inserted ID
        $last_id = $db->lastInsertId();

        // Redirect to preview page if data is inserted successfully
        if($last_id != '') {
            header("location:preview.php?id=".$reg_no);
        } else {
            echo 'Something wrong';
        }
    }
}
?>

