<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_area']))
{
 
  $area_id =$_GET['area_id'];
  $area_name=$_POST['area_name'];
  $delivery_charges=$_POST['delivery_charges'];
  

  $query = "UPDATE `tbl_area` SET  `area_name` = '$area_name' ,`delivery_charges`='$delivery_charges' WHERE 
  `area_id`='$area_id '";  

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {
     $_SESSION['status'] = "Area  Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_area.php');
 }
 else 
 {
     $_SESSION['status'] = "Area not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_area.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Area
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $area_id= $_GET["area_id"];
    $query="SELECT * FROM tbl_area WHERE area_id='{$area_id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_area.php?area_id=<?php echo $row["area_id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Area</label>
            </div>

                <div class="form-group">

                
                    <input type="text" name="area_name" class="form-control" value="<?php echo $row['area_name']; ?>">
                    <input type="text" name="delivery_charges" class="form-control" value="<?php echo $row['delivery_charges']; ?>">
               
            
                   
                </div>
           
           
           


            <a href="add_area.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_area" class="btn btn-primary" > Updated  </button>

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