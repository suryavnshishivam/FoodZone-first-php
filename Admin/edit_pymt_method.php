<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_pymt_method']))
{
 
  $id = $_GET['id'];
  $type=$_POST['type'];
  $key=$_POST['key'];
  

 $query = "UPDATE `tbl_pymt_method` SET  `type` = '$type' ,`key`='$key' WHERE `id` = '$id' "; 

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {



     $_SESSION['status'] = "Payment Type  Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_pymt_method.php');
 }
 else 
 {
     $_SESSION['status'] = "Payment Type  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_pymt_method.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Pyament Method
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $id= $_GET["id"];
    $query="SELECT * FROM tbl_pymt_method WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_pymt_method.php?id=<?php echo $row["id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Payment Method</label>
            </div>

                <div class="form-group">

                
                    <input type="text" name="type" class="form-control" value="<?php echo $row['type']; ?>">
                    <input type="text" name="key" class="form-control" value="<?php echo $row['key']; ?>">
               
            
                   
                </div>
           
           
           


            <a href="add_pymt_method.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_pymt_method" class="btn btn-primary" > Updated  </button>

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