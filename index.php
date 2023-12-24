<!DOCTYPE html>

<?php
include_once 'config.php';

?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1">
        <title>Remote Notification By Clicks and Bits</title>
        <style>
            body{
                background-color: black;
                color: #99ff33;
                font-family: 'Courier New', monospace;
            }
        </style>
    </head>
    <body>
        <div style="width: 100%;padding: 10px;align-content: center">
            
            <div style="width:1000px; margin-left: auto;margin-right: auto">
                <table>
                    <tr>
                        <td><h2>Remote Notification</h2></td>
                        <td>
                            <pre>
by
   _______        _____ _______ _     _ _______      _______ __   _ ______       ______  _____ _______ _______
   |       |        |   |       |____/  |______      |_____| | \  | |     \      |_____]   |      |    |______
   |_____  |_____ __|__ |_____  |    \_ ______|      |     | |  \_| |_____/      |_____] __|__    |    ______|
                                                                                                              

                            </pre>
                        </td>
                    </tr>
                </table>
                
                <?php
                //Checking for received / saved notifications
                $selq = "select * from notifications_data where status='A' order by when_time";
                $sq = mysqli_query($conn,$selq);
                if(mysqli_num_rows($sq)<1)
                {
                    //No saved notifications found
                    ?>
                <br><br><br>
                <center>
                    <p style="font-size:100px">&#128542;</p>
                    <h3>No one is sharing <b>Notifications</b></h3>
                </center>
                
                <?php
                }
                else{
                    //Saved Notification found
                    ?>
                
                <table border="1" cellapcing="0" cellpadding="5" style="border-color: #99ff33">
                    <tr>
                        <th>#</th>
                        <th>Notification Time</th>
                        <th>Package</th>
                        <th>Notification</th>
                    </tr>
                    
                    <?php
                    $c=0;
                    while($i = mysqli_fetch_assoc($sq))
                    {//Printing saved notifivcations in table array
                        $c=$c+1;
                        echo "<tr><td>".$c."</td><td>".$i['when_time']."</td><td>".$i['packageName']."</td><td><b>".$i['title']."</b><br>".$i['content']."</td></tr>";
                    }
                    
                    ?>
                </table>
                
                <?php
                }
                
                ?>
                
            </div>
            
        </div>
        
        <?php
        
        ?>
    </body>
</html>
