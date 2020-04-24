<?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {
        $crejobtitle = $conn -> real_escape_string($_POST['crejobtitle']);
        $crejobtitle = ucfirst($crejobtitle);
        
        $crejobtype  = $conn -> real_escape_string($_POST['crejobtype']);
        $crejobempname  = ucfirst($conn -> real_escape_string($_POST['crejobempname']));
        $crejobemploc  = ucfirst($conn -> real_escape_string($_POST['crejobemploc']));
        $crejobminedu  = $conn -> real_escape_string($_POST['crejobminedu']);
        $crejoburl  = $conn -> real_escape_string($_POST['crejoburl']);
        $crejoblastdate  = $conn -> real_escape_string($_POST['crejoblastdate']);
        
                        
        //echo $title."<br>";
        //echo $body;
        //echo "inside create_job ";
        $_SESSION['job_create_success'] = false;
                
        $sql = "SELECT max(job_id) as next_job_id FROM job_update";                          
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $job_id = $row["next_job_id"];           
                }
            }
            else
            {
                $job_id = 0;
            }    
            $job_id = $job_id + 1;
            
          
            //echo "executing query";
            $sql = "INSERT INTO job_update
                    VALUES ('$job_id','$crejobtitle','$crejobtype','$crejobempname','$crejobemploc',
                            '$crejobminedu','$crejoburl','$crejoblastdate',now(),'{$_SESSION['user']}')"; 
            
            if ($conn->query($sql) == TRUE) 
            {
                //echo "query_success";
                $_SESSION['job_create_success'] = true;
                header('location:profile.php');
            }                             
        
        $result -> free_result();   
        //echo "job create complete \r\n";
        $conn->close();
    }
?>