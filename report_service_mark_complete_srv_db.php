<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
               
        $service_id = $conn -> real_escape_string($_POST['service_id']);
        $comments = ucfirst($conn -> real_escape_string($_POST['compl_comment']));
        
        $username = $_SESSION['user'];
        
        $_SESSION['service_updated'] = false;
        
           
        $sql = "UPDATE service SET 
                        completion_comments = '$comments',
                        status  = 'Y',
                        completed_by  = '$username',
                        completion_date  = now() 
                        WHERE service_id = '$service_id'";
                               
        if ($conn->query($sql) == TRUE) 
        {
            //echo "query_success";
            $_SESSION['service_updated'] = true;           
            header('location:report_service_feedback.php');
        }
        else
        {
            //echo "query failed.";
        }
        
            
        //echo "signup_complete\r\n"; 
        $result -> free_result();          
        $conn->close();
    }
?>