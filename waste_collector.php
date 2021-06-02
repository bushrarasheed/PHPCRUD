<?php
session_start();
if(!isset($_SESSION['name']))
{
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Waste Collector 
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" href="dashboard.css">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" style="background-image: url();">
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
           <li class="nav-item">
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
          <li class="nav-item active">
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
          <li class="nav-item">
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

      <div class="main-panel">
      <!-- Navbar  -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="">Waste Collector</a>
          </div>
          <!--<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">Notification 1</a>
                  <a class="dropdown-item" href="#">Notification 2</a>
                  <a class="dropdown-item" href="#">Notification 3</a>
                  <a class="dropdown-item" href="#">Notification 4</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>-->
        </div>
      </nav> 
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Table</h4>
                  <p class="card-category"> 5 new accepted request</p>
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
                          City
                        </th>
                        <th>
                          Categories
                        </th>
                        <th>
                          Sub-Type 
                        </th>
                        <th>
                          Weight
                        </th>
                        <th>
                          Price 
                        </th>
                        <th>
                          State 
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Rasheed
                          </td>
                           <td>
                            Karachi
                          </td>
                          <td>
                            Hazard
                          </td>
                          <td>
                            Hospital Waste
                          </td>
                          <td>
                            30kg
                          </td>
                          <td class="text-primary">
                            5000 pkr
                          </td>
                          <td>
                            Accepted
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Anjum
                          </td>
                           <td>
                            Karachi
                          </td>
                          <td>
                            Non-Hazard
                          </td>
                          <td>
                            Paper
                          </td>
                          <td>
                            50kg
                          </td>
                          <td class="text-primary">
                            3000 pkr
                          </td>
                          <td>
                            Accepted
                          </td>
                        </tr>
                        <tr>
                          <td>
                            3
                          </td>
                          <td>
                            Abdul Ghani
                          </td>
                           <td>
                            Karachi
                          </td>
                          <td>
                            Non-Hazard
                          </td>
                          <td>
                            Plastic
                          </td>
                          <td>
                            30kg
                          </td>
                          <td class="text-primary">
                            3000 pkr
                          </td>
                          <td>
                            Accepted
                          </td>
                        </tr>
                        <tr>
                          <td>
                            4
                          </td>
                          <td>
                            Mehmoona
                          </td>
                           <td>
                            Karachi
                          </td>
                          <td>
                            Hazard
                          </td>
                          <td>
                            Chemical Waste
                          </td>
                          <td>
                            50kg
                          </td>
                          <td class="text-primary">
                            5000 pkr
                          </td>
                          <td>
                            Accepted
                          </td>
                        </tr>
                        <tr>
                          <td>
                            5
                          </td>
                          <td>
                            Shafique
                          </td>
                           <td>
                            Karachi
                          </td>
                          <td>
                            Non-Hazard
                          </td>
                          <td>
                            Metal
                          </td>
                          <td>
                            20kg
                          </td>
                          <td class="text-primary">
                            4000 pkr
                          </td>
                          <td>
                            Accepted
                          </td>
                        </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Table</h4>
                  <p class="card-category"> 2 new rejected request</p>
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
                          City
                        </th>
                        <th>
                          Categories
                        </th>
                        <th>
                          Sub-Type 
                        </th>
                        <th>
                          Weight
                        </th>
                        <th>
                          Price 
                        </th>
                        <th>
                          State 
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Areemina
                          </td>
                           <td>
                            Karachi
                          </td>
                          <td>
                            Non-Hazard
                          </td>
                          <td>
                            Plastic
                          </td>
                          <td>
                            50kg
                          </td>
                          <td class="text-primary">
                            3000 pkr
                          </td>
                          <td>
                            Rejected
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Shahid
                          </td>
                           <td>
                            Karachi
                          </td>
                          <td>
                            Non-Hazard
                          </td>
                          <td>
                            Paper
                          </td>
                          <td>
                            50kg
                          </td>
                          <td class="text-primary">
                            3000 pkr
                          </td>
                          <td>
                            Rejected
                          </td>
                        </tr>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
       </div>
      </div>

        
     <!--  <footer class="footer">
        <div class="container-fluid">
          <nav class="float-right">
            <ul>
              <li>
                <a href="">
                  About Us
                </a>
              </li>
              <li>
                <a href="">
                  Help?
                </a>
              </li>
              <li>
                <a href="">
                  Setting
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </footer> -->
    </div>
  </div>
  
</body>

</html>