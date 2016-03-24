<html>
    <body>
        <form action="" method="POST" >
            <input type="text" name="recepient" placeholder="ENTER RECEPIENT NUMBER" style="width:350px;margin-bottom: 10px"><br>
            <input type="text" name="message" placeholder="MESSAGE">
            <input type="submit" name="submit">
        </form>
    </body>
    
</html>
<?php
if (isset($_POST['submit']))
{
$recepient=$_POST['recepient'];
$messages=$_POST['message'];
echo $recepient;
    // Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your login credentials
    $username   = "aaacodeAlpha";
    $apikey     = "9e66e9dce126dfb8e03d1bd019f463a1e1b22550c2556047c99b16c5eafcdafb";
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
        echo " Number: " .$result->number;
        echo " Status: " .$result->status;
        echo " MessageId: " .$result->messageId;
        echo " Cost: "   .$result->cost."\n";
      }
    }
    catch ( AfricasTalkingGatewayException $e )
    {
      echo "Encountered an error while sending: ".$e->getMessage();
    }
    // DONE!!! 
}