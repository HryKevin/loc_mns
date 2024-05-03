<div class="container-inscription">
    <div class="container-form-inscription">
        <h1>S'inscrire</h1>
        <form class="form-inscription" method="POST">
            <div>
                <label for="lastname">Nom :</label>
                <input type="text" name="users[lastname]" id="lastname" value="" placeholder="Nom" required>
                <!--Message d'erreur -->
                <?php if(isset($errors) && !empty($errors['users']['lastname'])) : ?>
                    <div class="errors-inscr">
                        <?= $errors['users']['lastname'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <label for="firstname">Prénom :</label>
                <input type="text" name="users[firstname]" id="firstname" value="" placeholder="Prénom" required>
                <?php if(isset($errors) && !empty($errors['users']['firstname'])) : ?>
                    <div class="errors-inscr">
                        <?= $errors['users']['firstname'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <label for="email">Email :</label>
                <input type="email" name="users[email]" id="email" value="" placeholder="Email" required>
                <?php if(isset($errors) && !empty($errors['users']['email'])) : ?>
                    <div class="errors-inscr">
                        <?= $errors['users']['email'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="password-inscr">
                <label for="password">Mot de passe :</label>
                <div class="password-input">
                    <input type="password" name="users[password]" id="password-inscription" value="" placeholder="Mot de passe" required>
                     <img class="open-eye-inscription" src="assets/img/eye-open.svg" alt="oeil" />
                </div>
                <?php if(isset($errors) && !empty($errors['users']['password'])) : ?>
                    <div class="errors-inscr">
                        <?= $errors['users']['password'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="container-progressbar-pass">
                <p id="strength"></p>
                <progress id="pass-strength" value="0" max="5"></progress>
            </div>

            <div class="container_cgu">
                <input type="checkbox" name="users[cgu]" id="cgu" required>
                <label class="checkbox-inscription" for="cgu">En cochant cette case, j'accepte la &nbsp;<a
                        href="#">Politique de confidentialité</a></label>
            </div>
            <?php if (isset($errors) && !empty($errors['users']['cgu'])): ?>
                <div class="errors-inscr">
                    <?= $errors['users']['cgu'] ?>
                </div>
            <?php endif; ?>
            <div class="submit-inscription">
                <input type="submit" name="submit" value="Inscription">
                <p><a href="?page=connexion">Vous avez déjà un compte ?</a></p>
            </div>
        </form>
    </div>
    <div class="container-svg-inscription">
        <img class="image-inscription" src="assets/img/inscription.svg" alt="svg-inscription">
        <img class="logo-inscription" src="assets/img/logo.svg" alt="logo">
    </div>

</div>
