<?php
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone_number = $_POST['phone'];
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

?>
 
<?php if (isInjected($name)): ?>
    <div id="failure-form" class="container">
        <h1>Something went wrong...</h1>
        <p>Please refresh the page and try again, if that won't work try
          contacting us via the phone number or email above!</p>
        </div>
        <?php else: ?>
            <div id="successful-form" class="container">
            <h1>Thank you for submitting your quote!</h1>
        <p>
          We will get back to you as soon as possible. If your quote is urgent
          contact us via the phone number above!
        </p>
            </div>

<?php if (isInjected($email_address)): ?>
    <div id="failure-form" class="container">
        <h1>Something went wrong...</h1>
        <p>Please refresh the page and try again, if that won't work try
          contacting us via the phone number or email above!</p>
        </div>
        <?php else: ?>
            <div id="successful-form" class="container">
            <h1>Thank you for submitting your quote!</h1>
        <p>
          We will get back to you as soon as possible. If your quote is urgent
          contact us via the phone number above!
        </p>
            </div>

<?php if (isInjected($phone_number)): ?>
    <div id="failure-form" class="container">
        <h1>Something went wrong...</h1>
        <p>Please refresh the page and try again, if that won't work try
          contacting us via the phone number or email above!</p>
        </div>
        <?php else: ?>
            <div id="successful-form" class="container">
            <h1>Thank you for submitting your quote!</h1>
        <p>
          We will get back to you as soon as possible. If your quote is urgent
          contact us via the phone number above!
        </p>
            </div>

<?php if (isInjected($quote)): ?>
    <div id="failure-form" class="container">
        <h1>Something went wrong...</h1>
        <p>Please refresh the page and try again, if that won't work try
          contacting us via the phone number or email above!</p>
        </div>
        <?php else: ?>
            <div id="successful-form" class="container">
            <h1>Thank you for submitting your quote!</h1>
        <p>
          We will get back to you as soon as possible. If your quote is urgent
          contact us via the phone number above!
        </p>
            </div>
