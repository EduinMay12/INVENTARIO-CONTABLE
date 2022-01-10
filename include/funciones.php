<?php

    function url_site(){
        $host= $_SERVER["HTTP_HOST"];
        if (preg_match('#^(http?://|www\.)#i', $host) === 1){
            $url='http://'.$host.'/';
        } else{
            $url='http://www.'.$host.'/';        
        }
        return $url;
    }
    //Test form inputs function
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    return $data;
}
  
    //Send email function
    function send_mail($email, $message){
        $mail = new PHPMailer(true);                                // Passing `true` enables exceptions
        try {
            //Server settings
            $mail = new PHPMailer();
            //$mail->SMTPDebug = 3;                                   // Enable verbose debug output
            $mail->isSMTP();                                        // Set mailer to use SMTP
            $mail->Host = 'mail.360br.com.mx';                         // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                 // Enable SMTP authentication
            $mail->Username = 'info@360br.com.mx';            // SMTP username
            $mail->Password = 'Info360br_2021#';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                      // TCP port to connect to
    
            //Recipients
            $mail->setFrom('info@360br.com.mx', 'CFactura');
            $mail->addAddress($email);
            
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
    
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            $mail->addAttachment('../public/img/fondo/card-5.png', 'CFactura');    // Optional name
    
            //Content
            $mail->isHTML(true);                                    // Set email format to HTML
            $mail->Subject = 'Verifica tu cuenta de CFatura.';
            $mail->Body = $message;
            //$mail->Body    = "Te has registrado correctamente. Haga click en el enlace a continuación para verificar su cuenta: <br><br>
            //                <a href='http://ejemplo.cipal.com.mx/ExtensionApp_Vol_2/confirmation_lec.php?email=$email'> Haga clic aquí para verificar </a>";
            //$mail->AltBody = 'Este es el cuerpo en texto sin formato para clientes de correo que no son HTML';
    
            $mail->send();
        } catch (Exception $e) {
            echo 'No se pudo enviar el mensaje. Error de envío: ', $mail->ErrorInfo;
        }
} 
  

?>