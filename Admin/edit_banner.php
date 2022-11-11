<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['update_banner']))
{
  $banner_id=$_GET["banner_id"];
  
  $banner_img= $_FILES['banner_img']['name'];
  $path="banner_img/".basename($_FILES['banner_img']['name']);
  $banner_type=$_POST['banner_type'];
  $banner_link=$_POST['banner_link'];
  

  if(!empty($_FILES["banner_img"]["name"]))
  {
    $query = "UPDATE `tbl_banner` SET `banner_img` = '$banner_img' , `banner_type`='$banner_type' ,`banner_link`='$banner_link' WHERE `banner_id` = '$banner_id'"; 
  }
  else
  {
   $query = "UPDATE `tbl_banner` SET  `banner_type`='$banner_type' ,`banner_link`='$banner_link'  WHERE `banner_id` = '$banner_id'"; 
  }
   $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
    move_uploaded_file($_FILES['banner_img']['tmp_name'],$path);

      $_SESSION['status'] = "Banner updated";
      $_SESSION['status_code'] = "success";
      header("location:manage_banner.php");
  }
  else 
  {
      $_SESSION['status'] = "Banner Not updated";
      $_SESSION['status_code'] = "error";
      header("location:manage_banner.php");
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit project_post 
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $banner_id= $_GET["banner_id"];
    $query="SELECT * FROM tbl_banner WHERE banner_id='{$banner_id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_banner.php?banner_id=<?php echo $row['banner_id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Banner  </label>
            </div>

                <div class="form-group">

              
                <img src="banner_img/<?php echo $row["banner_img"]; ?>"  witdh="100%" height="100" alt="">
                <input type="file" name="banner_img" class="from-control p-1" > <br>
                
                <label for="projectlist"> <span class="FieldInfo"> Enter Link </span> </label>
                <input type="text" name="banner_link" class="form-control" value="<?php echo $row['banner_link']; ?>" >
                
            <label for="projectlist"> <span class="FieldInfo"> Chose category </span> </label>
            <select class="form-control" id="projectlist" name="banner_type">
            
</div>


<div class="table-responsive">

<?php 
//fetching all the tbl_banner from tbl_banner table


$sql="SELECT * FROM  tbl_banner";
 $stmt=$connectiondb->query($sql);

 
     while ($DataRows=mysqli_fetch_assoc($stmt))
     {

  $id=$DataRows["id"];
  $banner_type=$DataRows["banner_type"];


 ?>

<option> <?php  echo $banner_type; ?> </option>
        

     <?php } ?>

</select>
</div>

                 <a href="manage_banner.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_banner" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>





 <?php
include('includes/scripts.php');
include('includes/footer.php');
?>