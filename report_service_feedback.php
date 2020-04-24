<!DOCTYPE html>
<html lang="en">
<head>
    <title>Services And Feedback</title>
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
    <link rel="stylesheet" type="text/css" href="css/report_service_feedback.css">
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
                <a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fas fa-user-circle"></i>
                    <?php
                    echo " ".$_SESSION['profile_name'];
                    ?>
                </a>
                <div class="dropdown-menu navbar-light">
                    <a class="dropdown-item " href="profile.php">Profile</a>
                    <?php
                        if($_SESSION['admin'])
                        {
                    ?>
                        <a class="dropdown-item" href="report_workshops.php">Workshops</a>
                        <a class="dropdown-item active" href="report_service_feedback.php">
                        Services And Feedback</a>  
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
    
    
    <!-- --------------services moved to complete alert ------------------------>
    <?php
        if($_SESSION['service_updated'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>Service inquiry marked as completed .</p>
            </div>
    <?php        
        }
        $_SESSION['service_updated'] = false;
    ?>
    
    <!-- --------------services moved to complete alert ------------------------>
    <?php
        if($_SESSION['feedback_updated'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>Feedback inquiry marked as completed .</p>
            </div>
    <?php        
        }
        $_SESSION['feedback_updated'] = false;
    ?>
    
       
    <!-- ----------------------------- show pending services------------------------------->
    <?php
        require "db_connect.php";
        if($db_connected == true)
        {
                        
            $sql = "SELECT service_id,service_type,first_name,last_name,contact_no,email,
                    query,DATE(sys_creation_date) as create_date FROM service 
                    WHERE status='N' order by sys_creation_date";
                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
        
        ?>
                
                <div class="profile-tables incomplete-services">
                    <h3>PENDING SERVICES </h3>
                    <div class="table-responsive-xl table-div">                   
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Type</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Query</th>
                                    <th>Creation Date</th>
                                    <th>More info</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            
                            <?php
                                                    
                            while($row = $result->fetch_assoc()) 
                            {
                                                                    
                                if(empty($row["contact_no"]))
                                {
                                    $row["contact_no"] = '-';
                                }
                                
                                
                               
                                echo '<tr> 
                                <td>'.$row["service_id"].'</td> 
                                <td>'.$row["service_type"].'</td>
                                <td>'.$row["first_name"].'</td>
                                <td>'.$row["last_name"].'</td> 
                                <td>'.$row["contact_no"].'</td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["email"].'">'
                                    .$row["email"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["query"].'">'
                                    .$row["query"].'</a></td>
                                <td>'.$row["create_date"].'</td> 
                                <td class="btn-center"><a  
                                href="report_service_incomplete_srv_list.php?service_id='.$row['service_id'].'">
                                <button type="button" class="btn btn-secondary"> 
                                Open</button></a></td> 
                                </tr>'; 
                                        
                            }     
                                
                            ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                         
        <?php
            }
            
            // pending feedback
             
            $sql = "SELECT feedback_id,feedback_type,first_name,last_name,contact_no,email,
                    query,DATE(sys_creation_date) as create_date FROM feedback 
                    WHERE status='N' order by sys_creation_date";
                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
        
        ?>
                
                <div class="profile-tables incomplete-feedbacks">
                    <h3>PENDING FEEDBACK </h3>
                    <div class="table-responsive-xl table-div">                   
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Type</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Feedback</th>
                                    <th>Creation Date</th>
                                    <th>More info</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            
                            <?php
                                                    
                            while($row = $result->fetch_assoc()) 
                            {
                                                                    
                                if(empty($row["contact_no"]))
                                {
                                    $row["contact_no"] = '-';
                                }
                                
                                
                               
                                echo '<tr> 
                                <td>'.$row["feedback_id"].'</td> 
                                <td>'.$row["feedback_type"].'</td>
                                <td>'.$row["first_name"].'</td>
                                <td>'.$row["last_name"].'</td> 
                                <td>'.$row["contact_no"].'</td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["email"].'">'
                                    .$row["email"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["query"].'">'
                                    .$row["query"].'</a></td>
                                <td>'.$row["create_date"].'</td> 
                                <td class="btn-center"><a  
                                href="report_feedback_incomplete_fd_list.php?feedback_id='.$row['feedback_id'].'">
                                <button type="button" class="btn btn-secondary"> 
                                Open</button></a></td> 
                                </tr>'; 
                                        
                            }     
                                
                            ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                         
        <?php
            }       
            
            // all services
            $sql = "SELECT service_id,service_type,first_name,last_name,contact_no,email,
                    query,DATE(sys_creation_date) as create_date,completion_comments,
                    DATE(completion_date) as complete_date ,status,completed_by FROM service 
                    order by sys_creation_date";
                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            { 
        ?>    
                <div class="profile-tables incomplete-services">
                    <h3>ALL SERVICES </h3>
                    <div class="table-responsive-xl table-div">                   
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Type</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Query</th>
                                    <th>Creation Date</th>
                                    <th>Completion Comments</th>
                                    <th>Completion Date</th>
                                    <th>Status</th>
                                    <th>Completed by</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            
                            <?php
                                                    
                            while($row = $result->fetch_assoc()) 
                            {
                                                                    
                                if(empty($row["contact_no"]))
                                {
                                    $row["contact_no"] = '-';
                                }
                                
                                
                                
                                if(empty($row["completed_by"]))
                                {
                                    $row["completed_by"] = '-';
                                }
                                
                                if(empty($row["complete_date"]))
                                {
                                    $row["complete_date"] = '-';
                                }
                                if($row["status"] =='N')
                                {
                                    $row["status"] = 'Incomplete';
                                }
                                else if($row["status"] =='Y')
                                {
                                    $row["status"] = 'Complete';
                                }
                                    
                                echo '<tr> 
                                <td>'.$row["service_id"].'</td> 
                                <td>'.$row["service_type"].'</td>
                                <td>'.$row["first_name"].'</td>
                                <td>'.$row["last_name"].'</td> 
                                <td>'.$row["contact_no"].'</td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["email"].'">'
                                    .$row["email"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["query"].'">'
                                    .$row["query"].'</a></td>
                                <td>'.$row["create_date"].'</td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["completion_comments"].'">'
                                    .$row["completion_comments"].'</a></td> 
                                <td>'.$row["complete_date"].'</td>
                                <td>'.$row["status"].'</td>
                                <td>'.$row["completed_by"].'</td>
                 
                                </tr>'; 
                                        
                            }     
                                
                            ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                
        <?php
            } 
            // pending feedback
             
            $sql = "SELECT feedback_id,feedback_type,first_name,last_name,contact_no,email,
                    query,DATE(sys_creation_date) as create_date, completion_comments,
                    DATE(completion_date) as complete_date ,status,completed_by
                    FROM feedback 
                    order by sys_creation_date";
                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
        
        ?>
                
                <div class="profile-tables incomplete-feedbacks">
                    <h3>ALL FEEDBACK </h3>
                    <div class="table-responsive-xl table-div">                   
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Type</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Feedback</th>
                                    <th>Creation Date</th>
                                    <th>Completion Comments</th>
                                    <th>Completion Date</th>
                                    <th>Status</th>
                                    <th>Completed by</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            
                            <?php
                                                    
                            while($row = $result->fetch_assoc()) 
                            {
                                                                    
                                if(empty($row["contact_no"]))
                                {
                                    $row["contact_no"] = '-';
                                }
                                
                                
                                if(empty($row["completed_by"]))
                                {
                                    $row["completed_by"] = '-';
                                }
                                
                                if(empty($row["complete_date"]))
                                {
                                    $row["complete_date"] = '-';
                                }
                                if($row["status"] =='N')
                                {
                                    $row["status"] = 'Incomplete';
                                }
                                else if($row["status"] =='Y')
                                {
                                    $row["status"] = 'Complete';
                                }
                                
                                echo '<tr> 
                                <td>'.$row["feedback_id"].'</td> 
                                <td>'.$row["feedback_type"].'</td>
                                <td>'.$row["first_name"].'</td>
                                <td>'.$row["last_name"].'</td> 
                                <td>'.$row["contact_no"].'</td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["email"].'">'
                                    .$row["email"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["query"].'">'
                                    .$row["query"].'</a></td>
                                <td>'.$row["create_date"].'</td> 
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["completion_comments"].'">'
                                    .$row["completion_comments"].'</a></td> 
                                <td>'.$row["complete_date"].'</td>
                                <td>'.$row["status"].'</td>
                                <td>'.$row["completed_by"].'</td> 
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