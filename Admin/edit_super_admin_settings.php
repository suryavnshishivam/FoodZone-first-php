<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_super_admin_settings']))
{
 
  $id = $_GET['id'];
  $page_title=$_POST['page_title'];
  $page_name=$_POST['page_name'];
  

 $query = "UPDATE `tbl_superadmin_settings` SET  `page_title` = '$page_title' ,`page_name`='$page_name' WHERE `id` = '$id' "; 

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {



     $_SESSION['status'] = "Super Admin Settings Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_super_admin_setting.php');
 }
 else 
 {
     $_SESSION['status'] = "Super Admin Settings  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_super_admin_setting.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Super Admin Settings
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $id= $_GET["id"];
    $query="SELECT * FROM tbl_superadmin_settings WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_super_admin_settings.php?id=<?php echo $row["id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Super Admin Settings</label>
            </div>

                <div class="form-group">

                
                    <input type="text" name="page_title" class="form-control" value="<?php echo $row['page_title']; ?>">
                    <input type="text" name="page_name" class="form-control" value="<?php echo $row['page_name']; ?>">
               
            
                   
                </div>
           
           
           


            <a href="add_super_admin_setting.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_super_admin_settings" class="btn btn-primary" > Updated  </button>

                </form>
            <?php
    }    


?>     

  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->



<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>