<?php
$recipeManager = new RecipeManager();
$userManager = new UserManager();
$arrayOfObjRecipe = $recipeManager->getAllRecipesName();
$recipeNameById = $recipeManager->getRecipeNameById($_GET['id']);
$arrayOfObjIngredient = $recipeManager->getIngredientById($_GET['id']);
$arrayOfObjStep = $recipeManager->getStepById($_GET['id']);
$propriet =  $userManager->getUSerbypseudo($_SESSION['email']);

if(isset($_POST['delete'])){
    $recipeManager->deleteRecipe($_GET['id']);
    header('Location: '.$path.'/recipe');
}


if(isset($_POST['picture'])) {
    $objPictureRecipe = new PictureRecipe([
        "picture" => $_POST['picture'],
        "recipeId" => $_GET['id']
    ]);
    // var_dump($objPictureRecipe);
    $recipeManager->addPictureRecipe($objPictureRecipe);
}


include "./views/recipeDescriptionVue.php";
