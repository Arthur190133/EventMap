<?php


function GetNumberOfParticipants ($EventId):int
{

    global $Db;
    $Querry = $Db -> prepare("SELECT COUNT(*) as UserNumber from UserEvent where EventId like :EventId");
    $Querry -> execute([
        'EventId' => $EventId
    ]);
    return ($Querry -> fetch())->UserNumber;
}

function GetImageFromTable ($ImageId):string
{
    global $Db;
    $Querry = $Db -> prepare("SELECT * from image where ImageId like :ImageId");
    $Querry -> execute([
        'ImageId' => $ImageId
    ]);
    $Image = $Querry -> fetch();

    if($Image){ return $Image->ImageDir; }
    return "";
}


function GetEvent($EventId)
{
    global $Db;
    $Querry = $Db -> prepare("SELECT * FROM event WHERE EventId like :EventId ");
    $Querry -> execute([
        'EventId' => $EventId
    ]);
    return $Querry -> fetch();
}

function GenerateBackgroundEvent($Event):string
{
    $EventName = "";
    $RandomSpace = random_int(0,5);
    for($j = 0; $j < $RandomSpace; $j++){
        $EventName = $EventName . "&nbsp;";
    }  
    for($i = 1; $i < 50 ; $i++)
    {
        $EventName = $EventName . $Event->EventName . " ";
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