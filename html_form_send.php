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
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
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
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
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
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
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
 <head>
  <title>Moe's Original BBQ:: Tahoe City</title>
  <meta charset="UTF-8">
  <link rel="icon" href="images/moeicon.ico">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
     <header id="blkbkgd">
    <label class="mobile_toggle" for="toggle">
      <div class="whiteline line"></div>
      <div class="whiteline line"></div>
      <div class="whiteline line"></div>
    </label>
    <input type="checkbox" id="toggle">
      
      <div class="container clearfix">
          <nav class="clearfix">
              <a id="nomobile" class="navlinks" href="menu.html">Menu</a>
              <div class="dropdown navlinks">
                 <button id="nomobile" class="dropbtn">Catering</button>
                 <div class="dropdown-content">
                  <a class="dcont" href="caterinquire.html">Cater Menu</a>
                  <a class="dcont" href="contactform.php">Inquiries</a>
                 </div> 
              </div>
        <div id="landlogo">
          <a id="nomobile" class="navlinks" href="index.html"><img src="images/moes-bbq-large-logo.png"></a>
        </div>
        <div class="dropdown navlinks">
                 <button id="nomobile" class="dropbtn">Music</button>
                 <div class="dropdown-content">
                  <a class="dcont" href="events.html">Upcoming Events</a>
<!--            <a class="dcont" href="lodging.html">Lodging</a> -->
                 </div> 
              </div>
              <a id="nomobile" class="navlinks" href="contact.html">Contact US</a>  

        <a class="nodesk navlinks" href="index.html">Home</a>
        <a class="nodesk navlinks" href="menu.html">Menu</a>
        <a class="nodesk navlinks" href="events.html">Upcoming Events</a>
<!--        <a class="nodesk navlinks" href="lodging.html">Event Lodging</a> -->
<!--        <a class="nodesk navlinks" href="caterfaq.html">Catering FAQs</a> -->
        <a class="nodesk navlinks" href="caterinquire.html">Catering Inquiries</a>
        <a class="nodesk navlinks" href="contact.html">Contact Us</a>
          </nav>
      </div>
  </header>
<h1 id="thks">Thank you for contacting us. We will be in touch with you very soon-  Moe's BBQ</h1>
  <footer>
    <div id="socmed">
      <a target="_blank" href="https://www.facebook.com/moesoriginalbbqtahoe/?fref=ts"><img class="socpad" src="images/facebook.png"></a>
      <a target="_blank" href="https://www.instagram.com/moesoriginalbbqtahoecity/?hl=en"><img class="socpad" src="images/intagram.png"></a>
    </div>
    <div id="hours">
      <h4>Hours:</h4>
      <h4>Monday-Friday 12pm-8pm</h4>
      <h4>Saturday-Sunday 11am-9pm</h4>
      <h4>Bar open till midnight Thursday-Saturday</h4>
    </div>
    <div id="footer_copyright" class="clearfix">
      <p class="clearfix fwords">&copy; Moe's BBQ 2017</p>
      <a target="_blank" id="acwords" class="clearfix fwords" href="http://alpencreative.com/"><p class="fwords"> Website Created by<img id="aclogo" src="images/AlpenCreativeGeoLogo_Color_v2 copy 2.svg"> AlpenCreative</a></p>
    </div>
  </footer> 
<?php
}
die();
?>