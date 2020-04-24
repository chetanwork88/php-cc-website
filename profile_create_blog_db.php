<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
        $title = $conn -> real_escape_string($_POST['blogtitle']);
        $title = ucfirst($title);
        
        $body = $conn -> real_escape_string($_POST['blogbody']);
        $body = ucfirst($body);;
       
        //echo $title."<br>";
        //echo $body;
        //echo "inside create_blog ";
        $_SESSION['blog_create_success'] = false;
                
        $sql = "SELECT max(blog_id) as next_blog_id FROM blog";                          
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $blog_id = $row["next_blog_id"];           
                }
            }
            else
            {
                $blog_id = 0;
            }    
            $blog_id = $blog_id + 1;
            
            
           
            //echo "executing query";
            $sql = "INSERT INTO blog
                    VALUES ('$blog_id','$title','$body',now(),null,'{$_SESSION['user']}')"; 
            
            if ($conn->query($sql) == TRUE) 
            {
                //echo "query_success";
                $_SESSION['blog_create_success'] = true;
                header('location:profile.php');
            }                             
        
        $result -> free_result();   
        //echo "blog create complete \r\n";
        $conn->close();
    }
?>
