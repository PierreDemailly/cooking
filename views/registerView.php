<section>
  <div class="container">
    <div class="row">
        <form class="rounded mt-5 border border-dark col-12 col-md-8 mx-auto p-3 m-2 d-flex flex-column" method="post" enctype="multipart/form-data">
          <p class="mx-auto">Formulaire d'inscription</p>

          <?php if(isset($errors['form'])): ?>
          <p class="alert alert-danger"><?= $errors['form'] ?></p>
          <?php endif; ?>

          <?php if(isset($errors['pseudo'])): ?>
          <p class="alert alert-warning"><?= $errors['pseudo'] ?></p>
          <?php endif; ?>

          <div class="form-group">
            <label for="pseudo">Pseudo:</label>
            <input class="form-control" type="text" id="pseudo" name="pseudo" placeholder="Pseudo">
          </div>

          <?php if(isset($errors['password'])): ?>
          <p class="alert alert-warning"><?= $errors['password'] ?></p>
          <?php endif; ?>

          <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe">
          </div>

          <?php if(isset($errors['password-v'])): ?>
          <p class="alert alert-warning"><?= $errors['password-v'] ?></p>
          <?php endif; ?>

          <div class="form-group">
            <label for="password-v">Confirmation du mot de passe:</label>
            <input class="form-control" type="password" id="password-v" name="password-v" placeholder="Mot de passe">
          </div>

          <?php if(isset($errors['email'])): ?>
          <p class="alert alert-warning"><?= $errors['email'] ?></p>
          <?php endif; ?>

          <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" id="email" name="email" placeholder="Adresse e-mail">
          </div> 

          <?php if(isset($errors['avatar'])): ?>
          <p class="alert alert-warning"><?= $errors['avatar'] ?></p>
          <?php endif; ?>

          <div class="form-group">
            <label for="avatar">Avatar:</label>
            <div class="input-group mb-3">
              <div class="custom-file">
                <input name="avatar" type="file" class="custom-file-input" id="avatar">
                <label class="custom-file-label" for="avatar" aria-describedby="avatar">Choisir votre fichier</label>
              </div>
            </div>
          </div>

          <button name="register" class="btn btn-success">Envoyer</button>
        </form>
      </div>
  </div>
</section>
