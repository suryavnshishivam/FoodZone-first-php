
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<div class="card shadow mb-4">
<div class="card-header py-3">
<div class="card-body">
<div class="table-responsive">
  
<!-- fetching all the menu from  table  -->
<?php
 $query="SELECT * FROM  tbl_menu";

 $query_run=mysqli_query($connectiondb,$query);
  
    

       ?>

<h1 class="m-0 font-weight-bold text-primary"> Manage Menu</h1>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
   <tr>
     <th>ID</th>
     <th> Name </th>
     <th> Image</th>
     <th>Discount</th>
     <th> Veiw count</th>
     <th>Resturent Name</th>
     <th>Food Type</th>
     <th> Price</th>
     <th>Category Name</th>
     <th>Open close Time</th>
      <th>EDIT</th>
     <th>DELETE</th>
     
     
   </tr>
 </thead>
 <tbody>
   <?php  while ($row=mysqli_fetch_assoc($query_run))
     {
      $res=$row['res_id'] ; 
      $cat=$row['category_id'] ;

      ?>
      

   <tr>
     <td> <?php echo $row['id']; ?> </td>
     <td> <?php echo $row['name']; ?> </td>
     <td>  <img src="menu_img/<?php echo $row["img"]; ?>"  witdh="100%" height="80px" alt=""> </td>
     <td> <?php echo $row['desc']; ?> </td>
     <td> <?php echo $row['view_count']; ?> </td>

     <?php
          $query1="SELECT * FROM  tbl_restaurant where res_id='$res'";
           $query_run1=mysqli_query($connectiondb,$query1);
           
            while ($row1=mysqli_fetch_assoc($query_run1))
            {   
                ?> 
     <td> <?php echo $row1['res_name'];}  ?> </td>

     <td> <?php echo $row['food_type']; ?> </td>
     <td> <?php echo $row['price']; ?> </td>
     <?php
          $query3="SELECT * FROM  tbl_category where category_id='$cat'";
           $query_run3=mysqli_query($connectiondb,$query3);
           
            while ($row3=mysqli_fetch_assoc($query_run3))
            {   
                ?> 
     <td> <?php echo $row3['category_name'];} ?> </td>
     <td> <?php echo $row['opn&close_time']; ?> </td>
     
     <td>

             <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <a href="edit_menu.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

     </td>
         <td>   
         <input type="hidden" name="id" value="<?php echo $row ['id'];?>">
         <a href="delete_menu.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
         </td>
   </tr>
  
   <?php } ?>
 </tbody>
</table>
</div>
</div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
