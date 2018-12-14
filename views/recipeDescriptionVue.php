<section>
    <div class="container">
      
        <div class="row flex-column"> 
            <h1 class="text-white mt-2 font-weight-bold mx-auto"><?php echo $recipe->getname(); ?></h1>
        </div>

        <div class="bg-light p-5 row d-flex justify-content-center">
            <div class="d-flex flex-column col-md-6">
                <ul>
                <?php foreach ($ingredients as $ingredient) : ?>

                    <ol><i class="fa fa-carrot"></i><?php echo $ingredient->getDescription(); ?></ol>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="d-flex flex-column col-md-6 mb-5">
                
                <?php foreach ($steps as $step) : ?>
                <i class="fas fa-utensils"></i>     
                <!-- <img class="icon" src="<?= $path ?>/assets/img/chef.jpg" alt=""> -->
                <ul>
                    <?php echo $step->getDescription(); ?></li>
                </ul>
                <hr>
                <?php endforeach; ?>
            
            </div>
            <form method="post">
                <input type="hidden" name="delete">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
            <form class="col-md-12 d-flex flex-column my-5" method="post">
                <textarea class="form-control" name="message" id="" cols="80" rows="5" placeholder="Votre commentaire :" required></textarea>
                <button type="submit" class="btn font-weight-bold mt-2 justify-content-end btn-secondary" name="comment">Envoyer votre commentaire</button>
            </form>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <th class="col-md-4 font-weight-bold">Autheurs</th>
                    <th class="col-md-8 font-weight-bold">Commentaires</th>
                    <th class="col-md-8 font-weight-bold">Date du commentaire</th>
                </thead>
                <tbody class="">
                    <?php foreach($comments as $comment){ ?>
                    <tr>
                        <td class="text-center">
                            <img class="avatarComment" src="<?= $path ?>/assets/img/avatars/<?php echo $userManager->getUser($comment->getUser_id())->getAvatar(); ?>" alt="">
                            <?php echo $userManager->getUser($comment->getUser_id())->getPseudo(); ?>
                        </td>
                        <td><?php echo $comment->getComment(); ?></td>
                        <td><?php echo $comment->getPost_date(); ?></td>
                    </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
        <div class="size absolute">
            <img src="<?= $path ?>/assets/img/avatars/<?= $author->getAvatar() ?>" alt="">
        </div>
        
    </div>
    
</section>
