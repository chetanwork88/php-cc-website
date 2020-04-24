<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
        $first_name = ucwords($conn -> real_escape_string($_POST['servicefname']));
        $last_name = ucwords($conn -> real_escape_string($_POST['servicelname']));
        $contact_no = $conn -> real_escape_string($_POST['servicectnctno']);
        $email = $conn -> real_escape_string($_POST['serviceemail']);
        $email = strtolower($email);  
        $service_type = $conn -> real_escape_string($_POST['serviceenquirytype']);
        $service = ucfirst($conn -> real_escape_string($_POST['servicequery']));    

        $_SESSION['service_apply'] = false;
                          
        //fetchong last id inserted into table
        $sql = "SELECT max(service_id) as next_service_id FROM service";                          
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                $service_id = $row["next_service_id"];           
            }
        }
        else
        {
            $service_id = 0;
        }    
        $service_id = $service_id + 1;   
                   
        $sql = "INSERT INTO service
                VALUES ('$service_id','$first_name','$last_name','$contact_no','$email',
                        '$service_type','$service',now(),null,'N',null,'{$_SESSION['user']}',null)";
                        
        if ($conn->query($sql) == TRUE) 
        {
            $_SESSION['service_apply'] = true;
            //echo "query suceess";
            header('location:services.php');
        }
        //  else{
        //      echo "query failed";
        //  }       
        //echo "signup_complete\r\n"; 
        $result -> free_result();          
        $conn->close();
    }
?>