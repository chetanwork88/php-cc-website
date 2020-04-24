<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
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
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/alert.css">
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
                <a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fas fa-user-circle"></i>
                    <?php
                    echo " ".$_SESSION['profile_name'];
                    ?>
                </a>
                <div class="dropdown-menu navbar-light">
                    <a class="dropdown-item active" href="profile.php">Profile</a>
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
    
    <!-- --------------password_change success alert ------------------------>
    <?php
        if($_SESSION['chg_pwd_success'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Password updated successfully .</p>
            </div>
    <?php        
        }
        $_SESSION['chg_pwd_success'] = false;
    ?>
    
    <!-- --------------profile data change success alert ------------------------>
    <?php
        if($_SESSION['chg_data_success'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Profile updated successfully .</p>
            </div>
    <?php        
        }
        $_SESSION['chg_data_success'] = false;
    ?>
    
    <!-- --------------blog create success alert ------------------------>
    <?php
        if($_SESSION['blog_create_success'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Blog created.</p>
            </div>
    <?php        
        }
        $_SESSION['blog_create_success'] = false;
    ?>
    
    <!-- --------------job create success alert ------------------------>
    <?php
        if($_SESSION['job_create_success'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Job update created.</p>
            </div>
    <?php        
        }
        $_SESSION['job_create_success'] = false;
    ?>
    
    
    <!-- ---------------------profile - page ------------------ -->
         
    <div class="profile"> 
        <h3 class="profile-heading">Edit Profile</h3>           
        <!-- <div class="user-avatar">
            <i class="fas fa-user-circle"></i>                    
        </div> -->
        
        <div class="user-profile">
                        
            <div class="user-login">
                            
                <div class="username">
                    <div class="username-key">
                        <p>Username : </p>
                    </div>    
                    <div class="username-value">
                        <p><?php echo $_SESSION['user']?></p>
                    </div>
                </div>
                
                <div class="profile-form pass-change">
                    <form action="profile_chg_pwd_db.php" method= "post">
                        <div class="form-group">
                            <div class="form-input">
                                <input type="password"  placeholder="* Old Password" data-toggle="tooltip" minlength="8" maxlength ="30"
                                title="Enter your old password."
                                pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%]).{8,30}" name="oldpwd" required>
                            </div>                
                        </div>
                        <?php 
                            if($_SESSION['old_password_incorrect'])
                            {
                        ?>
                                <p class="text-danger text-center"> Old password is incorrect.</p>
                        <?php                                
                            
                            }
                            $_SESSION['old_password_incorrect'] = false;
                        ?>
                        
                        <div class="form-group">
                            <div class="form-input">
                                <input type="password"  placeholder="* New Password" data-toggle="tooltip" minlength="8" maxlength ="30"
                                title="Password should consists of atleast 8 and maximum 30 characters with combination of at least one
                                uppercase letter,lowercase letter,number and one special character."
                                pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%]).{8,30}" name="newpwd" required>
                            </div>                
                        </div>
            
                        <div class="form-group">
                            <div class="form-input">
                                <input type="password" placeholder="* Confirm New Password" minlength="8" maxlength ="30" 
                                pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%]).{8,30}" data-toggle="tooltip" 
                                title="Enter the same password you entered above." name="newcnfpwd" required>
                            </div>                
                        </div>           
                                                                                        
                        <?php 
                            if($_SESSION['password_mismatch'])
                            {
                        ?>
                                <p class="text-danger text-center"> New Password didn't match.</p>
                        <?php                                
                            
                            }
                            $_SESSION['password_mismatch'] = false;
                        ?>
                        
                        <hr>
                        <div class="profile-btn">
                            <button type="submit" class="btn btn-danger" name="chg-pwd-btn">
                            Change Password</button>
                        </div>                           
                    </form>   
                </div>
            </div>    
            
            <div class="user-data">
            
                <form action="profile_update_user_data_db.php"  class ="profile-form" method= "post">
                    <div class="user-data-row">               
                        <div class="user-data-key">
                            <p>First Name</p>
                        </div>
                        <div class="colon-seperator">
                        :
                        </div>
                        <div class="form-input user-data-value">           
                            <div class="chgdata-fname">
                                <input type="text" placeholder="<?php echo $_SESSION['first_name'] ?>" 
                                minlength="2" maxlength ="20" pattern ="([A-z]){2,20}" name="chgdatafname">
                            </div>                    
                        </div>                                           
                    </div>
                    
                    <div class="user-data-row">               
                        <div class="user-data-key">
                            <p>Last Name</p>
                        </div>
                        <div class="colon-seperator">
                        :
                        </div>
                        <div class="form-input user-data-value">           
                            <div class="chgdata-lname">
                                <input type="text" placeholder="<?php echo $_SESSION['last_name'] ?>" 
                                minlength="2" maxlength ="20" pattern ="([A-z]){2,20}" name="chgdatalname">
                            </div>                    
                        </div>                                             
                    </div>
                    
                    <div class="user-data-row">               
                        <div class="user-data-key">
                            <p>Contact No</p>
                        </div>
                        <div class="colon-seperator">
                        :
                        </div>
                        <div class="form-input user-data-value">
                            <input type="text" minlength="10" maxlength ="10" placeholder="<?php echo $_SESSION['contact_no'] ?>" 
                            pattern= "([0-9]){10}" name="chgdatactnctno">
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
                    
                    <div class="user-data-row">               
                        <div class="user-data-key">
                            <p>Email</p>
                        </div>
                        <div class="colon-seperator">
                        :
                        </div>
                        <div class="form-input user-data-value">
                            <input type="email" minlength="5" maxlength ="50" placeholder="<?php echo $_SESSION['email'] ?>"  
                            name="chgdataemail">
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
                    
                    <?php 
                        if($_SESSION['no_input'])
                        {
                    ?>
                        <p class="text-danger text-center"> No input provided.</p>
                    <?php                                
                        
                        }
                        $_SESSION['no_input'] = false;
                    ?>
                
                    <hr>
                    
                    <div class="profile-form-btn">
                        <button type="submit" class="btn btn-info" name="upd-data-submit-btn">Update Profile</button>
                    </div> 
                </form>           
            </div>                
    
        </div>
    </div>  
   
   <!-- --------------------------if admin create job alert and write blog -------------------- -->
    <?php
    if($_SESSION['admin'])
    {       
    ?>
    
        <!-- -----------------------create job alert------------- -->
        
        <div class="blog-form">
            <h3>Job Update</h3>
            <form action="profile_create_job_update_db.php" method="post">
                <div class="form-group">
                    <div class="form-icon">
                        <i class="fas fa-address-card fa-2x"></i>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" minlength="2" maxlength ="100" 
                        placeholder="* Job Title."   name="crejobtitle" required>
                    </div>                
                </div>
                
                <div class="form-group">
                    <div class="form-icon">
                        <i class="fas fa-portrait fa-2x"></i>
                    </div>
                    <select class="custom-select" class="form-control" name ="crejobtype" required>
                        <option selected disabled>* Select job type.</option>
                        <option value="Govt"> Government </option> 
                        <option value="Private"> Private </option>  
                    </select>   
                </div>
                
                <div class="form-group">
                    <div class="form-icon">
                        <i class="fas fa-building fa-2x"></i>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" minlength="2" maxlength ="100" 
                        placeholder="* Employer Name." name="crejobempname" required>
                    </div>                
                </div>
                
                <div class="form-group">
                    <div class="form-icon">
                        <i class="fas fa-location-arrow fa-2x"></i>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" minlength="2" maxlength ="50" 
                        placeholder="* Job Location (City/Area)."  name="crejobemploc">
                    </div>                
                </div>
                
                <div class="form-group">
                    <div class="form-icon">
                        <i class="fas fa-graduation-cap fa-2x"></i>
                    </div>
                    <div class="form-input">
                        <input type="text" class="form-control" minlength="5" maxlength ="100" 
                        placeholder="* minimum qualification."  name="crejobminedu" required>
                    </div>                
                </div>
                      
                <div class="form-group">
                    <div class="form-icon">             
                        <i class="fas fa-link fa-2x"></i>
                    </div>
                    <div class="form-input">
                    <input type="url" class="form-control" minlength="5" maxlength ="2086" 
                        placeholder = "* Enter site url" name="crejoburl" required>
                    </div>                
                </div>
                
                <div class="form-group">
                    <div class="form-icon">             
                        <i class="fas fa-calendar-alt fa-2x"></i>
                    </div>
                    <div class="form-input">
                        <input type="date" class="form-control" data-placeholder="* Last apply date" 
                        name ="crejoblastdate" required>
                        <p class="text-dark">( * Last apply date)</p>
                    </div>                
                </div>
                
                <hr>
           
                <div class="blog-form-btn">
                    <button type="submit" class="btn btn-outline-info" name="cre-job-submit-btn" >Create</button>
                </div>
            
            </form>
        </div>
        
        <!-- -------------------------create blog -------------------- -->
                    
        <div class="blog-form">
            <h3>Write Blog</h3>
            <form action="profile_create_blog_db.php" method="post">
                <div class="form-group"> 
                    <div class="form-icon">
                        <i class="fas fa-blog fa-2x"></i>
                    </div>
                    <div class="form-input">
                        <textarea class= "form-control" minlength="5" maxlength ="100" rows="2" name="blogtitle" placeholder="* Enter Blog Title" required></textarea>
                    </div>               
                </div>
                
                <div class="form-group">
                    <div class="form-icon">
                        <i class="fas fa-file-alt fa-2x"></i>
                    </div>
                    <div class="form-input">
                        <textarea class= "form-control" minlength="5" maxlength="10000" rows="10" name="blogbody" placeholder=" About blog." required></textarea>
                    </div>
                </div>
                
                <hr>
           
                <div class="blog-form-btn">
                    <button type="submit" class="btn btn-outline-info" name="blog-submit-btn" >Submit</button>
                </div>
            
            </form>
        </div>
        
     
                
    <?php                    
    }
    else
    {
        require "db_connect.php";
        if($db_connected == true)
        {   
            //if not admin show enrolled profile-tables
            $username = $_SESSION['user'];
            $sql = "SELECT workshop_id,workshop_type,DATE(sys_creation_date) as applied_date,
                    workshop_request_date,workshop_expectation,workshop_taken_date,status
                    FROM workshop where created_by = '$username' order by workshop_id desc";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {   
        ?>
                       
                <!-- ------------ workshop-profile--------------------->
                
                <div class="profile-tables workshop-profile">
                    <h3>WORKSHOP DETAILS</h3>
                    <div class="table-responsive-xl table-div">
                        
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Type</th>
                                    <th>Applied Date</th>
                                    <th>Requested Date</th>
                                    <th>Expectation</th>
                                    <th>Workshop Taken Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                                while($row = $result->fetch_assoc()) 
                                {
                                    
                                    if(empty($row["workshop_taken_date"]))
                                    {
                                        $row["workshop_taken_date"] = '-';
                                    }
                                    
                                    if($row["status"] =='N')
                                    {
                                        $row["status"] = 'Incomplete';
                                    }
                                    else if($row["status"] =='Y')
                                    {
                                        $row["status"] = 'Complete';
                                    }
                                    
                                    echo '<tr class ="dark-row"> 
                                    <td>'.$row["workshop_id"].'</td> 
                                    <td>'.$row["workshop_type"].'</td> 
                                    <td>'.$row["applied_date"].'</td> 
                                    <td>'.$row["workshop_request_date"].'</td> 
                                    <td> <a href="#" data-toggle="tooltip"  
                                        title="'.$row["workshop_expectation"].'">'
                                        .$row["workshop_expectation"].'</a></td>
                                    <td>'.$row["workshop_taken_date"].'</td> 
                                    <td>'.$row["status"].'</td> 
                                    </tr>'; 
                                            
                                } 
                            ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            }
            
            $sql = "SELECT service_id,service_type,DATE(sys_creation_date) as applied_date,
                    query,DATE(completion_date) as completion_date,status
                    FROM service where created_by = '$username' order by service_id desc";
                    
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
            ?>
            
                <!-- ------------ service-profile--------------------->
                <div class="profile-tables service-profile">
                    <h3>Service Details</h3>
                    <div class="table-responsive-xl table-div">  
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Type</th>
                                    <th>Request Date</th>
                                    <th>Query</th>
                                    <th>Completion Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                            while($row = $result->fetch_assoc()) 
                            {
                                if(empty($row["completed_date"]))
                                {
                                    $row["completed_date"] = '-';
                                }
                                
                                if($row["status"] =='N')
                                {
                                    $row["status"] = 'Incomplete';
                                }
                                else
                                {
                                    $row["status"] = 'Complete';
                                }
                                echo '<tr> 
                                    <td>'.$row["service_id"].'</td> 
                                    <td>'.$row["service_type"].'</td> 
                                    <td>'.$row["applied_date"].'</td> 
                                    <td> <a href="#" data-toggle="tooltip"  
                                        title="'.$row["query"].'">'
                                        .$row["query"].'</a></td>
                                    <td>'.$row["completed_date"].'</td> 
                                    <td>'.$row["status"].'</td> 
                                </tr>';     
                                        
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            }
            
            $sql = "SELECT feedback_id,feedback_type,DATE(sys_creation_date) as applied_date,
                    feedback,DATE(completion_date) as completed_date,status
                    FROM feedback where created_by = '$username' order by feedback_id desc";
                    
            $result = $conn->query($sql);           
            if ($result->num_rows > 0) 
            {           
            ?>        
                <!-- ------------ feedback-profile--------------------->
                <div class="profile-tables">
                    <h3>Feedback Details</h3>
                    <div class="table-responsive-xl table-div">
                        
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Type</th>
                                    <th>Creation Date</th>
                                    <th>Feedback</th>
                                    <th>Completion Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                        
                            while($row = $result->fetch_assoc()) 
                            {
                                if(empty($row["completed_date"]))
                                {
                                    $row["completed_date"] = '-';
                                }
                                
                                if($row["status"] =='N')
                                {
                                    $row["status"] = 'Incomplete';
                                }
                                else
                                {
                                    $row["status"] = 'Complete';
                                }
                                echo '<tr> 
                                    <td>'.$row["feedback_id"].'</td> 
                                    <td>'.$row["feedback_type"].'</td> 
                                    <td>'.$row["applied_date"].'</td> 
                                    <td> <a href="#" data-toggle="tooltip"  
                                        title="'.$row["feedback"].'">'
                                        .$row["feedback"].'</a></td>
                                    <td>'.$row["completed_date"].'</td> 
                                    <td>'.$row["status"].'</td> 
                                </tr>';     
                                        
                            }                               
                        ?>                        
                        </tbody>
                    </table>
                </div>
            </div>
    <?php
            }
        }
    }
    ?>      
    
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