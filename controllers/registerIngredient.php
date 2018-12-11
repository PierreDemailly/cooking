<?php
$recipeManager = new RecipeManager();

$LastRecipe = $recipeManager->getLastRecipeName();
if(isset($_POST['ingredient'])){
    $recipeManager->addRecipeIngredient($_POST['ingredient'], $_GET['id']);
}







include "./views/registerIngredientVue.php";
