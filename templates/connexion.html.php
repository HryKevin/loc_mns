<div class="container-connexion">
  <div class="img-connexion">
    <img class="svg-connexion" src="assets/img/connexion.svg" alt="connexion">
    <img class="logo-connexion" src="assets/img/logo.svg" alt="logo">
  </div>
  <div class="container-right-connexion">
    <div class="container-form-connexion">
      <h1>SE CONNECTER</h1>
      <form method="POST">
        <div><label>Email : </label>
         <input type="email" name="email" placeholder="Email">
              <?php if (isset($errors['users']['email'])) : ?>
                <div>
                  <?=  $errors['users']['email'] ?>
                 
                </div>
              <?php endif; ?>
        </div>

        
        <div><label>Mot de passe : </label>
          <div>
          <input type="password" name="password" placeholder="Mot de passe">
              <?php if (isset($errors['users']['password'])) : ?>
                <div> <?= $errors['users']['password'] ?></div>
              <?php endif; ?>
            <img class="open-eye" src="assets/img/eye-open.svg" alt="oeil" />
          </div>
        </div>
        <a class="mdp" href="/?page=reinitialisation-mdp">Mot de passe oublié ?</a>

        <div><input class="button" type="submit" value="Connexion" name="login_form_submit" /></div>
      </form>
      <a href="?page=inscription">Vous n'êtes pas encore inscrit ?</a>
    </div>
  </div>

</div>