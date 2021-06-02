<?php
session_start();
ob_start();

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
    if(isset($_POST['submit'])){

       if(isset($_GET['token'])){

          $token = $_GET['token'];


          $newpassword = mysqli_real_escape_string($conn, $_POST['password']) ;
          $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']) ;

          $password = password_hash($newpassword, PASSWORD_BCRYPT);
          $cpassword = password_hash($cpassword, PASSWORD_BCRYPT);

         
               if($newpassword = $cpassword){


                $updatequery = " update admin set password = '$password' where token = '$token' ";

                    $query_run = mysqli_query($conn, $updatequery);

                     if($query_run)
                        {
                            $_SESSION['status'] = "Your password has been updated";
                                                header('Location: login.php');
                               
                        }
                    else {
                             $_SESSION['status'] = "Your password is not updated";
                                                header('Location: reset_password.php');
                     
                         }
                   
                 }else {
                             $_SESSION['status'] = "Password is not matching";
                                                header('Location: reset_password.php');
                     
                         }
                
            }else {
                             $_SESSION['status'] = "Your token is not found";
                                                header('Location: reset_password.php');
                     
                         }
       
       
    
}
?>


 
  <div class="page-header clear-filter">
    <div class="page-header-image" style="background-image: url('assests/img/pic 90.jpg');"></div>
     <div class="content-center ">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand">  
         <h1 class="title">Reset Your Password</h1><br>     
        
             <div class="card bg-light"> 
             <article class="card-body mx-auto" style="max-width: 400px;">
             
            

          <form action="" method="POST">
          <br>
           <div class="form-group input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                 <input type="password" name="password" class="form-control" placeholder="New Password " required/> 
                 </div>
                 <div class="form-group input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                 <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password " required/> 
             </div>
          
             <div class="form-group ">
                <button type="submit" class="btn btn-info btn-block" name="submit">Update Password</button>
                 <button type="submit" class="btn btn-info btn-block" name="submit">Update Password</button>
                </div>  <br>
          </form>
       </article>
          
      </div>
    </div>
   </div>
  </div>
 
</body>

</html>