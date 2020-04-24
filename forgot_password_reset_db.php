<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
    
        $username = $conn -> real_escape_string($_POST['rstuname']);
        $username = strtolower($username);
        
        $newpass = $conn -> real_escape_string($_POST['rstpwd']);
        //echo $newpass;
        $newpass = sha1($newpass);
        
        $newcnfpass = $conn -> real_escape_string($_POST['rstcnfpwd']);
        //echo $newcnfpass;
        $newcnfpass = sha1($newcnfpass);                           
        
        $_SESSION['password_mismatch'] = false;
        $_SESSION['reset_pwd_success'] = false;
        
        
                             
        //input validation
        $correct_input = true;
                
        //echo "Inside signup_db\r\n";       
        
        
        //checking if password field matches or not.
        //echo $pass;
        //echo $cnfpass;
        if(strcmp($newpass,$newcnfpass) != 0)
        {
            //echo "password_mismatch \r\n";
            $_SESSION['password_mismatch'] = true;
            $correct_input = false;
            header('location:forgot_password_reset.php?name='.$username);
        }    
                
        // if everything is correct
        
        if($correct_input)
        {
            //echo "everything is correct\r\n";
            
            // $update_date =now();
            // //echo $update_date;
            
            $sql = "UPDATE users 
                    SET password ='$newpass',
                        sys_update_date = now() 
                    WHERE username = '$username'";
                            
            if ($conn->query($sql) == TRUE) 
            {
                //echo "query_success";
                $_SESSION['reset_pwd_success'] = true;
                
                header('location:login.php');
            }
            else
            {
                //echo "query failed.";
            }
        }
            
        //echo "signup_complete\r\n"; 
        $result -> free_result();          
        $conn->close();
    }
?>