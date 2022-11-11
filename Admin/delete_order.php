<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $order_id = $_GET["order_id"];

    $query="DELETE  FROM tbl_order WHERE order_id='$order_id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Order is Deleted";
      header('Location: add_order.php');
    }else
    {
        $_SESSION['status']="Order is Not Deleted";
        header('Location: add_order.php');
    }


?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
