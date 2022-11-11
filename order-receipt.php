<?php 
	require("includes/connection.php");
	require("includes/function.php");
	require("language/language.php");
	require("includes/header.php");
	 
	
 	  
	
	$qry="SELECT * FROM tbl_settings where id='1'";
	$result=mysqli_query($connection,$qry);
	$settings_row=mysqli_fetch_assoc($result);
	
	$order_id=$_GET['order_id'];

	
	$qry1="SELECT * FROM tbl_order WHERE order_id=$order_id";
	$result1=mysqli_query($connection,$qry1);
	$order_row=mysqli_fetch_array($result1);

    $user_id=$order_row['user_id'];	

    $user_qry="SELECT * FROM tbl_user where user_id='$user_id'";
	$user_result=mysqli_query($connection,$user_qry);
	$user_row=mysqli_fetch_array($user_result);

    $cart_qry="SELECT * FROM tbl_cart where user_id='$user_id' and order_id=$order_id ";
	$cart_result=mysqli_query($connection,$cart_qry);
	$cart_row=mysqli_fetch_array($cart_result);
	
	$topping_qry="SELECT * FROM tbl_cart where user_id='$user_id' and order_id=$order_id ";
	$topping_result=mysqli_query($connection,$topping_qry);
	$topping_row=mysqli_fetch_array($topping_result);
 ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<title>Order Reciept of FOOD ZONE  </title>
    <!-- <link rel="shortcut icon" href="images/<?php //echo FAVICON_ICON;?>" /> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  

   
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" type="text/css" href="assets/bill/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/bill/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="assets/bill/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="assets/bill/bootstrap/js/bootstrap.min.js"></script>
  	
</head> 

<body>

<div class="loader">
    
</div>
<style>

.spinner_1 {
    animation: heartbeat 1.7s infinite;
    margin:auto;
  	left:0;
  	right:0;
  	top:0;
  	bottom:0;
  	position:fixed;
  	vertical-align: middle;
}

@keyframes heartbeat
{
  0%
  {
    transform: scale(1.3);
  }
  50%
  {
    transform: scale( 1 );
  }
  100%
  {
    transform: scale(1.3);  }
  
}
</style>
<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
<div class="container">

