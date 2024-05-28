
<div class="container-connexion">
  <div class="img-connexion">
    <img class="svg-connexion" src="assets/img/connexion.svg" alt="connexion">
    <img class="logo-connexion" src="assets/img/logo.svg" alt="logo">
  </div>
  <div class="container-right-connexion">
    <div class="container-form-connexion">
      <h1>SE CONNECTER</h1>
      <form id="form" method="POST">
        <div>
          <label>Email : </label>
          <input type="email" name="email" id ="user_email" placeholder="Email" data-required>
          <div id="error" class="error"></div>
          <?php if (isset($errors['email'])) : ?>
            
            <div class="error-message"><?= $errors['email'] ?></div>
          <?php endif; ?>
        </div>
        <div>
          <label>Mot de passe : </label>
          <div>
            <input type="password" name="password" id ="user_password" placeholder="Mot de passe" data-required>
            <?php if (isset($errors['password'])) : ?>
              <div class="error-message"><?= $errors['password'] ?></div>
            <?php endif; ?>
            <img class="open-eye" src="assets/img/eye-open.svg" alt="oeil" id="eye">
          </div>
        </div>
        <a class="mdp" href="/?page=reinitialisation-mdp">Mot de passe oublié ?</a>
        <div><input class="button" type="submit" value="connexion" name="login_form_submit" id="btn_submit"></div>
      </form>
      <a href="?page=inscription">Vous n'êtes pas encore inscrit ?</a>
    </div>
  </div>
</div>
<script src="./assets/js/connexion.js"></script>