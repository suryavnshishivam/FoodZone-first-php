<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM tbl_settings WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Settings is Deleted";
      header('Location: tbl_settings.php');
    }else
    {
        $_SESSION['status']="Settings is Not Deleted";
        header('Location: tbl_settings.php');
    }


?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
