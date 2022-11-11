<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $meta_id = $_GET["meta_id"];

    $query="DELETE  FROM meta_tag WHERE meta_id='$meta_id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Meta Tag is Deleted";
      header('Location: add_meta_tag.php');
    }else
    {
        $_SESSION['status']="Meta Tag is Not Deleted";
        header('Location: add_meta_tag.php');
    }


?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
