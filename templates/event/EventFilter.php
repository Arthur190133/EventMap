<?php

    // default filter parameters values
    $public = true;
    $private = true;
    $free = true;
    $paid = true;



    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {

        // update header
        if(isset($_POST['event-filter-public']) ? $public = true : $public = false);
        if(isset($_POST['event-filter-private']) ? $private = true : $private = false);
        if(isset($_POST['event-filter-free']) ? $free = true : $free = false);
        if(isset($_POST['event-filter-paid']) ? $paid = true : $paid = false);

        if(!($public && $private && $free &&  $paid))
        {
            $newHeader = "";
            if($public){
                $newHeader .=  "public-";
            }

            if($private){
                $newHeader .= "private-";
            }

            if($free){
                $newHeader .=  "free-";
            }

            if($paid){
                $newHeader .= "paid-";
            }

            $newHeader = rtrim($newHeader, "-");


            header("location: /events/" . $newHeader);
        }
        else{
            header("location: /events/");
        }

    }

    $DataFilter = json_decode(file_get_contents("../Config/Data.json", true))->Data[1]; 

    if(count(explode('/', $_SERVER['REQUEST_URI'])) >= 3)
    {
        $parameter = [];
        $parameters = explode('/', $_SERVER['REQUEST_URI'])[2];

       while(str_starts_with($parameters, "-"))
        { 
            $parameters = substr($parameters, 1);
        }
        
        $parameters = explode("-",$parameters);

        if(strlen($parameters[0]) === 0){
            foreach($DataFilter->EventFilterParameters as $Filter){
                $FilterParamters[$Filter] = true;
            }
        }
        foreach($parameters as $i => $parameter){

            if(in_array($parameter, $DataFilter->EventFilterParameters))
            {
                $FilterParamters[$parameter] = true;
            }
        }
        if(($FilterParamters['public']) ? $public = 'checked="checked"': $public = "");
        if(($FilterParamters['private']) ? $private = 'checked="checked"' : $private = "");
        if(($FilterParamters['free']) ? $free = 'checked="checked"' : $free = "");
        if(($FilterParamters['paid']) ? $paid = 'checked="checked"' : $paid = "");
    }
    else{
        foreach($DataFilter->EventFilterParameters as $Filter){
            $FilterParamters[$Filter] = true;
        }
        $public = 'checked="checked"';
        $private = 'checked="checked"';
        $free = 'checked="checked"';
        $paid = 'checked="checked"';

    }
    require_once '../Pages/Event/EventFilter.php';

?>