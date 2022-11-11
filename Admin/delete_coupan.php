<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $cpn_id = $_GET["cpn_id"];

    $query="DELETE  FROM tbl_coupon WHERE cpn_id='$cpn_id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your Coupan  is Deleted";
      header('Location: add_coupon.php');
    }else   
    {
        $_SESSION['status']="Your Coupan is Not Deleted";
        header('Location: add_coupon.php');
    }


?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
