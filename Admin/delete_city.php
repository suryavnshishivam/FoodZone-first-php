<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $city_id = $_GET["city_id"];

    $query="DELETE  FROM tbl_city WHERE city_id='$city_id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="City is Deleted";
      header('Location: add_city.php');
    }else
    {
        $_SESSION['status']="City is Not Deleted";
        header('Location: add_city.php');
    }


?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
