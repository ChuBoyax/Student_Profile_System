<?php
require 'otherf/connection-db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $civilstatus = $_POST['civilstatus'];
    $contactnumber = $_POST['contactnumber'];
    $religion = $_POST['religion'];
    $birthdate = $_POST['birthdate'];

    // File upload handling
    $targetDir = "img/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    

    // Check if the file already exists
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

        // Insert data into the database
        $sql = "INSERT INTO profiles (role, first_name, middle_name, last_name, address, email, password, gender, civil_status, contact_number, religion, birth_date, image_path)
                VALUES ('$role', '$firstname', '$middlename', '$lastname', '$address', '$email', '$password', '$gender', '$civilstatus', '$contactnumber', '$religion', '$birthdate', '$imagePath')";

        if ($con->query($sql) === TRUE) {
            header("Location: users.php?/=StudentAddSuccessfully");
        } else {
            // Handle database insertion error
            // header("Location: admin.php?status=StudentAddError");
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        // Handle file upload error
        // header("Location: admin.php?status=FileUploadError");
        echo "Error uploading file.";
    }

    // Close database connection
    $con->close();
}
?>
