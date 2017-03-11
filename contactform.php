<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/simple-php-contact-form.html
*/
require_once("./include/fgcontactform.php");

$formproc = new FGContactForm();


//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('abigail@moesoriginalbbq.com'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('CnRrspl1FyEylUj');


if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thank-you.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <title>Moe's Original BBQ:: Tahoe City</title>
    <link rel="icon" href="images/moeicon.ico">
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <link rel="STYLESHEET" type="text/css" href="css/contact.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <script type="text/javascript" src="calendar.js"></script>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="view.js"></script>
    <script type="text/javascript" src="calendar.js"></script>
</head>
<body id="menupg">
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
  <div>
    <h1 id="orderform">Order Form</h1>
  </div>
  <div>
    <div id="catercontact">
    <p>To place orders or for inquiries please call 530-583-4227 or use the form below.<!-- email <a href="mailto:abigail@moesoriginalbbq.com" target="_top" id="emaillink">abigail@moesoriginalbbq.com</a> --></p>   
      <div class="wrapper">
        <section>
          <!-- Form Code Start -->
          <form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
          <fieldset >
          
          <input type='hidden' name='submitted' id='submitted' value='1'/>
          <input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
          <input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />
          
          <p class='short_explanation'>* required fields</p>
          
          <div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
          <div class='container'>
              <label for='name' >Your Full Name*: </label><br/>
              <div class="rifld">
                  <input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>
                  <span id='contactus_name_errorloc' class='error'></span>
              </div>  
          </div>
          <div class='container'>
              <label for='email' >Email Address*:</label><br/>
              <div class="rifld">
                  <input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
                  <span id='contactus_email_errorloc' class='error'></span>
              </div>
          </div>
          <div class='container'>
              <label for='phone' >Phone Number*:</label><br/>
               <div class="rifld">
                  <input type='text' name='phone' id='phone' value='<?php echo $formproc->SafeDisplay('phone') ?>' maxlength="15" /><br/>
                  <span id='contactus_phone_errorloc' class='error'></span>
              </div>  
          </div>
          <div class='container'>
              <label for='venu' >Venue Name*:</label><br/>
              <div class="rifld">
                  <input type='text' name='venue' id='venue' value='<?php echo $formproc->SafeDisplay('venue') ?>' maxlength="15" /><br/>
                  <span id='contactus_phone_errorloc' class='error'></span>
              </div>    
          </div>
          <div class='clearfix container'>
              <label class="description" for="address" class="noven">Venue Address</label>
              <div class="rifld smlrtxt">
                <div>
                  <label for="street_address" class="yesven">Street Address</label>
                  <input type='text' name='street_address' id='street_address' value='<?php echo $formproc->SafeDisplay('street_address') ?>' maxlength="15" /><br/>
                  <label for="street_address" class="noven">Street Address</label>
                </div>
                <div>
                  <label for="street_address2" class="yesven">Address Line 2</label>
                  <input type='text' name='street_address2' id='street_address2' value='<?php echo $formproc->SafeDisplay('street_address2') ?>' maxlength="15" /><br/>
                  <label for="street_address2" class="noven">Address Line 2</label>
                </div>
              
                <div class="left">
                  <label for="city" class="yesven">City</label>
                  <input type='text' name='city' id='city' value='<?php echo $formproc->SafeDisplay('city') ?>' maxlength="15" /><br/>
                  <label for="city" class="noven">City</label>
                </div>
              
                <div class="right">
                  <label for="state" class="yesven">State / Province / Region</label>
                  <input type='text' name='state' id='state' value='<?php echo $formproc->SafeDisplay('state') ?>' maxlength="15" /><br/>
                  <label for="state" class="noven">State / Province / Region</label>
                </div>
              
                <div class="left">
                  <label for="zip" class="yesven">Postal / Zip Code</label>
                  <input type='text' name='zip' id='zip' value='<?php echo $formproc->SafeDisplay('zip') ?>' maxlength="15" /><br/>
                  <label for="zip" class="noven">Postal / Zip Code</label>
                </div>
              </div>
          </div> 
          <div class='container'>
              <label class="description" for="date">Date of Event </label>
              <div class="rifld shf">
                <span class="shspan">
                  <input type='text' name='year' id='year' value='<?php echo $formproc->SafeDisplay('year') ?>' maxlength="15" /><br/> /
                  <label for="year">YYYY</label>
                </span>
                <span class="shspan">
                  <input type='text' name='day' id='day' value='<?php echo $formproc->SafeDisplay('day') ?>' maxlength="15" /><br/> /
                  <label for="day">DD</label>
                </span>
                <span class="shspan">
                  <input type='text' name='month' id='month' value='<?php echo $formproc->SafeDisplay('month') ?>' maxlength="15" /><br/> 
                  <label for="month">MM</label>
                </span>
               </div>
          </div> 
          <div class='container'>
              <label class="description" for="time">Time of Event </label>
              <div class="rifld shf">
                <span class="shspan">
                  <select class="element select" style="width:4em" id="am_pm" name="am_pm" value='<?php echo $formproc->SafeDisplay('am_pm') ?>'><br/>
                    <option value="AM" >AM</option>
                    <option value="PM" >PM</option>
                  </select>
                  <label>AM/PM</label>
                </span> 
                <span class="shspan">
                  <input type='text' name='time_minute' id='time_minute' value='<?php echo $formproc->SafeDisplay('time_minute') ?>' maxlength="15" /><br/> : 
                  <label>MM</label>
                </span>
                <span class="shspan">
                  <input type='text' name='time_hour' id='time_hour' value='<?php echo $formproc->SafeDisplay('time_hour') ?>' maxlength="15" /><br/> 
                  <label>HH</label>
                </span>
              </div>
            </div>
          <div class='container'>
              <label for='number_guests' >Number in Party*:</label><br/>
              <div class="rifld">
                  <input type='text' name='number_guests' id='number_guests' value='<?php echo $formproc->SafeDisplay('number_guests') ?>' maxlength="15" /><br/>
                  <span id='contactus_phone_errorloc' class='error'></span>
              </div>
          </div>
          <div class='container'>
              <label for='budget' >Budget ($ per person)*:</label><br/>
              <div class="rifld">
                  <input type='text' name='budget' id='budget' value='<?php echo $formproc->SafeDisplay('budget') ?>' maxlength="15" /><br/>
                  <span id='contactus_phone_errorloc' class='error'></span>
              </div>
          </div>
          <div class='container'>
              <label class="description" for="service_level">Level of Service </label>
              <div class="rifld">
                <div>
                  <select class="element select medium" id="service_level" name="service_level" value='<?php echo $formproc->SafeDisplay('service_level') ?>'> 
                    <option value="" selected="selected"></option>
                    <option value="1" >------------------------------------<div class="shlines">------------------------------------</div></option>
                    <option value="2" >Pickup</option>
                    <option value="3" >Delivery</option>
                    <option value="4" >Full Service</option>
                    <option value="5" >Uncertain</option> 
                  </select>
                </div> 
              </div>  
          </div> 
          <div class='container'>
              <label class="description" for="event_type">Type of Event </label>
              <div class="rifld">
                <div>
                  <select class="element select medium" id="event_type" name="event_type" value='<?php echo $formproc->SafeDisplay('event_type') ?>'>
                    <option value="" selected="selected"></option>
                    <option value="1" >------------------------------------<div class="shlines">------------------------------------</div></option>
                    <option value="2" >Corporate</option>
                    <option value="3" >Groom's Dinner/Wedding</option>
                    <option value="4" >Graduation</option>
                    <option value="5" >Home</option>
                    <option value="6" >Other</option>
                  </select>
                </div> 
              </div>  
          </div>   
          <div class='container'>
              <label for='message' >Comments:</label><br/>
              <div class="rifld">
                  <span id='contactus_message_errorloc' class='error'></span>
                  <textarea rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
              </div>
          </div>
          <div class='container'>
              <label for='organization' >Organization:</label><br/>
              <div class="rifld">
                  <input type='text' name='organization' id='organization' value='<?php echo $formproc->SafeDisplay('organization') ?>' maxlength="15" /><br/>
                  <span id='contactus_phone_errorloc' class='error'></span>
              </div>
          </div>
          <div class='container'>
            <label class="description" for="contact_preference">I Prefer Contact By: </label>
            <div class="rifld">
              <div>
                  <select class="element select medium" id="contact_preference" name="contact_preference" value='<?php echo $formproc->SafeDisplay('contact_preference') ?>'>
                  <option value="" selected="selected"></option>
                  <option value="1" >------------------------------------<div class="shlines">------------------------------------</div></option>
                  <option value="2" >Phone</option>
                  <option value="3" >Email</option>
                </select>
              </div> 
            </div>
          </div>
          <div class='container subbut'>
              <input type='submit' name='Submit' value='Submit' />
          </div>
          
          </fieldset>
          </form>

        </section>  
      </div>
    </div>
  </div>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");

    frmvalidator.addValidation("phone","req","Please provide your phone number");

// ]]>
</script>
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

</body>
</html>