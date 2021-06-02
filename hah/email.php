<?php
$to_email = "irecyclerz123@gmail.com";
$subject = "Simple Email Test via PHPshi";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: rashbush01@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}



----------for session

  <div>
                        <p class="bg-success text=white px-4"> <?php echo  $_SESSION['msg'];    ?>  
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
                </div>




