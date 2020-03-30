<?php

//Turn on strict types if we want to enable type-hinting

//Use recursion keep note of configured recursion limit
function multiply_recursion(int $num1, int $num2) : int{
    // if multiplier is 0 then return 0
    if($num2 == 0) 
        return 0;
        
    if ($num2 > 0) //positive mutiplicand
        return ($num1 + multiply_recursion($num1, ($num2-1)));
    
    if ($num2 < 0) //negative mutiplicand (change sign to +)
        return -multiply_recursion($num1, -$num2);
} 

$multiplicand = 3;
$multiplier = 5;
echo "Multiply : $multiplicand * $multiplier = ";
echo multiply_recursion($multiplicand, $multiplier);

