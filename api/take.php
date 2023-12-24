<?php
include_once '../config.php'; //include Database configuration File
$Jdata= file_get_contents('php://input'); //Reading data sent from the script
$data = json_decode($Jdata,true); //Converting received JSON data to Array
//echo $data;
if($data!== null) //Checking Data is valied or not
{
    foreach($data as $i) //itterating through each array item
    {
        
        //checking existing notifications
        $qs = "select * from notifications_data where packageName='".$i['packageName']."' and title='".$i['title']."' and  content ='".$i['content']."' and when_time = '".$i['when']."'";
        
        $ck = mysqli_query($conn,$qs);
        if(mysqli_num_rows($ck)<1) //checcking for matching notification(s)
        {
            //No matching notification found. Saving the current notification to MySQL database
            $qs = "INSERT INTO `notifications_data`(`notification_id`, `packageName`, `title`, `content`, `when_time`, `status`) VALUES('".$i['id']."','"
            .$i['packageName']."','"
            .$i['title']."','"
            .$i['content']."','"
            .$i['when']."',"
            ."'A')";
            $qe = mysqli_query($conn, $qs);
            if($qe)
            {
                echo "saved"; 
            }else{
                echo "failed";
            }
                }       
    }
    
}
 else {
echo "noData";    
}
