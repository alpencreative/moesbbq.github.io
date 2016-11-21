<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "abigail@moesoriginalbbq.com";
     
    $email_subject = "contact from website";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['venue_name']) ||
        !isset($_POST['street_address']) ||
        !isset($_POST['city_name']) ||
        !isset($_POST['state_name']) ||
        !isset($_POST['zip_code']) ||
        !isset($_POST['date(format)']) ||
        !isset($_POST['time(oid)']) ||
        !isset($_POST['number']) ||
        !isset($_POST['budget']) ||
        !isset($_POST['service_name']) ||
        !isset($_POST['event_type']) ||
        !isset($_POST['organization_name']) ||
        !isset($_POST['contact_preference']) ||        

        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $venue_name = $_POST['venue_name']; // not required
    $email_from = $_POST['street_address']; // required
    $email_from = $_POST['city_name']; // required    
    $email_from = $_POST['state_name']; // required    
    $email_from = $_POST['zip_code']; // required    
    $email_from = $_POST['date(format)']; // required    
    $email_from = $_POST['time(oid)']; // not required    
    $email_from = $_POST['number']; // not required  
    $email_from = $_POST['budget']; // not required  
    $email_from = $_POST['service_name']; // not required  
    $email_from = $_POST['event_type']; // not required  
    $email_from = $_POST['organization_name']; // not required  
    $email_from = $_POST['contact_preference']; // required  



    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$Venue_name)) {
    $error_message .= 'The Venue Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Venue Name: ".clean_string($venue_name)."\n";
    $email_message .= "Street Address: ".clean_string($street_address)."\n";    
    $email_message .= "City: ".clean_string($city_name)."\n";     
    $email_message .= "State/Province: ".clean_string($state_name)."\n";         
    $email_message .= "Zip Code: ".clean_string($zip_code)."\n";         
    $email_message .= "Date: ".clean_string($date)."\n";         
    $email_message .= "Time: ".clean_string($time)."\n";         
    $email_message .= "Number of Attendees: ".clean_string($number)."\n"; 
    $email_message .= "Budget: ".clean_string($budget)."\n";         
    $email_message .= "Level of Service: ".clean_string($service_name)."\n";         
    $email_message .= "Type of Event: ".clean_string($event_type)."\n";         
    $email_message .= "Organization: ".clean_string($organization_name)."\n";         
    $email_message .= "I Prefer Contact By: ".clean_string($contact_preference)."\n";                            
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->
 
Thank you for contacting us. We will be in touch with you very soon-  Moe's BBQ Tahoe City
 
<?php
}
die();
?>