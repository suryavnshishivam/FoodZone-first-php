<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Add Menu
            
    </h1>
  </div>

<?php
if (isset($_POST["submit"]))
{
    $name=$_POST['name'];
    $img= $_FILES['img']['name'];
    $path="menu_img/".basename($_FILES['img']['name']);
    $desc=$_POST['desc'];
    $viewcount=$_POST['view_count'];
    $res_id=$_POST['res_id'];
    $food_type=$_POST['food_type'];
    $price=$_POST['price'];
    $category_id=$_POST['category_id'];
    $opentime=$_POST['opn&close_time'];
    
  
    
    
     $sql="INSERT INTO `tbl_menu` (`name`,`img`,`desc`,`view_count`,`res_id`,`food_type`,`price`,`category_id`,`opn&close_time`) VALUES
      ('$name','$img','$desc','$viewcount','$res_id','$food_type','$price','$category_id','$opentime')"; 
    
    $query_run = mysqli_query($connectiondb,$sql); 

    
    

            if($query_run)
            {
              move_uploaded_file($_FILES['img']['tmp_name'],$path);
                $_SESSION['status'] = "Menu Added";
                $_SESSION['status_code'] = "success";
                header("location:manage_menu.php");
            }
            else 
            {
                $_SESSION['status'] = "Menu Not Added";
                $_SESSION['status_code'] = "error";
                header("location:manage_menu.php");
            }
        }


?>


<form action="add_menu.php" method="POST" enctype="multipart/form-data"> 

<div class="modal-body">

<div class="form-group">
     
            <label for="">Menu Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Menu Name" >
            <hr>
            <label for="">Menu Image</label>
            <br>
            <input type="file" name="img" class="from-control p-1" >
            <hr>
            <label for="">Menu Discount</label>
            <input type="text" name="desc" class="form-control" placeholder="Enter Menu Discount " >
            <br>
            <label for="">Menu View Count</label>
            <input type="text" name="view_count" class="form-control" placeholder="Enter Menu View Count " > 
            <br>
            <label for="">Resturent Name</label>
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
               <br>
               <label for="">Food Type</label>
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
               <br>
               <label for="">Menu Price</label>
               <input type="text" name="price" class="form-control" placeholder="Enter Menu Price  " >
               <br>
               <label for="">Category  Name </label>
               <select class="form-control" id="category_id" name="category_id"> 
            <?php $sql="SELECT * FROM  tbl_category";
                  $stmt=$connectiondb->query($sql);
                  while ($DataRows=mysqli_fetch_assoc($stmt))
               {
                  $category_id=$DataRows["category_id"]; 
                  
                $category_name=$DataRows["category_name"];?>
                <option value="<?php echo $category_id ?>"> <?php  echo $category_name; ?> </option>
                <?php } ?>
               </select>
            <br>
            <label for="">Open Close Time</label>
            <input type="datetime-local" name="opn&close_time" class="form-control"  >
            
               
            <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>


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








<?php
include('includes/scripts.php');
include('includes/footer.php');
?>


