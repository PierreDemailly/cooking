<?php
$recipeManager = new RecipeManager();
if(isset($_POST['recipe-submit']))
{
    var_dump($_POST);
    $errors = array();

    if(empty($_POST['recipe-title']))
        $errors['title'] = "Veuillez choisir le titre de votre recette";
    elseif(strlen($_POST['recipe-title']) < 5 || strlen($_POST['recipe-title']) > 130)
        $errors['title'] = "Votre titre doit compter entre 5 et 130 caractères";

    if(empty($_FILES['recipe-pic']['name']))
        $errors['recipe-pic'] = "Veuilez choisir une photo.";
    elseif($_FILES['recipe-pic']['error'] !== 0)
        $errors['recipe-pic'] = "Il y a eu une erreur lors de l'envoie du fichier";
    elseif($_FILES['recipe-pic']['size'] > 1000000)
        $errors['recipe-pic'] = "Votre fichier ne doit pas dépasser 1MO";
    elseif(!in_array(pathinfo($_FILES['recipe-pic']['name'])['extension'], ['jpg, jpeg, png']))
        $errors['recipe-pic'] = "Le format " . pathinfo($_FILES['recipe-pic']['name'])['extension'] . " n'est pas autorisé";
    
    if(empty($_POST['recipe-type']))
        $errors['recipe-type'] = "Veuillez choisir le type de recette";
    elseif(!in_array($_POST['recipe-type'], Recipe::TYPES))
        $errors['recipe-type'] = "Ce type de recette n'est pas autorisé";

    if(empty($_POST['recipe-difficulty']))
        $errors['recipe-difficulty'] = "Veuillez évaluer la difficulté de votre recette";
    elseif(!in_array($_POST['recipe-difficulty'], Recipe::DIFFICULTIES))
        $errors['recipe-difficulty'] = "Ce niveau de difficulté n'existe pas";

    if(empty($_POST['recipe-cost']))
        $errors['recipe-cost'] = "Veuillez choisir le coût de votre recette";
    elseif(!in_array($_POST['recipe-cost'], Recipe::COSTS))
        $errors['recipe-cost'] = "Ce coût n'existe pas";

        if(empty($_POST['recipe-preparation-time']))
        $errors['recipe-preparation-time'] = "Veuillez indiquer le temps de préparation";
    elseif(!ctype_digit($_POST['recipe-preparation-time']) || 0 > $_POST['recipe-preparation-time'])
        $errors['recipe-preparation-time'] = "Temps de préparation incorrect";

    if(empty($_POST['recipe-cooking-time']))
        $errors['recipe-preparation-time'] = "Veuillez indiquer le temps de cuisson";
    elseif(!ctype_digit($_POST['recipe-cooking-time']) || 0 > $_POST['recipe-cooking-time'])
        $errors['recipe-cooking-time'] = "Temps de cuisson incorrect";

    if(empty($_POST['recipe-for-quantity']) || !ctype_digit($_POST['recipe-for-quantity']) || empty($_POST['recipe-for']) || strlen($_POST['recipe-for'] > 50))
        $errors['recipe-for-quantity'] = "Quantité incorrecte";
    
    if(empty($_POST['recipe-ingredient-quantity']) || empty($_POST['recipe-ingredient']))
        $errors['recipe-ingredient'] = "Ingrédient invalide";
    else 
    {
        if(is_array($_POST['recipe-ingredient-quantity']))
        {

            foreach($_POST['recipe-ingredient-quantity'] as $k => $v)
            {
                if(empty($_POST['recipe-ingredient'][$k]) or empty($_POST['recipe-ingredient-quantity']))
                return;
                else 
                $ingredients[] = [$k => $v];
            }
        }
        else 
            $ingredients[] = $_POST['recipe-ingredient-quantity'];
    }

    if(empty($_POST['recipe-step']))
        $errors['recipe-step'] = "Merci de donner les étapes de la recette";
    else 
    {
        if(is_array($_POST['recipe-step']))
        {

            foreach($_POST['recipe-step'] as $k => $v)
            {
                if(empty($_POST['recipe-step'][$k]))
                return;
                else 
                $steps[] = [$k => $v];
            }
        }
        else 
            $steps[] = $_POST['recipe-step'];
    }

    if(empty($_POST['recipe-drink']))
        $_POST['recipe-drink'] = "Aucune boisson conseillée";
    if(strlen($_POST['recipe-drink']) < 3 OR strlen($_POST['recipe-drink'] > 50))
        $errors['recipe-drink'] = "Boisson invalide";

    if(empty($errors))
    {
        $recipe = new Recipe($_POST);
        var_dump($recipe);
    }
}   

include './views/template/header.php';
include "./views/registerRecipeVue.php";
include './views/template/footer.php';
