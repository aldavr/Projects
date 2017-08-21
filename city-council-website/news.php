<?php
/* Set e-mail recipient */
$myemail  = "marciehodge@msn.com";
$subject = "New email update form submitted";

/* Check all form inputs using check_input function */
$email    = check_input($_POST['email']);
$zip  = check_input($_POST['zip']);


/* Let's prepare the message for the e-mail */
$message = "Hello Marcie!

Please send me email updates.

E-mail: $email
Zip: $zip

";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thankyou.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>