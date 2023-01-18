<?php

function GenerateEventBackground($Event){
    $EventName = "";
    $RandomSpace = random_int(0,5);
    for($j = 0; $j < $RandomSpace; $j++){
        $EventName = $EventName . "&nbsp;";
    }  
    for($i = 1; $i < 50 ; $i++)
    {
        $EventName = $EventName . $Event->Name . " ";
        if($i % 6 == 0){
            $EventName = $EventName . "<br>";
            $RandomSpace = random_int(0,10);
            for($j = 0; $j < $RandomSpace; $j++){
                $EventName = $EventName . "&nbsp;";
            }
        }
    } 
    return $EventName;
}



?>