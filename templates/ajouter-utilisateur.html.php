
        <!-- MAIN -->
        <div class="container-main-index">
            <div class="container-main-add-users">
                <div class="top-container-add-users"></div>
                <div class="container-add-users">
                    <div class="container-form-inscription">
                        <form class="form-inscription" method="POST">
                            <div>
                                <label for="lastname">Nom :</label>
                                <input type="text" name="users[lastname]" id="lastname" value="" placeholder="Nom"
                                required>
                                <!--Message d'erreur -->
                                <?php if (isset($errors) && !empty($errors['users']['lastname'])): ?>
                                    <div class="errors-inscr">
                                        <?= $errors['users']['lastname'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label for="firstname">Prénom :</label>
                                <input type="text" name="users[firstname]" id="firstname" value="" placeholder="Prénom"
                                required>
                                <?php if (isset($errors) && !empty($errors['users']['firstname'])): ?>
                                    <div class="errors-inscr">
                                        <?= $errors['users']['firstname'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label for="role">Rôle :</label>
                                <select name="users[id_role]" id="role" >
                                    <option value="">Sélectionner un rôle</option>
                                    <?php
                                    // Vérifiez si la requête a retourné des résultats
                                    if ($role) {
                                        // Itérez sur chaque résultat et affichez-le comme une option dans le select
                                        while ($row = $role->fetch()) {
                                            echo '<option value="' . $row['id_role'] . '">' . $row['name_role'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <?php if (isset($errors) && !empty($errors['users']['id_role'])): ?>
                                    <div class="errors-inscr">
                                        <?= $errors['users']['id_role'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label for="email">Email :</label>
                                <input type="email" name="users[email]" id="email" value="" placeholder="Email"
                                required>
                                <?php if (isset($errors) && !empty($errors['users']['email'])): ?>
                                    <div class="errors-inscr">
                                        <?= $errors['users']['email'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="password-inscr">
                                <label for="password">Mot de passe :</label>
                                <div class="password-input">
                                    <input type="password" name="users[password]" id="password-inscription" value=""
                                        placeholder="Mot de passe" required>
                                    <img class="open-eye-inscription" src="assets/img/eye-open.svg" alt="oeil" />
                                </div>
                                <?php if (isset($errors) && !empty($errors['users']['password'])): ?>
                                    <div class="errors-inscr">
                                        <?= $errors['users']['password'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="submit-inscription">
                                <input type="submit" name="submit" value="Ajouter">
                                <?php if (isset($success) && !empty($success)): ?>
                                    <div class="success-inscr">
                                        <?= $success ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>


</div>
</div>