<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_settings']))
{
 
  $id = $_GET['id'];
  $logo=$_FILES['logo']['name'];
  $path="setting_img/".basename($_FILES['logo']['name']);
  $app_name=$_POST['app_name'];
  $desc=$_POST['desc'];
  $cont_num=$_POST['cont_num'];
  $website=$_POST['website'];
  $developed_by=$_POST['developed_by'];
  $email=$_POST['email'];
  $fcm_key=$_POST['fcm_key'];
  $razorpay_key=$_POST['razorpay_key'];

  if(!empty($_FILES["logo"]["name"]))
  {
   $query = "UPDATE `tbl_settings` SET `logo` = '$logo', `app_name` = '$app_name' ,`desc`='$desc'
   ,`cont_num` = '$cont_num', `website` = '$website' ,`developed_by`='$developed_by',
   `email` = '$email', `fcm_key` = '$fcm_key' ,`razorpay_key`='$razorpay_key' WHERE `id` = '$id' "; 
  }
  else
  {
    $query = "UPDATE `tbl_settings` SET  `app_name` = '$app_name' ,`desc`='$desc'
    ,`cont_num` = '$cont_num', `website` = '$website' ,`developed_by`='$developed_by',
    `email` = '$email', `fcm_key` = '$fcm_key' ,`razorpay_key`='$razorpay_key' WHERE `id` = '$id' "; 
  }

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

    move_uploaded_file($_FILES['logo']['tmp_name'],$path);

     $_SESSION['status'] = "Settings  Updated";
     $_SESSION['status_code'] = "success";
      header('Location:tbl_settings.php');
 }
 else 
 {
     $_SESSION['status'] = "Settings  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:tbl_settings.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Settings
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $id= $_GET["id"];
    $query="SELECT * FROM tbl_settings WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_settings.php?id=<?php echo $row["id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Setting</label>
            </div>

                <div class="form-group">

                  
                <img src="setting_img/<?php echo $row["logo"]; ?>"  witdh="100%" height="100" alt="">
                    <input type="file" name="logo" class="from-control p-1" required>
                    <input type="text" name="app_name" class="form-control" value="<?php echo $row['app_name']; ?>">
                    <input type="text" name="desc" class="form-control" value="<?php echo $row['desc']; ?>">
                    <input type="text" name="cont_num" class="form-control" value="<?php echo $row['cont_num']; ?>">
                    <input type="website" name="website" class="form-control" value="<?php echo $row['website']; ?>">
                    <input type="text" name="developed_by" class="form-control" value="<?php echo $row['developed_by']; ?>">
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                    <input type="text" name="fcm_key" class="form-control" value="<?php echo $row['fcm_key']; ?>">
                    <input type="text" name="razorpay_key" class="form-control" value="<?php echo $row['razorpay_key']; ?>">
            
                   
                </div>
           
           
           


            <a href="tbl_settings.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_settings" class="btn btn-primary" > Updated  </button>

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