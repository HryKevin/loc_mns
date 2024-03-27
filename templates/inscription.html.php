<div class="container-inscription">
    <div class="container-form-inscription">
        <h1>S'inscrire</h1>
        <form class="form-inscription" method="POST" action="#">
            <div>
                <label for="lastname">Nom :</label>
                <input type="text" name="lastname" id="lastname" value="" placeholder="Nom" required>
            </div>
            <div>
                <label for="firstname">Prénom :</label>
                <input type="text" name="firstname" id="firstname" value="" placeholder="Prénom" required>
            </div>
            <div>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="" placeholder="Email" required>
            </div>
            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" value="" placeholder="Mot de passe" required>
            </div>
            <div class="container_see_pass">
                <input name="see_pass" id="see_pass" type="checkbox" class="show-password" data-target="pass">
                <label for="see_pass">Afficher le mot de passe</label>
            </div>
            <div>
                <p id="strength"></p>
                <progress id="pass-strength" value="0" max="5"></progress>
            </div>
            <div class="container_accept_policy">
                <input type="checkbox" name="accept_policy" id="accept_policy" required>
                <label for="accept_policy">En cochant cette case, j'accepte la <a href="#">Politique de
                        confidentialité</a></label>
            </div>
            <div class="submit-inscription">
                <input type="submit" value="Inscription">
                <p><a href="connexion.php">Vous avez déjà un compte ?</a></p>
            </div>
        </form>
    </div>
    <div class="container-svg-inscription">
        <img src="assets/img/inscription.svg" alt="svg-inscription">
        <img class="logo-inscription" src="assets/img/logo.svg" alt="logo">
    </div>

</div>