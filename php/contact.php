<?php
/* Set e-mail recipient */
$myemail  = "EMAIL@email.com";


/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], 'Name');
$email = check_input($_POST['email'], 'Email');
$number = check_input($_POST['phone'], 'Phone');

$isDelivery = check_input($_POST["collDel"], 'Collection');

///Product & weight info

//$maxNum = check_input($_POST['maxNum'], 'No max num');

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

//$productArray = array();
$allProducts = "";

for($i = 0; $i <= 20; $i++)
{
    if($_POST['product'+ $i] != null)
    {
        
        //array_push($productArray, check_input($_POST['product'+ $i], 'No Product') + " " + check_input($_POST['weight' + $i], 'no Amt'));
        
    }

    $product = $_POST['product'+ $i];
    $weight = $_POST['weight' + $i];
    $allProducts .= $product . " " . $weight . " " . $i . "\n";
}

$vals = array_values($array);
$productCount = count($productArray);

/* message for the e-mail */
$message = "New order!

Name: $name

E-mail: $email

Phone Number: $number

Collection / Delivery: $isDelivery

Products:
Product1
Product2
Product3
Product4
Product5
Product6



End of message
";

//Product count: $productCount
/* Send the message using mail() function */
mail($myemail, "New Online Order!", $message);

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