<!DOCTYPE html>
<html lang="en">
<head>
    <title>Workshop Reports</title>
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
    <link rel="stylesheet" type="text/css" href="css/report_workshops.css">
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
       
    
    <!-- --------------workshop moved to complete alert ------------------------>
    <?php
        if($_SESSION['workshop_updated'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>Workshop status updated .</p>
            </div>
    <?php        
        }
        $_SESSION['workshop_updated'] = false;
    ?>
    
       
    <!-- ----------------------------- show upcoming workshop------------------------------->
    <?php
        require "db_connect.php";
        if($db_connected == true)
        {
                        
            $sql = "SELECT workshop_id,workshop_type,first_name,last_name,
                    contact_no,email,org_name,org_address,interested_domain,workshop_expectation,workshop_request_date
                    FROM workshop WHERE status='N' AND workshop_request_date > CURDATE() order by workshop_request_date";
                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
    ?>       
                <div class="profile-tables upcoming-workshops">
                    <h3>UPCOMING WORKSHOPS </h3>
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
                                    <th>Organization Name</th>
                                    <th>Organization Address</th>
                                    <th>Topic</th>
                                    <th>Workshop Request Date</th>
                                    <th>Workshop Expectation</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            
                            <?php
                                                    
                            while($row = $result->fetch_assoc()) 
                            {
                                                                    
                                if(empty($row["interested_domain"]))
                                {
                                    $row["interested_domain"] = '-';
                                }
                                
                                echo '<tr> 
                                <td>'.$row["workshop_id"].'</td> 
                                <td>'.$row["workshop_type"].'</td> 
                                <td>'.$row["first_name"].'</td> 
                                <td>'.$row["last_name"].'</td> 
                                <td>'.$row["contact_no"].'</td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["email"].'">'
                                    .$row["email"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["org_name"].'">'
                                    .$row["org_name"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["org_address"].'">'
                                    .$row["org_address"].'</a></td>
                                <td>'.$row["interested_domain"].'</td>
                                <td>'.$row["workshop_request_date"].'</td> 
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["workshop_expectation"].'">'
                                    .$row["workshop_expectation"].'</a></td>
                                </tr>'; 
                                        
                            }     
                                
                            ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
        <?php
            }
            
            $sql = "SELECT workshop_id,workshop_type,first_name,last_name,contact_no,email,org_name,
                    org_address,interested_domain,workshop_expectation,workshop_request_date
                    FROM workshop WHERE status='N' AND workshop_request_date < now()
                    order by workshop_request_date";
                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
        
        ?>
                
                <div class="profile-tables incomplete-workshops">
                    <h3>INCOMPLETE WORKSHOPS </h3>
                    <p>(This workshops might have been conducted but not marked as complete in system)</p>
                    <div class="table-responsive-xl table-div">                   
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Type</th>
                                    <th>Contact No</th>
                                    <th>Organization Name</th>
                                    <th>Organization Address</th>
                                    <th>Topic</th>
                                    <th>Workshop Request Date</th>
                                    <th>More info</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            
                            <?php
                                                    
                            while($row = $result->fetch_assoc()) 
                            {
                                                                    
                                if(empty($row["interested_domain"]))
                                {
                                    $row["interested_domain"] = '-';
                                }
                                
                                echo '<tr> 
                                <td>'.$row["workshop_id"].'</td> 
                                <td>'.$row["workshop_type"].'</td> 
                                <td>'.$row["contact_no"].'</td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["org_name"].'">'
                                    .$row["org_name"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["org_address"].'">'
                                    .$row["org_address"].'</a></td>
                                <td>'.$row["interested_domain"].'</td>
                                <td>'.$row["workshop_request_date"].'</td> 
                                <td class="btn-center"><a  
                                href="report_workshops_incomplete_ws_list.php?workshop_id='.$row['workshop_id'].'">
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
            
            $sql = "SELECT workshop_id,workshop_type,first_name,last_name,contact_no,email,org_name,
            org_address,interested_domain,workshop_expectation,workshop_request_date,status
            FROM workshop WHERE status <>'N'
            order by workshop_request_date desc";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {      
        ?>
        
                <!--------------------- getting all workshops / filter workshops----------------->
                <div class="profile-tables upcoming-workshops">
                    <h3>COMPLETED WORKSHOPS </h3>
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
                                    <th>Organization Name</th>
                                    <th>Organization Address</th>
                                    <th>Topic</th>
                                    <th>Workshop Request Date</th>
                                    <th>Workshop Expectation</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            
                            <?php
                                                    
                            while($row = $result->fetch_assoc()) 
                            {
                                                                    
                                if(empty($row["interested_domain"]))
                                {
                                    $row["interested_domain"] = '-';
                                }
                                
                                if($row["status"] == 'Y')
                                {
                                    $row["status"] = 'Success';
                                }
                                
                                if($row["status"] == 'C')
                                {
                                    $row["status"] = 'Cancelled';
                                }
                                
                                echo '<tr> 
                                <td>'.$row["workshop_id"].'</td> 
                                <td>'.$row["workshop_type"].'</td> 
                                <td>'.$row["first_name"].'</td> 
                                <td>'.$row["last_name"].'</td> 
                                <td>'.$row["contact_no"].'</td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["email"].'">'
                                    .$row["email"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["org_name"].'">'
                                    .$row["org_name"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["org_address"].'">'
                                    .$row["org_address"].'</a></td>
                                <td>'.$row["interested_domain"].'</td>
                                <td>'.$row["workshop_request_date"].'</td> 
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["workshop_expectation"].'">'
                                    .$row["workshop_expectation"].'</a></td>
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
            
            $sql = "SELECT workshop_id,workshop_type,first_name,last_name,contact_no,email,org_name,
            org_address,interested_domain,workshop_expectation,workshop_request_date,status
            FROM workshop 
            order by workshop_request_date";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {      
        ?>
        
                <!--------------------- getting all workshops / filter workshops----------------->
                <div class="profile-tables upcoming-workshops">
                    <h3>ALL WORKSHOPS </h3>
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
                                    <th>Organization Name</th>
                                    <th>Organization Address</th>
                                    <th>Topic</th>
                                    <th>Workshop Request Date</th>
                                    <th>Workshop Expectation</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            
                            <?php
                                                    
                            while($row = $result->fetch_assoc()) 
                            {
                                                                    
                                if(empty($row["interested_domain"]))
                                {
                                    $row["interested_domain"] = '-';
                                }
                                
                                if($row["status"] == 'Y')
                                {
                                    $row["status"] = 'Success';
                                }
                                
                                if($row["status"] == 'C')
                                {
                                    $row["status"] = 'Cancelled';
                                }
                                
                                echo '<tr> 
                                <td>'.$row["workshop_id"].'</td> 
                                <td>'.$row["workshop_type"].'</td> 
                                <td>'.$row["first_name"].'</td> 
                                <td>'.$row["last_name"].'</td> 
                                <td>'.$row["contact_no"].'</td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["email"].'">'
                                    .$row["email"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["org_name"].'">'
                                    .$row["org_name"].'</a></td>
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["org_address"].'">'
                                    .$row["org_address"].'</a></td>
                                <td>'.$row["interested_domain"].'</td>
                                <td>'.$row["workshop_request_date"].'</td> 
                                <td> <a href="#" data-toggle="tooltip"  
                                    title="'.$row["workshop_expectation"].'">'
                                    .$row["workshop_expectation"].'</a></td>
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
        ?> 
        
                    
    <!-- --------------------incomplete workshops---------------- -->
    
    <div class="workshop-report">
    
        
    
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