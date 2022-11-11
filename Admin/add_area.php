<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<?php
if (isset($_POST["submit"]))
{
    
    $area_name=$_POST['area_name'];
    $delivery_charges=$_POST['delivery_charges'];
  

    
  $sql="INSERT INTO `tbl_area` (`area_name`,`delivery_charges`) VALUES ('$area_name','$delivery_charges')"; 
   
   $query_run=mysqli_query($connectiondb,$sql);
    

            if($query_run)
            {
             
                $_SESSION['status'] = "Area  Added";
                $_SESSION['status_code'] = "success";
                header("location:add_area.php");
            }
            else 
            {
                $_SESSION['status'] = " Area Not Added";
                $_SESSION['status_code'] = "error";
                header("location:add_area.php"); 
            }  
        }

       
?>




<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="add_area.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

        <input type="text" name="area_name" class="form-control" placeholder="Area Name">
        <input type="text" name="delivery_charges" class="form-control" placeholder="Delivery Charges">
      
      
            
           
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary">Add area
      <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
            Add Area
            </button>
    </h1>
  </div>

  <div class="card-body">
    
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


        $query="SELECT * FROM  tbl_area";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>  ID </th>
            <th>Area Name</th>
            <th>Deleviry Charges</th>
            <th>EDIT </th>
            <th>DELETE </th>
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
            <td> <?php echo $row['area_id']; ?> </td>
            <td> <?php echo $row['area_name']; ?> </td>
            <td> <?php echo $row['delivery_charges']; ?> </td>
           
         
          
          
            <td>

<input type="hidden" name="area_id" value="<?php echo $row['area_id']; ?>">
<a href="edit_area.php?area_id=<?php echo $row['area_id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

</td>


<td>
<input type="hidden" name="area_id" value="<?php echo $row ['area_id'];?>">
<a href="delete_area.php?area_id=<?php echo $row['area_id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>