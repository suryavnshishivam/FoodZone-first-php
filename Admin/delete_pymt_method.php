<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM tbl_pymt_method WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your Payment Method is Deleted";
        header("location: add_pymt_method.php");
    }else
    {
        $_SESSION['status']="Your Payment Method is Not Deleted";
        header("location: add_pymt_method.php");
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
