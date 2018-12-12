<?php
$userManager = new UserManager();

// user must not be here if he already logged in
if(isset($_SESSION['id']))
    header('Location: '.$path.'/recipe');

elseif(isset($_COOKIE['cooking_auth_token'])) 
{
    if($userManager->tokenVerify($_COOKIE['cooking_auth_token']))
    {
        $_SESSION['id'] = $userManager->getUserFromToken($_COOKIE['cooking_auth_token'])->getId();
        header('Location: '.$path.'/recipe');
    }
    else
        unset($_COOKIE['cooking_auth_token']);
}

if(isset($_POST['login']))
{
    $errors = array();

    if(empty($_POST['email'])) 
        $errors['email'] = "Veuillez entrer votre adresse mail."; 

    if(empty($_POST['pass'])) 
        $errors['password'] = "Veuillez entrer votre mot de passe."; 

    // user gave email and password so we can check if the email exist and if the password is correct
    if(empty($errors))
    {
        if(!$userManager->emailExist($_POST['email']))
            $errors['email'] = "Cette adresse email n'existe pas. Veuillez vous inscrire.";

        else 
        {
            if($userManager->passwordVerify($_POST['email'], $_POST['pass']))
            {
                $user = $userManager->getUser($_POST['email']);
                if(isset($_POST['stay-auth']))
                {
                    $token = bin2hex(random_bytes(90));
                    setcookie('cooking_auth_token', $token, time() + 365 * 24 * 3600, null, null, false, true);
                    $userManager->setUserToken($user, $token);
                }
                $_SESSION['id'] = $user->getId();
                header('Location: '.$path.'/recipe');
            }
            else 
                $errors['password'] = "Mot de passe incorrect.";
        }
    }
}
        
include './views/template/header.php';
include './views/loginView.php';
include './views/template/footer.php';
