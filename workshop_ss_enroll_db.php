<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {        
        $first_name = ucwords($conn -> real_escape_string($_POST['ssfname']));
        $last_name = ucwords($conn -> real_escape_string($_POST['sslname']));
        $contact_no = $conn -> real_escape_string($_POST['ssctnctno']);
        $email = $conn -> real_escape_string($_POST['ssemail']);
        $email = strtolower($email);
        
        $org_name = ucwords($conn -> real_escape_string($_POST['ssorgname']));
        $org_address = ucwords($conn -> real_escape_string($_POST['ssorgadd']));
        $workshop_date = $conn -> real_escape_string($_POST['ssworkshopdate']);
        $workshop_comment = $conn -> real_escape_string($_POST['sscomment']);
             
             
        $_SESSION['workshop_enroll_success'] = false;
     
        //echo $username."\r\n";
        //echo $pass."\r\n";
        //echo $first_name."\r\n";
        //echo $last_name."\r\n";
        //echo $contact_no."\r\n";
        //echo $email."\r\n";
        //fetchong last id inserted into table
        $sql = "SELECT max(workshop_id) as next_workshop_id FROM workshop";                          
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                $workshop_id = $row["next_workshop_id"];           
            }
        }
        else
        {
            $workshop_id = 0;
        }    
        $workshop_id = $workshop_id + 1;
        
        $sql = "INSERT INTO workshop
                VALUES ('$workshop_id','Soft Skills','$first_name','$last_name','$contact_no','$email','$org_name','$org_address',
                        null,null,'$workshop_date','$workshop_comment',null,null,now(),'N',null,'{$_SESSION['user']}',null)";
                        
        if ($conn->query($sql) == TRUE) 
        {
            //echo "query_success";
            $_SESSION['workshop_enroll_success'] = true;
            header('location:workshops.php');
        }
    
            
        //echo "signup_complete\r\n"; 
        $result -> free_result();          
        $conn->close();
    }
?>