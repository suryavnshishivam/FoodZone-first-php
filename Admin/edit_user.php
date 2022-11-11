<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_user']))
{

  $user_id = $_GET['user_id'];
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
 

 $query = "UPDATE `tbl_user` SET `name` = '$name', `phone` = '$phone' ,`email`='$email' WHERE `user_id` = '$user_id' "; 


 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

   

     $_SESSION['status'] = "User Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_user.php');
 }
 else 
 {
     $_SESSION['status'] = "User  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_user.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit User
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $user_id= $_GET["user_id"];
    $query="SELECT * FROM tbl_user WHERE user_id='{$user_id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_user.php?user_id=<?php echo $row["user_id"];  ?>" method="POST">
            
              
            <div class="form-group">
                <label > Edit User</label>
            </div>

                <div class="form-group">

                    <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" >
                    <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" >
                    <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>" >
                   
                </div>
           
           
           


            <a href="add_user.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_user" class="btn btn-primary" > Updated  </button>

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