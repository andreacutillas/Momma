<?php
    $url = $_SESSION['nombreurl'];
    
    echo $url;

    $str = ucfirst(mb_substr($url, 7, null, 'UTF-8'));
    echo $str;

    $_SESSION['url'] = $str;
?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MoMA</title>
            <!--CSS-->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
            <!--FONTS-->
        <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E"> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,900;1,400;1,700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
            <!--FLICKITY-->
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
            <!--JS-->
        <script type="text/javascript" src="js/menu.js"></script>
    </head>

    <body>

        <header>

        <!-- Dropdown -->

        <div class="dropdown" style="float:left;">
                <button class="dropbtn">
                    <figure><img class="drop_logo" src="img/dropdown.svg" alt="dropdown"></img></figure>
                </button>
                <div class="dropdown-content" style="left:0;">
                    <a href="index.php"><img src="img/logo.svg"></img></a>
                    <a href="store.php">STORE</a>
                    <a href="about.php">ABOUT</a>
                    <a href="cart.php">CART</a>
                    <?php
                                session_start();
                                if(isset($_SESSION['nombre'])){
                                    echo '<a class="open-button" href="profile.php">'; 
                                }
                                else {
                                    echo '<a class="open-button" onclick="openForm()">';
                                }
                            ?>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 0C9.06087 0 10.0783 0.421427 10.8284 1.17157C11.5786 1.92172 12 2.93913 12 4C12 5.06087 11.5786 6.07828 10.8284 6.82843C10.0783 7.57857 9.06087 8 8 8C6.93913 8 5.92172 7.57857 5.17157 6.82843C4.42143 6.07828 4 5.06087 4 4C4 2.93913 4.42143 1.92172 5.17157 1.17157C5.92172 0.421427 6.93913 0 8 0V0ZM8 10C12.42 10 16 11.79 16 14V16H0V14C0 11.79 3.58 10 8 10Z" fill="black"/>
                            </svg>
                        </a>
                </div>
            </div>
            
            <!-- Menu -->
            <div id="menu">
                <a class="logo" href="index.php"><img class="logo" src="img/Logo.svg" alt="logo"></a>
                <nav class="list_menu">
                    <ul>
                        <li><a class="btn-store" href="store.php">STORE</a></li>
                        <li><a class="btn-about" href="about.php">ABOUT</a></li>
                        <li><a class="btn-cart" href="cart.php">CART</a></li>
                        <li>
                            <?php
                                session_start();
                                if(isset($_SESSION['nombre'])){
                                    echo '<a class="open-button" href="profile.php">'; 
                                }
                                else {
                                    echo '<a class="open-button" onclick="openForm()">';
                                }
                            ?>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 0C9.06087 0 10.0783 0.421427 10.8284 1.17157C11.5786 1.92172 12 2.93913 12 4C12 5.06087 11.5786 6.07828 10.8284 6.82843C10.0783 7.57857 9.06087 8 8 8C6.93913 8 5.92172 7.57857 5.17157 6.82843C4.42143 6.07828 4 5.06087 4 4C4 2.93913 4.42143 1.92172 5.17157 1.17157C5.92172 0.421427 6.93913 0 8 0V0ZM8 10C12.42 10 16 11.79 16 14V16H0V14C0 11.79 3.58 10 8 10Z" fill="black"/>
                            </svg>
                        </a></li>
                    </ul>
                </nav>
            </div>

            <!-- Login  -->
            <div class="form-popup" id="myForm"  
                <?php
                    if(isset($_GET['error'])){
                        echo 'style="display: block;"';
                    }
                ?>
            >
                <form action="seguridad.php" method="post" class="form-container">
                    <div id="cancel_contain">
                        <button type="button" class="btn_cancel" onclick="closeForm()">x</button>
                    </div>
                    <h4>Sign in to your Account</h4>
                    <h6>New to MoMA Design Store?</h6>
                    <button  type="submit" class="btn_simple" onclick="window.location.href='create_account.php'">Create an account</button>

                    <div id="left_itm">
                        <label for="email">Email</label>
                        <input type="text" id="email" placeholder="Email Adress" name="email" required>
                
                        <label for="psw">Password</label>
                        <input type="password" id="psw" placeholder="Password" name="psw" required>
                    </div>
                    <?php
                        if(isset($_GET['url'])) {
                            echo '<input type="hidden" name="url" value="'.$_GET['url'].'"';
                        }

                    ?>
                    <div id="center_itm">
                        <button type="submit" class="btn_regular">Log in</button>
                        <button  type="submit" class="btn_simple">Forgot password</button>
                    </div>
                    
                </form>
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] ==1){
                            echo "<p>You have entered an unvalid username or password</p>";
                        }
                        else if($_GET['error'] ==2){
                            echo "<p>This user doesn't exist</p>";
                        }
                        else if($_GET['error'] ==3){
                            echo "<p>It looks like you are having trouble with your connection. Please try again later</p>";
                        }
                        else if($_GET['error'] ==4){
                            echo "<p>This user doesn't exist. Try writing something different!.</p>";
                        }
                        else if($_GET['error'] ==5){
                            echo "<p>This password is incorrect. Try writing something different!</p>";
                        }
                    }
                ?>
            </div>
        </header>
        
        <main>
            <!-- Sección 1 Carousel -->
            <section class="section_header">
                <div id="caja_article">
                    <div  id="carousel">
                        <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
                    
                            <div class="carousel-cell">
                                <img src="img/img22.jpg" alt="Crystal Glass">
                            </div>
                        
                            <div class="carousel-cell">
                                <img src="img/img16.jpg" alt="Crystal Glass">
                            </div>
                        
                            <div class="carousel-cell">
                                <img src="img/img17.jpg" alt="Crystal Glass">
                            </div>
                        </div>
                        
                        <!-- <div class="carousel carousel-nav" data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                    
                            <div class="carousel-cell">
                                <img src="img/img22.jpg" alt="Crystal Glass">
                            </div>
                        
                            <div class="carousel-cell">
                                <img src="img/img16.jpg" alt="Crystal Glass">
                            </div>
                        
                            <div class="carousel-cell">
                                <img src="img/img17.jpg" alt="Crystal Glass">
                            </div>
                        </div> -->
                        
                    </div>
                    
                    <div id="carousel_text">
                        <p id="p1">BEST SELLER</p>
                        <h1>Radiant Faceted Crystal Glass Set</h1>
                        <div>
                            <p id="p1">€34.95    Non-Member Price</p>
                            <p id="p2">€44.95    Member Price</p>
                            <p id="p3">MEMBERS SAVE UP TO 20% & GET FREE SHIPPING</p>
                            <p id="p1">Gift Wrap Aviable</p>
                            <button class="btn_regular">Add to Cart</button>
                        </div>
                    </div>
            
                </div> 
            </section>
            
            <section class="section_subtitle">
                <h4>Description</h4>
                <div id="caja_about">
                    <p>MoMA Exclusive: Thanks to their faceted shapes, these mouth-blown Radiant Crystal Glasses can be placed down in a variety of ways, creating interesting reflections of light and liquid from different angles. Set of two. Produced by Puik. 
                    Dutch designer Lara van der Lugt was inspired to design these glasses by asking herself the question: How can we make people aware of how precious water is? Because the future of water availability remains uncertain, van der Lugt feels we should cherish our water supply as if it were a rare diamond.</p>
                </div>
            </section>
            
            <section class="section_subtitle">
                <h4>Details</h4>
                <div class="contenido">    
                    <div class="columna">
                        <div class="texto">
                            <p><b>Designer</b></p>
                            <p>Lara van der Lugt</p>
                        </div>
                        <div class="texto">
                            <p><b>Size</b></p>
                            <p>3.45h x 3.5"diam.</p>
                        </div>
                    </div>                        
                    <div class="columna">
                        <div class="texto">
                            <p><b>Materials</b></p>
                            <p>Crystal</p>
                        </div>
                        <div class="texto">
                            <p><b>Year of Design</b></p>
                            <p>2014</p>
                        </div>
                    </div>
                        
                     <div class="columna">
                        <div class="texto">
                            <p><b>Origin</b></p>
                            <p>Imported</p>
                        </div>
                        <div class="texto">
                            <p><b>Volume</b></p>
                            <p>5.3 oz.</p>
                        </div>
                    </div>
                </div>     
            </section>
                

            <section id="section_btn" class="section_subtitle">
                
                <h4>You Might Also Like</h4>
                <div class="gallery_btn">
                    <div class="gallery">
                        <figure>
                            <a href="article.php"><img src="img/img6.jpg" alt="img6"></a>
                            <figcaption>
                                <h5>Lexon Mino</h5>
                                <p>L Pairable Speaker</p>
                            </figcaption>
                        </figure>
                        <figure>
                            <a href="article.php"><img src="img/img7.jpg" alt="img7"></a>
                            <figcaption>
                                <h5>De Kooning </h5>
                                <p>Framed Print</p>
                            </figcaption>
                        </figure>
                        <figure>
                            <a href="article.php"><img src="img/img8.jpg" alt="img8"></a>
                            <figcaption>
                                <h5>Menorah</h5>
                                <p>Candle Holder</p>
                            </figcaption>
                        </figure>
                        <figure>
                            <a href="article.php"><img src="img/img9.jpg" alt="img9"></a>
                            <figcaption>
                                <h5>JWDA</h5>
                                <p>Table Lamp</p>
                            </figcaption>
                        </figure>
                    </div>
                    <button class="btn_regular" onclick="window.location.href='store.php'">Shop All</button>
                </div>
            </section>
            
        </main>

        <footer>
            <!-- Footer -->
            <div id="menu_footer">
                <a class="logo" href="index.php"> 
                    <svg width="237" height="26" viewBox="0 0 237 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0-813241)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M74.1802 13.1711L71.9291 5.33255L69.5424 13.1711H74.1802ZM68.8913 0.423584H75.2381L81.4764 20.7654H76.4316L75.2921 16.9954H68.2676L67.1015 20.7654H62.3008L68.8913 0.423584ZM55.954 5.63113L52.184 20.7654H47.8171L44.1013 5.57662V20.7654H39.5449V0.423584H47.1934L50.2854 13.2796L53.4317 0.423584H60.7818V20.7654H55.954V5.63113ZM30.3772 9.78079C28.9671 9.78079 27.9363 10.7842 27.9363 13.4152V14.0932C27.9363 16.6699 28.9671 17.7276 30.3772 17.7276C31.8148 17.7276 32.8455 16.6699 32.8455 14.0932V13.4152C32.8455 10.7842 31.8148 9.78079 30.3772 9.78079ZM23.0542 13.9033V13.605C23.0542 8.99436 26.6072 6.49892 30.3772 6.49892C34.1746 6.49892 37.7277 8.99436 37.7277 13.605V13.9033C37.7277 18.5685 34.1746 21.0366 30.3772 21.0366C26.6072 21.0366 23.0542 18.5685 23.0542 13.9033ZM16.3822 5.63113L12.6394 20.7654H8.27247L4.55671 5.57662V20.7654H0V0.423584H7.64847L10.7405 13.2796L13.8597 0.423584H21.237V20.7654H16.3822V5.63113Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M91.0852 1.99672V19.1922H95.2891C99.7645 19.1922 102.422 16.3988 102.422 10.757V10.3774C102.422 4.62748 99.7645 1.99672 95.2891 1.99672H91.0852ZM89.0508 20.7654V0.423584H95.4247C100.741 0.423584 104.483 3.65094 104.483 10.3774V10.757C104.483 17.5922 100.741 20.7654 95.4247 20.7654H89.0508Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M108.716 11.9234H117.503C117.449 8.53304 115.903 6.79719 113.381 6.79719C111.211 6.79719 109.095 8.34349 108.716 11.9234ZM113.354 21.0094C109.936 21.0094 106.736 18.6772 106.736 13.3338V13.0626C106.736 7.90932 110.099 5.33252 113.381 5.33252C116.852 5.33252 119.375 7.77372 119.375 12.3033V13.3883H108.662C108.689 17.8092 110.886 19.545 113.354 19.545C115.469 19.545 116.933 18.4058 117.611 16.6699L119.293 16.8055C118.344 19.599 116.12 21.0094 113.354 21.0094Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M126.643 21.0093C123.768 21.0093 121.355 19.5178 120.948 16.8055L122.738 16.5885C123.144 18.5684 124.745 19.5178 126.643 19.5178C129.139 19.5178 130.278 18.1885 130.278 16.697C130.278 14.8798 128.705 14.3374 125.938 13.5778C123.579 12.927 121.544 12.0047 121.544 9.40105C121.544 6.79713 123.85 5.35986 126.453 5.35986C129.085 5.35986 131.146 6.41748 131.661 9.12986L129.925 9.31969C129.546 7.77367 128.162 6.85165 126.453 6.85165C124.745 6.85165 123.28 7.61096 123.28 9.23834C123.28 11.0013 124.772 11.4894 127.321 12.1406C129.817 12.7914 132.041 13.7405 132.041 16.6156C132.041 18.9752 130.006 21.0093 126.643 21.0093Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M134.943 20.7656H136.842V5.71247H134.943V20.7656ZM134.835 2.67466H136.95V0.450684H134.835V2.67466Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M145.711 6.95993C143.867 6.95993 142.131 8.18081 142.131 10.4316V10.5675C142.131 12.8457 143.867 14.0392 145.711 14.0392C147.583 14.0392 149.319 12.8728 149.319 10.5675V10.4316C149.319 8.18081 147.583 6.95993 145.711 6.95993ZM145.657 24.5625C149.291 24.5625 150.783 23.2608 150.783 21.9046C150.783 20.6572 149.969 20.1688 148.396 19.9247C147.149 19.7349 145.006 19.545 143.622 19.3549C142.131 19.9518 141.046 20.7925 141.046 22.1216C141.046 23.7761 142.836 24.5625 145.657 24.5625ZM143.324 14.9883C142.646 15.2869 142.05 15.7205 142.05 16.3988C142.05 17.0496 142.483 17.4564 143.867 17.6462C145.223 17.8632 147.284 18.0259 148.64 18.216C151.027 18.5685 152.546 19.5179 152.546 21.6877C152.546 24.1828 150.078 26 145.603 26C141.751 26 139.202 24.6438 139.202 22.3117C139.202 20.7385 140.558 19.6264 142.077 19.0027C141.127 18.6227 140.341 17.9448 140.341 16.8601C140.341 15.7205 141.317 14.8256 142.321 14.4189C141.127 13.5779 140.314 12.276 140.314 10.5946V10.4316C140.314 7.3941 143.053 5.54978 145.711 5.54978C146.931 5.54978 148.152 5.92944 149.128 6.63451C150.024 5.52266 151.136 5.03453 152.682 5.08849L152.546 6.66163C151.515 6.58028 150.729 6.79722 149.996 7.42122C150.702 8.20765 151.136 9.23843 151.136 10.4316V10.5946C151.136 13.7138 148.396 15.4765 145.711 15.4765C144.897 15.4765 144.084 15.3138 143.324 14.9883Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M156.696 5.71248V8.289C157.998 6.79722 159.897 5.46814 162.121 5.46814C164.887 5.46814 166.704 7.20399 166.704 10.6215V20.7654H164.779V10.7302C164.779 8.15341 163.585 7.04128 161.66 7.04128C159.897 7.04128 158.242 8.04493 156.832 9.67231V20.7654H154.933V5.71248H156.696Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M182.067 21.0094C178.161 21.0094 175.259 19.2193 174.635 15.2869L176.669 15.0696C177.104 18.2159 179.409 19.4362 182.067 19.4362C184.996 19.4362 186.813 17.8091 186.813 15.3408C186.813 12.8728 184.887 11.9779 181.497 10.9197C178.432 9.97056 175.612 8.85843 175.612 5.30538C175.612 2.07802 178.405 0.152344 181.687 0.152344C185.05 0.152344 187.519 1.67125 188.142 4.84437L186.298 5.11583C185.701 2.70174 184.047 1.72548 181.687 1.72548C179.463 1.72548 177.51 2.9732 177.51 5.19718C177.51 7.7737 179.653 8.3703 182.691 9.31972C185.837 10.296 188.766 11.6525 188.766 15.2323C188.766 18.46 186.162 21.0094 182.067 21.0094Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M196.117 20.9012C193.649 20.9012 192.455 19.9789 192.455 17.4835V7.17713H190.041V5.71246H192.482L192.591 1.34558H194.381V5.71246H197.961V7.17713H194.381V17.375C194.381 18.8399 194.923 19.382 196.225 19.382C196.957 19.382 197.473 19.3007 197.988 19.2193L198.096 20.7111C197.554 20.8199 196.795 20.9012 196.117 20.9012Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M205.854 6.85165C203.277 6.85165 200.999 8.72281 200.999 13.0355V13.2795C200.999 17.5376 203.277 19.5178 205.854 19.5178C208.431 19.5178 210.763 17.5376 210.763 13.2795V13.0355C210.763 8.72281 208.431 6.85165 205.854 6.85165ZM199.073 13.3066V13.0355C199.073 7.9635 202.464 5.35986 205.854 5.35986C209.298 5.35986 212.689 7.9635 212.689 13.0355V13.3066C212.689 18.4328 209.298 21.0093 205.854 21.0093C202.464 21.0093 199.073 18.4328 199.073 13.3066Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M217.327 5.71246V9.4011C218.684 6.9599 220.446 5.46811 222.969 5.57659L222.86 7.25848C220.582 7.14972 218.792 8.56016 217.463 11.2454V20.7653H215.564V5.71246H217.327Z" fill="#0A0B09"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M225.762 11.9234H234.55C234.496 8.53304 232.95 6.79719 230.428 6.79719C228.258 6.79719 226.142 8.34349 225.762 11.9234ZM230.401 21.0094C226.983 21.0094 223.783 18.6772 223.783 13.3338V13.0626C223.783 7.90932 227.146 5.33252 230.428 5.33252C233.899 5.33252 236.422 7.77372 236.422 12.3033V13.3883H225.708C225.735 17.8092 227.932 19.545 230.401 19.545C232.516 19.545 233.981 18.4058 234.658 16.6699L236.34 16.8055C235.391 19.599 233.167 21.0094 230.401 21.0094Z" fill="#0A0B09"/>
                            </g>
                            <defs>
                            <clipPath id="clip0-813241">
                            <rect width="237" height="26" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                </a>
                <nav class="list_menu">
                    <ul>
                        <li><a class="btn-store" href="store.php">STORE</a></li>
                        <li><a class="btn-about" href="about.php">ABOUT</a></li>
                        <li><a class="btn-cart" href="cart.php">CART</a></li>
                    </ul>
                </nav>
            </div>

            <div class="list_menu" id="footer_visit">
                <p>Visit </p><a href="https://www.moma.org/">MoMA.org</a>
            </div>

            <div class="list_menu" id="footer_text">
                <a href="https://www.moma.org/about/about-this-site/#privacy-policy">Privacy Policy</a>
                <a href="https://www.moma.org/about/about-this-site/#terms-of-use">Terms & Conditions</a>
                <a href="https://store.moma.org/sitemap">Sitemap</a>
            </div>

            <p id="copy_text">© 2021 MoMA Design Store All Rights Reserved.</p>
        </footer>
    
    </body>
    
    
</html>