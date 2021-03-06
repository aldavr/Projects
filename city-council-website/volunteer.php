<?php
/* Set e-mail recipient */
$myemail  = "marciehodge@msn.com";
$subject = "New volunteer form submitted";

/* Check all form inputs using check_input function */
$firstname = check_input($_POST['firstname'], "Enter your first name");
$lastname  = check_input($_POST['lastname'], "Enter your last name");
$email    = check_input($_POST['email']);
$phone  = check_input($_POST['phone']);
$likeit   = check_input($_POST['likeit']);
$likeit2   = check_input($_POST['likeit2']);
$likeit3   = check_input($_POST['likeit3']);
$likeit4   = check_input($_POST['likeit4']);
$likeit5   = check_input($_POST['likeit5']);


$sendme = check_input($_POST['sendme']);
$callme = check_input($_POST['callme']);
$address = check_input($_POST['address']);
$available = check_input($_POST['available']);
$comments = check_input($_POST['comments'], "Write your comments");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* If URL is not valid set $website to empty */
if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $website))
{
    $website = '';
}

/* Let's prepare the message for the e-mail */

$message = "Hello Marcie!

Your Volunteer form has been submitted by:

Will you volunteer? 
$likeit
$likeit2
$likeit3
$likeit4
$likeit5

First Name: $firstname
Last Name: $lastname
E-mail: $email
Phone: $phone
Send me: $sendme
Good time to call: $callme
Address: $address
Available: $available

Comments:
$comments

End of message
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