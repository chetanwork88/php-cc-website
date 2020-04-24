<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
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
    <link rel="stylesheet" type="text/css" href="css/signup.css">
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
                    <a class="nav-link active" href="signup.php">Sign up</a>
                </li> 
                <?php
                }
                ?>     
            </ul>
        
        </div>  
    </nav>
    
    
    <!-- -------------------sign up form ---------------------->
    
    <div class="signup-form">
        <h3 class="bg-info">Signup</h3>
        <form action="signup_db.php" method="post"> 
        
            <div class="form-group">
                <div class="form-icon">
                    <i class="fas fa-user fa-2x"></i>
                </div>
                <div class="form-input">
                    <input type="text" placeholder="* Username" data-toggle="tooltip" minlength="8" maxlength ="30"  
                    title="Username must be unique, case insensitive, contain at least 8 and maximum 30 characters 
                    and may contain alphabets or numerical characters only." 
                     pattern = "([A-z0-9]){8,30}" name="sgnuname" required>
                </div>               
            </div>           
            <?php 
                if($_SESSION['username_exists'])
                {
            ?>
                    <p class="text-danger text-center"> Username already registered.</p>
            <?php                                
                
                }
                $_SESSION['username_exists'] = false;
            ?>
            
            <div class="form-group">
                <div class="form-icon">             
                    <i class="fas fa-lock fa-2x"></i>
                </div>
                <div class="form-input">
                    <input type="password"  placeholder="* Password" data-toggle="tooltip" minlength="8" maxlength ="30"
                    title="Password should consists of atleast 8 and maximum 30 characters with combination of at least one
                     uppercase letter,lowercase letter,number and one special character."
                    pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%]).{8,30}" name="sgnpwd" required>
                </div>                
            </div>
            
            <div class="form-group">
                <div class="form-icon">             
                    <i class="fas fa-lock fa-2x"></i>
                </div>
                <div class="form-input">
                    <input type="password" placeholder="* Confirm Password" minlength="8" maxlength ="30" 
                    pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%]).{8,30}" data-toggle="tooltip" 
                    title="Enter the same password you entered above." name="sgncnfpwd" required>
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
            
            <div class="form-group">
                <div class="form-icon">             
                    <i class="fas fa-user-tie fa-2x"></i>
                </div>
                <div class="form-input">
                    <div class="name-row-input">
                        <div class="sgn-fname">
                            <input type="text" placeholder="* First Name" minlength="2" maxlength ="20" pattern ="([A-z]){2,20}"
                             name="sgnfname" required>
                        </div>
                        <div class="sgn-lname">
                            <input type="text" placeholder="* Last Name" minlength="2" maxlength ="20" pattern ="([A-z]){2,20}" 
                            name="sgnlname" required>
                        </div>
                    </div>
                </div>    
            </div> 
            
            <div class="form-group">
                <div class="form-icon">             
                    <i class="fas fa-phone-alt fa-2x"></i>
                </div>
                <div class="form-input">
                    <input type="text" minlength="10" maxlength ="10" placeholder="Contact No."  pattern= "([0-9]){10}" name="sgnctnctno">
                </div>                
            </div>
            <?php 
                if($_SESSION['contact_no_exists'])
                {
            ?>
                    <p class="text-danger text-center"> Number is already registered.</p>
            <?php                                
                
                }
                $_SESSION['contact_no_exists'] = false;
            ?>
            
            <div class="form-group">
                <div class="form-icon">             
                    <i class="fas fa-envelope fa-2x"></i>
                </div>
                <div class="form-input">
                    <input type="email" minlength="5" maxlength ="50" placeholder="* E-mail"  name="sgnemail" required>
                </div>                
            </div>
            <?php 
                if($_SESSION['email_exists'])
                {
            ?>
                    <p class="text-danger text-center"> Email is already registered.</p>
            <?php                                
                
                }
                $_SESSION['email_exists'] = false;
            ?>
            
            <hr>
           
            <div class="signup-form-btn">
                <button type="submit" class="btn btn-outline-info" name="signup-submit-btn" >Signup</button>
            </div>
            
        </form>
        
        <div class="api-signup">
            <h5> or Sign up with</h5>
            
            <div class="api-signup-btn">               
                <form action="#">
                    <div class="fb-signup-btn">
                        <button type="submit" class="btn btn-fb"><i class="fab fa-facebook-f fa-lg"></i></button>
                    </div>
                </form>
                <form action="#">
                    <div class="ggl-signup-btn">
                        <button type="submit" class="btn btn-ggl"><i class="fab fa-google fa-lg" ></i></button>
                    </div>
                </form>
                <form action="#">
                    <div class="ggl-signup-btn">
                        <button type="submit" class="btn btn-lin"><i class="fab fa-linkedin-in fa-lg"></i></button>
                    </div>
                </form>
            </div>
            
        </div>
        
        <div class="signup-links">
            <div class="already-user">
                <a href="login.php">Already user?</a>
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