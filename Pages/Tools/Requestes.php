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

?>