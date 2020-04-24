<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogs</title>
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
    <link rel="stylesheet" type="text/css" href="css/blogs.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/element_slide.css">
</head>
<body class="blog-page">
    
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
                    <a class="nav-link active" href="blogs.php">Blogs</a>
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
    
    
    <!-- ----------------------blogs------------------------------ -->
    
    <h3 class="blog-heading">Recent Blogs</h3>
    
    <?php
        
        require "db_connect.php";
        if($db_connected == true)
        {   
            $input = array();
            function truncateLongText ($string, $limit) {
                // return with no change if string is shorter than $limit
                $break=".";
                $pad=" ...";
                
                
                if(strlen($string) <= $limit)
                {
                    return $string;
                }

                // is $break present between $limit and the end of the string? 
                if ( false !== ($breakpoint = strpos($string, $break, $limit)) ) {
                    if($breakpoint < strlen($string) - 1) {
                        $string = substr($string, 0, $breakpoint) . $pad;
                    }
                }

                return $string;
            }
            
            //if not admin show enrolled profile-tables
            $username = $_SESSION['user'];
            $sql = "SELECT b.blog_id,b.blog_title,b.blog_body,b.sys_creation_date as creation_date,
                    g.first_name,g.last_name
                    FROM blog b ,users g WHERE b.created_by = g.username order by blog_id desc";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {   
                while($row = $result->fetch_assoc()) 
                {
    ?>
                           
                    <!-- ------------ blog--------------------->
                    
                    <div class="blog">
                        
                        <div class="blog-title">
                            <?php
                                echo nl2br($row["blog_title"]);
                            ?>
                        </div>
                        
                        <div class="blog-body">
                            <?php
                                $output = null;
                                $output = truncateLongText($row["blog_body"],400);
                                echo nl2br($output);
                            ?>
                                    <div class="cont-read-btn">
                                       <a href="blog_list.php?blog_id=<?php echo $row["blog_id"] ?>&blog_name =<?php echo $row["blog_title"] ?> "> <button type="button" class="btn btn-outline-info" 
                                        name="cont-read-submit-btn" >Continue Reading ...</button></a>
                                    </div>
                            
                        </div>
                        
                        <div class="creator">
                            
                            <footer class="blockquote-footer">
                                <?php
                                    echo $row["first_name"]." ".$row["last_name"]."  ( ".$row["creation_date"]." )";
                                ?>
                            </footer>
                            
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