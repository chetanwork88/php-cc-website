<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
               
        $first_name = ucwords($conn -> real_escape_string($_POST['chgdatafname']));
        $last_name = ucwords($conn -> real_escape_string($_POST['chgdatalname']));
        $contact_no = $conn -> real_escape_string($_POST['chgdatactnctno']);
        $email = $conn -> real_escape_string($_POST['chgdataemail']);
        $email = strtolower($email);        
        
        $_SESSION['contact_no_exists'] = false;
        $_SESSION['email_exists'] = false;
        $_SESSION['chg_data_success'] = false;
        $_SESSION['no_input'] = false;     
                                    
        //input validation
        $correct_input = true;
        
        $username = $_SESSION['user'];
        
        if(empty($first_name) && empty($last_name) && empty($email) && empty($contact_no))
        {
            //echo "all is null";
            $_SESSION['no_input'] = true;
            $correct_input = false; 
           header('location:profile.php');   
        }    
                    
        //check if contact no exists in db
        if(!empty($contact_no))
        {
            $sql = "SELECT user_id FROM users WHERE contact_no='$contact_no' AND contact_no > 0 ";
            $result = $conn->query($sql);        
            if ($result->num_rows > 0)
            {
                //echo "contact no exists in db\r\n"; 
                $_SESSION['contact_no_exists'] = true;
                $correct_input = false; 
                header('location:profile.php');          
            }
        }    
        
        //check if mail exists in db
        if(!empty($email))
        {
            $sql = "SELECT user_id FROM users WHERE email='$email' AND email<> '' ";
            $result = $conn->query($sql);        
            if ($result->num_rows > 0)
            {
                //echo "mail exists in db\r\n"; 
                $_SESSION['email_exists'] = true;
                $correct_input = false; 
                header('location:profile.php');          
            }
        }
        
        
        // if everything is correct
        
        if($correct_input)
        {
            //echo "everything is correct\r\n";
                           
            if(!empty($first_name))
            {
                $_SESSION['profile_name'] = $first_name;
                $_SESSION['first_name'] = $first_name;
                
            }
            else
            {
                //echo "fname null";
                $first_name = $_SESSION['first_name'];  
            }
            
            if(!empty($last_name))
            {
                $_SESSION['last_name'] = $last_name;
            }
            else
            {
                //echo "lname null";
                $last_name = $_SESSION['last_name'];    
            }
                
            if(!empty($contact_no))
            {
                $_SESSION['contact_no'] = $contact_no;
            }
            else
            {
                //echo "contact null";
                $contact_no = $_SESSION['contact_no'];    
            }
            
            if(!empty($email))
            {
                $_SESSION['email'] = $email;
            }
            else
            {
                //echo "email null"; 
                $email = $_SESSION['email'];   
            }
                        
            //echo "<br>input variables<br>";
            //echo $first_name;
            //echo $last_name;
            //echo $contact_no;
            //echo $email; 
            //echo "<br>";
            //echo "Session variables<br>";
            //echo $_SESSION['first_name'];
            //echo $_SESSION['last_name'];
            //echo $_SESSION['contact_no'];
            //echo $_SESSION['email']; 
               
            
            $sql = "UPDATE users SET 
                                first_name = '$first_name',
                                last_name = '$last_name',
                                contact_no = '$contact_no',
                                email = '$email',
                                sys_update_date = now() 
                                WHERE username = '$username'";
                            
            if ($conn->query($sql) == TRUE) 
            {
                //echo "query_success";
                $_SESSION['chg_data_success'] = true;
                
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