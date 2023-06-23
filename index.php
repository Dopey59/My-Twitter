<script src="./javascript/countCaracter.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php
include './model/class_instance.php';
include './controller/controller.php';
session_start();
if(isset($_GET['url'])){                 // Switch permettant de rediriger mes pages
    switch($_GET['url']){
        case "inscription":
            require './views/inscription.html';
            break;
            
        case "connexion":
            require './views/connexion.php';
            break;
                
        case "compte":
            if(isset($_SESSION['nick'])){
                require './views/account.php';
            }
            else{
                require './views/404.html';
            }
            break; 
        case "modification":
            if(isset($_SESSION['nick'])){
                require './views/modify.php';
            }
            else{
                require './views/404.html';
            }
            break; 
        case "search":
            if(isset($_SESSION['nick'])){
                require './views/search.php';
            }
            else{
                require './views/404.html';
            }
            break;    
        case "accueil":
            if(isset($_SESSION['nick'])){
                require './views/accueil.php';
            }
            else{
                require './views/404.html';
            }
            break;  
        case "compte-user":
            if(isset($_SESSION['nick'])){
                require './views/user_account.php';
            }
            else{
                require './views/404.html';
            }
            break;     
        case "comments":
            if(isset($_SESSION['nick'])){
                require './views/comments.php';
            }
            else{
                require './views/404.html';
            }
            break;
        case "messages":
            if(isset($_SESSION['nick'])){
                require './views/messages.php';
            }
            else{
                require './views/404.html';
            }
            break; 
        case "signets":
            if(isset($_SESSION['nick'])){
                require './views/signets.php';
            }
            else{
                require './views/404.html';
            }
            break; 
        default:
            require './views/404.html';
            break;
    }
}
else{
    require './views/connexion.php';
}

?>
<script src="./Ajax/ajaxConnect.js"></script>
<script src="./Ajax/verifyMail.js"></script>
<script src="./Ajax/ajaxModify.js"></script>
<script src="./Ajax/showAccount.js"></script>
<script src="./Ajax/follow.js"></script>
<script src="./Ajax/like.js"></script>