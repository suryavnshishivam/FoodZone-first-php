<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if (isset($_POST["submit"]))
{

  
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    
    
    
   $sql="INSERT INTO `tbl_user` (`name`,`phone`,`email`) VALUES ('$name','$phone','$email')";
    $query_run = mysqli_query($connectiondb,$sql); 

    
    

            if($query_run)
            {
            
                $_SESSION['status'] = "User Added";
                $_SESSION['status_code'] = "success";
                header("location:add_user.php");
                
            }
            else 
            {
                $_SESSION['status'] = "User Added";
                $_SESSION['status_code'] = "error";
                header("location:add_user.php");
                
            }
        }

      


?>


<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="add_user.php" method="POST" > 

        <div class="modal-body">

        <div class="form-group">
      
                    <input type="text" name="name" class="form-control" placeholder="Enter name" >
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone no" >
                    <input type="text" name="email" class="form-control" placeholder="Enter email address" >
                   
                    
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


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Add User
      <hr>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
            Add User
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

 

        $query="SELECT * FROM  tbl_user";
       $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email </th>
            <th>EDIT</th>
            <th>DELETE</th>
            
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
            <td> <?php echo $row['user_id']; ?> </td>
            <td> <?php echo $row['name']; ?> </td>
            <td> <?php echo $row['phone']; ?> </td>
            <td> <?php echo $row['email']; ?> </td>
     
            
            
          
            <td>

            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
            <a href="edit_user.php?user_id=<?php echo $row['user_id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

            </td>


            <td>
            <input type="hidden" name="user_id" value="<?php echo $row ['user_id'];?>">
            <a href="delete_user.php?user_id=<?php echo $row['user_id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
            </td>

          </tr>
          <?php
          } }
          //else{
            //echo "No Record Found";
          
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