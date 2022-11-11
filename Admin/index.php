<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 


?>

  <div class="ml-5">
   <h1 class="m-0 font-weight-bold text-primary"> Dashboard
     </h1>
     </div>
  
  <!-- Content Row -->
  <div class="row">

    <!-- Total Food Tyep -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
       <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h6><a href="add_food_type.php">Total Food Type</a></h6></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                  <?php
                    require 'dbconfig.php';

                  $query="SELECT id FROM food_type ORDER BY id";
                  $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Food Type:'.$row.'</h6>';
                  
                  ?>




              </div>
            </div>
            <div class="col-auto">
            
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Admin-->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6><a href="add_admin.php">Total Admin</a></h6></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>

              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM tbl_admin ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Admin:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
            
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Area-->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><h6><a href="add_area.php">Total Area</a></h6></div>
              <?php
                   require 'dbconfig.php';

                  $query1="SELECT area_id FROM tbl_area ORDER BY area_id";
                 $query_run1=mysqli_query($connectiondb,$query1);

                  $row = mysqli_num_rows($query_run1);
                  echo '<h6>Total Area:'.$row.'</h6>';
                  
                  ?>
              
            </div>
            <div class="col-auto">
            
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Banner -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6><a href="manage_banner.php">Total  Banner </a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT 	banner_id FROM tbl_banner ORDER BY 	banner_id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Banner:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>
 

  
    <!-- Banner Type -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><h6><a href="add_banner_type.php">Total Banner Type</a></h6></div>
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM tbl_banner_type ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Banner Type:'.$row.'</h6>';
                  
                  ?>
              
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>

 
  

    <!-- Total Categories -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6><a href="add_category.php">Total Categories</a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT category_id FROM tbl_category ORDER BY category_id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Categories:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
        
            </div>
          </div>
        </div>
      </div>
    </div>
  
 
  
  
    <!-- Total City-->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h6><a href="add_city.php">Total City</a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT city_id  FROM tbl_city ORDER BY city_id ";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total City:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
      
            </div>
          </div>
        </div>
      </div>
    </div>
  
 
  
      <!-- Total Driver-->
      <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"><h6><a href="add_driver.php">Total Driver</a></h6> </div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT driver_id FROM tbl_driver ORDER BY driver_id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Driver:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
       
            </div>
          </div>
        </div>
      </div>
    </div>
  
 
  
  
   <!-- testimonial Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6><a href="manage_menu.php">Total Menu </a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM tbl_menu ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Menu:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Total Coupan -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6><a href="add_coupon.php">Total Coupon </a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT cpn_id FROM tbl_coupon ORDER BY cpn_id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Menu:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>
  
   <!-- Notification -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6><a href="tbl_notification.php">Total Notification </a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM tbl_notification ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Menu:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Payment Method -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6><a href="add_pymt_method.php">Total Pyment Method </a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT id FROM tbl_pymt_method ORDER BY id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Menu:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>
  
   <!-- All Resturent -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6><a href="manage_restaurant.php">Total Resturent </a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT res_id FROM tbl_restaurant ORDER BY res_id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Menu:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>


     <!-- All User-->
     <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6><a href="add_user.php">Total User</a></h6></div>
              
              <?php
                   require 'dbconfig.php';

                  $query="SELECT 	user_id FROM tbl_user ORDER BY 	user_id";
                 $query_run=mysqli_query($connectiondb,$query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h6>Total Menu:'.$row.'</h6>';
                  
                  ?>
            </div>
            <div class="col-auto">
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
 

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>

  






