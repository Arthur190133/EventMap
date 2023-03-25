<?php

class eventController
{
    public function eventPage(){
        echo 'lodaing succed';
    }

    public function wrongEventPagePath(){
        echo 'loading failled : path is incorrect';
    }

    public function eventPageNotFound(){
        echo 'loadiing failled : event doesnt exist';
    }


}

?>