<?php
$recipeManager = new RecipeManager();

$LastRecipe = $recipeManager->getLastRecipeName();
if(isset($_POST['ingredient'])){
    $recipeManager->addRecipeIngredient($_POST['ingredient'], $_GET['id']);
}

include './views/template/header.php';
include "./views/registerIngredientVue.php";
include './views/template/footer.php';
