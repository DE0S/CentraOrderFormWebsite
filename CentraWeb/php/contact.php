<?php
/* Set e-mail recipient */
$myemail  = "support@domain.com";


/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Enter your name");
$email = check_input($_POST['email']);
$number = check_input($_POST['phone']);


///Diff Products & categories
$category1  = check_input($_POST['category']);
$product1 = check_input($_POST['message']);

$category2  = check_input($_POST['category1']);
$product2 = check_input($_POST['message1']);

$category3  = check_input($_POST['category2']);
$product3 = check_input($_POST['message2']);

$category4  = check_input($_POST['category3']);
$product4 = check_input($_POST['message3']);



/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* message for the e-mail */
$message = "Contacted from website

Name: $name

E-mail: $email

Phone Number: $number

Category: $category1
$product1

Category: $category2
$product2

Category: $category3
$product3

Category: $category4
$product4

Category: $category5
$product5

Category: $category6
$product6

Category: $category7
$product7

Category: $category8
$product8

Category: $category9
$product9

Category: $category10
$product10

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: ../thanks.html');
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