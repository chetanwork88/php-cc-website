<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
        $username = $conn -> real_escape_string($_POST['lgnuname']);
        $username = strtolower($username);
        //echo $username;
        $pass = $conn -> real_escape_string($_POST['lgnpwd']);
        //echo $pass;
        $pass = sha1($pass);
        
        $_SESSION['user'] = null;
        $_SESSION['profile_name'] = null;
        $_SESSION['first_name'] = null;
        $_SESSION['last_name'] = null;
        $_SESSION['contact_no'] = null;
        $_SESSION['email'] = null; 
        
        $_SESSION['wrong_username'] = false;
        $_SESSION['wrong_password'] = false;
        $_SESSION['login_success'] = false;
        $_SESSION['admin'] = false;
       
        //echo "inside login_db \r\n";
        
        //check if username already exists in db.
        $sql = "SELECT 1 FROM users WHERE username='$username' 
                                                OR contact_no = '$username'
                                                OR email ='$username'";
        
        $result = $conn->query($sql);
        if ($result->num_rows == 0)
        {
            //echo "username doesn't exists \r\n";
            $_SESSION['wrong_username'] = true;
            header('location:login.php');        
        }
        else
        {
            //echo "username _exists";
            //echo "checking username and password \r\n";
            
            $sql = "SELECT is_admin,first_name,last_name,contact_no,email FROM users WHERE (username='$username' 
                                                OR contact_no = '$username'
                                                OR email = '$username')
                                                AND password = '$pass'";
            $result = $conn->query($sql);
            //echo $result->num_rows;
            if ($result->num_rows == 0)
            {
                //echo "incorrect password \r\n";
                $_SESSION['wrong_password'] = true;
                header('location:login.php');        
            }
            else
            {
                //echo "login success \r\n";
                
                $_SESSION['user']=$username;               
                if ($result->num_rows > 0) 
                {                    
                    while($row = $result->fetch_assoc()) 
                    {
                        //echo "id: " . $row["is_admin"]. " - Name: " . $row["first_name"];
                        if($row["is_admin"] == 'Y')
                        {
                            $_SESSION['admin'] = true;
                        }
                        
                        $_SESSION['profile_name'] = ucfirst($row['first_name']);
                        $_SESSION['first_name'] = $row['first_name'];
                        $_SESSION['last_name'] = $row['last_name'];
                        
                        if($row['contact_no'] > 0)
                        {
                            $_SESSION['contact_no'] = $row['contact_no'];
                        }
                        
                        if(!empty($row['email']))
                        {
                            $_SESSION['email'] = $row['email'];
                        }
                                
                    }
                $_SESSION['login_success'] = true;
                }
                header('location:index.php');
            }                                                  
        }
        $result -> free_result();   
        //echo "login complete \r\n";
        $conn->close();
    }
?>
