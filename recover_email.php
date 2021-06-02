<?php
session_start();
$conn= mysqli_connect("localhost","root","buskaroo786","phpcrud");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" href="dashboard.css">

</head>
<body class="offline-doc">


                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>



 <?php
    if(isset($_POST['submit']))
{
           $email = mysqli_real_escape_string($conn, $_POST['email']) ;
    
         $email_search = "select * from admin where email = '$email'"; 
         $query = mysqli_query($conn, $email_search);

         $email_count = mysqli_num_rows($query);

         if($email_count)
            {
                 $username = mysqli_fetch_assoc($query);
                 $name = $username['name'];
                 $token = $username['token'];

                 $subject = "Password Reset";
                                    $body = "Hi, $name. Click here to reset your password
                                    http://localhost/phpcrud/reset_password.php?token=$token  ";
                                    $headers = "From: irecyclerz123@gmail.com";


                     if (mail($email, $subject, $body, $headers)) {
                                       $_SESSION['status'] = "User have to check mail to reset password $email"; 
                                       header("Location: recover_email.php");
                           
                      } else {
                                       $_SESSION['status'] = "Email sending failed...";
                                       header("Location: recover_email.php");
                             }

                               
                               
            }
        else {
                 $_SESSION['status'] = "Invalid Email";
                                    header('Location: recover_email.php');
                     
             }
}
?>


  <div class="page-header clear-filter">
    <div class="page-header-image" style="background-image: url('assests/img/pic 90.jpg');"></div>
     <div class="content-center ">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand">  
         <h1 class="title">Recover Your Account</h1><br>     
        
             <div class="card bg-light"> 
             <article class="card-body mx-auto" style="max-width: 400px;">
             
            

          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
          <br>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                 <input type="email" name="email" class="form-control" placeholder="Enter Email" required/> 
             </div><br>
          
             <div class="form-group ">
                <button type="submit" class="btn btn-info btn-block" name="submit">Send Mail</button>
                </div>  <br>
            
          </form>
       </article>
          
      </div>
    </div>
   </div>
  </div>
 
</body>

</html>