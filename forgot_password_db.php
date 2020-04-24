<?php 
    session_start();
    
    require "db_connect.php";
    
    define("PROJECT_HOME","http://localhost/cc/");
    
    if($db_connected == true)
    {
        $user_input = $conn -> real_escape_string($_POST['fg-pwd-uname']);
        $email = strtolower($username);
        
        $_SESSION['wrong_username'] = false;
        $_SESSION['send_mail'] = false;
        //echo "inside forgot_password_db \n";
        
        //check if username already exists in db.
        $sql = "SELECT email,username FROM users WHERE username='$user_input' 
                                                OR contact_no = '$user_input'
                                                OR email ='$user_input'";
        
        $result = $conn->query($sql);
        if ($result->num_rows == 0)
        {
            //echo "username doesn't exists \r\n";
            $_SESSION['wrong_username'] = true;
            header('location:forgot_password.php');        
        }
        else
        {
            //echo "username _exists";
            
            //echo "sending new password to mail\r\n";
            while($row = $result->fetch_assoc()) 
            {
                $user_email = $row['email'];
                $username = $row['username'];
            }
            
            //echo "<br> mail : ".$user_email;           
            
            $emailBody = "<div>Hello, <br>" . $username . ",<br><br><p>Click this link to reset your password<br><a href='" . PROJECT_HOME . "forgot_password_reset.php?name=" . $username . "'>" . PROJECT_HOME . "forgot_password_reset.php?name=" . $username . "</a><br><br></p>Regards,<br> Admin.</div>";

            //echo $emailBody;
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            mail($user_email, 'Career Configure password reset request', $emailBody, $headers);
            
            $_SESSION['sent_mail'] = true;
            //echo "mail sent";
            header('location:forgot_password.php?email='.$user_email);           
                                                                                  
        }
        $result -> free_result();   
        //echo "login complete \r\n";
        $conn->close();
    }
?>
