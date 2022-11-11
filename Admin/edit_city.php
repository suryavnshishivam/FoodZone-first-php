<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_city']))
{

  $city_id = $_GET['city_id'];
  $city_name=$_POST['city_name'];
  $delivery_charges=$_POST['delivery_charges'];
 

$query = "UPDATE `tbl_city` SET `city_name` = '$city_name', `delivery_charges` = '$delivery_charges' WHERE `city_id` = '$city_id' ";

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

   

     $_SESSION['status'] = "City Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_city.php');
 }
 else 
 {
     $_SESSION['status'] = "City  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_city.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit City
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $city_id=$_GET['city_id'];

    $query="SELECT * FROM tbl_city WHERE city_id='{$city_id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_city.php?city_id=<?php echo $row["city_id"];?>" method="POST">
            
              
            <div class="form-group">
                <label > Edit City</label>
            </div>

                <div class="form-group">

                    <input type="text" name="city_name" class="form-control" value="<?php echo $row['city_name']; ?>" >
                    <input type="text" name="delivery_charges" class="form-control" value="<?php echo $row['delivery_charges']; ?>" >
                   
                   
                </div>
           
           
           


            <a href="add_city.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_city" class="btn btn-primary" > Updated  </button>

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