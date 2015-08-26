<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Money Lover</title>
    <link rel="stylesheet" href="./styles/css/bootstrap.css">
    <link rel="stylesheet" href="./styles/css/styles.css">
    <script type="text/javascript" src="./styles/js/jquery.js"></script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
</head>
<body>
    <!--header-->            
    <div class="header">  
         <div class="container">
              <div class="logo">
                  <a href="index.php"><img src="./img/logo.jpg" title="" /></a>
              </div>
                 <!--start-top-nav-->
                 <div class="top-menu">
                      <span class="menu"> </span> 
                       <ul>
                            <li id="home"><a href="index.php?c=page&m=home&p=home">HOME</a></li>                       
                            <li id="about"><a href="index.php?c=page&m=about&p=about">ABOUT</a></li> 
                            <li id="contact"><a href="index.php?c=page&m=contact&p=contact">CONTACT</a></li>                     
                            <div class="clearfix"> </div>
                     </ul>
                     <div class="search">
                         <form>
                         <input type="text" placeholder="" required="">
                         <input type="submit" value=""/>
                         </form>
                     </div>
                 </div>

                 <div class="clearfix"></div>
                        <script>
                        $("span.menu").click(function(){
                        $(".top-menu ul").slideToggle("slow" , function(){
                        });
                        });
                        </script>
                    <!--//End-top-nav-->                 
         </div>
    </div>
    <!--/header-->

    <!-- Content -->
    <div class="content">
         <div class="container">
             <div class="content-grids">
                                  
                     <?php include ROOT . DS . 'views' . DS . $template_file; ?>
               
                     <?php if (isset($sidebar)): include ROOT . DS . 'views' . DS . $sidebar; endif; ?>
                      
                  <div class="clearfix"></div>
              </div>
          </div>
    </div>
    <!-- End content -->

    <!-- Footer -->
    <div class="footer">
         <div class="container">
         <p>Copyrights © 2015 Blog All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
         </div>
    </div>
    <!-- End footer -->

    <script type="text/javascript">
    $(document).ready(function() {
        if ('<?php echo $_GET["p"]; ?>' == 'home') {$('#home').addClass('active');}
        else if ('<?php echo $_GET["p"]; ?>' == 'about') {$('#about').addClass('active');}
        else if ('<?php echo $_GET["p"]; ?>' == 'contact'){$('#contact').addClass('active');}
    });
    </script>
</body>
</html>