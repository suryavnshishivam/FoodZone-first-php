<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Add Order
     </h1>
  </div>
 <div class="card-body">

  <?php    



  if (isset($_POST['submit']))
{
    
    $order_id=$_POST['order_id'];
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
   
   
   
   $sql="INSERT INTO `tbl_order` (`order_id`,`user_id`,`cpn_id`,`discount`,`payment_type`,`sub_total`,`delivery_charges`
   ,`total_amt`,`add_id`,`driver_id`,`order_status`,`instruction`,`delivery_time`) VALUES ('$order_id','$user_id','$cpn_id'
   ,'$discount','$payment_type','$sub_total','$delivery_charges','$total_amt','$add_id','$driver_id','$order_status','$instruction','$delivery_time')";
    
     $query_run = mysqli_query($connectiondb,$sql); 

    if($query_run)
    {
     

        $_SESSION['status'] = "Order Added";
        $_SESSION['status_code'] = "success";
         header('Location:add_order.php');
    }
    else 
    {
        $_SESSION['status'] = "Order Not Added";
        $_SESSION['status_code'] = "error";
        header('Location:add_order.php');
    }
}




?>



<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="add_order.php" method="POST" > 

        <div class="modal-body">

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
                    <input type="text" name="discount" class="form-control" placeholder="Enter Discount">
                    <input type="text" name="payment_type" class="form-control" placeholder="Enter Pyment Type">
                    <input type="text" name="sub_total" class="form-control" placeholder="Enter Sub Total">
                    <input type="text" name="delivery_charges" class="form-control" placeholder="Enter Delivery Charges">
                    <input type="text" name="total_amt" class="form-control" placeholder="Enter Total amt">
                  
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
                    <input type="text" name="order_status" class="form-control" placeholder="Enter Order Status">
                    <input type="text" name="instruction" class="form-control" placeholder="Enter Instrucation">
                    <input type="datetime-local" name="delivery_time" class="form-control" placeholder="Enter Delivery Time">
                
                    
                     
                </div>
            </div>
             <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
    </div>
  </div>
</div>

 <?php
?>  



<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
  
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
            Add Order 
            </button>
    </h6>
  </div>

  
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
   
        
        $query="SELECT * FROM  tbl_order ";
        $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Order Id</th>
            <th>User Name</th>
            <th>Coupon Title</th>
            <th>Discount</th>
            <th>Pyment Type</th>
            <th>Sub Total</th>
            <th>Delivery Charges</th>
            <th>Total amt</th>
            <th>Full Address </th>
            <th>Driver Name</th>
            <th>Order Status</th>
            <th>Instrucation</th>
            <th>Delivery Time</th>
            <th>Edit</th>
            <th>Delete</th>
            
         </tr>
        </thead>
        <tbody>
          <?php
         // if (mysqli_num_row($query_run)>0)
          
            while ($row=mysqli_fetch_assoc($query_run))
            {
               $user=$row['user_id']; 
               $coupon=$row['cpn_id']; 
               $address=$row['add_id']; 
               $driver=$row['driver_id']; 
         

              ?>
     
          <tr>
          <td> <?php echo $row['order_id']; ?> </td>
          <?php
          $query_user="SELECT * FROM  tbl_user where user_id='$user'";
           $query_run_user=mysqli_query($connectiondb,$query_user);
           
            while ($row_user=mysqli_fetch_assoc($query_run_user))
            {   
                ?> 
          
            <td> <?php echo $row_user['name'];} ?> </td>

            <?php
          $query_coupon="SELECT * FROM  tbl_coupon where cpn_id='$coupon'";
           $query_run_coupon=mysqli_query($connectiondb,$query_coupon);
           
            while ($row_coupon=mysqli_fetch_assoc($query_run_coupon))
            {   
                ?> 
            <td> <?php echo $row_coupon['cpn_title']; } ?> </td>

            <td> <?php echo $row['discount']; ?> </td>
            <td> <?php echo $row['payment_type']; ?> </td>
            <td> <?php echo $row['sub_total']; ?> </td>
            <td> <?php echo $row['delivery_charges']; ?> </td>
            <td> <?php echo $row['total_amt']; ?> </td>

            <?php
          $query_address="SELECT * FROM  tbl_address where add_id='$address'";
           $query_run_address=mysqli_query($connectiondb,$query_address);
           
            while ($row_address=mysqli_fetch_assoc($query_run_address))
            {   
                ?> 
            <td> <?php echo $row_address['full_add'];} ?> </td>

            <?php
          $query_driver="SELECT * FROM  tbl_driver where driver_id='$driver'";
           $query_run_driver=mysqli_query($connectiondb,$query_driver);
           
            while ($row_driver=mysqli_fetch_assoc($query_run_driver))
            {   
                ?> 

            <td> <?php echo $row_driver['driver_name'];} ?> </td>
            <td> <?php echo $row['order_status']; ?> </td>
            <td> <?php echo $row['instruction']; ?> </td>
            <td> <?php echo $row['delivery_time']; ?> </td>
           
       
            
           

            <td>

                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                   <a href="edit_order.php?order_id=<?php echo $row['order_id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

            </td>
          
            <td>

                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                   <a href="delete_order.php?order_id=<?php echo $row['order_id']; ?>"> <button  type="submit"  class="btn btn-primary"> Delete</button></a>

            </td>
          </tr>
          <?php
          }
          //else{
            //echo "No Record Found";
          
     ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>

  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<!-- edit form -->



<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>