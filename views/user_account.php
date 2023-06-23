<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css" crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="javascript/borderB.js"></script>
    <title>Cuiiter | Dashboard</title>

</head>
<body class="max-h-screen">  <!-- Main container who that contain the whole grid-->
    <div class="mainContainer flex flex-col md:flex-row justify-between">

    <?php
        $user = new UserDB();
        $data = new UserController;
        $res = $user->get_info_by_id($_SESSION['user_id']);
        foreach($res as $user_info){
            $nickname = $user_info["nickname"];
            $picture = $user_info["picture"];
            $email = $user_info["email"];
        }
        $follow = $data->number_follow($_SESSION['user_id']);

    ?>

        <!-- Colonne de gauche -->
        <div class="leftBlock flex md:w-1/3 w-full h-screen hidden sm:block sticky top-0 overflow-auto"> 
            <div class="leftBlock-container flex flex-col">
                <ol class="grid grid-cols place-content-end mr-4 p-6 gap-4 md:gap-6 cursor-pointer">
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
                        <a class="flex gap-4 md:gap-6 items-center" href="#"><i class="fa-regular fa-bookmark fa-2x"></i>Signets</a>
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
        
        <div class="middleBlock md:w-1/3 justify-center border-l border-r border-gray-300">
        
            <div class="colorHead bg-green-400">
                <div class="flex items-center justify-between border-b border-gray-200 p-3">
                    <div class="leftArrow bg-white opacity-80 rounded-full border-solid py-3 px-3 hover:opacity-90">
                        <a href="accueil"><i class="fa-solid fa-arrow-left-long text-green-600 "></i></a>
                    </div>
                    <div class="lougout bg-white opacity-80 rounded-full border-solid py-3 px-3 hover:opacity-90">
                        <form action="./connexion" method="post"><button href="" type="submit" name="logOut"><i class="fa-solid fa-right-from-bracket text-green-600"></i></button></form>
                    </div>
                </div>
            </div>
            <div class="accountInfo items-center p-2 text-black block">
                <div class="infos p-4">
                    <div class="flex justify-between">
                        <img class="rounded w-14 h-14 rounded-full" src="<?php echo $picture; ?>" alt="pdp">
                    </div>
                    <div class="my-2">
                        <p><?php echo $nickname;?></p>
                        <p>@<?php echo $nickname;?></p>
                        <p><?php echo $follow;?> abonnement 0 abonné</p>
                    </div>
                    
                    <?php


                    $extract_data = $user->get_info($_SESSION['mail']);
                    foreach($extract_data as $user_data){
                        $main_id = $user_data['id'];
                    }
                        $token = $data->do_user_is_followed($main_id, $_SESSION['user_id']);
                        if($token == 0){
                            echo "<button class=\"hover:bg-green-600 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg mr-2\" onclick=\"add_follow(".$main_id.", ".$_SESSION['user_id'].")\">Follow</button>";
                        }
                        else{
                            echo "<button class=\"hover:bg-red-600 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg mr-2\" onclick=\"remove_follow(".$main_id.", ".$_SESSION['user_id'].")\">Unfollow</button>";
                        }
                    ?>
                    
                    
                </div>
            </div>
            
        
            <div class="history_navbar cursor-pointer">
                <ul class="flex justify-around p-4 border-b">
                    <li id="onCLick">Cuiit</li>
                    <li id="onCLick">Réponses</li>
                    <li id="onCLick">Médias</li>
                    <li id="onCLick">J'aime</li>
                </ul>
            </div>
            <div id="cuiit_history">
                <?php
                $user = new UserDB;
                $userCuiit = $user->get_cuiit($email);
                foreach($userCuiit as $cuiit){
                    $allID = $user->get_cuiit_post_date($cuiit['post_date']);
                    foreach($allID as $extract_id){
                        $cuiit_id = $extract_id['id'];
                    }
                echo "
                    <div class=\"flex items-start p-4 border-b\">
                    <img class=\"w-12 h-12 rounded-full mr-4\" src=\"".$cuiit['picture']."\" alt=\"User profile picture\">
                    <div class=\"flex-1\">
                        <div class=\"block\">
                        <a href=\"#\" class=\"font-bold text-black mr-2\">".$cuiit['nickname']."</a>
                        <a href=\"#\" class=\"text-gray-500 mr-2\">@".$cuiit['nickname']."</a>
                        <span class=\"text-gray-500 text-sm\"> - ".$cuiit['post_date']."</span>
                        </div>
                        <p class=\"text-black mt-2 p-2\">".$cuiit['message']."</p>";
                        if($cuiit['images'] !== "NULL"){
                            echo "<img src=\"".$cuiit['images']."\" alt=\"cuiit image\">";
                        }else{}
                        echo "<div class=\"flex justify-between items-center mt-4\">
                        <div class=\"flex items-center\">
        
                            <button class=\"text-gray-500 mr-4 hover:text-blue-500\">
                            <i class=\"fa-regular fa-comment-middle\"></i>
                            </button>
        
                            <button class=\"text-gray-500 mr-4 hover:text-green-500\">
                            <i class=\"fa-regular fa-arrows-retweet\"></i>
                            </button>
                
                            <button class=\"text-gray-500 mr-4 hover:text-blue-500\" onclick=\"add_like(".$cuiit_id.", ".$main_id.")\">
                            <i class=\"fa-sharp fa-regular fa-heart\"></i>
                            </button>
        
                            <button class=\"text-gray-500 mr-4 hover:text-blue-500\">
                            <i class=\"fa-solid fa-chart-line\"></i>
                            </button>
        
                        </div>
                        </div>
                    </div>
                    </div>
                    ";}
                    ?>
            </div>
            <div id="recuiit_history">
            
            </div>

            <div id="medias">
            <?php
            $user = new UserDB;
            $mediaCuiit = $user->get_cuiit_where_media($email);
            foreach($mediaCuiit as $media){
                $allID = $user->get_cuiit_post_date($cuiit['post_date']);
                    foreach($allID as $extract_id){
                        $cuiit_id = $extract_id['id'];
                    }
            echo "
                <div class=\"flex items-start p-4 border-b\">
                  <img class=\"w-12 h-12 rounded-full mr-4\" src=\"".$media['picture']."\" alt=\"User profile picture\">
                  <div class=\"flex-1\">
                    <div class=\"block\">
                      <a href=\"#\" class=\"font-bold text-black mr-2\">".$media['nickname']."</a>
                      <a href=\"#\" class=\"font-bold text-black mr-2\">@".$media['nickname']."</a>
                      <span class=\"text-gray-500 text-sm\"> - ".$media['post_date']."</span>
                    </div>
                      <p class=\"text-black mt-2 p-2\">".$media['message']."</p>
                      <img src=\"".$media['images']."\" alt=\"cuiit image\">
                        <div class=\"flex justify-between items-center mt-4\">
                      <div class=\"flex items-center\">
    
                        <button class=\"text-gray-500 mr-4 hover:text-blue-500\">
                          <i class=\"fa-regular fa-comment-middle\"></i>
                        </button>
    
                        <button class=\"text-gray-500 mr-4 hover:text-green-500\">
                          <i class=\"fa-regular fa-arrows-retweet\"></i>
                        </button>
              
                        <button class=\"text-gray-500 mr-4 hover:text-blue-500\" onclick=\"add_like(".$cuiit_id.", ".$main_id.")\">
                          <i class=\"fa-sharp fa-regular fa-heart\"></i>
                        </button>
    
                        <button class=\"text-gray-500 mr-4 hover:text-blue-500\">
                          <i class=\"fa-solid fa-chart-line\"></i>
                        </button>
    
                      </div>
                    </div>
                  </div>
                </div>
                ";}
                ?>
            </div>

            <div id="likes">
            
            </div>
        </div>

         <!-- Right block -->
         <div class="midContainer flex md:w-1/4 w-full h-screen hidden md:block sticky top-0 overflow-auto">
                    
                    <!-- Content trend's block div -->
            <div class="contentBlock grid grid-cols place-content-start block my-2">

                <!-- Search block & trend's block -->
                <div class="search-container flex flex-col items-center my-2">
                    <form action="./search" method="post">
                        <input name="search_text" class="outline-none" type="text" placeholder="Rechercher...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="trendBlock grid grid-cols gap-6 bg-green-200 rounded items-center justify-center m-4 p-4 w-64 h-auto">
                        <h1 class="uppercase font-bold">Tendances pour vous</h1>
                        <ol class="cursor-pointer">
                            <li class="border-b border-green-300 w-auto p-2">
                                <a class="text-sm text-green-800" href="#">Tendances n°1 en France</a>
                                <p>#TopFR</p>
                                <p class="text-sm text-green-800">80,8k Cuiits</p>
                            </li>
                            <li class="border-b border-green-300 w-auto p-2">
                                <a class="text-sm text-green-800" href="#">Le meilleur poulet de france...</a>
                                <p>#TopChicken</p>
                                <p class="text-sm text-green-800">4,2k Cuiits</p>
                            </li>
                            <li class="border-b border-green-300 w-auto p-2">
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