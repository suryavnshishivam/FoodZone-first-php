<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_notification']))
{
 
  $id = $_GET['id'];
  $title=$_POST['title'];
  $desc=$_POST['desc'];
  $img=$_FILES['img']['name'];
  $path="Notification_img/".basename($_FILES['img']['name']);

  if(!empty($_FILES["img"]["name"]))
  {
   $query = "UPDATE `tbl_notification` SET `title` = '$title', `desc` = '$desc',`img`='$img' WHERE `id` = '$id' "; 
  }
  else
  {
    $query = "UPDATE `tbl_notification` SET `title` = '$title', `desc` = '$desc' WHERE `id` = '$id' "; 
  }

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

    move_uploaded_file($_FILES['img']['tmp_name'],$path);

     $_SESSION['status'] = "Notification  Updated";
     $_SESSION['status_code'] = "success";
      header('Location:tbl_notification.php');
 }
 else 
 {
     $_SESSION['status'] = "Notification  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:tbl_notification.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Notificatio
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $id= $_GET["id"];
    $query="SELECT * FROM tbl_notification WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_notification.php?id=<?php echo $row["id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Notificatio</label>
            </div>

                <div class="form-group">

                  
                    <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>">
                    <input type="text" name="desc" class="form-control" value="<?php echo $row['desc']; ?>">
                    <img src="Notification_img/<?php echo $row["img"]; ?>"  witdh="100%" height="100" alt="">
                    <input type="file" name="img" class="from-control p-1">
               
            
                   
                </div>
           
           
           


            <a href="tbl_notification.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_notification" class="btn btn-primary" > Updated  </button>

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