<!-- Simple Invoice - START -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <!--h2 style="text-align:center;color:red;">Powered by</h2-->
            <div class="text-center" style="margin:20px 0 20px 0;">
                <img src="images/menu1" style="padding: 0; text-align:center; width: 200px; height: auto;">
            </div>
			
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3">
				</div>
                <div class="col-xs-12 col-md-6 col-lg-6" style="padding-right: 0px; padding-left: 0px;">
					<img src="https://tbl://gallery.mailchimp.com/c6b1236c909d2d0e1b52e9f8f/images/a150d768-f865-4778-9d16-10ce88d1ee4c.png" width="580" height="6" style="display: none; padding: 0; width: 100%; height: 6px; margin-bottom: 0px;">
					
                    <div class="panel panel-default height" style="border: 0px; border-color: #ddd0; margin-bottom: 0px; border-radius: 0px;">
                        <div class="panel-heading" style="background-color: #43515e; border-color: #ddd0; border-radius:0px;">
						
								<div style="padding: 20px 0 20px 0;" class="pad-header">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tbody><tr>
											<td align="center" style="font-size: 19px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #EBEBEB; font-weight: 300;" class="pad-header-copy">
											   Your order has been placed successfully !
											</td>
										</tr>
										<tr>
											<td align="center" style="font-size: 42px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #EBEBEB; font-weight: 300;" class="pad-header-copy">
												Food Zone
											</td>
										</tr>
									</tbody></table>
								</div>
						
						</div>
                        <div class="panel-body">
                         
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<!-- RESERVATION DEETS -->
								<tr>
									<td style="padding: 10px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td align="left" style="padding: 0 0 15px 0; font-size: 20px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #43515E; font-weight: 600;">
													Delivery Information
												</td>
											</tr>
											<!-- CHECK-IN -->
											<tr>
												<td>
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td valign="top" style="padding: 0 0 5px 0;">
																<!-- LEFT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
																		   Order Id :
																		</td>
																	</tr>
																</table>
																<!-- RIGHT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #999999; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
																		   <?php echo "FZ-";
										echo $order_row['order_id']; ?>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											
										<?php if($user_row['name']!=""){ ?>	
											<!-- CHECK-IN -->
											<tr>
												<td>
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td valign="top" style="padding: 0 0 5px 0;">
																<!-- LEFT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
																		   Full Name :
																		</td>
																	</tr>
																</table>
																<!-- RIGHT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #999999; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
																		   <?php echo $user_row['name']; ?>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											
										<?php } ?>	
										<?php if($user_row['phone']!=""){ ?>	
											<!-- CHECK-OUT -->
											<tr>
												<td>
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td valign="top" style="padding: 0 0 5px 0;">
																<!-- LEFT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
																			Phone No :
																		</td>
																	</tr>
																</table>
																<!-- RIGHT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
																		   <?php echo $user_row['phone']; ?>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											
										<?php } ?>	
										<?php if($user_row['email']!=""){ ?>	
											<!-- # OF NIGHTS -->
											<tr>
												<td>
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td valign="top" style="padding: 0 0 5px 0;">
																<!-- LEFT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
																			Email :
																		</td>
																	</tr>
																</table>
																<!-- RIGHT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
																		   <?php echo $user_row['email']; ?>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											
										<?php } ?>	
										<?php if($order_row['add_id']!=""){ ?>	
											<!-- NUMBER OF ROOMS -->
											<tr>
												<td>
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td valign="top" style="padding: 0 0 5px 0;">
																<!-- LEFT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
																			Address :
																		</td>
																	</tr>
																</table>
																<!-- RIGHT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
																		   <?php  $query1="SELECT * FROM tbl_address where add_id=$order_row[add_id]";
		                                $sql1 = mysqli_query($connection,$query1);
	                                    $data1 = mysqli_fetch_assoc($sql1);
	                                    echo $data1['full_add'].",".$data1['landmark'].",".$data1['state'];
	         
	                                    ?>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										
										<?php } ?>	
									
										<?php if($order_row['delivery_time']!=""){ ?>	
										
											<!-- ROOM TYPE -->
											<tr>
												<td>
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td valign="top" style="padding: 0 0 0 0;">
																<!-- LEFT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
																			Order Date :
																		</td>
																	</tr>
																</table>
																<!-- RIGHT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
																		   <?php echo $order_row['delivery_time']; ?>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											
										<?php } ?>	
										
										<!--payment method-->
										
										
											<!-- ROOM TYPE -->
											<tr>
												<td>
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td valign="top" style="padding: 0 0 0 0;">
																<!-- LEFT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
																			Payment Method :
																		</td>
																	</tr>
																</table>
																<!-- RIGHT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
																		   <?php
					    if($order_row['payment_type']!="")
					    {
					        echo "<b>Online Payment</b>" ; 
					    }
					    else{
					        echo "<b>Cash On Delivery</b>" ; 
					    }
					  ?>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											
										<!--payment method-->
										<?php if($order_row['instruction']!=""){ ?>	
										
											<!-- ROOM TYPE -->
											<tr>
												<td>
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td valign="top" style="padding: 0 0 0 0;">
																<!-- LEFT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
																			Comment :
																		</td>
																	</tr>
																</table>
																<!-- RIGHT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
																		   <?php echo $order_row['instruction']; ?>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											
										<?php } ?>	
										
											
											<!--NOTE -->
											<tr>
												<td>
													<hr>
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td valign="top" style="padding: 0 0 0 0;">
																<!-- LEFT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="100%" align="left" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #00b1b1; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
																			Note :   Thank you for order. Your order is placed successfully. We have send SMS to your register number (<?php echo $user_row['phone']; ?>). In case of any query please contact us <?php echo $user_row['email']; ?>
																		</td>
																	</tr>
																</table>
																
															</td>
														</tr>
													</table>
												</td>
											</tr>
											
											
											
											
										</table>
									</td>
								</tr>
								<!-- DASHED LINE -->
								<tr>
									<td style="padding: 0 0 10px 0;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td align="center" style="padding: 15px 0 0 0; font-size: 16px; line-height: 1px; font-family: Helvetica, Arial, sans-serif; color: #999999; border-bottom: 1px dashed #999999;" class="padding-copy">
													&nbsp;
												</td>
											</tr>
										</table>
									</td>
								</tr>
						   
								<!-- ROOM CHARGES -->
								<tr>
									<td style="padding: 0px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td align="left" style="padding: 0 0 15px 8px; font-size: 20px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #43515E; font-weight: 600; line-height: 22px; text-align: left;">
													Order Lists
												</td>
											</tr>
											<!-- ROOM 1 -->
											<tr>
												<td>
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
													
													
														<!-- CHARGE 1 -->
														<tr>
															<td valign="top" style="padding: 0 0 0 0;">
																<!-- LEFT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="60%" align="left" class="responsive-table">
																	<tr>
																		<td align="left" style="padding: 0 0 0 10px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 15px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-desc_charges">
																		
									<?php	echo $cart_row['order_id']; ?>.
									&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<?php	echo $cart_row['menu_name'];?>
									<?php
								// 		echo "&nbsp";
								// 		echo "($row[variant_type])";
										?>
										
										
										</td>
										
																	</tr>
																</table>
																
																
																
																<!-- RIGHT COLUMN -->
																
															
																<table cellpadding="0" cellspacing="0" border="0" width="20%" align="right" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 15px; line-height: 22px; text-align: right;" bgcolor="#ffffff" class="flex-p-charges">
																			<?php
										echo $order_row['total_amt'];?>
																		</td>
																	</tr>
																</table>
																<!-- RIGHT COLUMN -->
																<table cellpadding="0" cellspacing="0" border="0" width="20%" align="right" class="responsive-table">
																	<tr>
																		<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 15px; line-height: 22px; text-align: right;" bgcolor="#ffffff" class="flex-p-charges">
																			Qty :<?php
										echo $cart_row['qty'];
										?>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
															
														
													</table>
													<hr style="margin-top: 10px; margin-bottom: 10px;">
												</td>
											</tr>
										
											<!-- TOTAL COUNT -->
											<tr>
												<td align="right" style="padding: 15 0 0 0; font-size: 15px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 100;" class="align-total-charge">
												
													<table cellpadding="0" cellspacing="0" border="0" width="20%" align="right" class="responsive-table">
														<tr>
															<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 15px; line-height: 22px; text-align: right;" bgcolor="#ffffff" class="flex-p-charges">
																<?php
										echo $order_row['total_amt'];
										?>
															</td>
														</tr>
													</table>
													<!-- RIGHT COLUMN -->
													<table cellpadding="0" cellspacing="0" border="0" width="50%" align="right" class="responsive-table">
														<tr>
															<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 15px; line-height: 22px; text-align: right;" bgcolor="#ffffff" class="flex-p-charges">
																Total Order : 
															</td>
														</tr>
													</table>
												
												</td>
												
											</tr>
											
											
													
											
										<?php
								// 		if($order_row['order_type']=="Home Delivery")
								// 		{
										?>	
											<?php 
											if($order_row['delivery_charges']!=0){
											?>
											<tr>
												<td align="right" style="padding: 15 0 0 0; font-size: 15px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 100;" class="align-total-charge">
												
													<table cellpadding="0" cellspacing="0" border="0" width="20%" align="right" class="responsive-table">
														<tr>
															<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #00cc44; font-weight: 600; font-size: 15px; line-height: 22px; text-align: right;" bgcolor="#ffffff" class="flex-p-charges">
															
															<?php echo $order_row['delivery_charges'];?>
															</td>
														</tr>
													</table>
													<!-- RIGHT COLUMN -->
													<table cellpadding="0" cellspacing="0" border="0" width="50%" align="right" class="responsive-table">
														<tr>
																<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 15px; line-height: 22px; text-align: right;" bgcolor="#ffffff" class="flex-p-charges">
																Delivery Charges : 
															</td>
														</tr>
													</table>
												
												</td>
												
											</tr>
											
										<?php
										}
										?>	
																		<!-- TOTAL COUNT -->
																		<?php 
											if($order_row['discount']!=0){
											?>
											<tr>
												<td align="right" style="padding: 15 0 0 0; font-size: 15px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 100;" class="align-total-charge">
												
													<table cellpadding="0" cellspacing="0" border="0" width="20%" align="right" class="responsive-table">
														<tr>
															<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #df1d40; font-weight: 600; font-size: 15px; line-height: 22px; text-align: right;" bgcolor="#ffffff" class="flex-p-charges">
										<?php
										echo $order_row['discount'];
										?>
															</td>
														</tr>
													</table>
													<!-- RIGHT COLUMN -->
													<table cellpadding="0" cellspacing="0" border="0" width="50%" align="right" class="responsive-table">
														<tr>
															<td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 15px; line-height: 22px; text-align: right;" bgcolor="#ffffff" class="flex-p-charges">
																Discount : 
															</td>
														</tr>
													</table>
												
												</td>
												
											</tr>
											<?php } ?>
												<?php 
											if($order_row['sub_total']!=0){
											?>
										
												
											<?php } ?>
											<!-- TOTAL -->
											<tr>
												<td align="right" style="padding: 15 0 0 0; font-size: 32px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #00b1b1; font-weight: 100;" class="align-total-charge"  width="100%">
													<?php  
										echo $order_row['sub_total'];
										?></b>
												</td>
											</tr>
											<!-- TOTAL TITLE -->
											<tr>
												<td align="right" style="font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px;" class="align-total-charge">
													Total (including tax recovery charges and service fees)
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<!-- DASHED LINE -->
								<tr>
									<td style="padding: 0px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td align="center" style="padding: 15px 0 0 0; font-size: 16px; line-height: 1px; font-family: Helvetica, Arial, sans-serif; color: #999999; border-bottom: 1px dashed #999999;" class="padding-copy">
													&nbsp;
												</td>
											</tr>
										</table>
									</td>
								</tr>
								
								
							</table>

						 
                        </div>
						
				 <!--div class="text-center" >
                <img src="<?php echo $file_path?>images/poweredby.png" style="padding: 0; text-align: center; width: 200px; height: auto;">
            </div-->
						
						
                    </div>		
					
					<img src="https://gallery.mailchimp.com/c6b1236c909d2d0e1b52e9f8f/images/b1dca63c-f6a5-454a-a733-bfb5a95f7f1f.png" class="img-max" style="display: none; padding: 0; color: #666666; width: 100%; height: 6px; margin-bottom: 20px; margin-top: -1px; ">
	                    <br>
                </div>
            </div>
        </div>
    </div>
	
