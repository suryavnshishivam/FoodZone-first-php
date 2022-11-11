<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $banner_id = $_GET["banner_id"];

    $query="DELETE  FROM tbl_banner WHERE banner_id='$banner_id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your Banner is Deleted";
      header('Location: manage_banner.php.php');
    }else
    {
        $_SESSION['status']="Your Banner is Not Deleted";
        header('Location: manage_banner.php.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
