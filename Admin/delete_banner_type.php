<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM tbl_banner_type WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your Banner  type is Deleted";
      header('Location: add_banner_type.php');
    }else
    {
        $_SESSION['status']="Your Banner type is Not Deleted";
        header('Location: add_banner_type.php');
    }


?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
