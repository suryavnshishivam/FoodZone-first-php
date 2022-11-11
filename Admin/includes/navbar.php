
<?php require('security.php');

//$result_header_img=$connectiondb->query("SELECT *  FROM header_nav");
?>


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

<div>
<?php
    //  while ($qqq = mysqli_fetch_assoc($result_header_img)) {
               ?>
                
 <a class="collapse-item " href="index.php"><img src="logo/menu3" alt="" height="120px" width="224px">
<?php // }?>
</div>


<br class="bg-white">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

 <span>ADD </span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
 <div class="bg-success py-2 collapse-inner rounded">
 
  <a class="collapse-item" href="add_user.php">Add User</a>
  <a class="collapse-item" href="add_admin.php">Add Admin</a>
  <a class="collapse-item" href="add_banner.php">Add Banner Post</a>
  <a class="collapse-item" href="add_banner_type.php">Add Banner Type</a>
  <a class="collapse-item" href="add_super_admin_setting.php">Add Super Admin Settings</a>
  <a class="collapse-item" href="add_city.php">Add City</a>
  <a class="collapse-item" href="add_restaurant.php">Add Restaurant</a>
  <a class="collapse-item" href="add_food_type.php">Add Food Type</a>
  <a class="collapse-item" href="add_about_us.php">Add About Us</a>
  <a class="collapse-item" href="add_area.php">Add Area</a>
  <a class="collapse-item" href="add_pymt_method.php">Add Payment Method</a>
  
  
  
  

  
 </div>
</div>
</li>
<br class="bg-white">
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

 <span>General & Add</span>
</a>
<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
 <div class="bg-success py-2 collapse-inner rounded">
  
   
 
 <a class="collapse-item" href="index.php">Dashboard</a>

   <a class="collapse-item" href="tbl_settings.php">Setting</a>
   <a class="collapse-item" href="tbl_notification.php">Notification</a>
   <a class="collapse-item" href="add_driver.php">Add Driver</a>
   <a class="collapse-item" href="add_coupon.php">Add Coupan</a>
   <a class="collapse-item" href="add_category.php">Add Category</a>
   <a class="collapse-item" href="add_menu.php">Add Menu</a>
   <a class="collapse-item" href="add_order.php">Add Order</a>
   <a class="collapse-item" href="add_meta_tag.php">Meta Tags</a>
  

  

 </div>
</div>
</li>

<br class="bg-white">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">

 <span>Manages</span>
</a>
<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
 <div class="bg-success py-2 collapse-inner rounded">
  <a class="collapse-item" href="manage_menu.php">Manage Menu</a>
  <a class="collapse-item" href="manage_restaurant.php">Manage Restaurant</a>
  <a class="collapse-item" href="manage_banner.php">Manage Banner</a>
 
  
   

 </div>
</div>
</li>

<br class="bg-white">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

  

     <!-- Topbar -->
  
     <nav class="navbar navbar-expand  navbar-light bg-light topbar mb-4 static-top shadow">

       <!-- Sidebar Toggle (Topbar) -->
       <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
         <i class="fa fa-bars"></i>
       </button>

      

       <!-- Topbar Navbar -->
       <ul class="navbar-nav ml-auto">

        
         

        
        
         <!-- Nav Item - User Information -->
         <li class="nav-item dropdown no-arrow">
           <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <span class="mr-2 d-none d-lg-inline text-gray-600 small">
           
             
          <?php echo $_SESSION['name'];?>
               
             </span>
             <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
           </a>
           <!-- Dropdown - User Information -->
           <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
             <a class="dropdown-item" href="#">
               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
               Profile
             </a>
             <a class="dropdown-item" href="#">
               <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
               Settings
             </a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
               
               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
               Logout
             </a>
           </div>
         </li>

       </ul>

     </nav>
     <!-- End of Topbar -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
 <i class="fas fa-angle-up"></i>
</a>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
       <button class="close" type="button" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>
     <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
     <div class="modal-footer">
       <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

       <form action="logout.php" method="POST"> 
       
         <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

       </form>


     </div>
   </div>
 </div>
</div>