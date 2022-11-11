
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>

<div class="card shadow mb-4">
<div class="card-header py-3">
<div class="card-body">
<div class="table-responsive">
<!-- fetching all the banner from  table  -->
<?php
 
 

 $query="SELECT * FROM  tbl_restaurant";
$query_run=mysqli_query($connectiondb,$query);

?>

<h1 class="m-0 font-weight-bold text-primary"> Manage Restaurant</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
   <tr>
     <th>ID</th>
     <th> Res Name </th>
     <th>Res Image</th>
     <th>Res Drescr</th>
     <th>Delivery Time</th>
     <th>Res Rating</th>
     <th>Min Amt</th>
     <th>Food Type</th>
     <th>Add Res</th>
     <th>UserName</th>
     <th>Password</th>
     <th>Status</th>
      <th>EDIT</th>
     <th>DELETE</th>
     
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
     <td> <?php echo $row['res_id']; ?> </td>
     <td> <?php echo $row['res_name']; ?> </td>
     <td>  <img src="res_img/<?php echo $row["res_img"]; ?>"  witdh="100%" height="80px" alt=""> </td>
     <td> <?php echo $row['res_des']; ?> </td>
     <td> <?php echo $row['delivery_time']; ?> </td>
     <td> <?php echo $row['res_rating']; ?> </td>
     <td> <?php echo $row['min_amt']; ?> </td>
     <td> <?php echo $row['food_type']; ?> </td>
     <td> <?php echo $row['res_add']; ?> </td>
     <td> <?php echo $row['username']; ?> </td>
     <td> <?php echo $row['password']; ?> </td>
     <td> <?php echo $row['status']; ?> </td>
     
    
     
   
    
     <td>

             <input type="hidden" name="res_id" value="<?php echo $row['res_id']; ?>">
            <a href="edit_res.php?res_id=<?php echo $row['res_id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

     </td>
     

         <td>   
         <input type="hidden" name="res_id" value="<?php echo $row ['res_id'];?>">
         <a href="delete_res.php?res_id=<?php echo $row['res_id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
         </td>
   </tr>
   <?php
   } }
   //else{
     //echo "No Record Found";
   
?>
 
 </tbody>
</table>

</div>
</div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
