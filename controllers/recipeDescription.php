<?php
$recipeManager = new RecipeManager();
$userManager = new UserManager();
$recipe = $recipeManager->getRecipe($_GET['id']);

$ingredients = $recipeManager->getIngredient($_GET['id']);
$steps = $recipeManager->getStep($_GET['id']);
$user = $userManager->getUser($_SESSION['id']);
$author = $userManager->getUser($recipe->getUser_id());

if (isset($_POST['delete'])) {
    $recipeManager->deleteRecipe($_GET['id']);
    header('Location: ' . $path . '/recipe');
}

include './views/template/header.php';
include "./views/recipeDescriptionVue.php";
include './views/template/footer.php';
