<head>
<link rel="stylesheet" href="css/navbar.css">
</head>
<div class="NavBar">
    <div class="NavBarLogo">
        <img height="128" width="128" src="Images/Logos/EventMap.png">
    </div>
    <div class="NewNavBarContent">
        <div class="NavBarElements">
            <div class="NavBarTop">
                <div class="NavBarSearch">
                    <input id="NavBar-search" placeholder="Tapez ici pour rechercher un évenement" type="text" class="NavBarSearchBar"></input>
                    <ul id="NavBar-result"></ul>
                </div>
                <div class="NavBarUserContent">
                    <?php   require_once  "$UserButtonLocation" ;
                            require_once 'templates/notification/Notification.php';
                    ?>
                </div>
            </div>
        </div>
        <ul class="NavBarList">
            <li>
            <div class="NavBarListItem">
                    <a href="?/Map" class="link">        
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
                    <a href="?/Event" class="link">        
                    <div class="NavBarListItemContent">           
                    <svg height="24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 12C7.44772 12 7 12.4477 7 13C7 13.5523 7.44772 14 8 14H16C16.5523 14 17 13.5523 17 13C17 12.4477 16.5523 12 16 12H8Z" fill="#152C70"/>
                        <path d="M7 17C7 16.4477 7.44772 16 8 16H12C12.5523 16 13 16.4477 13 17C13 17.5523 12.5523 18 12 18H8C7.44772 18 7 17.5523 7 17Z" fill="#152C70"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 2C7.55228 2 8 2.44772 8 3V4H16V3C16 2.44772 16.4477 2 17 2C17.5523 2 18 2.44772 18 3V4.10002C20.2822 4.56329 22 6.58104 22 9V17C22 19.7614 19.7614 22 17 22H7C4.23858 22 2 19.7614 2 17V9C2 6.58104 3.71776 4.56329 6 4.10002V3C6 2.44772 6.44772 2 7 2ZM20 10H4V17C4 18.6569 5.34315 20 7 20H17C18.6569 20 20 18.6569 20 17V10Z" fill="#152C70"/>
                    </svg>
                        <span>évenements</span>
                    </div>
                    </a>
                </div> 
            </li>
            <li>
            <div class="NavBarListItem">
                    <a href="#" class="link">        
                    <div class="NavBarListItemContent">           
                    <svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 474.565 474.565" xml:space="preserve">
                        <g>
                            <path d="M255.204,102.3c-0.606-11.321-12.176-9.395-23.465-9.395C240.078,95.126,247.967,98.216,255.204,102.3z"/>
                            <path d="M134.524,73.928c-43.825,0-63.997,55.471-28.963,83.37c11.943-31.89,35.718-54.788,66.886-63.826
                                C163.921,81.685,150.146,73.928,134.524,73.928z"/>
                            <path d="M43.987,148.617c1.786,5.731,4.1,11.229,6.849,16.438L36.44,179.459c-3.866,3.866-3.866,10.141,0,14.015l25.375,25.383
                                c1.848,1.848,4.38,2.888,7.019,2.888c2.61,0,5.125-1.04,7.005-2.888l14.38-14.404c2.158,1.142,4.55,1.842,6.785,2.827
                                c0-0.164-0.016-0.334-0.016-0.498c0-11.771,1.352-22.875,3.759-33.302c-17.362-11.174-28.947-30.57-28.947-52.715
                                c0-34.592,28.139-62.739,62.723-62.739c23.418,0,43.637,13.037,54.43,32.084c11.523-1.429,22.347-1.429,35.376,1.033
                                c-1.676-5.07-3.648-10.032-6.118-14.683l14.396-14.411c1.878-1.856,2.918-4.38,2.918-7.004c0-2.625-1.04-5.148-2.918-7.004
                                l-25.361-25.367c-1.94-1.941-4.472-2.904-7.003-2.904c-2.532,0-5.063,0.963-6.989,2.904l-14.442,14.411
                                c-5.217-2.764-10.699-5.078-16.444-6.825V9.9c0-5.466-4.411-9.9-9.893-9.9h-35.888c-5.451,0-9.909,4.434-9.909,9.9v20.359
                                c-5.73,1.747-11.213,4.061-16.446,6.825L75.839,22.689c-1.942-1.941-4.473-2.904-7.005-2.904c-2.531,0-5.077,0.963-7.003,2.896
                                L36.44,48.048c-1.848,1.864-2.888,4.379-2.888,7.012c0,2.632,1.04,5.148,2.888,7.004l14.396,14.403
                                c-2.75,5.218-5.063,10.708-6.817,16.438H23.675c-5.482,0-9.909,4.441-9.909,9.915v35.889c0,5.458,4.427,9.908,9.909,9.908H43.987z"
                                />
                            <path d="M354.871,340.654c15.872-8.705,26.773-25.367,26.773-44.703c0-28.217-22.967-51.168-51.184-51.168
                                c-9.923,0-19.118,2.966-26.975,7.873c-4.705,18.728-12.113,36.642-21.803,52.202C309.152,310.022,334.357,322.531,354.871,340.654z
                                "/>
                            <path d="M460.782,276.588c0-5.909-4.799-10.693-10.685-10.693H428.14c-1.896-6.189-4.411-12.121-7.393-17.75l15.544-15.544
                                c2.02-2.004,3.137-4.721,3.137-7.555c0-2.835-1.118-5.553-3.137-7.563l-27.363-27.371c-2.08-2.09-4.829-3.138-7.561-3.138
                                c-2.734,0-5.467,1.048-7.547,3.138l-15.576,15.552c-5.623-2.982-11.539-5.481-17.751-7.369v-21.958
                                c0-5.901-4.768-10.685-10.669-10.685H311.11c-2.594,0-4.877,1.04-6.739,2.578c3.26,11.895,5.046,24.793,5.046,38.552
                                c0,8.735-0.682,17.604-1.956,26.423c7.205-2.656,14.876-4.324,22.999-4.324c36.99,0,67.086,30.089,67.086,67.07
                                c0,23.637-12.345,44.353-30.872,56.303c13.48,14.784,24.195,32.324,31.168,51.976c1.148,0.396,2.344,0.684,3.54,0.684
                                c2.733,0,5.467-1.04,7.563-3.13l27.379-27.371c2.004-2.004,3.106-4.721,3.106-7.555s-1.102-5.551-3.106-7.563l-15.576-15.552
                                c2.982-5.621,5.497-11.555,7.393-17.75h21.957c2.826,0,5.575-1.118,7.563-3.138c2.004-1.996,3.138-4.72,3.138-7.555
                                L460.782,276.588z"/>
                            <path d="M376.038,413.906c-16.602-48.848-60.471-82.445-111.113-87.018c-16.958,17.958-37.954,29.351-61.731,29.351
                                c-23.759,0-44.771-11.392-61.713-29.351c-50.672,4.573-94.543,38.17-111.145,87.026l-9.177,27.013
                                c-2.625,7.773-1.368,16.338,3.416,23.007c4.783,6.671,12.486,10.631,20.685,10.631h315.853c8.215,0,15.918-3.96,20.702-10.631
                                c4.767-6.669,6.041-15.234,3.4-23.007L376.038,413.906z"/>
                            <path d="M120.842,206.782c0,60.589,36.883,125.603,82.352,125.603c45.487,0,82.368-65.014,82.368-125.603
                                C285.563,81.188,120.842,80.939,120.842,206.782z"/>
                        </g>
                    </svg>
                        <span>!!administration</span>
                    </div>
                    </a>
                </div> 
            </li>
        </ul>
    </div>
</div>
<script src="js/navbar.js">
</script> 