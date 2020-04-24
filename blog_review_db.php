<?php
    require "db_connect.php";
    if($db_connected == true)
    {
        session_start();
              
        //delete blog
        
        if(isset($_POST['del-blog']))
        {
            $blog_id = $_POST['blog_id'];            
            
            echo $blog_id;
            
            $_SESSION['blog_del_success'] = false;
            
            $sql = "DELETE FROM blog_comments WHERE blog_id ='$blog_id'";
       
            if($conn->query($sql) == TRUE) 
            {
                $sql = "DELETE FROM blog WHERE blog_id ='$blog_id'"; 
                if($conn->query($sql) == TRUE) 
                {
                    $_SESSION['blog_del_success'] = true;
                    //echo "query suceess";
                    header('location:blogs.php');
                }
            }        
            else
            {
                echo "fail";
            }        
        }
        
        //add comment
        
        if(isset($_POST['add_comment']))
        {
            $blog_id = $_POST['blog_id'];
            $comment = $_POST['blog_add_comment'];
                
            $_SESSION['comment_success'] = false;
            
            //fetchong last id inserted into table
            $sql = "SELECT max(blog_comment_id) as next_comment_id FROM blog_comments WHERE blog_id = '$blog_id'";                          
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $comment_id = $row["next_comment_id"];           
                }
            }
            else
            {
                $comment_id = 0;
            }    
            $comment_id = $comment_id + 1;
            
            $sql = "INSERT INTO blog_comments
                    VALUES ('$blog_id','$comment_id','$comment',now(),'{$_SESSION['user']}')";
            
            if($conn->query($sql) == TRUE) 
            {
                $_SESSION['comment_success'] = true;
                //echo "query suceess";
                header('location:blog_list.php?blog_id='.$blog_id);
            }        
            else
            {
                echo "fail";
            }
        }
        
        //delete comment
        
        if(isset($_POST['del-comment']))
        {
            $blog_id = $_POST['blog_id'];
            $blog_comment_id = $_POST['blog_comment_id'];
            
            
            $_SESSION['comment_del_success'] = false;
            
            
            $sql = "DELETE FROM blog_comments WHERE blog_id ='$blog_id' 
                    AND blog_comment_id = '$blog_comment_id'";
                    
            if($conn->query($sql) == TRUE) 
            {
                $_SESSION['comment_del_success'] = true;
                //echo "query suceess";
                header('location:blog_list.php?blog_id='.$blog_id);
            }        
            else
            {
                echo "fail";
            }        
        }
        
    }
?>