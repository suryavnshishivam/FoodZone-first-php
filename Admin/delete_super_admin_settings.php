<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM tbl_superadmin_settings WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Super Admin Settings is Deleted";
      header('Location: add_super_admin_setting.php');
    }else
    {
        $_SESSION['status']="Super Admin Settings is Not Deleted";
        header('Location: add_super_admin_setting.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
