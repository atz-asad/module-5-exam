<?php


$strings = ["Hello", "World", "PHP", "Programming"];


function countVowels($string){
    $vowelCount = 0;
    $vowels = "aeiouAEIOU";

    for($i = 0; $i < strlen($string); $i++){
        if(strpos($vowels, $string[$i]) !== false ){
            $vowelCount++;
        }
    }

    return $vowelCount;
}


foreach ($strings as $string) {
    echo "Original String: $string, Vowel Count: " . countVowels($string). "," . " " . strrev($string) . "<br>";

}

