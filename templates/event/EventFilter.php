<?php

    if(count(explode('/', $_SERVER['REQUEST_URI'])) >= 3)
    {
        $parameter = [];
        $parameters = explode('/', $_SERVER['REQUEST_URI'])[2];
        $parameters = explode("-",$parameters);
        $DataFilter = json_decode(file_get_contents("../Config/Data.json", true))->Data[1];

        if(empty($parameters)){
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

        var_dump($FilterParamters);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            
        }
    }



    require_once '../Pages/Event/EventFilter.php';

?>