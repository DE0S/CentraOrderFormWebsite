<?php



/* Set e-mail recipient */
$shopEmail  = "name@gmail.com";
$developerEmail  = "name@gmail.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], 'Name');
$email = check_input($_POST['email'], 'Email');
$number = check_input($_POST['phone'], 'Phone');
$address = $_POST["address"];
$eircode = $_POST["eircode"];
$isDelivery = check_input($_POST["collDel"], 'Collection');

//$maxNum = check_input($_POST['maxNum'], 'No max num');

$max = $_POST['maxNum'];
$actualMax = 0;

for($i = 0; $i <= $max; $i++)
{
    if($_POST['product'. $i] != null)
    {
        $product = $_POST['product'. $i];
        $weight = $_POST['weight'. $i];
        $actualMax += 1;
        $allProducts .= $actualMax . '. ' .  $product . '  x' . $weight . PHP_EOL;
    }   
    else{
        continue;
    }
}

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}


$customerMessage = 
"Thank you for your order!

Below are the details submitted


Name: $name

E-mail: $email

Phone Number: $number

Collection / Delivery: $isDelivery

Address
$address

Eircode
$eircode

Products:
$allProducts


Total: $actualMax


Contact (051) 389 170
Flood's Centra
Ramsgrange, New Ross, Co. Wexford
";


/* message for the e-mail */
$message = "New order!

Name: $name

E-mail: $email

Phone Number: $number

Collection / Delivery: $isDelivery

Address
$address

Eircode
$eircode

Products:
$allProducts


Total: $actualMax

End of Message
";



/* Send the message using mail() function */


mail($shopEmail, "New Online Order!", $message);

//Customer Confirmation
mail($email, "Flood's Order confirmation", $customerMessage);

///Sent for to me
mail($developerEmail, "New Online Order!", $message);

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
    mail("deividov2000@gmail.com", "WEBSITE ERROR", "The error was " . $myError);

?>
    <html>
    <body>
    <h2>Oh no!</h2>
    <p>Something went wrong. Our developers have been notified and it'll get fixed asap!</p>
    <p>Please try again</p>
    <br/>
    <a href = "http://deividasovs.com/assets/websites/CentraWeb/index"><button>Back</button></a>
    </body>
    </html>
<?php
exit();
}
?>