<?php
session_start();
$conn= mysqli_connect("localhost","root","buskaroo786","phpcrud");

if(isset($_GET['token']))
{
    $token = $_GET['token'];

    $updatequery =  "update admin set status='active' where token ='$token' ";

    $iquery = mysqli_query($conn, $updatequery);

             if($iquery) {
                    if(isset($_SESSION['status'] )){
           
                                        $_SESSION['status'] = "Status Activated";
                                        header('Location: index.php');
                                }
                    else {   
                                      $_SESSION['status'] = "Status Activated"; 
                                      header('Location: index.php');
                                }
               }
             else 
                  {
                         $_SESSION['status'] = "Status not Activated"; 
                          header('Location: index.php');
                  }
 
  }                        
 ?>