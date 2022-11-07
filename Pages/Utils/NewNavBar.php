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


    $userProfileLink = "?/Login";
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
        <div class="NavBarElements">
            <div class="NavBarTop">
                <div class="NavBarSearch">
                    <input placeholder="Tapez ici pour rechercher un évenement" type="search" class="NavBarSearchBar"></input>
                    <div class="NavBarSearchBarAutoComplete">
                        <li>JE SUIS UNE AUTO COMPLEMENTATION </li>
                        <li>JE SUIS UNE AUTO COMPLEMENTATION </li>
                        <li>JE SUIS UNE AUTO COMPLEMENTATION </li>
                        <li>JE SUIS UNE AUTO COMPLEMENTATION </li>
                    </div>
                    <!--
                        <div class="NavBarSearchBarIcon">
                        <img src="Images/Logos/Search.png">
                        </div>
                    -->
                </div>
                <div class="NavBarUserContent">
                    <a href=<?= $userProfileLink ?>>
                        <input type="image" class="ButtonUserAvatar" src=<?= $UserAvatar?> alt="UserAvatar"></input>                 
                    </a>
                    <!-- onclick="OpenPage('Pages/User/UserNotification.php','NavBarNotificationContent')"  -->
                    <a class="NavBarNotification" id="BellNotification">
                        <div Notification="98">
                            <div id="NavBarNotificationContent">
                                <?php require_once "Pages/User/UserNotification.php"; ?>
                            </div>
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 611.999 611.999" style="enable-background:new 0 0 611.999 611.999;" xml:space="preserve">
                                <g>
                                    <g>
                                        <g>
                                            <path d="M570.107,500.254c-65.037-29.371-67.511-155.441-67.559-158.622v-84.578c0-81.402-49.742-151.399-120.427-181.203
                                                C381.969,34,347.883,0,306.001,0c-41.883,0-75.968,34.002-76.121,75.849c-70.682,29.804-120.425,99.801-120.425,181.203v84.578
                                                c-0.046,3.181-2.522,129.251-67.561,158.622c-7.409,3.347-11.481,11.412-9.768,19.36c1.711,7.949,8.74,13.626,16.871,13.626
                                                h164.88c3.38,18.594,12.172,35.892,25.619,49.903c17.86,18.608,41.479,28.856,66.502,28.856
                                                c25.025,0,48.644-10.248,66.502-28.856c13.449-14.012,22.241-31.311,25.619-49.903h164.88c8.131,0,15.159-5.676,16.872-13.626
                                                C581.586,511.664,577.516,503.6,570.107,500.254z M484.434,439.859c6.837,20.728,16.518,41.544,30.246,58.866H97.32
                                                c13.726-17.32,23.407-38.135,30.244-58.866H484.434z M306.001,34.515c18.945,0,34.963,12.73,39.975,30.082
                                                c-12.912-2.678-26.282-4.09-39.975-4.09s-27.063,1.411-39.975,4.09C271.039,47.246,287.057,34.515,306.001,34.515z
                                                M143.97,341.736v-84.685c0-89.343,72.686-162.029,162.031-162.029s162.031,72.686,162.031,162.029v84.826
                                                c0.023,2.596,0.427,29.879,7.303,63.465H136.663C143.543,371.724,143.949,344.393,143.97,341.736z M306.001,577.485
                                                c-26.341,0-49.33-18.992-56.709-44.246h113.416C355.329,558.493,332.344,577.485,306.001,577.485z"/>
                                            <path d="M306.001,119.235c-74.25,0-134.657,60.405-134.657,134.654c0,9.531,7.727,17.258,17.258,17.258
                                                c9.531,0,17.258-7.727,17.258-17.258c0-55.217,44.923-100.139,100.142-100.139c9.531,0,17.258-7.727,17.258-17.258
                                                C323.259,126.96,315.532,119.235,306.001,119.235z"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div> 
                    </a>
                </div>
            </div>
        </div>
        <ul class="NavBarList">
            <li>
            <div class="NavBarListItem">
                    <a href="?/Map">        
                    <div class="NavBarListItemContent">           
                        <svg height="24" width="24" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <path style="fill:#16153B;" d="M405.658,507.939c-3.312,0-6.625-1.105-9.35-3.316c-3.96-3.215-96.992-79.684-96.992-163.607
                                c0-58.637,47.705-106.342,106.342-106.342S512,282.379,512,341.016c0,8.195-6.644,14.837-14.837,14.837s-14.837-6.643-14.837-14.837
                                c0-42.274-34.393-76.667-76.667-76.667s-76.667,34.393-76.667,76.667c0,55.852,54.302,111.692,76.62,132.281
                                c13.919-12.954,40.35-39.78,58.275-71.678c4.015-7.146,13.06-9.68,20.204-5.666c7.143,4.015,9.68,13.06,5.665,20.204
                                c-28.008,49.839-72.796,86.867-74.691,88.419C412.33,506.817,408.995,507.939,405.658,507.939z"/>
                            <circle style="fill:#97C4E8;" cx="405.652" cy="341.021" r="37.286"/>
                            <g>
                                <path style="fill:#16153B;" d="M405.658,393.132c-28.737,0-52.118-23.379-52.118-52.116c0-28.738,23.381-52.118,52.118-52.118
                                    s52.118,23.379,52.118,52.118C457.776,369.752,434.395,393.132,405.658,393.132z M405.658,318.572
                                    c-12.376,0-22.443,10.069-22.443,22.443s10.067,22.441,22.443,22.441s22.443-10.067,22.443-22.441
                                    C428.101,328.64,418.034,318.572,405.658,318.572z"/>
                                <path style="fill:#16153B;" d="M151.995,494.36c-6.401,0-12.846-1.144-19.057-3.472L35.09,454.195
                                    C14.103,446.324,0,425.975,0,403.557V124.299c0-17.734,8.701-34.35,23.277-44.451c14.575-10.1,33.191-12.414,49.794-6.187
                                    l70.287,26.358c7.84,2.941,16.518,1.696,23.214-3.328l109.044-81.785c14.837-11.129,34.068-13.888,51.438-7.373l97.848,36.693
                                    c20.989,7.873,35.092,28.222,35.092,50.638v84.553c0,8.195-6.644,14.837-14.837,14.837s-14.837-6.643-14.837-14.837V94.865
                                    c0-10.116-6.365-19.3-15.839-22.852L316.634,35.32c-7.839-2.941-16.517-1.694-23.214,3.327l-109.044,81.786
                                    c-14.842,11.131-34.069,13.888-51.441,7.373l-70.283-26.358c-7.601-2.852-15.796-1.835-22.473,2.792
                                    c-6.675,4.626-10.505,11.938-10.505,20.06v279.256c0,10.118,6.364,19.3,15.836,22.852l97.848,36.693
                                    c7.84,2.941,16.518,1.696,23.214-3.328l109.044-81.785c14.837-11.129,34.068-13.888,51.438-7.373
                                    c7.674,2.877,11.561,11.429,8.684,19.103c-2.875,7.671-11.429,11.56-19.102,8.683c-7.84-2.938-16.518-1.696-23.214,3.327
                                    l-109.044,81.786C174.844,490.665,163.495,494.36,151.995,494.36z"/>
                            </g>
                            <path style="fill:#97C4E8;" d="M306.344,18.984c-7.779,0.343-15.406,2.978-21.826,7.794l-109.044,81.785
                                c-7.612,5.708-16.916,8.362-26.163,7.745V479.39c9.247,0.617,18.553-2.037,26.163-7.745l109.044-81.785
                                c6.42-4.815,14.046-7.451,21.826-7.794V18.984z"/>
                            <path style="fill:#16153B;" d="M151.939,494.315L151.939,494.315c-1.203,0-2.418-0.04-3.616-0.12
                                c-7.794-0.521-13.849-6.994-13.849-14.805V116.307c0-4.107,1.702-8.03,4.702-10.836c2.999-2.806,7.025-4.243,11.124-3.969
                                c5.879,0.402,11.594-1.3,16.274-4.81l109.044-81.785c8.73-6.548,19.13-10.264,30.074-10.747c4.052-0.168,7.988,1.304,10.911,4.103
                                c2.924,2.8,4.579,6.672,4.579,10.72v363.082c0,7.941-6.251,14.474-14.184,14.822c-4.951,0.218-9.644,1.892-13.573,4.84
                                l-109.045,81.786C175.092,490.48,163.571,494.315,151.939,494.315z M164.15,129.822v331.556c0.834-0.482,1.643-1.018,2.424-1.604
                                l109.044-81.785c4.846-3.635,10.207-6.398,15.889-8.218V40.083l-107.128,80.348C178.379,124.933,171.444,128.126,164.15,129.822z"/>
                        </svg>
                        <span>carte</span>
                    </div>
                    </a>
                </div> 
            </li>
            <li>
            <div class="NavBarListItem">
                    <a href="?/Event">        
                    <div class="NavBarListItemContent">           
                        <img height="64" width="64" src="Images/logos/Bell.png">
                        <span>évenements</span>
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