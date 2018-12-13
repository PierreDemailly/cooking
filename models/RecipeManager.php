<?php
/**
 * Class representing a Recipe manager
 */
class RecipeManager extends Manager {
    /**
     * Get all recipes
     * @return array<Recipe>
     */
    public function getRecipes()
    {
        $req = $this->db->query('SELECT * FROM recipe');
        while ($recipe = $req->fetch()) { $recipes[] = new Recipe($recipe); }
        return $recipes;
    }

    public function getLastRecipeName(){
        $req = $this->db->query('SELECT * FROM recipe ORDER BY id DESC LIMIT 1');
        $data_recipes = $req->fetch(PDO::FETCH_ASSOC);
        if($data_recipes==FALSE){
            return;
        }else{
            $object_last_recipe = new Recipe($data_recipes);
            return $object_last_recipe;
        }
        
    }
    public function addRecipeName(Recipe $objRecipeName){
        $req = $this->db->prepare('INSERT INTO recipe(name, picture, user_id) VALUES(:name_recipe, :picture, :user_id)');
        $req->bindValue(':name_recipe', $objRecipeName->getname(), PDO::PARAM_STR);
        $req->bindValue(':picture', $objRecipeName->getPicture(), PDO::PARAM_STR);
        $req->bindValue(':user_id', $objRecipeName->getuser_id(), PDO::PARAM_STR);
        $req->execute();
    }

    public function addRecipeStep($getId, $postStep){
        $req = $this->db->prepare('INSERT INTO step(description, id) VALUES(:description, :id)');
        $req->bindValue(':description', $postStep, PDO::PARAM_STR);
        $req->bindValue(':id', $getId, PDO::PARAM_INT);
        $req->execute();
    }

    public function addRecipeIngredient($postIngredient, $getId)
    {
        $req = $this->db->prepare('INSERT INTO ingredient(descriptionIngredient, id) VALUES(:descriptionIngredient, :id)');
        $req->bindValue(':descriptionIngredient', $postIngredient, PDO::PARAM_STR);
        $req->bindValue(':id', $getId, PDO::PARAM_STR);
        $req->execute();
    }

    public function getAllRecipesName(){
        $req = $this->db->query('SELECT * FROM recipe');
        $data_recipes = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($data_recipes as $recipe){
            $arrayObjRecipes[] = new Recipe($recipe);
        }
        return $arrayObjRecipes;
    }

    public function getRecipe($id)
    {
        $req = $this->db->prepare('SELECT * FROM recipe WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

        return new Recipe($req->fetch());
    }

    public function getIngredient($recipe_id)
    {
        $req = $this->db->prepare('SELECT * FROM ingredient WHERE recipe_id = :recipe_id');
        $req->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
        $req->execute();

        while ($ingredient = $req->fetch()) { $ingredients[] = new Ingredient($ingredient); }
        return $ingredients;
    }
     
    public function getStep($recipe_id){
        $req = $this->db->prepare('SELECT * FROM step WHERE recipe_id = :recipe_id');
        $req->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
        $req->execute();
        
        while ($step = $req->fetch()) { $steps[] = new Step($step); }
        return $steps;
    }

    public function deleteRecipe($id){
        $req = $this->db->prepare('DELETE FROM recipe WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

    }

    // public function addPictureRecipe(PictureRecipe $picture){
    //     $req = $this->db->prepare('INSERT INTO pictures(picture, id) VALUES(:picture, :id)');
    //     $req->bindValue(':picture', $picture->getPicture(), PDO::PARAM_INT);
    //     $req->bindValue(':id', $picture->getid(), PDO::PARAM_STR);
    //     $req->execute();
    // }

    // public function getPictureRecipeByIdRecipe(){
    //     $req = $this->db->query('SELECT * FROM pictures');
    //     // $req->bindValue(':idRecipe', $idRecipe, PDO::PARAM_INT);
    //     // $req->execute();
    //     $dataPictureRecipe = $req->fetchAll(PDO::FETCH_ASSOC);
    //     foreach($dataPictureRecipe as $picture){
    //     $objPicture = new PictureRecipe($picture);
    //     }
    //     return $objPicture;
    // }

}
