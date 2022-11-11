<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Add Restaurant
            
    </h1>
  </div>

<?php
if (isset($_POST["submit"]))
{
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
  
    
    
     $sql="INSERT INTO `tbl_restaurant` (`res_name`,`res_img`,`res_des`,`delivery_time`,`res_rating`,`min_amt`,`food_type`,`res_add`,`username`,`password`,`status`) VALUES
      ('$res_name','$res_img','$res_des','$delivery_time','$res_rating','$min_amt','$food_type','$res_add','$username','$password','$status')";  
    
    $query_run = mysqli_query($connectiondb,$sql); 

    
    

            if($query_run)
            {
              move_uploaded_file($_FILES['res_img']['tmp_name'],$path);
                $_SESSION['status'] = "Restaurant Added";
                $_SESSION['status_code'] = "success";
                header("location:manage_restaurant.php");
            }
            else 
            {
                $_SESSION['status'] = "Restaurant Not Added";
                $_SESSION['status_code'] = "error";
                header("location:manage_restaurant.php");
            }
        }


?>


<form action="add_restaurant.php" method="POST" enctype="multipart/form-data"> 

<div class="modal-body">

<div class="form-group">

            <input type="text" name="res_name" class="form-control" placeholder="Enter Restaurant Name " >
            <input type="file" name="res_img" class="from-control p-1" >
            <textarea type="text" name="res_des" class="form-control" placeholder="Enter Drescription " ></textarea>
            <input type="datetime-local" name="delivery_time" class="form-control" placeholder="Enter Delivery Time " >
            <input type="text" name="res_rating" class="form-control" placeholder="Enter Rating " >
            <input type="text" name="min_amt" class="form-control" placeholder="Enter Min Amt " >
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
            <input type="text" name="res_add" class="form-control" placeholder="Add Resturent Address" >
            <input type="text" name="username" class="form-control" placeholder="Enter Username " >
            <input type="password" name="password" class="form-control" placeholder="Enter password " >
            <input type="text" name="status" class="form-control" placeholder="Enter status " > 
             
         


        </div>
    </div>  
   
    </form> 

    </div>
  </div>
</div>


<div class="container-fluid">



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

   

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>


