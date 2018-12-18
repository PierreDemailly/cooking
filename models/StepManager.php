<?php 

class StepManager extends Manager{
    public function addStep(Step $step){
        $req = $this->db->prepare('INSERT INTO step(content_step, recipe_id) VALUE(:content_step, :recipe_id)');
        $req->bindValue('content_step', $step->getContent_step(), PDO::PARAM_STR);
        $req->bindValue('recipe_id', $step->getRecipe_id(), PDO::PARAM_STR);
        $req->execute();
    }
}