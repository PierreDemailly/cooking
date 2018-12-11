<?php
include("template/header.php")
?>

<section>
    <div class="container">
        <h1 class="text-dark text-center"><?php echo $LastRecipe->getNamerecipe(); ?></h1>
        <form class="p-5" action="<?= $path ?>/register_ingredient/<?php echo $LastRecipe->getId(); ?>" method="post">
            <input class="form-control" type="text" name="ingredient" placeholder="Ohu !! un ingredient a la fois." required>
            <div class="row">
                <button type="submit" class="col-6 mx-auto mt-5 btn btn-info">Un autre ingredient ?</button>
            </div>
        </form>
        
        <div class="row">
                <a class="btn mx-auto mt-5 btn-success" href="<?= $path ?>/register_step/<?php echo $LastRecipe->getId(); ?>">Ajouter Une autre étape</a>
        </div>
            <div class="row">
                <a class="btn mx-auto mt-5 btn-danger" href="<?= $path ?>/recipe">Terminer</a>
        </div>
       
    </div>
</section>

<?php
include("template/footer.php")
?>
