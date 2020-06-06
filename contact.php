<?php
$errors = '';
$myemail = 'curie.ce08@gmail.com';//<-----Put Your email address here.
if(empty($_REQUEST['name'])  || 
   empty($_REQUEST['email']) || 
   empty($_REQUEST['message']))
{
    $errors .= "\n Error: All fields are required";
}

$name = $_REQUEST['name']; 
$email_address = $_REQUEST['email']; 
$message = $_REQUEST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))

{

$to = $myemail;

$email_subject = "Contact form from Personal Website: $name";

$email_body = "You have received a new message. ".

" Here are the details:\n Name: $name \n ".

"Email: $email_address\n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

if(mail($to,$email_subject,$email_body,$headers))
{
    echo "<script type='text/javascript'> alert('Message sent successfully!');
          window.history.log(-1);
          </script>";
}
else {
    window.history.log(-1);
}
}



?>