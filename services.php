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
    <link rel="stylesheet" type="text/css" href="css/services.css">
    <link rel="stylesheet" type="text/css" href="css/alert.css">
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
                    <a class="nav-link active" href="services.php">Services</a>
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
    
    <!-- --------------Service apply successful----- -->
    <?php
        if($_SESSION['service_apply'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Request recieved.We will contact you soon.</p>
            </div>
    <?php        
        }
        $_SESSION['service_apply'] = false;
    ?>
        
    <!-- ---------------------Introduction ----------- -->
    <div class="bgimg-1">
    </div>
    
    <!-- <div class="intro-heading">
            <h1>INTRODUCTION</h1>
            <p>We offer intangible activities,Guidance programs and assistance for all your career
             needs and career related queries.</p>
        </div> -->
    
    <!-- ------------------ our services--------------->    
    <h3 class="service-heading">Our Services</h3>
    
    <div class="animation-element slide-bottom">
        <div class="service service-right">
            <div class="service-img">
                <img src="/cc/resources/services/domain_sel.png" alt="career selection">
            </div>
            <div class="service-text">
                <div class="service-heading">
                    <h2>1. Career Selection</h2>
                </div>
                <div class="service-content">
                    <p>We help students for selecting domain for their careers i.e. Design, Robotics,
                    Marketing, Sales, Automation, Maintenance etc.</p>
                </div>
                <div class="service-btn">
                    <button type="button" onclick="window.location.href = 'services.php#serviceform'" class="btn btn-outline-primary">Inquire </button>
                </div>    
            </div>
        </div>
    </div>    
    
    <div class="animation-element slide-bottom">
        <div class="service service-left">
            <div class="service-text">
                <div class="service-heading">
                    <h2>2. Courses Offered with Placement Assistance</h2>
                </div>
                <div class="service-content">
                    <ul>
                        <li>Technical Courses in Engineering</li>
                        <li>Digital Marketing Courses</li>
                    </ul>
                </div>
                <div class="service-btn">
                    <button type="button" onclick="window.location.href = 'services.php#serviceform'" class="btn btn-outline-primary">Inquire </button>
                </div>    
            </div>
            <div class="service-img">
                <img src="/cc/resources/services/placement.png" alt="Placement">
            </div>
        </div>
    </div>
    
    <div class="animation-element slide-bottom">
        <div class="service service-right">
            <div class="service-img">
                <img src="/cc/resources/services/govt_exam.jpg" alt="govt exam">
            </div>
            <div class="service-text">
                <div class="service-heading">
                    <h2>3. Government Exam Guidance</h2>
                </div>
                <div class="service-content">
                    <ul>
                        <li>Railway Exams</li>
                        <li>Staff Selection Commission Exams</li>
                        <li>State Government Exams</li>
                        <li>Central Departmental Exams</li>
                    </ul>
                </div>
                <div class="service-btn">
                    <button type="button" onclick="window.location.href = 'services.php#serviceform'" class="btn btn-outline-primary">Inquire </button>
                </div>    
            </div>
        </div>
    </div>
    
    
    <div class="animation-element slide-bottom">
        <div class="service service-left">
            <div class="service-text">
                <div class="service-heading">
                    <h2>4. Competitive Exams Guidance</h2>
                </div>
                <div class="service-content">
                    <ul>
                        <li>IES</li>
                        <li>GATE</li>
                        <li>C-DAC</li>
                        <li>Civil Services</li>
                    </ul>
                </div>
                <div class="service-btn">
                    <button type="button" onclick="window.location.href = 'services.php#serviceform'" class="btn btn-outline-primary">Inquire </button>
                </div>    
            </div>
            <div class="service-img">
                <img src="/cc/resources/services/comp_exam.jpg" alt="Competitive exam">
            </div>
        </div>
    </div>
    
    <div class="animation-element slide-bottom">
        <div class="service service-right">
            <div class="service-img">
                <img src="/cc/resources/services/higher_edu.jpg" alt="higer education">
            </div>
            <div class="service-text">
                <div class="service-heading">
                    <h2>5. Higher Education Guidance</h2>
                </div>
                <div class="service-content">
                    <ul>
                        <li>MBA</li>
                        <li>MS-GRE</li>
                        <li>M-Tech/ ME</li>
                    </ul>
                </div>
                <div class="service-btn">
                    <button type="button" onclick="window.location.href = 'services.php#serviceform'" class="btn btn-outline-primary">Inquire </button>
                </div>    
            </div>
        </div>
    </div>
    
    <div class="animation-element slide-bottom">
        <div class="service service-left">
            <div class="service-text">
                <div class="service-heading">
                    <h2>6. Engineering Start-Up Assistance</h2>
                </div>
                <div class="service-content">
                <p>We believe starting up your own venture after engineering is a very brave and amazing idea.We help students bring 
                their ideas into reality by guiding them through experts.</p>
                </div>
                <div class="service-btn">
                    <button type="button" onclick="window.location.href = 'services.php#serviceform'" class="btn btn-outline-primary">Inquire </button>
                </div>    
            </div>
            <div class="service-img">
                <img src="/cc/resources/services/startup.jpg" alt="Start-Up">
            </div>
        </div>
    </div>
    
    <!-- -------------------service Inquire form-------------- -->
    <div class="service-form" id ="serviceform">
        <h3>Inquiry Form</h3>
        
        <form action="service_db.php" method="post">
            <div class="form-group">
                <div class="form-icon">
                    <i class="fas fa-user-tie fa-2x"></i>
                </div>
                <div class="form-input">
                    <div class="name-row-input">
                        <div class="service-fname">
                            <input type="text" placeholder="* First Name" minlength="2" maxlength="20" pattern="([A-z]){2,20}" name="servicefname" required>
                        </div>
                        <div class="service-lname">
                            <input type="text" placeholder="* Last Name" minlength="2" maxlength="20" pattern="([A-z]){2,20}" name="servicelname" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-icon">
                    <i class="fas fa-phone-alt fa-2x"></i>
                </div>
                <div class="form-input">
                    <input type="text" minlength="10" maxlength="10" placeholder="Enter Contact No." pattern="([0-9]){10}" name="servicectnctno">
                </div>
            </div>

            <div class="form-group">
                <div class="form-icon">
                    <i class="fas fa-envelope fa-2x"></i>
                </div>
                <div class="form-input">
                    <input type="email" minlength="5" maxlength="50" placeholder="Enter E-mail" name="serviceemail">
                </div>
            </div>

            <div class="form-group">
                <div class="form-icon">
                    <i class="fas fa-question fa-2x"></i>
                </div>
                <div class="form-input">
                    <select class="custom-select" name="serviceenquirytype" required>
                        <option value="none" selected disabled>* Select Inquiry Type </option>
                        <option value="General">General/Other </option>
                        <option value="Career Selection">Career Selection </option>
                        <option value="Placement Assistance">Placement Assistance </option>
                        <option value="Government Exam">Government Exam </option>
                        <option value="Competitive Exam">Competitive Exam </option>
                        <option value="Higher Education">Higher Education </option> 
                        <option value="Startup Assistance">Startup Assistance </option> 
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="form-icon">
                    <i class="fas fa-comment fa-2x"></i>
                </div>
                <div class="form-input">
                    <textarea minlength="5" maxlength="1000" rows="5" name="servicequery" placeholder="* Enter query" required></textarea>
                </div>
            </div>
    
            <div class="service-form-btn">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
                
        </form>
        
    </div>
    
    <!-- -------------------------feedback--------------------- -->
    <?php
    readfile('feedback.html');
    ?>
    
    <!-- -------------------------Footer--------------------- -->
    <?php
    readfile('footer.html');
    ?>
    
</body>
</html>