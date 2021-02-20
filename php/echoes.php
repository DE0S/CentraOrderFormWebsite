<?php

$max = $_POST['maxNum'];

for($i = 0; $i <= $max; $i++)
{
    $name = 'product' . $i;
    if($_POST['product'. $i] != null)
    {
        
        //array_push($productArray, check_input($_POST['product'+ $i], 'No Product') + " " + check_input($_POST['weight' + $i], 'no Amt'));
        //echo 'Product was: ' . $_POST['product'. $i];
        $product = $_POST['product'. $i];
        $weight = $_POST['weight'. $i];
        $allProducts .= $i . '. ' .  $product . ' ' . $weight . ' <br> ';
    }   
}

echo $allProducts;
echo 'Done! Max: ' . $max;
    
exit();

?>