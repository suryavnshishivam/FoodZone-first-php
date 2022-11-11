<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM tbl_about_us WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your About Us is Deleted";
        header("location: add_about_us.php");
    }else
    {
        $_SESSION['status']="Your About Us is Not Deleted";
        header("location: add_about_us.php");
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