</div>


<?php 

if(isset($_SESSION['id']))
{
	?>
	<div class="add_btn_primary" id="pp" name="pp" type="submit" style="text-align:center"> <a onclick="printpage()">PRINT</a> </div> <br> <br> <br>
	<?php
	
}

?>
<script>
function toppingitem(id){
		 var myurl='topping_model.php';
		 var dataString = "pid="+id;
		  $.ajax({
		 	 type: "POST",
			 url: myurl,
			 data: dataString,
			 success: function(data) {
				 $('.toppinginfo').html(data);
				 $('#topping').modal('show');
			 } 
		});
	}
</script>
 <div class="modal fade" id="topping" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
        <h4 class="modal-title text-center" id="exampleModalLongTitle">Topping List</h4>
        <button style="margin-top: -20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                            <div class="modal-body toppinginfo">
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
<script>
function printpage()
{
	window.print();
}
</script>


<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
	
	@media print {
	  @page { margin: 0; }
	  body { margin: 1cm; }
	}

</style>


<style>

.add_btn_primary a {
    background-color: <?php echo $button2_color ?>!important;;
    /*box-shadow: 0 2px 3px rgba(9, 80, 119, 0.3);*/
    border: 1px solid transparent;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    border-radius: 3px;
    border-style: 1px solid;
    margin-bottom: 5px;
    transition: all 0.3s ease 0s;
    padding: 10px 30px;
    color: #ffffff;
}


.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
.modal-dialog {
  top:25% !important;
}

</style>

<!-- Simple Invoice - END -->

</div>

</body>
</html>