<div class="NavBarUserButton"  id="NavBarUserButton">
    <div class="NavBarUserButtonContent" id="NavBarUserButtonContent">
        <div class="UserButton" id="UserButton" >
            <div class="UpUserButton">
                <h5>Bonjour <?= $user->UserFirstName ?></h5>
            </div>
            <div class="MiddleUserButton">
                <a href="/wallet" class="link">
                    <div class="NavBarUserButtonElement">
                        <svg  height="24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.9">
                            <path d="M10.7496 16.8599V18.8899C10.7496 20.6099 9.14963 21.9999 7.17963 21.9999C5.20963 21.9999 3.59961 20.6099 3.59961 18.8899V16.8599C3.59961 18.5799 5.19963 19.7999 7.17963 19.7999C9.14963 19.7999 10.7496 18.5699 10.7496 16.8599Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.7498 14.1097C10.7498 14.6097 10.6098 15.0697 10.3698 15.4697C9.77981 16.4397 8.5698 17.0497 7.1698 17.0497C5.7698 17.0497 4.55979 16.4297 3.96979 15.4697C3.72979 15.0697 3.58984 14.6097 3.58984 14.1097C3.58984 13.2497 3.98982 12.4797 4.62982 11.9197C5.27982 11.3497 6.16979 11.0098 7.15979 11.0098C8.14979 11.0098 9.03982 11.3597 9.68982 11.9197C10.3498 12.4697 10.7498 13.2497 10.7498 14.1097Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.7496 14.11V16.86C10.7496 18.58 9.14963 19.8 7.17963 19.8C5.20963 19.8 3.59961 18.57 3.59961 16.86V14.11C3.59961 12.39 5.19963 11 7.17963 11C8.16963 11 9.05966 11.35 9.70966 11.91C10.3497 12.47 10.7496 13.25 10.7496 14.11Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <path d="M22.0002 10.9702V13.0302C22.0002 13.5802 21.5602 14.0302 21.0002 14.0502H19.0402C17.9602 14.0502 16.9702 13.2602 16.8802 12.1802C16.8202 11.5502 17.0602 10.9602 17.4802 10.5502C17.8502 10.1702 18.3602 9.9502 18.9202 9.9502H21.0002C21.5602 9.9702 22.0002 10.4202 22.0002 10.9702Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 10.5V8.5C2 5.78 3.64 3.88 6.19 3.56C6.45 3.52 6.72 3.5 7 3.5H16C16.26 3.5 16.51 3.50999 16.75 3.54999C19.33 3.84999 21 5.76 21 8.5V9.95001H18.92C18.36 9.95001 17.85 10.17 17.48 10.55C17.06 10.96 16.82 11.55 16.88 12.18C16.97 13.26 17.96 14.05 19.04 14.05H21V15.5C21 18.5 19 20.5 16 20.5H13.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>0,00€</span>
                    </div>
                </a>
                <a href="<?= $UserProfileLink ?> " class="link">
                    <div class="NavBarUserButtonElement">
                        <svg height="24" width="24" fill="#ffffff" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,11A5,5,0,1,0,7,6,5.006,5.006,0,0,0,12,11Zm0-8A3,3,0,1,1,9,6,3,3,0,0,1,12,3ZM3,22V18a5.006,5.006,0,0,1,5-5h8a5.006,5.006,0,0,1,5,5v4a1,1,0,0,1-2,0V18a3,3,0,0,0-3-3H8a3,3,0,0,0-3,3v4a1,1,0,0,1-2,0Z"/></svg>
                        <span>Votre profile</span>
                    </div>
                </a>
                <a href="logout" class="link">
                    <div class="NavBarUserButtonElement UserDeconnexion">
                        <svg height="24" width="24" fill="#ffffff" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            viewBox="0 0 512 512" xml:space="preserve">
                            <g>
                                <g>
                                    <g>
                                        <path d="M510.371,226.513c-1.088-2.603-2.645-4.971-4.629-6.955l-63.979-63.979c-8.341-8.32-21.824-8.32-30.165,0
                                            c-8.341,8.341-8.341,21.845,0,30.165l27.584,27.584H320.013c-11.797,0-21.333,9.557-21.333,21.333s9.536,21.333,21.333,21.333
                                            h119.168l-27.584,27.584c-8.341,8.341-8.341,21.845,0,30.165c4.16,4.181,9.621,6.251,15.083,6.251s10.923-2.069,15.083-6.251
                                            l63.979-63.979c1.984-1.963,3.541-4.331,4.629-6.955C512.525,237.606,512.525,231.718,510.371,226.513z"/>
                                        <path d="M362.68,298.667c-11.797,0-21.333,9.557-21.333,21.333v106.667h-85.333V85.333c0-9.408-6.187-17.728-15.211-20.437
                                            l-74.091-22.229h174.635v106.667c0,11.776,9.536,21.333,21.333,21.333s21.333-9.557,21.333-21.333v-128
                                            C384.013,9.557,374.477,0,362.68,0H21.347c-0.768,0-1.451,0.32-2.197,0.405c-1.003,0.107-1.92,0.277-2.88,0.512
                                            c-2.24,0.576-4.267,1.451-6.165,2.645c-0.469,0.299-1.045,0.32-1.493,0.661C8.44,4.352,8.376,4.587,8.205,4.715
                                            C5.88,6.549,3.939,8.789,2.531,11.456c-0.299,0.576-0.363,1.195-0.597,1.792c-0.683,1.621-1.429,3.2-1.685,4.992
                                            c-0.107,0.64,0.085,1.237,0.064,1.856c-0.021,0.427-0.299,0.811-0.299,1.237V448c0,10.176,7.189,18.923,17.152,20.907
                                            l213.333,42.667c1.387,0.299,2.795,0.427,4.181,0.427c4.885,0,9.685-1.685,13.525-4.843c4.928-4.053,7.808-10.091,7.808-16.491
                                            v-21.333H362.68c11.797,0,21.333-9.557,21.333-21.333V320C384.013,308.224,374.477,298.667,362.68,298.667z"/>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span>Se déconnecter</span>
                    </div>
                </a>
            </div>
        </div>  
        <img id="NavBarUserButtonAvatar" class="ButtonUserAvatar" src="<?= $UserAvatar?>"  alt=<?= $UserAvatarName ?>> 
    </div>
</div>