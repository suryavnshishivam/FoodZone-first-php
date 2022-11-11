<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 
include('includes/session.php'); 

?>
<?php
if(isset($_POST['submit']))
{
  
    $res_id=$_GET["res_id"]; 
    $res_name=$_POST['res_name'];
    $res_img= $_FILES['res_img']['name'];
    $path="res_img/".basename($_FILES['res_img']['name']);
    $res_des=$_POST['res_des'];
    $delivery_time=$_POST['delivery_time'];
    $res_rating=$_POST['res_rating'];
    $min_amt=$_POST['min_amt'];
    $food_type=$_POST['food_type'];
    $res_add=$_POST['res_add'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $status=$_POST['status'];

  if(!empty($_FILES["res_img"]["name"]))
  {
   $query = "UPDATE `tbl_restaurant` SET `res_name`='$res_name',`res_img` = '$res_img' , `res_des`='$res_des',`delivery_time`='$delivery_time',
    `res_rating`='$res_rating',`min_amt`='$min_amt',`food_type`='$food_type',`res_add`='$res_add',
    `username`='$username',`password`='$password',`status`='$status' WHERE `res_id` = '$res_id'"; 
  }
  else
  {
   $query = "UPDATE `tbl_restaurant` SET `res_name`='$res_name', `res_des`='$res_des' ,`delivery_time`='$delivery_time',
    `res_rating`='$res_rating',`min_amt`='$min_amt',`food_type`='$food_type',`res_add`='$res_add',
    `username`='$username',`password`='$password',`status`='$status' WHERE `res_id` = '$res_id'"; 
  }
  
     $query_run=mysqli_query($connectiondb,$query);  

     if($query_run)
     {
    
        move_uploaded_file($_FILES['res_img']['tmp_name'],$path);
    
         $_SESSION['status'] = "Restaurant  Updated";
         $_SESSION['status_code'] = "success";
          header('Location:manage_restaurant.php');
     }
     else 
     {
         $_SESSION['status'] = "Restaurant  not Updated";
         $_SESSION['status_code'] = "error";
         header('Location:manage_restaurant.php');
     }
    }
     

  
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Restaurant 
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $res_id= $_GET["res_id"]; 
    $query="SELECT * FROM tbl_restaurant WHERE res_id='{$res_id}'"; 
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_res.php?res_id=<?php echo $row['res_id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit Restaurant  </label>
            </div>

                <div class="form-group">

             
            <input type="text" name="res_name" class="form-control"  value="<?php echo $row['res_name']; ?>">
            <img src="res_img/<?php echo $row["res_img"]; ?>"  witdh="100%" height="100" alt="">
            <input type="file" name="res_img" class="from-control p-1" >
            <input type="text" name="res_des" class="form-control" value="<?php echo $row['res_des']; ?>" >
            <input type="datetime-local" name="delivery_time" class="form-control"value="<?php echo $row['delivery_time']; ?>">
            <input type="text" name="res_rating" class="form-control" value="<?php echo $row['res_rating']; ?>">
            <input type="text" name="min_amt" class="form-control" value="<?php echo $row['min_amt']; ?>">
            <select class="form-control" id="food_type" name="food_type"> 
            <?php $sql="SELECT * FROM  food_type";
                  $stmt=$connectiondb->query($sql);
                  while ($DataRows=mysqli_fetch_assoc($stmt))
               {
                  $id=$DataRows["id"]; 
                  
                $food_type=$DataRows["food_type"];?>
                <option> <?php  echo $food_type; ?> </option>
                <?php } ?>
               </select>
            <input type="text" name="res_add" class="form-control" value="<?php echo $row['res_add']; ?>">
            <input type="text" name="username" class="form-control"  value="<?php echo $row['username']; ?>">
            <input type="password" name="password" class="form-control"  value="<?php echo $row['password']; ?>">
            <input type="text" name="status" class="form-control"  value="<?php echo $row['status']; ?>"> 
          
            
</div>


<div class="table-responsive">
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

                 <a href="manage_restaurant.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="submit" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>





 <?php
include('includes/scripts.php');
include('includes/footer.php');
?>