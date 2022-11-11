<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<?php
if (isset($_POST["submit"]))
{
    
    $app_name=$_POST['app_name'];
    $version=$_POST['version'];
    $company_name=$_POST['company_name'];
    $email=$_POST['email'];
    $website=$_POST['website'];
    $contact_no=$_POST['contact_no'];
    $about_app=$_POST['about_app'];
    
  

    
  $sql="INSERT INTO `tbl_about_us` (`app_name`,`version`,`company_name`,`email`,`website`,`contact_no`,`about_app`) VALUES
   ('$app_name','$version','$company_name','$email','$website','$contact_no','$about_app')"; 
   
   $query_run=mysqli_query($connectiondb,$sql);
    

            if($query_run)
            {
             
                $_SESSION['status'] = "About Us Added";
                $_SESSION['status_code'] = "success";
                header("location:add_about_us.php");
            }
            else 
            {
                $_SESSION['status'] = "Payment Method Not Added";
                $_SESSION['status_code'] = "error";
                header("location:add_about_us.php"); 
            }  
        }

       
?>




<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add About Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="add_about_us.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

                    <input type="text" name="app_name" class="form-control" placeholder="Enter App Name" >
                    <input type="text" name="version" class="form-control" placeholder="Enter Version">
                    <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" >
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Id">
                    <input type="text" name="website" class="form-control" placeholder="Enter Website">
                    <input type="text" name="contact_no" class="form-control" placeholder="Enter Contact NO">
                    <input type="text" name="about_app" class="form-control" placeholder="Enter About App">
      
      
            
           
        
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
    <h1 class="m-0 font-weight-bold text-primary">About Us
      <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
            Add About Us
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


        $query="SELECT * FROM  tbl_about_us";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>  ID </th>
            <th>App Name</th>
            <th>Version</th>
            <th>Company Name</th>
            <th>Website</th>
            <th>Contact No</th>
            <th>About App</th>
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
            <td> <?php echo $row['app_name']; ?> </td>
            <td> <?php echo $row['version']; ?> </td>
            <td> <?php echo $row['company_name']; ?> </td>
            <td> <?php echo $row['email']; ?> </td>
            <td> <?php echo $row['website']; ?> </td>
            <td> <?php echo $row['contact_no']; ?> </td>
            <td> <?php echo $row['about_app']; ?> </td>
           
         
          
          
            <td>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<a href="edit_about_us.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

</td>


<td>
<input type="hidden" name="id" value="<?php echo $row ['id'];?>">
<a href="delete_about_us.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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