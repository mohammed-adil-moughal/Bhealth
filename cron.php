<?php

      $sql="INSERT INTO regist(phonenumber,vacination,growth,nutrition,prenatal) VALUES(1,1,0,0,0)";
            if(mysqli_query($link, $sql))
            {  
               $response .=" END Thank You For Subscribing With B-health";
            }
       ?>