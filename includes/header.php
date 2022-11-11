<?php 

include('includes/connection.php');

    $url=basename($_SERVER['REQUEST_URI']);

    //GET META TAG
    $metaqury="SELECT * FROM meta_tag where meta_url='$url'"; 
    $metaares=mysqli_query($connection,$metaqury);
    $metarow=mysqli_num_rows($metaares);
	$meta_data=mysqli_fetch_array($metaares);
	
    $meta_title='';
    $meta_keyword='';
    $meta_description='';
    $meta_status='';

    if ($metarow>0)
    {
        $meta_title=$meta_data['meta_title'];
        $meta_keyword=$meta_data['meta_keyword'];
        $meta_description=$meta_data['meta_description'];
        $meta_status=$meta_data['meta_status'];
    } else
    {
        //you can fetch defult index.php from database
        $meta_title='Dyanamic Meta Tag';
        $meta_keyword='Dyanamic Meta Tag';
        $meta_description='Dyanamic Meta Tag';
        $meta_status='Dyanamic Meta Tag';
    }
    



?>

<!DOCTYPE html>
<html>
<head>

	<title><?php echo  $meta_title ?></title>
    <!-- <link rel="shortcut icon" href="images/<?php //echo FAVICON_ICON;?>" /> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8" ?>"/>
    <meta name="meta_keyword" content="<?php echo $meta_keyword ?>"/>
    <meta name="meta_description" content="<?php echo $meta_description ?>" />
    <meta name="meta_status" content="<?php echo $meta_status ?>" />

   
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" type="text/css" href="assets/bill/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/bill/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="assets/bill/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="assets/bill/bootstrap/js/bootstrap.min.js"></script>
  	
</head> 

<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pp.php">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
  </div>
</nav>

