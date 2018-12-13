<?php

if(!isset($_SESSION['id']))
    header('Location: '.$path.'/login');
    
$recipeManager = new RecipeManager();
$userManager = new UserManager();
$recipes = $recipeManager->getRecipes();

// $recipeManager->getRecipe($_GET['id']);
// $user = $userManager->getUserByRecip($_GET[]);
// var_dump($user);
include './views/template/header.php';
include "./views/recipeVue.php";
include './views/template/footer.php';
