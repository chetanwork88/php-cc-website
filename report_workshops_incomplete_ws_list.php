<!DOCTYPE html>
<html lang="en">
<head>
    <title>Incomplete workshop</title>
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
    <link rel="stylesheet" type="text/css" href="css/report_workshops_incomplete_ws_list.css">
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
                        <a class="dropdown-item active" href="report_workshops.php">Workshops</a>
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
    
    <!-- ----------------incomplete workshop details--------- -->
        
    <?php
        require "db_connect.php";
        if($db_connected == true)
        {   
            $id = $_GET['workshop_id'];
            //if not admin show enrolled profile-tables
            
            $sql = "SELECT workshop_id,workshop_type,org_name,
                    interested_domain,workshop_request_date
                    FROM workshop WHERE workshop_id = '$id'";
                    
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {   
                while($row = $result->fetch_assoc()) 
                {
    ?>
                        
                    <form action="report_workshops_mark_complete_ws_db.php" method="post" class="ws-mark-complete-form">
                    
                        <h3 class="incomp-ws-heading">Incomplete Workshop details</h3>
                        <div class="form-group">
                        
                            <div class="form-key">
                                <h6>Workshop ID</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['workshop_id'] ?>" name="workshop_id">
                            </div>                                                        
                        </div>
                        
                        <div class="form-group">
                            <div class="form-key">
                                <h6>Workshop Type</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['workshop_type'] ?>" >
                            </div>
                                                     
                        </div>
                                               
                        <div class="form-group">
                            <div class="form-key">
                                <h6>Organization Name</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['org_name'] ?>" >
                            </div>
                                                     
                        </div>
                                                
                        <div class="form-group">
                            <div class="form-key">
                                <h6>Topic</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['interested_domain'] ?>" >
                            </div>
                                                     
                        </div>
                                               
                        <div class="form-group">
                            <div class="form-key">
                                <h6>Workshop Request Date</h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <input type="text" value="<?php echo $row['workshop_request_date'] ?>" >
                            </div>
                                                     
                        </div>
                        
                        <div class="form-group">
                            <div class="form-key">
                                <h6><b>Workshop Status</b></h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value">
                                <select class="custom-select" class="form-control" name ="upd_ws_sts" required>
                                    <option selected disabled>* Select Workshop Status.</option>
                                    <option value="Y"> Conducted </option>
                                    <option value="N"> Date Changed </option> 
                                    <option value="C"> Cancelled </option>  
                                </select>
                            </div>
                                                     
                        </div>
                        
                        <div class="form-group">
                            <div class="form-key">
                                <h6><b>New Workshop Date</b></h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value enter-value">
                                <input type="date" name="upd_ws_new_date">
                                <p class="msg">Only needed when status is date changed</p>
                            </div>   
                                                                             
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="form-key">
                                <h6><b>Workshop Taken Date</b></h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value enter-value">
                                <input type="date" name="upd_ws_taken_date">
                                <p class="msg">Only needed when status is conducted</p>
                            </div>
                                                   
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <div class="form-key">
                                <h6> <b>Workshop Taken By</b></h6>
                            </div>
                            
                            <div class="colon-seperator">
                                :
                            </div>
                            
                            <div class="form-value enter-value">
                                <input type="text" placeholder = " * Enter the Full Name. "
                                name="upd_ws_taken_by" >
                                <p class="msg">Only needed when status is conducted</p>
                            </div>
                                          
                        </div>
                                              
                        <hr>
                        
                        <div class="mark-comp-form-btn">
                            <button type="submit" class="btn btn-primary" name="upd-ws-submit-btn">Mark Complete</button>
                        </div>
                    
                    </form>
    <?php
                }
            }
        }
    ?>  
    
    


    <!-- ----------------incomplete workshop details--------- -->
    
    <div class="ws-home-link-bottom">
        <a href="report_workshops.php"> <button type="button" class="btn btn-secondary">
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