<?php
    global $Db;
    $UserId = 1;
    $Querry = $Db -> prepare("SELECT * FROM image WHERE ImageId in(SELECT UserAvatarId from user where UserId = :UserId)");
    $Querry -> execute([
        'UserId' => $UserId
    ]);
    $UserAvatar = $Querry -> fetch();
    if($UserAvatar)
    {
        if(file_exists($UserAvatar -> ImageDir))
        {
            $UserAvatar = $UserAvatar -> ImageDir;     
        }
        else{
            $UserAvatar = "Images/Users/Avatars/default/DefaultAvatar.png"; 
        }  
    }
    else
    {
        $UserAvatar = "Images/Users/Avatars/default/DefaultAvatar.png";
    }


    $userProfileLink = "?/login";
    $connected = false;

    //
    // Si l'utilisateur est connecté 
    //
    if($connected){
        $userProfileLink = "?/UserProfile";
    }
?>
<div class="NavBar">
    <div class="NavBarLogo">
        <img height="128" width="128" src="Images/Logos/EventMap.png">
    </div>
    <div class="NewNavBarContent">
        <div class="NavBarSearch">
            <div>
                <input placeholder="Tapez ici pour rechercher un évenement" type="search" class="NavBarSearchBar">
                </input>
                <div class="NavBarUserContent">
                    <a href=<?= $userProfileLink ?>>
                    <input type="image" class="ButtonUserAvatar" src=<?= $UserAvatar?> alt="UserAvatar"></input>
                    
                    </a>
                </div>
            </div>
        </div>
        <ul class="NavBarList">
            <li>
            <div class="NavBarListItem">
                    <a href="#">        
                    <div class="NavBarListItemContent">           
                        <img height="64" width="64" src="Images/logos/Map.png">
                        <span>Maps</span>
                    </div>
                    </a>
                </div> 
            </li>
            <li>
                <div class="NavBarListItem">
                    <a href="#">        
                    <div class="NavBarListItemContent">           
                        <img height="64" width="64" src="Images/logos/Bell.png">
                        <span>Notifications</span>
                    </div>
                    </a>
                </div>           
            </li>
            <li>
            <div class="NavBarListItem">
                    <a href="#">        
                    <div class="NavBarListItemContent">           
                        <img height="64" width="64" src="Images/logos/Bell.png">
                        <span>évenements terminés</span>
                    </div>
                    </a>
                </div> 
            </li>
            <li>
            <div class="NavBarListItem">
                    <a href="#">        
                    <div class="NavBarListItemContent">           
                        <img height="64" width="64" src="Images/logos/Bell.png">
                        <span>salut</span>
                    </div>
                    </a>
                </div> 
            </li>
        </ul>
    </div>
</div>