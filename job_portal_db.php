<!doctype html>
<html>

<head>
    <title>job-portal-db</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/8fb929b2bc.js" crossorigin="anonymous"></script>
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    <link rel="stylesheet" type="text/css" href="css/alert.css">

</head>

<body>

    <?php 
    session_start();
    require "db_connect.php";
    if($db_connected == true)
    {         
        $insert_data=1;
        //form data
        
        $first_name = ucwords($conn -> real_escape_string($_POST['jobapplyfname']));
        $middle_name = ucwords($conn -> real_escape_string($_POST['jobapplymname']));
        $last_name = ucwords($conn -> real_escape_string($_POST['jobapplylname']));
        
        $gender = $conn -> real_escape_string($_POST['jobapplygender']);
        $dob = $conn -> real_escape_string($_POST['jobapplydob']);
        
        $email = $conn -> real_escape_string($_POST['jobapplyemail']);
        $email = strtolower($email); 
        $contact_no = $conn -> real_escape_string($_POST['jobapplycntctno']);
        
        $qualification = $conn -> real_escape_string($_POST['jobapplyqualification']);
        $stream = $conn -> real_escape_string($_POST['jobapplystream']);
        $percentage = $conn -> real_escape_string($_POST['jobapplypercentage']);
        
        $workdomain = $_POST['jobapplyworkdomain'];       
        $workdomain_arr ="";       
        foreach($workdomain as $index)
        {
            $workdomain_arr .= $index."; ";
        }
        
        $otherworkdomain = $conn -> real_escape_string($_POST['jobapplyotherworkdomain']);
        
        $first_pref_comp = $conn -> real_escape_string($_POST['jobapplycomp1']);
        $second_pref_comp = $conn -> real_escape_string($_POST['jobapplycomp2']);
        
        $linkedin_url = $conn -> real_escape_string($_POST['jobapplylinkedin_url']);
        
        $_SESSION['pdf_file'] = false;
        $_SESSION['large_file'] = false;
        $_SESSION['no_upload'] = false;
        $_SESSION['upload_error'] = false;
        $_SESSION['job_apply'] = false;
        
        //check if file is uploaded
        if(file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name']))
        {
            //if uploaded
            
            echo "file recieved";
            
            $target_dir = "/cc/upload/resume/";
            $uploadOk = 1;
            
            //rename file
            $time_stamp = date('YmdHis', time());
            $temp = explode(".", $_FILES["file"]["name"]);
           
            if($middle_name == null)
            {
                $resume_file = $first_name . '_' . $last_name.'_' . $time_stamp . '.' . end($temp);
            }
            else
            {
                $resume_file = $first_name .'_'. $middle_name . '_' . $last_name.'_' . $time_stamp . '.' . end($temp);
            }
                
            $target_file = $target_dir . $resume_file;    
                
            echo "target file:". $target_file;       
            $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
           
            // Allow pdf file formats
            if($fileType != 'pdf')
            {    
                echo "Sorry, only PDF files are allowed.";
                $_SESSION['pdf_file'] = true;
                header('location:job_portal.php'); 
                $uploadOk = 0;
            }
            
            // Check file size
            if ($_FILES["file"]["size"] > 2000000) 
            {   
                echo "Sorry, your file is too large.";
                $_SESSION['large_file'] = true;
                header('location:job_portal.php');             
                $uploadOk = 0;
            }
            
            if ($uploadOk == 1) 
            {
               //upload file 
               if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
               {
                    echo "The file ". $resume_file. " has been uploaded.";
                    $insert_data = 1;
               }
               else
               {
                   $insert_data = 0;
                   $_SESSION['upload_error'] = true;
                   header('location:job_portal.php');
                   echo "Error while uploading file ". $resume_file; 
               }
               
            }
        }
        else
        {
            //if not uploaded
            $insert_data = 0;
            $_SESSION['no_upload'] = true;
            header('location:job_portal.php'); 
        }
        
        if($insert_data == 1)
        {
            echo " getting last inserted record id"; 
            $sql = "SELECT max(job_id) as next_job_id FROM job_details";                          
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
            
            //insert data into database
            $sql = "INSERT INTO job_details values ('$job_id','$first_name','$middle_name','$last_name','$gender',
                                        '$dob','$contact_no','$email','$qualification','$stream','$percentage',
                                        '$workdomain_arr','$otherworkdomain','$first_pref_comp','$second_pref_comp','$resume_file',
                                        '$linkedin_url',now(),'N',null,'N',null,null,'{$_SESSION['user']}')";
            
            if ($conn->query($sql) == TRUE) 
            {
                echo "record inserted";
                $_SESSION['job_apply'] = true;
                header('location:index.php'); 
            } 
            else
            {
                echo "record insert failed";
            }           
        }        
        $conn->close(); 
    }
    ?>

</body>
</html>