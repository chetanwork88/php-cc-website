<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" type="text/css" href="css/alert.css">
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
                    <a class="nav-link active" href="login.php">Log in</a>
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
    
    
    <!-- -------------------password reset successful message----------- -->
    <?php
        if($_SESSION['reset_pwd_success'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Password changed successfully. Please login with new password.</p>
            </div>
    <?php        
        }
        $_SESSION['reset_pwd_success'] = false;
    ?>
    
    <!-- -------------------login form ---------------------->
    
    <div class="login-form" >
        <h3 class="bg-green">Login</h3>
        <form action="login_db.php" method="post">
        
            <div class="form-group">
                <div class="form-icon">
                    <i class="fas fa-user fa-2x"></i>
                </div>
                <div class="form-input">
                    <input type="text" placeholder="* Username" data-toggle="tooltip" minlength="8" maxlength ="50"  
                    title="Username is case insensitive.You can use your username,contact_no or email as username." 
                    name="lgnuname" required>
                </div>               
            </div> 
            <?php 
                if($_SESSION['wrong_username'])
                {
            ?>
                    <p class="text-danger text-center"> Username doesn't exists.</p>
            <?php                                
                
                }
                $_SESSION['wrong_username'] = false;
            ?>

            <div class="form-group">
                <div class="form-icon">             
                    <i class="fas fa-lock fa-2x"></i>
                </div>
                <div class="form-input">
                    <input type="password"  placeholder="* Password" minlength="8" maxlength ="30" name="lgnpwd" required>
                </div>                
            </div>
            <?php 
                if($_SESSION['wrong_password'])
                {
            ?>
                    <p class="text-danger text-center"> Password is invalid.</p>
            <?php                                
                
                }
                $_SESSION['wrong_password'] = false;
            ?>

            <hr>           
            <div class="login-form-btn">
                <button type="submit" class="btn btn-outline-success" name="login-submit-btn" >Login</button>
            </div>
            
        </form>
        
        <div class="api-login">
            <h5> or Log in with</h5>
            
            <div class="api-login-btn">               
                <form action="#">
                    <div class="fb-login-btn">
                        <button type="submit" class="btn btn-fb"><i class="fab fa-facebook-f fa-lg"></i></button>
                    </div>
                </form>
                <form action="#">
                    <div class="ggl-login-btn">
                        <button type="submit" class="btn btn-ggl"><i class="fab fa-google fa-lg" ></i></button>
                    </div>
                </form>
                <form action="#">
                    <div class="ggl-login-btn">
                        <button type="submit" class="btn btn-lin"><i class="fab fa-linkedin-in fa-lg"></i></button>
                    </div>
                </form>
            </div>
            
        </div>
        
        <div class="login-links">
            <div class="new-user">
                <a href="signup.php">Create Account</a>
            </div>
            <div class="forgot-password">
                <a href="forgot_password.php">Forgot Password</a>
            </div>
        </div>
    
    </div>
        
    
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