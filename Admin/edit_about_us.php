<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_about']))
{
 
  $id = $_GET['id'];
  $app_name=$_POST['app_name'];
  $version=$_POST['version'];
  $company_name=$_POST['company_name'];
  $email=$_POST['email'];
  $website=$_POST['website'];
  $contact_no=$_POST['contact_no'];
  $about_app=$_POST['about_app'];
  

 $query = "UPDATE `tbl_about_us` SET  `app_name` = '$app_name' ,`version`='$version',
 `company_name` = '$company_name' ,`email`='$email',`website` = '$website' ,`contact_no`='$contact_no'
 ,`about_app` = '$about_app'  WHERE `id` = '$id' "; 

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

     $_SESSION['status'] = "About Us Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_about_us.php');
 }
 else 
 {
     $_SESSION['status'] = "About Us not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_about_us.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit About Us
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $id= $_GET["id"];
    $query="SELECT * FROM tbl_about_us WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_about_us.php?id=<?php echo $row["id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit About Us</label>
            </div>

                <div class="form-group">

                
                    <input type="text" name="app_name" class="form-control" value="<?php echo $row['app_name']; ?>">
                    <input type="text" name="version" class="form-control" value="<?php echo $row['version']; ?>">
                    <input type="text" name="company_name" class="form-control" value="<?php echo $row['company_name']; ?>">
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                    <input type="text" name="website" class="form-control" value="<?php echo $row['website']; ?>">
                    <input type="text" name="contact_no" class="form-control" value="<?php echo $row['contact_no']; ?>">
                    <input type="text" name="about_app" class="form-control" value="<?php echo $row['about_app']; ?>">
                
               
            
                   
                </div>
           
           
           


            <a href="add_about_us.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_about" class="btn btn-primary" > Updated  </button>

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