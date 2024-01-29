<?php
require 'otherf/connection-db.php';
?>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $role =  $_POST['role'];
    $firstname =  $_POST['firstname'];
    $middlename =  $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender =  $_POST['gender'];
    $civilstatus =  $_POST['civilstatus'];
    $contactnumber =  $_POST['contactnumber'];
    $religion =  $_POST['religion'];
    $birthdate =  $_POST['birthdate'];


     // File upload handling
     $targetDir = "img/";
     $targetFile = $targetDir . basename($_FILES["image"]["name"]);
     $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    //  // Check if the file already exists
     if (file_exists($targetFile)) {
         die("Error: File already exists.");
     }
     // Allow only certain file formats (you can customize this list)
     if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
         die("Error: Only JPG, JPEG, PNG, and GIF files are allowed.");
     }
 
     // Move the uploaded file to the target directory
     if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
         // File uploaded successfully
         $imagePath = $targetFile;

    $updateQuery = "UPDATE profiles SET 
    role='$role', 
    first_name='$firstname', 
    middle_name='$middlename', 
    last_name='$lastname', 
    address='$address', 
    email='$email', 
    password='$password',
    gender='$gender',
    civil_status='$civilstatus',
    contact_number='$contactnumber',
    religion='$religion',
    birth_date='$birthdate',
    image_path='$imagePath'
    WHERE id='$id'";
    
    $query_run = mysqli_query($con,$updateQuery);
    
    if ($query_run) {
        header("Location: users.php?/=UpdateSuccessfully");
        exit;
    } else {
        // Handle database insertion error
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    // Handle file upload error
    echo "Error uploading file.";
}

// Close database connection
$con->close();
}

?>



