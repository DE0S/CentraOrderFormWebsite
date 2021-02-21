<html>
<title>Floods Test Page</title>

<body>

    <?php

    /* Set e-mail recipient */
    $myemail  = "name@gmail.com";

    /* Check all form inputs using check_input function */
    $name = check_input($_POST['name'], 'Name');
    $email = check_input($_POST['email'], 'Email');
    $number = check_input($_POST['phone'], 'Phone');
    $isDelivery = check_input($_POST["collDel"], 'Collection');
    $address = $_POST["address"];
    $eircode = $_POST["eircode"];

    $max = $_POST['maxNum'];
    $actualMax = 0;

    for($i = 0; $i <= $max; $i++)
    {
        if($_POST['product'. $i] != null)
        {
            $product = $_POST['product'. $i];
            $weight = $_POST['weight'. $i];
            $actualMax += 1;
            $allProducts .= $actualMax . '. ' .  $product . ' ' . $weight . PHP_EOL . '<br>';
        }   
        else{
            continue;
        }
    }




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

        /* If e-mail is not valid show error message */
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
    {
        show_error("E-mail address not valid");
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

    <h1> Test Dev Screen </h1>

    <div id = "name">Name: <?php echo $name;?></div>
    <div id = "email">Email: <?php echo $myemail;?></div>
    <div id = "phone">Phone: <?php echo $number;?></div>
    <div id = "collection"><?php echo $isDelivery;?></div>
    <div id = "address">Address:<?php echo $address;?></div>
    <div id = "eircode">Eircode<?php echo $eircode;?></div>

    <br>
    <b>Products</b>
    <div id = "products"><?php echo $allProducts;?></div>
    <br>
    <div id = "totalProducts">Total: <?php echo $actualMax;?></div>
    <br>
    <a href = "http://deividasovs.com/assets/websites/CentraWeb/index"> Back </a>

</body>

</html>