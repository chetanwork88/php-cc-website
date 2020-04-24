<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
        $oldpass = $conn -> real_escape_string($_POST['oldpwd']);
        //echo $oldpass;
        $oldpass = sha1($oldpass);
        
        $newpass = $conn -> real_escape_string($_POST['newpwd']);
        //echo $newpass;
        $newpass = sha1($newpass);
        
        $newcnfpass = $conn -> real_escape_string($_POST['newcnfpwd']);
        //echo $newcnfpass;
        $newcnfpass = sha1($newcnfpass);                           
        
        $_SESSION['old_password_incorrect'] = false;
        $_SESSION['password_mismatch'] = false;
        $_SESSION['chg_pwd_success'] = false;
        
        $username = $_SESSION['user'];
                             
        //input validation
        $correct_input = true;
                
        //echo "Inside signup_db\r\n";       
        //check if username exists in db
        $sql = "SELECT user_id FROM users WHERE username='$username' AND password = '$oldpass'";
        $result = $conn->query($sql);        
        if ($result->num_rows <= 0)
        {
            //echo "username exists in db\r\n";  
            $_SESSION['old_password_incorrect'] = true;
            $correct_input = false; 
            header('location:profile.php');          
        }
        
        //checking if password field matches or not.
        //echo $pass;
        //echo $cnfpass;
        if(strcmp($newpass,$newcnfpass) != 0)
        {
            //echo "password_mismatch \r\n";
            $_SESSION['password_mismatch'] = true;
            $correct_input = false;
            header('location:profile.php');
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
                $_SESSION['chg_pwd_success'] = true;
                
                header('location:profile.php');
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