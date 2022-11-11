<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_banner_type_btn']))
{
  $id=$_GET['id'];
  $banner_type = $_POST['banner_type'];
 

 
    $query = "UPDATE `tbl_banner_type` SET `banner_type` = '$banner_type' WHERE `id` = '$id'";  

   $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
  
      $_SESSION['status'] = "Banner Type updated";
      $_SESSION['status_code'] = "success";
    header("location: add_banner_type.php");
  }
  else 
  {
      $_SESSION['status'] = "Banner Type Not updated";
      $_SESSION['status_code'] = "error";
      header("location: add_banner_type.php");
  }
 }
 
?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Banner Type
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  

    $id= $_GET['id'];
    $query="SELECT * FROM tbl_banner_type WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_banner_type.php?id=<?php echo $row['id']; ?>" method="POST">
            
              
            <div class="form-group">
                <label > Edit Banner Type </label>
            </div>

                <div class="form-group">

              
                    <input type="text" name="banner_type" class="form-control" value="<?php echo $row['banner_type']; ?>" >
                  
                   
                    </div>
                 <a href="add_banner_type.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_banner_type_btn" class="btn btn-primary" > Updated  </button>

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