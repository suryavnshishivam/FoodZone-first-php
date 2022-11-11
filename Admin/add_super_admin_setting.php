<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<?php
if (isset($_POST["submit"]))
{
    
    $page_title=$_POST['page_title'];
    $page_name=$_POST['page_name'];
  

    
  $sql="INSERT INTO `tbl_superadmin_settings` (`page_title`,`page_name`) VALUES ('$page_title','$page_name')"; 
   
   $query_run=mysqli_query($connectiondb,$sql);
    

            if($query_run)
            {
             
                $_SESSION['status'] = "Super Admin Settings Added";
                $_SESSION['status_code'] = "success";
                header("location:add_super_admin_setting.php");
            }
            else 
            {
                $_SESSION['status'] = "Super Admin Settings Not Added";
                $_SESSION['status_code'] = "error";
                header("location:add_super_admin_setting.php"); 
            }  
        }

       
?>




<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Super Admin Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="add_super_admin_setting.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

        <input type="text" name="page_title" class="form-control" placeholder="Page Title">
        <input type="text" name="page_name" class="form-control" placeholder="Page Name">
      
      
            
           
        
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
    <h1 class="m-0 font-weight-bold text-primary">Super Admin
      <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
            Add Super Admin Settings
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


        $query="SELECT * FROM  tbl_superadmin_settings";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>  ID </th>
            <th>Page Title</th>
            <th>Page Name</th>
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
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['page_title']; ?> </td>
            <td> <?php echo $row['page_name']; ?> </td>
           
         
          
          
            <td>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<a href="edit_super_admin_settings.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

</td>


<td>
<input type="hidden" name="id" value="<?php echo $row ['id'];?>">
<a href="delete_super_admin_settings.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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