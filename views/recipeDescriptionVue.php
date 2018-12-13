<section>
    <div class="container">

        <div class="row flex-column"> 
            <h1 class="text-white mt-2 font-weight-bold mx-auto"><?php echo $recipe->getname(); ?></h1>
        </div>

        <div class="bg-light p-5 row d-flex justify-content-center">
            <div class="d-flex flex-column col-md-6">
                <ul>
                <?php foreach ($ingredients as $ingredient): ?>

                    <ol><i class="fa fa-carrot"></i><?php echo $ingredient->getDescription(); ?></ol>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="d-flex flex-column col-md-6 mb-5">
                
                <?php foreach ($steps as $step): ?>
                <i class="fas fa-utensils"></i>     
                <!-- <img class="icon" src="<?= $path ?>/assets/img/chef.jpg" alt=""> -->
                <ul>
                    <?php echo $step->getDescription(); ?></li>
                </ul>
                <hr>
                <?php endforeach; ?>
            
            </div>
             
            <form action="<?= $path ?>/recipe_description/<?= $_GET['id']; ?>" method="post">
                <input type="hidden" name="delete">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </div>
                <div class="size absolute">
            <img src="<?= $path ?>/assets/img/avatars/<?= $author->getAvatar() ?>" alt="">
        </div>

    </div>
</section>
