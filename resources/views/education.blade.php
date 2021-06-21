<!DOCTYPE HTML>
<html>
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/education.css') }}">
        <link rel="img" href="{{ asset('img') }}">
    </head>
    <body>

        <x-navigation/>
        <div class="scrollPage">
            <div class="letsDeal">
                <p class="title"> Let's Make A Deal </p>
                <img class="dealImage" src="img/851-300x200.jpg" alt="image">
                <img class="dealImage2" src="img/946-200x300.jpg" alt="image">
                <p class="text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec libero tortor. Praesent ut eros nisl. Sed pretium quis purus ac placerat. Fusce tincidunt placerat ex et commodo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut laoreet ante lorem, gravida rutrum risus facilisis vel. Morbi tortor massa, consequat ut eros sit amet, rutrum dapibus erat. Suspendisse finibus neque nec libero eleifend pretium. Nam id metus convallis, pretium augue at, aliquam orci. Etiam aliquet posuere nulla id sollicitudin. Praesent non dignissim justo. Phasellus tincidunt lobortis tellus eget porta. Nam auctor gravida mattis. </p>
            </div>

            <div class="standardMonty">
                <p class="space"></p>
                <p class="title"> Standard Monty </p>
                <p class="text"> Vestibulum ut orci vel elit commodo iaculis. Nullam gravida finibus ex id lacinia. Maecenas fermentum eros ut nisi malesuada, in laoreet ipsum vulputate. Cras sed lectus vel ipsum viverra ultrices. Nulla lobortis purus quis tincidunt maximus. Phasellus condimentum eget erat ut feugiat. Duis auctor nibh quis tempus hendrerit. Praesent sit amet ipsum non purus fringilla facilisis in quis purus. Etiam a nunc magna. Duis egestas malesuada lacinia. Nullam tortor erat, ullamcorper vitae purus a, rutrum bibendum ante. Etiam euismod ipsum massa, non mollis arcu facilisis a. Etiam tincidunt risus vitae eleifend volutpat. </p>
            </div>

            <div class="misconceptions">
                <p class="title"> Misconceptions </p>
                <p class="text"> Aenean ut nisi interdum, pretium libero at, blandit enim. Donec pulvinar faucibus ligula, quis varius dui. Duis sed tristique mauris. Mauris augue sapien, feugiat pulvinar feugiat eget, ornare eget metus. Sed mattis fermentum porta. Aliquam sit amet augue eu sapien facilisis efficitur. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean quis luctus ipsum. </p>
            </div>

            <div class="variants">
                <script src="{{ URL::asset('js/app.js') }}" type="text/javascript"></script>
                <p class="space"></p>
                <p class="title"> Variant Monty's </p>
                <div class="tabs">
                    <ul class="tabNav">
                        <div class="slider" id="slider"></div>
                        <li class="tabItem">
                            <button id="defaultOpen" class="variantsButton" onclick="openVariants(event, 'hell')">Hell</button>
                        </li>
                        <li class="tabItem">
                            <button class="variantsButton" onclick="openVariants(event, 'ignorant')">Ignorant</button>
                        </li>
                        <li class="tabItem">
                            <button class="variantsButton" onclick="openVariants(event, 'angelic')">Angelic</button>
                        </li>
                        <li class="tabItem">
                            <button class="variantsButton" onclick="openVariants(event, 'crawl')">Crawl</button>
                        </li>
                    </ul>
                </div>
                <div id="hell" class="monty">
                    <p class="variantTitle">Monty From Hell</p>
                    <p class="variantText">Maecenas ullamcorper lectus eget mauris gravida interdum. Maecenas tincidunt neque eu iaculis ultricies. Sed elementum libero nec turpis dignissim elementum. Sed tempor dignissim pharetra. Nulla sit amet mi rutrum ante fringilla vehicula. Quisque euismod arcu in dictum vestibulum. Proin tincidunt enim non arcu tempus, non varius eros dignissim.</p>
                </div>
                <div id="ignorant" class="monty">
                    <p class="variantTitle">Ignorant Monty</p>
                    <p class="variantText">Duis fermentum nec leo ut aliquam. Integer elementum mattis est, ac sollicitudin ante semper vitae. Sed sit amet cursus nulla. Sed neque orci, aliquet ultrices ipsum in, consequat sodales neque. Suspendisse fringilla augue mauris, sed mattis leo facilisis sed. Phasellus tempor id turpis ac aliquet. Nullam pellentesque suscipit erat, vel tincidunt dolor varius et. Vivamus ornare maximus felis, ut hendrerit ipsum accumsan id. Cras dignissim metus id rutrum suscipit. Nulla facilisi.</p>
                </div>
                <div id="angelic" class="monty">
                    <p class="variantTitle">Angelic Monty</p>
                    <p class="variantText">Vestibulum a nunc lacus. Maecenas pulvinar sollicitudin urna in elementum. Ut laoreet mauris nec molestie aliquet. Cras turpis augue, finibus et cursus vel, fringilla a justo. Donec ante arcu, aliquet eu volutpat sit amet, consequat ac nibh. Vivamus luctus, est vel pulvinar scelerisque, arcu ex dignissim metus, ut porta nunc est id purus. Ut sollicitudin ipsum erat, sit amet scelerisque sapien laoreet a.</p>
                </div>
                <div id="crawl" class="monty">
                    <p class="variantTitle">Monty Crawl</p>
                    <p class="variantText">Integer pharetra luctus felis at aliquam. Ut ac diam vel sapien dictum sagittis. Proin mi urna, elementum vehicula pellentesque id, luctus ut eros. Maecenas at vestibulum purus, cursus molestie lectus. Nam luctus, dolor sit amet tincidunt vestibulum, arcu sapien rhoncus diam, eget consectetur massa tortor eget lacus. Phasellus tincidunt fermentum mollis. Duis elementum nisl leo, eget eleifend lorem laoreet nec. Phasellus at cursus ipsum. Sed rutrum suscipit nisl ac elementum.</p>
                </div>
            </div>

            <div class="resources">
                <p class="title"> Resources </p>
                <p class="text"> Vestibulum euismod lectus nunc, sit amet ornare augue suscipit sit amet. Integer pulvinar, quam vel ultricies blandit, mi enim luctus libero, vel porta augue augue id orci. Integer tellus nisl, luctus non vulputate eu, imperdiet et justo. Phasellus congue a nisl nec fringilla. Sed tempus leo nec nibh tincidunt, sed congue urna faucibus. Fusce scelerisque congue orci a vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed dignissim neque. Praesent eu hendrerit dui, et condimentum diam. Praesent gravida erat vitae mauris pharetra, at viverra tortor cursus. Mauris lobortis nisl ut nibh luctus luctus. Phasellus ultricies mauris enim, a eleifend mauris fermentum ac. Donec leo mauris, dapibus in rutrum eget, fringilla id eros. </p>
            </div>
        </div>
        <x-footer/>
    </body>

</html>
