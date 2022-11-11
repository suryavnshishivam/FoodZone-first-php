<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_meta_tag']))
{

  $meta_id = $_GET['meta_id'];
  $meta_url=$_POST['meta_url'];
  $meta_title=$_POST['meta_title'];
  $meta_keyword=$_POST['meta_keyword'];
  $meta_description=$_POST['meta_description'];
  $meta_status=$_POST['meta_status'];
 

$query = "UPDATE `meta_tag` SET `meta_url`='$meta_url',`meta_title`='$meta_title',`meta_keyword`='$meta_keyword',`meta_description` = '$meta_description', `meta_status` = '$meta_status' WHERE `meta_id` = '$meta_id' ";

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

   

     $_SESSION['status'] = "Meta Tag Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_meta_tag.php');
 }
 else 
 {
     $_SESSION['status'] = "Meta Tag  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_meta_tag.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Meta Tag
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $meta_id=$_GET['meta_id'];

    $query="SELECT * FROM meta_tag WHERE meta_id='{$meta_id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_meta_tag.php?meta_id=<?php echo $row["meta_id"];?>" method="POST">
            
              
            <div class="form-group">
                <label > Edit Meta Tag</label>
            </div>

                <div class="form-group">

           
                    <input type="text" name="meta_url" class="form-control" value="<?php echo $row['meta_url']; ?>" >
                    <input type="text" name="meta_title" class="form-control" value="<?php echo $row['meta_title']; ?>" >
                    <input type="text" name="meta_keyword" class="form-control" value="<?php echo $row['meta_keyword']; ?>">
                    <input type="text" name="meta_description" class="form-control" value="<?php echo $row['meta_description']; ?>" >
                    <input type="text" name="meta_status" class="form-control" value="<?php echo $row['meta_status']; ?>">
                   
                </div>
           
           
           


            <a href="add_meta_tag.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_meta_tag" class="btn btn-primary" > Updated  </button>

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