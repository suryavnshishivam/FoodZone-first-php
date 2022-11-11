<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM food_type WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your Food  type is Deleted";
      header('Location: add_food_type.php');
    }else
    {
        $_SESSION['status']="Your Food type is Not Deleted";
        header('Location: add_food_type.php');
    }


?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
