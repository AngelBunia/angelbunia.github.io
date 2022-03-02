<?php
$name = $_POST['name'];
$email_address = $_POST['email_address'];
$phone_number = $_POST['phone_number'];
$quote = $_POST['quote'];

function filterInput($form_field) {
    return preg_replace('/[nr|!/<>^$%*&]+/','',$form_field);
}

$name = filterInput($name);
$email_address = filterInput($email_address);
$phone_number = filterInput($phone_number);
$quote = filterInput($quote);

$headers = "From: $email_address";
$sent = mail('info@tgbservices.co.uk', 'Quote', $quote, $headers);

if ($sent) {
    ?> <html>
         <div id="successful-form" class="container">
        <h1>Thank you for submitting your quote!</h1>
        <p>
          We will get back to you as soon as possible. If your quote is urgent
          contact us via the phone number above!
        </p>
      </div>
      </html>
      <?php
} else {
    ?> <html>
        
      <div id="failure-form" class="container">
        <h1>Something went wrong...</h1>
        <p>
          Please refresh the page and try again, if that won't work try
          contacting us via the phone number or email above!
        </p>
      </div>
      </html>
      <?php
}

?>