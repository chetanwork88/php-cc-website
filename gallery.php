<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/8d1794b5f2.js" crossorigin="anonymous"></script>
        
    <script src="js/slide_element.js"></script>
    <script src="js/template.js"></script>
    
    <script src="https://code.jquery.com/jquery-1.12.0.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/element_slide.css">
</head>
<body>
    
    <!-- ----------------navbar------------- -->

    <nav class="navbar navbar-expand-lg navbar-bg navbar-dark sticky-top">
        <a class="navbar-brand" href="index.php">
            <img src="/cc/resources/logo_name.png" alt="cc-logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item nav-item-first">
                    <a class="nav-link " href="index.php">Home</a>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link " href="workshops.php">Workshops</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link " href="services.php">Services</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="job_portal.php">Jobs</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="blogs.php">Blogs</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" href="gallery.php">Gallery</a>
                </li>
                           
                <?php
                error_reporting(0); 
                session_start();
                if(isset($_SESSION['user']))
                { 
                ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fas fa-user-circle"></i>
                    <?php
                    echo " ".$_SESSION['profile_name'];
                    ?>
                </a>
                <div class="dropdown-menu navbar-light">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <?php
                        if($_SESSION['admin'])
                        {
                    ?>
                        <a class="dropdown-item" href="report_workshops.php">Workshops</a>
                        <a class="dropdown-item " href="report_service_feedback.php">Services And Feedback</a>  
                    <?php     
                        }
                    ?>
                    <a class="dropdown-item logout-hover" href="logout.php">Logout</a>
                </div>
                </li>
                <?php
                }
                else
                {
                ?>
                 <li class="nav-item">
                    <a class="nav-link" href="login.php">Log in</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign up</a>
                </li> 
                <?php
                }
                ?>     
            </ul>
        
        </div>  
    </nav>
    
    
    <!-- ------------------- slideshow heading------------ -->
    
    <div class="workshop-carousel">
    
        <h3 class="heading">Workshop Gallery</h3>
            
        <div id="demo" class="carousel slide" data-ride="carousel" data-interval="4000">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
                <li data-target="#demo" data-slide-to="4"></li>
                <li data-target="#demo" data-slide-to="5"></li>
                <li data-target="#demo" data-slide-to="6"></li>
                <li data-target="#demo" data-slide-to="7"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/cc/resources/gallery/img-1.jpg" alt="" >
                    <div class="carousel-caption">
                        <h3 class="text-light">Technical workshop</h3>
                        <!-- <p>workshop conducted at engineering collage for job and career options.</p> -->
                    </div>   
                </div>
                <div class="carousel-item ">
                    <img src="/cc/resources/gallery/img-2.jpg" alt="" >
                    <div class="carousel-caption">
                        <h3 class="text-light">Technical workshop</h3>
                        <!-- <p>workshop conducted at engineering collage for job and career options.</p> -->
                    </div>   
                </div>
                <div class="carousel-item ">
                    <img src="/cc/resources/gallery/img-3.jpg" alt="" >
                    <div class="carousel-caption">
                        <h3 class="text-light">Technical workshop</h3>
                        <!-- <p>workshop conducted at engineering collage for job and career options.</p> -->
                    </div>   
                </div>
                <div class="carousel-item ">
                    <img src="/cc/resources/gallery/img-4.jpg" alt="">
                    <div class="carousel-caption">
                        <h3 class="text-light">Technical workshop</h3>
                        <!-- <p>workshop conducted at engineering collage for job and career options.</p> -->
                    </div>   
                </div>
                <div class="carousel-item ">
                    <img src="/cc/resources/gallery/img-5.jpg" alt="">
                    <div class="carousel-caption">
                        <h3 class="text-light">Career guidance workshop</h3>
                        <!-- <p>workshop conducted at school regarding various future career options.</p> -->
                    </div>   
                </div>
                <div class="carousel-item ">
                    <img src="/cc/resources/gallery/img-6.jpg" alt="">
                    <div class="carousel-caption">
                        <h3 class="text-light">Career guidance workshop</h3>
                        <!-- <p>workshop conducted at school regarding various future career options.</p> -->
                    </div>   
                </div>
                <div class="carousel-item ">
                    <img src="/cc/resources/gallery/img-7.jpg" alt="">
                    <div class="carousel-caption">
                        <h3 class="text-light">Career guidance workshop</h3>
                        <!-- <p>workshop conducted at school regarding various future career options.</p> -->
                    </div>   
                </div>
                
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>    
    
<!--    
    <div id="container ">

         Each image is 350px by 233px
        <div class="photobanner">
            <img class="first" src="" alt="" />
            <img src="/cc/resources/gallery/img-2.jpg" alt="" />
            <img src="/cc/resources/gallery/img-3.jpg" alt="" />
            <img src="/cc/resources/gallery/img-4.jpg" alt="" />
            <img src="/cc/resources/gallery/img-5.jpg" alt="" />
            <img src="/cc/resources/gallery/img-6.jpg" alt="" />
        </div>
    </div> -->




    
    
    <!-- -------------------------Footer--------------------- -->
    <!-- <?php
    readfile('feedback.html');
    ?> -->
    
    <!-- -------------------------Footer--------------------- -->
    <?php
    readfile('footer.html');
    ?>
    
</body>
</html>