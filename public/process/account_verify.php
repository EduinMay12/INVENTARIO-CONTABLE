<?php
    define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR); 

    // Include config file
    require_once(_RAIZ.'core/loader.php');

    //Get the code from URL
    if(isset($_GET['code'])){
        
        $reset_code = test_input($_GET['code']);
        
        $sql = "SELECT * FROM users WHERE reset_code = '$reset_code'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            $sql = "UPDATE users SET is_active = 1, reset_code = '' WHERE reset_code = '$reset_code'";
            
            echo 'Estamos activando tu cuenta ...';
                
            if ($conn->query($sql) === TRUE) {
                $msg = 'Tu cuenta ha sido activada. Ahora puede iniciar sesión';
                header("Location: ../login.php?message=$msg");
            } else {
                echo "Error al actualizar el registro: " . $conn->error;
            }
                
        } else {
            echo "0 resultados";
        }
    }
?>