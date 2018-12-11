<?php

if(!isset($_SESSION['user_id']))
    header('Location: '.$path.'/login');
    
$recipeManager = new RecipeManager();

$arrayOfObjRecipe = $recipeManager->getAllRecipesName();

include "./views/recipeVue.php";
