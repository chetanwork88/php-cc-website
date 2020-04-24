<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
               
        $workshop_id = $conn -> real_escape_string($_POST['workshop_id']);
        $workshop_sts = $conn -> real_escape_string($_POST['upd_ws_sts']);
        $workshop_new_date = $conn -> real_escape_string($_POST['upd_ws_new_date']);
        $workshop_taken_date = $conn -> real_escape_string($_POST['upd_ws_taken_date']);
        $conducted_by = ucwords($conn -> real_escape_string($_POST['upd_ws_taken_by']));
        
        $username = $_SESSION['user'];
        
        if(empty($workshop_taken_date))
        {
            $workshop_taken_date =null;
        }
        
        $_SESSION['workshop_updated'] = false;
        
        
        if(!empty($workshop_new_date))
        {
            $sql = "UPDATE workshop SET 
                            workshop_request_date = '$workshop_new_date',
                            status  = '$workshop_sts',
                            completed_by  = '$username',
                            sys_update_date = now() 
                            WHERE workshop_id = '$workshop_id'";
        }
        else
        {
            $sql = "UPDATE workshop SET 
                            workshop_taken_date = '$workshop_taken_date',
                            workshop_taken_by = '$conducted_by',
                            status  = '$workshop_sts',
                            completed_by  = '$username',
                            sys_update_date = now() 
                            WHERE workshop_id = '$workshop_id'";
        }
        
                        
        if ($conn->query($sql) == TRUE) 
        {
            //echo "query_success";
            $_SESSION['workshop_updated'] = true;           
            header('location:report_workshops.php');
        }
        else
        {
            //echo "query failed.";
        }
        
            
        //echo "signup_complete\r\n"; 
        $result -> free_result();          
        $conn->close();
    }
?>