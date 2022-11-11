<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Post Banner
            
    </h1>
  </div>

<?php
if (isset($_POST["submit"]))
{

    $banner_img= $_FILES['banner_img']['name'];
    $path="banner_img/".basename($_FILES['banner_img']['name']);
    $banner_type=$_POST['banner_type'];
    $banner_link=$_POST['banner_link'];
  
    
    
     $sql="INSERT INTO `tbl_banner` (`banner_img`,`banner_type`,`banner_link`) VALUES ('$banner_img','$banner_type','$banner_link')";  
    $query_run = mysqli_query($connectiondb,$sql); 

    
    

            if($query_run)
            {
              move_uploaded_file($_FILES['banner_img']['tmp_name'],$path);
                $_SESSION['status'] = "Banner Added";
                $_SESSION['status_code'] = "success";
                header("location:add_banner.php");
            }
            else 
            {
                $_SESSION['status'] = "Banner Not Added";
                $_SESSION['status_code'] = "error";
                header("location:add_banner.php");
            }
        }


?>


<form action="add_banner.php" method="POST" enctype="multipart/form-data"> 

<div class="modal-body">

<div class="form-group">

            <input type="file" name="banner_img" class="from-control p-1" >
            <br>
            <label for="projectlist"> <span class="FieldInfo"> Banner Type</span> </label>
            <input type="text" name="banner_link" class="form-control" placeholder="Enter Banner Link" >
            <select class="form-control" id="projectlist" name="banner_type">   
        </div>
    </div>  
   
    </form> 

    </div>
  </div>
</div>


<div class="container-fluid">



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
       //fetching all the tbl_banner_type from project_post table
  

       $sql="SELECT * FROM  tbl_banner_type";
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

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>


