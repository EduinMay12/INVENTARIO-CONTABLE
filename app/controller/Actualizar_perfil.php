<?php

    $id = $_SESSION['id'];

    $msg = '';
    $success = 0;
    
        // Check if image file is a actual image or fake image
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $file = $_FILES['file'];
            $filename = $_FILES['file']['name'];
            $fileTmpname = $_FILES['file']['tmp_name'];
            $fileError = $_FILES['file']['error'];
            $fileSize = $_FILES['file']['size'];
            
            //Explode file name with the extension
            $fileExt = explode('.', $filename);
            //Transform everything to lowercase
            $fileActualExt = strtolower(end($fileExt));
            
            $allowed = array('jpg', 'jpeg', 'png');
            
            //If extension is inside the array
            if(in_array($fileActualExt, $allowed)){
                //if we are free of errors
                if($fileError === 0){
                    //If the file size is lesser that 10000000KBs
                    if($fileSize < 10000000){
                        //Generate a unique name based in nanoseconds
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        //Define the destination of the file to be stored
                        $fileDestination = '../../../images/'.$fileNameNew;
                        //Upload the image to destination
                        if(move_uploaded_file($fileTmpname, $fileDestination)){
                            $success = 1;
                            //Update database image column with the fileNameNew
                            $sql = "UPDATE users SET image = '$fileNameNew' WHERE id = '$id'";
                            if ($conn->query($sql) === TRUE) {
                                $msg = "Your image has been changed";
                                header("Location: ../../../public/profile.php?message=$msg");
                                exit();
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        } else {
                            $success = 0;
                            $msg = "Your file failed to upload";
                        }
                    } else {
                        $success = 0;
                        $msg = "Your file is too large";
                    }
                } else {
                    $success = 0;
                    $msg = "There was an error uploading your file";
                }
            } else {
                $success = 0;
                $msg = "You cannot upload files of this type";
            }
        }
         // define variables and set to empty values
    $name = $username = $email = $website = "";
    $nameErr = $usernameErr = $emailErr = $websiteErr = "";


    //Submitting the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = test_input($_POST["name"]);
        $username = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        
        //Validating our name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $count++;
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed"; 
                $count++;
            }
        }
        
        //Validating our username
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
            $count++;
        } else {
            $username = test_input($_POST["username"]);
        }
        
        //Validating our email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $count++;
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $count++;
            }
        }
        
        //Validating our website
        if (empty($_POST["website"])) {
            $websiteErr = "Website is required";
            $count++;
        } else {
            $website = test_input($_POST["website"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "Invalid URL. You need to provide www. before your domain name"; 
                $count++;
            }
        }
        
        //If we are free of errors
        if($count == 0){
            //Update information in the database
            $sql = "UPDATE users SET name = '$name', username = '$username', email = '$email', website = '$website' WHERE id = '$id'";

            if ($conn->query($sql) === TRUE) {
                $msg = "Information updated successfully";
                header("Location: ../../../public/profile.php?message=$msg");
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }// END of IF

?>