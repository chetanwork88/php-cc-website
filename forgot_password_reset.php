<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
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
    <link rel="stylesheet" type="text/css" href="css/forgot_password_reset.css">
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
                    <a class="nav-link" href="index.php">Home</a>
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
    
    <!-- ------------------reset password form ------------- -->
    <?php
        $username = $_GET['name'];
    ?>
       
    <div class="rst-pwd">
        <h3 class="bg-warning">Reset Password</h3>
        
        <form action="forgot_password_reset_db.php" method="post">
        
            <input type="hidden" name="rstuname" value = <?php echo $username; ?>>
            <div class="form-group">
                <div class="form-icon">             
                    <i class="fas fa-lock fa-2x text-warning"></i>
                </div>
                <div class="form-input">
                    <input class ="form-control" type="password"  placeholder="* New Password" data-toggle="tooltip" minlength="8" maxlength ="30"
                    title="Password should consists of atleast 8 and maximum 30 characters with combination of at least one
                     uppercase letter,lowercase letter,number and one special character."
                    pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%]).{8,30}" name="rstpwd" required>
                </div>                
            </div>
            
            <div class="form-group">
                <div class="form-icon">             
                    <i class="fas fa-lock fa-2x text-warning"></i>
                </div>
                <div class="form-input">
                    <input class ="form-control" type="password" placeholder="* Confirm New Password" minlength="8" maxlength ="30" 
                    pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%]).{8,30}" data-toggle="tooltip" 
                    title="Enter the same password you entered above." name="rstcnfpwd" required>
                </div>                
            </div>
            
            <?php 
                if($_SESSION['password_mismatch'])
                {
            ?>
                    <p class="text-danger text-center"> Password didn't match.</p>
            <?php                                
                
                }
                $_SESSION['password_mismatch'] = false;
            ?>
            
            <div class="rst-pwd-btn">
                <button type="submit" class="btn btn-warning">Reset Passowrd</button>
            </div>
        
        </form>
    
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