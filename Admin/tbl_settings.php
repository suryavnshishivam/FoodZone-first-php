<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<?php
if (isset($_POST["submit"]))
{
    

    $logo=$_FILES['logo']['name'];
    $path="setting_img/".basename($_FILES['logo']['name']);
    $app_name=$_POST['app_name'];
    $desc=$_POST['desc'];
    $cont_num=$_POST['cont_num'];
    $website=$_POST['website'];
    $developed_by=$_POST['developed_by'];
    $email=$_POST['email'];
    $fcm_key=$_POST['fcm_key'];
    $razorpay_key=$_POST['razorpay_key'];
 
  
    
    
  $sql="INSERT INTO `tbl_settings` (`logo`,`app_name`,`desc`,`cont_num`,`website`,`developed_by`,`email`,`fcm_key`,`razorpay_key`) 
   VALUES ('$logo','$app_name','$desc','$cont_num','$website','$developed_by','$email','$fcm_key','$razorpay_key')";
   
   $query_run=mysqli_query($connectiondb,$sql);
    

            if($query_run)
            {
              move_uploaded_file($_FILES['logo']['tmp_name'],$path);
                $_SESSION['status'] = "Setting Added";
                $_SESSION['status_code'] = "success";
                header("location:tbl_settings.php");
            }
            else 
            {
                $_SESSION['status'] = "Setting Not Added";
                $_SESSION['status_code'] = "error";
                header("location:tbl_settings.php"); 
            }  
        }

       
?>




<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Setting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="tbl_settings.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

        <input type="file" name="logo" class="from-control p-1" required>
        <input type="text" name="app_name" class="form-control" placeholder="Enter Your App Name">
        <input type="text" name="desc" class="form-control" placeholder="Enter Your Desc">
        <input type="text" name="cont_num" class="form-control" placeholder="Enter Your Count Num">
        <input type="website" name="website" class="form-control" placeholder="Enter Your Website">
        <input type="text" name="developed_by" class="form-control" placeholder="Developed By">
        <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
        <input type="text" name="fcm_key" class="form-control" placeholder="Enter Your Fcm Key">
        <input type="text" name="razorpay_key" class="form-control" placeholder="Enter Your Razorpay">
            
           
        
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
    <h1 class="m-0 font-weight-bold text-primary"> Setting
      <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             Setting
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


        $query="SELECT * FROM  tbl_settings";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>  ID </th>
            <th> LOGO</th>
            <th>App Name</th>
            <th>Desc</th>
            <th> Count Num</th>
            <th> Website </th>
            <th>Developed By</th>
            <th>Email</th>
            <th> FCM key</th>
            <th> Razorpay Key </th>
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
            <td>  <img src="setting_img/<?php echo $row["logo"]; ?>"  witdh="100%" height="80px" alt=""> </td>
            <td> <?php echo $row['app_name']; ?> </td>
            <td> <?php echo $row['desc']; ?> </td>
            <td> <?php echo $row['cont_num']; ?> </td>
            <td> <?php echo $row['website']; ?> </td>
            <td> <?php echo $row['developed_by']; ?> </td>
            <td> <?php echo $row['email']; ?> </td>
            <td> <?php echo $row['fcm_key']; ?> </td>
            <td> <?php echo $row['razorpay_key']; ?> </td>
          
            <td>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<a href="edit_settings.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

</td>


<td>
<input type="hidden" name="id" value="<?php echo $row ['id'];?>">
<a href="delete_settings.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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