<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Add Driver
     </h1>
  </div>
 <div class="card-body">

  <?php    



  if (isset($_POST['submit']))
{
    
    $driver_name=$_POST['driver_name'];
    $phone_num=$_POST['phone_num'];
    $img= $_FILES['img']['name'];
    $path="driver_img/".basename($_FILES['img']['name']);
    $status=$_POST['status'];
   
   
   
   $sql="INSERT INTO `tbl_driver` (`driver_name`,`phone_num`,`img`,`status`) VALUES 
   ('$driver_name','$phone_num','$img','$status')";
    
     $query_run = mysqli_query($connectiondb,$sql); 

    if($query_run)
    {
     
        move_uploaded_file($_FILES['img']['tmp_name'],$path);
        $_SESSION['status'] = "Driver Added";
        $_SESSION['status_code'] = "success";
         header('Location:add_driver.php');
    }
    else 
    {
        $_SESSION['status'] = "Driver Not Added";
        $_SESSION['status_code'] = "error";
        header('Location:add_driver.php');
    }
}




?>



<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Driver</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="add_driver.php" method="POST" enctype="multipart/form-data"> 

        <div class="modal-body">

        <div class="form-group">
      
                    <input type="text" name="driver_name" class="form-control" placeholder="Enter Driver Name">
                    <input type="text" name="phone_num" class="form-control" placeholder="Enter Driver Phone No">
                    <input type="file" name="img" class="from-control p-1" >
                    <input type="text" name="status" class="form-control" placeholder="Current Status">
                
                    
                     
                </div>
            </div>
             <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
    </div>
  </div>
</div>

 <?php
?>  



<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
  
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
           Add Driver 
            </button>
    </h6>
  </div>

  
  <?php
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
          echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
          unset($_SESSION['success']);
        }
        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
          echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
          unset($_SESSION['status']);
        }
    
?>





<div class="table-responsive">
<?php 
   
        
        $query="SELECT * FROM  tbl_driver ";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Driver Name</th>
            <th>Driver Image</th>
            <th>Driver Phone NO</th>
            <th>Current Staus</th>
            <th>Edit</th>
            <th>Delete</th>
            
         </tr>
        </thead>
        <tbody>
          <?php
         // if (mysqli_num_row($query_run)>0)
          {
            while ($row=mysqli_fetch_assoc($query_run))
            {
              ?>
     
          <tr>
            <td> <?php echo $row['driver_id']; ?> </td>
            <td> <?php echo $row['driver_name']; ?> </td>
            <td> <?php echo $row['phone_num']; ?> </td>
            <td>  <img src="driver_img/<?php echo $row["img"]; ?>"  witdh="100%" height="80px" alt=""> </td>
            <td> <?php echo $row['status']; ?> </td>
       
            
           

            <td>

                    <input type="hidden" name="driver_id" value="<?php echo $row['driver_id']; ?>">
                   <a href="edit_driver.php?driver_id=<?php echo $row['driver_id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

            </td>
          
            <td>

                    <input type="hidden" name="driver_id" value="<?php echo $row['driver_id']; ?>">
                   <a href="delete_driver.php?driver_id=<?php echo $row['driver_id']; ?>"> <button  type="submit"  class="btn btn-primary"> Delete</button></a>

            </td>
          </tr>
          <?php
          }
          //else{
            //echo "No Record Found";
          }
     ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>

  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<!-- edit form -->



<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>