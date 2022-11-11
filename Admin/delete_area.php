<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $area_id = $_GET["area_id"];

    $query="DELETE  FROM tbl_area WHERE area_id='$area_id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Area is Deleted";
      header('Location: add_area.php');
    }else
    {
        $_SESSION['status']="Area is Not Deleted";
        header('Location: add_area.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
