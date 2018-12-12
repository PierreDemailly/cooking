<?php

$userManager = new UserManager();
if(isset($_SESSION['user_id']))
    header('Location: '.$path.'/recipe');

    if(isset($_POST['login']))
    {
        if(!empty($_POST['email'])){
            $data_user = $userManager->getUSerbypseudo($_POST['email']);
            if($userManager->getUSerbypseudo($_POST['email'])){
                $isPasswordCorrect = password_verify($_POST['pass'], $data_user->getPass());
                if($isPasswordCorrect){
                    $_SESSION['user_id'] = $data_user->getIdUser();
                    $_SESSION['pseudo'] = $data_user->getPseudo();
                    $_SESSION['email'] = $data_user->getEmail();
                    $_SESSION['avatar'] = $data_user->getAvatar();
                    header('Location: '.$path.'/recipe');
                }else{
                    echo 'Le mot de passe est incorrecte';
                }
            }else{
                echo 'Vous devez vous inscrire'; 
            }
            if ($_POST['connexion_auto'] == 'on') {
                setcookie('email', $_POST['email'], time() + 365 * 24 * 3600, null, null, false, true);
                setcookie('pass', password_hash($_POST['pass'], PASSWORD_DEFAULT), time() + 365 * 24 * 3600, null, null, false, true);
            }
            
        }
        
    }
        
        include "./views/indexVue.php";
