<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['register_admin_btn']))
{
  
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $img= $_FILES['img']['name'];
    $path="admin_img/".basename($_FILES['img']['name']);
    $username = $_POST['username'];


    $username_query = "SELECT * FROM tbl_admin WHERE username='$username' ";
    $username_query_run = mysqli_query($connectiondb, $username_query);
    if(mysqli_num_rows($username_query_run) > 0)
    {
        $_SESSION['status'] = "username Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO tbl_admin (name,pwd,img,username) VALUES ('$name','$pwd','$img','$username')";
            $query_run = mysqli_query($connectiondb, $query);
            
            if($query_run)
            {
              move_uploaded_file($_FILES['img']['tmp_name'],$path);
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header("location: add_admin.php");
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header("location: add_admin.php");
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header("location: add_admin.php");
        }
    }

}





?>





<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="add_admin.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter your Name">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pwd" class="form-control" placeholder="Enter your Password">
            </div>
            <div class="form-group">
                <label>image</label>
                <input type="file" name="img" class="from-control p-1" >
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Your Username">
            </div>
            
           
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="register_admin_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary">Admin Profile 
      <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
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


        $query="SELECT * FROM  tbl_admin";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th>Password </th>
            <th>Image</th>
            <th>Username</th>
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
            <td> <?php echo $row['name']; ?> </td>
            <td> <?php echo $row['pwd']; ?> </td>
            <td>  <img src="admin_img/<?php echo $row["img"]; ?>"  witdh="100%" height="80px" alt=""> </td>
            <td> <?php echo $row['username']; ?> </td>
          
            <td>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<a href="edit_admin.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

</td>


<td>
<input type="hidden" name="id" value="<?php echo $row ['id'];?>">
<a href="delete_admin.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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