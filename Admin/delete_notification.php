<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM tbl_notification WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your Notification is Deleted";
        header("location: tbl_notification.php");
    }else
    {
        $_SESSION['status']="Your Notification is Not Deleted";
        header("location: tbl_notification.php");
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
