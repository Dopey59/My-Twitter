<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../output/connexion.css"> 
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="../script/typewriter.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
  <title>Cuiitter | Connexion </title>
</head>

<!--LOGIN PAGE TO "Cuiiter"-->

<body class="bg-gray-100">

  <div class="container mx-auto sm:px-6 lg:px-8 h-screen flex flex-col justify-center items-center">
    <div class="w-full sm:w-auto">
      <a target="_blank" href="./accueil.html">

              <!-- Logo located  above the form-->

        <img class="mx-auto mb-4 sm:max-w-xs md:max-w-none md:mb-0 hover:cursor-pointer hover:brightness-90 w-36" src="./assets/chicken.png" alt="twitter logo">
      </a>
    </div>
    <div class="w-full max-w-sm">

      <!-- h1 Cuiiter-->

      <h1 class="text-center text-xl font-bold mb-4">Connecte toi pour cuiiter !</h1>

      <!-- Connexion form -->

      <form method="POST" action="accueil" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" id="connectForm">
      <div class="mb-4">
              
          <!-- Pseudo -->

          <label class="block text-gray-700 font-bold mb-2" for="mail">
            Adresse mail
          </label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="mail" name="mail" type="text" placeholder="Entrez votre mail">
        </div>
       
          <!-- Password -->

        <div class="mb-6">
          <label class="block text-gray-700 font-bold mb-2" for="password">
            Mot de passe
          </label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="pass" placeholder="********">
        </div>

          <!-- Submit connexion  -->

        <div class="mb-6 flex flex-col sm:flex-row justify-between">
          <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-2 sm:mb-0" name="connect" id="connect" type="submit">
            Se connecter
          </button>

          <!-- user can subscride if there is no account alrdeay -->

          <h5 class="text-center flex-col sm:flex-row justify-center py-2 text-orange-500 ">ou</h5>
          <a  href="./inscription" class="bg-green-500 hover:bg-green-600 flex justify-center text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            S'inscrire
          </a>
        </div>
        
      </form>
      <p class="text-center text-gray-500 text-xs">
        &copy;2023 Cuiitter. Tous droits réservés.
      </p>

      <?php
      if(isset($_POST['logOut'])){
        unset($_SESSION['nick']);
      }
      ?>

    </div>
  </div>
</body>
</html>