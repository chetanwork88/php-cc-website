<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job</title>
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
    <link rel="stylesheet" type="text/css" href="css/job_portal.css">    
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
                    <a class="nav-link " href="services.php">Services</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" href="job_portal.php">Jobs</a>
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
    <!-- <?php
        if(!isset($_SESSION['user']))
        {
    ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Logging in to your account will help you to track your applications.</p>
            </div>
    <?php        
        }
    ?> -->
    
    <!-- ---------------error occured while uploading resume---------------->
    <!-- <?php 
        if($_SESSION['pdf_file'])
        {
    ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Only PDF format is allowed.</p>
            </div>

    <?php                                
        
        }
        $_SESSION['pdf_file'] = false;
    ?>
    
    <?php 
        if($_SESSION['large_file'])
        {
    ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> File size is >2 MB.</p>
            </div>
    <?php                                
        
        }
        $_SESSION['large_file'] = false;
    ?>
    
    <?php 
        if($_SESSION['no_upload'])
        {
    ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Please upload resume.</p>
            </div>
    <?php                                
        
        }
        $_SESSION['no_upload'] = false;
    ?>
    
    <?php 
        if($_SESSION['upload_error'])
        {
    ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Error while uploading file.</p>
            </div>
    <?php                                
        
        }
        $_SESSION['upload_error'] = false;
    ?> -->
    
    
    <!-- -----------------------workshop heading image --------------------------->
    
    <div class="bgimg-2">   
    </div>
    
    
    <!-- ---------------------Introduction ----------- -->
    <div class="no-margin-dark">  
        <div class="module">
            <h3>Introduction</h3>
            <div class="content">
                <p> Find latest notifications and updates of job openings.<br>
                We provide information about latest job openings in private as well as government sector study for every stream of study.</p>
            </div>
        </div>
    </div>
    
    <!-- ---------------fetching job  updates-------------->
    <?php
    require "db_connect.php";
    if($db_connected == true)
    {
        $sql = "SELECT 1 FROM job_update";
                $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
        ?>
        <div class="no-margin">  
            <div class="job-updates">
                <h3>Job Updates</h3>
                <div class="table-responsive-xl table-div">
                
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Title </th>
                                <th>Type</th>
                                <th>Employer Name</th>
                                <th>Location</th>
                                <th>Qualification</th>
                                <th>Last Date</th>
                                <th>Link</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        
                            <!-- fetching details -->
                    <?php                            
                        $sql = "SELECT  job_title,job_type,employer_name,job_location,min_edu_reqd,
                                        job_expiry_date,job_url
                                        FROM job_update WHERE job_expiry_date > CURDATE() 
                                        order by job_expiry_date";
                            
                            $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) 
                            {
                                if(empty($row["speciality"]))
                                {
                                    $row["speciality"] = '-';
                                }
                                                                
                                echo '<tr class ="dark-row"> 
                                <td>'.$row["job_title"].'</td> 
                                <td>'.$row["job_type"].'</td> 
                                <td>'.$row["employer_name"].'</td>
                                <td>'.$row["job_location"].'</td> 
                                <td>'.$row["min_edu_reqd"].'</td>
                                <td>'.$row["job_expiry_date"].'</td>
                                <td class="btn-center"><a target="_blank" href="'.$row["job_url"].'">
                                <button type="button" class="btn btn-secondary"> 
                                Details</button></a></td> 
                                </tr>'; 
                                                                    
                            }   
                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            
    <?php         
        }
    }
    ?> 
    
    
    
    <!-- -------------------job apply form ---------------------->
    <!-- <div class="job-apply">
        <form class="job-apply-form" action="job_portal_db.php" method="post" enctype="multipart/form-data">
            <div class="heading">
                <h3>Job Application Form</h3>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label><span class="star">*</span> First Name</label>
                        <input type="text" class="form-control" minlength="2" maxlength ="20" placeholder = "Enter First Name"
                        pattern ="([A-z]){2,20}" name="jobapplyfname" required>
                    </div>
                    <div class="col-md-4">
                        <label> Middle Name</label>
                        <input type="text" class="form-control" minlength="2" maxlength ="20" placeholder = "Enter Middle Name"
                        pattern ="([A-z]){2,20}" name="jobapplymname" >
                    </div>
                    <div class="col-md-4">
                        <label><span class="star">*</span> Last Name</label>
                        <input type="text" class="form-control" minlength="2" maxlength ="20" placeholder = "Enter Last Name"
                        pattern ="([A-z]){2,20}" name="jobapplylname" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label><span class="star">*</span>  Gender </label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio" name="jobapplygender" value="M" required>
                            <label class="custom-control-label" for="customRadio">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio2" name="jobapplygender" value="F" required>
                            <label class="custom-control-label" for="customRadio2">Female</label>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <label><span class="star">*</span> Date Of Birth </label>
                        <input type="date" class="form-control" name="jobapplydob"  placeholder = "Enter date of birth" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-5">
                        <label for="cntctno"> <span class="star">*</span> Contact No </label>
                        <input type="text" class="form-control" minlength ="10" maxlength ="10" pattern= "([0-9]){10}" name="jobapplycntctno" placeholder="Enter Contact Number" required>
                    </div>
                    <div class="col-md-7">
                        <label for="email"> <span class="star">*</span> Email </label>
                        <input type="email" class="form-control" minlength ="10" maxlength ="50" 
                        name="jobapplyemail" placeholder="Enter your Email"  required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">                   
                    <div class="col-md-4">
                        <label for="email"> <span class="star">*</span> Qualification </label>
                        <select class="custom-select" name ="jobapplyqualification" required>
                            <option value="none" selected disabled>Please select option </option>
                            <option value="ME">M.E / M.Tech </option>
                            <option value="MSc">M.Sc </option>
                            <option value="MCom">M.Com </option>
                            <option value="MA">M.A </option>
                            <option value="BE">B.E / B.Tech </option>
                            <option value="BSc">B.Sc </option>
                            <option value="BCom">B.Com </option>
                            <option value="BA">B.A </option>
                            <option value="Diploma">Diploma </option>
                            <option value="ITI">ITI </option>
                            <option value="12">12 </option>
                            <option value="10">10 </option>
                            <option value="Below 10"> Below 10 </option> 
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label><span class="star">*</span> Stream / Specialization</label>
                        <input type="text" class="form-control" minlength="2" maxlength ="20" placeholder = "Ex- Computer Engineering"
                        pattern ="([A-z]){2,20}" name="jobapplystream" required>
                    </div>
                    <div class="col-md-4">
                        <label><span class="star">*</span> Percentage / CGPA </label>
                        <input type="text" class="form-control" pattern ="([0-9.]){1,5}" step ="0.01"  minlength ="0" maxlength ="5" placeholder = "Enter Percentage or CGPA"
                        name="jobapplypercentage" required>
                    </div>
                </div>
            </div>
                        
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Preferred Working Domain </label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"  name ="jobapplyworkdomain[]" value ="Automobile" id="Automobile">
                            <label class="custom-control-label" for="Automobile">Automobile</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name ="jobapplyworkdomain[]"  value="Chemical" id="Chemical">
                            <label class="custom-control-label" for="Chemical">Chemical</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name ="jobapplyworkdomain[]" value="Civil" id="Civil">
                            <label class="custom-control-label" for="Civil">Civil</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name ="jobapplyworkdomain[]" value="Electrical" id="Electrical">
                            <label class="custom-control-label" for="Electrical">Electrical</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name ="jobapplyworkdomain[]" value="Electronics" id="Electronics">
                            <label class="custom-control-label" for="Electronics">Electronics </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name ="jobapplyworkdomain[]" value="IT" id="IT">
                            <label class="custom-control-label" for="IT">Information Technology</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name ="jobapplyworkdomain[]" value="Mechanical" id="Mechanical">
                            <label class="custom-control-label" for="Mechanical">Mechanical</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name ="jobapplyworkdomain[]" value="SalesAndMarketing" id="SalesAndMarketing">
                            <label class="custom-control-label" for="SalesAndMarketing">Sales and Marketing</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name ="jobapplyworkdomain[]" value="Other" id="Other">
                            <label class="custom-control-label" for="Other">Other</label>
                        </div>
                        <input type="text" placeholder="If Other, mention "  minlength="2" maxlength="100" name="jobapplyotherworkdomain">
                    </div>
                    <div class="col-md-4">
                        <label for="message">1. Preferred Organization name </label>
                        <input type="text" class="form-control"  placeholder ="Enter name"  maxlength ="100" name="jobapplycomp1" >
                    </div>
                    <div class="col-md-4">
                        <label for="message">2. Preferred Organization name </label>
                        <input type="text" class="form-control"  placeholder ="Enter name" maxlength ="100" name="jobapplycomp2" >
                    </div>               
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="resume"><span class="star">*</span> Upload Resume </label>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="file" required>
                            <label class="custom-file-label" for="file"> Choose file </label>
                        </div>
                        <dl>
                            <dt class="text-danger">The File must be -</dt>
                            <dd class="text-warning">- Size less than 2 MB.</dd>
                            <dd class="text-warning">- In PDF format only.</dd>
                        </dl>
                    </div>
            
                    <div class="col-md-6">
                        <label for="Profile">Linkedin Profile </label>
                        <input type="url" class="form-control" name="jobapplylinkedin_url" placeholder ="Enter your LinkedIn Profile URL.">
                    </div>
                </div>
            </div> -->
            
            <!-- -------------button------ -->
                
            <!-- <div class="job-apply-btn">
                <button type="submit" class="btn btn-primary" name="job-apply-btn">Apply</button>               
            </div>
            
        </form>    
    </div>   -->
    
    <!-- <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        
    </script> -->
    
    
     <!-- ----------------------- -->
    

    <!-- -------------------------Feedback--------------------- -->
    <?php
    readfile('feedback.html');
    ?>
    
    <!-- -------------------------Footer--------------------- -->
    <?php
    readfile('footer.html');
    ?>
    
</body>
</html>