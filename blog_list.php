<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog-List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/8d1794b5f2.js" crossorigin="anonymous"></script>
        
    <script src="js/slide_element.js"></script>
    <script src="js/template.js"></script>
    <script src="js/blog_review.js"></script>
    
    <script src="https://code.jquery.com/jquery-1.12.0.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <link rel="stylesheet" type="text/css" href="css/blogs.css">
    <link rel="stylesheet" type="text/css" href="css/blog_list.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/alert.css">
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
    
    <!-- --------------blog delete successful  ------------------------>
    <?php 
        if($_SESSION['blog_del_success'])
            {
        ?>      
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p> Blog Deleted sucessfully .</p>
                </div>
                
        <?php                                
            
            }
            $_SESSION['blog_del_success'] = false;
        ?>
        
    <!-- --------------comment added successful  ------------------------>
    <?php 
        if($_SESSION['comment_success'])
        {
    ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p> Comment added sucessfully .</p>
            </div>
            
    <?php                                
        
        }
        $_SESSION['comment_success'] = false;
    ?>
    
    <!-- --------------comment delete successful  ------------------------>
    <?php 
        if($_SESSION['comment_del_success'])
            {
        ?>      
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p> Comment Deleted sucessfully .</p>
                </div>
            
        <?php                                
            
            }
            $_SESSION['comment_del_success'] = false;
        ?>
    
    <!-- ----------------------blogs------------------------------ -->
    
    <h3 class="blog-heading"> Blog</h3>
    
    <div class="blog-home-link">
        <a href="blogs.php"> <button type="button" class="btn btn-secondary">
        << All Blogs</button></a>
    </div>
    <!-- -----------------------blog details ------------------->
    
    <?php
        require "db_connect.php";
        if($db_connected == true)
        {   
         
            // share links                    
            $pageURL = 'http';
            if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
            $pageURL .= "://";
            if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
            } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            } 
         
            $id = $_GET['blog_id'];
            //if not admin show enrolled profile-tables
            $username = $_SESSION['user'];
            $sql = "SELECT b.blog_id,b.blog_title,b.blog_body,DATE(b.sys_creation_date) as creation_date,
                    g.first_name,g.last_name
                    FROM blog b ,users g WHERE b.created_by = g.username  AND blog_id = '$id' ";
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
                                echo nl2br($row["blog_body"]);
                            ?>
                            
                        </div>
                        
                        <div class="creator">
                            
                            <footer class="blockquote-footer">
                                <?php
                                    echo $row["first_name"]." ".$row["last_name"]."  ( ".$row["creation_date"]." )";
                                ?>
                            </footer>
                            
                        </div>
                        
                        <!-- ---------------------sharing links-------------------- -->
                    
                        <div class="blog-share">
                            
                            <div class="fb-share">
                                <a  target = "_blank" href="http://www.facebook.com/sharer.php?u="<?php echo $pageURL ?> data-toggle="tooltip" 
                                title="Share on Facebook">
                                <i class="fab fa-facebook-square fa-2x"></i></a>
                            </div>
                                                
                            <div class="twitter-share">
                                <a  target = "_blank" href="http://twitter.com/share?text=Visit the link &url="<?php echo $pageURL ?> data-toggle="tooltip" 
                                title="Share on Twitter">
                                <i class="fab fa-twitter-square fa-2x"></i></a>
                            </div>
                            
                            <div class="whatsapp-share">
                                <a target="_blank" href="https://wa.me/?text=<?php echo $pageURL;?>" data-toggle="tooltip" 
                                title="Share on Whatsapp">
                                <i class="fab fa-whatsapp-square fa-2x"></i></a>
                            </div>
                                
                            <!-- <a  target = "_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $pageURL; ?>&title=heyy "
                            data-toggle="tooltip" title="Share on Linkedin">
                            <i class="fab fa-linkedin fa-2x"></i></a> -->
                            
                            <div class=" copy-link">
                                <a  class="cls_copy_pg_action copyAction copy-action-btn" 
                                data-value=<?php echo $pageURL ?> data-toggle="tooltip" 
                                title="Copy Link"> 
                                <i class="fas fa-copy fa-2x"></i>
                                </a>
                                
                                <p id="myTooltip" class="text-success"></p>
                            </div>
                                                                            
                        </div>
                        
                        
                        <!-- ----------------admin delete blog ----------- -->
                        <?php
                            if($_SESSION['admin'])
                            {
                        ?>
                         
    
                            <div class="delete-blog">
                                <input type="button" value="Delete Blog" data-toggle="modal" data-target="#del-blog-modal" >
                            </div>
                                
                                <div class="modal fade" id="del-blog-modal">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header bg-danger">
                                            <h4 class="modal-title text-light">Delete Blog</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <p class="text-center">Are you Sure you want to delete this blog?</p>
                                                <hr>
                                                <div class="del-blog-form">
                                                    <form action ="blog_review_db.php" method="post">
                                                        <input type="hidden" name ="blog_id" id = "blog_id" 
                                                        value ="<?php echo $id ?>">                                                   
                                                        <div class="del-blog-btn">
                                                            <button type="submit" name ="del-blog" class="btn btn-danger text-center">Delete</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                                                                        
                                        </div>
                                    </div>
                                </div>
                    </div>    
                    
    <?php   
                            }     
    
                }
            }
    ?>
        
    
        <div class="blog-comment">
            <form action = "blog_review_db.php" method="post">
                    <input type="hidden" name ="blog_id" id = "blog_id" value ="<?php echo $id ?>">              
                    <div class="form-input">
                        <textarea  minlength="2" maxlength="1000" rows="2" name="blog_add_comment" 
                        id = "blog_add_comment" placeholder=" Add your views."></textarea>
                    </div>   
                                
                    <div class="add-comment-btn">
                        <button type="submit" class="btn btn-primary" id ="add_comment" 
                        name="add_comment" >Add Comment</button>
                    </div>                   
            </form>
        </div>
        
        
        
        <?php        
            // fetching comments for the blog
            $sql = "SELECT  b.blog_id,b.blog_comment_id,b.comment,b.sys_creation_date as creation_date,
                            g.first_name,g.last_name
                            FROM blog_comments b LEFT JOIN users g 
                            ON b.commented_by = g.username  INNER JOIN blog bg
                            ON b.blog_id = bg.blog_id
                            AND b.blog_id = '$id'
                            ORDER BY b.sys_creation_date DESC";
                            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
            ?>
            
                <div class="blog-comment-list">
                    <h5>Comments :</h5>
                </div>    
                              
            <?php   
                while($row = $result->fetch_assoc()) 
                {    
                    if(empty($row['first_name']) || empty($row['last_name']))
                    {
                        $row['first_name'] = "Anonymous";
                        $row['last_name'] = null;
                    }
                    
                    ?>
                    
                        <!-- ------------ comments--------------------->
                    
                        <div class="comment-list">
                        
                            <hr>        
                            <div class="comment">
                                <?php
                                    echo nl2br($row["comment"]);
                                ?>
                            </div>
                                                        
                            <div class="creator">
                                
                                <footer class="blockquote-footer">
                                    <?php
                                        echo $row["first_name"]." ".$row["last_name"]."  ( ".$row["creation_date"]." )";
                                    ?>
                                </footer>
                                
                            </div>
                            
                            <?php
                                
                                //Giving access to admin to delete comment
                                
                                if($_SESSION['admin'])
                                { 
                            ?>                                    
                                    <div class="delete-comment">
                                        <input type="button"  name ="del-comment" value="Delete Comment" data-toggle="modal" data-target="#del-comment-modal" >
                                    </div>
                                    
                                    <div class="modal fade" id="del-comment-modal">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header bg-danger">
                                                <h4 class="modal-title text-light">Delete Comment</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <p class="text-center">Are you Sure you want to delete this comment?</p>
                                                    <hr>
                                                    <div class="del-com-form">
                                                        <form action ="blog_review_db.php" method="post">
                                                            <input type="hidden" name ="blog_id" id = "blog_id" 
                                                            value ="<?php echo $id ?>">
                                                            <input type="hidden" name ="blog_comment_id" id = "blog_comment_id" 
                                                            value ="<?php echo $row['blog_comment_id'] ?>">                                                   
                                                            <div class="del-comment-btn">
                                                                <button type="submit" name ="del-comment" class="btn btn-danger text-center">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                                                            
                                            </div>
                                        </div>
                                    </div>
                            
                            <?php
                                }
            
                            ?>
                            
                        </div>
                            
                <?php
                    
                }
            }
        }
    ?>
    
    
        <!-- -------all blogs button ------ -->
    <hr>
    <div class="blog-home-link blog-home-link-bottom">
        <a href="blogs.php"> <button type="button" class="btn btn-secondary">
        << All Blogs</button></a>
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