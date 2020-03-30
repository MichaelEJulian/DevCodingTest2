<?php

function nonRepeatInteger(array $arr) : int{

    $arrwithcount = array_count_values($arr);

    foreach ($arr as $value){
        if ($arrwithcount[$value] === 1){ //First occurence of integer with no duplicate return this.
            return $value;
        }
    }

    return -1; //return -1 if empty or all the same integers
}

$arr1 = array(1,2,3,1,2,4);
print_r($arr1);
echo 'Output : ' . nonRepeatInteger ($arr1);

echo "\n\n";

$arr2 = array(3,1,1,2,3);
print_r($arr2);
echo 'Output : ' .  nonRepeatInteger ($arr2);