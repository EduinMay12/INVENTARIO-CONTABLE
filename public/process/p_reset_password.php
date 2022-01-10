<?php
    session_start();
    
    define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR); 

    // Include config file
    require_once(_RAIZ.'core/loader.php');

    $count = 0;
    $msg = '';

    if(isset($_GET['code'])){
        $reset_code = test_input($_GET['code']);
        
        //Select user with this code
        $sql = "SELECT * FROM users WHERE reset_code = '$reset_code'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['reset_code'] = $row['reset_code'];
            header("Location: ../reset_password.php");
            exit();
        } else {
            echo "0 results";
        }
    } else {// End of IF
        //Select user with this code
        $sql = "SELECT * FROM users WHERE reset_code = '$reset_code'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['reset_code'] = $row['reset_code'];
            header("Location: ../reset_password.php");
            exit();
        } else {
            echo "0 results";
        }
    } 
?>