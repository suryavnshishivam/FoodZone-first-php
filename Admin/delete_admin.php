<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM tbl_admin WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your Admin Profile is Deleted";
      header('Location: add_admin.php');
    }else
    {
        $_SESSION['status']="Your Admin Profile is Not Deleted";
        header('Location: add_admin.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
