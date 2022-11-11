<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $driver_id = $_GET["driver_id"];

    $query="DELETE  FROM tbl_driver WHERE driver_id='$driver_id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Driver is Deleted";
      header('Location: add_driver.php');
    }else
    {
        $_SESSION['status']="Driver is Not Deleted";
        header('Location: add_driver.php');
    }


?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
