<!DOCTYPE html>
<html lang="en">
<head>
    <title>Incomplete Feedback</title>
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
    <link rel="stylesheet" type="text/css" href="css/report_feedback_incomplete_fd_list.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/element_slide.css">
</head>
<bodys>
    
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
                <a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
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
                        <a class="dropdown-item " href="report_workshops.php">Workshops</a>
                        <a class="dropdown-item active" href="report_service_feedback.php">Services And Feedback</a>  
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
    
    <!-- ----------------incomplete workshop details--------- -->
        
    <?php
        require "db_connect.php";
        if($db_connected == true)
        {   
            $id = $_GET['feedback_id'];
            //if not admin show enrolled profile-tables
            
            $sql = "SELECT feedback_id,feedback_type,first_name,last_name,contact_no,email,
            query,DATE(sys_creation_date) as create_date FROM feedback 
            WHERE feedback_id = '$id'";
                    
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {   
                while($row = $result->fetch_assoc()) 
                {
    ?>
                        
                    <form action="report_feedback_mark_complete_fd_db.php" method="post" class="fd-mark-complete-form">
                    
                        <h3 class="incomp-fd-heading">Incomplete Feedback details</h3>
                        <div class="form-group">
                        
                            <div class="form-key">
                                <h6>Service ID</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['feedback_id'] ?>" name="feedback_id">
                            </div>                                                        
                        </div>
                        
                        <div class="form-group">
                            <div class="form-key">
                                <h6>Service Type</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['feedback_type'] ?>" >
                            </div>
                                                     
                        </div>
                                               
                        <div class="form-group">
                            <div class="form-key">
                                <h6>First Name</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['first_name'] ?>" >
                            </div>
                                                     
                        </div>
                        
                        <div class="form-group">
                            <div class="form-key">
                                <h6>Last Name</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['last_name'] ?>" >
                            </div>
                                                     
                        </div>
                        
                        <div class="form-group">
                            <div class="form-key">
                                <h6>Contact No</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['contact_no'] ?>" >
                            </div>
                                                     
                        </div>
                        
                        <div class="form-group">
                            <div class="form-key">
                                <h6>Email</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['email'] ?>" >
                            </div>
                                                     
                        </div>
                                                
                        <div class="form-group">
                            <div class="form-key">
                                <h6>Feedback</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <textarea class="form-control textarea-value" rows="3" ><?php echo nl2br($row['query'])?></textarea>
                            </div>
                                                     
                        </div>
                                               
                        <div class="form-group">
                            <div class="form-key">
                                <h6>Creation Date</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['create_date'] ?>" >
                            </div>
                                                     
                        </div>
                        
                        <div class="form-group">
                            <div class="form-key">
                                <h6><b>Completion Comments</b></h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <textarea class="form-control" rows="3" minlength="1" maxlength="500" name= "compl_comment" 
                                placeholder ="* Enter your comments" required></textarea>
                            </div>
                                                     
                        </div>
                        
                                              
                        <hr>
                        
                        <div class="mark-comp-form-btn">
                            <button type="submit" class="btn btn-primary" name="upd-fd-submit-btn">Mark Complete</button>
                        </div>
                    
                    </form>
    <?php
                }
            }
        }
    ?>  
    
    


    <!-- ----------------incomplete workshop details--------- -->
    
    <div class="fd-home-link-bottom">
        <a href="report_service_feedback.php"> <button type="button" class="btn btn-secondary">
        << Go Back</button></a>
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