<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {        
        $first_name = ucwords($conn -> real_escape_string($_POST['cgtwelvefname']));
        $last_name = ucwords($conn -> real_escape_string($_POST['cgtwelvelname']));
        $contact_no = $conn -> real_escape_string($_POST['cgtwelvectnctno']);
        $email = $conn -> real_escape_string($_POST['cgtwelveemail']);
        $email = strtolower($email);
        
        $org_name = ucwords($conn -> real_escape_string($_POST['cgtwelveorgname']));
        $org_address = ucwords($conn -> real_escape_string($_POST['cgtwelveorgadd']));
        $workshop_date = $conn -> real_escape_string($_POST['cgtwelveworkshopdate']);
        
        $interest_domain = $_POST['interest_domain_twe'];       
        $interest_domain_arr ="";       
        foreach($interest_domain as $index)
        {
            $interest_domain_arr .= $index."; ";
        }
        
        $other_interest = ucwords($conn -> real_escape_string($_POST['cgtwelveotherinterest']));
        $workshop_comment = $conn -> real_escape_string($_POST['cgtwelvecomment']);
        
        
             
        $_SESSION['workshop_enroll_success'] = false;
     
        
        //fetching last id inserted into table
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
        
        // echo "id:".$workshop_id;
        // echo "  first_name:".$first_name;
        // echo "  last_name:".$last_name;
        // echo "  contact_no:".$contact_no;
        // echo "  email:".$email;
        // echo "  org_name:".$org_name;
        // echo "  org_address:".$org_address;
        // echo "  interest_domain:".$interest_domain_arr;
        // echo "  other:".$other_interest;
        // echo "  date:".$workshop_date;
        // echo "  comment:".$workshop_comment;
        
        $sql = "INSERT INTO workshop 
                VALUES ('$workshop_id','Class 12','$first_name','$last_name','$contact_no','$email',
                        '$org_name','$org_address','$interest_domain_arr','$other_interest','$workshop_date',
                        '$workshop_comment',null,null,now(),'N',null,'{$_SESSION['user']}',null)"; 
        
                        
        if ($conn->query($sql) == TRUE) 
        {
            //echo "query_success";
            $_SESSION['workshop_enroll_success'] = true;
            header('location:workshops.php');
        }
        else{
            echo "failed";
        }
       
            
        //echo "signup_complete\r\n"; 
        $result -> free_result();          
        $conn->close();
    }
?>