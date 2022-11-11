<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $category_id = $_GET["category_id"];

    $query="DELETE  FROM tbl_category WHERE category_id='$category_id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your Category  type is Deleted";
      header('Location: add_category.php');
    }else
    {
        $_SESSION['status']="Your Category type is Not Deleted";
        header('Location: add_category.php');
    }


?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
