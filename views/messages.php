<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css" crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="javascript/borderB.js"></script>
    <title>Cuiiter | Boîte de réception</title>

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
                        <a class="flex gap-4 md:gap-6 items-center" href="#"><i class="fa-regular fa-envelope fa-2x"></i>Messages</a>
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
            <div class="colorHead bg-green-400">
                <div class="flex items-center justify-between border-b border-gray-200 p-3">
                    <div class="leftArrow bg-white opacity-80 rounded-full border-solid py-3 px-3 hover:opacity-90">
                        <a href="accueil"><i class="fa-solid fa-arrow-left-long text-green-600 "></i></a>
                    </div>
                </div>
            </div>
            <div class="firstBlock block m-8 ">
                <div class="title font-bold uppercase flex my-4">
                    <h1>Bienvenue dans votre boîte de réception!</h1>
                </div>
                <div class="subTitle text-gray-500 my-4">
                    <p>Écrivez un mot, et partagez des Cuiits et plus encore dans des conversations privées entre vous et d'autres utilisateurs de Cuiitter.</p>
                </div>
                <button class="hover:bg-green-600 bg-green-500 rounded text-white p-2 w-64 flex justify-center items-center" name="cuiit_button">Ecrire un message</button>
            </div>
          </div>
          
            <!-- Right block -->
          <div class="rightContainer md:w-1/4 w-full h-screen hidden sm:block p-2 flex flex-col max-w-lg mx-auto sticky top-0 overflow-auto">
              
          </div>
    </div>
</body>
</html>