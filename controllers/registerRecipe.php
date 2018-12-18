<?php
$recipeManager = new RecipeManager();
$ingredientManager = new IngredientManager();
$stepManager = new StepManager();
if(isset($_POST['recipe-submit']))
{
    $errors = array();

    if(empty($_POST['name']))
        $errors['recipe-title'] = "Veuillez choisir le titre de votre recette";
    elseif(strlen($_POST['name']) < 5 || strlen($_POST['name']) > 130)
        $errors['recipe-title'] = "Votre titre doit compter entre 5 et 130 caractères";

    if(empty($_FILES['picture']['name']))
        $errors['recipe-pic'] = "Veuilez choisir une photo.";
    elseif($_FILES['picture']['error'] !== 0)
        $errors['recipe-pic'] = "Il y a eu une erreur lors de l'envoie du fichier";
    elseif($_FILES['picture']['size'] > 1000000)
        $errors['recipe-pic'] = "Votre fichier ne doit pas dépasser 1MO";
    elseif(in_array(pathinfo($_FILES['picture']['name'])['extension'], ['jpg, jpeg, png']))
        $errors['recipe-pic'] = "Le format " . pathinfo($_FILES['picture']['name'])['extension'] . " n'est pas autorisé";
    
    if(empty($_POST['type']))
        $errors['recipe-type'] = "Veuillez choisir le type de recette";
    elseif(!in_array($_POST['type'], Recipe::TYPES))
        $errors['recipe-type'] = "Ce type de recette n'est pas autorisé";

    if(empty($_POST['difficulty']))
        $errors['recipe-difficulty'] = "Veuillez évaluer la difficulté de votre recette";
    elseif(!in_array($_POST['difficulty'], Recipe::DIFFICULTIES))
        $errors['recipe-difficulty'] = "Ce niveau de difficulté n'existe pas";

    if(empty($_POST['cost']))
        $errors['recipe-cost'] = "Veuillez choisir le coût de votre recette";
    elseif(!in_array($_POST['cost'], Recipe::COSTS))
        $errors['recipe-cost'] = "Ce coût n'existe pas";

        if(empty($_POST['preparation_time']))
        $errors['recipe-preparation-time'] = "Veuillez indiquer le temps de préparation";
    elseif(!ctype_digit($_POST['preparation_time']) || 0 > $_POST['preparation_time'])
        $errors['recipe-preparation-time'] = "Temps de préparation incorrect";

    if(empty($_POST['cooking_time']))
        $errors['recipe-preparation-time'] = "Veuillez indiquer le temps de cuisson";
    elseif(!ctype_digit($_POST['cooking_time']) || 0 > $_POST['cooking_time'])
        $errors['recipe-cooking-time'] = "Temps de cuisson incorrect";

    if(empty($_POST['nb']) || !ctype_digit($_POST['nb']) || empty($_POST['unite']) || strlen($_POST['unite'] > 50))
        $errors['recipe-for-quantity'] = "Quantité incorrecte";
    
    if(empty($_POST['quantity']) || empty($_POST['content_ingredient']))
        $errors['recipe-ingredient'] = "Ingrédient invalide";
    else 
    {
        if(is_array($_POST['quantity']))
        {

            foreach($_POST['quantity'] as $k => $v)
            {
                if(empty($_POST['content_ingredient'][$k]) or empty($_POST['quantity']))
                return;
                else 
                $ingredients[] = [$k => $v];
            }
        }
        else 
            $ingredients[] = $_POST['quantity'];
    }

    if(empty($_POST['content_step']))
        $errors['recipe-step'] = "Merci de donner les étapes de la recette";
    else 
    {
        if(is_array($_POST['content_step']))
        {

            foreach($_POST['content_step'] as $k => $v)
            {
                if(empty($_POST['content_step'][$k]))
                return;
                else 
                $steps[] = [$k => $v];
            }
        }
        else 
            $steps[] = $_POST['content_step'];
    }

    if(empty($_POST['recipe-drink']))
        $_POST['recipe-drink'] = "Aucune boisson conseillée";
    if(strlen($_POST['recipe-drink']) < 3 OR strlen($_POST['recipe-drink'] > 50))
        $errors['recipe-drink'] = "Boisson invalide";

    if(empty($errors))
    {
        $recipe = new Recipe([
            'name'=>$_POST['name'],
            'picture'=>$_FILES['picture']['name'],
            'user_id'=> $_SESSION['id'],
            'type'=>$_POST['type'],
            'difficulty'=>$_POST['difficulty'],
            'cost'=>$_POST['cost'],
            'preparation_time'=>$_POST['preparation_time'],
            'cooking_time'=>$_POST['cooking_time']
        ]);

        $recipeManager->addRecipe($recipe, $_SESSION['id']);
        $lastRecipe = $recipeManager->getLastRecipeName();
        
        $ingredient = new Ingredient([
            'content_ingredient'=>$_POST['content_ingredient'],
            'quantity'=>$_POST['quantity'],
            'recipe_id'=> $lastRecipe->getId()
        ]);
        $ingredientManager->addIngredient($ingredient);

        $step = new Step([
            'content_step'=>$_POST['content_step'],
            'recipe_id' => $lastRecipe->getId()
        ]);

        $stepManager->addStep($step);
    }
    
var_dump($errors);
}   

include './views/template/header.php';
include "./views/registerRecipeVue.php";
include './views/template/footer.php';
