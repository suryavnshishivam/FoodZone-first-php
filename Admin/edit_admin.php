<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php
if(isset($_POST['admin_btn']))
{

    $id=$_GET['id'];
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $img= $_FILES['img']['name'];
    $path="admin_img/".basename($_FILES['img']['name']);
    $username = $_POST['username'];
  

  if(!empty($_FILES["img"]["name"]))
  {
 $query = "UPDATE `tbl_admin` SET `name`='$name', `pwd`='$pwd' ,`img` = '$img' ,`username`='$username' WHERE `id`='$id'"; 
  }
  else
  {
   $query = "UPDATE `tbl_admin` SET  `name`='$name',`pwd`='$pwd' ,`username`='$username'  WHERE `id` = '$id'"; 
  }
   $query_run=mysqli_query($connectiondb,$query);  

  if($query_run)
  {
   
    move_uploaded_file($_FILES['img']['tmp_name'],$path);

      $_SESSION['status'] = "Admin Profile updated";
      $_SESSION['status_code'] = "success";
      header("location:add_admin.php");
  }
  else 
  {
      $_SESSION['status'] = "Admin Profile  Not updated";
      $_SESSION['status_code'] = "error";
      header("location:add_admin.php");
  }
 }
 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Admim
           
    </h1>
  </div>

   <div class="card-body">

  <?php    


    $id= $_GET["id"];
    $query="SELECT * FROM tbl_admin WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
    
        ?>

<form action="edit_admin.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">

<div class="modal-body">

    <div class="form-group">
        <label> Name </label>
        <input type="text" name="name" class="form-control" placeholder="Enter your Name" value="<?php echo $row['name']; ?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="pwd" class="form-control" placeholder="Enter your Password" value="<?php echo $row['pwd']; ?>">
    </div>
    <div class="form-group">
        <label>image</label>
        <img src="admin_img/<?php echo $row["img"]; ?>"  witdh="100%" height="100" alt="">
        <input type="file" name="img" class="from-control p-1" >
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter Your Username" value="<?php echo $row['username']; ?>">
    </div>
    
   

</div>
<div class="modal-footer">
    <a href="add_admin.php" class="btn btn-danger" > Cancel</a>
    <button type="submit" name="admin_btn" class="btn btn-primary">Save</button>
</div>
</form>

                <?php }?>





 <?php
include('includes/scripts.php');
include('includes/footer.php');
?>