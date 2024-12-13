<?php
// Fetch values from environment variables
define('MAILHOST', getenv('MAILHOST')); // e.g., smtp.gmail.com
define('USERNAME', getenv('MAIL_USERNAME')); // e.g., your email
define('PASSWORD', getenv('MAIL_PASSWORD')); // e.g., your email password
define('SEND_FROM', getenv('SEND_FROM')); // e.g., your email
define('SEND_FROM_NAME', getenv('SEND_FROM_NAME')); // e.g., "TravellingDuck"
define('REPLY_TO', getenv('REPLY_TO')); // e.g., your email
define('REPLY_TO_NAME', getenv('REPLY_TO_NAME')); // e.g., "MrDuck"
?>
