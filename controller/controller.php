<?php
include_once('/var/www/html/W-WEB-090-LIL-1-1-academie-lucas.pesse/model/class_instance.php');
class UserController{

    public function verify_mail($email){                // Fonction qui permet de vérifier si le mail existe déjà
        $user = new UserDB();
        $query = $user->find_mail($email);
        $valid = 1;
        foreach($query as $row){
            if(isset($row['email'])){                   // Retourne 0 si le mail est déjà existant dans la BDD
                $valid = 0;
            }
        }
        return $valid;
    }

    public function do_user_exist($email, $password){   // Fonction qui permet de vérifier si les deux identifiants sont corrects
        $user = new UserDB();
        $query_account = $user->find_account($email, $password);

        $connexion = 0;

        foreach($query_account as $result){
            if(isset($result)){
                $connexion = 1;
            }
        }

        return $connexion;
    }

    public function is_another_account($user_id, $main_id){
        if($user_id === $main_id){
            $verify = 0;
        }
        else{
            $verify = 1;
        }
        return $verify;
    }

    public function number_follow($id){
        $count = 0;
        $user = new UserDB();
        $allFollow = $user->get_all_follow($id);
        foreach($allFollow as $value){
            $follow = $value['follows'];
        }
        $followExplode = explode(",", $follow);
        foreach($followExplode as $var){
            $count++;
        }
        return $count;
    }

    public function do_user_is_followed($id, $user_id){
        $user = new UserDB();
        $token = 0;
        $allFollow = $user->get_all_follow($id);
        foreach($allFollow as $value){
            $follow = $value['follows'];
        }
        $followExplode = explode(",", $follow);
        foreach($followExplode as $follow){
            if($follow == $user_id){
                $token = 1;
            }
        }
        return $token;
    }

    public function do_user_liked($cuiit_id, $main_id){
        $user = new UserDB();
        $token = 0;
        $allLike = $user->get_likes($cuiit_id);
        foreach($allLike as $like){
            if($main_id === $like['user_id'] and $cuiit_id === $like['tweet_id']){
                $token = 1;
            }
        }
        return $token;
    }

    public function add_like($cuiit_id, $main_id){
        $user = new UserDB();
        $verif = $this->do_user_liked($cuiit_id, $main_id);
        if($verif == 0){
            $user->add_like($cuiit_id, $main_id);
        }
    }
}