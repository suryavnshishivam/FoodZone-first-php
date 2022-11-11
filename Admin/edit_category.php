<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_category']))
{
 
  $category_id = $_GET['category_id'];
  $category_name=$_POST['category_name'];
  $category_img= $_FILES['category_img']['name'];
  $path="category_img/".basename($_FILES['category_img']['name']);
  $res_id=$_POST['res_id'];

  if(!empty($_FILES["category_img"]["name"]))
  {
   $query = "UPDATE `tbl_category` SET `category_name` = '$category_name', `category_img` = '$category_img' ,`res_id`='$res_id' WHERE `category_id` = '$category_id' "; 
  }
  else
  {
    $query = "UPDATE `tbl_category` SET `category_name` = '$category_name',`res_id`='$res_id' WHERE `category_id` = '$category_id' "; 
  }

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

    move_uploaded_file($_FILES['category_img']['tmp_name'],$path);

     $_SESSION['status'] = "Category Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_category.php');
 }
 else 
 {
     $_SESSION['status'] = "Category  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_category.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Category
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $category_id= $_GET["category_id"];
    $query="SELECT * FROM tbl_category WHERE category_id='{$category_id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_category.php?category_id=<?php echo $row["category_id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit User</label>
            </div>

                <div class="form-group">

                    <input type="text" name="category_name" class="form-control" value="<?php echo $row['category_name']; ?>" >
                    <img src="category_img/<?php echo $row["category_img"]; ?>"  witdh="100%" height="100" alt="">
                    <input type="file" name="category_img" class="from-control p-1" > <br>
                    <label>Resturent Name</label>
                <select class="form-control" id="res_id" name="res_id"> 
            <?php $sql="SELECT * FROM  tbl_restaurant";
                  $stmt=$connectiondb->query($sql);
                  while ($DataRows=mysqli_fetch_assoc($stmt))
               {
                  $res_id=$DataRows["res_id"]; 
                  
                $res_name=$DataRows["res_name"];?>
                <option value="<?php echo $res_id ?>"> <?php  echo $res_name; ?> </option>
                <?php } ?>
               </select>
                   
                   
                </div>
           
           
           


            <a href="add_category.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_category" class="btn btn-primary" > Updated  </button>

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