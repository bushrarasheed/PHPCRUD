
----------for insert.php of admin table student
<?php
session_start();
$conn= mysqli_connect("localhost","root","buskaroo786","phpcrud");
    

if(isset($_POST['save_date']))
{
               $type = mysqli_real_escape_string($conn, $_POST['type']) ;
              $name = mysqli_real_escape_string($conn, $_POST['name']) ;
             $email = mysqli_real_escape_string($conn, $_POST['email']) ;
             $password = mysqli_real_escape_string($conn, $_POST['password']) ;
             $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']) ;

             $pass = password_hash($password, PASSWORD_BCRYPT);
             $cpassword = password_hash($cpassword, PASSWORD_BCRYPT);

             $token = bin2hex(random_bytes(15));

             $emailquery = " select * from student where email = '$email'";
           $query = mysqli_query($conn, $emailquery);

           $emailcount = mysqli_num_rows($query);

                if($emailcount>0)
                {
                    $_SESSION['status'] = "Email already exist";
                        header("Location: index.php");
                }
                else 
                {
                     if($password != $cpassword)
                         {
                
                            $insertquery = "INSERT INTO STUDENT (type, name, email, password, cpassword, token, status) VALUES ('$type','$name','$email','$password','$cpassword','$token','inactive')";
                            $query_run = mysqli_query($conn, $insertquery);

                            if($query_run) 
                            {
                                $subject = "Email Activation";
                                $body = "Hi, $name. Click here to activate your account
                                http://localhost/phpcrud/registration.php?token=$token  ";
                                $headers = "From: irecyclerz123@gmail.com";

                                    if (mail($email, $subject, $body, $headers)) {
                                        $_SESSION['status'] = "User have to check mail for activate $email";
                                    header("Location: index.php");
                           
                                    } else {
                                         $_SESSION['status'] = "Email sending failed...";
                                    header("Location: index.php");
                                    }
                            }
                         }
                        else
                            {
                                $_SESSION['status'] = "Date values Inserting Failed";
                                header("Location: index.php");
                            }
                }

       
}
?>









-----------------------
<?php
session_start();
$conn= mysqli_connect("localhost","root","buskaroo786","phpcrud");
    

if(isset($_POST['save_date']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']) ;
             $email = mysqli_real_escape_string($conn, $_POST['email']) ;
             $password = mysqli_real_escape_string($conn, $_POST['password']) ;
             $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']) ;

             $password = password_hash($password, PASSWORD_BCRYPT);
             $cpassword = password_hash($cpassword, PASSWORD_BCRYPT);

              $token = bin2hex(random_bytes(15));

             $emailquery = " select * from admin where email = '$email' ";
             $query = mysqli_query($conn, $emailquery);
               
            $emailcount = mysqli_num_rows($query);

                    if($emailcount>0)
                    {
                    
                        $_SESSION['status'] = "Email already exist";
                            header("Location: aindex.php");
                  
                    }
                    else 
                    {
                        if($password = $cpassword)
                         {
                                $insertquery = "INSERT INTO ADMIN (name, email, password, cpassword, token, status) VALUES ('$name','$email','$password','$cpassword','$token','inactive')";
                                $query_run = mysqli_query($conn, $insertquery);

                                if($query_run)
                                {
                                    $subject = "Email Activation";
                                    $body = "Hi, $name. Click here to activate your account ";
                                    $headers = "From: irecyclerz123@gmail.com";
                              
                                    if (mail($email, $subject, $body, $headers)) {
                                              $_SESSION['status'] = "User have to check mail for activate $email";
                                            header("Location: aindex.php");
                           
                                    } else {
                                         $_SESSION['status'] = "Email sending failed...";
                                    header("Location: aindex.php");
                                    }
                                }
                        
                         }
                            else
                             {
                                 $_SESSION['status'] = "Password are not matching";
                                header("Location: aindex.php");
                             }
                      
                    }
}
?>