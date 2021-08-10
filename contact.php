<?php $page="Contact";include "logger.php";?>
<html lang="zxx" class="no-js">
    <head>
        <title>Contact</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="/img/logo.png">
        <meta name="author" content="Ebenezer Isaac">
        <meta name="description" content="Final Year B.C.A Student at Maharaja Sayajirao University of Baroda | IoT and Java Web Developer | CEH | Transcriptionist | Freelancer">
        <meta name="keywords" content="ebenezer isaac, ebenezer, isaac ,indian ceh, iot developer, java developer, msu baroda, cerberus, mycrochips, ebenezer tirunelveli">
        <meta charset="UTF-8">
        <meta property="og:title" content="Ebenezer Isaac | CEH | IoT Developer" />
        <meta property="og:site_name" content="Click To Know More">
        <meta property="og:url" content="https://www.ebenezer-isaac.com/contact.php" />
        <meta property="og:description" content="Final Year B.C.A Student">
        <meta property="og:image" content="https://www.ebenezer-isaac.com/img/logo.png">
        <meta property="og:image:width" content="1000" />
        <meta property="og:image:height" content="1000" />
        <meta property="og:type" content="website" />
        <link rel="stylesheet" href="/main.css">
    </head>
    <body style='overflow-x: hidden;'>
        <header id="header">
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="https://www.ebenezer-isaac.com">
                            <img class="lazyload" data-src="img/logo-hi.png" height="42px" width="42px" alt="Website Logo">benezer</a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li><a href="https://www.ebenezer-isaac.com">Home</a></li>
                            <li><a href ='https://projects.ebenezer-isaac.com/'>Projects</a></li>
                            <li><a href=https://about.ebenezer-isaac.com/>About</a></li>
                            <li><a href ='https://organizer.ebenezer-isaac.com/'>Organizer</a></li>
                            <li><a href ='https://analytics.ebenezer-isaac.com/'>Analytics</a></li>
                            <li><a id="contact" >Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <?php
        $plan = $_GET['plan'];
        ?>
        <section class="contact-page-area section-gap" id="contactsection">
            <div class="container"> 
                <div class="row d-flex justify-content-center mb-4 mt-4">
                    <div class="menu-content  col-lg-7">
                        <div class="title text-center">
                            <h1 class="mb-10">Contact</h1>
                        </div>
                    </div>
                </div>	
                <div class="row mt-6">
                    <div class="col-lg-4 d-flex flex-column address-wrap mt-5">
                        <div class="single-contact-address d-flex flex-row">
                            <div class="icon" style="margin:7px;">
                                <img class="lazyload" data-src="img/home.svg" height="40px" alt="House Icon">
                            </div>
                            <div class="contact-details">
                                <h5>Gujarat, India</h5>
                                <p>
                                    Alkapuri, Vadodara
                                </p>
                            </div>
                        </div>
                        <div class="single-contact-address d-flex flex-row">
                            <div class="icon" style="margin:7px;">
                                <img class="lazyload" data-src="img/envelope.svg" height="40px" alt="Mail Icon">
                            </div>
                            <div class="contact-details">
                                <a href="mailto:contact@ebenezer-isaac.com?Subject=Enquiry" target="_top">contact@ebenezer-isaac.com</a>
                                <p>Send me your query anytime!</p>
                            </div>
                        </div>														
                    </div>
                    <div class="col-lg-8">
                        <form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
                            <div class="row">	
                                <div class="col-lg-6 form-group">
                                    <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

                                    <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

                                    <input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text"
                                    <?php
                                    if ($plan == "eco") {
                                        echo "value='Interested to buy Economy Hosting Plan'";
                                    } else if ($plan == "std") {
                                        echo "value='Interested to buy Standard Hosting Plan'";
                                    } else if ($plan == "prem") {
                                        echo "value='Interested to buy Premium Hosting Plan'";
                                    }
                                    ?>>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required=""><?php
                                        if ($plan == "eco") {
                                            echo "Hello Ebenezer,\n \t I'm Interested to buy the Economy Hosting Plan for my website. I would like to more details on . . ";
                                        } else if ($plan == "std") {
                                            echo "Hello Ebenezer,\n \t I'm Interested to buy the Standard Hosting Plan for my website. I would like to more details on . . ";
                                        } else if ($plan == "prem") {
                                            echo "Hello Ebenezer,\n \t I'm Interested to buy the Premium Hosting Plan for my website. I would like to more details on . . ";
                                        }
                                        ?></textarea>				
                                </div>
                                <div class="col-lg-12">
                                    <div class="alert-msg" style="text-align: left;"></div>
                                    <button class="genric-btn primary" style="float: right;">Send Message</button>											
                                </div>
                            </div>
                        </form>	
                    </div>
                </div>
            </div>	
        </section>
        <footer class="footer-area section-gap" height="300px">
            <div class="container"  height="300px">
                <div class="row"  height="300px">
                    <div class="col-lg-4 col-md-6 col-sm-6" align='center'>
                        <a href='https://about.ebenezer-isaac.com/'>
                            <div class="single-footer-widget">
                                <h4>About Me</h4>
                                <p>If you are curious to know<br>how it all began</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6" align='center'>
                        <div class="single-footer-widget">
                            <a href='contact.php'>
                                <h4>Ping Me</h4>
                                <p>Send me a stray email<br>and I'll revert back to you</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 social-widget" align='center'>
                        <div class="single-footer-widget">
                            <a href="javascript:alert('I really mean it. \n:)\n I already have a few friends who drain me enough. Thank You!')">
                                <h4>Let us be social</h4>
                                <p>Wait a sec....Naah!<br>I'm not into that kind of Stuff</p>
                            </a>
                            <a href="//stackoverflow.com/users/11380610/ebenezer-isaac" target="_blank">
                                <picture>
                                    <source class="lazyload" style="height:30px;"  align='center' data-source="/img/stack.webp" type="image/webp" alt="StackOverFlow Logo">
                                    <img class="lazyload" style="height:30px;"  align='center' data-src="img/stack.png" alt="StackOverFlow Logo">
                                </picture>
                            </a>
                            &nbsp;&nbsp;
                            <a href="//github.com/ebenezerv99" target="_blank">
                                <picture>
                                    <source class="lazyload" style="height:30px;"  align='center' data-source="/img/git.webp" type="image/webp" alt="Github Logo">
                                    <img class="lazyload" style="height:30px;"  align='center' data-src="img/git.png" alt="Github Logo">
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/vendor/bootstrap.min.js"></script>			
        <script src="/js/easing.min.js"></script>			
        <script src="/js/hoverIntent.js"></script>
        <script src="/js/superfish.min.js"></script>	
        <script src="/js/jquery.ajaxchimp.min.js"></script>
        <script src="/js/jquery.magnific-popup.min.js"></script>	
        <script src="/js/jquery.tabs.min.js"></script>						
        <script src="/js/jquery.nice-select.min.js"></script>	
        <script src="/js/isotope.pkgd.min.js"></script>			
        <script src="/js/waypoints.min.js"></script>
        <script src="/js/jquery.counterup.min.js"></script>
        <script src="/js/simple-skillbar.js"></script>							
        <script src="/js/owl.carousel.min.js"></script>							
        <script src="/js/mail-script.js"></script>	
        <script src="/js/animatescroll.js"></script>
        <script src="/js/main.js"></script>
        <script src="/js/lazysizes.min.js" async></script>
                <script>
                                        $("#contact").click(function () {
                                            $("#contactsection").animatescroll({scrollSpeed: 1000, easing: "easeInOutQuint"});
                                        });
        </script>
    </body>
</body>
</html>