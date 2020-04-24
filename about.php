<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us</title>
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
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
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
                    <a class="nav-link active" href="about.php">About Us</a>
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
                    <a class="nav-link" href="gallery.php">Gallery</a>
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
    
    <!-- ------------------vision----------------- -->
    <div class="bgimg-2">
        <div class="caption">
            <span class="border">VISION</span>
            <br><br>
            <span class="border-none">
            Provide career related personal enthusiastic support to students with Special emphasis on educational 
            goals, career counseling and guidance.</span>
        </div>
    </div>
    
    
    <!-- ---------------------at a glance----------- -->
    <div class="module">
        <h3>AT A GLANCE</h3>
        <div class="content">
            <p> <b>Career configure</b> is educational platform which Carries out various technical and non-technical
             training programs for students and we also provide expert guidance to students which will help them to choose 
             right path towards their career.<br>
             We have expertise people from every technical and non-technical field which will help students to explore 
             various career option and making them go through the various career options in their existing field.</p>
        </div>
    </div>
    
    <!-- ----------------------mision------------------- -->
    <div class="bgimg-3">
        <div class="caption">
            <span class="border">MISSION</span>
            <br><br>
            <span class="border-none">
            Assist students to overcome from career Confusion with wisdom and decide proper career path and
            develope outstanding careers.</span>
        </div>
    </div>
    
    <!-- ---------------------team -------------------- ------>
    <!-- <div class="no-margin">
        <div class="team">  
            <h3 class="text-light">Our Team</h3>
            <div class="team-list">
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="fas fa-user fa-5x"></i>
                    </div>                
                    <div class="team-name">
                        <h4> Shyam Paturkar </h4>
                    </div>
                    <div class="icons">
                        <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
                        <a href="#"><i class="fab fa-whatsapp-square fa-2x"></i></a>
                        <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
                    </div>            
                </div> 
                
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="fas fa-user fa-5x"></i>
                    </div>                
                    <div class="team-name">
                        <h4> Akash Khairnar </h4>
                    </div>
                    <div class="icons">
                        <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
                        <a href="#"><i class="fab fa-whatsapp-square fa-2x"></i></a>
                        <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
                    </div>            
                </div>
                
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="fas fa-user fa-5x"></i>
                    </div>                
                    <div class="team-name">
                        <h4> Rushikesh Borse </h4>
                    </div>
                    <div class="icons">
                        <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
                        <a href="#"><i class="fab fa-whatsapp-square fa-2x"></i></a>
                        <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
                    </div>            
                </div>
                
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="fas fa-user fa-5x"></i>
                    </div>                
                    <div class="team-name">
                        <h4> Saurabh Wani </h4>
                    </div>
                    <div class="icons">
                        <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
                        <a href="#"><i class="fab fa-whatsapp-square fa-2x"></i></a>
                        <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
                    </div>            
                </div>
            </div>    
        </div>
    </div> -->
    
    <!-- -------------------------Footer--------------------- -->
    <?php
    readfile('feedback.html');
    ?>
    
    <!-- -------------------------Footer--------------------- -->
    <?php
    readfile('footer.html');
    ?>
    
</body>
</html>