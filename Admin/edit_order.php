<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_order']))
{

    $order_id=$_GET['order_id'];
    $user_id=$_POST['user_id'];
    $cpn_id=$_POST['cpn_id'];
    $discount=$_POST['discount'];
    $payment_type=$_POST['payment_type'];
    $sub_total=$_POST['sub_total'];
    $delivery_charges=$_POST['delivery_charges'];
    $total_amt=$_POST['total_amt'];
    $add_id=$_POST['add_id'];
    $driver_id=$_POST['driver_id'];
    $order_status=$_POST['order_status'];
    $instruction=$_POST['instruction'];
    $delivery_time=$_POST['delivery_time'];
 

$query = "UPDATE `tbl_order` SET `user_id` = '$user_id', `cpn_id` = '$cpn_id',
`discount` = '$discount', `payment_type` = '$payment_type',`sub_total` = '$sub_total', `delivery_charges` = '$delivery_charges'
,`total_amt` = '$total_amt', `add_id` = '$add_id',`driver_id` = '$driver_id', `order_status` = '$order_status'
,`instruction` = '$instruction', `delivery_time` = '$delivery_time'  WHERE `order_id` = '$order_id' ";

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

   

     $_SESSION['status'] = "Order Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_order.php');
 }
 else 
 {
     $_SESSION['status'] = "Order  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_order.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit Order
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $order_id=$_GET['order_id'];

    $query="SELECT * FROM tbl_order WHERE order_id='{$order_id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_order.php?order_id=<?php echo $row["order_id"];?>" method="POST">
            
              
            <div class="form-group">
                <label > Edit Order</label>
            </div>

                <div class="form-group">

                <select class="form-control" id="user_id" name="user_id"> 
            <?php $sql="SELECT * FROM  tbl_user";
                  $stmt=$connectiondb->query($sql);
                  while ($DataRows=mysqli_fetch_assoc($stmt))
               {
                  $user_id=$DataRows["user_id"]; 
                  
                $name=$DataRows["name"];?>
                <option value="<?php echo $user_id ?>"> <?php  echo $name; ?> </option>
                <?php } ?>
               </select>
               <br>
               <select class="form-control" id="cpn_id" name="cpn_id"> 
            <?php $sql="SELECT * FROM  tbl_coupon";
                  $stmt=$connectiondb->query($sql);
                  while ($DataRows=mysqli_fetch_assoc($stmt))
               {
                  $cpn_id=$DataRows["cpn_id"]; 
                  
                $cpn_title=$DataRows["cpn_title"]; ?>
                <option value="<?php echo $cpn_id ?>"> <?php  echo $cpn_title; ?> </option>
                <?php } ?>
               </select>
                    <input type="text" name="discount" class="form-control" value="<?php echo $row['discount']; ?>">
                    <input type="text" name="payment_type" class="form-control" value="<?php echo $row['payment_type']; ?>">
                    <input type="text" name="sub_total" class="form-control" value="<?php echo $row['sub_total']; ?>">
                    <input type="text" name="delivery_charges" class="form-control" value="<?php echo $row['delivery_charges']; ?>">
                    <input type="text" name="total_amt" class="form-control" value="<?php echo $row['total_amt']; ?>">
                  
                    <select class="form-control" id="add_id" name="add_id"> 
            <?php $sql="SELECT * FROM  tbl_address";
                  $stmt=$connectiondb->query($sql);
                  while ($DataRows=mysqli_fetch_assoc($stmt))
               {
                  $add_id=$DataRows["add_id"]; 
                  
                $full_add=$DataRows["full_add"];?>
                <option value="<?php echo $add_id ?>"> <?php  echo $full_add; ?> </option>
                <?php } ?>
               </select>
               <br>
               <select class="form-control" id="driver_id" name="driver_id"> 
            <?php $sql="SELECT * FROM  tbl_driver";
                  $stmt=$connectiondb->query($sql);
                  while ($DataRows=mysqli_fetch_assoc($stmt))
               {
                  $driver_id=$DataRows["driver_id"]; 
                  
                $driver_name=$DataRows["driver_name"];?>
                <option value="<?php echo $driver_id ?>"> <?php  echo $driver_name; ?> </option>
                <?php } ?>
               </select>
                    <input type="text" name="order_status" class="form-control" value="<?php echo $row['order_status']; ?>">
                    <input type="text" name="instruction" class="form-control" value="<?php echo $row['instruction']; ?>">
                    <input type="datetime-local" name="delivery_time" class="form-control" value="<?php echo $row['delivery_time']; ?>">
                   
                </div>
           
           
           


            <a href="add_order.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_order" class="btn btn-primary" > Updated  </button>

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