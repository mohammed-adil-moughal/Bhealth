    <?php
    session_start();
    
    
      require_once('AfricasTalkingGateway.php');
      
   
    // Reads the variables sent via POST from our gateway
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];
    
    if ( $text == "" ) {
         // This is the first request. Note how we start the response with CON
        $response  ="CON welcome to B-Health Sevices Kindly Choose a Language\n";
         $response .= "1. English \n";
         $response .= "2. Kiswahili\n";
       
    }
    else if ( $text == "1" ) {
      // Business logic for first level response
      $response  ="CON Select an Option\n";
         $response .= "1. Subscribe\n";
         $response .= "2. unSubscribe\n";
       
    }
   
  else if ( $text == "2" ) {
      // Business logic for first level response
      $response  ="CON Chagua Huduma\n";
         $response .= "1. Sajili\n";
         $response .= "2. Kutojisajili\n";
       
    }
     else if ( $text == "1*1" ) {
      // Business logic for first level response
      $response  ="CON Choose  A  Service\n";
         $response .= "1. Vacination Tracking\n";
         $response .= "2. Baby Growth Tracking\n";
         $response .= "3. Baby Nutrition\n";
         $response .= "4. Pre Natal Care\n";
       
    }
     else if ( $text == "1*2" ) {
      // Business logic for first level response
      $response  ="CON Choose  A  Service to Unsubscribe From\n";
         $response .= "1. Vacination Tracking\n";
         $response .= "2. Baby Growth Tracking\n";
         $response .= "3. Baby Nutrition\n";
         $response .= "4. Pre Natal Care\n";
       
    }
   
     else if ( $text == "2*1" ) {
      // Business logic for first level response
         $response  ="CON Chagua Huduma Lako\n";
         $response .= "1. Ratiba la chanjo\n";
         $response .= "2. Fuatilia Kukua Kwa mtoto\n";
         $response .= "3. Jinsi Ya Ulishi\n";
         $response .= "4. Huduma Kabla Ya Uzazi";
       
    }
      else if ( $text == "1*2*1" )
       {
      // Business logic for first level response
      $response  .="CON Try Again Later  \n";
         
      $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
       $result=$link->query($sql1);
               if(  $result>0 )
               {
               $sqlupd="UPDATE regist SET vacination=0 WHERE phonenumber=$phoneNumber;";
               
               $result1=$link->query($sqlupd);
             
                if($result>0)
               {
               $response  ="END You have successfuly Unsubscribed \n";
                //sendmesso($phoneNumber,"You have successfully subscribed For Vaccination Tracking ");
               }
               
               }
               
     
      
       
         
      
       
    } 
    else if ( $text == "1*2*2" )
       {
      // Business logic for first level response
      $response  .="CON Try Again Later  \n";
         
      $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
       $result=$link->query($sql1);
               if(  $result>0 )
               {
               $sqlupd="UPDATE regist SET growth=0 WHERE phonenumber=$phoneNumber;";
               
               $result1=$link->query($sqlupd);
             
                if($result>0)
               {
               $response  ="END You have successfuly Unsubscribed \n";
                //sendmesso($phoneNumber,"You have successfully subscribed For Vaccination Tracking ");
               }
               
               }
               
     
     } 
     else if ( $text == "1*2*3" )
       {
      // Business logic for first level response
      $response  .="CON Try Again Later  \n";
         
      $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
       $result=$link->query($sql1);
               if(  $result>0 )
               {
               $sqlupd="UPDATE regist SET nutrition=0 WHERE phonenumber=$phoneNumber;";
               
               $result1=$link->query($sqlupd);
             
                if($result>0)
               {
               $response  ="END You have successfuly Unsubscribed \n";
                //sendmesso($phoneNumber,"You have successfully subscribed For Vaccination Tracking ");
               }
               
               }
               
     
      
       
         
      
       
    } 
      else if ( $text == "1*2*4" )
       {
      // Business logic for first level response
      $response  .="CON Try Again Later  \n";
         
      $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
       $result=$link->query($sql1);
               if(  $result>0 )
               {
               $sqlupd="UPDATE regist SET prenatal=0 WHERE phonenumber=$phoneNumber;";
               
               $result1=$link->query($sqlupd);
             
                if($result>0)
               {
               $response  ="END You have successfuly Unsubscribed \n";
                //sendmesso($phoneNumber,"You have successfully subscribed For Vaccination Tracking ");
               }
               
               }
               
     
      
       
         
      
       
    } 
      else if ( $text == "1*1*1" )
       {
      // Business logic for first level response
      $response  .="CON Try Again Later  \n";
         
      $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
       $result=$link->query($sql1);
               if(  $result>0 )
               {
               $sqlupd="UPDATE regist SET vacination=1 WHERE phonenumber=$phoneNumber;";
               
               $result1=$link->query($sqlupd);
             
                if($result>0)
               {
               $response  ="END Thank you For subscribing to our service  \n";
                sendmesso($phoneNumber,"You have successfully subscribed For Vaccination Tracking ");
               }
               
               }
               
     
      $sql="INSERT INTO regist(phonenumber,vacination,growth,nutrition,prenatal) VALUES($phoneNumber,1,0,0,0)";
            if(mysqli_query($link, $sql))
            {  
               $response .=" END Thank You For Subscribing With B-health";
                sendmesso($phoneNumber,"You have successfully subscribed For Vaccination Tracking ");
            }
       
         
      
       
    } 
    else if ( $text == "1*1*2" ) {
      // Business logic for first level response
      $response  .=" Try Again Later  \n";
      //   $birthday=$text;
      $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

           $sql1="select * from regist where phonenumber='$phoneNumber'";
               if(  $result=$link->query($sql1))
               {
               $sqlupd="UPDATE regist SET growth=1 WHERE phonenumber=$phoneNumber;";
               if(mysqli_query($link,$sqlupd))
               {
               $response  ="END Thank you For subscribing to our service  \n";
               sendmesso($phoneNumber,"You have successfully subscribed For child Growth Tracking ");
               }
               
               }
     
      $sql="INSERT INTO regist(phonenumber,vacination,growth,nutrition,prenatal) VALUES($phoneNumber,0,1,0,0)";
            if(mysqli_query($link, $sql))
            {  
               $response  ="END Thank you For subscribing to our service  \n";
                sendmesso($phoneNumber,"You have successfully subscribed For child Growth Tracking ");
            }
       
         
   
         
         }
          
         else if ( $text == "1*1*3" ) {
      // Business logic for first level response
    
   
  
     $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
               if(  $result=$link->query($sql1))
               {
               $sqlupd="UPDATE regist SET nutrition=1 WHERE phonenumber=$phoneNumber;";
              if( mysqli_query($link,$sqlupd))
              
              {
                $response  ="END Thank you For subscribing to our service  \n";
                  sendmesso($phoneNumber,"You have successfully subscribed For Nutritional TIps");
              }
               
               }
     
      $sql="INSERT INTO regist(phonenumber,vacination,growth,nutrition,prenatal) VALUES($phoneNumber,0,0,1,0)";
            if(mysqli_query($link, $sql))
            {  
             $response  ="END Thank you For subscribing to our service  \n";
             sendmesso($phoneNumber,"You have successfully subscribed For Nutritional TIps");
            }
       
         
      
         
         }
         else if ( $text == "1*1*4" ) {
      // Business logic for first level response
      $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
               if(  $result=$link->query($sql1))
               {
               $sqlupd="UPDATE regist SET prenatal=1 WHERE phonenumber=$phoneNumber;";
              if( mysqli_query($link,$sqlupd))
              
              {
                $response  ="END Thank you For subscribing to our service  \n";
                sendmesso($phoneNumber,"You have successfully subscribed For Our PreNatal Package");
              }
               
               }
     
      $sql="INSERT INTO regist(phonenumber,vacination,growth,nutrition,prenatal) VALUES($phoneNumber,0,0,0,1)";
            if(mysqli_query($link, $sql))
            {  
             $response  ="END Thank you For subscribing to our service  \n";
             sendmesso($phoneNumber,"You have successfully subscribed For Our PreNatal Package");
            }
       
         
         
         }
       else if ( $text == "2*1*1" ) {
      // Business logic for first level response
       $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
               if(  $result=$link->query($sql1))
               {
               $sqlupd="UPDATE regist SET vacination=1 WHERE phonenumber=$phoneNumber;";
              if( mysqli_query($link,$sqlupd))
              
              {
                $response  ="END asanti kwa kutumia huduma Wetu  \n";
                sendmesso($phoneNumber,"Tume kusajili kwa Huduma Wetu Wa Ratiba wa Chanjo");
              }
               
               }
     
      $sql="INSERT INTO regist(phonenumber,vacination,growth,nutrition,prenatal) VALUES($phoneNumber,1,0,0,0)";
            if(mysqli_query($link, $sql))
            {  
             $response  =" END asanti kwa kutumia huduma Wetu  \n";
             sendmesso($phoneNumber,"Tume kusajili kwa Huduma Wetu Wa Ratiba wa Chanjo");
            }
       
         
    }
    else if ( $text == "2*1*2" ) {
      // Business logic for first level response
        $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
               if(  $result=$link->query($sql1))
               {
               $sqlupd="UPDATE regist SET growth=1 WHERE phonenumber=$phoneNumber;";
              if( mysqli_query($link,$sqlupd))
              
              {
                $response  ="END asanti kwa kutumia huduma Wetu  \n";
                sendmesso($phoneNumber,"Tume kusajili kwa Huduma wa kufuatilia Kukuwa kwa mtoto");
              }
               
               }
    
      $sql="INSERT INTO regist(phonenumber,vacination,growth,nutrition,prenatal) VALUES($phoneNumber,0,1,0,0)";
            if(mysqli_query($link, $sql))
            {  
             $response  =" END asanti kwa kutumia huduma Wetu  \n";
             sendmesso($phoneNumber,"Tume kusajili kwa Huduma wa kufuatilia Kukuwa kwa mtoto");
            }
       
         
         
         }
         else if ( $text == "2*1*3" ) {
      // Business logic for first level response
        $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
               if(  $result=$link->query($sql1))
               {
               $sqlupd="UPDATE regist SET nutrition=1 WHERE phonenumber=$phoneNumber;";
              if( mysqli_query($link,$sqlupd))
              
              {
                $response  ="END asanti kwa kutumia huduma Wetu  \n";
                sendmesso($phoneNumber,"Tume kusajili kwa Huduma wa Jisi YA Ulishi");
              }
               
               }
    
      $sql="INSERT INTO regist(phonenumber,vacination,growth,nutrition,prenatal) VALUES($phoneNumber,0,0,1,0)";
            if(mysqli_query($link, $sql))
            {  
             $response  =" END asanti kwa kutumia huduma Wetu  \n";
              sendmesso($phoneNumber,"Tume kusajili kwa Huduma wa Jisi YA Ulishi");
            }
       
         
         }
         else if ( $text == "2*1*4" )
             {
      // Business logic for first level response
        $link=  mysqli_connect("localhost", "voraneco_paul", "30111995", "voraneco_adil");

         
   $sql1="select * from regist where phonenumber='$phoneNumber'";
               if(  $result=$link->query($sql1))
               {
               $sqlupd="UPDATE regist SET prenatal=1 WHERE phonenumber=$phoneNumber;";
              if( mysqli_query($link,$sqlupd))
              
              {
                $response  ="END asanti kwa kutumia huduma Wetu  \n";
                 sendmesso($phoneNumber,"Tume kusajili kwa Huduma wa Kabla YA uzazi");
              }
               
               }
     
      $sql="INSERT INTO regist(phonenumber,vacination,growth,nutrition,prenatal) VALUES($phoneNumber,0,0,0,1)";
            if(mysqli_query($link, $sql))
            {  
             $response  =" END asanti kwa kutumia huduma Wetu  \n";
              sendmesso($phoneNumber,"Tume kusajili kwa Huduma wa Kabla YA uzazi");
            }
      
         
         
         }


   
        
      
  
      
     
     
    // Print the response onto the page so that our gateway can read it
    header('Content-type: text/plain');
    echo $response;
    // DONE!!!
      session_destroy();
    end();
    
    
    
    ?>
    <?php
    function sendmesso($recepient,$messages)
    {
    

    // Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your login credentials
    $username   = "muneneevans";
    $apikey     = "3d3d9e356d8d1abeee2005d563918bf0941a73151449b799c8c1cb37dfd8d01f";
    // Specify the numbers that you want to send to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)
    $recipients = $recepient;
    // And of course we want our recipients to know what we really do
    $message    = $messages;
    // Create a new instance of our awesome gateway class
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    // Any gateway error will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block
    try 
    { 
      // Thats it, hit send and we'll take care of the rest. 
      $results = $gateway->sendMessage($recipients, $message);
                
      foreach($results as $result) {
        // status is either "Success" or "error message"
       // echo " Number: " .$result->number;
        //echo " Status: " .$result->status;
        //echo " MessageId: " .$result->messageId;
       // echo " Cost: "   .$result->cost."\n";
      }
    }
    catch ( AfricasTalkingGatewayException $e )
    {
     // echo "Encountered an error while sending: ".$e->getMessage();
    }
    }
    ?>


