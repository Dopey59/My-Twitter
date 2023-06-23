<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css" crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="javascript/borderB.js"></script>
    <title>Cuiiter | Signets</title>

</head>
<body class="max-h-screen">  
    <!-- Main container who that contain the whole grid-->
    <div class="mainContainer flex flex-col md:flex-row justify-between">

        <?php
          $user = new UserDB;
          $res = $user->get_info($_SESSION['mail']);
          foreach($res as $info){
            $pp = $info["picture"];
            $mainId = $info["id"];
          }
        ?>

        <!-- Colonne de gauche -->
        <div class="leftBlock flex md:w-1/3 w-full h-screen hidden sm:block sticky top-0 overflow-auto"> 
            <div class="leftBlock-container flex flex-col">
                <ol class="grid grid-cols place-content-end mr-4 p-6 gap-4 md:gap-6">
                    <a href="accueil"><img class="w-16" src="./assets/chicken.png" alt=""></a>
                    <li class="p-2 hover:bg-green-300 rounded-full py-3 px-3">
                        <a class="flex gap-4 md:gap-6 items-center" href="accueil"><i class="fa-solid fa-house fa-2x"></i><span class="font-bold uppercase">Accueil</span></a>
                    </li>
                    <li class="p-2 hover:bg-green-300 rounded-full py-3 px-3">
                        <a class="flex gap-4 md:gap-6 items-center" href="#"><i class="fa-solid fa-hashtag fa-2x"></i>Explorer</a>
                    </li>
                    <li class="p-2 hover:bg-green-300 rounded-full py-3 px-3">
                        <a class="flex gap-4 md:gap-6 items-center" href="#"><i class="fa-regular fa-bell fa-2x"></i>Notifications</a>
                    </li>
                    <li class="p-2 hover:bg-green-300 rounded-full py-3 px-3">
                        <a class="flex gap-4 md:gap-6 items-center" href="messages"><i class="fa-regular fa-envelope fa-2x"></i>Messages</a>
                    </li>
                    <li class="p-2 hover:bg-green-300 rounded-full py-3 px-3">
                        <a class="flex gap-4 md:gap-6 items-center" href="signets"><i class="fa-regular fa-bookmark fa-2x"></i>Signets</a>
                    </li>
                    <li class="p-2 hover:bg-green-300 rounded-full py-3 px-3">
                        <a class="flex gap-4 md:gap-6 items-center" href="compte"><i class="fa-regular fa-user fa-2x"></i>Profil</a>
                    </li>
                    <li class="p-2 hover:bg-green-300 rounded-full py-3 px-3">
                        <a class="flex gap-4 md:gap-6 items-center" href="#"><i class="fa-light fa-circle-ellipsis fa-2x"></i>Plus</a>
                    </li>
                    <div class="button">
                        <button class="bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-lg mr-2" type="submit">
                            Cuiiter  <i class="fa-regular fa-paper-plane-top"></i>
                        </button>
                    </div>
                </ol>
            </div>
        </div>

                <!-- middleBlock -->
        <div class="middleBlock md:w-1/2 justify-center border-l border-r border-gray-300 ">
            <div class="signetsContent block m-8">
                <iframe src="https://giphy.com/embed/l0Iyn34fotpL8K9wI" width="480" height="360" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
                <h1 class="uppercase font-bold">Enregistrez des Tweets pour plus tard</h1>
            </div>

        </div>
          
            <!-- Right block -->
          <div class="midContainer md:w-1/4 w-full h-screen hidden sm:block p-2 flex flex-col max-w-lg mx-auto sticky top-0 overflow-auto">
              <!-- Content trend's block div -->
              <div class="contentBlock grid grid-cols place-content-start">
                <!-- Search block -->
                <div class="trendContainer flex flex-col items-center">
                  <form class="p-1" action="/search">
                      <input class="py-1  outline-none bg-gray-100 rounded-full" type="text" placeholder="Recherche Cuiiter">
                      <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                  <div class="trendBlock grid grid-cols gap-6 bg-green-200 rounded items-center justify-center m-4 p-4 w-64 h-auto">
                      <h1 class="uppercase font-bold">Tendances pour vous</h1>
                      <ol class="cursor-pointer">
                          <li class="border-b border-green-300 w-auto hover:bg-green-200 p-2">
                              <a class="text-sm text-green-800" href="#">Tendances n°1 en France</a>
                              <p>#TopFR</p>
                              <p class="text-sm text-green-800">80,8k Cuiits</p>
                          </li>
                          <li class="border-b border-green-300 w-auto hover:bg-green-200 p-2">
                              <a class="text-sm text-green-800" href="#">Le meilleur poulet de france...</a>
                              <p>#TopChicken</p>
                              <p class="text-sm text-green-800">4,2k Cuiits</p>
                          </li>
                          <li class="border-b border-green-300 w-auto hover:bg-green-200 p-2">
                              <a class="text-sm text-green-800" href="#">Promos chicken beef..</a>
                              <p>#ChickenBeef</p>
                              <p class="text-sm text-green-800">30,2k Cuiits</p>
                          </li>
                      </ol>
                  </div>
                </div>
              </div>
          </div>
    </div>
</body>
</html>