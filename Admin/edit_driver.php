<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_driver']))
{
 
  $driver_id = $_GET['driver_id'];
  $driver_name=$_POST['driver_name'];
  $phone_num=$_POST['phone_num'];
  $img= $_FILES['img']['name'];
  $path="driver_img/".basename($_FILES['img']['name']);
  $status=$_POST['status'];
 

   if(!empty($_FILES["img"]["name"]))
  {
   $query = "UPDATE `tbl_driver` SET `driver_name` = '$driver_name', `phone_num` = '$phone_num' ,`img`='$img' ,`status`='$status' WHERE `driver_id` = '$driver_id' ";  
  }
  else
  {
    $query = "UPDATE `tbl_driver` SET `driver_name` = '$driver_name', `phone_num` = '$phone_num', `status`='$status' WHERE `driver_id` = '$driver_id' "; 
  }

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

    move_uploaded_file($_FILES['img']['tmp_name'],$path);

     $_SESSION['status'] = "Driver Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_driver.php');
 }
 else 
 {
     $_SESSION['status'] = "Driver  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_driver.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Driver
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $driver_id= $_GET["driver_id"];
    $query="SELECT * FROM tbl_driver WHERE driver_id='{$driver_id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_driver.php?driver_id=<?php echo $row["driver_id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Driver</label>
            </div>

                <div class="form-group">

                 
                    <input type="text" name="driver_name" class="form-control" value="<?php echo $row['driver_name']; ?>">
                    <input type="text" name="phone_num" class="form-control" value="<?php echo $row['phone_num']; ?>">
                    <img src="driver_img/<?php echo $row["img"]; ?>"  witdh="100%" height="100" alt="">
                    <input type="file" name="img" class="from-control p-1" >
                    <input type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>">
                   
                   
                </div>
           
           
           


            <a href="add_driver.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_driver" class="btn btn-primary" > Updated  </button>

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