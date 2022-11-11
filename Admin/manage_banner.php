
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
 
 

 $query="SELECT * FROM  tbl_banner";
$query_run=mysqli_query($connectiondb,$query);

?>

<h1 class="m-0 font-weight-bold text-primary"> Manage Banner</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
   <tr>
     <th> ID</th>
     <th> Image </th>
     <th>Banner Type</th>
     <th>Banner Link</th>
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
     <td> <?php echo $row['banner_id']; ?> </td>
     <td>  <img src="banner_img/<?php echo $row["banner_img"]; ?>"  witdh="100%" height="80px" alt=""> </td>
     <td> <?php echo $row['banner_type']; ?> </td>
     <td> <?php echo $row['banner_link']; ?> </td>
    
     
   
    
     <td>

             <input type="hidden" name="banner_id" value="<?php echo $row['banner_id']; ?>">
            <a href="edit_banner.php?banner_id=<?php echo $row['banner_id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

     </td>
     

         <td>
         <input type="hidden" name="banner_id" value="<?php echo $row ['banner_id'];?>">
         <a href="delete_banner.php?banner_id=<?php echo $row['banner_id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
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
