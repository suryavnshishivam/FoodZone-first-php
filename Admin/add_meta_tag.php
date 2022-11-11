<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if (isset($_POST["submit"]))
{

  
    $meta_url=$_POST['meta_url'];
    $meta_title=$_POST['meta_title'];
    $meta_keyword=$_POST['meta_keyword'];
    $meta_description=$_POST['meta_description'];
    $meta_status=$_POST['meta_status'];
   
  
    
    
    
   $sql="INSERT INTO `meta_tag` (`meta_url`,`meta_title`,`meta_keyword`,`meta_description`,`meta_status`) 
   VALUES ('$meta_url','$meta_title','$meta_keyword','$meta_description','$meta_status')";
    $query_run = mysqli_query($connectiondb,$sql); 

    
    

            if($query_run)
            {
            
                $_SESSION['status'] = "Meta Tag Added";
                $_SESSION['status_code'] = "success";
                header("location:add_meta_tag.php");
                
            }
            else 
            {
                $_SESSION['status'] = "Meta Tag Not Added";
                $_SESSION['status_code'] = "error";
                header("location:add_meta_tag.php");
                
            }
        }

      


?>


<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Meta Tag </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="add_meta_tag.php" method="POST" > 

        <div class="modal-body">

        <div class="form-group">
      
                    <input type="text" name="meta_url" class="form-control" placeholder="Meta Url" >
                    <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" >
                    <input type="text" name="meta_keyword" class="form-control" placeholder="Meta Keywords" >
                    <input type="text" name="meta_description" class="form-control" placeholder="Meta Description" >
                    <input type="text" name="meta_status" class="form-control" placeholder="Meta Status" >
                   
                    
                </div>
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
    <h1 class="m-0 font-weight-bold text-primary"> Add Meta Tag
      <hr>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
            Add Meta Tag
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

 

        $query="SELECT * FROM  meta_tag";
       $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Meta ID</th>
            <th>Meta Url</th>
            <th>Meta Title</th>
            <th>Meta Description</th>
            <th>Meta Status</th>
            <th>EDIT</th>
            <th>DELETE</th>
            
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
            <td> <?php echo $row['meta_id']; ?> </td>
            <td> <?php echo $row['meta_title']; ?> </td>
            <td> <?php echo $row['meta_keyword']; ?> </td>
            <td> <?php echo $row['meta_description']; ?> </td>
            <td> <?php echo $row['meta_status']; ?> </td>
          
     
            
            
          
            <td>

            <input type="hidden" name="meta_id" value="<?php echo $row['meta_id']; ?>">
            <a href="edit_meta_tag.php?meta_id=<?php echo $row['meta_id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

            </td>


            <td>
            <input type="hidden" name="meta_id" value="<?php echo $row ['meta_id'];?>">
            <a href="delete_meta_tag.php?meta_id=<?php echo $row['meta_id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
            </td>

          </tr>
          <?php
          } }
          //else{
            //echo "No Record Found";
          
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