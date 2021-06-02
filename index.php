<?php
session_start();
if(!isset($_SESSION['name']))
{
    header('location:login.php');
}

?>

<?php session_start();?>
<?php
    $conn = mysqli_connect("localhost","root","buskaroo786","phpcrud");                  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
     <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
 <link rel="stylesheet" href="dashboard.css">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="">
     <div class="logo"><a href="home.php" class="simple-text logo-normal">
           iRecyclerz
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
           <li class="nav-item active">
            <a class="nav-link" href="./index.php">
              <i class="material-icons">account_circle</i>
              <p>Add Admin</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./waste producer.php">
              <i class="material-icons">house_siding</i>
              <p>Waste Producer</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="./waste collector.php">
              <i class="material-icons">hiking</i>
              <p>Waste Collector</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./request.php">
              <i class="material-icons">info_outline</i>
              <p>Requests</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.php">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./logout.php">
              <i class="material-icons">logout</i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

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
              

               <div class="container">
        <br><br><br><br><br>
           <button class="btn btn-info" data-target="#mymodel" data-toggle="modal">ADD ADMIN</button>
           <div class="modal" id="mymodel">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
              
                <div class="modal-header">
                  <h3 class=" text-info">Admin</h3>
                  <button type="button" class="close" data-dismiss="modal"> &times; </button>
                </div>
                <div class="modal-body">
                    

                        <form action="insert.php" method="POST">
                            
                             
                        <div class="form-group mb-3">                                
                                    <label for="">Name</label>  
                                <input type="text" name="name" class="form-control" required/> 
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>   
                                <input type="email" name="email" class="form-control" required/>
                            </div>
                             <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required/>
                                 <input type="checkbox" onclick="myFunction()">Show Password
                                 <span id="passworderror" class="text-danger font-weight-bold"></span> 
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" required/>
                            </div>
                            <div class="form-group mb-3 modal-footer justify-content-center">
                                <button type="submit" name="save_date" class="btn btn-primary float-right">Save Data</button>
                                
                            </div>

                        </form>                             
                    </div>    
                </div>
            </div>
            </div>
           </div>
                
               

 
          <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>  
                        <th>
                          Email
                        </th>
                        <th>
                          Status
                        </th>
 <?php
    $sql = "SELECT * FROM `admin`";
    $result = mysqli_query($conn,$sql);
                    
                        while($row = mysqli_fetch_assoc( $result))
                        {
                         
                                echo' <tr>
                                        <td> '.$row['id'].'</td>
                                        <td> '.$row['name'].'</td>
                                        <td> '.$row['email'].'</td>
                                        <td> '.$row['status'].'</td>

                                    </tr>';
                              
                         }
  ?>
                    </table>
 
                  </div> 
                </div>
              </div> 
            </div>   
          </div>
        </div> 
 

 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


<script>
function validation(){
 
        var password = document.getElementById('Pas').value;

        var passwordcheck = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;


            if(passwordcheck.test(password)){
                document.getElementById('passworderror').innerHTML = " ";
                
                
            }
            else{
                document.getElementById('passworderror').innerHTML = " ";
                return false;
            }
        
        }
        
function myFunction() {
  var x = document.getElementById("Pas");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
 


   </script> 



 <script type="text/javascript">
      $(function() {

 
         var error_password = false;
         

  
         $("#password").focusout(function() {
            check_password();
         });
         

         

        

         
        

         $("#registration_form").submit(function() {
            
            error_password = false;
         
            

            check_password();


         });
      });
   </script> 
 



</body>
</html>






 

 

 

 

  






