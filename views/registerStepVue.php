<section>
    <div class="container">
        <h1 class="text-dark text-center"><?php echo $LastRecipe->getNamerecipe(); ?></h1>
        <form class="p-5" action="<?= $path ?>/register_step/<?php echo $LastRecipe->getId(); ?>" method="post">
            <textarea id="step" class="form-control col-12 mt-3" name="step" rows="8" cols="40" placeholder="Les étapes c'est içi, n'oublies pas de valider chaque etape grace au boutton en bas du formulaire" required></textarea>
            <div class="row">
                <button type="submit" class="col-6 mx-auto mt-5 btn btn-success">Passer à l'étape suivante</button>
            </div>
            
        </form>
        <div class="row">
                 <a class="btn mx-auto mt-5 btn-info" href="<?= $path ?>/register_ingredient/<?php echo $LastRecipe->getId(); ?>">Ajouter vos ingredients</a>
            </div>
    </div>
</section>
