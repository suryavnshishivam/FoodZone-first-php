<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<?php
if (isset($_POST["add_category"]))
{
    $category_name=$_POST['category_name'];
    $category_img= $_FILES['category_img']['name'];
    $path="category_img/".basename($_FILES['category_img']['name']);
    $res_id=$_POST['res_id'];
 
  
    
    
 $sql="INSERT INTO `tbl_category` (`category_name`,`category_img`,`res_id`) 
 VALUES ('$category_name','$category_img','$res_id')";  
    $query_run = mysqli_query($connectiondb,$sql); 
    

            if($query_run)
            {
              move_uploaded_file($_FILES['category_img']['tmp_name'],$path);
                $_SESSION['status'] = "Category Added";
                $_SESSION['status_code'] = "success";
                header("location:add_category.php");
            }
            else 
            {
                $_SESSION['status'] = "Category Not Added";
                $_SESSION['status_code'] = "error";
                header("location:add_category.php");
            }
        }


?>




<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="add_category.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> Category Name </label>
                <input type="text" name="category_name" class="form-control" placeholder="Enter your Category name">
            </div>
           
            <div class="form-group">
                <label>Category image</label>
                <input type="file" name="category_img" class="from-control p-1" >
            </div>
            <div class="form-group">
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
            
           
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_category" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary">Add Category 
      <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add  Category 
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


        $query="SELECT * FROM  tbl_category";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Category ID </th>
            <th> Category Name </th>
            <th>Category Image </th>
            <th>Resturent Name</th>
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
              $res=$row['res_id'] ; 
              ?>
     
          <tr>
            <td> <?php echo $row['category_id']; ?> </td>
            <td> <?php echo $row['category_name']; ?> </td>
            <td>  <img src="category_img/<?php echo $row["category_img"]; ?>"  witdh="100%" height="80px" alt=""> </td>
            <?php
          $query1="SELECT * FROM  tbl_restaurant where res_id='$res'";
           $query_run1=mysqli_query($connectiondb,$query1);
           
            while ($row1=mysqli_fetch_assoc($query_run1))
            {   
                ?> 
            <td> <?php echo $row1['res_name']; }?> </td>
          
            <td>

<input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">
<a href="edit_category.php?category_id=<?php echo $row['category_id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

</td>


<td>
<input type="hidden" name="category_id" value="<?php echo $row ['category_id'];?>">
<a href="delete_category.php?category_id=<?php echo $row['category_id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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