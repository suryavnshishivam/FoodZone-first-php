<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<?php
if (isset($_POST["submit"]))
{
    
    $cpn_title=$_POST['cpn_title'];
    $cpn_desc=$_POST['cpn_desc'];
    $cpn_img=$_FILES['cpn_img']['name'];
    $path="coupan_img/".basename($_FILES['cpn_img']['name']);
    $validity=$_POST['validity'];
    $no_of_uses=$_POST['no_of_uses'];
    $cpn_code=$_POST['cpn_code'];
    $min_amt=$_POST['min_amt'];
    $type=$_POST['type'];
    $amt=$_POST['amt'];
    $Tream_Condition=$_POST['t&c'];
 
 
  
    
    
  $sql="INSERT INTO `tbl_coupon` (`cpn_title`,`cpn_desc`,`cpn_img`,`validity`,`no_of_uses`,`cpn_code`,`min_amt`,`type`,`amt`,`t&c`) 
   VALUES ('$cpn_title','$cpn_desc','$cpn_img','$validity','$no_of_uses','$cpn_code','$min_amt','$type','$amt','$Tream_Condition')"; 
   
   $query_run=mysqli_query($connectiondb,$sql);
    

            if($query_run)
            {
              move_uploaded_file($_FILES['cpn_img']['tmp_name'],$path);
                $_SESSION['status'] = "Coupan Added";
                $_SESSION['status_code'] = "success";
                header("location:add_coupon.php");
            }
            else 
            {
                $_SESSION['status'] = "Coupan Not Added";
                $_SESSION['status_code'] = "error";
                header("location:add_coupon.php"); 
            }  
        }

       
?>




<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Coupan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="add_coupon.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

        <input type="text" name="cpn_title" class="form-control" placeholder="Coupan Title">
        <input type="text" name="cpn_desc" class="form-control" placeholder="Coupan Desc">
        <input type="file" name="cpn_img" class="from-control p-1" required>
        <input type="datetime-local" name="validity" class="form-control" placeholder="Validity Date">
        <input type="text" name="no_of_uses" class="form-control" placeholder="No of uses">
        <input type="text" name="cpn_code" class="form-control" placeholder="Coupan Code">
        <input type="text" name="min_amt" class="form-control" placeholder="Enter Min Amt">
        <input type="text" name="type" class="form-control" placeholder="Coupan Type">
        <input type="text" name="amt" class="form-control" placeholder="Enter Amt">
        <input type="text" name="t&c" class="form-control" placeholder="Term Condition">
            
           
        
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
    <h1 class="m-0 font-weight-bold text-primary"> Add Coupan
      <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
            Add Coupan
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


        $query="SELECT * FROM  tbl_coupon";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Coupan ID </th>
            <th> Coupan Title</th>
            <th>Coupan Desc</th>
            <th>Coupan Image</th>
            <th> Validity</th>
            <th> No Of Uses </th>
            <th>Coupan Code</th>
            <th>Min Amt</th>
            <th> Type</th>
            <th>Amt</th>
            <th>T&C</th>
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
            <td> <?php echo $row['cpn_id']; ?> </td>
            <td> <?php echo $row['cpn_title']; ?> </td>
            <td> <?php echo $row['cpn_desc']; ?> </td>
            <td>  <img src="coupan_img/<?php echo $row["cpn_img"]; ?>"  witdh="100%" height="80px" alt=""> </td>
            <td> <?php echo $row['validity']; ?> </td>
            <td> <?php echo $row['no_of_uses']; ?> </td>
            <td> <?php echo $row['cpn_code']; ?> </td>
            <td> <?php echo $row['min_amt']; ?> </td>
            <td> <?php echo $row['type']; ?> </td>
            <td> <?php echo $row['amt']; ?> </td>
            <td> <?php echo $row['t&c']; ?> </td>
          
          
            <td>

<input type="hidden" name="cpn_id" value="<?php echo $row['cpn_id']; ?>">
<a href="edit_coupan.php?cpn_id=<?php echo $row['cpn_id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

</td>


<td>
<input type="hidden" name="cpn_id" value="<?php echo $row ['cpn_id'];?>">
<a href="delete_coupan.php?cpn_id=<?php echo $row['cpn_id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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