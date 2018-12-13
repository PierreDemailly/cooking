<section>
    <div class="container">
        <div class="flex-wrap p-3 d-flex justify-content-center">
            
            <?php if(isset($recipes)) foreach($recipes as $recipe): ?>
                    <a class="card border borderCard border-dark m-2" href="<?= $path ?>/recipe_description/<?php echo $recipe->getId(); ?>">
                        <div class="size_div">
                                <div class="card-body">
                                <p class="text-center text-white font-weight-bold card-text"><?php echo $recipe->getname(); ?></p>
                                </div>
                            <img class="size_img" src="<?= $path ?>/assets/img/<?php echo $recipe->getPicture(); ?>" alt="Card image cap">
                        </div>
                    </a>
            <?php endforeach; ?>

        </div>
    </div>     
</section>
