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
                <div class="password-input">
                    <input type="password" name="password" id="password-inscription" value="" placeholder="Mot de passe" required>
                     <img class="open-eye-inscription" src="assets/img/eye-open.svg" alt="oeil" />
                </div>
            </div>
            <div class="container-progressbar-pass">
                <p id="strength"></p>
                <progress id="pass-strength" value="0" max="5"></progress>
            </div>

            <div class="container_accept_policy">
                <input type="checkbox" name="accept_policy" id="accept_policy" required>
                <label class="checkbox-inscription" for="accept_policy">En cochant cette case, j'accepte la &nbsp;<a
                        href="#">Politique de confidentialité</a></label>
            </div>
            <div class="submit-inscription">
                <input type="submit" value="Inscription">
                <p><a href="?page=connexion">Vous avez déjà un compte ?</a></p>
            </div>
        </form>
    </div>
    <div class="container-svg-inscription">
        <img class="image-inscription" src="assets/img/inscription.svg" alt="svg-inscription">
        <img class="logo-inscription" src="assets/img/logo.svg" alt="logo">
    </div>

</div>