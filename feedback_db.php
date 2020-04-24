<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
        $first_name = ucwords($conn -> real_escape_string($_POST['feedfname']));
        $last_name = ucwords($conn -> real_escape_string($_POST['feedlname']));
        $contact_no = $conn -> real_escape_string($_POST['feedctnctno']);
        $email = $conn -> real_escape_string($_POST['feedemail']);
        $email = strtolower($email);  
        $feed_type = $conn -> real_escape_string($_POST['feedenquirytype']);
        $feedback = ucfirst($conn -> real_escape_string($_POST['feedcomment']));    

        $_SESSION['feedback_success'] = false;
                          
        //fetchong last id inserted into table
        $sql = "SELECT max(feedback_id) as next_feedback_id FROM feedback";                          
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                $feedback_id = $row["next_feedback_id"];           
            }
        }
        else
        {
            $feedback_id = 0;
        }    
        $feedback_id = $feedback_id + 1;   
                   
        $sql = "INSERT INTO feedback
                VALUES ('$feedback_id','$first_name','$last_name','$contact_no','$email',
                        '$feed_type','$feedback',now(),null,null,'N','{$_SESSION['user']}',null)";
                        
        if ($conn->query($sql) == TRUE) 
        {
            $_SESSION['feedback_success'] = true;
            //echo "query suceess";
            header('location:index.php');
        }
        //  else{
        //      echo "query failed";
        //  }       
        //echo "signup_complete\r\n"; 
        $result -> free_result();          
        $conn->close();
    }
?>