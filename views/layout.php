<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Money Lover</title>
    <link rel="stylesheet" href="./styles/css/bootstrap.css">
    
    <link rel="stylesheet" href="./styles/css/styles.css">
    <script type="text/javascript" src="./styles/js/jquery.js"></script>
    <script type="text/javascript" src="./styles/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="./styles/js/jquery.twbsPagination.min.js"></script>

</head>
<body>
    <!--header-->            
    <div class="header">  
      <div class="logo">
          <a href="index.php"><img src="./img/logo.jpg" title="" /></a>
      </div>
         <!--start-top-nav-->
         <div class="top-menu">
               <ul>
                    <li id="home"><a href="index.php?c=home&m=index&p=home">Trang chủ</a></li>                       
                    <li id="shop"><a href="index.php?c=product&m=list&p=shop">Mua sắm</a></li> 
                    <li id="contact"><a href="index.php?c=contact&m=index&p=contact">Liên hệ</a></li>                     
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
    <!--/header-->

    <!-- Content -->
    <div class="content">         
        <?php include ROOT . DS . 'views' . DS . $template_file; ?>

        <?php if (isset($sidebar)): include ROOT . DS . 'views' . DS . $sidebar; endif; ?>
      
        <div class="clearfix"></div>
    </div>
    <!-- End content -->

    <!-- Footer -->
    <div class="footer">
         <div class="container">
         <p>Copyrights © 2015 Blog All rights reserved | Develop by <a href="http://www.facebook.com/ozu94" target="_blank">duytan</a></p>
         </div>
         <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
    </div>
    <!-- End footer -->

    <script type="text/javascript">
    $(document).ready(function() {
        if ('<?php echo $_GET["p"]; ?>' == 'home') {$('#home').addClass('active');}
        else if ('<?php echo $_GET["p"]; ?>' == 'shop') {$('#shop').addClass('active');}
        else if ('<?php echo $_GET["p"]; ?>' == 'contact'){$('#contact').addClass('active');}

        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function () {
                backToTop();
            });
            $('#back-to-top').on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }
    });
    </script>
</body>
</html>