<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<?php
if (isset($_POST["submit"]))
{
    
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $img=$_FILES['img']['name'];
    $path="Notification_img/".basename($_FILES['img']['name']);
    
 
 
  
    
    
  $sql="INSERT INTO `tbl_notification` (`title`,`desc`,`img`) VALUES ('$title','$desc','$img')"; 
   
   $query_run=mysqli_query($connectiondb,$sql);
    

            if($query_run)
            {
              move_uploaded_file($_FILES['img']['tmp_name'],$path);
                $_SESSION['status'] = "Notification Added";
                $_SESSION['status_code'] = "success";
                header("location:tbl_notification.php");
            }
            else 
            {
                $_SESSION['status'] = "Notification Not Added";
                $_SESSION['status_code'] = "error";
                header("location:tbl_notification.php"); 
            }  
        }

       
?>




<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="tbl_notification.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

        <input type="text" name="title" class="form-control" placeholder="Coupan Title">
        <input type="text" name="desc" class="form-control" placeholder="Coupan Desc">
        <input type="file" name="img" class="from-control p-1" required>
      
            
           
        
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
    <h1 class="m-0 font-weight-bold text-primary">Notification
      <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
            Add Notification
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


        $query="SELECT * FROM  tbl_notification";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Notification ID </th>
            <th> Title</th>
            <th>Desc</th>
            <th>Image</th>
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
            <td> <?php echo $row['title']; ?> </td>
            <td> <?php echo $row['desc']; ?> </td>
            <td>  <img src="Notification_img/<?php echo $row["img"]; ?>"  witdh="100%" height="80px" alt=""> </td>
         
          
          
            <td>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<a href="edit_notification.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

</td>


<td>
<input type="hidden" name="id" value="<?php echo $row ['id'];?>">
<a href="delete_notification.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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