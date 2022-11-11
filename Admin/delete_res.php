<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $res_id = $_GET["res_id"];

    $query="DELETE  FROM tbl_restaurant WHERE res_id='$res_id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your Restaurant is Deleted";
      header('Location: manage_restaurant.php');
    }else
    {
        $_SESSION['status']="Your Restaurant is Not Deleted";
        header('Location: manage_restaurant.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
