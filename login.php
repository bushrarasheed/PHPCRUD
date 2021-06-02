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
         $email =  $_POST['email'] ;
         $password =  $_POST['password'] ;

         $email_search = "select * from admin where email = '$email'and status='active' "; 
         $query = mysqli_query($conn, $email_search);

         $email_count = mysqli_num_rows($query);

         if($email_count)
            {
                $email_pass = mysqli_fetch_assoc($query);

                $db_pass =$email_pass['password']; 

                $_SESSION ['name'] = $email_pass['name'];

                $pass_decode = password_verify($password, $db_pass);

                  if($pass_decode)
                    {
                    $_SESSION['msg'] = "Login Successful";
                                    header('Location: dashboard.php');      
                     } 
                  else
                      {
                      $_SESSION['msg'] = "password incorrect";
                                    header('Location: login.php');
                         
                                   
                      }
                               
            }
        else {
                 $_SESSION['msg'] = "Invalid Email";
                                    header('Location: login.php');
                     
             }
}
?>


  <div class="page-header clear-filter">
    <div class="page-header-image" style="background-image: url('assests/img/pic 90.jpg');"></div>
     <div class="content-center ">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand">  
         <h1 class="title">iRECYCLERZ</h1><br>     
        
             <div class="card bg-light"> 
             <article class="card-body mx-auto" style="max-width: 400px;">
             <p>
                <a href="https://www.gmail.com/" class=" btn btn-block btn-gmail"></i>Login via Email</a>
                 <a href="https://www.facebook.com/" class=" btn btn-block btn-facebook"></i>Login via Facebook</a>
             </p>
             <diclass="divider-text">
                
                <span class="bg-light">OR</span>
              </p>

                        
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                 <input type="email" name="email" class="form-control" placeholder="Enter Email" required/> 
             </div>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                 <input type="password" name="password" class="form-control" placeholder="Enter Password " required/> 
             </div>
             <div class="form-group text-center">
                <button type="submit" class="btn btn-info btn-block" name="submit">Login</button>
            </div> 
            <a href="recover_email.php">Forget Password?</a>
          </form>
       </article>
          
      </div>
    </div>
   </div>
  </div>
 
</body>

</html>