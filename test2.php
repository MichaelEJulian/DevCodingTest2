<?php

function numDuplicatesWords(string $str) {

    //get count of every word in the str (1. get all word, convert to lowercase then get counts)
    $wordcounts =  array_count_values(array_map( 'strtolower', str_word_count($str,1) )); 
   
    //Remove word with no duplicates
    $duplicates = array_filter($wordcounts, function ($x) { return $x > 1; });

    foreach ($duplicates as $key => $value ){
        echo "$key: $value\n"; 
    }

    if (!$duplicates){
        echo "No duplicates";
    }
}

$inputString = "Please	complete the	following	recruitment	questionnaire.	The	questionnaire	consists	of	10	questions	and…";

echo $inputString . "\n\n" ;

echo numDuplicatesWords($inputString);