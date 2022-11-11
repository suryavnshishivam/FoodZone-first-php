<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_coupan']))
{
 
  $cpn_id= $_GET['cpn_id'];
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

  if(!empty($_FILES["cpn_img"]["name"]))
  {
    $query = "UPDATE `tbl_coupon` SET `cpn_title` = '$cpn_title', `cpn_desc` = '$cpn_desc',`cpn_img`='$cpn_img',`validity` = '$validity', `no_of_uses` = '$no_of_uses' ,`cpn_code`='$cpn_code',
   `min_amt` = '$min_amt', `type`='$type' , `amt`='$amt' ,`t&c`='$Tream_Condition' WHERE `cpn_id` = '$cpn_id' ";
  }
  else
  {
    $query = "UPDATE `tbl_coupon` SET `cpn_title` = '$cpn_title', `cpn_desc` = '$cpn_desc' 
    ,`validity` = '$validity', `no_of_uses` = '$no_of_uses' ,`cpn_code`='$cpn_code',
    `min_amt` = '$min_amt', `type` = '$type',`amt`='$amt' ,`t&c`='$Tream_Condition' WHERE `cpn_id` = '$cpn_id' "; 
  }

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

    move_uploaded_file($_FILES['cpn_img']['tmp_name'],$path);

     $_SESSION['status'] = "Coupan  Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_coupon.php');
 }
 else 
 {
     $_SESSION['status'] = "Coupan  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_coupon.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Coupan
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $cpn_id= $_GET["cpn_id"];
    $query="SELECT * FROM tbl_coupon WHERE cpn_id='{$cpn_id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_coupan.php?cpn_id=<?php echo $row["cpn_id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Coupan</label>
            </div>

                <div class="form-group">

         
        <input type="text" name="cpn_title" class="form-control" value="<?php echo $row['cpn_title']; ?>">
        <input type="text" name="cpn_desc" class="form-control" value="<?php echo $row['cpn_desc']; ?>">
        <img src="coupan_img/<?php echo $row["cpn_img"]; ?>"  witdh="100%" height="100" alt="">
        <input type="file" name="cpn_img" class="from-control p-1" >
        <input type="datetime-local" name="validity" class="form-control" value="<?php echo $row['validity']; ?>">
        <input type="text" name="no_of_uses" class="form-control" value="<?php echo $row['no_of_uses']; ?>">
        <input type="text" name="cpn_code" class="form-control" value="<?php echo $row['cpn_code']; ?>">
        <input type="text" name="min_amt" class="form-control" value="<?php echo $row['min_amt']; ?>">
        <input type="text" name="type" class="form-control" value="<?php echo $row['type']; ?>">
        <input type="text" name="amt" class="form-control" value="<?php echo $row['amt']; ?>">
        <input type="text" name="t&c" class="form-control" value="<?php echo $row['t&c']; ?>">
            
                   
                </div>
           
           
           


            <a href="add_coupan.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_coupan" class="btn btn-primary" > Updated  </button>

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