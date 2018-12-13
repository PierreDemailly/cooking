<?php
session_start();
$path = '/cooking';

spl_autoload_register(function ($classname) 
{
	if (file_exists('./models/' . $classname . '.php'))
	{
		require './models/' . $classname . '.php';
	} 
	elseif (file_exists('./entities/' . $classname . '.php')) 
	{
		require './entities/' . $classname . '.php';
	}
});
if(isset($_GET['page']))
{
	switch($_GET['page'])
	{
		case 'login':
			require './controllers/login.php';
			break;
		case 'register':
			require './controllers/register.php';
			break;
		case 'recipe':
			require './controllers/recipe.php';
			break;
    case 'recipe_description':
			require './controllers/recipeDescription.php';
      break;
    case 'register_recipe':
			require './controllers/registerRecipe.php';
			break;
		case 'register_ingredient':
			require './controllers/registerIngredient.php';
			break;
    case 'register_step':
			require './controllers/registerStep.php';
      break;
    case 'recipe_description':
			require './controllers/recipeDescription.php';
      break;
    case 'logout':
      require './controllers/logout.php';
      break;
		default:
			require './controllers/recipe.php';
			break;
	}
}
else 
{
	require './controllers/recipe.php';
}
