<?php

class UserDB{
    
    public function connect_to_db(){                            // Fonction pour se connecter à la BDD
        
        try{
            $bdd = 'mysql:dbname=tweet_academy;host=localhost';
            $user = 'root';
            $dbpassword = 'new_root';
            
            $this->connect = new PDO($bdd, $user, $dbpassword);
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        } 
    } 

    public function add_to_db($nickname, $email, $password, $picture){    // Fonction pour ajouter des utilisateurs a la BDD
        $this->connect_to_db();
        $this->connect->exec("INSERT INTO users (nickname, email, password, follows, picture) VALUES ('$nickname', '$email', '$password', '0', '$picture')");
    }

    public function add_cuiit($user_mail, $content){                 // Fonction pour ajouter un cuiit
        if(strpos($content, "'")){
            $newContent = str_replace("'", "\'", $content);
        }
        else{
            $newContent = $content;
        }
        $this->connect_to_db();
        $result = $this->connect->query("SELECT id FROM users WHERE email = '$user_mail'");                             //Je récupère l'Id
        foreach($result as $row){
            $user_id = $row["id"];
        }
        $this->connect->exec("INSERT INTO tweets (user_id, message, images, origin, comments, liked_id) VALUES ($user_id, '$newContent', 'NULL', NULL, 'NULL', 'NULL')");
    }
    
    public function find_mail($email){                          // Fonction pour trouver le mail lors de la l'inscription
        $this->connect_to_db();
        return $this->connect->query("SELECT email FROM users WHERE email = '$email'");
    }

    public function find_account($email, $password){            // Fonction pour la connexion
        $this->connect_to_db();
        return $this->connect->query("SELECT email, password FROM users WHERE email = '$email' AND password = '$password'");
    }

    public function get_name($email){                           // Permettra d'afficher le pseudo sur le dashboard
        $this->connect_to_db();
        return $this->connect->query("SELECT nickname FROM users WHERE email = '$email'");
    }

    public function get_cuiit($email){                          // Permet de retrouver les cuiits d'un utilisateur
        $this->connect_to_db();
        $result = $this->connect->query("SELECT id FROM users WHERE email = '$email'"); //Je récupère l'Id
        foreach($result as $row){
            $id = $row["id"];
        }
        return $this->connect->query("SELECT * FROM tweets INNER JOIN users WHERE tweets.user_id = users.id AND user_id = $id order by post_date desc");   //Je recherche les cuiits en fonction de l'Id au dessus
    }

    public function get_cuiit_where_media($email){
        $this->connect_to_db();
        $result = $this->connect->query("SELECT id FROM users WHERE email = '$email'");  //Je récupère l'Id
        foreach($result as $row){
            $id = $row["id"];
        }
        return $this->connect->query("SELECT * FROM tweets INNER JOIN users WHERE tweets.user_id = users.id AND user_id = $id and images != 'NULL' ORDER BY post_date DESC");   //Je recherche les cuiits en fonction de l'Id au dessus
    }

    public function get_all_cuiit(){
        $this->connect_to_db();
        return $this->connect->query("SELECT * FROM tweets INNER JOIN users WHERE tweets.user_id = users.id ORDER BY post_date DESC");
    }

    public function get_avatar($email){
        $this->connect_to_db();
        return $this->connect->query("SELECT picture FROM users WHERE email = '$email'");
    }

    public function search_account($content){
        $this->connect_to_db();
        return $this->connect->query("SELECT * FROM users WHERE nickname LIKE '%$content%'");
    }

    public function search_hashtag($content){
        $this->connect_to_db();
        return $this->connect->query("SELECT * FROM tweets INNER JOIN users WHERE tweets.user_id = users.id AND message LIKE '%$content%'");
    }

    public function modify_user_data($nickname, $email, $password, $picture, $emailNow){
        $this->connect_to_db();
        $this->connect->exec("UPDATE users SET nickname = '$nickname', email = '$email', password = '$password', picture = '$picture' WHERE email = '$emailNow'");
    }

    public function get_info($email){
        $this->connect_to_db();
        return $this->connect->query("SELECT * FROM users WHERE email = '$email'");
    }

    public function get_info_by_id($id){
        $this->connect_to_db();
        return $this->connect->query("SELECT * FROM users INNER JOIN tweets WHERE users.id = tweets.user_id AND users.id = '$id'");
    }

    public function get_all_follow($id){
        $this->connect_to_db();
        return $this->connect->query("SELECT follows FROM users WHERE id = $id");
    }

    public function update_follow($id, $account){
        $this->connect_to_db();
        $this->connect->exec("UPDATE users SET follows = '$account' WHERE id = $id");
    }

    public function get_likes($id_cuiit){
        $this->connect_to_db();
        return $this->connect->query("SELECT * FROM likes WHERE tweet_id = $id_cuiit");
    }

    public function add_like($id_cuiit, $user_id){
        $this->connect_to_db();
        $this->connect->exec("INSERT INTO likes (user_id, tweet_id) VALUES ($user_id, $id_cuiit)");
    }

    public function get_cuiit_post_date($date){
        $this->connect_to_db();
        return $this->connect->query("SELECT id FROM tweets WHERE post_date = '$date'");
    }
}
?>