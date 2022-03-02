<?php
$name = $_POST['name'];
$email_address = $_POST['email_address'];
$phone_number = $_POST['phone_number'];
$quote = $_POST['quote'];

$email_from = 'contact@tgbservices.co.uk';
$email_subject = "Quote Request";

$email_body = "You have received a new message from the user $name\n. Here is the message:\n $quote.";

$to = "contact@tgbservices.co.uk";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email_address\r\n";

mail($to, $email_subject, $email_body, $headers);

function isInjected($str)
{
    $injections = array ('(\n+)',
    '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );

           $inject = join('|', $injections);
           $inject = "/$inject/i";

           if(preg_match($inject, $str)) {
               return true;
           } else {
               return false;
           }
}

if(isInjected($name)) {
    echo "Bad name value!";
    exit;
}

if(isInjected($email_address)) {
    echo "Bad email value!";
    exit;
}

if(isInjected($phone_number)) {
    echo "Bad phone number value!";
    exit;
}

if(isInjected($quote)) {
    echo "Bad messa value!";
    exit;
}

/* function filterInput($form_field) {
    return preg_replace('/[nr|!/<>^$%*&]+/','',$form_field);
}

$name = filterInput($name);
$email_address = filterInput($email_address);
$phone_number = filterInput($phone_number);
$quote = filterInput($quote);

$headers = "From: $email_address";
$sent = mail('contact@tgbservices.co.uk', 'quote', $quote, $headers);

*/

/* if ($sent) {
    ?> <html>
        <head>
            <title>Thank you!</title>
        </head>
        <body>
        <div id="successful-form" class="container">
        <h1>Thank you for submitting your quote!</h1>
        <p>
          We will get back to you as soon as possible. If your quote is urgent
          contact us via the phone number above!
        </p>
      </div>
        </body>
      </html>
      <?php
} else {
    ?> <html>
        <head>
            <title>Something went wrong</title>
        </head>
        <body>
        <div id="failure-form" class="container">
        <h1>Something went wrong...</h1>
        <p>
          Please refresh the page and try again, if that won't work try
          contacting us via the phone number or email above!
        </p>
      </div>
        </body>
      </html>
      <?php
}
*/

?>