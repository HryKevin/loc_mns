<div class="container-index">
    <div class="left-section-index">
        <!-- Menu Latéral -->
        <div>
            <div class="logo-section-sidebar">
                <img src="assets/img/logo_computer_locmns.svg" alt="logo-computer" />
                <img src="assets/img/logo_locmns.svg" alt="logo" />
            </div>
            <ul>
                <li><a href="/"> <img src="assets/img/house.svg" />Accueil</a></li>
                <li><a href="/?page=materiels"> <img src="assets/img/computer.svg" />Matériels</a></li>
                <li><a href="/"> <img src="assets/img/bell.svg" />Notifications</a></li>
                <li><a href="/?page=utilisateurs"> <img src="assets/img/users.svg" />Utilisateurs</a></li>
                <li><a href="/"> <img src="assets/img/gear.svg" />Réglages</a></li>
            </ul>
        </div>
        <div><a href="/"><img src="assets/img/door.svg" />
                Déconnexion</a>
        </div>
    </div>
    <div class="rigth-section-index">
        <!-- Nav -->
        <div class="nav-bar">
            <h1><?= $title ?></h1>
            <div>
                <input class="input-search" type="text" /></input>
                <img class="search" src="assets/img/magnifier.svg" />
                <img src="assets/img/user.svg" />
                <img src="assets/img/chevron-down.svg" />
            </div>
        </div>
        <!-- MAIN -->
        <div class="container-main-index">
            <div class="container-main-users">
                <div class="top-container-users"></div>
                <div class="container-users">

                    <div class="container-form-inscription">
                        <form class="form-inscription" method="POST">
                            <div>
                                <label for="lastname">Nom :</label>
                                <input type="text" name="users[lastname]" id="lastname_update"
                                    value="<?= $user['lastname'] ?>" placeholder="Nom" required>
                                <!--Message d'erreur -->
                                <?php if (isset($errors) && !empty($errors['users']['lastname'])): ?>
                                    <div class="errors-inscr">
                                        <?= $errors['users']['lastname'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label for="firstname">Prénom :</label>
                                <input type="text" name="users[firstname]" id="firstname_update"
                                    value="<?= $user['firstname'] ?>" placeholder="Prénom" required>
                                <?php if (isset($errors) && !empty($errors['users']['firstname'])): ?>
                                    <div class="errors-inscr">
                                        <?= $errors['users']['firstname'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label for="role">Rôle :</label>
                                <select name="users[id_role]" id="role_update">
                                    <option value="">Sélectionner un rôle</option>
                                    <?php
                                    // Vérifiez si la requête a retourné des résultats
                                    if ($role) {
                                        // Itérez sur chaque résultat et affichez-le comme une option dans le select
                                        while ($row = $role->fetch()) {
                                            // Vérifiez si l'ID du rôle correspond à l'ID du rôle de l'utilisateur
                                            $selected = ($row['id_role'] == $user['id_role']) ? 'selected' : '';
                                            echo '<option value="' . $row['id_role'] . '" ' . $selected . '>' . $row['name_role'] . '</option>';
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
                                <input type="email" name="users[email]" id="email" value="<?= $user['email'] ?>"
                                    placeholder="Email" required>
                                <?php if (isset($errors) && !empty($errors['users']['email'])): ?>
                                    <div class="errors-inscr">
                                        <?= $errors['users']['email'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="submit-inscription">
                                <input type="submit" name="submit" value="Modifier">
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