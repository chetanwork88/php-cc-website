<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
        $username = $conn -> real_escape_string($_POST['sgnuname']);
        $username = strtolower($username);
        $pass = $conn -> real_escape_string($_POST['sgnpwd']);
        $pass = sha1($pass);
        $cnfpass = $conn -> real_escape_string($_POST['sgncnfpwd']);
        $cnfpass = sha1($cnfpass);
        
        $first_name = ucwords($conn -> real_escape_string($_POST['sgnfname']));
        $last_name = ucwords($conn -> real_escape_string($_POST['sgnlname']));
        $contact_no = $conn -> real_escape_string($_POST['sgnctnctno']);
        $email = $conn -> real_escape_string($_POST['sgnemail']);
        $email = strtolower($email);  
             
        $_SESSION['user'] = null;
        $_SESSION['profile_name'] = null;
        $_SESSION['first_name'] = null;
        $_SESSION['last_name'] = null;
        $_SESSION['contact_no'] = null;
        $_SESSION['email'] = null;         
        
        $_SESSION['username_exists'] = false;
        $_SESSION['password_mismatch'] = false;
        $_SESSION['contact_no_exists'] = false;
        $_SESSION['email_exists'] = false;
        $_SESSION['signup_success'] = false;
        
                             
        //input validation
        $correct_input = true;
                
        //echo "Inside signup_db\r\n";       
        //check if username exists in db
        $sql = "SELECT user_id FROM users WHERE username='$username'";
        $result = $conn->query($sql);        
        if ($result->num_rows > 0)
        {
            //echo "username exists in db\r\n";  
            $_SESSION['username_exists'] = true;
            $correct_input = false; 
            header('location:signup.php');          
        }
        
        //checking if password field matches or not.
        //echo $pass;
        //echo $cnfpass;
        if(strcmp($pass,$cnfpass) != 0)
        {
            //echo "password_mismatch \r\n";
            $_SESSION['password_mismatch'] = true;
            $correct_input = false;
            header('location:signup.php');
        }    
        
        
        //check if contact no exists in db
        $sql = "SELECT user_id FROM users WHERE contact_no='$contact_no' AND contact_no > 0 ";
        $result = $conn->query($sql);        
        if ($result->num_rows > 0)
        {
            //echo "contact no exists in db\r\n"; 
            $_SESSION['contact_no_exists'] = true;
            $correct_input = false; 
            header('location:signup.php');          
        }
        
        //check if mail exists in db
        $sql = "SELECT user_id FROM users WHERE email='$email' AND email<> '' ";
        $result = $conn->query($sql);        
        if ($result->num_rows > 0)
        {
            //echo "mail exists in db\r\n"; 
            $_SESSION['email_exists'] = true;
            $correct_input = false; 
            header('location:signup.php');          
        }
        
        
        // if everything is correct
        
        if($correct_input)
        {
            //echo "everything is correct\r\n";
            
            //echo $username."\r\n";
            //echo $pass."\r\n";
            //echo $first_name."\r\n";
            //echo $last_name."\r\n";
            //echo $contact_no."\r\n";
            //echo $email."\r\n";
            //fetchong last id inserted into table
            $sql = "SELECT max(user_id) as next_user_id FROM users";                          
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $user_id = $row["next_user_id"];           
                }
            }
            else
            {
                $user_id = 0;
            }    
            $user_id = $user_id + 1;
            
            $sql = "INSERT INTO users
                    VALUES ('$user_id','$username','$pass','$first_name','$last_name','$contact_no',
                            '$email',now(),null,'N')";
                            
            if ($conn->query($sql) == TRUE) 
            {
                //echo "query_success";
                $_SESSION['signup_success'] = true;
                $_SESSION['user'] = $username;
                $_SESSION['profile_name'] = $first_name;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                if(!empty($contact_no))
                {
                    $_SESSION['contact_no'] = $contact_no;
                }
                
                if(!empty($email))
                {
                    $_SESSION['email'] = $email;
                }
                

                header('location:index.php');
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