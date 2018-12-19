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

    public function getLastRecipe(){
        $req = $this->db->query('SELECT * FROM recipe ORDER BY id DESC LIMIT 1');
        $data_recipes = $req->fetch(PDO::FETCH_ASSOC);
        if($data_recipes==FALSE){
            return;
        }else{
            $recipe = new Recipe($data_recipes);
            return $recipe;
        }
        
    }
    public function addRecipe(Recipe $objRecipe, $sessionID){
        $req = $this->db->prepare('INSERT INTO recipe(name, picture, user_id, type, difficulty, cost, preparation_time, cooking_time) VALUES(:name, :picture, :user_id, :type, :difficulty, :cost, :preparation_time, :cooking_time)');
        $req->bindValue(':name', $objRecipe->getName(), PDO::PARAM_STR);
        $req->bindValue(':picture', $objRecipe->getPicture(), PDO::PARAM_STR);
        $req->bindValue(':user_id', $sessionID, PDO::PARAM_INT);
        $req->bindValue(':type', $objRecipe->getType(), PDO::PARAM_INT);
        $req->bindValue(':difficulty', $objRecipe->getDifficulty(), PDO::PARAM_STR);
        $req->bindValue(':cost', $objRecipe->getCost(), PDO::PARAM_INT);
        $req->bindValue(':preparation_time', $objRecipe->getPreparation_time(), PDO::PARAM_INT);
        $req->bindValue(':cooking_time', $objRecipe->getCooking_time(), PDO::PARAM_INT);
        $req->execute();
    }

    public function addRecipeStep($getId, $postStep){
        $req = $this->db->prepare('INSERT INTO step(description, recipe_id) VALUES(:description, :recipe_id)');
        $req->bindValue(':description', $postStep, PDO::PARAM_STR);
        $req->bindValue(':recipe_id', $getId, PDO::PARAM_INT);
        $req->execute();
    }

    public function addRecipeIngredient($postIngredient, $getId)
    {
        $req = $this->db->prepare('INSERT INTO ingredient(description, recipe_id) VALUES(:description, :recipe_id)');
        $req->bindValue(':description', $postIngredient, PDO::PARAM_STR);
        $req->bindValue(':recipe_id', $getId, PDO::PARAM_INT);
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

    public function addComment(Comment $comment){
        $req = $this->db->prepare('INSERT INTO comments(comment, recipe_id, user_id, post_date) VALUES (:comment, :recipe_id, :user_id, NOW())');
        $req->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $req->bindValue(':recipe_id', $comment->getRecipe_id(), PDO::PARAM_INT);
        $req->bindValue(':user_id', $comment->getUser_id(), PDO::PARAM_INT);
        $req->execute();
    }

    public function getComments($getId){
        $req = $this->db->prepare('SELECT * FROM comments WHERE recipe_id = :recipe_id');
        $req->bindValue(':recipe_id', $getId, PDO::PARAM_INT);
        $req->execute();
        $data_comments = $req->fetchAll(PDO::FETCH_ASSOC);
        if($data_comments==FALSE){
            return;
        }else{
            foreach($data_comments as $comment){
                $comments[] = new Comment($comment);
            }
            return $comments;
        }
        
    }



}
