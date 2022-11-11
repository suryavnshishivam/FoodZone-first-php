<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['submit']))
{
  
    $id=$_GET["id"]; 
    $name=$_POST['name'];
    $img= $_FILES['img']['name'];
    $path="menu_img/".basename($_FILES['img']['name']);
    $desc=$_POST['desc'];
    $view_count=$_POST['view_count'];
    $res_id=$_POST['res_id'];
    $food_type=$_POST['food_type'];
    $price=$_POST['price'];
    $category_id=$_POST['category_id'];
    $close_time=$_POST['opn&close_time'];
    

  if(!empty($_FILES["img"]["name"]))
  {
   $query = "UPDATE `tbl_menu` SET `name`='$name',`img` = '$img' , `desc`='$desc' ,`view_count`='$view_count',
    `res_id`='$res_id',`food_type`='$food_type',`price`='$price',`category_id`='$category_id',
    `opn&close_time`='$close_time' WHERE `id` = '$id'"; 
  }
  else
  {
  $query = "UPDATE `tbl_menu` SET `name`='$name', `desc`='$desc' ,`view_count`='$view_count',
    `res_id`='$res_id',`food_type`='$food_type',`price`='$price',`category_id`='$category_id',
    `opn&close_time`='$close_time' WHERE `id` = '$id'";  
  }
  
   $query_run=mysqli_query($connectiondb,$query);  

   if($query_run)
  {

    move_uploaded_file($_FILES['img']['tmp_name'],$path);

      $_SESSION['status'] = "Menu updated";
      $_SESSION['status_code'] = "success";
      header("location:manage_menu.php");
  }
  else 
  {
      $_SESSION['status'] = "Menu Not updated";
      $_SESSION['status_code'] = "error";
      header("location:manage_menu.php");
  }
 } 
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Menu
           
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

  <?php    


   $id= $_GET["id"]; 
    $query="SELECT * FROM tbl_menu WHERE id='{$id}'"; 
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

      <form action="edit_menu.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                
            </div>

                <div class="form-group">

             
           <label for="">Menu Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" >
            <hr>
            <label for="">Menu Image</label>
            <br>
            <img src="menu_img/<?php echo $row["img"]; ?>"  witdh="100%" height="100" alt="">
            <input type="file" name="img" class="from-control p-1" >
            <hr>
            <label for="">Menu Discount</label>
            <input type="text" name="desc" class="form-control" value="<?php echo $row['desc']; ?>" >
            <label for="">Menu View Count</label>
            <input type="text" name="view_count" class="form-control" value="<?php echo $row['view_count']; ?>" >
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
               <label for="">Menu Price</label>
            <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">
            <label for="">Category Id</label>
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
            <label for="">Open Close Time</label>
            <input type="datetime-local" name="opn&close_time" class="form-control" value="<?php echo $row['opn&close_time']; ?>" >
          
         
            
</div>

                 <a href="manage_menu.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="submit" class="btn btn-primary" > Updated  </button>

                </form>

                <?php }?>





 <?php
include('includes/scripts.php');
include('includes/footer.php');
?>