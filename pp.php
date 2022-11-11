<?php

include('includes/connection.php');
include('includes/header.php');

?>
 <!-- Page Title -->
 <section class="page-title" style="background-image: url(assets/images/background/bg-20.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>About Us</h1>
                    </div>
                    <ul class="bread-crumb">
                        <li class="home"><a href="index.html"><span class="far fa-home"></span></a></li>
                        <li>Who we are</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!-- About Section -->
    <section class="about-us-section">
        <div class="shape-one"></div>
        <div class="auto-container">
            <h1 class="big-title">About Us</h1>
            <div class="row">
                <div class="col-lg-6">
                    <div class="content wow fadeInUp">
                        <h2><?php echo $about_row['title']; ?></h2>
                        <div class="text"><?php echo $about_row['description']; ?></div>
                        <!--div class="link-btn"><a href="about.html" class="theme-btn btn-style-two"><span>Read More</span></a></div-->
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="image-block wow fadeInRight">
                  
                    </div>
                </div>
            </div>
        </div>            
    </section>

    