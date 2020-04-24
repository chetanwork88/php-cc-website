<!DOCTYPE html>
<html lang="en">
<head>
    <title>Workshop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/8d1794b5f2.js" crossorigin="anonymous"></script>
        
    <script src="js/slide_element.js"></script>
    <script src="js/template.js"></script>
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <link rel="stylesheet" type="text/css" href="css/workshops.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" type="text/css" href="css/alert.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/slide_element.css">
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
                    <a class="nav-link active" href="workshops.php">Workshops</a>
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
    
    <!-- --------------user not logged in alert ----------------------->
    <?php
        if(!isset($_SESSION['user']))
        {
    ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Logging in to your account will help you to track your applications.</p>
            </div>
    <?php        
        }
    ?>
    
    <!-- -------------------workshop enroll successful message----------- -->
    <?php
        if($_SESSION['workshop_enroll_success'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Enrollment successful. We will contact you soon.</p>
            </div>
    <?php        
        }
        $_SESSION['workshop_enroll_success'] = false;
    ?>
    
    
    <!-- -----------------------workshop heading image --------------------------->
    
    <div class="bgimg-2">
        <div class="caption">
            <span class="border">BE INDUSTRY READY</span>
        </div>
    </div>
    
    <!-- ---------------------Enroll for workshop----------- -->
    <div class="module">
        <h3>Overview</h3>
        <div class="content">
            <p>We arrange meeting at your school/college, in which our representatives and students/Parents 
            engage in intensive discussion and activity on career path finding, future opportunities and career 
            growth.<br>
            These workshops helps students in the following:
            <ul>
                <li>Competition analysis of every technical and non-technical field</li>
                <li>Perfect career path selection</li>
                <li>Guidance for selecting correct technical Course</li>
                <li>Soft skill training, Resume, Group discussion,Interview, etc.</li>
                <li>Career counseling, continuous guidance and motivation by experts</li>
                <li>Acquiring hands on Technical Knowledge.</li>
                <li>Information about Admission process.</li>
            </ul>
        </div>
    </div>
    
    <!-- ---------------------Soft skill workshops------------------ -->
    <div class="animation-element slide-bottom workshop ">
        <div class="left-workshop-list workshop-list">
            <h4>1. Soft skills Workshop</h4>
            <div class="container-fluid main-container">              
                <div class="row">
                    <div class="col-md-7 left-workshop-img">
                        <img src="/cc/resources/workshops/soft_skill.jpg" />
                    </div>
            
                    <div class="col-md-5 right-workshop-info">
                        <p>Career Configure help students for their overall development by conducting
                        various Soft skills training workshops that helps students to build up the confidence regarding
                        how to crack a GD or an interview,accordingly we have drafted the workshop patterns.
                        <br>
                        </p>                                
                    </div>
                </div>
                                       
                <!-- -------------button------ -->
                
                <div class="workshop-btn">
                    <div class="learn-btn">
                        <button type="button" class="btn btn-outline-success" name="ss-learn-btn" data-toggle="modal" data-target="#ss-learn-modal" >Learn More</button>
                    </div>
                    <div class="enroll-btn">
                        <button type="button" class="btn btn-outline-primary" name="ss-enroll-btn" data-toggle="modal" data-target="#ss-enroll-modal">Enroll Now</button>
                    </div>                
                </div>           
            </div>
        </div>
    </div>
    
    <!-- ------------------------------soft skills learn more modal------------- -->

    <div class="modal ss-learn-modal fade right" id="ss-learn-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog  modal-full-height modal-right modal-lg modal-notify modal-info modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
            
                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Soft Skills Workshop</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">X</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <p>Career Configure help students for their overall development by conducting
                    various Soft skills training workshops that helps students to build up the confidence regarding
                    how to crack a GD or an interview, accordingly we have drafted the workshop patterns.
                    <br><br>
                    <b>Soft Skill Training Workshop Outline - </b> 
                    <ul>
                        <li>Interpersonal Skills</li>
                        <li>Team Management</li>
                        <li>Resume Building</li>
                        <li>Group Discussion</li>
                        <li>Body Language</li>
                        <li>Stress Management</li>
                        <li>Grooming Tips</li>
                        <li>Improving Self Confidence</li>
                        <li>Listening Skills</li>
                        <li>SWOT analysis</li>
                        <li>Perception Management</li>
                        <li>Time Management</li>
                        <li>Etiquette  to be followed while facing an interview</li>
                    </ul>
                    We have expert trainer associated with us, who has successfully coached and mentored 100+ coaches and
                    pupil he is an certified trainer and facilitator from ITOL, UK and an professional, lead trainer and facilitator
                    from NSDC India.
                    </p>
                </div>

                <!--Footer-->
                <div class="modal-footer">
                    <a type="button" class="btn btn-success text-light" data-dismiss="modal">Close</a>                  
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- ----------------------ss-enroll-modal ------------------->
    <div class="modal ss-enroll-modal fade right" id="ss-enroll-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-lg modal-notify modal-info modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
            
                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Enroll for Soft Skills Workshop</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body ss-enroll-form">
                
                    <form action="workshop_ss_enroll_db.php" method="post">
                    
                        <div class="form-group">
                            <div class="form-icon">             
                                <i class="fas fa-user-tie fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <div class="name-row-input">
                                    <div class="ss-enroll-fname">
                                        <input type="text" placeholder="* First Name" minlength="2" maxlength ="20" 
                                        pattern ="([A-z]){2,20}" name="ssfname" required>
                                    </div>
                                    <div class="ss-enroll-lname">
                                        <input type="text" placeholder="* Last Name" minlength="2" maxlength ="20"
                                        pattern ="([A-z]){2,20}" name="sslname" required>
                                    </div>
                                </div>
                            </div>    
                        </div>
            
                        <div class="form-group">
                            <div class="form-icon">             
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" minlength="10" maxlength ="10" placeholder="* Contact No." 
                                pattern= "([0-9]){10}"  name="ssctnctno" required>
                            </div>                
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">             
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="email" minlength="5" maxlength ="50" placeholder="* E-mail" 
                                name="ssemail" required>
                            </div>                
                        </div>
                                                
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-university fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" placeholder="* Organization Name" data-toggle="tooltip" 
                                minlength="8" maxlength ="100" name="ssorgname" required>
                            </div>               
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" placeholder="* Organization Address" data-toggle="tooltip" 
                                minlength="8" maxlength ="200" name="ssorgadd" required>
                            </div>               
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">             
                                <i class="fas fa-calendar-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="date" data-placeholder="* Workshop date" name ="ssworkshopdate" required>
                                <p class="text-dark">( * Expected Workshop date)</p>
                            </div>                
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-comment fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <textarea minlength="5" maxlength="1000" rows="5" name="sscomment" placeholder=" Outcome expected from workshop."></textarea>
                            </div>
                        </div>

                        <hr>
           
                        <div class="ss-enroll-form-btn">
                            <div class="ss-enroll-btn">
                                <button type="submit" class="btn btn-primary" name="signup-submit-btn" >Enroll</button>
                            </div>
                            <div class="ss-close-btn">
                                <a type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</a>                  
                            </div>
                        </div>
                    </form>  
                </div>
                
            </div>
        </div>
    </div>
    
       
    <!-- ---------------------Career Guidance workshops------------------ -->

    <div class="animation-element slide-bottom workshop pad-work">
        <div class="career-workshop-list">
            <h4>2.Career Guidance Workshop</h4>
            <div class="container-fluid main-container">
                <div class="career-workshop-info">
                    <div class="career-ten-workshop">
                        <h5>Class - 10</h5>
                        <div class="workshop-content">
                            <p>
                                <b>What we will deliver in these workshop...??</b>
                                <ul>
                                    <li>Information - ITI, Diploma, 11th Admission process (CAP Rounds) & documents required for admission</li>
                                    <li>ITI, Diploma,Class 11th... college list nearby your Locality With Cut off Marks.</li>
                                    <li>Tentative schedule of Govt. Exams after 10th i.e.Railways, Staff Selection Commission etc. and its basic Syllabus.</li>
                                    <li>Other Non Conventional career Options based on different Courses i.e.paramedical, dancing etc.</li>
                                </ul>

                                <b>What are the benefits of our workshop..?</b>
                                <ul>
                                    <li>Clearity while choosing career option.</li>
                                    <li>Clarity about CAP rounds and Documents to be made ready for this procedure</li>
                                    <li>Help in College selection </li>
                                    <li>Help for preaparing Govt exams due to Schedule of Upcoming govt exams, exam pattern, syllabus, imp books etc.</li>

                                </ul>

                            </p>

                            <!-- -------------button------ -->

                            <div class="career-ten-workshop-btn">
                                <div class="career-ten-enroll-btn">
                                    <button type="button" class="btn btn-outline-info" name="cgten-enroll-btn" data-toggle="modal" data-target="#cgten-enroll_modal">Enroll Now</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="career-twelve-workshop">
                        <h5>Class - 12</h5>
                        <div class="workshop-content">
                            <p>
                                <b>What we will deliver in these workshop...??</b>
                                <ul>
                                    <li>Information - B.E. Diploma,B.Tech,BSc-Agree, MBBS, BHMS, D.Pharm and every Field's College Admission process (CAP Rounds) & documents required for admission.</li>
                                    <li>B.E., B.Tech, BSc-Agri, Diploma and every college list nearby your Locality With Cut off Marks.</li>
                                    <li>Tentative schedule of Govt. Exams after 12th i.e.Railways, Staff Selection Commission etc. and its basic Syllabus.</li>
                                    <li>Other non conventional career options based on different Courses i.e.paramedical, dancing etc.</li>
                                </ul>
                                <b>What are the benefits of our workshop..?</b>
                                <ul>
                                    <li>Clearity while choosing right career option and avoiding every career Confusion.</li>
                                    <li>Clarity about CAP rounds and Documents to be made ready for this procedure</li>
                                    <li>Help in College selection </li>
                                    <li>Help for preaparing Govt exams due to Schedule of Upcoming govt exams, exam pattern, syllabus, imp books etc.</li>
                                </ul>

                            </p>

                            <!-- -------------button------ -->

                            <div class="career-twelve-workshop-btn">
                                <div class="career-twelve-enroll-btn">
                                    <button type="button" class="btn btn-outline-info" name="cgtwelve-enroll-btn" data-toggle="modal" data-target="#cgtwelve-enroll_modal">Enroll Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- -----------------------10th class enroll modal-------------------- -->
    <div class="modal cg-enroll_modal fade right" id="cgten-enroll_modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-lg modal-notify modal-info modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Enroll for Career after 10 class Workshop</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body cg-enroll_form">

                    <form action="workshop_cgten_enroll_db.php" method="post">

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-user-tie fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <div class="name-row-input">
                                    <div class="cgten-enroll-fname">
                                        <input type="text" placeholder="* First Name" minlength="2" maxlength="20" pattern="([A-z]){2,20}" name="cgtenfname" required>
                                    </div>
                                    <div class="cgten-enroll-lname">
                                        <input type="text" placeholder="* Last Name" minlength="2" maxlength="20" pattern="([A-z]){2,20}" name="cgtenlname" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" minlength="10" maxlength="10" placeholder="* Contact No." pattern="([0-9]){10}" name="cgtenctnctno" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="email" minlength="5" maxlength="50" placeholder="* E-mail" name="cgtenemail" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-university fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" placeholder="* Organization Name" data-toggle="tooltip" minlength="8" maxlength="100" name="cgtenorgname" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" placeholder="* Organization Address" data-toggle="tooltip" minlength="8" maxlength="200" name="cgtenorgadd" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-calendar-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="date" data-placeholder="* Workshop date" name="cgtenworkshopdate" required>
                                <p class="text-dark">( * Expected Workshop date)</p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-graduation-cap fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <h5>Interested Domain:</h5>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"  name ="interest_domain[]" value ="Arts" id="Arts">
                                    <label class="custom-control-label" for="Arts">Arts</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name ="interest_domain[]"  value="Commerce" id="Commerce">
                                    <label class="custom-control-label" for="Commerce">Commerce</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name ="interest_domain[]" value="DiplomaAndCourses" id="Diploma">
                                    <label class="custom-control-label" for="Diploma">Diploma / Courses</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name ="interest_domain[]" value="Science" id="Science">
                                    <label class="custom-control-label" for="Science">Science</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name ="interest_domain[]" value="Govt-Sector" id="Govt-Sector">
                                    <label class="custom-control-label" for="Govt-Sector">Govt.Sector </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name ="interest_domain[]" value="Other" id="Other">
                                    <label class="custom-control-label" for="Other">Other</label>
                                </div>
                                <input type="text" placeholder="If Other, mention " data-toggle="tooltip" minlength="2" maxlength="100" name="cgtenotherinterest">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-comment fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <textarea minlength="5" maxlength="1000" rows="5" name="cgtencomment" placeholder=" Outcome expected from workshop."></textarea>
                            </div>
                        </div>

                        <hr>

                        <div class="cg-enroll_form-btn">
                            <div class="cgten-enroll-btn">
                                <button type="submit" class="btn btn-info" name="signup-submit-btn">Enroll</button>
                            </div>
                            <div class="cgten-close-btn">
                                <a type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- -----------------------12th class enroll modal-------------------- -->
    <div class="modal cg-enroll_modal fade right" id="cgtwelve-enroll_modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-lg modal-notify modal-info modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Enroll for Career after 12 class Workshop</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body cg-enroll_form">

                    <form action="workshop_cgtwelve_enroll_db.php" method="post">

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-user-tie fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <div class="name-row-input">
                                    <div class="cgtwelve-enroll-fname">
                                        <input type="text" placeholder="* First Name" minlength="2" maxlength="20" pattern="([A-z]){2,20}" name="cgtwelvefname" required>
                                    </div>
                                    <div class="cgtwelve-enroll-lname">
                                        <input type="text" placeholder="* Last Name" minlength="2" maxlength="20" pattern="([A-z]){2,20}" name="cgtwelvelname" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" minlength="10" maxlength="10" placeholder="* Contact No." pattern="([0-9]){10}" name="cgtwelvectnctno" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="email" minlength="5" maxlength="50" placeholder="* E-mail" name="cgtwelveemail" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-university fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" placeholder="* Organization Name" data-toggle="tooltip" minlength="8" maxlength="100" name="cgtwelveorgname" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" placeholder="* Organization Address" data-toggle="tooltip" minlength="8" maxlength="200" name="cgtwelveorgadd" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-calendar-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="date" data-placeholder="* Workshop date" name="cgtwelveworkshopdate" required>
                                <p class="text-dark">( * Expected Workshop date)</p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-graduation-cap fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <h5>Interested Domain:</h5>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"  name ="interest_domain_twe[]" value ="Arts" id="Arts_twe">
                                    <label class="custom-control-label" for="Arts_twe">Arts</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name ="interest_domain_twe[]"  value="Commerce" id="Commerce_twe">
                                    <label class="custom-control-label" for="Commerce_twe">Commerce</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name ="interest_domain_twe[]" value="DiplomaAndCourses" id="Diploma_twe">
                                    <label class="custom-control-label" for="Diploma_twe">Diploma / Courses</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name ="interest_domain_twe[]" value="Science" id="Science_twe">
                                    <label class="custom-control-label" for="Science_twe">Science</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name ="interest_domain_twe[]" value="Govt-Sector" id="Govt-Sector_twe">
                                    <label class="custom-control-label" for="Govt-Sector_twe">Govt.Sector </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name ="interest_domain_twe[]" value="Other" id="Other_twe">
                                    <label class="custom-control-label" for="Other_twe">Other</label>
                                </div>
                                <input type="text" placeholder="If Other, mention " data-toggle="tooltip" minlength="2" maxlength="100" name="cgtwelveotherinterest">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-comment fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <textarea minlength="5" maxlength="1000" rows="5" name="cgtwelvecomment" placeholder=" Outcome expected from workshop."></textarea>
                            </div>
                        </div>

                        <hr>

                        <div class="cg-enroll_form-btn">
                            <div class="cgtwelve-enroll-btn">
                                <button type="submit" class="btn btn-info" name="signup-submit-btn">Enroll</button>
                            </div>
                            <div class="cgtwelve-close-btn">
                                <a type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
        
     <!-- ----------------------job oriented technical workshops ----------------- -->
    <div class="animation-element slide-bottom workshop pad-work">
        <div class="left-workshop-list workshop-list">
            <h4>3. Job Oriented Workshop</h4>
            <div class="container-fluid main-container">              
                <div class="row">
                    <div class="col-md-7 left-workshop-img">
                        <img src="/cc/resources/workshops/job.jpg" />
                    </div>
                    <div class="col-md-5 right-workshop-info">
                        <p>Every Engineering students must be industry with clear basic concepts and hands on Practice of basic 
                        and necessary technical equipments and resources. We arrange technical  workshops for students from Every
                        engineering Branch and provide basic and necessary practical knowledge to students.
                        <br>
                        <br>
                        <a href="job_portal.php">Click Here</a> for job updates/notifications on our site.
                        </p>                                
                    </div>
                </div>
                                       
                <!-- -------------button------ -->
                
                <div class="job-workshop-btn">
                    <button type="button" class="btn btn-outline-warning" name="job-enroll-btn" data-toggle="modal" data-target="#job-enroll-modal">Enroll Now</button>               
                </div>           
            </div>
        </div>
    </div>
         
    
    <!-- -----------------------job enroll modal-------------------- -->
    <div class="modal job-enroll-modal fade right" id="job-enroll-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-lg modal-notify modal-info modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
            
                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Enroll for job oriented Workshop</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body job-enroll-form">
                
                    <form action="workshop_job_enroll_db.php" method="post">
                    
                        <div class="form-group">
                            <div class="form-icon">             
                                <i class="fas fa-user-tie fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <div class="name-row-input">
                                    <div class="job-enroll-fname">
                                        <input type="text" placeholder="* First Name" minlength="2" maxlength ="20" 
                                        pattern ="([A-z]){2,20}" name="jobfname" required>
                                    </div>
                                    <div class="job-enroll-lname">
                                        <input type="text" placeholder="* Last Name" minlength="2" maxlength ="20"
                                        pattern ="([A-z]){2,20}" name="joblname" required>
                                    </div>
                                </div>
                            </div>    
                        </div>
            
                        <div class="form-group">
                            <div class="form-icon">             
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" minlength="10" maxlength ="10" placeholder="* Contact No." 
                                pattern= "([0-9]){10}"  name="jobctnctno" required>
                            </div>                
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">             
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="email" minlength="5" maxlength ="50" placeholder="* E-mail" 
                                name="jobemail" required>
                            </div>                
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-university fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" placeholder="* Organization Name" data-toggle="tooltip" 
                                minlength="8" maxlength ="100" name="joborgname" required>
                            </div>               
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="text" placeholder="* Organization Address" data-toggle="tooltip" 
                                minlength="8" maxlength ="200" name="joborgadd" required>
                            </div>               
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">             
                                <i class="fas fa-code-branch fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <select class="custom-select" name ="jobbranch" required>
                                    <option selected disabled>* Select Branch for Workshop.</option>
                                    <option value="All">All Branches</option>
                                    <option value="Aerospace Engineering"> Aerospace Engineering </option> 
                                    <option value="Agriculture and Food Engineering"> Agriculture & Food Engineering </option> 
                                    <option value="Automobile Engineering"> Automobile Engineering </option> 
                                    <option value="Biotechnology Engineering"> Biotechnology Engineering </option> 
                                    <option value="Ceramic Engineering"> Ceramic Engineering </option> 
                                    <option value="Chemical Engineering"> Chemical Engineering </option> 
                                    <option value="Civil Engineering"> Civil Engineering </option> 
                                    <option value="Computer Engineering"> Computer Engineering </option> 
                                    <option value="Electrical Engineering"> Electrical Engineering </option> 
                                    <option value="Electronics Engineering"> Electronics Engineering </option> 
                                    <option value="Engineering Physics"> Engineering Physics </option>  
                                    <option value="Environmental Engineering"> Environmental Engineering </option> 
                                    <option value="Industry And Production"> Industrial and Production Engineering </option> 
                                    <option value="Industrial Engineering"> Industrial Engineering </option> 
                                    <option value="Information Technology "> Information Technology Engineering </option> 
                                    <option value="Instrumentation Engineering"> Instrumentation Engineering </option> 
                                    <option value="Marine Engineering"> Marine Engineering </option> 
                                    <option value="Mechanical Engineering"> Mechanical Engineering </option> 
                                    <option value="Metallurgical Engineering"> Metallurgical Engineering </option> 
                                    <option value="Naval And Ocean Engineering"> Naval Architecture and Ocean Engineering </option> 
                                    <option value="Petroleum Engineering"> Petroleum Engineering </option> 
                                    <option value="Textile Engineering"> Textile Engineering </option> 
                                </select>
                            </div>    
                        </div>
                        
                        <div class="form-group">
                            <div class="form-icon">             
                                <i class="fas fa-calendar-alt fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <input type="date" data-placeholder="* Workshop date" name ="jobworkshopdate" required>
                                <p class="text-dark">( * Expected Workshop date)</p>
                            </div>                
                        </div>

                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fas fa-comment fa-2x"></i>
                            </div>
                            <div class="form-input">
                                <textarea minlength="5" maxlength="1000" rows="5" name="jobcomment" placeholder=" Outcome expected from workshop."></textarea>
                            </div>
                        </div>
                        
                        <hr>
           
                        <div class="job-enroll-form-btn">
                            <div class="job-enroll-btn">
                                <button type="submit" class="btn btn-warning" name="signup-submit-btn" >Enroll</button>
                            </div>
                            <div class="job-close-btn">
                                <a type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</a>                  
                            </div>
                        </div>
                    </form>  
                </div>
                
            </div>
        </div>
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