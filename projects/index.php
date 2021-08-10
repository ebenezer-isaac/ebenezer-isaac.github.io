<?php
$page = "Projects";
include "logger.php";
?>
<html lang="zxx" class="no-js">
    <head>
        <title>Projects</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="https://www.ebenezer-isaac.com/img/logo.png">
        <meta name="author" content="Ebenezer Isaac">
        <meta name="description" content="Final Year B.C.A Student at Maharaja Sayajirao University of Baroda | IoT and Java Web Developer | CEH | Transcriptionist | Freelancer">
        <meta name="keywords" content="ebenezer isaac, ebenezer, isaac ,indian ceh, iot developer, java developer, msu baroda, cerberus, mycrochips, ebenezer tirunelveli">
        <meta charset="UTF-8">
        <meta property="og:title" content="Projects by Ebenezer Isaac" />
        <meta property="og:site_name" content="Click To Know More">
        <meta property="og:url" content="https://projects.ebenezer-isaac.com/index.php" />
        <meta property="og:description" content="Final Year B.C.A Student">
        <meta property="og:image" content="https://www.ebenezer-isaac.com/img/logo.png">
        <meta property="og:image:width" content="1000" />
        <meta property="og:image:height" content="1000" />
        <meta property="og:type" content="website" />
        <link rel="stylesheet" href="https://www.ebenezer-isaac.com/main.css">
    </head>
    <body style='overflow-x: hidden;'>
        <header id="header">
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="https://www.ebenezer-isaac.com">
                            <img class="lazyload" data-src="https://www.ebenezer-isaac.com/img/logo-hi.png" height="42px" width="42px" alt="Website Logo">benezer</a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li><a href="https://www.ebenezer-isaac.com">Home</a></li>
                            <li><a id ='projects'>Projects</a></li>
                            <li><a href="https://about.ebenezer-isaac.com/">About</a></li>
                            <li><a href ='https://organizer.ebenezer-isaac.com/'>Organizer</a></li>
                            <li><a href ='https://analytics.ebenezer-isaac.com/'>Analytics</a></li>
                            <li><a href="https://www.ebenezer-isaac.com/contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <section class="portfolio-area section-gap" id="portfolio">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">Featured Projects</h1>
                            <p>These are some of my projects I made during my spare time</p>
                            <p>More projects will be added with time</p>
                        </div>
                    </div>
                </div>
                <div class="filters">
                    <ul>
                        <li class="active" data-filter="*" id='allprojects'>All</li>
                        <li data-filter=".iot" onclick='changeflag()'>Internet Of Things</li>
                        <li data-filter=".web" onclick='changeflag()'>Web Applications</li>
                        <li data-filter=".cyber" onclick='changeflag()'>Cyber Security</li>
                    </ul>
                </div>
                <div class="filters-content">
                    <div class="row grid">
                        <div class="single-portfolio col-sm-4 all cyber">
                            <div class="relative">
                                <a href="/android-meterpreter-over-public-ip/">	
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/cyber.webp" type="image/webp" alt="Cyber Security Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/cyber.jpg" alt="Cyber Security Project"></picture>
                                    </div>
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                              		
                            </div>
                            <div class="p-inner">
                                <h4>Android Meterpreter over Public IP</h4>
                                <div class="cat">Cyber Security</div>
                            </div>					                               
                        </div>
                        <div class="single-portfolio col-sm-4 all cyber">
                            <div class="relative">
                                <a href="/honeypot-code-host/">
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/cyber.webp" type="image/webp" alt="Cyber Security Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/cyber.jpg" alt="Cyber Security Project"></picture>
                                    </div>
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                              		
                            </div>
                            <div class="p-inner">
                                <h4>HoneyPot Code Host</h4>
                                <div class="cat">Cyber Security</div>
                            </div>					                               
                        </div>                            
                        <div class="single-portfolio col-sm-4 all cyber">
                            <div class="relative">
                                <a href="/captive-portal-for-phishing/">
                                    <div class="thumb">

                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/cyber.webp" type="image/webp" alt="Cyber Security Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/cyber.jpg" alt="Cyber Security Project"></picture>
                                    </div>
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a> 
                            </div>
                            <div class="p-inner">
                                <h4>Captive Portal for Phishing</h4>
                                <div class="cat">Cyber Security</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all web">
                            <div class="relative">
                                <a href="/photo-scraping/">
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/web.webp" type="image/webp" alt="Web App Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/web.png" alt="Web App Project"></picture>
                                    </div>
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                            		
                            </div> 
                            <div class="p-inner">
                                <h4>Photo Scraping</h4>
                                <div class="cat">Web Scraping</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all iot">
                            <div class="relative">
                                <a href="/home-automation/">
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/iot.webp" type="image/webp" alt="Iot App Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/iot.jpg" alt="IoT App Project"></picture>
                                    </div>
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                             		
                            </div>
                            <div class="p-inner">
                                <h4>Home Automation</h4>
                                <div class="cat">Internet of Things</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all cyber">
                            <div class="relative">
                                <a href="/instagram-phishing/">
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/cyber.webp" type="image/webp" alt="Cyber Security Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/cyber.jpg" alt="Cyber Security Project"></picture>
                                    </div>
                                    <div class="middle" >
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                             		
                            </div>
                            <div class="p-inner">
                                <h4>Instagram Phishing</h4>
                                <div class="cat">Cyber Security</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all iot">
                            <div class="relative">
                                <a href="/biometric-attendance-rpi/">
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/iot.webp" type="image/webp" alt="Iot App Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/iot.jpg" alt="IoT App Project"></picture>
                                    </div>
                                    <div class="middle" >
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                             		
                            </div>
                            <div class="p-inner">
                                <h4>Biometric Attendance - RPi</h4>
                                <div class="cat">Internet of Things</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all web">
                            <div class="relative">
                                <a href="/attendance-management-system/">
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/web.webp" type="image/webp" alt="Web App Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/web.png" alt="Web App Project"></picture>
                                    </div>
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                             		
                            </div>
                            <div class="p-inner">
                                <h4>Attendance Management System</h4>
                                <div class="cat">Web Application</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all cyber">
                            <div class="relative">
                                <a href="/shutdown-malware/">
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/cyber.webp" type="image/webp" alt="Cyber Security Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/cyber.jpg" alt="Cyber Security Project"></picture>
                                    </div>
                                    <div class="middle" >
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                             		
                            </div>
                            <div class="p-inner">
                                <h4>Shutdown Malware</h4>
                                <div class="cat">Cyber Security</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all web">
                            <div class="relative">
                                <a href="/registration-spammer/">
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/web.webp" type="image/webp" alt="Web App Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/web.png" alt="Web App Project"></picture>
                                    </div>
                                    <div class="middle" >
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                             		
                            </div>
                            <div class="p-inner">
                                <h4>Registration Spammer</h4>
                                <div class="cat">Web Spammer</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all iot">
                            <div class="relative">
                                <a href="/number-lock-solenoid-lock/">
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/iot.webp" type="image/webp" alt="Iot App Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/iot.jpg" alt="IoT App Project"></picture>
                                    </div>
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                             		
                            </div>
                            <div class="p-inner">
                                <h4>Number Lock Solenoid Vault</h4>
                                <div class="cat">Internet of Things</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all web">
                            <div class="relative">
                                <a href="/online-synchronous-quiz/">
                                    <div class="thumb">
                                        <div class="overlay overlay-bg"></div>
                                        <picture><source class="image img-fluid lazyload" data-source="https://www.ebenezer-isaac.com/img/web.webp" type="image/webp" alt="Web App Project"><img class="image img-fluid lazyload" data-src="https://www.ebenezer-isaac.com/img/web.png" alt="Web App Project"></picture>
                                    </div>
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="https://www.ebenezer-isaac.com/img/preview.png"></div>
                                    </div>
                                </a>                             		
                            </div>
                            <div class="p-inner">
                                <h4>Online Synchronous Quiz</h4>
                                <div class="cat">Web Application</div>
                            </div>
                        </div>
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
                            <a href='https://www.ebenezer-isaac.com/contact.php'>
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
                                    <source class="lazyload" style="height:30px;"  align='center' data-source="https://www.ebenezer-isaac.com/img/stack.webp" type="image/webp" alt="StackOverFlow Logo">
                                    <img class="lazyload" style="height:30px;"  align='center' data-src="https://www.ebenezer-isaac.com/img/stack.png" alt="StackOverFlow Logo">
                                </picture>
                            </a>
                            &nbsp;&nbsp;
                            <a href="//github.com/ebenezerv99" target="_blank">
                                <picture>
                                    <source class="lazyload" style="height:30px;"  align='center' data-source="https://www.ebenezer-isaac.com/img/git.webp" type="image/webp" alt="Github Logo">
                                    <img class="lazyload" style="height:30px;"  align='center' data-src="https://www.ebenezer-isaac.com/img/git.png" alt="Github Logo">
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://www.ebenezer-isaac.com/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://www.ebenezer-isaac.com/js/popper.min.js"></script>
        <script src="https://www.ebenezer-isaac.com/js/vendor/bootstrap.min.js"></script>			
        <script src="https://www.ebenezer-isaac.com/js/easing.min.js"></script>			
        <script src="https://www.ebenezer-isaac.com/js/hoverIntent.js"></script>
        <script src="https://www.ebenezer-isaac.com/js/superfish.min.js"></script>	
        <script src="https://www.ebenezer-isaac.com/js/jquery.ajaxchimp.min.js"></script>
        <script src="https://www.ebenezer-isaac.com/js/jquery.magnific-popup.min.js"></script>	
        <script src="https://www.ebenezer-isaac.com/js/jquery.tabs.min.js"></script>						
        <script src="https://www.ebenezer-isaac.com/js/jquery.nice-select.min.js"></script>	
        <script src="https://www.ebenezer-isaac.com/js/isotope.pkgd.min.js"></script>			
        <script src="https://www.ebenezer-isaac.com/js/waypoints.min.js"></script>
        <script src="https://www.ebenezer-isaac.com/js/jquery.counterup.min.js"></script>
        <script src="https://www.ebenezer-isaac.com/js/simple-skillbar.js"></script>							
        <script src="https://www.ebenezer-isaac.com/js/owl.carousel.min.js"></script>							
        <script src="https://www.ebenezer-isaac.com/js/mail-script.js"></script>	
        <script src="https://www.ebenezer-isaac.com/js/animatescroll.js"></script>
        <script src="https://www.ebenezer-isaac.com/js/main.js"></script>
        <script src="https://www.ebenezer-isaac.com/js/lazysizes.min.js" async></script>
        <script>$("#home").click(function () {$("#homesection").animatescroll({scrollSpeed: 1e3, easing: "easeInOutQuint"})});$("#services").click(function () {$("#servicessection").animatescroll({scrollSpeed: 1e3, easing: "easeInOutQuint"})});$("#projects").click(function () {$("#portfolio").animatescroll({scrollSpeed: 1e3, easing: "easeInOutQuint"})});$("#hosting").click(function () {$("#hostingsection").animatescroll({scrollSpeed: 1e3, easing: "easeInOutQuint"})});var flag = 1;$(window).scroll(function() {if (flag==1){var hT = $('#portfolio').offset().top,hH = $('#portfolio').outerHeight(),wH = $(window).height(),wS = $(this).scrollTop();if (wS > (hT+hH-wH)){document.getElementById('allprojects').click();}}});setTimeout(function(){ document.getElementById('allprojects').click();}, 1000);function changeflag(){flag=0;}</script>
    </body>
</body>
</html>