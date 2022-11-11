<?php 
// global $connectiondb;

// function ONHeader($id ){

//  $sqlONHeader ="SELECT COUNT(*) FROM tbl_menu WHERE id ='$id ' AND visibility_status='0'";
//  $stmtONHeader=$connectiondb->query($sqlONHeader);
//  $RowsTotal=$stmtONHeader->fetch();
//  $Total= array_shift($RowsTotal);
//  return $Total;

// }
// ?>
//  <?php 
// function OFFHeader($id ){

//   $sqlOFFHeader ="SELECT COUNT(*) FROM tbl_menu WHERE id ='$id ' AND visibility_status='1'";
//   $stmtOFFHeader=$connectiondb->query($sqlOFFHeader);
//   $RowsTotal=$stmtOFFHeader->fetch();
//   $Total= array_shift($RowsTotal);
//   return $Total;
// }

header("location: Dashboard.php");




?>

